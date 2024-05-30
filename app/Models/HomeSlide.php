<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeSlide extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'order',
        'link',
        'is_published',
    ];

    public function scopeIsPublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('desktop_image')->singleFile();
        $this->addMediaCollection('mobile_image')->singleFile();
    }

    public function optimizeDesktopImage()
    {
        Image::load($this->getFirstMediaPath('desktop_image'))
            ->crop(Manipulations::CROP_CENTER, 1920, 728)
            ->save();
    }

    public function optimizeMobileImage()
    {
        Image::load($this->getFirstMediaPath('mobile_image'))
            ->crop(Manipulations::CROP_CENTER, 500, 400)
            ->save();
    }
}
