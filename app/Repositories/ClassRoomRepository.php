<?php

namespace App\Repositories;

use App\Models\ClassRoom;

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
    protected array $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return ClassRoom::class;
    }
}
