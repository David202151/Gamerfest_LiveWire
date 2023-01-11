<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class InsinvidvidualeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id_videjuegos' => $this->nombre,
            'id_jugadores' => $this->nombre_jugador,
            'observaciones' => $this->observaciones,
        ];
    }
}
