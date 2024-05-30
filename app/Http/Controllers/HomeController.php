<?php

namespace App\Http\Controllers;

use App\Models\Diagnostics;
use App\Models\HomeSlide;
use App\Models\News;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Leeto\PhoneAuth\Models\ConfirmedPhone;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $page = Page::query()
            ->with('employee')
            ->select(['first_block_text', 'second_block_text', 'employee_id', 'seo_description', 'seo_title', 'seo_keywords'])
            ->where('slug', 'home')
            ->first();

        $homeSlider = HomeSlide::query()
            ->with('media')
            ->isPublished()
            ->oldest('order')
            ->get();

        $reviews = Review::query()
            ->select(['author', 'text'])
            ->isPublished()
            ->get();

        $news = News::query()
            ->with('media')
            ->select(['id', 'title', 'slug', 'excerpt', 'published_at'])
            ->isPublished()
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $diagnostics = Diagnostics::query()
            ->with('media')
            ->select(['id', 'name', 'slug', 'description', 'animation'])
            ->oldest('order')
            ->get();

        return view('home', compact('page', 'homeSlider', 'reviews', 'news', 'diagnostics'));
    }
}
