<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configurazione;
use App\Http\Resources\v1\ConfigurazioneCollection;
use App\Http\Resources\v1\ConfigurazioneResource;
use App\Http\Requests\v1\ConfigurazioneStoreRequest;
use App\Http\Requests\v1\ConfigurazioneUpdateRequest;
use Illuminate\Support\Facades\Gate;

class ConfigurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $configuration = Configurazione::all();
                return new ConfigurazioneCollection($configuration);
            } else {
                abort(403, 'PE_0001');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Configurazione $configurazione)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('Amministratore')) {
                $risorsa = new ConfigurazioneResource($configurazione);
                return $risorsa;
            } else {
                abort(403, 'PE_0001');
            }
        }
    }
}
