<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\AnecdoteEvaluation;
use App\Models\AnecdoteEvaluationDetail;
use App\Models\AspectSetting;
use App\Models\Attainment;
use App\Models\AttainmentDetail;
use App\Models\ClassRoom;
use App\Models\Evaluation;
use App\Models\GeneralSetting;
use App\Models\Guard;
use App\Models\NoteAssessment;
use App\Models\PeriodSetting;
use App\Models\Personal;
use App\Models\Report;
use App\Models\ScalaEvaluation;
use App\Models\ScalaEvaluationSetting;
use App\Models\Student;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws JsonException
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();
        $faker = Factory::create('id_ID');
        $roles = Config::get('constants.user_role');
        //        period setting seeder
        PeriodSetting::create([
            "title"         => date('Y') . '/' . (int) date('Y') + 1,
            "status"        => "1",
            "description"   => "periode pertama",
        ]);

        //        classroom seeder
        $class = ClassRoom::create([
            "name"          => "A",
            "description"   => "Usia 4 - 6 Tahun",
        ]);

        $no = 1;
        foreach (require( __DIR__ . '/assessments.php') as $data) {
            AspectSetting::create([
                'category'      => $data['category'],
                'subcategory'   => $data['subcategory'],
                'index'         => $no,
                'point'         => $data['point']
            ]);
            $no++;
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
        }

        $teacher_id = null;
        foreach ($roles as $role) {
            $user = User::create([
                'name'              => $faker->userName,
                'email'             => strtolower($role) . '@gmail.com',
                'role'              => $role,
                'email_verified_at' =>  now(),
                'password'          => Hash::make('asdasdasd'),
                'remember_token'    => Str::random(10)
            ]);
            //        personal seder
            $personal = Personal::create([
                "firstname"         => $faker->firstName,
                "lastname"          => $faker->lastName,
                "phone"             => $faker->phoneNumber,
                "birthplace"        => $faker->city,
                "birthdate"         => $faker->dateTimeBetween('-30 years', '-20 years', 'Asia/Jakarta'),
                "address"           => $faker->address,
                "graduates"         => $faker->randomElement(['SE', 'S.Kom', 'S.Pd']) . ' - Pendidikan',
                'title'             => $faker->randomElement(['SE', 'S.Kom', 'S.Pd']),
                "image"             => 'public/profiles/avatar.png',
                "user_id"           => $user->id,
            ]);

            if($role === User::TEACHER) {
                $teacher_id = $user->id;
                $class->homeroom = $personal->id;
                $class->save();
            }
            //        student seeder
            $gender = Config::get('constants.gender');
            $student = Student::create([
                'period'                    => PeriodSetting::getActivePeriod(),
                'gender'                    => $faker->randomElement($gender),
                'address'                   => $faker->address,
                'birthdate'                 => $faker->dateTimeBetween('-6 years', '-4 years', 'Asia/Jakarta'),
                'birthplace'                => $faker->city,
                'class_room_id'             => $class->id,
                'disabled'                  => '-',
                'distance_home_to_school'   => '+/- ' . $faker->randomNumber() . ' KM',
                'district'                  => $faker->city,
                'email'                     => $faker->email,
                'hamlet'                    => $faker->city,
                'height'                    => 130,
                'weight'                    => 40,
                'is_kps'                    => true,
                'is_pip'                    => true,
                'name'                      => $faker->name,
                'nationality'               => 'Indonesia',
                'neighbourhood'             => '-',
                'nik'                       => $faker->numerify('################'),
                'phone'                     => $faker->phoneNumber,
                'postal_code'               => $faker->postcode,
                'regency'                   => 'Jawa Tengah',
                'religion'                  => 'ISLAM',
                'telephone'                 => '-',
                'time_go_to_school'         => '+/- 1 Jam',
                'village'                   => $faker->city,
                'urban_village'             => $faker->city
            ]);
//                wali seeder
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

            if($role === User::HEADMASTER) {
                GeneralSetting::create([
                    'paud_name' => 'KB Anak Hebat Indonesia',
                    'paud_address' => 'Dukuh Titang RT 03 RW 02, Bumirejo, Karangawen, Demak 59566',
                    'paud_phone_number' => null,
                    'paud_fax' => null,
                    'paud_telephone' => null,
                    'paud_email' => 'suparnyoskom@yahoo.co.id',
                    'paud_website' => null,
                    'head_of_paud' => $personal->id
                ]);
            }
        }

        $value = Config::get('constants.evaluation_indicators');
        foreach (Student::all() as $student) {
            // evaluasi skala per siswa
            foreach ($indicators as $indicator) {
                $scala = ScalaEvaluation::create([
                    "student_id"    => $student->id,
                    "user_id"       => $teacher_id,
                    "date"          => $faker->dateTimeThisMonth,
                    "indicator"     => $indicator,
                ]);

                //evaluasi
                Evaluation::create([
                    "period"                => PeriodSetting::getActivePeriod(),
                    "user_id"               => $teacher_id,
                    "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                    "basic_competencies"    => $faker->sentence(),
                    "evaluation_id"         => $scala->id,
                    "evaluation_type"       => 'SKALA'
                ]);

            }

            //        attainments seeder
            $attainment = Attainment::create([
                "user_id"       => $teacher_id,
                "date"          => $faker->dateTimeThisMonth,
                "class_room_id" => $class->id
            ]);

            $attainmentDetail = AttainmentDetail::create([
                "attainment_id"     => $attainment->id,
                "student_id"        => $student->id,
                "description"       => $faker->paragraphs(10, true),
                "title"             => $faker->sentence(),
            ]);

            Evaluation::create([
                "period"                => PeriodSetting::getActivePeriod(),
                "user_id"               => $teacher_id,
                "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                "basic_competencies"    => $faker->sentence(),
                "evaluation_id"         => $attainmentDetail->id,
                "evaluation_type"       => 'HASIL KARYA'
            ]);

            // catatan anekdot
            $anecdote = AnecdoteEvaluation::create([
                'user_id'   => $teacher_id,
                'class_room_id' => $class->id,
                'date'      => $faker->dateTimeThisMonth,
            ]);

            $anecdoteDetail = AnecdoteEvaluationDetail::create([
                'student_id'    => $student->id,
                'anecdote_evaluation_id'    => $anecdote->id,
                'location'  => $faker->city,
                'incident'  => $faker->paragraphs(10, true),
                'time'  => $faker->time
            ]);

            Evaluation::create([
                "period"                => PeriodSetting::getActivePeriod(),
                "user_id"               => $teacher_id,
                "achievements"          => $value[$faker->randomFloat(3, 0, 3)],
                "basic_competencies"    => $faker->sentence(),
                "evaluation_id"         => $anecdoteDetail->id,
                "evaluation_type"       => 'ANEKDOT'
            ]);

            foreach (AspectSetting::all() as $aspect) {
                Report::create([
                    'student_id'    => $student->id,
                    'user_id'       => $teacher_id,
                    'aspect'        => Json::encode($aspect),
                    'value'         => $faker->randomElement(['BAIK', 'CUKUP', 'PERLU DILATIH'])
                ]);
            }

            NoteAssessment::create([
                'student_id' => $student->id,
                'note' => $faker->realText
            ]);
        }
    }
}
