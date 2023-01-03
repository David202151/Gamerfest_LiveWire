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
        return InsgrupaleResource::collection (Insgrupale::latest()->paginate());
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
