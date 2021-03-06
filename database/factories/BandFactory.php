<?php

namespace Database\Factories;

use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\Factory;

class BandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Band::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Epica',
                'Nightwish',
                'Insomnium',
                'Rage',
                'Эпидемия',
                'Ария',
                'Louna',
                'Engel',
                'Children of Bodom',
                'Ensiferum',
                'Rammstein',
                'Flyleaf',
                'Eluveitie',
                'Three Days Grace',
                'Delain',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
