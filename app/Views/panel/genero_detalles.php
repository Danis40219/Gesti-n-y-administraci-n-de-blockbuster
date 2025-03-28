<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base')?>

<!-- RENDER css -->
<?= $this->section('css')?>
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 15px 15px 0 0;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102,126,234,.25);
    }

    .btn-primary {
        background-color: #667eea;
        border: none;
        border-radius: 30px;
        padding: 8px 25px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5a67d8;
        transform: translateY(-2px);
    }

    .btn-danger {
        border-radius: 30px;
        padding: 8px 25px;
        background-color: #e53e3e;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c53030;
        transform: translateY(-2px);
    }
</style>
<?= $this->endSection()?>

<!-- RENDER CONTENT -->
<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-tags mr-2"></i>Detalles del Género</h3>
                    </div>

                    <?= form_open(route_to('actualizar_genero', $genero->id_genero), ["id" => "formulario-detalles-genero"]) ?>
                    <div class="card-body">

                        <!-- Nombre del Género -->
                        <div class="form-group">
                            <label for="nombre"><i class="fas fa-tag mr-1"></i>Nombre del Género</label>
                            <?= form_input([
                                "type" => "text",
                                "class" => "form-control",
                                "name" => "nombre",
                                "id" => "nombre",
                                "value" => $genero->nombre_genero,
                                "placeholder" => "Nombre del género",
                                "required" => true
                            ]) ?>
                        </div>

                        <!-- Descripción del Género -->
                        <div class="form-group">
                            <label for="descripcion"><i class="fas fa-align-left mr-1"></i>Descripción</label>
                            <?= form_textarea([
                                "class" => "form-control",
                                "name" => "descripcion",
                                "id" => "descripcion",
                                "rows" => "4",
                                "placeholder" => "Descripción del género",
                                "required" => true
                            ], $genero->descripcion_genero) ?>
                        </div>

                        <!-- Estatus del Género -->
                        <div class="form-group">
                            <label for="estatus"><i class="fas fa-toggle-on mr-1"></i>Estatus</label>
                            <select name="estatus" id="estatus" class="form-control" required>
                                <option value="1" <?= $genero->estatus_genero == 1 ? 'selected' : '' ?>>Activo</option>
                                <option value="-1" <?= $genero->estatus_genero == -1 ? 'selected' : '' ?>>Inactivo</option>
                            </select>
                        </div>

                    </div>

                    <!-- Footer con botones -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i>Actualizar
                        </button>
                        <a href="<?= route_to('generos') ?>" class="btn btn-danger ml-2">
                            <i class="fas fa-times mr-1"></i>Cancelar
                        </a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


<!-- RENDER JS -->
<?= $this->section('js')?>
<script>
    // Validación rápida
    document.getElementById("formulario-detalles-genero").addEventListener("submit", function(e){
        const nombre = document.getElementById("nombre").value.trim();
        const descripcion = document.getElementById("descripcion").value.trim();

        if(nombre === "" || descripcion === "") {
            e.preventDefault();
            alert("Todos los campos son obligatorios.");
        }
    });
</script>
<?= $this->endSection()?>
