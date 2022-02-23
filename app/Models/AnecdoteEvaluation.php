<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class AnecdoteEvaluation
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


    public $table = 'anecdote_evaluations';


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
        'date' => 'required'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function classRoom(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
