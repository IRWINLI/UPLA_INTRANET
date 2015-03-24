<?php
include_once("Configuracion/variables.php");

class Logica
{	
	/*  **********************************************************************************************************************
	FUNCIÓN PARA LLAMAR A UN PROCEDIMIENTO.

	PARÁMETROS:
	-----------
	$pa        :Nombre del procedimiento;
	$nom_varxml:Nombre del Parametro xml;
	$xml       :xml;
	$sal       :Nombre del parametro de salida;
	$formato   :Formato de respuesta.

	RETORNO: xml, json, array, string.
	***************************************************************************************************************************/ 
	public static function PA_UPLA($pa,$formato='',$xml='',$sal=false,$bd=BD)
	{			
		$obj=new sQuery($bd);
		switch($formato)
		{
			case 'array':
				$result=$obj->array_pa_datos($pa,$xml,$sal);
				return ($sal)?$result:$obj->fetchAll();		
			case 'json':
				$obj->json_pa_datos($pa,$xml,$sal);
				break;
			case 'xml':
				$result=$obj->array_pa_datos($pa,$xml,$sal);			
				return ($sal)?array2xml($result):array2xml($obj->fetchAll());						
			case '':
			    $result=$obj->array_pa_datos($pa,$xml,$sal);  
			    return ($sal)?$result["rpta"]:true;     
			case 'array_duro':
				$result=$obj->array_pa_datos($pa,$xml,$sal);
				$lis=null;
					while ($row = mssql_fetch_assoc($result))
					{											
						$lis[]=$row;							
					}
				return $lis;
		}
	}
}

/*  **********************************************************************************************************************
    FUNCIÓN PARA CONVERTIR UN ARRAY ASOCIATIVO EN UNA CADENA EN FORMATO XML.
    PARÁMETROS:
    -----------
    $data           --> ES EL ARRAY DE ORIGEN
    $rootNodeName   --> INDICA CÓMO SE LLAMARÁ EL NODO RAÍZ.
    $xml            --> NO CAMBIAR. INDICA EL NODO DÓNDE ESTA. SE USA PARA EL PROCESO RECURSIVO.
    **********************************************************************************************************************
/**
 * Function for convert an array associative to XML string.
 * @param string $data The source array.
 * @param string $rootNodeName Indicates how to call at root node.
 * @param string $xml Is an attributte that is necessary for operation of the method.
 * @return string Returns a XML string.
 */ 
function array2XML($data, $rootNodeName = 'results', $xml=NULL)
{
    if ($xml == null){
        $xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
    }

    foreach($data as $key => $value)
    {
        if (is_numeric($key))
        {
            $key = "nodeId_". (string) $key;
        }

        if (is_array($value))
        {
            $node = $xml->addChild($key);
            array2XML($value, $rootNodeName, $node);
        } 
        else 
        {
            $value = htmlentities($value);
            $xml->addChild($key, $value);
        }

    }

    return html_entity_decode($xml->asXML());
}

