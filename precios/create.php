<?php 
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- nabvar inicio -->
    <?php include('../layout/admin/menu.php'); ?>
  <!-- nabvar final -->

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <br>
            <h2>Registro de precios</h2>
            <br>

            <div class="row">
                <div class="col-md-10">
                     <!-- INICIO TARJETA -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos cuidadosamente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                            <!-- ---------INICIO FORMULARIO----- -->
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="">Cantidad <span style="color: red"><b>*</b></span></label>
                                            <input type="number" id="cantidad" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="">Detalle</label>
                                            <select name="" id="detalle" class="form-control">
                                                <option value="HORAS">HORAS</option>
                                                <option value="DIAS">DIAS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="">Precio <span style="color: red"><b>*</b></span></label>
                                            <input type="number" id="precio" class="form-control">
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="index.php" class="btn btn-default">Cancelar</a>
                                            <button class="btn btn-primary" id="btn_registrar_precio">Registrar precio</button>
                                        </div>
                                    </div>

                                        <script>
                                            $('#btn_registrar_precio').click(function(){
                                               var cantidad = $('#cantidad').val();
                                               var detalle = $('#detalle').val();
                                               var precio = $('#precio').val();

                                                if(cantidad == ""){
                                                    alert("Debe llenar el campo Cantidad");
                                                    $('#cantidad').focus();
                                                }else if(precio == ""){
                                                    alert("Debe llenar el campo Precio");
                                                    $('#precio').focus();
                                                }else{
                                                    var url = 'controller_create.php';
                                                    $.get(url, {cantidad:cantidad, detalle:detalle, precio:precio}, function(datos){
                                                     $('#respuesta').html(datos);
                                                    });
                                                }

                                            });
                                        </script>
                                </div>
                                                <div id="respuesta">

                                                </div>
                            </div>
                            <!-- ---------FIN FORMULARIO----- -->

                    </div>
                        <!-- FIN TARJETA -->
                            
                </div>
            </div>

        </div>
    </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <?php include('../layout/admin/footer.php'); ?>
  <!-- FINAL Main Footer -->
</div>
<!-- ./wrapper -->

<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>
