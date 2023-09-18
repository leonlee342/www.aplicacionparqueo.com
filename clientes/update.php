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
            <h2>Edicion de los datos del cliente</h2>
            <br>

            <div class="row">
                <div class="col-md-10">
                     <!-- INICIO TARJETA -->
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                            <?php
                            $id_cliente_get = $_GET['id'];
                            $query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente_get' AND estado = '1' ");
                            $query_clientes->execute();
                            $datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
                            foreach($datos_clientes as $datos_cliente){                                
                                $id_cliente = $datos_cliente['id_cliente'];
                                $nombre_cliente = $datos_cliente['nombre_cliente'];
                                $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
                                $placa_auto = $datos_cliente['placa_auto']; 
                            }
                            ?>

                        <div class="card-body" style="">

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Nombre del cliente <span style="color: red"><b>*</b></span> </label>
                                        <input type="text" id="nombre_cliente" class="form-control" value="<?php echo $nombre_cliente;?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Nit Ci del cliente  <span style="color: red"><b>*</b></span></label>
                                        <input type="text"  id="nit_ci_cliente" class="form-control" value="<?php echo $nit_ci_cliente;?>">
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="">Placa auto  <span style="color: red"><b>*</b></span></label>
                                        <input type="text" id="placa_auto" class="form-control" value="<?php echo $placa_auto;?>">
                                    </div>
                                </div>

                                <hr>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="index.php" class="btn btn-default">Cancelar</a>
                                        <button class="btn btn-success" id="btn_actualizar_cliente">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>

                                    <div id="respuesta">

                                    </div>


                            </div>

                        </div>    

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

<script>
  $('#btn_actualizar_cliente').click(function(){

    var nombre_cliente = $('#nombre_cliente').val();  
    var nit_ci_cliente = $('#nit_ci_cliente').val();  
    var placa_auto = $('#placa_auto').val();  
    var id_cliente = "<?php echo $id_cliente_get;?>";

    if(nombre_cliente == ""){
      alert ("Debe llenar el campo Nombre del cliente");
      $('#nombre_cliente').focus();
    }else if(nit_ci_cliente == ""){
      alert ("Debe llenar el campo NIt Ci del cliente");
      $('#nit_ci_cliente').focus();
    }else if(placa_auto == ""){
      alert ("Debe llenar el campo placa auto");
      $('#placa_auto').focus();
    }else {
        var url = 'controller_update.php';
        $.get(url, {nombre_cliente:nombre_cliente, nit_ci_cliente:nit_ci_cliente, placa_auto:placa_auto, id_cliente:id_cliente}, function(datos){
        $('#respuesta').html(datos);
        }); 
      }
  });
</script>