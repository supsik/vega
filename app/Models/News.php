<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class News extends Model implements HasMedia, Sitemapable
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'published_at',
        'is_published',
        'seo_description',
        'seo_title',
        'seo_keywords',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('news.show', $this);
    }

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query
            ->whereDate('published_at', '<=', now())
            ->where('is_published', true);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function optimizeCover()
    {
        Image::load($this->getFirstMediaPath('cover'))
            ->crop(Manipulations::CROP_CENTER, 700, 394)
            ->save();
    }


}
