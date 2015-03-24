
<?php
/*
callback=Devolucion de la Llamada;
$_SERVER['REDIRECT_URL']:Devuelve todo el url permitido.
$_SERVER['PATH_INFO']:Devuelve el ultimo fichero de la url.
*/
$existe_pagina=false;

function serve_json($doc, $options = 0, $cbname = 'callback') {  
  set_content_type('Content-Type','application/json');
  $doc = str_replace("\\", "", json_encode($doc, $options));
  $callback = null;
  if (array_key_exists('HTTP_JSONP_CALLBACK', $_SERVER) && strlen($_SERVER['HTTP_JSONP_CALLBACK'])>0) {
    $callback = $_SERVER['HTTP_JSONP_CALLBACK'];
  } elseif (array_key_exists($cbname, $_REQUEST) && strlen($_REQUEST[$cbname])>0) {
    $callback = $_REQUEST[$cbname];
  }
  if (strlen($callback)>0) {
    printf("%s(%s);\n", $callback, $doc);
  } else {
    echo $doc;
  }
}

function get_request_uri() {
  if (array_key_exists('PATH_INFO', $_SERVER)) {
    return  $_SERVER['PATH_INFO'];
  } elseif (array_key_exists('REDIRECT_URL', $_SERVER)) {
    return $_SERVER['REDIRECT_URL'];
  } else {
    return '/';
  }
}

function request_method_matches($methods) {
  return in_array($_SERVER['REQUEST_METHOD'], $methods);
}

function route($regexp, $methods, $callback) {
  
  /* Sanitize regexp */
  if (!preg_match('/^\^(.)+$/', $regexp)) {
    $regexp = sprintf("^%s", $regexp);
  }
  if (!preg_match('/^(.)+\$$/', $regexp)) {
    $regexp = sprintf("%s$", $regexp);
  }
  $regexp = str_replace("/", "\/", $regexp);
  $regexp = sprintf("/%s/", $regexp);

  /* Create array of accepted HTTP methods */
  $methods = explode(",", $methods) ;
  foreach($methods as $k=>$v) {
    $methods[$k] = trim(strtoupper($v));
  } 

  /* Match */
  $uri = get_request_uri();
  if (request_method_matches($methods) && preg_match($regexp, $uri, $params)) {
    $callback($params);
    $existe_pagina=true;
    exit();
  }
}

function status_code_map() {
  return array(
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    307 => 'Temporary Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Request Entity Too Large',
    414 => 'Request',
    415 => 'Unsupported Media Type',
    416 => 'Requested Range Not Satisfiable',
    417 => 'Expectation Failed',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
  );
}

function set_content_type($_type,$content_type) 
{
  header("$_type: $content_type");
}

function set_meta($_tipo,$_dato) 
{  
  echo '<meta name="'.$_tipo.'" content="'.$_dato.'">';
}

function set_meta_refresh($_tipo,$_dato,$pag='') 
{  
  echo '<meta http-equiv="'.$_tipo.'" content="'.$_dato.'; URL='.$pag.'">';
}

function set_favicon($href)
{
echo '<link rel="icon" href="Capa_Presentacion/Recursos/'.$href.'" type="image/x-icon" />';
}

function set_imagen($href,$h='',$w='',$alt='',$met='',$script='',$img1='',$img2='')
{
  if($img1=='')
  {
    if($met=='')
    {
      echo '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" />';        
    }
    else
    {
      echo '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" '.$met.' ='.$script.' />';        
    }    
  }
  else 
  {
    if($met=='')
    {
      echo '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" onmouseover=this.src="Capa_Presentacion/Recursos/'.$img1.'" onmouseout=this.src="Capa_Presentacion/Recursos/'.$img2.'" />';     
    }
    else
    {
      echo '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" '.$met.' ='.$script.' onmouseover=this.src="Capa_Presentacion/Recursos/'.$img1.'" onmouseout=this.src="Capa_Presentacion/Recursos/'.$img2.'" />';   
    }    
  }
  
}

