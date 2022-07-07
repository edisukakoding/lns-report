<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class NoteAssessment
 * @package App\Models
 * @version March 2, 2022, 3:33 am UTC
 *
 * @property Student $student
 * @property integer $student_id
 * @property integer $note
 * @method static create(array $array)
 */
class NoteAssessment extends Model
{
    use SoftDeletes;


    public $table = 'note_assessments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'note'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [

    ];

    /**
     * @return BelongsTo
     **/
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
