<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;

class InicioSesion extends BaseController
{
    private $view = 'usuario/inicio';

    private function load_data(){
        $data = array(); 
        //Datos Globales - menulateral, header, foother
        $data['nombre_pagina'] = 'Inicio';
        $data['titulo_pagina'] = 'Inicio de Sesion';
        helper('message');

        //Queries SQL
        return $data;
    }//end load_data

    private function create_view($name_view = '', $content = array()){
        return view($name_view, $content);
    }//end make_view

    //Main function : index
    public function index()
    {
        return $this->create_view($this->view, $this->load_data());
    }// end index

    public function iniciar_sesion(){
        $email = $this->request->getPost("correo_electronico");
        $pass = $this->request->getPost("pass");
        // d($email);
        // dd($pass);
        $tabla_usuario = new \App\Models\Tabla_Usuario;

        $data = $tabla_usuario->verificar_usuario($email, hash("sha256", $pass));
        //dd($data);
        if($data!=null){
            $session = session();
            $session->set("is_logged",true);
            $session->set("nombre_completo",$data->nombre_completo);
            $session->set("nickname",$data->usuario);
            $session->set("sexo",$data->sexo_usuario);
            $session->set("perfil",$data->imagen);
            $session->set("correo",$data->correo);
            $session->set("rol_actual",$data->id_rol);
            //session()->set("estatus_usuario",$data->estatus_usuario);
            $session->set("pagina_actual","pagina_dashboard");
            $session->set("tarea_actual", TAREA_DASHBOARD);
            //make_message("Bienvenido", "Al sistema".$data->usuario, 'INFO_ALERT');
            if ($data->estatus_usuario == '1') {
                helper('message');
                make_message(INFO_ALERT, 'Al Sistema '.$data->usuario, 'Bienvenido');
                return redirect()->to(route_to("dashboard"));

            }//end if
            else {
                helper('message');
                make_message(WARNING_ALERT, 'Cuenta inactiva.', 'Cuenta inactiva');
                return redirect()->to(route_to("inicio"));
            }  
        }//end if
        else {
            helper('message');
            make_message(ERROR_ALERT, 'Usuario o contraseña incorrectos.', 'Error de inicio de sesión');
            return redirect()->to(route_to("inicio"));
        }
    }// end iniciar_sesion


}// end Dashboard
