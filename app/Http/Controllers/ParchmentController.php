<?php

namespace App\Http\Controllers;

use App\Data\ParchmentData;
use App\Http\Requests\StoreParchmentRequest;
use App\Http\Requests\UpdateParchmentRequest;
use App\Models\Parchment;
use Inertia\Inertia;
use Inertia\Response;

class ParchmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $parchments = ParchmentData::collection(Parchment::all());
        
        return Inertia::render('Parchments/Index', [
            'parchments' => $parchments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Parchments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParchmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Parchment $parchment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parchment $parchment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParchmentRequest $request, Parchment $parchment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parchment $parchment)
    {
        //
    }
}
