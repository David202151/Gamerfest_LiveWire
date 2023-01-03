<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\VideojuegoResource;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideojuegoResource::collection (Videojuego::latest()->paginate());
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Http\Response
     */
    public function show(Videojuego $videojuego)
    {
        return new VideojuegoResource($videojuego);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Http\Response
     */
  
    public function destroy(Videojuego $videojuego)
    {
        {
            if( $videojuego->delete() ) { 
                return response()->json([ 
                    'message' => 'Success'
                ], 204);
            }
            return response()->json([
                'message' => 'Not found'
            ],404);
        }
    }
}
