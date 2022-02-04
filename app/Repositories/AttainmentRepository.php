<?php

namespace App\Repositories;

use App\Models\Attainment;
use App\Repositories\BaseRepository;

/**
 * Class AttainmentRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:16 am UTC
*/

class AttainmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_room_id',
        'user_id',
        'date'
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
        return Attainment::class;
    }
}
