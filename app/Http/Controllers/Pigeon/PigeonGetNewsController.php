<?php

namespace App\Http\Controllers\Pigeon;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PigeonGetNewsController extends Controller
{
    public function __invoke(Request $request, News $news): RedirectResponse
    {

        $request->user()->pigeon->news()->attach($news, [
            'arrival_date' => now(),
        ]);

        return redirect()->route('news.show', $news);
    }
    
}
