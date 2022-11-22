<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content'); ?>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

        
        

            <div class="card-body">
                <h4>Información básica del usuario</h4>


                <form action="<?= base_url('admin/usuarios/'.$usuario['id']) ?>" method="POST">

                <?= csrf_field() ?>
                
                <input type="hidden" name="_method" value="PUT" />


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Nombre:</label>
                            <input type="text" class="form-control form-control-border border-width-2 
                            <?php if($validation->getError('name')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="name" 
                            value="<?php if($usuario['name']): echo $usuario['name']; else: set_value('name'); endif ?>"/>
                            
                            <?php if ($validation->getError('name')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                            <input type="text" class="form-control form-control-border border-width-2
                            <?php if($validation->getError('apaterno')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="apaterno" 
                            value="<?php if($usuario['apaterno']): echo $usuario['apaterno']; else: set_value('apaterno'); endif ?>"/>
                            
                            <?php if ($validation->getError('apaterno')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('apaterno') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                            <input type="text" class="form-control form-control-border border-width-2
                            <?php if($validation->getError('amaterno')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="amaterno" 
                            value="<?php if($usuario['amaterno']): echo $usuario['amaterno']; else: set_value('amaterno'); endif ?>"/>
                            
                            <?php if ($validation->getError('amaterno')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('amaterno') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                            <input type="email" class="form-control form-control-border border-width-2
                            <?php if($validation->getError('email')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="email" 
                            value="<?php if($usuario['email']): echo $usuario['email']; else: set_value('email'); endif ?>"/>
                            
                            <?php if ($validation->getError('email')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Contraseña:</label>
                            <input type="password" class="form-control form-control-border border-width-2
                            <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="password" 
                            value="<?php if($usuario['password']): echo $usuario['password']; else: set_value('password'); endif ?>"/>
                            
                            <?php if ($validation->getError('password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Teléfono:</label>
                            <input type="tel" class="form-control form-control-border border-width-2
                            <?php if($validation->getError('phone_no')): ?>is-invalid<?php endif ?>"
                            id="exampleInputBorderWidth2" name="phone_no" 
                            value="<?php if($usuario['phone_no']): echo $usuario['phone_no']; else: set_value('phone_no'); endif ?>"/>
                            
                            <?php if ($validation->getError('phone_no')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone_no') ?>
                                </div>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="row">


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


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectBorderWidth2">Área de adscripción:</label>
                            <select name="area" class="custom-select form-control-border border-width-2"
                                    id="exampleSelectBorderWidth2">
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?= $area['id']; ?>"><?= $area['name']; ?></option>
                                <?php endforeach; ?>
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