<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_UsuariosPlanes extends Model
{
    protected $table            = 'usuarios_planes';
    protected $primaryKey       = 'id_usuario_plan';
    protected $allowedFields    = [
        'fecha_registro_plan',
        'fecha_fin_plan',
        'id_usuario',
        'id_plan'
    ];
}
