<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\user;
use Illuminate\support\carbon;
class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'hoshmand kamal',
            'email' => 'hoshmandkamal@gmail.com',
            'password' => Hash::make('1234'),
            'created_at' =>now(),
            'updated_at' =>now(),
        ]);
    }
}
