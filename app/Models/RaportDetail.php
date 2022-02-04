<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class RaportDetail
 * @package App\Models
 * @version February 4, 2022, 7:46 am UTC
 *
 * @property integer $raport_id
 * @property string $type
 * @property string $description
 * @property string $result
 */
class RaportDetail extends Model
{
    use SoftDeletes;


    public $table = 'raport_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'raport_id',
        'type',
        'description',
        'result'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'raport_id' => 'integer',
        'type' => 'string',
        'description' => 'string',
        'result' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'raport_id' => 'required',
        'description' => 'required',
        'result' => 'required'
    ];

    
}
