<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nette\Utils\Json;
use Nette\Utils\JsonException;


/**
 * Class AspectSetting
 * @package App\Models
 * @version February 26, 2022, 2:53 am UTC
 *
 * @property string $category
 * @property string $subcategory
 * @property string $point
 * @property integer $index
 * @method static create(string[] $array)
 */
class AspectSetting extends Model
{
    use SoftDeletes;


    public $table = 'aspect_settings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'category',
        'subcategory',
        'point',
        'index'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category' => 'string',
        'subcategory' => 'string',
        'point' => 'string',
        'index' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'category' => 'required',
        'point' => 'required',
        'index' => 'required|unique:aspect_settings,index'
    ];

    /**
     * @throws JsonException
     */
    public static function makeOptionList(): array
    {
        $option = ['' => '- Pilih Aspek Asesmen -'];

        foreach (static::all() as $item) {
            $option[Json::encode($item)] = isset($item->subcategory)
                ? $item->category . ' ['. $item->subcategory . '] - ' . $item->point
                : $item->category . ' - ' .  $item->point;
        }
        return $option;
    }
}
