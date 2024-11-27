<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    protected $table = 'tipo_tramites';
        
    protected $guarded = [];  

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
