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
            'id_jugadores' => $this->id_jugadores,
            'id_equipos' => $this->id_equipos,
            'id_videjuegos' => $this->id_videjuegos,
            'participantes' => $this->participantes,
            'observaciones' => $this->observaciones
        ];
    }
}
