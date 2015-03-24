<?php
include_once("../Privado/Conexion_proyecto/Conexion.php");
class sQuery
{   
	//se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
	var $coneccion;
	var $consulta;
	var $resultados;
	
	function sQuery($bd)
	{ // constructor, solo crea una conexion usando la clase "Conexion"		
		$this->coneccion= new Conexion($bd);
		//$this->coneccion_S_Academico= new Conexion_S_Academico();
	}
	function executeQuery($cons)
	{  // metodo que ejecuta una consulta y la guarda en el atributo $consulta
		$this->consulta= mssql_query($cons,$this->coneccion->getConexion());
		return $this->consulta;
	}
	function getResults()
	{// retorna la consulta en forma de result.
		return $this->consulta;
	}
	
	function Close()
	{// cierra la conexion
		$this->coneccion->Close();
	}
	
	function Clean()
	{// libera la consulta
		mssql_free_result($this->consulta);
	}
	
	function getResultados()
	{// devuelve la cantidad de registros encontrados
		return mssql_rows_affected($this->coneccion->getConexion()) ;
	}
	
	function getAffect()
	{// devuelve las cantidad de filas afectadas
		return mssql_rows_affected($this->coneccion->getConexion()) ;
	}

	function fetchAll()
	{

		$rows=array();
		if ($this->consulta!='1')
		{
			while($row=  mssql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
		else
		{
			//echo '<script>alert("Debe ingresar un dato válido.")</script>';
		}
		return $rows;
	}
	//==================================================================================
	//============================== FUNCIONES ADICIONALES =============================
	//==================================================================================

	function array_pa_datos($pa,$xml,$sal)
	{		
		
		$paramentros=($xml=="")?false:true;

      	$rpta='';
		$srtproc = mssql_init($pa,$this->coneccion->getConexion());

		if($paramentros)
			mssql_bind($srtproc, "@xml", $xml, SQLVARCHAR);
		
		if($sal)
			mssql_bind($srtproc, "@rpta", $rpta, SQLVARCHAR, true,false);		
			
		$this->consulta=mssql_execute($srtproc);
		$this->close();
		
		if($sal)
		{
			$v=array("rpta" => $rpta);
			return $v;
		}		
		else			
			return $this->consulta;				
	}
	function json_pa_datos($pa,$xml,$sal)
	{		
		$paramentros=($xml=="")?false:true;

      	$rpta='';
		$srtproc = mssql_init($pa,$this->coneccion->getConexion());

		if($paramentros)
			mssql_bind($srtproc, "@xml", $xml, SQLVARCHAR);
		
		if($sal)
			mssql_bind($srtproc, "@rpta", $rpta, SQLVARCHAR, true,false);		
			
		$this->consulta=mssql_execute($srtproc);
		
		if($sal)
		{
			$this->close();
			$v=array("rpta" => utf8_encode($rpta));
			echo json_encode($v);			
		}
		else
		{
			$lis=null;
			$i=0;
			if($this->consulta)
			{
				
				do{
					while ($row = mssql_fetch_row($this->consulta))
					{											
						$lis[$i]=array_map('utf8_encode', $row);
						$i++;		
					}
				}
				
				while (mssql_next_result($this->consulta) !== false);
				mssql_free_result($this->consulta);
				
			}
			if($i==0)
			{	
				$lis[0]=array('No hay datos');
			}
			mssql_free_statement($srtproc);
			$this->close();			
			
			echo json_encode($lis);
				
		}
	}
}
?>