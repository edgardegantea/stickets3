<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content'); ?>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('/admin/usuarios/'.$usuario['id']) ?>" method="post">
        

            <div class="card-body">
                <h4>Información básica del usuario</h4>


                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT" />

                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Nombre:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="name" placeholder="Nombre" value="<?= $usuario['name']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="apaterno" placeholder="Ejemplo: Degante" value="<?= $usuario['apaterno']; ?>">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="amaterno" placeholder="Ejemplo: Aguilar" value="<?= $usuario['amaterno']; ?>"
                                   minlength="3">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                            <input type="email" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="email" placeholder="Correo electrónico"  value="<?= $usuario['email']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Contraseña:</label>
                            <input type="password" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="password" placeholder="Defina una contraseña"  value="<?= $usuario['password']; ?>">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Teléfono:</label>
                            <input name="phone_no" type="text" class="form-control form-control-border border-width-2"
                                   data-inputmask='"mask": "(999) 999-9999"' data-mask  value="<?= $usuario['phone_no']; ?>">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectBorderWidth2">Área de adscripción:</label>
                            <select name="area" class="custom-select form-control-border border-width-2"
                                    id="exampleSelectBorderWidth2">
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?= $area['id']; ?>"><?= $area['name']; ?><?php echo set_value('name'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectBorderWidth2">Perfil:</label>
                            <select name="role" class="custom-select form-control-border border-width-2"
                                    id="exampleSelectBorderWidth2">
                                <option value="admin">Administrador</option>
                                <option value="usuario">Usuario</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-default">Restablecer campos</button>
                <button type="submit" class="btn btn-primary float-right">Aceptar</button>
            </div>


        </form>

    </div>


<?= $this->endsection(); ?>