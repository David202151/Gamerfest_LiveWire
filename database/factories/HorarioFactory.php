<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition()
    {
        return [
			'id_videjuegos' => $this->faker->name,
			'id_aulas' => $this->faker->name,
			'tiempo_inicio' => $this->faker->name,
			'tiempo_fin' => $this->faker->name,
			'fecha' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
