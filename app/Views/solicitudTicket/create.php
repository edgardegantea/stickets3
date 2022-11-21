<?= $this->extend('layout/basic') ?>

<?= $this->section('botones') ?>
<div class="">
    <!-- <a href="/tickets/" class="button is-light">Cancelar</a> -->
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">

    <?php $validation = \Config\Services::validation(); ?>
    <form action="<?php echo base_url('solicitud/') ?>" method="post" enctype="">
        <?= csrf_field(); ?>

        <div class="">
            <label class="label">Asunto:</label>
            <div class="">
                <input class="form-control <?php if ($validation->getError('title')): ?>is-invalid<?php endif; ?>" required type="text" name="title"
                       style="font-size: x-large; text-transform: uppercase" value="<?php echo set_value('title'); ?>">
                <?php if ($validation->getError('title')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('title'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="columns">

            <input type="hidden" name="status" value="s01">

            <!--
                        <div class="column">
                            <div class="field">
                                <label class="label">Estado:</label>
                                <div class="control">
                                    <div class="select">
                                        <select required readonly="true" name="status">
                                            <option value="s01">No inciado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
            -->
            <div class="column">
                <div class="field">
                    <label class="label">Área:</label>
                    <div class="">
                        <div class="select">
                            <select required name="area" class="">

                                <option disabled selected>Seleccione el área que requiere el soporte:</option>
                                <?php foreach ($areas as $a): ?>
                                    <option value="<?= $a['id'] ?>"><?= $a['name'] ?><?php echo set_value('name'); ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <div class="column">
                <div class="field">
                    <label class="label">Categoría:</label>
                    <div class="control">
                        <div class="select">
                            <select required name="category">

                                <option disabled selected>Seleccione la categoría:</option>
                                <?php foreach ($categories as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?><?php echo set_value('name'); ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label">Prioridad:</label>
                    <div class="control">
                        <div class="select">
                            <select required name="priority">

                                <option disabled selected>Seleccione la prioridad</option>
                                <?php foreach ($priorities as $p): ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label for="" class="label">Prioridad</label>
                    <div class="control">
                        <label class="radio">
                            <input type="checkbox" name="priority">
                            Urgente
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="field">
            <label class="label">Describa la falla o situación:</label>
            <div class="control">
                <textarea required class="textarea <?php if ($validation->getError('description')): ?>is-invalid<?php endif; ?>" name="description"></textarea>

                <?php if ($validation->getError('description')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('description'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Adjuntar datos:</label>
            <div class="control">
                <div class="file is-info has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="evidence">
                        <span class="file-cta">
							<span class="file-icon">
								<i class="fas fa-upload"></i>
							</span>
							<span class="file-label">
								Evidencia
							</span>
						</span>
                        <span class="file-name">
		      				---
		    			</span>
                    </label>
                </div>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">URL:</label>
                    <div class="control">
                        <input class="input" type="url" name="url">
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label">Teléfono de contacto:</label>
                    <div class="control">
                        <input required class="input <?php if ($validation->getError('phone')): ?>is-invalid<?php endif; ?>" type="tel" name="phone" pattern="{[0-9][3]}-{[0-9][3]}-{[0-9][4]}"
                               accept="application/vnd.apple.numbers" value="<?php echo set_value('phone'); ?>">

                        <?php if ($validation->getError('phone')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label">Correo electrónico:</label>
                    <div class="control">
                        <input required class="input <?php if ($validation->getError('email')): ?>is-invalid<?php endif; ?>" type="email" name="email" value="<?php echo set_value('email'); ?>">
                        <?php if ($validation->getError('email')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>


        <!--<div class="field">
			<label class="label">Estado:</label>
			<div class="control">
				<div class="select">
					<select name="status">

						<option disabled selected>Seleccione el estado del ticket</option>
						<?php /*foreach ($status as $s): */ ?>
							<option value="<? /*= $s['id'] */ ?>"><? /*= $s['name'] */ ?></option>
						<?php /*endforeach */ ?>

					</select>
				</div>
			</div>
		</div>
        -->


        <div class="field is-grouped is-left">
            <div class="control">
                <input class="button is-link is-light" type="reset">
            </div>
            <div class="control">
                <input class="button is-link" type="submit" name="" value="Enviar">
            </div>
        </div>

    </form>

</div>


<?= $this->endSection() ?>
