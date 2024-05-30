<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Operations extends Model implements HasMedia, Sitemapable
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'order',
        'seo_description',
        'seo_title',
        'seo_keywords',
    ];

    public function toSitemapTag(): Url | string | array
    {
        return route('operations.show', $this);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop(Manipulations::CROP_CENTER, 345, 194);
    }

    public function optimizeCover()
    {
        Image::load($this->getFirstMediaPath('cover'))
            ->crop(Manipulations::CROP_CENTER, 800, 450)
            ->save();
    }

    // public function services(): HasMany
    // {
    //     return $this->hasMany(Service::class);
    // }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'doctor_operations');
    }
}
