<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AnecdoteEvaluationDetail
 * @package App\Models
 * @version February 4, 2022, 6:56 am UTC
 *
 * @property AnecdoteEvaluation $id
 * @property User $users
 * @property integer $anecdote_evaluation_id
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


    public $table = 'anecdote_evaluation_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'anecdote_evaluation_id',
        'location',
        'time',
        'student_id',
        'incident',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'anecdote_evaluation_id' => 'integer',
        'location' => 'string',
        'time' => 'datetime',
        'student_id' => 'integer',
        'incident' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'anecdote_evaluation_id' => 'required',
        'location' => 'required',
        'student_id' => 'required',
        'incident' => 'required'
    ];

    /**
     * @return BelongsTo
     **/
    public function anecdoteEvaluation(): BelongsTo
    {
        return $this->belongsTo(AnecdoteEvaluation::class);
    }

    /**
     * @return BelongsTo
     **/
    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }

    /**
     * @param $value
     * @return string
     */
    public function getTimeAttribute($value): string
    {
        return $value;
    }
}
