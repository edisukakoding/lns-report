<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AttainmentDetail
 * @package App\Models
 * @version February 4, 2022, 7:23 am UTC
 *
 * @property Attainment $attainment
 * @property Student $student
 * @property integer $attainment_id
 * @property integer $student_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @method static create(array $array)
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
     * The attributes that should be cast to native types.
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
    public static array $rules = [
        'student_id' => 'required',
        'title' => 'required',
        'description' => 'required'
    ];

    /**
     * @return HasOne
     **/
    public function attainment(): HasOne
    {
        return $this->hasOne(Attainment::class, 'id', 'attainment_id');
    }

    /**
     * @return HasOne
     **/
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
