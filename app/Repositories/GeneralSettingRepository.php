<?php

namespace App\Repositories;

use App\Models\GeneralSetting;
use App\Repositories\BaseRepository;

/**
 * Class GeneralSettingRepository
 * @package App\Repositories
 * @version July 6, 2022, 3:00 am UTC
*/

class GeneralSettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'paud_name',
        'paud_address',
        'paud_phone_number',
        'paud_fax',
        'paud_telephone',
        'paud_email',
        'paud_website',
        'head_of_paud'
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
        return GeneralSetting::class;
    }
}
