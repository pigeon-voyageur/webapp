<?php

namespace App\Http\Controllers;

use App\Data\NewsData;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('News/Index', [
            'news' => NewsData::collection(News::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('News/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request): RedirectResponse
    {
        News::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'video' => $request->input('video'),
            'lng' => $request->input('lng'),
            'lat' => $request->input('lat'),
            'sources' => $request->input('sources'),
        ]);

        return Redirect::route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): Response
    {
        return Inertia::render('News/Show', [
            'news' => NewsData::from($news),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): Response
    {
        return Inertia::render('News/Edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $news->update([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'video' => $request->input('video'),
            'lng' => $request->input('lng'),
            'lat' => $request->input('lat'),
            'sources' => $request->input('sources'),
        ]);

        return Redirect::route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): void
    {
        //
    }
}
