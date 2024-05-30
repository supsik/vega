<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'is_disabled',
        'sort',
    ];

    protected $casts = [
        'is_disabled' => 'boolean',
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            set: fn (mixed $value, array $attributes) => (int) $value
        );
    }

    public function diagnostics(): BelongsTo
    {
        return $this->belongsTo(Diagnostics::class);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function service_doctors()
    {
        return $this->hasMany(DoctorService::class);
    }
}
