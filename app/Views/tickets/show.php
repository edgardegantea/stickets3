<?= $this->extend('layout/main'); ?>


<?= $this->section('botones') ?>


<?php
echo '<a class="button is-outlined is-light" href="' . $_SERVER['HTTP_REFERER'] . '">Regresar</a>';
?>
<?= $this->endSection() ?>



<?= $this->section('content'); ?>

<section class="section">


    <div class="">
        <!-- Main container -->
        <nav class="level column">
            <!-- Left side -->
            <div class="level-left">

                <div class="level-item">
                    <p class="is-size-1 is-uppercase has-text-dark">
                        <?= esc($ticket['title']); ?>
                    </p>
                </div>
            </div>

            <!-- Right side -->
            <div class="level-right">

                <div class="level-item">

                    <?php if ($ticket['status'] == 's01'): ?>
                        <span class="tag is-light is-bordered is-large">
		  			  	Estado: NO INICIADO
					  </span>
                    <?php elseif ($ticket['status'] == 's02'): ?>
                        <span class="tag is-link is-large">
		  			  	Estado: INICIADO
					  </span>
                    <?php else: ?>
                        <span class="tag is-primary is-large">
		  			  	Estado: EN PROCESO
					  </span>
                    <?php endif; ?>

                    <p class="level-item">
                        <a href="<?php echo base_url('tickets/seguimiento'); ?>" class="button is-success">SEGUIMIENTO
                        </a>
                    </p>

                </div>


                <!-- REVISAR PARA SOLUCIONAR ENVÍO DE EMAIL -->
                <?php

                $correo_destino = esc($ticket['email']);
                $asunto = 'Mensaje de prueba';
                $mensaje = 'Contenido del mensaje de prueba';
                // mail($correo_destino, $asunto, $mensaje);
                ?>
                <!-- -------------------------------------- -->

                <p class="level-item is-large">
                    <a href="mailto:<?= esc($correo_destino); ?>" class="button is-link">
					<span class="icon-text has-text-light">
					<span class="icon">
				    	<i class="fa-solid fa-envelope"></i>
					</span>
					<span>Enviar email</span>
					</span>
                    </a>
                </p>


                <?php

                $segm1 = "https://api.whatsapp.com/send?phone=+521";
                $numero = esc($ticket['phone']);
                $segm2 = "&text=Hola, Esta es una prueba de conexión desde PHP. Supportickets 1.0";

                $cadena = '' . $segm1 . '' . $numero . '' . $segm2;

                ?>

                <p class="level-item is-large">

                    <a target="_blank" href="<?= esc($cadena); ?>" class="button is-link">
                        <span class="icon-text has-text-light">
                            <span class="icon">
                                <i class="fa-brands fa-whatsapp"></i>
                            </span>
                            <span>WhatsApp</span>
                        </span>
                    </a>
                </p>


                <p class="level-item is-large">
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                            <span>Mas acciones</span>
                            <span class="icon is-small">
                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                          </span>
                        </button>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">

                            <a href="<?php base_url('imprimirComprobante'); ?>" class="dropdown-item has-background-black has-text-light">
                                IMPRIMIR COMPROBANTE
                            </a>

                            <a href="#" class="dropdown-item has-text-link">
                                Marcar como prioritario
                            </a>

                            <a href="<?= base_url('tickets/edit/'.$ticket['id']) ?>" class="dropdown-item">
                                Editar
                            </a>

                            <a class="dropdown-item">
                                Archivar
                            </a>

                            <a href="#" class="dropdown-item">
                                Cerrar ticket
                            </a>
                            <hr class="dropdown-divider">

                            <form class="display-none" method="post" action="<?= base_url('tickets/'.$ticket['id'])?>" id="ticketDeleteForm<?=$ticket['id']?>">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <a href="javascript:void(0)" onclick="deleteTicket('ticketDeleteForm<?=$ticket['id']?>')" class="dropdown-item has-text-danger" title="Delete">Eliminar</a>
                            </form>
                        </div>
                    </div>
                </div>
                </p>

                <!--
                <p class="level-item is-large">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+5212312339545&text=Hola, Esta es una prueba de conexión desde PHP. Supportickets 1.0" class="button is-primary">WhatsApp</a>
                </p>
                <a href="whatsapp://send?text=Hola, Index.pe&phone=+5212312066656&abid=+12 346 678 910">+12 346 678 910</a>
                -->

                <!--
                <p class="level-item is-large">
                    <a href="whatsapp://send?text=Hola, Index.pe&phone=+5212311660698&abid=+52123110660698">WhatsApp de prueba</a>
                </p>
                -->

            </div>
        </nav>

    </div>

    <div class="content">
        Detalles:
        <p class="mx-5 my-5 is-size-4 has-text-justify"><?= esc($ticket['description']); ?></p>
    </div>

    <div class="content">
        Evidencia:
        <p class="mx-5 my-5 is-size-5"><?= esc($ticket['evidence']); ?></p>
    </div>


</section>

<script>
    function deleteTicket(formId) {
        var confirm = window.confirm('¿Está seguro de eliminar este registro?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>
