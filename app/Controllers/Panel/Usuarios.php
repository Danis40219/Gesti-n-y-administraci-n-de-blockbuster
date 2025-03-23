<?php

namespace App\Controllers\Panel;
use App\Controllers\BaseController;

class Usuarios extends BaseController{

    private $view = 'panel\usuarios';

    private $session=NULL;
    private $permiso=TRUE;

    public function __construct(){
        //Instacia de la variable de sesion
        $this->session = session();

        //INtancia del helper de permisos
        helper('permisos_roles_helper');

        if(!acceso_usuario(TAREA_USUARIOS, $this->session->rol)){
            $this->permiso=FALSE;
        }//end if
 
        $this->session->tarea_actual=TAREA_USUARIOS;
    }//end __construct


    ///Informacion  basica

    private function load_data(){ ///cargar datos 
        
        $data = array();
        $data ['nombre_usuario'] =$this->session->get("usuario");
        $data['foto_perfil'] = base_url(($this->session->get("sexo_usuario")==SEXO_FEMENINO) ? RECURSOS_IMG.'/femenino.jpeg' : RECURSOS_IMG.'/masculino.jpeg');



             ///Informacion  basica
             $data["titulo_pagina"]="Bienvenido a usuarios";
             $data["nombre_pagina"]="Usuarios";

             ///Cargar el helper Breadcrumb solo el nombre
             helper('breadcrumb');///referenciando
            $breadcrumb = array(
               // array(
                //   'href' => route_to("usuarios"),
                //    'titulo'=>'Usuarios',
                //),
                array(
                    'href' => '#',
                    'titulo'=>'Usuario',
                )
            );

             $data['breadcrumb']= breadcrumb_panel($data["titulo_pagina"], $breadcrumb );
             
             //$table_Usuarios = new \App\Models\Tabla_usuarios;
            
            return $data;
        } // end load_data
        private function make_view($name_view = '', $content = array()){
            $content["menu_lateral"]= crear_menu_panel($this->session->tarea_actual, $this->session->rol_actual);
            return view($name_view, $content);
        } // end make_view

    public function index()
    { 
        if($this->permiso){
            return $this->make_view($this->view, $this->load_data());
        }//end if
        else{
            make_message('No tienes permisos para acceder a este modulo, contacta al Administrador', 'Oppss!', WARNING_ALERT);
            return redirect()->to(route_to("inicio_sesion"));
        }
        
    }
}
//que se llame dashboard donde dice document