function set_imagen_r($href,$h='',$w='',$alt='',$met='',$script='',$img1='',$img2='')
{
  if($img1=='')
  {
    if($met=='')
    {
      return '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" />';        
    }
    else
    {
      return '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" '.$met.' ='.$script.' />';        
    }    
  }
  else 
  {
    if($met=='')
    {
      return '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" onmouseover=this.src="Capa_Presentacion/Recursos/'.$img1.'" onmouseout=this.src="Capa_Presentacion/Recursos/'.$img2.'" />';     
    }
    else
    {
      return '<img src="Capa_Presentacion/Recursos/'.$href.'" alt="'.$alt.'" width="'.$w.'px" height="'.$h.'px" '.$met.' ='.$script.' onmouseover=this.src="Capa_Presentacion/Recursos/'.$img1.'" onmouseout=this.src="Capa_Presentacion/Recursos/'.$img2.'" />';   
    }    
  }
  
}

function set_imagen_style_fuera($href,$algomas='')
{

  echo '<img src="'.$href.'" '.$algomas.' />';          
}

function set_imagen_style($href,$algomas='')
{

  echo '<img src="Capa_Presentacion/Recursos/'.$href.'" '.$algomas.' />';          
}

function set_imagen_style_r($href,$algomas='')
{

  return '<img src="Capa_Presentacion/Recursos/'.$href.'" '.$algomas.' />';          
}

function set_imagenLazy($href,$algomas='')
{
  echo '<img class="lazy" src="Capa_Presentacion/Recursos/imagesini/grey.gif" data-original="Capa_Presentacion/Recursos/'.$href.'" '.$algomas.'>';  
}

function set_imagenLazy_r($href,$algomas='')
{
  return '<img class="lazy" src="Capa_Presentacion/Recursos/imagesini/grey.gif" data-original="Capa_Presentacion/Recursos/'.$href.'" '.$algomas.'>';  
}

function set_imagenLazy_fuera($href,$algomas='')
{
  echo '<img class="lazy" src="Capa_Presentacion/Recursos/imagesini/grey.gif" data-original="'.$href.'" '.$algomas.'>';  
}

function set_imagenLazy_r_fuera($href,$algomas='')
{
  return '<img class="lazy" src="Capa_Presentacion/Recursos/imagesini/grey.gif" data-original="'.$href.'" '.$algomas.'>';  
}

function imagen($href)
{
  return "Capa_Presentacion/Recursos/$href";  
}


function set_title($nombre)
{
echo '<title>'.$nombre.'</title>';
}

function set_link($_ruta)
{
  $_tipo=substr($_ruta,strpos($_ruta,".")+1);
   
    switch($_tipo)
    {
      case 'css':case 'php':
      echo '<link rel="stylesheet" type="text/css" href="Capa_Presentacion/Estilos/'.$_ruta.'" />';
      break;

      case 'js':
      echo '<script type="text/javascript" src="Capa_Presentacion/Funciones/'.$_ruta.'"></script>';
      break;
    }

}

function set_link_ext($_ruta,$_tipo)
{  
    switch($_tipo)
    {
      case 'css':case 'php':
      echo '<link rel="stylesheet" type="text/css" href="'.$_ruta.'" />';
      break;

      case 'js':
      echo '<script type="text/javascript" src="'.$_ruta.'"></script>';
      break;
    }
  
}

function set_librerias($_ruta)
{
  echo '<script type="text/javascript" src="Configuracion/Librerias/'.$_ruta.'"></script>';
}

function set_status_code($status_code) {
  $map = status_code_map();
  header(sprintf("HTTP/1.1 %d %s", $status_code, strtoupper($map[$status_code])));  
}

function all_verbs_array() {
  return array(
    "OPTIONS",
    "GET",
    "HEAD",
    "POST",
    "PUT",
    "DELETE",
    "TRACE",
    "CONNECT"
  );
}

