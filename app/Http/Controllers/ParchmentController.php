<?php

namespace App\Http\Controllers;

use App\Data\ParchmentData;
use App\Http\Requests\Parchment\StoreParchmentRequest;
use App\Http\Requests\Parchment\UpdateParchmentRequest;
use App\Models\Parchment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ParchmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Parchments/Index', [
            'parchments' => ParchmentData::collection(Parchment::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Parchments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParchmentRequest $request): RedirectResponse
    {
        Parchment::create([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'video' => $request->input('video'),
        ]);

        return Redirect::route('parchments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parchment $parchment): Response
    {
        return Inertia::render('Parchments/Show', [
            'parchment' => ParchmentData::from($parchment),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parchment $parchment): Response
    {
        return Inertia::render('Parchments/Edit', [
            'parchment' => $parchment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParchmentRequest $request, Parchment $parchment): RedirectResponse
    {
        $parchment->update([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'video' => $request->input('video'),
        ]);

        return Redirect::route('parchments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parchment $parchment): void
    {
        //
    }
}
