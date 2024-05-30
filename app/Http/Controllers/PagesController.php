<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function __invoke(Page $page): View
    {
        abort_if(in_array($page->slug, ['home', 'about', 'contacts']), 404);

        return view('pages', compact('page'));
    }
    public static function getContentBySlug(string $slug): Page {
        return Page::query()
            ->select(['content'])
            ->where('slug', $slug)
            ->first();
    }
}
