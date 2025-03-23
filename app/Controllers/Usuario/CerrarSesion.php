<?php

    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class CerrarSesion extends BaseController{
        private $session = null;


        public function __construct(){
            $this->session = session();
        } //end __construct

        public function index() {
            if (isset($this->session) && $this->session->get("is_logged") == true) {
                $this->session->destroy();
                unset($this->session);
            }
            
            $this->session=null;

            return redirect()->to(route_to("inicio_sesion"));
        }
    }