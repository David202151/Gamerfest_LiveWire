<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Insinvidviduale;
use Illuminate\Http\Request;

use App\Http\Resources\V1\InsinvidvidualeResource;

class InsinvidvidualeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InsinvidvidualeResource::collection (Insinvidviduale::latest()->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insinvidviduale  $insinvidviduale
     * @return \Illuminate\Http\Response
     */
    public function show(Insinvidviduale $insinvidviduale)
    {
        return new InsinvidvidualeResource($insinvidviduale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Insinvidviduale  $insinvidviduale
     * @return \Illuminate\Http\Response
     */
    
     
    public function destroy(Insinvidviduale $insinvidviduale)
    {
        if( $insinvidviduale->delete() ) { 
            return response()->json([ 
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ],404);
    }
}
