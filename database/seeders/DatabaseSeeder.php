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
        switch(env('SEED_MODE')) {
            case 'production':
                FilesFacade::import();
                break;
            case 'dev':
                FilesFacade::import(200, true);
                break;
        }

        $this->call([
            BandSeeder::class,
            TabSeeder::class,
            UserSeeder::class,
            TuneSeeder::class,
            InstrumentSeeder::class,
            TrackSeeder::class,
        ]);
    }
}
