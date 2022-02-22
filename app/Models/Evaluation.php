<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Evaluation
 * @package App\Models
 * @version February 4, 2022, 7:07 am UTC
 *
 * @property string $period
 * @property string $evaluation_type
 * @property string $basic_competencies
 * @property string $achievements
 * @property integer $period_setting_id
 * @property integer $evaluation_id
 * @method static create(array $array)
 */
class Evaluation extends Model
{
    use SoftDeletes;


    public $table = 'evaluations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'evaluation_type',
        'basic_competencies',
        'achievements',
        'period',
        'evaluation_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'evaluation_type' => 'string',
        'basic_competencies' => 'string',
        'achievements' => 'string',
        'period' => 'string',
        'evaluation_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'evaluation_type' => 'required',
        'basic_competencies' => 'required',
        'achievements' => 'required'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scala(): BelongsTo
    {
        return $this->belongsTo(ScalaEvaluation::class, 'evaluation_id', 'id');
    }

    public function attainmentDetail(): BelongsTo
    {
        return $this->belongsTo(AttainmentDetail::class, 'evaluation_id', 'id');
    }
}
