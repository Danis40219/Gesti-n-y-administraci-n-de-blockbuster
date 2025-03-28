<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base')?>

<!-- RENDER css -->
<?= $this->section('css')?>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }
        .card-primary {
            border-top: 4px solid #4361ee;
        }
        .card-header {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            color: white;
            padding: 20px;
            border-bottom: none;
        }
        .card-title {
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        .form-control {
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        .form-group label {
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
        }
        .btn {
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #4361ee;
            border-color: #4361ee;
        }
        .btn-primary:hover {
            background-color: #3a0ca3;
            border-color: #3a0ca3;
            transform: translateY(-2px);
        }
        .btn-danger {
            background-color: #ef4444;
            border-color: #ef4444;
        }
        .btn-danger:hover {
            background-color: #dc2626;
            border-color: #dc2626;
            transform: translateY(-2px);
        }
        .avatar-container {
            position: relative;
            margin-bottom: 30px;
        }
        .avatar-img {
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .avatar-badge {
            position: absolute;
            bottom: 10px;
            right: calc(50% - 75px);
            background-color: #4361ee;
            color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 0.15rem;
        }
        .form-check-input:checked {
            background-color: #4361ee;
            border-color: #4361ee;
        }
        .radio-container {
            display: flex;
            gap: 20px;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-footer {
            background-color: #f8fafc;
            border-top: 1px solid #f1f5f9;
            padding: 20px;
        }
        .section-title {
            font-size: 1.1rem;
            color: #4a5568;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        .form-section {
            margin-bottom: 25px;
        }
        #foto_perfil {
            padding: 12px;
        }
        #foto_perfil::file-selector-button {
            background-color: #4361ee;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            margin-right: 15px;
            cursor: pointer;
        }
    </style>
<?= $this->endSection()?>
<!-- RENDER css -->

<!-- RENDER CONTENT -->
<?= $this->section('content')?>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-plus mr-2"></i>
                                Registrar nuevo usuario
                            </h3>
                        </div>
                        <!-- form start -->
                        <?= form_open("registrar_usuario", ["id" => "formulario-nuevo-usuario", "class" => "needs-validation"])?>
                            <div class="card-body">
                                <!-- Avatar section -->
                                <div class="avatar-container text-center">
                                    <img src="<?= base_url(RECURSOS_PANEL_IMG_PROFILES_USER.'hombre.png'); ?>" 
                                        alt="imagen_perfil" 
                                        id="previsualizar_imagen"
                                        class="avatar-img rounded-circle" 
                                        width="150px">
                                    <label for="foto_perfil" class="avatar-badge">
                                        <i class="fas fa-camera"></i>
                                    </label>
                                </div>
                                
                                <!-- Personal information section -->
                                <div class="form-section">
                                    <h5 class="section-title"><i class="fas fa-user mr-2"></i>Información personal</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre"><i class="fas fa-signature mr-1"></i>Nombre(s)</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese nombre(s)",
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
                                                <label for="apellido_paterno"><i class="fas fa-signature mr-1"></i>Apellido Paterno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese apellido paterno",
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
                                                <label for="apellido_materno"><i class="fas fa-signature mr-1"></i>Apellido Materno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese apellido materno",
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
                                
                                <!-- Account information section -->
                                <div class="form-section">
                                    <h5 class="section-title"><i class="fas fa-id-badge mr-2"></i>Información de la cuenta</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rol"><i class="fas fa-user-tag mr-1"></i>Rol</label>
                                                <?php
                                                    $options = [
                                                        '' => 'Seleccionar un rol',
                                                        '745' => 'Administrador',
                                                        '125' => 'Operador'
                                                    ];

                                                    $attributes = [
                                                        'class' => 'form-control',
                                                        'id' => 'rol',
                                                        'name' => 'rol'
                                                    ];

                                                    echo form_dropdown('rol', $options, '', $attributes);
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
                                                                    "value"=> "",
                                                                    "placeholder"=> "correo@ejemplo.com",
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
                                                <div class="radio-container mt-2">
                                                    <div class="radio-option">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_masculino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, MASCULINO);
                                                        ?>
                                                        <label for="sexo_masculino" class="mr-3">Masculino</label>
                                                    </div>
                                                    <div class="radio-option">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_femenino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, FEMENINO);
                                                        ?>
                                                        <label for="sexo_femenino">Femenino</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Security section -->
                                <div class="form-section">
                                    <h5 class="section-title"><i class="fas fa-lock mr-2"></i>Seguridad</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"><i class="fas fa-key mr-1"></i>Contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese contraseña",
                                                                    "name"=> "password",
                                                                    "id"=> "password",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="repassword"><i class="fas fa-key mr-1"></i>Confirmar contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Repita la contraseña",
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
                                
                                <!-- File upload - hidden but functional -->
                                <div class="d-none">
                                    <?php
                                        $atributes = [
                                                        "type" => "file",
                                                        "class"=> "form-control",
                                                        "name"=> "foto_perfil",
                                                        "id"=> "foto_perfil",
                                                        "onchange"=> "previsualizar_imagen()",
                                                        "accept"=> ".png, .jpeg, .jpg",
                                                    ];
                                        echo form_input($atributes);
                                    ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="<?= route_to('usuarios') ?>" class="btn btn-danger">
                                    <i class="fas fa-times mr-1"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary ml-2">
                                    <i class="fas fa-save mr-1"></i>Registrar usuario
                                </button>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection()?>
<!-- RENDER CONTENT -->

<!-- RENDER js -->
<?= $this->section('js')?>
    <script>
        // Script para previsualizar la imagen
        function previsualizar_imagen() {
            const file = document.getElementById('foto_perfil').files[0];
            const preview = document.getElementById('previsualizar_imagen');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Validación de contraseñas
        document.getElementById('formulario-nuevo-usuario').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const repassword = document.getElementById('repassword').value;
            
            if (password !== repassword) {
                event.preventDefault();
                alert('Las contraseñas no coinciden');
            }
        });
    </script>
<?= $this->endSection()?>
<!-- RENDER js -->