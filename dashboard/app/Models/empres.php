<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empres
 * @package App\Models
 * @version August 19, 2020, 5:30 am UTC
 *
 * @property \App\Models\Barrio $idbarrior
 * @property \App\Models\EmpInfo $idinfor
 * @property \Illuminate\Database\Eloquent\Collection $ventanillas
 * @property string $empNombre
 * @property integer $empNit
 * @property string $empDireccion
 * @property integer $empTelefono
 * @property boolean $idBarrioR
 * @property integer $idInfoR
 */
class empres extends Model
{
    // use SoftDeletes;

    public $table = 'empresa';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idEmpresa';
    public $fillable = [
        'empNombre',
        'empNit',
        'empDireccion',
        'empTelefono',
        'idBarrioR',
        'idInfoR'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEmpresa' => 'integer',
        'empNombre' => 'string',
        'empNit' => 'integer',
        'empDireccion' => 'string',
        'empTelefono' => 'integer',
        'idBarrioR' => 'integer',
        'idInfoR' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empNombre' => 'required|string|max:65',
        'empNit' => 'required',
        'empDireccion' => 'required|string|max:45',
        'empTelefono' => 'required',
        'idBarrioR' => 'required|integer',
        'idInfoR' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbarrior()
    {
        return $this->belongsTo(\App\Models\Barrio::class, 'idBarrioR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idinfor()
    {
        return $this->belongsTo(\App\Models\EmpInfo::class, 'idInfoR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function ventanillas()
    {
        return $this->belongsToMany(\App\Models\Ventanilla::class, 'cant_vent');
    }
}
