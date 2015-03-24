<?php

require_once("../Privado/variables.php");
include_once('variables.php');
require_once('Librerias/stradlin.php');
require_once('Librerias/recaptchalib.php');
include_once("Capa_Datos/sQuery.php");
include_once("Capa_Logica/Controlador.php");        
require_once ("Seguridad/funciones_seguridad.php");

date_default_timezone_set('America/Lima');

//require_once ("Capa_AccesoDatos/comprobarCookies.php");
hackerDefense_get("login.php");  
hackerDefense_post("login.php");
//seguridad();

define("BASE_URL", 'http://'.$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']);

define("RUTA_CONTADOR", "/tmp/contador1.dat");

function leer_contador($ruta) {
  $fp = fopen($ruta, "r");
  $raw = fgets($fp);
  return intval(trim($raw));
}

function guardar_contador($ruta, $valor) {
  $fp = fopen($ruta, "w+");
  fputs($fp, sprintf("%d", intval($valor)));
  fclose($fp);
}

/* Mostrar estado del contador */
route('/counter', "GET", function($params) {
  $value = leer_contador(RUTA_CONTADOR);
  $doc = array("value" => $value);
  //$pagination_link  = "<https://api.github.com/resource?page=2>; rel=\"next\", <https://api.github.com/resource?page=5>; rel=\"last\"";
  header("Link: $pagination_link");
  serve_json($doc, JSON_PRETTY_PRINT);
});

route('/counter', "PUT", function($params) {
  $actual_value = leer_contador(RUTA_CONTADOR);
  $request_doc = json_decode(get_request_body(), true);
  $intended_value = $request_doc['value'];
  /* Verificaciones */
  if ($intended_value < 0) {
    set_status_code(400);
    $doc = array(
      "message" => "El valor no puede ser negativo"
    );
    serve_json($doc, JSON_PRETTY_PRINT);
  } elseif ($intended_value >= $actual_value) {
    guardar_contador(RUTA_CONTADOR, $intended_value);
    set_status_code(204);
  } else {
    set_status_code(409);
    $doc = array(
      "message" => "El nuevo valor debe ser igual o mayor que actual"
    );
    serve_json($doc, JSON_PRETTY_PRINT);
  }
});

route('/counter/inc', "POST", function($params) {
  $actual_value = leer_contador(RUTA_CONTADOR);
  $new_value = $actual_value + 1;
  guardar_contador(RUTA_CONTADOR, $new_value);
  set_status_code(204);
});

/* Ejemplo de FP */

route("/sumar", "GET", function($params) 
{
  $a = intval($_GET['a']);
  $b = intval($_GET['b']);
  $doc = array(
    "result" => $a + $b
  );
  set_status_code(200);
  /*$map = status_code_map();
  echo '200 '.strtoupper($map[200]);
  */
  serve_json($doc, JSON_PRETTY_PRINT);

});

//############################## SESION ################################

route('/sesion',"GET",function($params)
{
  set_status_code(200); 
  seguridad_sesion($params[0]);
  conf_pre();          

  set_title("Intranet - Upla");
  echo "<html>";
  echo "<head>";  
  set_link("login.php");    
  script('$( document ).ready(function(){$("#usuario").focus();});');
  //-----------------------------------------
  if(isset($_GET["error"]))
  {
    $resp="";
   switch($_GET["error"])
   {
    case "exis": $resp="Usuario no registrado...";$focox="usuario";break;
    case "pass": $resp="Contraseña equivocada...";$focox="contrasena";break;
    case "desac": $resp="Usuario desactivado, Of. de Informática...";$focox="usuario";break;
   } 

    script('$( document ).ready(function()
    {
      //aviso_mal("'.$resp.'"); 
      $("#usuario").val("'.$_GET["usuario"].'");
      $("#'.$focox.'").focus();
      $("#mensajex").text("'.$resp.'");
    });'
    );
  }            
  //-----------------------------------------
  echo "</head>";
  echo "<body>";
   
  //include_template("cabecera.php");
  //echo '<div class="sub_titulo" id="sub_titulo" name="sub_titulo">';
  //echo 'El genio se hace con un 1% de talento, y un 99% de trabajo...(Albert Einstein)';
  //echo '</div>';
  set_aviso();  
  include_template("login.php");  
  //include_template("pie.php");  
  echo "</body>";
  echo "</html>";
});

