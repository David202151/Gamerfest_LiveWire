<?php

namespace Database\Factories;

use App\Models\Insgrupale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsgrupaleFactory extends Factory
{
    protected $model = Insgrupale::class;

    public function definition()
    {
        return [
			'id_jugadores' => $this->faker->name,
			'id_equipos' => $this->faker->name,
			'id_videjuegos' => $this->faker->name,
			'participantes' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
