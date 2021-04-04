<?php

namespace Database\Factories;

use App\Models\InstrumentTranslations;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrumentTranslationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InstrumentTranslations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->randomElement([
                'Электрогитара',
                'Акустическая гитара',
                'Бас-гитара',
                'Барабаны',
                'Клавишные',
                'Скрипка',
                'Вокал',
                'Electric Guitar',
                'Acoustic Guitar',
                'Bass Guitar',
                'Drums',
                'Keyboards',
                'Violin',
                'Vocals',
            ]),
            'language_id' => Language::all()->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
