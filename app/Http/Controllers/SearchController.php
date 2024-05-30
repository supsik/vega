<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Doctor;
use App\Models\Diagnostics;
use App\Models\News;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request): View
    {
        ['q' => $searchQuery] = $request->validate(['q' => 'required|string'], $request->all());

        $services = Service::query()
            ->select(['id', 'title', 'price', 'is_disabled'])
            ->where('title', 'like', "%{$searchQuery}%")
            ->get();

        $doctors = Doctor::query()
            ->with('media')
            ->select(['slug', 'id', 'first_name', 'second_name', 'last_name', 'specialities_json'])
            ->orWhereRaw(
                "CONCAT(`first_name`, ' ', `second_name`) LIKE ?",
                ["%{$searchQuery}%"]
            )
            ->orWhere('description', 'like', "%$searchQuery%")
            ->get();

        $news = News::query()
            ->with('media')
            ->select(['id', 'title', 'slug', 'excerpt', 'published_at'])
            ->orWhere('title', 'like', "%{$searchQuery}%")
            ->orWhere('content', 'like', "%{$searchQuery}%")
            ->isPublished()
            ->get();

        $diagnostics = Diagnostics::query()
            ->with('media')
            ->orWhere('name', 'like', "{$searchQuery}%")
            ->get();

        return view('search', compact('services', 'doctors', 'news', 'diagnostics'));
    }

    public function quickSearch(Request $request)
    {
        $searchQuery = $request->q;

        if(!$searchQuery)
            return response()->json(['success' => true, 'data' => '']);

        $services = Service::query()
            ->select(['id', 'title', 'price', 'is_disabled', 'sort'])
            ->where('title', 'like', "{$searchQuery}%")
            ->with('doctors')
            ->orderBy('sort', 'ASC')
            ->get();

        $doctors = Doctor::query()
            ->with('media')
            ->select(['slug', 'id', 'first_name', 'second_name', 'last_name', 'specialities_json'])
            ->orWhereRaw(
                "CONCAT(`first_name`, ' ', `second_name`) LIKE ?",
                ["%{$searchQuery}%"]
            )
            ->orWhere('description', 'like', "%$searchQuery%")
            ->get();

        $diagnostics = Diagnostics::query()
            ->with('media')
            ->orWhere('name', 'like', "{$searchQuery}%")
            ->get();

        return response()->json([
            'success' => true,
            'data' => view('partials.search-menu', compact('services', 'doctors', 'diagnostics'))->render()
        ]);
    }
}
