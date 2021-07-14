<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class barri
 * @package App\Models
 * @version August 19, 2020, 5:38 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $perfilClis
 * @property \Illuminate\Database\Eloquent\Collection $empInfos
 * @property string $bNombre
 */
class barri extends Model
{
    // use SoftDeletes;

    public $table = 'barrio';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idBarrio';
    public $fillable = [
        'bNombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idBarrio' => 'integer',
        'bNombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bNombre' => 'required|string|max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function perfilClis()
    {
        return $this->belongsToMany(\App\Models\PerfilCli::class, 'cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function empInfos()
    {
        return $this->belongsToMany(\App\Models\EmpInfo::class, 'empresa');
    }
}
