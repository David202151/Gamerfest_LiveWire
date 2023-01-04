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
            'id_videjuegos' => $this->id_videjuegos,
            'id_jugadores' => $this->id_jugadores,
            'observaciones' => $this->observaciones,
        ];
    }
}
