<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\BaseRepository;

/**
 * Class EvaluationRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:07 am UTC
*/

class EvaluationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'evaluation_type',
        'basic_competencies',
        'achievements',
        'period_setting_id',
        'evaluation_id'
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
        return Evaluation::class;
    }
}
