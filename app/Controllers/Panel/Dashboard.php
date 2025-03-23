<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Dashboard extends BaseController{

    private $view = 'panel\dashboard';
    private $session = null;
    private $permiso = TRUE;

    public function __construct(){
        $this->session = session();

        //instancia del permisos helper
        helper("permisos_roles_helper");

        if (!acceso_usuario(TAREA_DASHBOARD, $this->session->rol)) {
            $this->permiso = FALSE;
        }
         
        $this->session->tarea_actual = TAREA_DASHBOARD;
    } //end __construct

    private function load_data(){ ///cargar datos
            $data = array();

            $data['nombre_usuario'] = $this->session->get("usuario");
            $data['foto_perfil'] = base_url(($this->session->get("sexo_usuario")==SEXO_FEMENINO) ? RECURSOS_IMG.'/femenino.jpeg' : RECURSOS_IMG.'/masculino.jpeg');

                                    //dd($data);

             ///Informacion  basica
             $data["titulo_pagina"]="Bienvenido al dashboard";
             $data["nombre_pagina"]="Dashboard";

             ///Cargar el helper Breadcrumb solo el nombre
             helper('breadcrumb');///referenciando
            $breadcrumb = array(
                array(
                    'href' => '#',
                    'titulo'=>'Dashboard',
                ),
            );
             $data['breadcrumb']= breadcrumb_panel($data["titulo_pagina"], $breadcrumb );
             
             ///dd($data);

             //make_message('Esta es una descripcion', 'TITULOU', INFO_ALERT);
             $table_Usuarios = new \App\Models\Tabla_usuarios;
            return $data;
        } // end load_data

    
    private function make_view($name_view = '', $content = array()){
        $content["menu_lateral"]= crear_menu_panel($this->session->tarea_actual);
        return view($name_view, $content);
    } // end make_view

    public function index()
    { 
        if ($this->permiso) {
            return $this->make_view($this->view, $this->Load_data());
        }
        else{
            make_message('No tienes permiso para acceder a este módulo','Error', WARNING_ALERT);
            return redirect()->to (route_to("inicio_sesion"));
        }
        
        //Calling view 
    }
}
//que se llame dashboard donde dice document