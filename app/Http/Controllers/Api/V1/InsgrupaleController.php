<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Insgrupale;
use Illuminate\Http\Request;

use App\Http\Resources\V1\InsgrupaleResource;

class InsgrupaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InsgrupaleResource::collection (Insgrupale::select(
            'jugadores.nombre', 'equipos.nombre as nombre_equipos', 'videojuegos.nombre as nombre_videojuegos',
            'insgrupales.participantes', 'insgrupales.observaciones')
            -> join('jugadores', 'insgrupales.id_jugadores', '=', 'jugadores.id')
            -> join('equipos', 'insgrupales.id_equipos', '=', 'equipos.id')
            -> join('videojuegos', 'insgrupales.id_videjuegos', '=', 'videojuegos.id')
            ->get()
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insgrupale  $insgrupale
     * @return \Illuminate\Http\Response
     */
    public function show(Insgrupale $insgrupale)
    {
        return new InsgrupaleResource($insgrupale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Insgrupale  $insgrupale
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Insgrupale $insgrupale)
    {
        if( $insgrupale->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
