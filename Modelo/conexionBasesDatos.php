<?php


function Conectarse()
{
	$objConexion = new mysqli("localhost","admin","1234567890","asored");
	if ($objConexion->connect_errno)
	{
		echo "Error de conexión a la Base de Datos ".$objConexion->connect_error;
		exit();
	}
	else
	{
		return $objConexion;
	}
}

?>