<?php

session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Usuario.php";
$objDatos=new Usuario();
$registro=$objDatos->consultarUsuarios();

if(!isset($_REQUEST['msj'])){
    $msj=0;
}
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
        window.location = "../Vista/ModificarUsuario.php?parametro=" + codusuario;
    }

    function EliminarUsuario(codigoeliminar) {
        window.location = "../Controlador/validarEliminarUsuario.php?parametro=" + codigoeliminar;
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
                    <?php if($_SESSION['rol']==2) { ?>
                    <li>
                        <a href="../Vista/listaPerfiles.php">
                            <i class="material-icons">assignment_ind</i>
                            <p>Ingresar Perfiles</p>
                        </a>
                    </li>
                    <?php } ?>
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
                                <form class="navbar-form navbar-left" action="">
                                    <div class="navbar-brand">
                                        <input type="text" class="form-control" placeholder="Buscar Reciclador"
                                            name="caja_busqueda" id="caja_busqueda">
                                    </div>
                                </form>
                            </li>
                            <li>
                                <a data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="salir.php" onmouseover="mopen('m1')" onmouseout="mclosetime()"><span
                                                class="icon-log-out"></span> Cerrar Sesión</a>
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
                                    <h4 class="title">Recicladores Registrados</h4>
                                    <p class="category">.</p>
                                </div>
                                <div class="card-content">
                                    <br>
                                    <?php if($_SESSION['rol']==1) { ?>
                                    <a href="../Vista/RegistroUsuario.php" target="_self"><button
                                            title="Registrar Usuarios" type="button" class="btn btn-primary"><span
                                                class="icon-add-user"></span></button></a><?php } ?>
                                    <br>
                                    <?php
        if ($msj==1)
        echo '<h3 style="color:green" align="center">Se ha Agregado el Usuario Correctamente</h3>';
        if ($msj==2)
        echo '<h3 style="color:red" align="center">Problemas al Agregar Usuario, Por favor revise los datos</h3>';
        if ($msj==3)
        echo '<h3 style="color:green" align="center">Se ha Modificado el Usuario Correctamente</h3>';
        if ($msj==4)
        echo '<h3 style="color:red" align="center">Problemas al Modificar Usuario, Por favor revise</h3>';
        if ($msj==5)
        echo '<h3 style="color:green" align="center">Se ha Eliminado el Usuario Correctamente</h3>';
        if ($msj==6)
        echo '<h3 style="color:red" align="center">Problemas al Eliminar Usuario, Por favor revise</h3>';
        ?>
                                    <br>
                                    <div id="datos">
                                    </div>
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
        </div>
    </div>
</body>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Js/Usuario.js"></script>
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

</html>