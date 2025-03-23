<?php

namespace App\Controllers;

class InicioSesion extends BaseController {
    private $session = null;
    //Main - index
    public function index()
    {   
        //calling view
        return view('inicio');
    }

    //public function validarUsuario(){
    //    $tabla_usuarios = new \App\Models\Tabla_usuarios;
    //    $resultado = $tabla_usuarios->verificarUsuario("juan.perez@email.com", hash("Sha256","pass123"));
    //    print_r($resultado);
    //}

    //public function validarusuario(){
    //    $email = $this->request->getPost("email");
    //    $pass = $this->request->getPost("pass");
    //    //Una d continua el codigo
    //    //d($email);
    //    //Doble d no continua el codigo
    //    //dd($pass);
//
    //    $tabla_usuarios = new \App\Models\Tabla_usuarios;
    //    
    //    $data = $tabla_usuarios->verificarUsuario($email, hash("256", $pass));
    //    d($data);
//
    //}
    public function validarusuario() {
    $email = $this->request->getPost("email");
    $pass = $this->request->getPost("pass");

    $tabla_usuarios = new \App\Models\Tabla_usuarios;
    $data = $tabla_usuarios->verificarUsuario($email, hash("sha256", $pass));

    if ($data != null) {
        //TAREA
        if ((int)$data->estatus_usuario !== 1) { 
            make_message( 'Tu cuenta no está activa. Contacta al administrador.','Mensaje_error',WARNING_ALERT);
             return redirect()->to(route_to("inicio_sesion"));       
         }
         else{


        $this->session = session();
        $this->session->set('is_logged', true);
        $this->session->set("nombre_completo", $data->nombre_completo);
        $this->session->set("usuario", $data->nombre_usuario);
        $this->session->set("imagen", $data->imagen_usuario);
        $this->session->set("id_usuario", $data->id_usuario);
        $this->session->set("correo", $data->email_usuario);
        $this->session->set("rol_actual", $data->id_rol);
        $this->session->set("sexo_usuario", $data->sexo_usuario);
        $this->session->set("tarea_actual", TAREA_DASHBOARD);

            make_message('A nuestro sistema ' . $data->nombre_usuario, 'Bienvenido', INFO_ALERT);
            return redirect()->to(route_to("dashboard"));
        }
    } else {
        make_message('Datos incorrectos', 'VERIFICA',WARNING_ALERT);
        return redirect()->to(route_to("inicio_sesion"));
    }
}


}



?>