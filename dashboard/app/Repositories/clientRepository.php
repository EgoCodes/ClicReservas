<?php

namespace App\Repositories;

use App\Models\client;
use App\Repositories\BaseRepository;

/**
 * Class clientRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:35 am UTC
*/

class clientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliNombre',
        'cliCc',
        'cliDireccion',
        'cliTelefono',
        'cliMail',
        'idPerfilR',
        'idBarRe'
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
        return client::class;
    }
}
