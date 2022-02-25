<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

    /**
 * @param string|null $keyword
 * @return array
 */
    public static function makeSelect2(?string $keyword): array
    {
        $search     = "%" . $keyword . '%' ?? "%";
        $results    = [];
        $query      = DB::table('attainment_details')
            ->join('students', 'students.id', '=', 'attainment_details.student_id')
            ->join('attainments', 'attainments.id', '=', 'attainment_details.attainment_id')
            ->join('users', 'users.id', '=', 'attainments.user_id')
            ->join('class_rooms', 'class_rooms.id', 'students.class_room_id')
            ->whereNull('attainment_details.deleted_at')
            ->where('students.period', PeriodSetting::getActivePeriod())
            ->where('attainments.user_id', Auth::id())
            ->orWhere('attainment_details.title', 'like', $search)
            ->orWhere('students.name', 'like', $search)
            ->select([
                'attainment_details.id',
                'students.name',
                'class_rooms.name as class',
                'attainment_details.title'
            ]);


        foreach ($query->get() as $item) {
            $results[] = [
                'id'    => $item->id,
                'text'  => $item->name . ' ( ' . $item->class . ' ) ' . ' | ' . $item->title
            ];
        }
        return $results;
    }
}
