<?php

namespace App\Http\Controllers\Pigeon;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PigeonGetNewsController extends Controller
{
    public function __invoke(Request $request, News $news): RedirectResponse
    {

        $request->user()->pigeon->news()->attach($news, [
            'arrival_date' => now()->addMinutes(1),
        ]);

        return redirect()->route('news.index');
    }

}
