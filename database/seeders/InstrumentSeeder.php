<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Electric Guitar
        Instrument::create([]);
        // Acoustic Guitar
        Instrument::create([]);
        // Bass Guitar
        Instrument::create([]);
        // Drums
        Instrument::create([]);
        // Keyboards
        Instrument::create([]);
        // Violin
        Instrument::create([]);
        // Vocals
        Instrument::create([]);
    }
}
