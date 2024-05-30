<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __invoke(Request $request): View
    {
        $page = Page::query()
            ->with('employee')
            ->select(['first_block_text', 'second_block_text', 'employee_id', 'youtube_link', 'seo_description', 'seo_title', 'seo_keywords'])
            ->where('slug', 'about')
            ->first();

        return view('about', compact('page'));
    }
}
