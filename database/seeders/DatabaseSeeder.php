<?php

namespace Database\Seeders;

use App\Services\FilesFacade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory(FilesFacade::getTabsPath());

        switch(env('SEED_MODE')) {
            case 'production':
                FilesFacade::import();
                break;
            case 'dev':
                FilesFacade::import(20, true);
                break;
        }

        $this->call([
            LanguageSeeder::class,
            BandSeeder::class,
            // FileSeeder::class, // Don't need if used import()
            TabSeeder::class,
            UserSeeder::class,
            TuneSeeder::class,
            InstrumentSeeder::class,
            InstrumentTranslationsSeeder::class,
            TrackSeeder::class,
        ]);
    }
}
