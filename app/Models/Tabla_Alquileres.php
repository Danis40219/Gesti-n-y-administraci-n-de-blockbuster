<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_Alquileres extends Model
{
    protected $table            = 'alquileres';
    protected $primaryKey       = 'id_alquiler';
    protected $allowedFields    = [
        'fecha_inicio_alquiler',
        'fecha_fin_alquiler',
        'estatus_alquiler',
        'id_streaming',
        'id_usuario'
    ];
}
