<?php include('app/config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-image: url('public/imagenes/piso5.jpg');
             background-repeat:no-repeat;
             z-index: -3;
             background-size: 100vw 100vh">

<!-- inicio navbar -->  
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Esto es el logo -->
    <a class="navbar-brand" href="#">
        <img src="public/imagenes/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
        PARQUEO-FCYT
    </a>
    <!-- Fin del logo -->  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="#">CONTACTANOS</a>
            </li>

           <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    PROMOCIONES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">MENSUALES</a>
                    <a class="dropdown-item" href="#">SEMANALES</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">FICHAS</a>
                </div>
            </li>
        </ul>
            <!-- este es el boton del buscador  -->
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Ingresar
        </button>
    </div>
</nav>

<!-- fin navbar -->
<!-- ********************************************************************************************* -->
<!-- inicio container de los autos, esta es la vista -->
<div class="container" >
<!-- INICIO CONTAINER  -->

<div class="row">

    <?php
    $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1'");
    $query_mapeos->execute();
    $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
    foreach($mapeos as $mapeo){
          $id_map = $mapeo['id_map'];
          $nro_espacio = $mapeo['nro_espacio'];
          $estado_espacio = $mapeo['estado_espacio'];

      if($estado_espacio == "LIBRE"){?>
          <div class="col">
            <center class="">
              <h2><?php echo $nro_espacio;?></h2>
                <button class="btn btn-success" style="width: 100%; height: 114px" >
                  <p><?php echo $estado_espacio;?></p>
                </button>                                            
            </center>
          </div>

      <?php
      }
      if($estado_espacio == "OCUPADO"){?>
          <div class="col">
            <center class="">
              <h2><?php echo $nro_espacio;?></h2>
              <button class="btn btn-info">
                <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="60px" alt="">
              </button>                                            
              <p><?php echo $estado_espacio;?></p>
            </center>
          </div>
      <?php
      }
      ?>

    <?php
        }
    ?>

</div>

<!-- FIN CONTAINER -->
</div>
<!-- fin container de los autos -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Comento este script de slim porque da error al ejecutar con ajax -->
    <!-- <script src="public/js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="public/js/jquery-3.6.4.min.js"> </script>
    <script src="public/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Inicio Formulario -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <lavel for="">Usuario/Email</lavel>
                        <input type="email" id="usuario" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <lavel for="">Contraseña</lavel>
                        <input type="password" id="password_user" class="form-control">
                    </div>
                </div>
            </div>
        <!-- Inicio id respuesta, envia lo que tanga el modal, usuario y contraseña al script de abajo, al controller_login-->
        <div id="respuesta">
        </div>
        <!-- Fin id respuesta-->
        <!-- Fin Formulario-->
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#btn_ingresar').click(function(){
  login();
});

<!-- Este es el script para que se pueda ingresar presionando la tecla enter, enter en  asshii enter = 13-->
$('#password_user').keypress(function(e){
    if(e.which == 13){
      login();
    }
});

function login(){
  var usuario = $('#usuario').val();
  var password_user = $('#password_user').val();
  var form_login = "";

    if(usuario == ""){
      alert('Debe introducir su Usuario');
      $('#usuario').focus();
    }else if(password_user == ""){
      alert('Debe introducir su contraseña');
      $('#password_user').focus();
    }else{
      var url = 'login/controller_login.php'
       $.post(url, {usuario:usuario, password_user:password_user, form_login:form_login}, function(datos){
      $('#respuesta').html(datos);
    });
    }
}

</script>