route('/login',"POST",function($params)
{   

    if ($_SESSION[vS_ContadorErrados]>=n_intentos_captcha)
    {
      $captcha_modelo = isset($_POST['captcha_modelo']) ? $_POST['captcha_modelo'] : null ;
      $captcha_respuesta = isset($_POST['captcha_respuesta']) ? $_POST['captcha_respuesta'] : null ;
    }

    $_SESSION[vS_ContadorErrados]++;

    $usuario=isset($_POST['usuario']) ? $_POST['usuario'] : null ;
    $contrasena=isset($_POST['contrasena']) ? $_POST['contrasena'] : null ;
    $contrasena = sha1((salt).md5($contrasena));
    //$recordarme=isset($_GET['recordarme']) ? $_GET['recordarme'] : null ;

    // ########### EVALUANDO CAPTCHA ###########
    $CaptchaCorrecto=true;//Se le da un valor por si no se ha activado el Captcha aún
    if (isset($captcha_modelo))
    {//Se evalúa si llega la variable, esta llegará solo si se ha activado el Captcha            
        $resp = recaptcha_check_answer (captcha_private_key,gethostbyname($_SERVER["REMOTE_ADDR"]),$captcha_modelo,$captcha_respuesta);

        if ($resp->is_valid) 
        {
            $CaptchaCorrecto=true;
        }
        else 
        {
            $CaptchaCorrecto=false;
            $usuario='';
            $contrasena='';        
        }
    }

    // ########### EMPAQUETANDO DATOS EN XML ###########

    $mi_xml = new DomDocument('1.0', 'UTF-8');
    $mi_xml -> formatOutput = true;

    $root = $mi_xml -> createElement("Autentificar");
    $mi_xml -> appendChild($root);

    $xml_usuario = $mi_xml -> createElement("usuario",$usuario);
    $xml_contrasena = $mi_xml -> createElement("contrasena",$contrasena);

    $root -> appendChild($xml_usuario);
    $root -> appendChild($xml_contrasena);

    $archivo = $mi_xml->saveXML();

    $debecambiarcontra=Logica::PA_UPLA('[seguridad].[paCon_debecambiar]','','<Dato><usuario>'.$usuario.'</usuario></Dato>',true);         

    $datos=Logica::PA_UPLA('seguridad.paCon_AutentificarUsuario','array',$archivo,true);        
    
    if (strlen($datos['rpta'])>1 && $CaptchaCorrecto==true)
    {
        $_SESSION[vS_Cookie]=$datos['rpta'];
        $cookie_xml="<Usuario><cookie>".$_SESSION[vS_Cookie]."</cookie></Usuario>";
        $datosUsuario= isset($_POST['datosUsuario']) ? $_POST['datosUsuario'] : null ;        
        $datos=Logica::PA_UPLA('seguridad.paCon_MostrarDatosUsuario','array',$cookie_xml,false);
        
        llenar_vS($datosUsuario,$datos);     

        switch ($debecambiarcontra) {
            case '0':
                header("Location: seguridadcambiarContrasena");   
                break;
            
            default:
                //header("Location: inicio?filtro=mimuro&dequien=".$_SESSION['dni']);   
                header("Location: inicio?filtro=noticias");   
                break;
        }

        
    }
    else if($datos['rpta']=='0')
    {      
        header("Location: sesion?error=exis&usuario=".$_POST['usuario']);             
    }
    else if($datos['rpta']=='1')
    {      
        header("Location: sesion?error=desac&usuario=".$_POST['usuario']);             
    }
    else if($datos['rpta']=='2')
    {      
        header("Location: sesion?error=pass&usuario=".$_POST['usuario']);             
    }
  
  
});

route ("/cambiarContrasena","GET",function($params)
{
    echo "<html>";
    echo "<head>";   
            
    set_status_code(200); 
    seguridad_sesion($params[0]);
    conf_pre();       

    set_link("funciones.js");
    set_link("menu.php");
    set_link("general.php");
    //set_link("menu_lateral.php");
    set_link("menu.js");
    set_link("menu_lateral.js");
        
    script('$( document ).ready(function(){
                minimizar("capa1");
                minimizar("capa2");
                minimizar("capa3");
                //menu_lateral();
                '.$mensaje_ver.'
                });'); 


    echo "</head>";
    echo "<body>";
    echo "<div id='cargando'></div>";
    include_template("menu.php");  
    //include_template("menu_lateral.php");    
    include_template("cambiarContrasena.php");          
    echo "</body>";
    echo "</html>";
});

