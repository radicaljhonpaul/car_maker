<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert([
            [
                'fname' => 'JP1',
                'lname' => 'Quiñal1',
                'user_id_fk' => 1,
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
                'updated_at' => Carbon::today()->subDays(rand(0, 365)),
            ],

            [
                'fname' => 'JP2',
                'lname' => 'Quiñal2',
                'user_id_fk' => 2,
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
                'updated_at' => Carbon::today()->subDays(rand(0, 365)),
            ],
        ]);
    }
}
