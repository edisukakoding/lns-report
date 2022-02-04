<?php

namespace App\Repositories;

use App\Models\AttainmentDetail;
use App\Repositories\BaseRepository;

/**
 * Class AttainmentDetailRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:23 am UTC
*/

class AttainmentDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'attainment_id',
        'student_id',
        'title',
        'description',
        'image'
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
        return AttainmentDetail::class;
    }
}
