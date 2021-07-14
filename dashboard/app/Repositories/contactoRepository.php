<?php

namespace App\Repositories;

use App\Models\contacto;
use App\Repositories\BaseRepository;

/**
 * Class contactoRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:35 am UTC
*/

class contactoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'conNombre',
        'conAsunto',
        'conMail'
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
        return contacto::class;
    }
}
