<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class contacto
 * @package App\Models
 * @version August 19, 2020, 5:35 am UTC
 *
 * @property string $conNombre
 * @property string $conAsunto
 * @property string $conMail
 */
class contacto extends Model
{
    // use SoftDeletes;

    public $table = 'contact';
    
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];


    protected $primaryKey = 'idContact';
    public $fillable = [
        'conNombre',
        'conAsunto',
        'conMail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idContact' => 'integer',
        'conNombre' => 'string',
        'conAsunto' => 'string',
        'conMail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'conNombre' => 'required|string|max:45',
        'conAsunto' => 'required|string|max:45',
        'conMail' => 'required|string|max:45'
    ];

    
}
