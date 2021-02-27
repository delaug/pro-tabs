<?php

namespace Database\Factories;

use App\Models\Instrument;
use App\Models\Tab;
use App\Models\Track;
use App\Models\Tune;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tab_id' => Tab::all()->random(),
            'instrument_id' => Instrument::all()->random(),
            'tune_id' => Tune::all()->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
