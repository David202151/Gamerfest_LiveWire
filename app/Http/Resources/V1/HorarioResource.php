<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class HorarioResource extends JsonResource
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
            'videjuegos' => $this->nombre,
            'aulas' => $this->nombre_aula,
            'tiempo_inicio' => $this->tiempo_inicio,
            'tiempo_fin' => $this->tiempo_fin,
            'fecha' => $this->fecha,
            'observaciones' => $this->observaciones,
        ];
    }
}
