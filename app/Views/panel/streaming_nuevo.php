<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Nuevo Streaming</h4>

        <?= form_open_multipart(route_to('guardar_streaming')) ?>

        <div class="form-group">
            <label for="nombre">Nombre del título</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_lanzamiento">Fecha de lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="time" name="duracion" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="temporadas">Temporadas</label>
            <input type="number" name="temporadas" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="clasificacion">Clasificación</label>
            <select name="clasificacion" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="AA">AA - Infantil</option>
                <option value="A">A - Todo Público</option>
                <option value="B">B - Mayores de 12</option>
                <option value="B15">B15 - Mayores de 15</option>
                <option value="C">C - Mayores de 18</option>
                <option value="D">D - Exclusiva Adultos</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sipnosis">Sinopsis</label>
            <textarea name="sipnosis" class="form-control" rows="4" placeholder="Sinopsis del título..." required></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_estreno">Fecha de estreno en plataforma</label>
            <input type="date" name="fecha_estreno" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_genero">Género</label>
            <select name="id_genero" class="form-control" required>
                <option value="">Seleccione un género</option>
                <?php foreach ($generos as $genero): ?>
                    <option value="<?= $genero->id_genero ?>"><?= esc($genero->nombre_genero) ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="caratula_streaming">Carátula (imagen)</label>
            <input type="file" name="caratula_streaming" class="form-control-file" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="trailer_streaming">Tráiler (video)</label>
            <input type="file" name="trailer_streaming" class="form-control-file" accept="video/*" required>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar Streaming
            </button>
            <a href="<?= route_to('streaming') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
        </div>

        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
