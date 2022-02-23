<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


/**
 * Class ScalaEvaluation
 * @package App\Models
 * @version February 7, 2022, 8:13 am UTC
 *
 * @property Student $student
 * @property User $user
 * @property string $date
 * @property integer $student_id
 * @property string $indicator
 * @property integer $user_id
 * @method belongsTo(string $class)
 * @method static where(string $string, $id)
 * @method static create(array $array)
 */
class ScalaEvaluation extends Model
{
    use SoftDeletes;


    public $table = 'scala_evaluations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'date',
        'student_id',
        'indicator',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'student_id' => 'integer',
        'indicator' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'date' => 'required',
        'student_id' => 'required',
        'indicator' => 'required'
    ];

    /**
     * @return BelongsTo
     **/
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return BelongsTo
     **/
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function makeSelect2(string $keyword): array
    {
        $results    = [];
        $query      = static::where('user_id', Auth::id())
            ->where('indicator', 'like', $keyword)
            ->whereHas('student', function ($student) use ($keyword) {
                $student->where('period', PeriodSetting::getActivePeriod())->where('name', 'like', $keyword);
            });

        foreach ($query->get() as $item) {
            $results[] = [
                'id'    => $item->id,
                'text'  => $item->student->name . ' ( ' . $item->student->classRoom->name . ' )' . ' | ' . $item->indicator
            ];
        }
        return $results;
    }
}
