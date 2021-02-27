<?php

namespace Database\Factories;

use App\Models\Band;
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
            'src' => '/storage/'.strtolower($this->faker->firstName.'_'.$this->faker->lastName).'/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => Band::all()->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