route ("/seguridadcambiarContrasena","GET",function($params)
{
    echo "<html>";
    echo "<head>";   
            
    set_status_code(200); 
    //seguridad_sesion($params[0]);
    conf_pre();       

    set_link("funciones.js");
    set_link("general.php");

    script('$( document ).ready(function(){                
                $("#btn_continuar").hide();
                '.$mensaje_ver.'
                });'); 


    echo "</head>";
    echo "<body>";
    //include_template("menu.php");  
    //include_template("menu_lateral.php");    
    echo "<div id='cargando'></div>";
    include_template("mod_primeruso.php");          
    echo "</body>";
    echo "</html>";
});

route ("/restpass","GET",function($params)
    {
    echo "<html>";
    echo "<head>";   
            
    set_status_code(200); 
    seguridad_sesion($params[0]);
    conf_pre();       
    
    set_link("respass.js");
    set_link("menu.php");
    set_link("general.php");
    //set_link("menu_lateral.php");
    set_link("menu.js");
    set_link("menu_lateral.js");
    
    echo "</head>";
    echo "<body>";
    echo "<div id='cargando'></div>";
    include_template("menu.php"); 
    set_aviso();   
    //include_template("menu_lateral.php");    
    include_template("restpass.php");          
    echo "</body>";
    echo "</html>";
    });

    route ("/restpass-alum","GET",function($params)
    {
    echo "<html>";
    echo "<head>";   
            
    set_status_code(200); 
    seguridad_sesion($params[0]);
    conf_pre();       
    
    set_link("respass_alum.js");
    set_link("menu.php");
    set_link("general.php");
    //set_link("menu_lateral.php");
    set_link("menu.js");
    set_link("menu_lateral.js");
   
    
    echo "</head>";
    echo "<body>";
    echo "<div id='cargando'></div>";
    include_template("menu.php"); 
    set_aviso();   
    //include_template("menu_lateral.php");    
    include_template("restpass_alum.php");          
    echo "</body>";
    echo "</html>";
    });

    route ("/editUsuario","GET,POST",function($params)
    {    
        //echo "fsdf".$_POST['codigo_edit_usu_aux']."fsd";    
        //PARA ACAMBIAR
        $rpta='';
        if(isset($_POST['codigo_edit_usu_aux']))
        {   
               
            $dom = new DOMDocument('1.0');
            $dom->encoding = 'iso-8859-1';
            $dom->formatOutput = true;
            $t_documentario = $dom->createElement('reg_usu', '');
            $dom->appendChild($t_documentario);

            $datos_ext = $dom->createElement('datosExt', '');
            $t_documentario->appendChild($datos_ext);

            $codigoX = $dom->createElement('cod',$_POST['codigo_edit_usu_aux']);
            $datos_ext->appendChild($codigoX);
            $nombre = $dom->createElement('nombre',(limpiar_seguridad($_POST['nombre_edit_usu'])));
            $datos_ext->appendChild($nombre);
            $apP = $dom->createElement('apP',(limpiar_seguridad($_POST['apP_edit_usu'])));
            $datos_ext->appendChild($apP);
            $apM = $dom->createElement('apM',(limpiar_seguridad($_POST['apM_edit_usu'])));
            $datos_ext->appendChild($apM);
            $cmb_sexo = $dom->createElement('cmb_sexo',$_POST['cmb_sexo_edit']);
            $datos_ext->appendChild($cmb_sexo);                        
            $f_nac = $dom->createElement('f_nac',$_POST['nac_priv_anio_edit'].'-'.$_POST['nac_priv_mes_edit'].'-'.$_POST['nac_priv_dia_edit']);
            $datos_ext->appendChild($f_nac);   
            $email = $dom->createElement('email',$_POST['email_priv_edit']);
            $datos_ext->appendChild($email);   
            $dir = $dom->createElement('dir',(limpiar_seguridad($_POST['dir_priv_edit'])));
            $datos_ext->appendChild($dir);   
            $tel = $dom->createElement('tel',$_POST['tel_priv_edit']);
            $datos_ext->appendChild($tel);   
            $cel = $dom->createElement('cel',$_POST['cel_priv_edit']);
            $datos_ext->appendChild($cel);   
            $eciv = $dom->createElement('eciv',$_POST['cmb_ec_edit']);
            $datos_ext->appendChild($eciv);   
            
            
            for($i=1;$i<=(int)$_POST['cant_filas_sedmodfac'];$i++)
            {             
                if(isset($_POST['sed_'.$i]))
                {                    
                    $datos_dep = $dom->createElement('depen', '');
                    $datos_ext->appendChild($datos_dep);
                    $cmb_sed = $dom->createElement('sed_',$_POST['sed_'.$i]);
                    $datos_dep->appendChild($cmb_sed);    
                    $cmb_mod = $dom->createElement('mod_',$_POST['mod_'.$i]);
                    $datos_dep->appendChild($cmb_mod);    
                    $cmb_fac = $dom->createElement('fac_',$_POST['fac_'.$i]);
                    $datos_dep->appendChild($cmb_fac);    
                }
            }


            for($i=1;$i<=(int)$_POST['cant_filas_priv'];$i++)
            {             
                if(isset($_POST['priv_'.$i]))
                {                    
                    $datos_priv = $dom->createElement('sis_priv', '');
                    $datos_ext->appendChild($datos_priv);
                    $cmb_priv = $dom->createElement('priv_',$_POST['priv_'.$i]);
                    $datos_priv->appendChild($cmb_priv);    
                }
            }

            for($i=1;$i<=(int)$_POST['cant_filas_catemuro'];$i++)
            {             
                if(isset($_POST['catmuro_'.$i]))
                {                    
                    $datos_catmuro = $dom->createElement('catmuro', '');
                    $datos_ext->appendChild($datos_catmuro);
                    $cmb_catmuro = $dom->createElement('catmuro_',$_POST['catmuro_'.$i]);
                    $datos_catmuro->appendChild($cmb_catmuro);    
                }
            }

            $r=$dom->saveXML();
            
            //echo $r;

            $rpta=Logica::PA_UPLA("[seguridad].[paAct_editarUsuario]","",$r,true);               
            unset($_POST['codigo_edit_usu']);
        }

        echo "<html>";
        echo "<head>";   
                
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        //set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        set_link("tabla.php");


        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    //menu_lateral();  
                    listadep=[];  
                    listaprivi=[];  
                    liscatmuro=[];
                    switch("'.$rpta.'")
                    {
                        case "0":notificacion(0,"¡Error!","¡Ocurrio un error!, se cancelo la transacción vuelva a intentarlo.");break;
                        case "1":notificacion(1,"¡Advertencia!","Se cancelo el registro; ya existe el dni o código: '.$_POST['codigo_edit_usu_aux'].'.");break;
                        case "2":notificacion(2,"¡Correcto!","Se registro correctamente el dni o código: '.$_POST['codigo_edit_usu_aux'].'.");break;
                    }                                                                              
                    });'
                );        
        
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        include_template("menu.php"); 
        set_aviso();   
        //include_template("menu_lateral.php");    
        include_template("edit_usuario.php"); 
        echo "<div id='dialogConfirmediusu' style='display:none;' title='Mensaje de Confirmación'>¿Está seguro que desea eliminar este usuario?</div>";         
        echo "</body>";
        echo "</html>";
    });
    


    route ("/regUsuario","GET,POST",function($params)
    {        
        $rpta='';
        if(isset($_POST['codigo_reg_usu']))
        {            
            $pass=$_POST['clave_reg_usu'];
            $salt="|#o5o34+-o/g+)d1)2";
            $pass_encript=sha1((salt).md5($pass));
               
            $dom = new DOMDocument('1.0');
            $dom->encoding = 'iso-8859-1';
            $dom->formatOutput = true;
            $t_documentario = $dom->createElement('reg_usu', '');
            $dom->appendChild($t_documentario);

            $datos_ext = $dom->createElement('datosExt', '');
            $t_documentario->appendChild($datos_ext);

            $codigoX = $dom->createElement('cod',$_POST['codigo_reg_usu']);
            $datos_ext->appendChild($codigoX);
            $nombre = $dom->createElement('nombre',(limpiar_seguridad($_POST['nombre_reg_usu'])));
            $datos_ext->appendChild($nombre);
            $apP = $dom->createElement('apP',(limpiar_seguridad($_POST['apP_reg_usu'])));
            $datos_ext->appendChild($apP);
            $apM = $dom->createElement('apM',(limpiar_seguridad($_POST['apM_reg_usu'])));
            $datos_ext->appendChild($apM);
            $cmb_sexo = $dom->createElement('cmb_sexo',$_POST['cmb_sexo']);
            $datos_ext->appendChild($cmb_sexo);            
            $cla_reg_usu = $dom->createElement('cla_reg_usu',$pass_encript);
            $datos_ext->appendChild($cla_reg_usu);   
            $f_nac = $dom->createElement('f_nac',$_POST['nac_priv_anio'].'-'.$_POST['nac_priv_mes'].'-'.$_POST['nac_priv_dia']);
            $datos_ext->appendChild($f_nac);   
            $email = $dom->createElement('email',$_POST['email_priv']);
            $datos_ext->appendChild($email);   
            $dir = $dom->createElement('dir',(limpiar_seguridad($_POST['dir_priv'])));
            $datos_ext->appendChild($dir);   
            $tel = $dom->createElement('tel',$_POST['tel_priv']);
            $datos_ext->appendChild($tel);   
            $cel = $dom->createElement('cel',$_POST['cel_priv']);
            $datos_ext->appendChild($cel);   
            $eciv = $dom->createElement('eciv',$_POST['cmb_ec']);
            $datos_ext->appendChild($eciv);   
            
            
            for($i=1;$i<=(int)$_POST['cant_filas_sedmodfac'];$i++)
            {             
                if(isset($_POST['sed_'.$i]))
                {                    
                    $datos_dep = $dom->createElement('depen', '');
                    $datos_ext->appendChild($datos_dep);
                    $cmb_sed = $dom->createElement('sed_',$_POST['sed_'.$i]);
                    $datos_dep->appendChild($cmb_sed);    
                    $cmb_mod = $dom->createElement('mod_',$_POST['mod_'.$i]);
                    $datos_dep->appendChild($cmb_mod);    
                    $cmb_fac = $dom->createElement('fac_',$_POST['fac_'.$i]);
                    $datos_dep->appendChild($cmb_fac);    
                }
            }


            for($i=1;$i<=(int)$_POST['cant_filas_priv'];$i++)
            {             
                if(isset($_POST['priv_'.$i]))
                {                    
                    $datos_priv = $dom->createElement('sis_priv', '');
                    $datos_ext->appendChild($datos_priv);
                    $cmb_priv = $dom->createElement('priv_',$_POST['priv_'.$i]);
                    $datos_priv->appendChild($cmb_priv);    
                }
            }

            for($i=1;$i<=(int)$_POST['cant_filas_catemuro'];$i++)
            {             
                if(isset($_POST['catmuro_'.$i]))
                {                    
                    $datos_catmuro = $dom->createElement('catmuro', '');
                    $datos_ext->appendChild($datos_catmuro);
                    $cmb_catmuro = $dom->createElement('catmuro_',$_POST['catmuro_'.$i]);
                    $datos_catmuro->appendChild($cmb_catmuro);    
                }
            }

            $r=$dom->saveXML();

            $rpta=Logica::PA_UPLA("[seguridad].[paIns_RegistrarUsuario]","",$r,true);   
            unset($_POST['codigo_reg_usu']);
        }        

        echo "<html>";
        echo "<head>";   
                
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       

        set_link("regusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        //set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");            

        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    //menu_lateral();                       
                    switch("'.$rpta.'")
                    {
                        case "0":notificacion(0,"¡Error!","¡Ocurrio un error!, se cancelo la transacción vuelva a intentarlo.");break;
                        case "1":notificacion(1,"¡Advertencia!","Se cancelo el registro; ya existe el dni o código: '.$_POST['codigo_reg_usu'].'.");break;
                        case "2":notificacion(2,"¡Correcto!","Se registro correctamente el dni o código: '.$_POST['codigo_reg_usu'].'.");break;
                    }                            
                    });'
                );        
        
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        include_template("menu.php"); 
        set_aviso();   
        //include_template("menu_lateral.php");            
        include_template("reg_usuario.php");          
        echo "</body>";
        echo "</html>";
    });   


