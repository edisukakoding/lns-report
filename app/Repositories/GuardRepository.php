<?php

namespace App\Repositories;

use App\Models\Guard;
use App\Repositories\BaseRepository;

/**
 * Class GuardRepository
 * @package App\Repositories
 * @version February 4, 2022, 2:29 am UTC
*/

class GuardRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'type',
        'name',
        'birthyear',
        'graduates',
        'job',
        'income',
        'status'
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
        return Guard::class;
    }
}
