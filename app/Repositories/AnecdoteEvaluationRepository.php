<?php

namespace App\Repositories;

use App\Models\AnecdoteEvaluation;
use App\Repositories\BaseRepository;

/**
 * Class AnecdoteEvaluationRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:48 am UTC
*/

class AnecdoteEvaluationRepository extends BaseRepository
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
        return AnecdoteEvaluation::class;
    }
}
