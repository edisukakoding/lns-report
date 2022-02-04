<?php

namespace App\Repositories;

use App\Models\RaportDetail;
use App\Repositories\BaseRepository;

/**
 * Class RaportDetailRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:46 am UTC
*/

class RaportDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'raport_id',
        'type',
        'description',
        'result'
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
        return RaportDetail::class;
    }
}
