<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Tab;
use Illuminate\Database\Seeder;

class TabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if( env('SEED_MODE') === 'dev') {
            Tab::create([
                'title' => 'Unchain Utopia',
                'downloads' => rand(0, 999),
                'band_id' => 1,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Unleashed',
                'downloads' => rand(0, 999),
                'band_id' => 1,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Wishmaster',
                'downloads' => rand(0, 999),
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Sleeping Sun',
                'downloads' => rand(0, 999),
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'End of all hope',
                'downloads' => rand(0, 999),
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Hearth like a grave',
                'downloads' => rand(0, 999),
                'band_id' => 3,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Full moon',
                'downloads' => rand(0, 999),
                'band_id' => 4,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Open my grave',
                'downloads' => rand(0, 999),
                'band_id' => 4,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Всадник из льда',
                'downloads' => rand(0, 999),
                'band_id' => 5,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Колизей',
                'downloads' => rand(0, 999),
                'band_id' => 6,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Чему веришь ты',
                'downloads' => rand(0, 999),
                'band_id' => 7,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Gallow tree',
                'downloads' => rand(0, 999),
                'band_id' => 8,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Downfall',
                'downloads' => rand(0, 999),
                'band_id' => 9,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Lai Lai Hei',
                'downloads' => rand(0, 999),
                'band_id' => 10,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Sonne',
                'downloads' => rand(0, 999),
                'band_id' => 11,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Fully Alive',
                'downloads' => rand(0, 999),
                'band_id' => 12,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Innis Mona',
                'downloads' => rand(0, 999),
                'band_id' => 13,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Never To Late',
                'downloads' => rand(0, 999),
                'band_id' => 14,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Frozen',
                'downloads' => rand(0, 999),
                'band_id' => 15,
                'file_id' => File::all()->random()->id,
            ]);
        }
    }
}
