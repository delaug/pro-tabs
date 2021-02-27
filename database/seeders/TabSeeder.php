<?php

namespace Database\Seeders;

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
        Tab::create([
            'title' => 'Unchain Utopia',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 1,
        ]);
        Tab::create([
            'title' => 'Unleashed',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 1,
        ]);
        Tab::create([
            'title' => 'Wishmaster',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 2,
        ]);
        Tab::create([
            'title' => 'Sleeping Sun',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 2,
        ]);
        Tab::create([
            'title' => 'End of all hope',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 2,
        ]);
        Tab::create([
            'title' => 'Hearth like a grave',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 3,
        ]);
        Tab::create([
            'title' => 'Full moon',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 4,
        ]);
        Tab::create([
            'title' => 'Open my grave',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 4,
        ]);
        Tab::create([
            'title' => 'Всадник из льда',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 5,
        ]);
        Tab::create([
            'title' => 'Колизей',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 6,
        ]);
        Tab::create([
            'title' => 'Чему веришь ты',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 7,
        ]);
        Tab::create([
            'title' => 'Gallow tree',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 8,
        ]);
        Tab::create([
            'title' => 'Downfall',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 9,
        ]);
        Tab::create([
            'title' => 'Lai Lai Hei',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 10,
        ]);
        Tab::create([
            'title' => 'Sonne',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 11,
        ]);
        Tab::create([
            'title' => 'Fully Alive',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 12,
        ]);
        Tab::create([
            'title' => 'Innis Mona',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 13,
        ]);
        Tab::create([
            'title' => 'Never To Late',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 14,
        ]);
        Tab::create([
            'title' => 'Frozen',
            'src' => '/storage/rosalia_jakubowski/file.gtp',
            'downloads' => rand(0, 999),
            'band_id' => 15,
        ]);
    }
}
