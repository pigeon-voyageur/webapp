<?php

namespace App\Http\Controllers\Pigeon;

use App\Computers\FlightDistanceComputer;
use App\Computers\FlightDurationComputer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pigeon\GetNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class PigeonGetNewsController extends Controller
{
    public function __invoke(
        GetNewsRequest $request,
        News $news,
        FlightDistanceComputer $distanceComputer,
        FlightDurationComputer $durationComputer): RedirectResponse
    {
        $userLat = $request->input('lat');
        $userLng = $request->input('lng');
        
        $kmDistance = $distanceComputer
            ->from($userLat, $userLng)
            ->to($news->lat, $news->lng)
            ->getDistanceInKm();

        $timeInMinutes = $durationComputer
            ->forKmDistance($kmDistance)
            ->getDurationInMinutes();

        $request->user()->pigeon->news()->attach($news, [
            'arrival_date' => now()->addMinutes($timeInMinutes),
        ]);

        return redirect()->route('news.index');
    }

}
