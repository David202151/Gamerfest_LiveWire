<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Jugadore;
use Illuminate\Http\Request;

use App\Http\Resources\V1\JugadoresResource;

class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JugadoresResource::collection (Jugadore::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Jugadore  $jugadore
     * @return \Illuminate\Http\Response
     */
    
    public function show(Jugadore $jugadore)
    {
        return new JugadoresResource($jugadore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Jugadore  $jugadore
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Jugadore $jugadore)
    {
        if( $jugadore->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
