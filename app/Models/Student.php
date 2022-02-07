<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Student
 * @package App\Models
 * @version February 2, 2022, 7:03 am UTC
 *
 * @property \App\Models\ClassRoom $classRoom
 * @property integer $class_room_id
 * @property string $name
 * @property string $gender
 * @property string $nik
 * @property string $birthplace
 * @property string $birthdate
 * @property string $religion
 * @property string $disabled
 * @property string $address
 * @property string $neighbourhood
 * @property string $hamlet
 * @property string $village
 * @property string $urban_village
 * @property string $district
 * @property string $regency
 * @property string $postal_code
 * @property string $telephone
 * @property string $phone
 * @property string $email
 * @property boolean $is_kps
 * @property boolean $is_pip
 * @property string $nationality
 * @property integer $height
 * @property integer $weight
 * @property string $distance_home_to_school
 * @property string $time_go_to_school
 * @property string period
 */
class Student extends Model
{
    use SoftDeletes;


    public $table = 'students';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'class_room_id',
        'name',
        'gender',
        'nik',
        'birthplace',
        'birthdate',
        'religion',
        'disabled',
        'address',
        'neighbourhood',
        'hamlet',
        'village',
        'urban_village',
        'district',
        'regency',
        'postal_code',
        'telephone',
        'phone',
        'email',
        'is_kps',
        'is_pip',
        'nationality',
        'height',
        'weight',
        'distance_home_to_school',
        'time_go_to_school',
        'period'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_room_id' => 'integer',
        'name' => 'string',
        'gender' => 'string',
        'nik' => 'string',
        'birthplace' => 'string',
        'birthdate' => 'date',
        'religion' => 'string',
        'disabled' => 'string',
        'address' => 'string',
        'neighbourhood' => 'string',
        'hamlet' => 'string',
        'village' => 'string',
        'urban_village' => 'string',
        'district' => 'string',
        'regency' => 'string',
        'postal_code' => 'string',
        'telephone' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'is_kps' => 'boolean',
        'is_pip' => 'boolean',
        'nationality' => 'string',
        'height' => 'integer',
        'weight' => 'integer',
        'distance_home_to_school' => 'string',
        'time_go_to_school' => 'string',
        'period' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'class_room_id' => 'exists:class_rooms,id|required',
        'name' => 'required',
        'gender' => 'required',
        'nik' => 'required|max:16',
        'birthplace' => 'required',
        'birthdate' => 'required',
        'religion' => 'required',
        'address' => 'required',
        'email' => 'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public static function makeOptionList()
    {
        $option = ['' => '- Pilih Siswa -'];
        foreach (static::with('classRoom')->where('period', PeriodSetting::getActivePeriod())->get() as $student) {
            $option[$student->id] = $student->name . ' ( Kelas ' . $student->classRoom->name . ' )';
        }

        return $option;
    }
}
