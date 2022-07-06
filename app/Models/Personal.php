<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Personal
 * @package App\Models
 * @version February 4, 2022, 6:39 am UTC
 *
 * @property User $user
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property string $birthdate
 * @property string $birthplace
 * @property string $phone
 * @property string $graduates
 * @property string $image
 * @method static create(array $array)
 */
class Personal extends Model
{
    use SoftDeletes;


    public $table = 'personals';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'address',
        'birthdate',
        'birthplace',
        'phone',
        'graduates',
        'image',
        'user_id',
        'title'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'birthdate' => 'date',
        'birthplace' => 'string',
        'phone' => 'string',
        'graduates' => 'string',
        'image' => 'string',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [
        'firstname' => 'required'
    ];

    /**
     * @return HasOne
     **/
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
