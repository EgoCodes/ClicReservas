<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empInfo
 * @package App\Models
 * @version August 19, 2020, 5:27 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $barrios
 * @property string $empUsuario
 * @property string $empClave
 * @property string $correo
 * @property string $empImg
 * @property string $empDescripBreve
 * @property string $empDescripLarga
 * @property boolean $estado
 */
class empInfo extends Model
{
    // use SoftDeletes;

    public $table = 'emp_info';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idEmpInfo';
    public $fillable = [
        'empUsuario',
        'empClave',
        'correo',
        'empImg',
        'empDescripBreve',
        'empDescripLarga',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEmpInfo' => 'integer',
        'empUsuario' => 'string',
        'empClave' => 'string',
        'correo' => 'string',
        'empImg' => 'string',
        'empDescripBreve' => 'string',
        'empDescripLarga' => 'string',
        'estado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empUsuario' => 'required|string|max:45',
        'empClave' => 'required|string|max:45',
        'correo' => 'required|string|max:64',
        'empImg' => 'required|string|max:64',
        'empDescripBreve' => 'required|string',
        'empDescripLarga' => 'required|string',
        'estado' => 'required|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function barrios()
    {
        return $this->belongsToMany(\App\Models\Barrio::class, 'empresa');
    }
}
