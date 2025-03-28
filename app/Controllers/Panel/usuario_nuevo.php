<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Usuario_nuevo extends BaseController
{
    private $view = 'panel/usuario_nuevo';
    //private $view = 'panel/dashboard2';
    private $session = null;
    private $permiso = TRUE;

    public function __construct(){
        //instanciamos la variable de sesion
        $this->session = session();

        //Instancia del permisos herlper
        helper("permisos_roles_helper");
        if (!acceso_usuario(TAREA_USUARIOS, $this->session->rol_actual)) {
            $this->permiso = FALSE;
        }//end if
        $this->session->tarea_actual = TAREA_USUARIOS;

    }

    private function load_data(){
        //load helper
        helper('message');
        $data = array();
        //Datos Globales - menulateral, header, foother, session
        $data['nombre_pagnia'] = 'Usuarios';
        $data['titulo_pagina'] = 'Usuarios';

        $data["nombre_completo_usuario"] = $this->session->nombre_completo;
        $data["nombre_usuario"] = $this->session->nickname;
        $data["email_usuario"] = $this->session->correo;
        //RECURSOS_PANEL_IMG_PROFILES_USER
        $data["imagen_usuario"] = ($this->session->perfil == NULL) 
                                    ? (($this->session->sexo == MASCULINO) ? 'HOMBRE.jpeg' : 'MUJER.jpeg') 
                                    : $this->session->perfil;

        $breadcrumb = array(
            array(
                'href' => route_to("usuarios"),
                'titulo' => 'Usuarios',
            ),
            array(
                'href' => '#',
                'titulo' => 'Usuario nuevo',
            )
        );
        $data['breadcrumb_panel'] = breadcrumb_panel($data['titulo_pagina'], $breadcrumb);

        //Queries SQL
        return $data;
    }//end load_data

    private function create_view($name_view = '', $content = array()){
        $content["menu_lateral"] = crear_menu_panel($this->session->tarea_actual, $this->session->rol_actual);
        return view($name_view, $content);
    }//end make_view

    //Main function : index
    public function index()
    {
        if ($this->permiso) {
            return $this->create_view($this->view, $this->load_data());
        }//end if
        else {
            helper('message');
            make_message(ERROR_ALERT, 'No tienes permisos para acceder a este modulo.', 'Error');
            return redirect()->to(route_to("inicio"));
        }
    }// end index

    public function registrar(){
        //d('registrando');
        helper('message');
        //Arreglo temporal
        $usuario = array();
        //$usuario["atributoDB"] = $this->request->getPost("nameFileHTML");

        $usuario["estatus_usuario"] = ESTATUS_HABILITADO;
        $usuario["nombre_usuario"] = $this->request->getPost("nombre");
        $usuario["ap_usuario"] = $this->request->getPost("apellido_paterno");
        $usuario["am_usuario"] = $this->request->getPost("apellido_materno");
        $usuario["sexo_usuario"] = $this->request->getPost("sexo");
        $usuario["correo_usuario"] = $this->request->getPost("email");
        $usuario["password_usuario"] = hash("sha256", $this->request->getPost("password"));
        $usuario["imagen_usuario"] = $this->request->getPost("foto_perfil");
        $usuario["id_rol"] = $this->request->getPost("rol");

        //dd($usuario);

        $tabla_usuarios = new \App\Models\Tabla_usuario;

        if ($tabla_usuarios->create_data($usuario) > 0) {
            //dd($tabla_usuarios);
            make_message(SUCCESS_ALERT, 'Se ha registrado el usuario correctamente.', 'Éxito!');
            return redirect()->to(route_to("usuarios"));
        }//end if
        else {
            make_message(ERROR_ALERT, 'Error al registrar el usuario.', 'Error!');
            return redirect()->to(route_to("usuario_nuevo"));//$this->index();
        }
    }


}// end Dashboard
