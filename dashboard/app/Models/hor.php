<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class hor
 * @package App\Models
 * @version August 19, 2020, 5:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $cantVents
 * @property time $hora
 */
class hor extends Model
{
    // use SoftDeletes;

    public $table = 'hora';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idHora';
    public $fillable = [
        'hora'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idHora' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hora' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cantVents()
    {
        return $this->belongsToMany(\App\Models\CantVent::class, 'emp_horario');
    }
}
