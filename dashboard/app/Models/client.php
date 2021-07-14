<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client
 * @package App\Models
 * @version August 19, 2020, 5:35 am UTC
 *
 * @property \App\Models\Barrio $idbarre
 * @property \App\Models\PerfilCli $idperfilr
 * @property \Illuminate\Database\Eloquent\Collection $empHorarios
 * @property string $cliNombre
 * @property integer $cliCc
 * @property string $cliDireccion
 * @property integer $cliTelefono
 * @property string $cliMail
 * @property integer $idPerfilR
 * @property boolean $idBarRe
 */
class client extends Model
{
    // use SoftDeletes;

    public $table = 'cliente';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idCliente';
    public $fillable = [
        'cliNombre',
        'cliCc',
        'cliDireccion',
        'cliTelefono',
        'cliMail',
        'idPerfilR',
        'idBarRe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idCliente' => 'integer',
        'cliNombre' => 'string',
        'cliCc' => 'integer',
        'cliDireccion' => 'string',
        'cliTelefono' => 'integer',
        'cliMail' => 'string',
        'idPerfilR' => 'integer',
        'idBarRe' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliNombre' => 'required|string|max:45',
        'cliCc' => 'required',
        'cliDireccion' => 'required|string|max:60',
        'cliTelefono' => 'required',
        'cliMail' => 'required|string|max:60',
        'idPerfilR' => 'required|integer',
        'idBarRe' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idbarre()
    {
        return $this->belongsTo(\App\Models\Barrio::class, 'idBarRe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idperfilr()
    {
        return $this->belongsTo(\App\Models\PerfilCli::class, 'idPerfilR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function empHorarios()
    {
        return $this->belongsToMany(\App\Models\EmpHorario::class, 'compras_cli');
    }
}
