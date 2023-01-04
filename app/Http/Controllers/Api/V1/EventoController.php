<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Resources\V1\EventoResource;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventoResource::collection (Evento::latest()->paginate());
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        
        return new EventoResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Evento $evento)
    {
        if( $evento->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
