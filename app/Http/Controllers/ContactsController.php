<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function __invoke(Request $request): View
    {
        $page = Page::query()
            ->with('employee')
            ->select(['first_block_text', 'seo_description', 'seo_title', 'seo_keywords'])
            ->where('slug', 'contacts')
            ->first();

        return view('contacts', compact('page'));
    }
}
