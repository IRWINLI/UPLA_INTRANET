<?php
//Prueba de coneccion: Cuando hay errores no te devuelve nada
/*
$f=new Conexion();
echo $f->getConexion();
*/
//CLASE PARA CONEXION CON LA BASE DE DATOS
//--------------------------------------------------------------------------------------------------------
class Conexion{ 
	var $con;

	
	function Conexion($bd)
	{				
		$conection['server']="";//host
		$conection['user']  ="";//  usuario
		$conection['pass']  ="";//password
        //$conection['base']  ="";//base de datos
				
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mssql_connect($conection['server'],$conection['user'],$conection['pass']);
		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mssql_select_db($bd);
			$this->con=$conect;
		}		
		
	}
	
	function getConexion(){// devuelve la conexion
		return $this->con;
	}
	
	function Close(){  // cierra la conexion
		mssql_close($this->con);
	}	
}
?>
