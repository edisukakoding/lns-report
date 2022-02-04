<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AnecdoteEvaluationDetail
 * @package App\Models
 * @version February 4, 2022, 6:56 am UTC
 *
 * @property \App\Models\anecdot_evaluations $id
 * @property \App\Models\users $users
 * @property integer $anecdot_evaluation_id
 * @property string $location
 * @property string $time
 * @property integer $student_id
 * @property string $incident
 * @property string $basic_competencies
 * @property string $achievements
 */
class AnecdoteEvaluationDetail extends Model
{
    use SoftDeletes;


    public $table = 'anecdot_evaluation_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'anecdot_evaluation_id',
        'location',
        'time',
        'student_id',
        'incident',
        'basic_competencies',
        'achievements'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'anecdot_evaluation_id' => 'integer',
        'location' => 'string',
        'time' => 'datetime',
        'student_id' => 'integer',
        'incident' => 'string',
        'basic_competencies' => 'string',
        'achievements' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'anecdot_evaluation_id' => 'required',
        'location' => 'required',
        'student_id' => 'required',
        'incident' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\anecdot_evaluations::class, 'id', 'anecdot_evaluatoin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function users()
    {
        return $this->hasOne(\App\Models\users::class, 'id', 'student_id');
    }
}
