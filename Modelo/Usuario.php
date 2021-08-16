<?php

class Usuario
{
	private $idusuario;
	private $Nombres;
	private $Apellidos;
	private $Cedula;
	private $FechaNacimiento;
	private $ARP;
	private $EPS;
	private $Telefono;
	private $Direccion;
	private $Correo;
	private $Conexion;

	public function setIdUsuario($idusuario)
	{
		$this->idusuario=$idusuario;
	}

	public function getIdUsuario()
	{
		return ($this->idusuario);
	}

	public function setNombres($Nombres)
	{
		$this->Nombres=$Nombres;
	}

	public function getNombres()
	{
		return ($this->Nombres);
	}

	public function setApellidos($Apellidos)
	{
		$this->Apellidos=$Apellidos;
	}

	public function getApellidos()
	{
		return ($this->Apellidos);
	}

	public function setCedula($Cedula)
	{
		$this->Cedula=$Cedula;
	}

	public function getCedula()
	{
		return ($this->Cedula);
	}

	public function setFechaNacimiento($FechaNacimiento)
	{
		$this->FechaNacimiento=$FechaNacimiento;
	}

	public function getFechaNacimiento()
	{
		return ($this->FechaNacimiento);
	}

	public function setARP($ARP)
	{
		$this->ARP=$ARP;
	}

	public function getARP()
	{
		return ($this->ARP);
	}

	public function setEPS($EPS)
	{
		$this->EPS=$EPS;
	}

	public function getEPS()
	{
		return ($this->EPS);
	}

	public function setTelefono($Telefono)
	{
		$this->Telefono=$Telefono;
	}

	public function getTelefono()
	{
		return ($this->Telefono);
	}

	public function setDireccion($Direccion)
	{
		$this->Direccion=$Direccion;
	}

	public function getDireccion()
	{
		return ($this->Direccion);
	}

	public function setCorreo($Correo)
	{
		$this->Correo=$Correo;
	}

	public function getCorreo()
	{
		return ($this->Correo);
	}


	public function crearUsuario($Nombres,$Apellidos,$Cedula,$FechaNacimiento,$ARP,$EPS,$Telefono,$Direccion,$Correo)
	{
		$this->Nombres=$Nombres;
		$this->Apellidos=$Apellidos;
		$this->Cedula=$Cedula;
		$this->FechaNacimiento=$FechaNacimiento;
		$this->ARP=$ARP;
		$this->EPS=$EPS;
		$this->Telefono=$Telefono;
		$this->Direccion=$Direccion;
		$this->Correo=$Correo;
		$this->Conexion=$Conexion;
	}
		//Funcion para capturar datos del actualizar usuario
		public function crearUsuario2($idusuario,$Nombres,$Apellidos,$Cedula,$FechaNacimiento,$ARP,$EPS,$Telefono,$Direccion,$Correo)
	{
		$this->idusuario=$idusuario;
		$this->Nombres=$Nombres;
		$this->Apellidos=$Apellidos;
		$this->Cedula=$Cedula;
		$this->FechaNacimiento=$FechaNacimiento;
		$this->ARP=$ARP;
		$this->EPS=$EPS;
		$this->Telefono=$Telefono;
		$this->Direccion=$Direccion;
		$this->Correo=$Correo;
		$this->Conexion=$Conexion;
	}

	public function agregarUsuario()
	{
		$this->Conexion=Conectarse();
		$sql="insert into usuarios(Nombres,Apellidos,Cedula,Fecha_Nacimiento,ARP,EPS,Telefono,Direccion,Correo)
values ('$this->Nombres','$this->Apellidos','$this->Cedula','$this->FechaNacimiento',
'$this->ARP','$this->EPS','$this->Telefono','$this->Direccion','$this->Correo')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarUsuarios()
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarUsuario($idusuario)
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios where id_usuarios='$idusuario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function ActualizarUsuario()
	{
		$this->Conexion=Conectarse();
		$sql="update usuarios set id_usuarios='$this->idusuario',Nombres='$this->Nombres',
		Apellidos='$this->Apellidos',Cedula='$this->Cedula',Fecha_Nacimiento='$this->FechaNacimiento',
		ARP='$this->ARP',EPS='$this->EPS',Telefono='$this->Telefono',Direccion='$this->Direccion',Correo='$this->Correo' where usuarios.id_usuarios = '$this->idusuario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
}

?>