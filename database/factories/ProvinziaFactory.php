<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provinzia>
 */
class ProviziaFactory extends Factory
{
    protected $model = Provizia::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        ];
    }
}
