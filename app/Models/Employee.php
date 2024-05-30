<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Employee extends Model implements HasMedia, Sitemapable
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'second_name',
        'slug',
        'position',
        'description',
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
        return route('team.show', $this);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['second_name']} {$attributes['first_name']} "
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile();
    }

    public function optimizePhoto()
    {
        Image::load($this->getFirstMediaPath('photo'))
            ->crop(Manipulations::CROP_CENTER, 400, 400)
            ->save();
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
