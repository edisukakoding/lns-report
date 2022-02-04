<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PeriodSetting
 * @package App\Models
 * @version February 4, 2022, 6:21 am UTC
 *
 * @property string $title
 * @property string $status
 * @property string $description
 */
class PeriodSetting extends Model
{
    use SoftDeletes;


    public $table = 'period_settings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'status',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'status' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    public static function getActivePeriod()
    {
        return static::where('status', 1)->first()->title;
    }
}
