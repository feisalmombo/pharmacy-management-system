<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
       $user = User::create([
            'name' => "Feisal Mombo",
            'email' => "feisalmombo29@gmail.com",
            'password' => Hash::make('developer'),
        ]);
        $user->assignRole('super-admin');
    }
}
