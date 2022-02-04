<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Evaluation
 * @package App\Models
 * @version February 4, 2022, 7:07 am UTC
 *
 * @property \App\Models\PeriodeSetting $periodeSetting
 * @property string $evaluation_type
 * @property string $basic_competencies
 * @property string $achievements
 * @property integer $period_setting_id
 * @property integer $evaluation_id
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
        'period_setting_id',
        'evaluation_id'
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
        'period_setting_id' => 'integer',
        'evaluation_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'evaluation_type' => 'required',
        'basic_competencies' => 'required',
        'achievements' => 'required',
        'period_setting_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function periodeSetting()
    {
        return $this->hasOne(\App\Models\PeriodeSetting::class, 'id', 'period_setting_id');
    }
}
