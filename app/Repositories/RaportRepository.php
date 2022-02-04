<?php

namespace App\Repositories;

use App\Models\Raport;
use App\Repositories\BaseRepository;

/**
 * Class RaportRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:39 am UTC
*/

class RaportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'aspect',
        'teacher_id',
        'value'
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
        return Raport::class;
    }
}
