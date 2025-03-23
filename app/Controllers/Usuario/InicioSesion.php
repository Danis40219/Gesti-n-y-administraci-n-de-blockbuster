<?php
    namespace App\Controllers\Usuario;
    use App\Controllers\BaseController;

    class InicioSesion extends BaseController {

    private $view = "Usuario/inicio";
    private $session = null;

    public function __construct(){
        $this->session = session();
    } //end __construct

    public function index() {
        // Carga la vista 'inicio'
        return view($this->view); 
    }

    public function validarusuario(){
        /*
        * FORMAS DE DEBUGEAR EN EL CÓDIGO
        * d($email);se ejecuta todo el resto de código
        * dd($pass); después de esta línea, el código ya no se ejecuta
        */
        $email=$this->request->getPost("email");
        $pass=$this->request->getPost("pass");

        // Verificar que $pass no esté vacío o nulo
        if (empty($pass)) {
            // Aquí puedes manejar el caso cuando la contraseña esté vacía
            // Por ejemplo, redirigir al usuario a la página de inicio de sesión con un error
            return redirect()->to(route_to("inicio_Secion"))
                            ->with('error', 'La contraseña no puede estar vacía');
        }

        //Instancia del objeto Tabla_usuarios
        $tabla_usuarios = new \App\Models\Tabla_usuarios;
        $data = $tabla_usuarios->verificarUsuario($email, hash("sha256",$pass));

        //dd($data);
        if($data !=NULL){

            if ($data->estatus_usuario == -1) {
                // Usuario con estatus bloqueado
                
                make_message('Cuenta inactiva ', 'Ooops', ERROR_ALERT);
                return redirect()->to(route_to("inicio_sesion"));
            }
                      
            
            $this->session = session();
            $this->session->set("is_logged", true);
            $this->session->set("correo", $data->email_usuario);
            $this->session->set("nombre_usuario", $data->nombre_completo);
            $this->session->set("usuario", $data->nombre_usuario); // Guarda solo el nombre
            $this->session->set("imagen_usuario", $data->imagen_usuario);
            $this->session->set("id_usuario", $data->id_usuario);
            $this->session->set("rol", $data->id_rol);
            //redirecciona a una ruta específica
            make_message('A nuestro sistema ' . $data->nombre_usuario, 'BIENVENIDO', INFO_ALERT);
            return redirect()->to (route_to("dashboard"));
        }//end if != null
        else {
            //redirecciona a una ruta específica
            make_message('Cuenta o contraseña invalida ','Ooops', ERROR_ALERT);
            return redirect()->to(route_to("inicio_sesion"));
        }//end else
    }//end validarusuario
}//end class