<?php

  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaUsuarios.php");
  }
}

require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codusuario=$_GET["parametro"];
$sql="select * from usuarios where id_usuarios=$codusuario";
$data = $objConexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../img/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Aso Recicladores</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="../fonts/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../Js/menu.js"> </script>
    <script>
    function Cambiar(codusuario) {
        window.location = "localhost/andromeda_inventory/Vista/ModificarUsuario.php?parametro=" + codusuario;
    }

    function EliminarUsuario(codigoeliminar) {
        window.location = "localhost/andromeda_inventory/Controlador/validarEliminarUsuario.php?parametro=" +
            codigoeliminar;
    }
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <img src="../img/logo1.jpeg" width="200" height="100" class="d-inline-block align-top" alt="Logo">
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="../Vista/listaUsuarios.php">
                            <i class="material-icons">person_add</i>
                            <p>Ingresar Reciclador</p>
                        </a>
                    </li>
                    <li>
                        <a href="../Vista/listaInventario.php">
                            <i class="material-icons">recycling</i>
                            <p>Ingresar Material</p>
                        </a>
                    </li>
                    <li>
                        <a href="../Vista/reportes.php">
                            <i class="material-icons">content_paste</i>
                            <p>Generar Reportes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"> Crear Reciclador </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">2</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Ingreso de 3 nuevos recicladores</a>
                                    </li>
                                    <li>
                                        <a href="#">Actualización de Material</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="salir.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Cerrar
                                            Sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">Actualizar Reciclador</h4>
                                    <p class="category">.</p>
                                </div>
                                <div class="card-content">
                                    <br>
                                    <a href="../Vista/listaUsuarios.php" target="_self"><button title="Ver Usuarios"
                                            type="button" class="btn btn-primary"><span class="icon-forward"></span>
                                            <span class="icon-users"></span></button></a>
                                    <br>
                                    <br>
                                    <form class="form-horizontal" action="../Controlador/validarActualizarUsuario.php"
                                        method="post">
                                        <div>
                                            <?php foreach ($data as $fila) { ?>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Id Usuario">ID Usuario:
                                                </label>
                                                <input style="width:30%" type="text" class="form-control" id="idusuario"
                                                    name="idusuario" value="<?php echo $codusuario ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Nombres">Nombres: </label>
                                                <input style="width:30%" type="text" class="form-control" id="Nombres"
                                                    name="Nombres" value="<?php echo $fila["Nombres"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Apellidos">Apellidos:
                                                </label>
                                                <input style="width:30%" type="text" class="form-control" id="Apellidos"
                                                    name="Apellidos" value="<?php echo $fila["Apellidos"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Cedula">Cedula: </label>
                                                <input style="width:30%" type="text" class="form-control" id="Cedula"
                                                    name="Cedula" value="<?php echo $fila["Cedula"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="FechaNacimiento">Fecha de
                                                    Nacimiento: </label>
                                                <input style="width:30%" type="date" class="form-control"
                                                    id="FechaNacimiento" name="FechaNacimiento"
                                                    value="<?php echo $fila["Fecha_Nacimiento"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="ARP">ARP: </label>
                                                <input style="width:30%" type="text" class="form-control" id="ARP"
                                                    name="ARP" value="<?php echo $fila["ARP"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="EPS">EPS: </label>
                                                <input style="width:30%" type="text" class="form-control" id="EPS"
                                                    name="EPS" value="<?php echo $fila["EPS"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Telefono">Teléfono: </label>
                                                <input style="width:30%" type="text" class="form-control" id="Telefono"
                                                    name="Telefono" value="<?php echo $fila["Telefono"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Direccion">Dirección:
                                                </label>
                                                <input style="width:30%" type="text" class="form-control" id="Direccion"
                                                    name="Direccion" value="<?php echo $fila["Direccion"] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="Correo">Correo: </label>
                                                <input style="width:30%" type="email" class="form-control" id="Correo"
                                                    name="Correo" value="<?php echo $fila["Correo"] ?>" required>
                                            </div>
                                            <br>
                                            <br>
                                            <div align="middle">
                                                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                                                <button type="reset" class="btn btn-primary btn-lg">Cancelar</button>
                                            </div>
                                            <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../assets/img/faces/guest.png" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">Reciclador</h6>
                                    <h4 class="card-title"><?php echo $_SESSION['user']?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZxJIDvPHa47WNDZ1hqPEp9joaukv-YBc"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- mi script -->
<script src="../assets/js/perfil.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Js/Usuario.js"></script>

</html>