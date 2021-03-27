<?php

namespace Database\Factories;

use App\Models\InstrumentTranslations;
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
            'lang' => $this->faker->unique()->randomElement(config('app.locale_list')),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
