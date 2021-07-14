<?php

namespace App\Repositories;

use App\Models\cantVent;
use App\Repositories\BaseRepository;

/**
 * Class cantVentRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:37 am UTC
*/

class cantVentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idEmpresaR',
        'idVentR'
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
        return cantVent::class;
    }
}
