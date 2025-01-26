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

    protected $sortable = [
        'price',
        'created_at'
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
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        return  $query->orderByDesc('created_at');
    }



    public function scopeFilters(Builder $query, array $filter): Builder
    {
        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
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
            fn($q, $value) => $q->withTrashed()
        )->when(
            $filter['by'] ?? false,
            fn($q, $value) => !in_array($value, $this->sortable) ? $q : $q->orderBy($value, $filter['order'] ?? 'desc')
        );
    }
}
