<?php

namespace App\Http\Controllers\Pigeon;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pigeon\GetNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class PigeonGetNewsController extends Controller
{
    public function __invoke(GetNewsRequest $request, News $news): RedirectResponse
    {
        dd($request->input('lat'), $request->input('lng'));
        
        $request->user()->pigeon->news()->attach($news, [
            'arrival_date' => now()->addMinutes(config('pigeon.flight_minutes')),
        ]);

        return redirect()->route('news.index');
    }

}
