<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class PersonalRepository
 * @package App\Repositories
 * @version February 4, 2022, 6:39 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'name',
        'email',
        'role',
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
        return User::class;
    }
}
