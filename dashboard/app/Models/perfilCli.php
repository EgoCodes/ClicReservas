<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class perfilCli
 * @package App\Models
 * @version August 19, 2020, 5:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $barrios
 * @property string $perUsuario
 * @property string $perClave
 * @property string $perImg
 */
class perfilCli extends Model
{
    // use SoftDeletes;

    public $table = 'perfil_cli';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idPerfilCli';
    public $fillable = [
        'perUsuario',
        'perClave',
        'perImg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idPerfilCli' => 'integer',
        'perUsuario' => 'string',
        'perClave' => 'string',
        'perImg' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'perUsuario' => 'required|string|max:45',
        'perClave' => 'required|string|max:45',
        'perImg' => 'nullable|string|max:64'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function barrios()
    {
        return $this->belongsToMany(\App\Models\Barrio::class, 'cliente');
    }
}
