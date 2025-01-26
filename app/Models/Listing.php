<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'street',
        'street_nr',
        'price',
        'by_user_id',
        'deleted_at'
    ];



    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }

    public function scopeMostRecent(Builder $query): Builder
    {
        return  $query->orderByDesc('created_at');
    }

    public function scopeFilters(Builder $query, array $filter): Builder
    {
        return $query->when(
            $filter['priceFrom'] ?? false,
            fn($q, $value) => $q->where('price', '>=', $value)
        )->when(
            $filter['priceTo'] ?? false,
            fn($q, $value) => $q->where('price', '<=', $value)
        )->when(
            $filter['beds'] ?? false,
            fn($q, $value) => $q->where('beds', (int)$value < 6 ? "=" : ">=", $value)
        )->when(
            $filter['baths'] ?? false,
            fn($q, $value) => $q->where('baths', (int)$value < 6 ? "=" : ">=", $value)
        )->when(
            $filter['areaFrom'] ?? false,
            fn($q, $value) => $q->where('area', '>=', $value)
        )->when(
            $filter['areaTo'] ?? false,
            fn($q, $value) => $q->where('area', '<=', $value)
        )->when(
            $filter['is_deleted'] ?? false,
            fn($query, $value) => $query->withTrashed()
        );
    }
}
