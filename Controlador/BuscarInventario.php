<?php
   session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

$mysqli = new mysqli("localhost","admin","1234567890","asored");
	
    $salida = "";

    $query = "SELECT * FROM activos_tecnologicos";

    if (isset($_POST['consulta'])) {
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM activos_tecnologicos WHERE id_inventario LIKE '%".$q."%' OR Asignado LIKE '%".$q."%' OR Nombre LIKE '%".$q."%' OR Tipo LIKE '%".$q."%' OR Marca LIKE '%".$q."%' OR Modelo LIKE '%".$q."%' OR Serial LIKE '%".$q."%' OR Fabricante LIKE '%".$q."%' OR Estado LIKE '%".$q."%' OR invproveedor LIKE '%".$q."%' OR Fecha_Ingreso LIKE '%".$q."%' OR Fecha_Salida LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

 if ($resultado->num_rows>0) { 
$salida.="<table class='table table-striped'>
    <thead>
      <tr>
        <th>ID Inventario</th>
        <th>Asignado</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Especificación</th>
        <th>Cantidad</th>
        <th>Fecha Entrada</th>
      </tr>
    </thead>
    <tbody>";


while ($fila = $resultado->fetch_assoc()) { 

$salida.="<tr>
        <td>".$fila['id_inventario']."</td>
        <td>".$fila['Asignado']."</td>
        <td>".$fila['Nombre']."</td>
        <td>".$fila['Tipo']."</td>
        <td>".$fila['Marca']."</td>
        <td>".$fila['Modelo']."</td>
        <td>".$fila['Fecha_Ingreso']."</td>";
        if($_SESSION['rol']==1) {
       $salida.= "<td><button title='Visualizar' type='button' name='actualizar' class='btn btn-primary' onclick='ModificarInventario(".$fila['id_inventario'].")'><span class='icon-eye'></span></button></td>
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