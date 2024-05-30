<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnalysisGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function analysis(): HasMany
    {
        return $this->hasMany(Analysis::class);
    }
}
