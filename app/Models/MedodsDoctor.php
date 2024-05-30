<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class MedodsDoctor extends Model
{
    protected $fillable = [
        'id',
        'name',
        'second_name',
        'surname',
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['surname']} {$attributes['name']} {$attributes['second_name']}"
        );
    }
}
