<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HmUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('hm_user')->insert([
            [
                'id'       => 1,
                'name'     => 'zodiac pastry',
                'email'    => 'zodiac@gmail.com',
                'password' => Hash::make('pos'),  // password 'pos'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'       => 2,
                'name'     => 'scorpion',
                'email'    => 'tarot@gmail.com',
                'password' => Hash::make('scorpion'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'       => 3,
                'name'     => 'bakery pastry',
                'email'    => 'bakery@gmail.com',
                'password' => Hash::make('pastry'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
