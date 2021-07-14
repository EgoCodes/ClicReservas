<?php

namespace App\Repositories;

use App\Models\empHorario;
use App\Repositories\BaseRepository;

/**
 * Class empHorarioRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:34 am UTC
*/

class empHorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'erPrecio',
        'erEstado',
        'idHoraR',
        'idEmpVent'
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
        return empHorario::class;
    }
}
