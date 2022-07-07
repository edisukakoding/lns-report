<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ClassRoom
 * @package App\Models
 * @version January 27, 2022, 4:09 am UTC
 *
 * @property string $name
 * @property string $description
 * @method static create(string[] $array)
 */
class ClassRoom extends Model
{
    use SoftDeletes;


    public $table = 'class_rooms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'homeroom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'homeroom' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'name' => 'required',
        'homeroom' => 'required'
    ];

    /**
     * @return HasOne
     */
    public function personal(): HasOne
    {
        return $this->hasOne(Personal::class, 'id', 'homeroom');
    }

    public static function makeOptionList(): array
    {
        $option = ['' => '- Pilih Kelas -'];
        foreach (static::all() as $class) {
            $option[$class->id] = $class->name;
        }

        return $option;
    }
}
