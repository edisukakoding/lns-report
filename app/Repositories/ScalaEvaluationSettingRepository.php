<?php

namespace App\Repositories;

use App\Models\ScalaEvaluationSetting;
use App\Repositories\BaseRepository;

/**
 * Class ScalaEvaluationSettingRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:25 am UTC
*/

class ScalaEvaluationSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'value',
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
        return ScalaEvaluationSetting::class;
    }
}
