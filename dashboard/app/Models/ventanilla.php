<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ventanilla
 * @package App\Models
 * @version August 19, 2020, 5:33 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $empresas
 * @property boolean $VenNumero
 */
class ventanilla extends Model
{
    // use SoftDeletes;

    public $table = 'ventanillas';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idVentanillas';
    public $fillable = [
        'VenNumero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idVentanillas' => 'integer',
        'VenNumero' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'VenNumero' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function empresas()
    {
        return $this->belongsToMany(\App\Models\Empresa::class, 'cant_vent');
    }
}
