<?php

namespace App\Repositories;

use App\Models\ventanilla;
use App\Repositories\BaseRepository;

/**
 * Class ventanillaRepository
 * @package App\Repositories
 * @version August 19, 2020, 5:33 am UTC
*/

class ventanillaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'VenNumero'
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
        return ventanilla::class;
    }
}
