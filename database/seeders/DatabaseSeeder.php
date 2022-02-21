<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\PeriodSetting;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
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

//        student seeder
        Student::create([
            'period'                    => PeriodSetting::getActivePeriod(),
            'gender'                    => 'Pria',
            'address'                   => 'Jl. Karangsono',
            'birthdate'                 => '1998-09-13',
            'birthplace'                => 'Demak',
            'class_room_id'             => 1,
            'disabled'                  => '-',
            'distance_home_to_school'   => '+/- 1 KM',
            'district'                  => 'Demak',
            'email'                     => 'edi.sukakoding@gmail.com',
            'hamlet'                    => 'Krajan',
            'height'                    => 130,
            'weight'                    => 40,
            'is_kps'                    => true,
            'is_pip'                    => true,
            'name'                      => 'Edi Hartono',
            'nationality'               => 'Indonesia',
            'neighbourhood'             => '-',
            'nik'                       => '332101130998001',
            'phone'                     => '089664684169',
            'postal_code'               => 59567,
            'regency'                   => 'Jawa Tengah',
            'religion'                  => 'ISLAM',
            'telephone'                 => '-',
            'time_go_to_school'         => '+/- 1 Jam',
            'village'                   => 'Karangsono',
            'urban_village'             => 'Mranggen'
        ]);
    }
}
