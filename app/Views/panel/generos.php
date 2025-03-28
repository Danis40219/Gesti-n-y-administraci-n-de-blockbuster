<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
<link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
<!-- Custom CSS -->
<style>
    .btn-agregar {
        background-color: #38b2ac;
        border-color: #38b2ac;
        border-radius: 20px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-agregar:hover {
        background-color: #319795;
        border-color: #319795;
        transform: translateY(-2px);
    }

    .action-btn {
        border-radius: 4px;
        margin-right: 5px;
        transition: all 0.2s;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .btn-eliminar {
        background-color: #f56565;
        border-color: #f56565;
    }

    .btn-editar {
        background-color: #ecc94b;
        border-color: #ecc94b;
    }

    .badge-activo {
        background-color: #48bb78;
    }

    .badge-inactivo {
        background-color: #f56565;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <!-- BOTÓN AGREGAR GÉNERO -->
        <a href="<?= route_to('nuevo_genero') ?>" class="btn btn-agregar">
            <i class="fas fa-plus"></i> Nuevo Género
        </a>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($generos as $genero): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($genero->nombre_genero) ?></td>
                            <td><?= esc($genero->descripcion_genero) ?></td>
                            <td>
                                <?php if ($genero->estatus_genero == 1): ?>
                                    <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <!-- Botón Activar/Desactivar -->
                                <?php if ($genero->estatus_genero == 1): ?>
                                    <a href="<?= route_to('estatus_genero', $genero->id_genero, -1) ?>"
                                       class="btn btn-sm btn-warning action-btn btn-deshabilitar"
                                       title="Deshabilitar"
                                       onclick="return confirm('¿Deseas deshabilitar este género?')">
                                        <i class="fas fa-user-slash"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= route_to('estatus_genero', $genero->id_genero, 1) ?>"
                                       class="btn btn-sm btn-primary action-btn btn-habilitar"
                                       title="Habilitar"
                                       onclick="return confirm('¿Deseas habilitar este género?')">
                                        <i class="fas fa-user-check"></i>
                                    </a>
                                <?php endif; ?>

                                <!-- Botón Editar -->
                                <a href="<?= route_to('editar_genero', $genero->id_genero) ?>"
                                   class="btn btn-sm btn-info"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Botón Eliminar -->
                                <a href="<?= route_to('eliminar_genero', $genero->id_genero) ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Estás seguro de eliminar este género?')">
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




<?= $this->section('js') ?>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-bs4/js/dataTables.bootstrap4.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/js/dataTables.responsive.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/js/responsive.bootstrap4.min.js' ?>"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true,
            language: {
                lengthMenu: "Mostrar _MENU_ registros por página",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                search: "<i class='fas fa-search'></i> Buscar:",
                zeroRecords: "No se encontraron registros coincidentes",
                paginate: {
                    first: "<i class='fas fa-angle-double-left'></i>",
                    last: "<i class='fas fa-angle-double-right'></i>",
                    next: "<i class='fas fa-angle-right'></i>",
                    previous: "<i class='fas fa-angle-left'></i>",
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>
