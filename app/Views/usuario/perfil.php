<?= $this->extend("usuario/template/admin_template") ?>

<?= $this->section("content") ?>

    <div class="container" style="margin-top:20px;">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <?= session()->get('name') ?>
                    </div>


                    <div class="card-body">
                        <div class="card-text">
                            Usted es un <?= session()->get('role'); ?> del sistema.
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>