function all_verbs() {
  return implode(", ", all_verbs_array());
}

function include_template($template, $template_dir='Capa_Presentacion/Plantillas/') {
  $path = str_replace("//", "/", $template_dir.'/'.$template);
  //($path);
  //hackerDefense_post($path);
  include($path);
}

function include_popup($template, $template_dir='Capa_Presentacion/Plantillas/v_emergentes/') {
  $path = str_replace("//", "/", $template_dir.'/'.$template);
  include($path);
}

function render_template($template, $context = null, $template_dir='Capa_Presentacion/Plantillas/') {
  if (!is_null($context)) {
    extract($context);
  }
  include_template($template, $template_dir);
}

function get_request_body() {
  return @file_get_contents('php://input');
}

function phpinfo_to_file($path) {
  ob_start();
  phpinfo();
  $contents = ob_get_contents();
  ob_end_clean();
  $fp = @fopen($path, 'w+');
  @fputs($fp, $contents);
  @fclose($fp);
}

function status_code_map_explicacion() {
  return array(
    200 => 'Bien',
    201 => 'Creado Correctamente.',
    202 => 'Esta Aceptado',
    203 => 'Non',
    204 => 'No existe Contenido Alguno.',
    205 => 'No se restablece el contenido.',
    206 => 'Es un contenido parcial.',
    300 => 'Tiene multiples opciones.',
    301 => 'Fue movido permanentemente.',
    302 => 'Encontrado.',
    303 => 'No se encuentra veo tras opciones.',
    304 => 'No tiene cambios.',
    305 => 'Debe usar proxy.',
    307 => 'Se redirecciono temporalmente.',
    400 => 'Es una solicitud incorrecta.',
    401 => 'No esta autorizado.',
    402 => 'Necesita de un pago, para poder ingresar.',
    403 => 'Es prohibida',
    404 => 'No se encontró en este servidor',
    405 => 'No permite este método.',
    406 => 'No Aceptado',
    407 => 'Necesita autentificarse en el proxy.',
    408 => 'Necesita un tiempo de espera.',
    409 => 'Tiene un conflicto.',
    410 => 'Gone',
    411 => 'Requiere más espacio.',
    412 => 'Necesita una precondición correcta.',
    413 => 'Solicitud demasiado grande.',
    414 => 'Solicitud',
    415 => 'No soporta tipo de archivo.',
    416 => 'Necesita el rango solicitado.',
    417 => 'Fallo de exception.',
    500 => 'Tiene un error interno del Servidor',
    501 => 'No esta implementado',
    502 => 'Tiene un error en la puerta de enlace',
    503 => 'Este servicio no está Disponible',
    504 => 'Gateway Timeout',
    505 => 'No soporta la versión del HTTP',
  );
}

function respuesta_estado($status_code)
{
  $map = status_code_map();
  $map_explicacion=status_code_map_explicacion();

  header(sprintf("HTTP/1.1 %d %s", $status_code, strtoupper($map[$status_code])));  

  echo "<!DOCTYPE HTML PUBLIC>";  
  echo "<html><head>";

  set_title($status_code." ".strtoupper($map[$status_code]));  
  echo "</head><body style='text-align: center;'>";
  set_imagen_style("adondevas.jpg","style='height:200px;width:200px;'");
  echo "<h1>".$status_code." ".strtoupper($map[$status_code])."</h1>"."\n";
  echo "<p>The requested URL ".$_SERVER['REDIRECT_URL']." ".$map_explicacion[$status_code]."</p>"."\n";  
  echo "</body></html>";
}
function script($cuerpo="")
{
  echo "<script>";
  echo $cuerpo;
  echo "</script>";
}

