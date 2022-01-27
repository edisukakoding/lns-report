<?php

namespace App\Repositories;

use App\Models\ClassRoom;
use App\Repositories\BaseRepository;

/**
 * Class ClassRoomRepository
 * @package App\Repositories
 * @version January 27, 2022, 4:09 am UTC
*/

class ClassRoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return ClassRoom::class;
    }
}
