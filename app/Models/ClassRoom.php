<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ClassRoom
 * @package App\Models
 * @version January 27, 2022, 4:09 am UTC
 *
 * @property string $name
 * @property string $description
 */
class ClassRoom extends Model
{
    use SoftDeletes;


    public $table = 'class_rooms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'name' => 'required'
    ];

    public static function makeOptionList(): array
    {
        $option = ['' => '- Pilih Kelas -'];
        foreach (static::all() as $class) {
            $option[$class->id] = $class->name;
        }

        return $option;
    }
}