function combo($data,$val,$opcion,$name,$default='',$selected='jksdfhsjkdfhsdjkfhkjsdfhs1',$class='',$style='')
{
  //$data=Logica::PA_UPLA($pa,'array',$xml,$sal);    
  $selected_axu='';
  echo '<select name="'.$name.'" id="'.$name.'" class="'.$class.'" style="'.$style.'" >';
  if($default!='')
  {
    echo '<option value="0">'.$default.'</option>';  
  }  
  foreach ($data as $fila):         
      if($selected==utf8_encode($fila[$val]))
      {
        $selected_axu='selected="selected"';
      }      
      else
      {
        $selected_axu='';
      }
      echo '<option value="'.utf8_encode($fila[$val]).'" '.$selected_axu.'>'.utf8_encode($fila[$opcion]).'</option>';
  endforeach;
  echo '</select>';
}

function conf_pre()
{
  $uri = trim(get_request_uri(),'/');
  
  set_meta("keywords","Prueba");
  set_meta("Description","upla facebook matrícula ingenieria medicina salud educacion derecho"); 
  set_content_type("author","Oficina Uni. de Informática - UPLA");  
  set_favicon("favicon.ico");//asignar icono estatico Favicon
  set_librerias("jquery-2.1.3.js");
  set_librerias("jquery-ui.js");
  set_librerias("simple.js");
  set_librerias("sliding.form.js");
  set_link("funciones_reportes.js"); 
  set_link_ext("//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js","js");//librerias para que funcione la lista de horas
  set_link_ext("//code.jquery.com/ui/1.10.4/themes/black-tie/jquery-ui.css","css");
  set_link_ext("//code.jquery.com/ui/1.10.4/jquery-ui.js","js");
  set_librerias("lazyload.js");
  set_librerias("alertify.js");
  set_link("alertify_core.css");
  set_link("alertify_default.php");
  if ($uri!="sesion") setNotificacion();
  //set_link("funciones.js");
  //set_link("general.php");  
}

function setDatosUsuarios($val_vS)
{  
  //$datos=$val_vS;//."-".$val_vS;
  echo '<input type="hidden" id="datosUsuario" name="datosUsuario" value="'.$val_vS.'"/>';
  echo '<input type="hidden" id="captcha_modelo" name="captcha_modelo" value=""/>';
  echo '<input type="hidden" id="captcha_respuesta" name="captcha_respuesta" value=""/>';

}

function llenar_vS($datosUsuario,$datos)
{
        $datos_usu=explode(",", $datosUsuario);
        
        foreach ($datos as $fila):     
            for($j=0;$j<sizeof($datos_usu);$j++)
            {
              $_SESSION[$datos_usu[$j]] = $fila[$datos_usu[$j]];  
            }
        endforeach;          
}
  
function add_vS($name,$valor=null)
{
  $_SESSION[$name]=$valor;
}

function set_href($href,$nombre_href,$clase='')
{
  echo '<a href ="'.$href.'" class="'.$clase.'">'.$nombre_href.'</a>';
}

function opciones_menu($data,$val,$opcion,$href,$default='')
{  
  if($default!='')
  {    
    echo "<li><a href='inicio'>".$default."</a></li>";
  }  
  foreach ($data as $var):// uso la otra sintaxis de php para templates    
    echo "<li><a href='inicio?filtro=".trim(utf8_encode($var[$val]))."'>".trim(utf8_encode($var[$opcion]))."</a></li>";
  endforeach;
}

function opciones_combo($data,$val,$opcion,$default='')
{
  if($default!='')
  {
    echo '<option value="0">'.$default.'</option>';  
  }  
  foreach ($data as $var):// uso la otra sintaxis de php para templates  
  echo "<option value='".trim(utf8_encode($var[$val]))."'>".trim(utf8_encode($var[$opcion]))."</option>";
  endforeach;
}

