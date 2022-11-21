<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content'); ?>


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= esc($title); ?></h3>
        </div>


        <form action="/admin/usuarios" method="post">

            <div class="card-body">
                <h4>Información básica del usuario</h4>


                <?php csrf_field(); ?>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Nombre:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="name" placeholder="Ejemplo: Edgar">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="apaterno" placeholder="Ejemplo: Degante">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                            <input type="text" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="amaterno" placeholder="Ejemplo: Aguilar"
                                   minlength="3">
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                        <input type="email" class="form-control form-control-border border-width-2"
                               id="exampleInputBorderWidth2" name="email" placeholder="Correo electrónico">
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputBorderWidth2">Contraseña:</label>
                            <input type="password" class="form-control form-control-border border-width-2"
                                   id="exampleInputBorderWidth2" name="password" placeholder="Defina una contraseña">
                        </div>
                    </div>


                    <div class="col-md-6"
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Teléfono:</label>
                        <input name="phone_no" type="text" class="form-control form-control-border border-width-2"
                               data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectBorderWidth2">Área de adscripción:</label>
                            <select name="area" class="custom-select form-control-border border-width-2"
                                    id="exampleSelectBorderWidth2">
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?= $area['id'] ?>"><?= $area['name'] ?></option>
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


    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({icons: {time: 'far fa-clock'}});

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function () {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function (file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function (progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function () {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function () {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>

<?= $this->endsection(); ?>