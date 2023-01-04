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
            'id_videjuegos' => $this->id_videjuegos,
            'id_aulas' => $this->id_aulas,
            'tiempo_inicio' => $this->tiempo_inicio,
            'tiempo_fin' => $this->tiempo_fin,
            'fecha' => $this->fecha,
            'observaciones' => $this->observaciones,
        ];
    }
}
