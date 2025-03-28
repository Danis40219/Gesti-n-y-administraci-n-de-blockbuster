<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base') ?>

<!-- RENDER css -->
<?= $this->section('css') ?>
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
    }
    .card-primary {
        border-top: 4px solid #38b2ac;
    }
    .card-header {
        background: linear-gradient(135deg, #38b2ac 0%, #319795 100%);
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
        border-color: #38b2ac;
        box-shadow: 0 0 0 3px rgba(56, 178, 172, 0.15);
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
        background-color: #38b2ac;
        border-color: #38b2ac;
    }
    .btn-primary:hover {
        background-color: #319795;
        border-color: #319795;
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
    .card-footer {
        background-color: #f8fafc;
        border-top: 1px solid #f1f5f9;
        padding: 20px;
    }
</style>
<?= $this->endSection() ?>
<!-- RENDER css -->

<!-- RENDER CONTENT -->
<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-film mr-2"></i> Nuevo Género
                        </h3>
                    </div>

                    <!-- Formulario de registro -->
                    <?= form_open('guardar_genero', ['id' => 'formulario-genero', 'class' => 'needs-validation']) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre_genero"><i class="fas fa-tag mr-1"></i> Nombre del género</label>
                            <input type="text" name="nombre_genero" id="nombre_genero" class="form-control" placeholder="Ej. Acción, Comedia..." required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion_genero"><i class="fas fa-align-left mr-1"></i> Descripción</label>
                            <textarea name="descripcion_genero" id="descripcion_genero" class="form-control" rows="4" placeholder="Escribe una breve descripción del género..." required></textarea>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="<?= route_to('generos') ?>" class="btn btn-danger">
                            <i class="fas fa-times mr-1"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary ml-2">
                            <i class="fas fa-save mr-1"></i> Guardar género
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<!-- RENDER CONTENT -->
