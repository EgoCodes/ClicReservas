<?php

namespace App\Repositories;

use App\Models\perfilCli;
use App\Repositories\BaseRepository;

/**
 * Class perfilCliRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:32 am UTC
*/

class perfilCliRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'perUsuario',
        'perClave',
        'perImg'
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
        return perfilCli::class;
    }
}