function generar_excel($resultado,$array_tit,$titus,$array_datos,$nomarchiv='archivoUPLA')
{
		date_default_timezone_set('America/Lima');
		
		/*$array_datos=array("N","CODIGO","APELLIDOS Y NOMBRES","DNI","F.NAC","SEDE");
		$array_tit=
		array(
			"INSCRIPCIÓN ESTUDIANTES - SEGURO DE ACCIDENTES PERSONALES",
			"COMPAÑIA DE SEGUROS PACÍFICO",
			date("d/m/Y")
		);*/

		$columnas_titulo=sizeof($titus);	
		

		require_once "Configuracion/Librerias/Excel/PHPExcel.php";	
		

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte de alumnos")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");


		$objPHPExcel->setActiveSheetIndex(0)
		->mergeCells('A1:'.numero_letra($columnas_titulo).'1')
		->mergeCells('A2:'.numero_letra($columnas_titulo).'2')
		->mergeCells('A3:'.numero_letra($columnas_titulo).'3');
	

						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$array_tit[0])
        		    ->setCellValue('A2',$array_tit[1])
		            ->setCellValue('A3',$array_tit[2]);
		
		
		//Títulos para las columnas		

		for($i=0;$i<$columnas_titulo;$i++)
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue(numero_letra($i+1).'5',$titus[$i]);
		}
		/*
		$objPHPExcel->setActiveSheetIndex(0)			            
		            ->setCellValue('A5',  "N°")
		            ->setCellValue('B5',  "CODIGO")
        		    ->setCellValue('C5',  "APELLIDOS Y NOMBRES")
        		    ->setCellValue('D5',  "DNI")
            		->setCellValue('E5',  "F.NAC")
            		->setCellValue('F5',  "SEDE");
		*/
		//Se agregan los datos de los alumnos
		$j = 6;
		
		foreach ($resultado as $fila):
			
			for($i=0;$i<$columnas_titulo;$i++)
			{
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue(numero_letra($i+1).$j ,utf8_encode($fila[$array_datos[$i]]));
			}

    		$j++;
		endforeach;
/*
		foreach ($resultado as $fila):
			$objPHPExcel->setActiveSheetIndex(0)
		    ->setCellValue('A'.$i,  $fila["N"])
            ->setCellValue('B'.$i,  $fila["CODIGO"])
		    ->setCellValue('C'.$i,  utf8_encode($fila["APELLIDOS Y NOMBRES"]))
    		->setCellValue('D'.$i,  $fila["DNI"])
    		->setCellValue('E'.$i,  $fila["F.NAC"])
    		->setCellValue('F'.$i,  $fila["SEDE"]);
    		$i++;
		endforeach;
*/

		//N, Est_Id CODIGO,Datos [APELLIDOS Y NOMBRES],Dni DNI,FechaNac [F.NAC]
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'TIMES',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>12,
	            	'color'     => array(
    	            	'rgb' => '000000'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('rgb' => 'FFFFFF')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'TIMES',
                'bold'      => true,                          
                'size' =>10,
	            	'color'     => array(
    	            	'rgb' => '000000'
        	       	)
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('rgb' => '5494A8')
				/*'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'rgb' => 'FF431a5d'
        		)*/
			),
            'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	),
               	'right'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	),
               	'top'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)
               	,
               	'bottom'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)               

           	),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'TIMES',               
               	'size' =>10,
	            	'color'     => array(
    	            	'rgb' => '000000'
        	       	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('rgb' => 'FFFFFF')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	),
               	'right'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	),
               	'top'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)
               	,
               	'bottom'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)               

           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:'.numero_letra($columnas_titulo).'1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.numero_letra($columnas_titulo).'3')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.numero_letra($columnas_titulo).'3')->applyFromArray($estiloTituloReporte);

		$objPHPExcel->getActiveSheet()->getStyle('A5:'.numero_letra($columnas_titulo).'5')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A6:".numero_letra($columnas_titulo).($j-1));
				
		for($i = 'A'; $i <= numero_letra($columnas_titulo); $i++)
		{
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Irwin');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$nomarchiv.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;


}

function numero_letra($num)
{
	switch($num)
	{
		case 1: return 'A';
		case 2: return 'B';
		case 3: return 'C';
		case 4: return 'D';
		case 5: return 'E';
		case 6: return 'F';
		case 7: return 'G';
		case 8: return 'H';
		case 9: return 'I';
		case 10: return 'J';
		case 11: return 'K';
		case 12: return 'L';
		case 13: return 'M';
		case 14: return 'N';
		case 15: return 'O';
		case 16: return 'P';
		case 17: return 'Q';
		case 18: return 'R';
		case 19: return 'S';
		case 20: return 'T';
		case 21: return 'U';
		case 22: return 'V';
		case 23: return 'W';
		case 24: return 'X';
		case 25: return 'Y';
		case 26: return 'Z';
	}

}

?>