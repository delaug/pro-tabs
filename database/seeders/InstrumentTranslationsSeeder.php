<?php

namespace Database\Seeders;

use App\Models\InstrumentTranslations;
use Illuminate\Database\Seeder;

class InstrumentTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Electric Guitar
        InstrumentTranslations::create(['title' => 'Electric Guitar', 'language_id' => 1, 'instrument_id' => 1]);
        InstrumentTranslations::create(['title' => 'Электрогитара', 'language_id' => 2, 'instrument_id' => 1]);
        // Acoustic Guitar
        InstrumentTranslations::create(['title' => 'Acoustic Guitar', 'language_id' => 1, 'instrument_id' => 2]);
        InstrumentTranslations::create(['title' => 'Акустическая гитара', 'language_id' => 2, 'instrument_id' => 2]);
        // Bass Guitar
        InstrumentTranslations::create(['title' => 'Bass Guitar', 'language_id' => 1, 'instrument_id' => 3]);
        InstrumentTranslations::create(['title' => 'Бас-гитара', 'language_id' => 2, 'instrument_id' => 3]);
        // Drums
        InstrumentTranslations::create(['title' => 'Drums', 'language_id' => 1, 'instrument_id' => 4]);
        InstrumentTranslations::create(['title' => 'Барабаны', 'language_id' => 2, 'instrument_id' => 4]);
        // Keyboards
        InstrumentTranslations::create(['title' => 'Keyboards', 'language_id' => 1, 'instrument_id' => 5]);
        InstrumentTranslations::create(['title' => 'Клавишные', 'language_id' => 2, 'instrument_id' => 5]);
        // Violin
        InstrumentTranslations::create(['title' => 'Violin', 'language_id' => 1, 'instrument_id' => 6]);
        InstrumentTranslations::create(['title' => 'Скрипка', 'language_id' => 2, 'instrument_id' => 6]);
        // Vocals
        InstrumentTranslations::create(['title' => 'Vocals', 'language_id' => 1, 'instrument_id' => 7]);
        InstrumentTranslations::create(['title' => 'Вокал', 'language_id' => 2, 'instrument_id' => 7]);
    }
}
