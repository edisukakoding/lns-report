<?php

namespace App\Repositories;

use App\Models\PeriodSetting;
use App\Repositories\BaseRepository;

/**
 * Class PeriodSettingRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:21 am UTC
*/

class PeriodSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
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
        return PeriodSetting::class;
    }
}
