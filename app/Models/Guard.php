<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Guard
 * @package App\Models
 * @version February 4, 2022, 2:29 am UTC
 *
 * @property integer $student_id
 * @property string $type
 * @property string $name
 * @property integer $birthyear
 * @property string $graduates
 * @property string $job
 * @property integer $income
 * @property string $status
 * @method static create(array $array)
 */
class Guard extends Model
{
    use SoftDeletes;


    public $table = 'guards';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'type',
        'name',
        'birthyear',
        'graduates',
        'job',
        'income',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'birthyear' => 'integer',
        'graduates' => 'string',
        'job' => 'string',
        'income' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'type' => 'required',
        'name' => 'required'
    ];

    /*
     *
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
