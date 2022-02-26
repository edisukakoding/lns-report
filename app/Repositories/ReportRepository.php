<?php

namespace App\Repositories;

use App\Models\Report;

/**
 * Class RaportRepository
 * @package App\Repositories
 * @version February 4, 2022, 7:39 am UTC
*/

class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'student_id',
        'aspect',
        'user_id',
        'value'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Report::class;
    }
}
