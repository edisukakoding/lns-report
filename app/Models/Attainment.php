<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Attainment
 * @package App\Models
 * @version February 4, 2022, 7:16 am UTC
 *
 * @property User $user
 * @property ClassRoom $classRoom
 * @property integer $class_room_id
 * @property integer $user_id
 * @property string $date
 * @method static create(array $array)
 */
class Attainment extends Model
{
    use SoftDeletes;


    public $table = 'attainments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'class_room_id',
        'user_id',
        'date'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_room_id' => 'integer',
        'user_id' => 'integer',
        'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'class_room_id' => 'required',
    ];

    /**
     * @return HasOne
     **/
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     **/
    public function classRoom(): HasOne
    {
        return $this->hasOne(ClassRoom::class, 'id', 'class_room_id');
    }
}
