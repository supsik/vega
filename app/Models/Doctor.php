<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Doctor extends Model implements HasMedia, Sitemapable
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'second_name',
        'last_name',
        'slug',
        'price',
        'description',
        'specialities_json',
        'seo_description',
        'seo_title',
        'seo_keywords',
    ];

    protected $casts = [
        'specialities_json' => 'collection',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (Model $model) {
            $specialities = Speciality::query()
                ->whereIn('id', request()->get('specialities') ?? [])
                ->pluck('singular_name')
                ->toArray();

            $model->specialities_json = $specialities;
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('doctors.show', $this);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['second_name']} {$attributes['first_name']}"
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['second_name']} {$attributes['first_name']} {$attributes['last_name']}"
        );
    }

    public function specialitiesList(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $this->specialities_json
                ->join(', ')
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

    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    public function diagnostics(): BelongsToMany
    {
        return $this->belongsToMany(Diagnostics::class, 'doctor_diagnostics');
    }

    public function medods(): BelongsTo
    {
        return $this->belongsTo(MedodsDoctor::class, 'medods_id', 'id', 'name');
    }

    public function speciality()
    {
        return $this->hasOne(Speciality::class);
    }
}
