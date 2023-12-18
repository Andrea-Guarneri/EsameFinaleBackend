<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indirizzo>
 */
class IndirizzoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                "idContatto" => $this->faker->numberBetween(1, 3),
                "idTipologiaIndirizzo" => $this->faker->numberBetween(1, 3),
                "idNazione" => $this->faker->numberBetween(1, 252),
                "indirizzo" => $this->faker->sentence(2),
                "civico" => $this->faker->numberBetween(1, 50),
                "cap" => $this->faker->numberBetween(10010, 12000),
                "localita" => null,
                "comune" => $this->faker->unique()->word()
            ]
        ];
    }
}
