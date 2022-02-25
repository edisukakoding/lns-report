<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
 * @method static create(array $array)
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

    /**
     * @param string|null $keyword
     * @return array
     */
    public static function makeSelect2(?string $keyword): array
    {
        $search     = "%" . $keyword . '%' ?? "%";
        $results    = [];
        $query      = DB::table('anecdote_evaluation_details')
            ->join('students', 'students.id', '=', 'anecdote_evaluation_details.student_id')
            ->join('anecdote_evaluations', 'anecdote_evaluations.id', '=', 'anecdote_evaluation_details.anecdote_evaluation_id')
            ->join('users', 'users.id', '=', 'anecdote_evaluations.user_id')
            ->join('class_rooms', 'class_rooms.id', 'students.class_room_id')
            ->whereNull('anecdote_evaluation_details.deleted_at')
            ->where('students.period', PeriodSetting::getActivePeriod())
            ->where('anecdote_evaluations.user_id', Auth::id())
            ->where(function ($query) use ($search) {
                $query->where('anecdote_evaluation_details.location', 'like', $search);
                $query->orWhere('anecdote_evaluation_details.incident', 'like', $search);
                $query->orWhere('students.name', 'like', $search);
            })
            ->select([
                'anecdote_evaluation_details.id',
                'students.name',
                'class_rooms.name as class',
                'anecdote_evaluation_details.location',
                'anecdote_evaluation_details.incident'
            ]);

        foreach ($query->get() as $item) {
            $results[] = [
                'id'    => $item->id,
                'text'  => $item->name . ' ( ' . $item->class . ' ) ' . ' | ' . $item->location . ' | ' . Str::limit(strip_tags($item->incident), 60)
            ];
        }
        return $results;
    }
}
