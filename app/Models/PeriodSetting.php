<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PeriodSetting
 * @package App\Models
 * @version February 4, 2022, 6:21 am UTC
 *
 * @property string $title
 * @property string $status
 * @property string $description
 * @method static create(string[] $array)
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
     * The attributes that should be cast to native types.
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
    public static array $rules = [
        'title' => 'required'
    ];


    public static function getActivePeriod(): bool|string
    {

        $period = static::query()->select()->from((new PeriodSetting)->getTable())->where('status', 1)->first();
        if($period) {
            return $period['title'];
        }

        return false;
    }
}
