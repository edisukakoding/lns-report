<?php

namespace App\Repositories;

use App\Models\RaportEtc;
use App\Repositories\BaseRepository;

/**
 * Class RaportEtcRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:49 am UTC
*/

class RaportEtcRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'raport_id',
        'title',
        'note'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RaportEtc::class;
    }
}
