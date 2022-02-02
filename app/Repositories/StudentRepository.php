<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\BaseRepository;

/**
 * Class StudentRepository
 * @package App\Repositories
 * @version February 2, 2022, 7:03 am UTC
*/

class StudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_room_id',
        'name',
        'gender',
        'nik',
        'birthplace',
        'birthdate',
        'religion',
        'disabled',
        'address',
        'neighbourhood',
        'hamlet',
        'village',
        'urban_village',
        'district',
        'regency',
        'postal_code',
        'telephone',
        'phone',
        'email',
        'is_kps',
        'is_pip',
        'nationality',
        'height',
        'weight',
        'distance_home_to_school',
        'time_go_to_school'
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
        return Student::class;
    }
}
