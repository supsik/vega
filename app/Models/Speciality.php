<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Speciality extends Model implements Sitemapable
{
    use HasFactory;

    protected $fillable = [
        'plural_name',
        'singular_name',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function toSitemapTag(): Url | string | array
    {
        return route('doctors.speciality', $this);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}
