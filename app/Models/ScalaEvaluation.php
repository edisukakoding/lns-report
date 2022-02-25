<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
     * The attributes that should be cast to native types.
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
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param string|null $keyword
     * @return array
     */
    public static function makeSelect2(?string $keyword): array
    {
        $search     = "%" . $keyword . '%' ?? "%";
        $results    = [];
        $query      = DB::table('scala_evaluations')
            ->join('students', 'scala_evaluations.student_id', '=', 'students.id')
            ->join('class_rooms', 'students.class_room_id', '=', 'class_rooms.id')
            ->whereNull('scala_evaluations.deleted_at')
            ->where('scala_evaluations.user_id', Auth::id())
            ->where('students.period', PeriodSetting::getActivePeriod())
            ->where('scala_evaluations.indicator', 'like', $search)
            ->orWhere('students.name', 'like', $search)
            ->select([
                'scala_evaluations.id',
                'students.name',
                'scala_evaluations.indicator',
                'class_rooms.name as class'
            ]);

        foreach ($query->get() as $item) {
            $results[] = [
                'id'    => $item->id,
                'text'  => $item->name . ' ( ' . $item->class . ' ) ' . ' | ' . $item->indicator
            ];
        }
        return $results;
    }
}
