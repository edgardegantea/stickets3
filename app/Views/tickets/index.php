<?= $this->extend('admin/template/admin_template'); ?>



<?= $this->section('content'); ?>


<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= esc($title); ?></h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Remitente</th>
                    <th>Estado</th>
                    <th>Asunto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                <?php if (!empty($tickets) && is_array($tickets)): ?>
                    <?php foreach ($tickets as $ticket): ?>
                        <?php
                        if ($ticket['status'] == 's01') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's02') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's03') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's04') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's05') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's06') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's07') {
                            echo '<tr class="">';
                        } else if ($ticket['status'] == 's08') {
                            echo '<tr class="">';
                        }
                        ?>

                        <td>
                            <?= esc($ticket['id']); ?>
                        </td>

                        <td>
                            

                            <?= esc('usuario'); ?>

                            <?php /*
                            <?php
                            if ($ticket['area'] == 1) {
                                echo 'Subdirección Académica';
                            } else if ($ticket['area'] == 2) {
                                echo 'Posgrado';
                            } else if ($ticket['area'] == 3) {
                                echo 'Recursos financieros';
                            } else if ($ticket['area'] == 4) {
                                echo 'División de Ingeniería Informática';
                            }
                            ?>
                            */ ?> 
                        
                        </td>

                        <td>

                            <?php
                            if ($ticket['status'] == 's01') {
                                echo 'No iniciado';
                            } else if ($ticket['status'] == 's02') {
                                echo 'Iniciado';
                            } else if ($ticket['status'] == 's03') {
                                echo 'En revisión';
                            } else if ($ticket['status'] == 's04') {
                                echo 'En proceso';
                            } else if ($ticket['status'] == 's05') {
                                echo 'Finalizado';
                            } else if ($ticket['status'] == 's06') {
                                echo 'Abierto';
                            } else if ($ticket['status'] == 's07') {
                                echo 'Re-abierto';
                            } else if ($ticket['status'] == 's08') {
                                echo 'Cerrado';
                            }
                            ?>

                        </td>

                        <td>
                            <p><?= esc($ticket['title']) ?></p>
                        </td>

                        <td>
                            <?= esc($ticket['description']) ?>
                        </td>

                        <td>
                            <a class="" href="<?= base_url('tickets/' . $ticket['id']); ?>">
                                <span class="badge bg-dark"> Abrir</span>
                            </a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Área</th>
                    <th>Estado</th>
                    <th>Asunto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>







