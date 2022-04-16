<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Raport
 * @package App\Models
 * @version February 4, 2022, 7:39 am UTC
 *
 * @property Student $student
 * @property User $user
 * @property integer $student_id
 * @property string $aspect
 * @property integer $user_id
 * @property string $value
 * @method static create(array $array)
 */
class Report extends Model
{
    use SoftDeletes;


    public $table = 'reports';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'aspect',
        'user_id',
        'value'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'aspect' => 'array',
        'user_id' => 'integer',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'student_id' => 'required',
        'aspect' => 'required',
        'value' => 'required'
    ];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
