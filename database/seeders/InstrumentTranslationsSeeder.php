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
        InstrumentTranslations::create(['title' => 'Electric Guitar', 'lang' => 'en', 'instrument_id' => 1]);
        InstrumentTranslations::create(['title' => 'Электрогитара', 'lang' => 'ru', 'instrument_id' => 1]);
        // Acoustic Guitar
        InstrumentTranslations::create(['title' => 'Acoustic Guitar', 'lang' => 'en', 'instrument_id' => 2]);
        InstrumentTranslations::create(['title' => 'Акустическая гитара', 'lang' => 'ru', 'instrument_id' => 2]);
        // Bass Guitar
        InstrumentTranslations::create(['title' => 'Bass Guitar', 'lang' => 'en', 'instrument_id' => 3]);
        InstrumentTranslations::create(['title' => 'Бас-гитара', 'lang' => 'ru', 'instrument_id' => 3]);
        // Drums
        InstrumentTranslations::create(['title' => 'Drums', 'lang' => 'en', 'instrument_id' => 4]);
        InstrumentTranslations::create(['title' => 'Барабаны', 'lang' => 'ru', 'instrument_id' => 4]);
        // Keyboards
        InstrumentTranslations::create(['title' => 'Keyboards', 'lang' => 'en', 'instrument_id' => 5]);
        InstrumentTranslations::create(['title' => 'Клавишные', 'lang' => 'ru', 'instrument_id' => 5]);
        // Violin
        InstrumentTranslations::create(['title' => 'Violin', 'lang' => 'en', 'instrument_id' => 6]);
        InstrumentTranslations::create(['title' => 'Скрипка', 'lang' => 'ru', 'instrument_id' => 6]);
        // Vocals
        InstrumentTranslations::create(['title' => 'Vocals', 'lang' => 'en', 'instrument_id' => 7]);
        InstrumentTranslations::create(['title' => 'Вокал', 'lang' => 'ru', 'instrument_id' => 7]);
    }
}
