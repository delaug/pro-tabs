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
        // If you change value more then 15, you need change array values in BandFactory too
        Band::factory(15)->create();
    }
}
