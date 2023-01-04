<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
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
            'nombre' => $this->nombre,
            'fecha' => $this->fecha,
            'id_aulas' => $this->id_aulas,
            'descripcion' => $this->descripcion,
            
        ];
    }
}