function opciones_combo_numeros($ini,$fin)
{
  $cad='';
  for($i=$ini;$i<=$fin;$i++)
  {
      $cad=''.$i;

      if($i<10)
      {
          $cad='0'.$i;
      }
      echo '<option value="'.$cad.'">'.$cad.'</option>';
  }
}
//esta funcion nos devuelve el option values con las horas para el modulo de horarios
//va dentro de un <select> y </select>
function combo_hora()
{
          $hora=6;$minuto=0;
          for(;$hora<23;){

              if($hora<10)
                $temp_hora='0'.$hora;
              else
                $temp_hora=$hora;

             if($minuto<10)
                $temp_minuto='0'.$minuto;
              else
                $temp_minuto=$minuto;
              //imprimimos los valores de la hora
              echo "<option>".$temp_hora.":".$temp_minuto."</option>";
              //incrementamos
              if($minuto!=45)
                $minuto+=15;
              else
              {
                $hora++;
                $minuto=0;
              }
          }   
}

function set_aviso()
{
  echo '<div name="aviso" id="aviso" style="background:rgb(218, 218, 218);text-align:right;" ></div>';
  return;
}

function set_cargando()
{
  echo '<div name="cargando" id="cargando"></div>';
}

function set_inicio_sistema($nom_sistema,$desc_sistema)
{
  $uri = trim(get_request_uri(),'/');
  echo'<div class="contenedor_cuerpo">
          <div class="inicio_mod">
	    <div class="inicio_mod_titulo">'.$nom_sistema.'</div>
	      <div class="inicio_mod_contenido">';
                set_imagen("banner_sistemas/".$uri."_portada.jpg",'400','700');
		echo '<br>
		<div class="inicio_mod_parrafo">
			<p>'.$desc_sistema.'</p>
		</div>
              </div>
            </div>
	</div>';
}


function set_menu_lateral($data,$principal,$opcion,$uri)
{
  $aux_principal=""; 
  $entre=false;
  foreach ($data as $fila):    
      
      if(utf8_encode($fila[$principal])==$aux_principal)
      {
        
        echo'<li><a href="'.utf8_encode($fila[$uri]).'"><span>'.utf8_encode($fila[$opcion]).'</span></a></li>';                            
      }      
      else
      {
           
          if($entre)
          {
            
            echo '</ul>';
            echo '</li>';
            $entre=false;
          }

          if(utf8_encode($fila[$principal])=='Sin Categoria')
          {
            set_imagen_style("banner_sistemas/".utf8_encode($fila[$uri]).".jpg","style='width:200px;height:150px'");
            echo '<li class="active"><a href="'.utf8_encode($fila[$uri]).'"><span>'.utf8_encode($fila[$opcion]).'</span></a></li>';
            
            continue;
          
          }          

          echo '<li class="has-sub"><a><span>'.utf8_encode($fila[$principal]).'</span></a>';
          $aux_principal=utf8_encode($fila[$principal]);          
            echo '<ul>';
                echo'<li><a href="'.utf8_encode($fila[$uri]).'"><span>'.utf8_encode($fila[$opcion]).'</span></a></li>';
            
            $entre=true;
      }           
  endforeach;

}

function set_opciones_intranet($data,$opcion,$uri)
{
  foreach ($data as $fila):    
  set_href(utf8_encode($fila[$uri]),utf8_encode($fila[$opcion]));
  echo '<br>';
            
  endforeach;
}

