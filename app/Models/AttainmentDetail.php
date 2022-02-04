<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AttainmentDetail
 * @package App\Models
 * @version February 4, 2022, 7:23 am UTC
 *
 * @property \App\Models\Attainment $attainment
 * @property \App\Models\Student $student
 * @property integer $attainment_id
 * @property integer $student_id
 * @property string $title
 * @property string $description
 * @property string $image
 */
class AttainmentDetail extends Model
{
    use SoftDeletes;


    public $table = 'attainment_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'attainment_id',
        'student_id',
        'title',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'attainment_id' => 'integer',
        'student_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'attainment_id' => 'required',
        'student_id' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function attainment()
    {
        return $this->hasOne(\App\Models\Attainment::class, 'id', 'attainment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function student()
    {
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }
}
