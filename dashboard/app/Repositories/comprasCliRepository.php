<?php

namespace App\Repositories;

use App\Models\comprasCli;
use App\Repositories\BaseRepository;

/**
 * Class comprasCliRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:35 am UTC
*/

class comprasCliRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado',
        'idClienteR',
        'idEmpHorarioR',
        'fechaCompra'
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
        return comprasCli::class;
    }
}
