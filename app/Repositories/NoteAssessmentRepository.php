<?php

namespace App\Repositories;

use App\Models\NoteAssessment;
use App\Repositories\BaseRepository;

/**
 * Class NoteAssessmentRepository
 * @package App\Repositories
 * @version March 2, 2022, 3:33 am UTC
*/

class NoteAssessmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
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
        return NoteAssessment::class;
    }
}
