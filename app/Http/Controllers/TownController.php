<?php

namespace App\Http\Controllers;

use App\Data\TownData;
use App\Models\Town;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TownController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('create', Town::class);

        return Inertia::render('Town/Create');
    }

    /**
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Town::class);

        $town = Town::create();

        $request->user()->update([
            'town_id' => $town->id,
        ]);

        return Redirect::route('town.show');
    }

    /**
     * @throws AuthorizationException
     */
    public function join(Request $request, Town $town): RedirectResponse
    {
        $this->authorize('join', $town);

        $request->user()->update([
            'town_id' => $town->id,
        ]);

        return Redirect::route('town.show');
    }

    public function show(Request $request): RedirectResponse|Response
    {
        if (!$town = $request->user()->town) {
            return Redirect::route('town.create');
        }

        return Inertia::render('Town/Show', [
            'town' => TownData::from($town),
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function leave(Request $request): RedirectResponse
    {
        $this->authorize('leave', Town::class);

        if (!$userTown = $request->user()->town) {
            return Redirect::route('news.index');
        }

        $request->user()->update([
            'town_id' => null,
        ]);

        if ($userTown->users()->count() === 0) {
            $userTown->delete();
        }

        return Redirect::route('news.index');
    }
}
