<?= $this->extend("admin/template/admin_template") ?>

<?= $this->section("content") ?>

    <div class="container" style="margin-top:20px;">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <?= session()->get('name') ?>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            Usted es un  
                            <?php if (session()->get('role') == "admin") { ?>
                                <?php echo 'Administrador' ?> 
                            <?php } ?> del sistema.
                        </div>
                    

                        <div class="card-text">
                            Tu número de teléfono: <?= session()->get('phone_no'); ?>
                        </div>

                        <div class="card-text">
                            Tu correo electrónico: <?= session()->get('email'); ?>
                        </div>

                    </div>


                
            </div>
        </section>
    </div>

<?= $this->endSection() ?>