<?php

namespace App\Repositories;

use App\Models\ScalaEvaluation;
use App\Repositories\BaseRepository;

/**
 * Class ScalaEvaluationRepository
 * @package App\Repositories
 * @version February 7, 2022, 8:13 am UTC
*/

class ScalaEvaluationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'student_id',
        'indicator',
        'user_id'
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
        return ScalaEvaluation::class;
    }
}
