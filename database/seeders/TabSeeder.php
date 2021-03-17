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
                'band_id' => 1,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Unleashed',
                'band_id' => 1,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Wishmaster',
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Sleeping Sun',
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'End of all hope',
                'band_id' => 2,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Hearth like a grave',
                'band_id' => 3,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Full moon',
                'band_id' => 4,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Open my grave',
                'band_id' => 4,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Всадник из льда',
                'band_id' => 5,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Колизей',
                'band_id' => 6,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Чему веришь ты',
                'band_id' => 7,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Gallow tree',
                'band_id' => 8,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Downfall',
                'band_id' => 9,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Lai Lai Hei',
                'band_id' => 10,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Sonne',
                'band_id' => 11,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Fully Alive',
                'band_id' => 12,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Innis Mona',
                'band_id' => 13,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Never To Late',
                'band_id' => 14,
                'file_id' => File::all()->random()->id,
            ]);
            Tab::create([
                'title' => 'Frozen',
                'band_id' => 15,
                'file_id' => File::all()->random()->id,
            ]);
        }
    }
}
