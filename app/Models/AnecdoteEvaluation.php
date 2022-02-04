<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AnecdotEvaluation
 * @package App\Models
 * @version February 4, 2022, 6:48 am UTC
 *
 * @property integer $class_room_id
 * @property integer $user_id
 * @property string $date
 */
class AnecdoteEvaluation extends Model
{
    use SoftDeletes;


    public $table = 'anecdot_evaluations';


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
        'class_room_id' => 'required',
        'user_id' => 'required',
        'date' => 'required'
    ];


}
