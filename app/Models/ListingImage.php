<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ListingImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];
    protected $appends = [
        'src'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()?->username ?? null;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()?->username ?? null;
        });
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    // getRealSrcAttribute -> real_str
    public function getSrcAttribute()
    {
        return asset("storage/{$this->filename}");
    }
}
