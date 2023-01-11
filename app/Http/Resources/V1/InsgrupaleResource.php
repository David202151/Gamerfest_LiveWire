<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class InsgrupaleResource extends JsonResource
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
            'jugadores' => $this->nombre,
            'equipos' => $this->nombre_equipos,
            'videjuegos' => $this->nombre_videojuegos,
            'participantes' => $this->participantes,
            'observaciones' => $this->observaciones
        ];
    }
}
