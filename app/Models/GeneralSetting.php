<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class GeneralSetting
 * @package App\Models
 * @version July 6, 2022, 3:00 am UTC
 *
 * @property Personal $personal
 * @property string $paud_name
 * @property string $paud_address
 * @property string $paud_phone_number
 * @property string $paud_fax
 * @property string $paud_telephone
 * @property string $paud_email
 * @property string $paud_website
 * @property integer $head_of_paud
 * @method static create(array $array)
 */
class GeneralSetting extends Model
{
    use SoftDeletes;


    public $table = 'general_settings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'paud_name',
        'paud_address',
        'paud_phone_number',
        'paud_fax',
        'paud_telephone',
        'paud_email',
        'paud_website',
        'head_of_paud'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paud_name' => 'string',
        'paud_phone_number' => 'string',
        'paud_fax' => 'string',
        'paud_telephone' => 'string',
        'paud_email' => 'string',
        'paud_website' => 'string',
        'head_of_paud' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static array $rules = [

    ];

    /**
     * @return HasOne
     **/
    public function personal(): HasOne
    {
        return $this->hasOne(Personal::class, 'id', 'head_of_paud');
    }
}
