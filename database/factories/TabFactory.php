<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\File;
use App\Models\Tab;
use Illuminate\Database\Eloquent\Factories\Factory;

class TabFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tab::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'downloads' => rand(0, 999),
            'band_id' => Band::all()->random(),
            'file_id' => File::all()->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
