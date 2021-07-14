<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class cantVent
 * @package App\Models
 * @version August 19, 2020, 5:37 am UTC
 *
 * @property \App\Models\Empresa $idempresar
 * @property \App\Models\Ventanilla $idventr
 * @property \Illuminate\Database\Eloquent\Collection $horas
 * @property integer $idEmpresaR
 * @property boolean $idVentR
 */
class cantVent extends Model
{
    // use SoftDeletes;

    public $table = 'cant_vent';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idCantVent';
    public $fillable = [
        'idEmpresaR',
        'idVentR'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idCantVent' => 'integer',
        'idEmpresaR' => 'integer',
        'idVentR' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idEmpresaR' => 'required|integer',
        'idVentR' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idempresar()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'idEmpresaR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idventr()
    {
        return $this->belongsTo(\App\Models\Ventanilla::class, 'idVentR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function horas()
    {
        return $this->belongsToMany(\App\Models\Hora::class, 'emp_horario');
    }
}
