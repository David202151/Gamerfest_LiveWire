<?php

namespace Database\Factories;

use App\Models\Insinvidviduale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InsinvidvidualeFactory extends Factory
{
    protected $model = Insinvidviduale::class;

    public function definition()
    {
        return [
			'id_videjuegos' => $this->faker->name,
			'id_jugadores' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