route("/ejecambiocontra","POST",function($params)
{
  if(seguridad_sesion($params[0],true))
        {
          $actual_pass=isset($_POST['actualPass']) ? $_POST['actualPass'] : null ;
          $actual_pass=sha1((salt).md5($actual_pass));
          
          $nuevo_pass=isset($_POST['nuevoPass']) ? $_POST['nuevoPass'] : null ;
          $nuevo_pass=sha1((salt).md5($nuevo_pass));
          
          $cookie_xml='
                <Usuario>
                <Cookie>'.$_SESSION[vS_Cookie].'</Cookie>
                <ActPass>'.$actual_pass.'</ActPass>
                <NuevPass>'.$nuevo_pass.'</NuevPass>
                </Usuario>';
        
          $datos=logica::PA_UPLA('seguridad.paAct_CambiarContrasena','json',$cookie_xml,true);
        }
});

route ("/salir","GET",function($params)
{
      $cookie_xml="<Usuario><cookie>".$_SESSION[vS_Cookie]."</cookie></Usuario>";
      logica::PA_UPLA('seguridad.paAct_MatarCookie','',$cookie_xml);
      session_destroy();
      header("Location: sesion");
});


    route("/editarUsuario","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $dom = new DOMDocument('1.0');
            $dom->encoding = 'iso-8859-1';
            $dom->formatOutput = true;
            $t_documentario = $dom->createElement('reg_usu', '');
            $dom->appendChild($t_documentario);

            $datos_ext = $dom->createElement('datosExt', '');
            $t_documentario->appendChild($datos_ext);

            $codigoX = $dom->createElement('cod',$_POST['dni']);
            $datos_ext->appendChild($codigoX);
            $nombre = $dom->createElement('nombre',$_POST['nombre']);
            $datos_ext->appendChild($nombre);
            $apP = $dom->createElement('apP',$_POST['apP']);
            $datos_ext->appendChild($apP);
            $apM = $dom->createElement('apM',$_POST['apM']);
            $datos_ext->appendChild($apM);
            $cmb_sexo = $dom->createElement('cmb_sexo',$_POST['cmb_sexo']);
            $datos_ext->appendChild($cmb_sexo);
            $cmb_priv = $dom->createElement('cmb_priv',$_POST['cmb_priv']);
            $datos_ext->appendChild($cmb_priv);
            
            $r=$dom->saveXML();
          
            Logica::PA_UPLA("[seguridad].[paAct_EditarDatosUsuario]","json",$r,true);                
        }
    });

    route("/buscarUsuPre","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $coddni=isset($_GET['bus']) ? $_GET['bus'] : null ;
            $cod='<Usuario><dni>'.limpiar_seguridad($coddni).'</dni></Usuario>';        
            Logica::PA_UPLA("seguridad.paCon_MostrarUsuarios_datosbasic","json",$cod);                
        }
    });  


    route("/buscarUsuPre-dep","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $coddni=isset($_GET['bus']) ? $_GET['bus'] : null ;
            $cod='<Usuario><dni>'.limpiar_seguridad($coddni).'</dni></Usuario>';        
            Logica::PA_UPLA("seguridad.paCon_MostrarUsuarios_datosdep","json",$cod);                
        }
    }); 


    route("/buscarUsuPre-priv","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $coddni=isset($_GET['bus']) ? $_GET['bus'] : null ;
            $cod='<Usuario><dni>'.limpiar_seguridad($coddni).'</dni></Usuario>';        
            Logica::PA_UPLA("seguridad.paCon_MostrarUsuarios_datospriv","json",$cod);                
        }
    });  


    route("/buscarUsuPre-catmuro","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $coddni=isset($_GET['bus']) ? $_GET['bus'] : null ;
            $cod='<Usuario><dni>'.limpiar_seguridad($coddni).'</dni></Usuario>';        
            Logica::PA_UPLA("seguridad.paCon_MostrarUsuarios_datoscat","json",$cod);                
        }
    });  


    route("/restaurarpass","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {        
            $cod='<Usuario><Codigo>'.strtoupper($_POST['dni']).'</Codigo><CodEncrip>'.sha1((salt).md5(strtoupper($_POST['dni']))).'</CodEncrip><usuresp>'.$_SESSION['dni'].'</usuresp></Usuario>';
            Logica::PA_UPLA("[seguridad].[paAct_RestaurarContrasena]","json",$cod,true);                        
        }            
    });   

    route("/eliminarusuario-fucc","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {        
            
            $cod = '<Usuario><dni>'.limpiar_seguridad($_POST['dni']).'</dni><eliminar>'.$_POST['eli'].'</eliminar><usu>'.$_SESSION['dni'].'</usu></Usuario>';
            Logica::PA_UPLA("[seguridad].[paEli_desacusuariointranet]","json",$cod,true);
        }
            
    });

?>
 
