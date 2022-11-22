<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content'); ?>


    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title"><?= esc($title); ?></h3>
            <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-dark float-right">Regresar</a>
        </div>

<div class="row py-4">
        
    </div>

            <div class="card-body">
                <h4>Información básica del usuario</h4>


                <?php csrf_field(); ?>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Nombre:</label>
                            <input disabled type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="name" value="<?php echo trim($usuario['name']);?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                            <input disabled type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="apaterno" value="<?php echo trim($usuario['apaterno']);?>">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                            <input disabled type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="amaterno" value="<?php echo trim($usuario['amaterno']);?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                        <input disabled type="email" class="form-control form-control-border border-width-2"
                               id="exampleInputBorderWidth2" name="email" value="<?php echo trim($usuario['email']);?>">
                    </div>
                </div>
                </div>

                <div class="row">

                    <!--
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Contraseña:</label>
                            <input type="password" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="password" value="<?php echo trim($usuario['email']);?>">
                        </div>
                    </div>
                -->


                    <div class="col-md-6"
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Teléfono:</label>
                        <input disabled name="phone_no" type="tel" class="form-control form-control-border border-width-2" value="<?php echo trim($usuario['phone_no']);?>">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Area:</label>
                            <input disabled type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="area" value="<?php echo trim($usuario['area']);?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectBorderWidth2">Perfil:</label>
                            <input disabled type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="role" value="<?php echo trim($usuario['role']);?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= base_url('/admin/usuarios/'.$usuario['id'].'/edit') ?>" class="btn btn-primary float-right">Editar</a>
            </div>



    </div>


<?= $this->endsection(); ?>