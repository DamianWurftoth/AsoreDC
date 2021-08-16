<?php

  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaInventario.php");
  }
}


require "../Modelo/conexionBasesDatos.php";
$objConexion=Conectarse();
//Consulta Datos Fabricante para mostrar en el registro de inventario
$sql="select idFabricante, NombreFabricante from fabricante";
$fabricante = $objConexion->query($sql);
//Consulta Datos Marca para mostrar en el registro de inventario
$sql="select idMarca, NombreMarca from marca";
$marca = $objConexion->query($sql);
//Consulta Datos Proveedor para mostrar en el registro de inventario
$sql="select id_Proveedor, Nombre from proveedor";
$proveedor = $objConexion->query($sql);
//Consulta Datos Hardware para mostrar en el registro de inventario
$sql="select idTipo_Hardware, NombreTipo from tipo_hardware";
$hardware = $objConexion->query($sql);
//Consulta Datos Usuarios para mostrar en el registro de inventario
$sql="select id_usuarios, Nombres, Apellidos from usuarios";
$usuarios = $objConexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
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
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <img src="../img/logo1.jpeg" width="200" height="100" class="d-inline-block align-top" alt="Logo">
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../Vista/listaUsuarios.php">
                            <i class="material-icons">person_add</i>
                            <p>Ingresar Reciclador</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand"> Agregar Material </a>
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
                                    <h4 class="title">Ingresar Material</h4>
                                    <p class="category">.</p>
                                </div>
                                <div class="card-content">
                                    <br>
                                    <a href="../Vista/listaInventario.php" target="_self"><button title="Ver Inventario"
                                            type="button" class="btn btn-primary"><span class="icon-forward"></span>
                                            <span class="icon-archive"></span></button></a>
                                    <a href="../Vista/RegistrarTMF.php" target="_self"><button
                                            title="Agregar Tipo, Marca, Fabricante y Estado" type="button"
                                            class="btn btn-primary"><span class="icon-list"></span></button></a>
                                    <br>
                                    <br>
                                    <br>
                                    <form class="form-inline" action="../Controlador/validarInsertarInventario.php"
                                        method="post">
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4" for="asignado">Usuario: </label>
                                            <select id="asignado" name="asignado" class="form-control">
                                                <option selected>Seleccione</option>
                                                <?php while ($usuario=$usuarios->fetch_object()) { ?>
                                                <option value="<?php echo $usuario->id_usuarios;?>">
                                                    <?php echo $usuario->id_usuarios. " " .$usuario->Nombres. " " .$usuario->Apellidos ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="text">Nombre:</label>
                                            <input type="tex" class="form-control" id="nombre"
                                                placeholder="Nombre Activo" name="nombre" required>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-3" for="exampleFormControlSelect1">Tipo:
                                            </label>
                                            <select class="form-control" id="tipo" name="tipo" required>
                                                <option>Seleccione</option>
                                                <?php while ($tipo=$hardware->fetch_object()) { ?>
                                                <option value=" <?php echo $tipo->NombreTipo; ?> ">
                                                    <?php echo $tipo->idTipo_Hardware. " " .$tipo->NombreTipo ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-5"
                                                for="exampleFormControlSelect1">Especificación:
                                            </label>
                                            <select class="form-control" id="marca" name="marca" required>
                                                <option>Seleccione</option>
                                                <?php while ($fila=$marca->fetch_object()) { ?>
                                                <option value=" <?php echo $fila->NombreMarca; ?> ">
                                                    <?php echo $fila->idMarca. " " .$fila->NombreMarca ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4" for="Modelo">Modelo:</label>
                                            <input type="text" class="form-control" id="modelo"
                                                placeholder="Ingrese Modelo" name="modelo" required>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4" for="Serial">Serial:</label>
                                            <input type="text" class="form-control" id="serial"
                                                placeholder="Ingreso Serial" name="serial" required>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-5"
                                                for="exampleFormControlSelect1">Fabricante: </label>
                                            <select class="form-control" id="fabricante" name="fabricante" required>
                                                <option>Seleccione</option>
                                                <?php while ($fila=$fabricante->fetch_object()) { ?>
                                                <option value=" <?php echo $fila->NombreFabricante; ?> ">
                                                    <?php echo $fila->idFabricante. " " .$fila->NombreFabricante ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-5"
                                                for="exampleFormControlSelect1">Estado: </label>
                                            <select class="form-control" id="estado" name="estado" required>
                                                <option>Seleccione</option>
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                                <option>Garantia</option>
                                                <option>Baja</option>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-sm-4"
                                                for="exampleFormControlSelect1">Proveedor: </label>
                                            <select class="form-control form-control-lg" id="proveedor" name="proveedor"
                                                required>
                                                <option>Seleccione</option>
                                                <?php while ($fila=$proveedor->fetch_object()) { ?>
                                                <option value="<?php echo $fila->id_Proveedor; ?>">
                                                    <?php echo $fila->id_Proveedor. " " .$fila->Nombre ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group" align="middle">
                                            <label for="Fecha Ingreso">Fecha Ingreso:</label>
                                            <input type="date" class="form-control" id="fechaIngreso"
                                                name="fechaIngreso" required>
                                        </div>
                                        <div class="form-group" align="middle">
                                            <label for="Fecha Salida">Fecha Salida:</label>
                                            <input type="date" class="form-control" id="fechaSalida" name="fechaSalida">
                                        </div>
                                        <br>
                                        <br>
                                        <div>
                                            <div align="middle">
                                                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                                                <button type="reset" class="btn btn-primary btn-lg">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <br>
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