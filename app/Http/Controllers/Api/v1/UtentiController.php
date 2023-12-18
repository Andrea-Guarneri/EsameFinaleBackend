<?php

namespace App\Http\Controllers;

use App\Models\Utente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// CRUD -> Create, Read, Update, Delete

class UtentiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Utente::all();
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
    public function show(Utente $utenti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utente $utenti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utente $utenti)
    {
        //
    }
}
