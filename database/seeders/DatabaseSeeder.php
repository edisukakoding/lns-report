<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\PeriodSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\User::factory(10)->create();
        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@gmail.com',
            'role'              => 'ADMIN',
            'email_verified_at' =>  now(),
            'password'          => Hash::make('asdasdasd'),
            'remember_token'    => Str::random(10)
        ]);

//        period setting seeder
        PeriodSetting::create([
            "title"         => "2021/2022",
            "status"        => "1",
            "description"   => "periode pertama",
        ]);

//        classroom seeder
        ClassRoom::create([
            "name"          => "A",
            "description"   => "Usia 4 - 6 Tahun"
        ]);
    }
}
