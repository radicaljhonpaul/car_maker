<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'email' => 'carmaker1@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
                'updated_at' => Carbon::today()->subDays(rand(0, 365)),
            ],

            [
                'email' => 'carmaker2@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'remember_token' => null,
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
                'updated_at' => Carbon::today()->subDays(rand(0, 365)),
            ],
        ]);
    }
}
