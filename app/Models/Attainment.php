<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Attainment
 * @package App\Models
 * @version February 4, 2022, 7:16 am UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\ClassRoom $classRoom
 * @property integer $class_room_id
 * @property integer $user_id
 * @property string $date
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
     * The attributes that should be casted to native types.
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
    public static $rules = [
        'class_room_id' => 'requried',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function classRoom()
    {
        return $this->hasOne(\App\Models\ClassRoom::class, 'id', 'class_room_id');
    }
}
