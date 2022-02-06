<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Personal
 * @package App\Models
 * @version February 4, 2022, 6:39 am UTC
 *
 * @property \App\Models\User $user
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property string $birthdate
 * @property string $birthplace
 * @property string $phone
 * @property string $graduates
 * @property string $image
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
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
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
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }
}
