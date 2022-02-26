<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class RaportEtc
 * @package App\Models
 * @version February 4, 2022, 7:49 am UTC
 *
 * @property \App\Models\Report $raport
 * @property integer $raport_id
 * @property string $title
 * @property string $note
 */
class RaportEtc extends Model
{
    use SoftDeletes;


    public $table = 'raport_etcs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'raport_id',
        'title',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'raport_id' => 'integer',
        'title' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'raport_id' => 'required',
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function raport()
    {
        return $this->hasOne(\App\Models\Report::class, 'id', 'raport_id');
    }
}
