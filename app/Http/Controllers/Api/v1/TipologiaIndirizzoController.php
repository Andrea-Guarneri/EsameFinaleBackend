<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\TipologiaIndirizzo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TipologiaIndirizzoResource;

class TipologiaIndirizzoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipologiaIndirizzo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipologiaIndirizzo $tipologiaIndirizzo)
    {
        return new TipologiaIndirizzoResource($tipologiaIndirizzo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipologiaIndirizzo $tipologiaIndirizzo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipologiaIndirizzo $tipologiaIndirizzo)
    {
        //
    }
}
