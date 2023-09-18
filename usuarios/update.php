<?php include('../app/config.php');
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

  <!-- Main Sidebar Container -->
  <!-- FINALMain Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">

        <?php
        $id_get = $_GET['id'];
        $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get' AND estado = '1'");
        $query_usuario->execute();
        $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario){
          $id = $usuario['id'];
          $nombres = $usuario['nombres'];
          $email = $usuario['email'];
          $password_user = $usuario['password_user'];
        }
        ?>
        
          <h2>Actualizacion de los Usuarios</h2>

            <div class="container">
              <div class="row">
                <div class="col-md-6">

  <!-- INicio card -->
                    <div class="card card-success" style="border: 1px solid #777777">
                        <div class="card-header">
                            <h3 class="card-title">Edición del Usuario</h3>
                                <!-- esta es la parte del menu que miniza la ventana se puede borrar -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- esta es la parte del menu que miniza la ventana se puede borrar -->
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" value="<?php echo $nombres;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $email;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn_editar">Actualizar</button>
                                    <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                                </div>
                                            <div id="respuesta">

                                            </div>
                            </div>
                    </div>
<!-- FIN card -->

                </div>
                <div class="col-md-6"></div>
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
  $('#btn_editar').click(function(){
    var nombres = $('#nombres').val();  
    var email = $('#email').val();  
    var password_user = $('#password_user').val(); 
    var id_user = '<?php echo $id_get = $_GET['id'];?>';  

    if(nombres == ""){
      alert ("Debe llenar el campo nombres");
      $('#nombres').focus();
    }else if(email == ""){
      alert ("Debe llenar el campo email");
      $('#email').focus();
    }else if(password_user == ""){
      alert ("Debe llenar el campo password");
      $('#password_user').focus();
    }else{
        var url = 'controller_update.php';
        $.get(url, {nombres:nombres, email:email, password_user:password_user, id_user:id_user }, function(datos){
        $('#respuesta').html(datos);
        });
      }
  });
</script>