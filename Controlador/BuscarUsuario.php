<?php
   session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

$mysqli = new mysqli("localhost","admin","1234567890","asored");
	
    $salida = "";

    $query = "SELECT * FROM usuarios";

    if (isset($_POST['consulta'])) {
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM usuarios WHERE Nombres LIKE '%".$q."%' OR Apellidos LIKE '%".$q."%' OR Cedula LIKE '%".$q."%' OR Fecha_Nacimiento LIKE '%".$q."%' OR ARP LIKE '%".$q."%' OR EPS LIKE '%".$q."%' OR Telefono LIKE '%".$q."%' OR Direccion LIKE '%".$q."%' OR Correo LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

 if ($resultado->num_rows>0) { 
$salida.="<table class='table table-striped'>
    <thead>
      <tr>
        <th>ID Usuario</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Cédula</th>
      </tr>
    </thead>
    <tbody>";


while ($fila = $resultado->fetch_assoc()) { 

$salida.="<tr>
        <td>".$fila['id_usuarios']."</td>
        <td>".$fila['Nombres']."</td>
        <td>".$fila['Apellidos']."</td>
        <td>".$fila['Cedula']."</td> ";
        if($_SESSION['rol']==1) {
       $salida.= "<td><button title='Actualizar' type='button' name='actualizar' class='btn btn-primary' onclick='Cambiar(".$fila['id_usuarios'].")'><span class='material-icons'>edit</span></button></td>
        </tr>"; }
    

}
$salida.= "</tbody></table>";
} else
  {
      $salida.="<h3 style='color:red' >NO HAY DATOS</h3>";
    }
    echo $salida;

    $mysqli->close();

?>