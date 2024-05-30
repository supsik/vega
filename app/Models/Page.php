<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Page extends Model implements Sitemapable
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'employee_id',
        'first_block_text',
        'second_block_text',
        'youtube_link',
        'seo_description',
        'seo_title',
        'seo_keywords',
    ];

    public function toSitemapTag(): Url | string | array
    {
        return route('pages', $this);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
