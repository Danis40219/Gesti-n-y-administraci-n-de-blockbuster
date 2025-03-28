<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base') ?>

<!-- RENDER css -->
<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
<link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
<!-- Custom CSS -->
<style>
    .card {
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 8px 8px 0 0 !important;
        padding: 20px;
    }

    .card-title {
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }

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

    .btn-deshabilitar {
        background-color: #4a5568;
        border-color: #4a5568;
    }

    .btn-habilitar {
        background-color: #4299e1;
        border-color: #4299e1;
    }

    .btn-detalles {
        background-color: #ecc94b;
        border-color: #ecc94b;
    }

    .btn-eliminar {
        background-color: #f56565;
        border-color: #f56565;
    }

    table.dataTable {
        border-collapse: collapse !important;
    }

    table.dataTable thead th {
        background-color: #f7fafc;
        border-bottom: 2px solid #e2e8f0;
        font-weight: 600;
        color: #4a5568;
    }

    table.dataTable tbody tr:hover {
        background-color: #f7fafc;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #667eea !important;
        color: white !important;
        border: none !important;
        border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #764ba2 !important;
        color: white !important;
        border: none !important;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        padding: 5px 10px;
    }
</style>
<?= $this->endSection() ?>
<!-- RENDER css -->

<!-- RENDER CONTENT -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
         <!-- BOTÓN AGREGAR USUARIO -->
         <div class="mb-3">
            <a href="<?= route_to('usuario_nuevo') ?>" class="btn btn-agregar">
                <i class="fas fa-user-plus"></i> Nuevo Usuario
            </a>
        </div>
        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Rol</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario ?></td>
                        <td><?= $usuario->email_usuario ?></td>
                        <td><?= ($usuario->sexo_usuario == 1) ? 'Masculino' : 'Femenino' ?></td>

                        <td><?= $usuario->nombre_rol ?></td>
                        <td>
                            <?php if ($usuario->estatus_usuario == 1): ?>
                                <span class="badge badge-success">Activo</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Inactivo</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($usuario->estatus_usuario == 1): ?>
                                <a href="<?= route_to('estatus_usuario', $usuario->id_usuario, -1) ?>" class="btn btn-sm btn-warning action-btn btn-deshabilitar" title="Deshabilitar">
                                    <i class="fas fa-user-slash"></i>
                                </a>
                            <?php else: ?>
                                <a href="<?= route_to('estatus_usuario', $usuario->id_usuario, 1) ?>" class="btn btn-sm btn-primary action-btn btn-habilitar" title="Habilitar">
                                    <i class="fas fa-user-check"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?= route_to('detalles_usuario', $usuario->id_usuario) ?>" class="btn btn-sm btn-info action-btn btn-detalles" title="Editar">
    <i class="fas fa-edit"></i>
</a>

                            <a href="<?= route_to('eliminar_usuario', $usuario->id_usuario) ?>" class="btn btn-sm btn-danger action-btn btn-eliminar" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<!-- RENDER CONTENT -->

<!-- RENDER js -->
<?= $this->section('js') ?>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-bs4/js/dataTables.bootstrap4.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/js/dataTables.responsive.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-responsive/js/responsive.bootstrap4.min.js' ?>"></script>
<script src="<?= base_url(RECURSOS_PANEL_ADMIN_PLUGINS) . '/datatables-buttons/js/dataTables.buttons.min.js' ?>"></script>

<script>
    $(document).ready(function() {
            $('#dataTable').DataTable({
                'processing': true,
                "responsive": true,
                "scrollX": false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "processing": "<i class='fas fa-spinner fa-spin'></i> Procesando...",
                    "search": "<i class='fas fa-search'></i> Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "paginate": {
                        "first": "<i class='fas fa-angle-double-left'></i>",
                        "last": "<i class='fas fa-angle-double-right'></i>",
                        "next": "<i class='fas fa-angle-right'></i>",
                        "previous": "<i class='fas fa-angle-left'></i>",
                    }, //end paginate
                } //end language
            }) //end DataTable

        } //end function
    ); //end ready
</script>
<?= $this->endSection() ?>
<!-- RENDER js -->