<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base')?>

<!-- RENDER css -->
<?= $this->section('css')?>
    <!-- Custom CSS para este formulario -->
    <style>
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
        
        .profile-img-container {
            position: relative;
            margin-bottom: 30px;
        }
        
        .profile-img {
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .profile-img:hover {
            transform: scale(1.05);
        }
        
        .form-control:focus {
            border-color: #4b6cb7;
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            border: none;
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-danger {
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .form-group label {
            font-weight: 500;
            color: #555;
        }
        
        .card-footer {
            background: transparent;
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        
        .custom-file-input:focus ~ .custom-file-label {
            border-color: #4b6cb7;
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }
        
        .gender-options {
            display: flex;
            gap: 20px;
        }
        
        .gender-option {
            flex: 1;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .gender-option.selected {
            background-color: #4b6cb7;
            color: white;
            border-color: #4b6cb7;
        }
    </style>
<?= $this->endSection()?>
<!-- RENDER css -->

<!-- RENDER CONTENT -->
<?= $this->section('content')?>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- jquery validation -->
                    <div class="card profile-card">
                        <div class="card-header profile-header">
                            <h3 class="card-title text-white"><i class="fas fa-user-edit mr-2"></i>Detalles del Usuario</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart("editar_usuario/".$usuario->id_usuario, ["id" => "formulario-editar-usuario"])?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-container text-center">
                                            <?php
                                                $img = ($usuario->imagen_usuario != NULL) ? $usuario->imagen_usuario : "hombre.png";
                                            ?>
                                            <img src="<?= base_url(RECURSOS_PANEL_IMG_PROFILES_USER.$img); ?>" 
                                                alt="imagen_perfil" 
                                                class="profile-img avatar-img rounded-circle shadow" 
                                                width="150px"
                                                id="previsualizar_imagen">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-id-card mr-2"></i>Información Personal</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre"><i class="fas fa-user mr-1"></i>Nombre(s)</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> $usuario->nombre_usuario,
                                                                    "placeholder"=> "Nombre(s)",
                                                                    "name"=> "nombre",
                                                                    "id"=> "nombre",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_paterno"><i class="fas fa-user mr-1"></i>Apellido Paterno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> $usuario->ap_usuario,
                                                                    "placeholder"=> "Apellido Paterno",
                                                                    "name"=> "apellido_paterno",
                                                                    "id"=> "apellido_paterno",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_materno"><i class="fas fa-user mr-1"></i>Apellido Materno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> $usuario->am_usuario,
                                                                    "placeholder"=> "Apellido Materno",
                                                                    "name"=> "apellido_materno",
                                                                    "id"=> "apellido_materno",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-cog mr-2"></i>Información de la Cuenta</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rol"><i class="fas fa-user-tag mr-1"></i>Rol</label>
                                                <?php
                                                    $attributes = array(
                                                        'class' => 'form-control',
                                                        'id' => 'rol',
                                                        'name' => 'rol'
                                                    );

                                                    echo form_dropdown('rol', ['' => 'Selecciona un rol']+ROLES, $usuario->id_rol, $attributes);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email"><i class="fas fa-envelope mr-1"></i>Correo electrónico</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "email",
                                                                    "class"=> "form-control",
                                                                    "value"=> $usuario->correo_usuario,
                                                                    "placeholder"=> "Correo electrónico",
                                                                    "name"=> "email",
                                                                    "id"=> "email",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><i class="fas fa-venus-mars mr-1"></i>Sexo</label>
                                                <div class="gender-options">
                                                    <div class="gender-option <?= ($usuario->sexo_usuario == MASCULINO ? 'selected' : '') ?>">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input d-none",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_masculino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, MASCULINO, ($usuario->sexo_usuario == MASCULINO ? TRUE : FALSE));
                                                        ?>
                                                        <label for="sexo_masculino" class="mb-0"><i class="fas fa-male mr-1"></i> Masculino</label>
                                                    </div>
                                                    <div class="gender-option <?= ($usuario->sexo_usuario == FEMENINO ? 'selected' : '') ?>">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input d-none",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_femenino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, FEMENINO, ($usuario->sexo_usuario == FEMENINO ? TRUE : FALSE));
                                                        ?>
                                                        <label for="sexo_femenino" class="mb-0"><i class="fas fa-female mr-1"></i> Femenino</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-lock mr-2"></i>Seguridad</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"><i class="fas fa-key mr-1"></i>Contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "***********",
                                                                    "name"=> "password",
                                                                    "id"=> "password",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                                <small class="form-text text-muted">Deja en blanco para mantener la contraseña actual</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="repassword"><i class="fas fa-key mr-1"></i>Repetir Contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "***********",
                                                                    "name"=> "repassword",
                                                                    "id"=> "repassword",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-light p-3 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-camera mr-2"></i>Foto de Perfil</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <?php
                                                    $atributes = [
                                                                    "type" => "file",
                                                                    "class"=> "custom-file-input",
                                                                    "name"=> "foto_perfil",
                                                                    "id"=> "foto_perfil",
                                                                    "onchange"=> "previsualizar_imagen('previsualizar_imagen','foto_perfil')",
                                                                    "accept"=> ".png, .jpeg, .jpg",
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                                <label class="custom-file-label" for="foto_perfil">Seleccionar archivo</label>
                                            </div>
                                            <small class="form-text text-muted">Formatos permitidos: JPG, JPEG, PNG. Tamaño máximo: 2MB</small>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <?= form_submit('btn-actualizar', 'Actualizar', ["class" => "btn btn-primary px-4"]);?>
                                <a href="<?= route_to('usuarios') ?>" class="btn btn-danger px-4 ml-2">Cancelar</a>
                            </div>
                        <?=form_close()?>
                        <!-- </form> -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
<?= $this->endSection()?>
<!-- RENDER CONTENT -->

<!-- RENDER js -->
<?= $this->section('js')?>
    <!-- Scripts personalizados -->
    <script>
        $(document).ready(function() {
            // Cambiar el texto del input file al seleccionar un archivo
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            
            // Selección de género con efectos visuales
            $(".gender-option").click(function() {
                $(".gender-option").removeClass("selected");
                $(this).addClass("selected");
                $(this).find("input").prop("checked", true);
            });
            
            // Validación del formulario
            $("#formulario-editar-usuario").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 2
                    },
                    apellido_paterno: {
                        required: true,
                        minlength: 2
                    },
                    apellido_materno: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    rol: {
                        required: true
                    },
                    repassword: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    repassword: {
                        equalTo: "Las contraseñas no coinciden"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        
        // Función para previsualizar la imagen
        function previsualizar_imagen(id_imagen, id_input) {
            const input = document.getElementById(id_input);
            const imagen = document.getElementById(id_imagen);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagen.src = e.target.result;
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<?= $this->endSection()?>
<!-- RENDER js -->