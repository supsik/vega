<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->with('media')
            ->select(['id', 'title', 'slug', 'excerpt', 'published_at'])
            ->isPublished()
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('news.index', compact('news'));
    }

    public function show(News $news): View
    {
        abort_unless($news->is_published, 404);
        return view('news.show', compact('news'));
    }
}
