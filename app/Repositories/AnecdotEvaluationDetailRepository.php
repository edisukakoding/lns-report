<?php

namespace App\Repositories;

use App\Models\AnecdoteEvaluationDetail;
use App\Repositories\BaseRepository;

/**
 * Class AnecdotEvaluationDetailRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:56 am UTC
*/

class AnecdoteEvaluationDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'anecdote_evaluation_id',
        'location',
        'time',
        'student_id',
        'incident',
        'basic_competencies',
        'achievements'
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
        return AnecdoteEvaluationDetail::class;
    }
}
