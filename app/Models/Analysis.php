<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Analysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'period',
        'analysis_group_id',
    ];

    public function analysisGroup(): BelongsTo
    {
        return $this->belongsTo(AnalysisGroup::class);
    }
}
