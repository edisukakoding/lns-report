<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Raport
 * @package App\Models
 * @version February 4, 2022, 7:39 am UTC
 *
 * @property \App\Models\Student $student
 * @property \App\Models\User $user
 * @property integer $student_id
 * @property string $aspect
 * @property integer $teacher_id
 * @property string $value
 */
class Raport extends Model
{
    use SoftDeletes;


    public $table = 'raports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'aspect',
        'teacher_id',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'aspect' => 'string',
        'teacher_id' => 'integer',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required',
        'aspect' => 'required',
        'teacher_id' => 'required',
        'value' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function student()
    {
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }
}
