<?php

namespace App\Repositories;

use App\Models\AspectSetting;
use App\Repositories\BaseRepository;

/**
 * Class AspectSettingRepository
 * @package App\Repositories
 * @version February 26, 2022, 2:53 am UTC
*/

class AspectSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'subcategory',
        'point'
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
        return AspectSetting::class;
    }


}
