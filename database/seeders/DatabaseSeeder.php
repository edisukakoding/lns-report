<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\AnecdoteEvaluation;
use App\Models\AnecdoteEvaluationDetail;
use App\Models\Attainment;
use App\Models\AttainmentDetail;
use App\Models\ClassRoom;
use App\Models\Evaluation;
use App\Models\Guard;
use App\Models\PeriodSetting;
use App\Models\Personal;
use App\Models\ScalaEvaluation;
use App\Models\ScalaEvaluationSetting;
use App\Models\Student;
use App\Models\User;
use Faker\Factory;
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
        $faker = Factory::create('id_ID');
        $user = User::create([
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
        $class = ClassRoom::create([
            "name"          => "A",
            "description"   => "Usia 4 - 6 Tahun"
        ]);

//        student seeder
        $student = Student::create([
            'period'                    => PeriodSetting::getActivePeriod(),
            'gender'                    => 'Pria',
            'address'                   => 'Jl. Karangsono',
            'birthdate'                 => '1998-09-13',
            'birthplace'                => 'Demak',
            'class_room_id'             => $class->id,
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

//        personal seder
        Personal::create([
            "firstname"         => 'Administration',
            "lastname"          => 'System',
            "phone"             => '089664684169',
            "birthplace"        => 'Mars',
            "birthdate"         => '2222-02-22',
            "address"           => 'Jl. inaja dulu',
            "graduates"         => 'S4 - Metavers Engineering',
            "image"             => 'public/profiles/avatar.png',
            "user_id"           => $user->id,
        ]);

//        wali seeder

        foreach (Helper::assoc_of_array(Config::get('constants.guards')) as $guard) {
            $gender = match ($guard) {
                'AYAH' => 'male',
                'IBU' => 'female',
                default => null,
            };
            Guard::create([
                "name"      => $faker->name($gender),
                "graduates" => $faker->century() . ' University',
                "status"    => "-",
                "birthyear" => $faker->year,
                "income"    => $faker->numerify('#####000'),
                "job"       => $faker->jobTitle,
                "type"      => $guard,
                "student_id"=> $student->id,
            ]);
        }

//        scala seeder
        $indicators = [
            'Terbiasa mengucapkan rasa syukur terhadap ciptaan Tuhan',
            'Berdoa sebelum dan sesudah belajar',
            'Terbiasa mencuci tangan dan menggosok gigi',
            'Menyebutkan nama anggota tubuh dan fungsi anggota tubuh',
            'Terbiasa merawat diri sesuai tata caranya',
            'Terbiasa berlaku ramah',
            'Terbiasa mengikuti aturan',
            'Mengelompokkan berdasarkan warna (merah, biru, kuning)',
            'Menjawab pertanyaan terkait cerita yang dibacakan',
            'Menyanyikan lagu “Aku Ciptaan Tuhan”'
        ];

        foreach ($indicators as $indicator) {
            ScalaEvaluationSetting::create([
                "value" => $indicator,
                "description" => 'sample'
            ]);

            ScalaEvaluation::create([
                "student_id"    => $student->id,
                "user_id"       => $user->id,
                "date"          => $faker->date,
                "indicator"     => $indicator,
            ]);
        }
//        evaluation scala seeder
        $value = Config::get('constants.evaluation_indicators');
        foreach (ScalaEvaluation::all() as $scala) {
            Evaluation::create([
                "period"                => PeriodSetting::getActivePeriod(),
                "user_id"               => $user->id,
                "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                "basic_competencies"    => $faker->sentence(),
                "evaluation_id"         => $scala->id,
                "evaluation_type"       => 'SKALA'
            ]);
        }

//        attainments seeder
        $attainment = Attainment::create([
            "user_id"       => $user->id,
            "date"          => $faker->date,
            "class_room_id" => $class->id
        ]);

        AttainmentDetail::create([
            "attainment_id"     => $attainment->id,
            "student_id"        => $student->id,
            "description"       => $faker->paragraphs(10, true),
            "title"             => $faker->sentence(),
        ]);

        foreach (AttainmentDetail::all() as $attainmentDetail) {
            Evaluation::create([
                "period"                => PeriodSetting::getActivePeriod(),
                "user_id"               => $user->id,
                "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                "basic_competencies"    => $faker->sentence(),
                "evaluation_id"         => $attainmentDetail->id,
                "evaluation_type"       => 'HASIL KARYA'
            ]);
        }

        $anecdote = AnecdoteEvaluation::create([
            'user_id'   => $user->id,
            'class_room_id' => $class->id,
            'date'      => $faker->date,
        ]);

        AnecdoteEvaluationDetail::create([
            'student_id'    => $student->id,
            'anecdote_evaluation_id'    => $anecdote->id,
            'location'  => $faker->city,
            'incident'  => $faker->paragraphs(10, true),
            'time'  => $faker->time
        ]);

        foreach (AnecdoteEvaluationDetail::all() as $anecdoteDetail) {
            Evaluation::create([
                "period"                => PeriodSetting::getActivePeriod(),
                "user_id"               => $user->id,
                "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                "basic_competencies"    => $faker->sentence(),
                "evaluation_id"         => $anecdoteDetail->id,
                "evaluation_type"       => 'ANEKDOT'
            ]);
        }
    }
}
