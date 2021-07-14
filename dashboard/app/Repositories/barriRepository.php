<?php

namespace App\Repositories;

use App\Models\barri;
use App\Repositories\BaseRepository;

/**
 * Class barriRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:38 am UTC
*/

class barriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bNombre'
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
        return barri::class;
    }
}
