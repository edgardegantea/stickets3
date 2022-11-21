<?= $this->extend('layout/main') ?>

<?= $this->section('botones') ?>
<div class="">
    <a href="/tickets/" class="button is-light">Cancelar</a>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">

    <?php $validation = \Config\Services::validation(); ?>

    <form action="<?= base_url('tickets/'.$ticket['id']) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT" />

        <div class="field">
            <label class="label">Asunto:</label>
            <div class="control">
                <input class="input <?php if ($validation->getError('title')): ?>is-invalid<?php endif; ?>" required type="text" name="title"
                       style="font-size: x-large; text-transform: uppercase"
                       value="<?php if($ticket['title']): echo $ticket['title']; else: set_value('title'); endif ?>">
                <?php if ($validation->getError('title')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('title'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="columns">

            <input type="hidden" name="status" value="s01">

            <div class="column">
                <div class="field">
                    <label class="label">Área:</label>
                    <div class="control">
                        <div class="select">
                            <select required name="area">

                                <option disabled selected>Seleccione el área</option>
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

                                <option disabled selected>Seleccione la categoría</option>
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
        </div>

        <div class="field">
            <label class="label">Descripción de la falla o situación:</label>
            <div class="control">
                <textarea required class="textarea <?php if ($validation->getError('description')): ?>is-invalid<?php endif; ?>" name="description">
                    <?php if($ticket['description']): echo $ticket['description']; else: set_value('description'); endif ?>
                </textarea>

                <?php if ($validation->getError('description')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('description'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="field">
            <label class="label">Evidencia:</label>
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
                        <input class="input" type="url" name="url" value="<?php if($ticket['url']): echo $ticket['url']; else: echo ''; endif ?>">
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <label class="label">Teléfono de contacto:</label>
                    <div class="control">
                        <input required class="input <?php if ($validation->getError('phone')): ?>is-invalid<?php endif; ?>" type="tel" name="phone" pattern="{[0-9][3]}-{[0-9][3]}-{[0-9][4]}"
                               accept="application/vnd.apple.numbers"
                               value="<?php if($ticket['phone']): echo $ticket['phone']; else: set_value('phone'); endif ?>">

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
                        <input required class="input <?php if ($validation->getError('email')): ?>is-invalid<?php endif; ?>" type="email" name="email" value="<?php if($ticket['email']): echo $ticket['email']; else: set_value('email'); endif ?>">
                        <?php if ($validation->getError('email')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-grouped is-left">
            <div class="control">
                <input class="button is-link is-light" type="reset">
            </div>
            <div class="control">
                <!-- <input class="button is-link" type="submit" name="" value="Enviar"> -->
                <button class="button is-link" type="submit">Actualizar</button>
            </div>
        </div>

    </form>

</section>


<?= $this->endSection() ?>
