<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comprasCli
 * @package App\Models
 * @version August 19, 2020, 5:35 am UTC
 *
 * @property \App\Models\Cliente $idclienter
 * @property \App\Models\EmpHorario $idemphorarior
 * @property boolean $estado
 * @property integer $idClienteR
 * @property integer $idEmpHorarioR
 * @property string $fechaCompra
 */
class comprasCli extends Model
{
    // use SoftDeletes;

    public $table = 'compras_cli';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idCompCli';
    public $fillable = [
        'estado',
        'idClienteR',
        'idEmpHorarioR',
        'fechaCompra'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idCompCli' => 'integer',
        'estado' => 'boolean',
        'idClienteR' => 'integer',
        'idEmpHorarioR' => 'integer',
        'fechaCompra' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado' => 'required|boolean',
        'idClienteR' => 'required|integer',
        'idEmpHorarioR' => 'required|integer',
        'fechaCompra' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idclienter()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'idClienteR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idemphorarior()
    {
        return $this->belongsTo(\App\Models\EmpHorario::class, 'idEmpHorarioR');
    }
}
