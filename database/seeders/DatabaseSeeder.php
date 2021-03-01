<?php

namespace Database\Seeders;

use App\Services\FilesFacade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        FilesFacade::import();

        $this->call([
            //BandSeeder::class,
            //TabSeeder::class,
            UserSeeder::class,
            TuneSeeder::class,
            InstrumentSeeder::class,
            TrackSeeder::class,
        ]);
    }
}
