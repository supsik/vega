<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'text',
        'is_published',
    ];

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
