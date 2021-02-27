<?php

namespace Database\Seeders;

use App\Models\Tune;
use Illuminate\Database\Seeder;

class TuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tune::factory(6)->create();
    }
}
