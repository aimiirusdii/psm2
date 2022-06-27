<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->delete();

        User::create([
            'name' => 'developer',
            'email' => 'developer@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => '1',
            'profile_photo_path' => 'user3-128x128.png',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'user_type' => '1',
            'profile_photo_path' => 'user3-128x128.png',
        ]);
    }
}
