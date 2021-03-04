<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\TokenFacade;
use App\Services\TokenService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'abilities' => TokenFacade::serialize(TokenFacade::getAbilities(TokenService::ABILITY_SUPER_ADMIN)),
        ]);

        if( env('SEED_MODE') === 'dev') {
            User::create([
                'name' => 'user',
                'email' => 'user@loc.ru',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'abilities' => TokenFacade::serialize(TokenFacade::getAbilities(TokenService::ABILITY_USER)),
            ]);

            User::create([
                'name' => 'manager',
                'email' => 'manager@loc.ru',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'abilities' => TokenFacade::serialize(TokenFacade::getAbilities(TokenService::ABILITY_USER)),
            ]);
        }
    }
}
