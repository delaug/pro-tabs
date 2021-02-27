<?php

namespace Database\Factories;

use App\Models\Tune;
use Illuminate\Database\Eloquent\Factories\Factory;

class TuneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tune::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Standart', 'Drop C', 'Drop D', 'A D G C', 'D2 A3 F3 C3 G2 D2', 'Open D']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
