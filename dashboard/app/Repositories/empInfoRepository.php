<?php

namespace App\Repositories;

use App\Models\empInfo;
use App\Repositories\BaseRepository;

/**
 * Class empInfoRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:27 am UTC
*/

class empInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empUsuario',
        'empClave',
        'correo',
        'empImg',
        'empDescripBreve',
        'empDescripLarga',
        'estado'
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
        return empInfo::class;
    }
}
