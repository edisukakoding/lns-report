<?php

namespace App\Repositories;

use App\Models\Personal;
use App\Repositories\BaseRepository;

/**
 * Class PersonalRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:39 am UTC
*/

class PersonalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'address',
        'birthdate',
        'birthplace',
        'phone',
        'graduates',
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
        return Personal::class;
    }
}
