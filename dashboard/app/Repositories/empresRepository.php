<?php

namespace App\Repositories;

use App\Models\empres;
use App\Repositories\BaseRepository;

/**
 * Class empresRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:30 am UTC
*/

class empresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empNombre',
        'empNit',
        'empDireccion',
        'empTelefono',
        'idBarrioR',
        'idInfoR'
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
        return empres::class;
    }
}