function set_reporte_jasper($nomarchivo,$arreglo,$width=800,$height=1140,$tipo='.pdf',$bd=BD)
{
  $RUTA_PROYECTO=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['REQUEST_URI'], 0, (strlen($_SERVER['REQUEST_URI'])-strlen($_SERVER['PATH_INFO'])));
  $fichero= explode("/",$_SERVER['PHP_SELF']);  
  $ruta= $fichero[1];
  $raiz= $_SERVER['DOCUMENT_ROOT'];

  if($tipo=='.pdf'){
    //Ruta a donde se muestra el archivo de salida Pdf
    $salida="Reportes/pdf_generados/".$_SESSION['dni'].'_'.$nomarchivo.'.pdf';     
    //Ruta a donde deseo Guardar Mi archivo de salida Pdf
    $nombrepdf=$RUTA_PROYECTO.'/Reportes/pdf_generados/'.$_SESSION['dni'].'_'.$nomarchivo.'.pdf'; 

  }else if($tipo=='.html')
  {
    //Ruta a donde se muestra el archivo de salida Pdf
    $salida="Reportes/pdf_generados/".$_SESSION['dni'].'_'.$nomarchivo.'.html';     
    //Ruta a donde deseo Guardar Mi archivo de salida Pdf
    $nombrepdf=$RUTA_PROYECTO.'/Reportes/pdf_generados/'.$_SESSION['dni'].'_'.$nomarchivo.'.html'; 
  }

  //Llamando las librerias  
  require('Configuracion/Librerias/php-jru.php');
  //Llamando la funcion JRU de la libreria php-jru  
  $jru=new JRU();
  //Ruta del reporte compilado Jasper generado por IReports
  $Reporte= $RUTA_PROYECTO.'/Reportes/plantillas_jasper/'. $nomarchivo.'.jasper';  
  //Parametro en caso de que el reporte no este parametrizado
  $Parametro=new java('java.util.HashMap');
  
  for ($i=0; $i<sizeof($arreglo);$i++)
  {
    $Parametro->put($arreglo[$i][0],$arreglo[$i][1]);
  }
  
  $Conexion= new JdbcConnection($bd);

if($tipo=='.pdf'){
  //Generamos la Exportacion del reporte
  //PDF  
  $jru->runReportToPdfFile($Reporte,$nombrepdf,$Parametro,$Conexion->getConnection()); 
  echo "<embed src= ".$salida." width= $width height= $height ></embed> "; 

}else if($tipo=='.html'){
  //Generamos la Exportacion del reporte
  //html  
  $jru->runReportToHtmlFile($Reporte,$nombrepdf,$Parametro,$Conexion->getConnection()); 
  return $salida;
}

 
  
  /*
  echo '<object data= "'.$salida.'" width= 800 height= 600 type="application/pdf">';
  echo '<param name="'.$salida.'" value="'.$salida.'"/>';
  echo "</object>";
  */
}

function set_funcion_php($pag)
{
  require_once("Capa_Presentacion/Funciones/".$pag);

}

function asignar_imagen($dni,$style)
{
  $nombre_fichero = imagen("foto_usuarios/foto_dni/$dni.jpg");
    
    if (file_exists($nombre_fichero)) 
    {
        set_imagen_style("foto_usuarios/foto_dni/$dni.jpg",$style);
    } 
    else 
    {
        switch($_SESSION['sexo'])
        {
            case 'M':set_imagen_style("foto_usuarios/usuario_hombre.jpg",$style);break;
            case 'F':set_imagen_style("foto_usuarios/usuario_mujer.jpg",$style);break;
        }     
    }
}


function pestaias_menu($array_menu)
{
       echo'<div id="navigation" style="display:none;">
             <ul>';
              foreach ($array_menu as $key => $value) {
                echo'
                  <li>
                      <span class="error"></span>
                      <a href="#" id="'.$key.'">'.$value.'</a>
                  </li>
                ';
              } 
        echo'    </ul>
          </div>
        </div>';
}
function pestaias_items($array_items){
    
            foreach ($array_items as $key => $value) {
              echo '<fieldset class="step">';
                //<legend>'.$key.'</legend>';
              include_template($value);
              echo'</fieldset>';
            }
}

function setNotificacion(){

  echo '<audio id="sonido_correcto">';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_correcto.mp3"></source>';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_correcto.wav"></source>';
  echo '</audio>';
  echo '<audio id="sonido_advertencia">';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_advertencia.mp3"></source>';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_advertencia.wav"></source>';
  echo '</audio>';
  echo '<audio id="sonido_error">';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_error.mp3"></source>';
  echo '<source src="Capa_Presentacion/Recursos/modulos_intranet/sonido_error.wav"></source>';
  echo '</audio>';
}

?>
