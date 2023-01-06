<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Http\Request;

use App\Http\Resources\V1\HorarioResource;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return HorarioResource::collection (Horario::select(
             'videojuegos.nombre', 'aulas.nombre as nombre_aula', 'horarios.tiempo_inicio',
            'horarios.tiempo_fin', 'horarios.fecha', 'horarios.observaciones')
            -> join('videojuegos', 'horarios.id_videjuegos', '=', 'videojuegos.id')
            -> join('aulas', 'horarios.id_aulas', '=', 'aulas.id')
            ->get());
       
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        return new HorarioResource($horario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Horario $horario)
    {
        if( $horario->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
