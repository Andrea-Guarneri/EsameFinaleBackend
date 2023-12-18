<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProvinciaResource;
use Illuminate\Http\Request;
use App\Models\Provincia;
use Illuminate\Http\Response;

class ProvinciaController extends Controller
{
    public function index()
    {
        $province = Provincia::all();
        return ProvinciaResource::collection($province);
    }

    public function store(Request $request)
    {
        $provincia = Provincia::create($request->all());
        return new ProvinciaResource($provincia);
    }

    public function show($id)
    {
        $provincia = Provincia::findOrFail($id);
        return new ProvinciaResource($provincia);
    }

    public function update(Request $request, $id)
    {
        $provincia = Provincia::findOrFail($id);
        $provincia->update($request->all());
        return new ProvinciaResource($provincia);
    }

    public function destroy($id)
    {
        $provincia = Provincia::findOrFail($id);
        $provincia->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
