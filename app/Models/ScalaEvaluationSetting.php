<?php

namespace App\Models;

//use Collective\Html\Eloquent as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ScalaEvaluationSetting
 * @package App\Models
 * @version February 4, 2022, 6:25 am UTC
 *
 * @property string $value
 * @property string $description
 * @method static create(array $array)
 */
class ScalaEvaluationSetting extends Model
{
    use SoftDeletes;


    public $table = 'scala_evaluation_settings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'value',
        'description'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'value' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public static function makeOptionList(): array
    {
        $option = ['' => '- Pilih Indikator -'];
        foreach (static::all() as $scala) {
            $option[$scala->value] = $scala->value;
        }

        return $option;
    }
}
