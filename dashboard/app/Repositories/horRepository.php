<?php

namespace App\Repositories;

use App\Models\hor;
use App\Repositories\BaseRepository;

/**
 * Class horRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:32 am UTC
*/

class horRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hora'
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
        return hor::class;
    }
}
