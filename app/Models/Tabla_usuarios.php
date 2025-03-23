<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Tabla_usuarios extends Model{
        //Específicamos la entidad
        protected $table ='usuarios';
        //Referenciamos la clave primaria
        protected $primaryKey ='id_usuario';
        protected $useAutoIncrement = true;
        //Definimos la forma de obtener el resutado de las columnas
        protected $returnType ='object'; //array | object
        //Específicamos los campos de nuestra entidad
        protected $allowedFields = [ 'id_usuario','estatus_usuario',
                                    'nombre_usuario','ap_usuario','am_usuario',
                                    'sexo_usuario','email_usuario',
                                    'password_usuario','imagen_usuario','id_rol'
                                ];

        
        public function createUser($data = array()){
            if(!empty($data)){
                return $this
                        -> table($this-> table)
                        -> insert($data);
            }//end if 
            else{
                return false;
            }//end else
        }//end 

        public function get_user($contraints = array()){
            return $this
                ->table($this->table)
                ->where($contraints)
                ->get()
                ->getRow();
        }//end

        public function get_table(){
            return $this
                ->table($this->table)
                ->get()
                ->getResult();
        } //end

        public function update_data($id = 0, $data = array()){
            if (!empty($data)) {
                return $this
                    ->table($this->table)
                    ->where([$this->primaryKey => $id])
                    ->set($data)
                    ->update();
            }//end if
            else{
                return FALSE;
            }//end else
        }//end 

        public function VerificarUsuario($email = null, $pass = null) {
            return $this
                ->table($this->table)
                        ->select("usuarios.id_usuario, 
                        usuarios.nombre_usuario,
                        CONCAT(usuarios.nombre_usuario, ' ', usuarios.ap_usuario, ' ', IFNULL(usuarios.am_usuario, '')) AS nombre_completo,
                        usuarios.sexo_usuario, 
                        usuarios.imagen_usuario, 
                        usuarios.email_usuario, 
                        usuarios.estatus_usuario, 
                        roles.id_rol, 
                        roles.nombre_rol")
                        ->join("roles", "usuarios.id_rol = roles.id_rol")
                        ->where("usuarios.email_usuario", $email)
                        ->where("usuarios.password_usuario", $pass)
                        ->get()
                        ->getRow();
        }
    } // end class 

?>