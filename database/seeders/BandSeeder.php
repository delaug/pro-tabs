<?php

namespace Database\Seeders;

use App\Models\Band;
use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Band::create(['name' => 'Epica']);
        Band::create(['name' => 'Nightwish']);
        Band::create(['name' => 'Insomnium']);
        Band::create(['name' => 'Rage']);
        Band::create(['name' => 'Эпидемия']);
        Band::create(['name' => 'Ария']);
        Band::create(['name' => 'Louna']);
        Band::create(['name' => 'Engel']);
        Band::create(['name' => 'Children of Bodom']);
        Band::create(['name' => 'Ensiferum']);
        Band::create(['name' => 'Rammstein']);
        Band::create(['name' => 'Flyleaf']);
        Band::create(['name' => 'Eluveitie']);
        Band::create(['name' => 'Three Days Grace']);
        Band::create(['name' => 'Delain']);
    }
}
