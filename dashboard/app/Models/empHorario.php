<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empHorario
 * @package App\Models
 * @version August 19, 2020, 5:34 am UTC
 *
 * @property \App\Models\CantVent $idempvent
 * @property \App\Models\Hora $idhorar
 * @property \Illuminate\Database\Eloquent\Collection $clientes
 * @property integer $erPrecio
 * @property boolean $erEstado
 * @property integer $idHoraR
 * @property integer $idEmpVent
 */
class empHorario extends Model
{
    // use SoftDeletes;

    public $table = 'emp_horario';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idEmpHorario';
    public $fillable = [
        'erPrecio',
        'erEstado',
        'idHoraR',
        'idEmpVent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEmpHorario' => 'integer',
        'erPrecio' => 'integer',
        'erEstado' => 'boolean',
        'idHoraR' => 'integer',
        'idEmpVent' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'erPrecio' => 'required|integer',
        'erEstado' => 'required|boolean',
        'idHoraR' => 'required|integer',
        'idEmpVent' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idempvent()
    {
        return $this->belongsTo(\App\Models\CantVent::class, 'idEmpVent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idhorar()
    {
        return $this->belongsTo(\App\Models\Hora::class, 'idHoraR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function clientes()
    {
        return $this->belongsToMany(\App\Models\Cliente::class, 'compras_cli');
    }
}
