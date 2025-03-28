<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <!-- BOTÓN AGREGAR STREAMING -->
        <a href="<?= route_to('nuevo_streaming') ?>" class="btn btn-agregar">
    <i class="fas fa-plus"></i> Nuevo Streaming
</a>


        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Carátula</th>
                        <th>Duración</th>
                        <th>Temporadas</th>
                        <th>Clasificación</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($streamings as $streaming): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($streaming['nombre_streaming']) ?></td>
                            <td>
                                <img src="<?= base_url('streaming/caratulas/' . $streaming['caratula_streaming']) ?>" width="60" height="90">
                            </td>
                            <td><?= esc($streaming['duracion_streaming']) ?></td>
                            <td><?= esc($streaming['temporadas_streaming']) ?></td>
                            <td><?= esc($streaming['clasificacion_streaming']) ?></td>
                            <td>
                                <?php if ($streaming['estatus_streaming'] == 1): ?>
                                    <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <!-- Estatus -->
                                <?php if ($streaming['estatus_streaming'] == 1): ?>
                                    <a href="<?= route_to('estatus_streaming', $streaming['id_streaming'], -1) ?>"
                                       class="btn btn-sm btn-warning"
                                       title="Deshabilitar"
                                       onclick="return confirm('¿Deseas deshabilitar este título?')">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= route_to('estatus_streaming', $streaming['id_streaming'], 1) ?>"
                                       class="btn btn-sm btn-primary"
                                       title="Habilitar"
                                       onclick="return confirm('¿Deseas habilitar este título?')">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                <?php endif; ?>

                                <!-- Editar -->
                                <a href="<?= route_to('editar_streaming', $streaming['id_streaming']) ?>"
                                   class="btn btn-sm btn-info"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Eliminar -->
                                <a href="<?= route_to('eliminar_streaming', $streaming['id_streaming']) ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Estás seguro de eliminar este título?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
