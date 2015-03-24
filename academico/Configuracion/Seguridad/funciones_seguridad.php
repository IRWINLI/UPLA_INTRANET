<?php

session_start();

function limpiar_seguridad($valor)
{
    //limpia el codigo html despues del valor ingresado,
    //si es antes se elimina todo y devuelve ''
    $valor = strip_tags($valor); //Retira las etiquetas HTML y PHP de un string
    $valor = stripslashes($valor); //Quita las barras de un string con comillas escapadas
    //$valor = htmlentities($valor);  //Convierte todos los caracteres aplicables a entidades HTML    
    $valor=htmlspecialchars($valor,ENT_QUOTES);    
    //$valor=str_replace("&","y",$valor);
    //$valor=str_replace('"','\"',$valor);

    //=== Limpia codigo SQL
    $bloqueo = array ("|", "/="," insert ", " select ", " update ", " delete ", "distinct", "having", " truncate ", " replace ", "handler", " like ", "procedure", " limit ", "order by", "group by", " asc ", " desc ","from"," or "," and "," into "," union "," all "," OR ");  
    if ( preg_match( "[a-zA-Z0-9@]", $valor ) || preg_match( "[0-9]", $valor)) 
    { 
    $valor = trim(str_replace($bloqueo, '', $valor)); 

    }
    return $valor; 
} 

//Con la función hacker defense podrás evadir todo tipo de ataque XSS
function hackerDefense_get($ruta)
{  

    // begin hacker defense  
    foreach ($_GET as $secvalue)
    {
        if((eregi(']*script.*\”?[^>]*>', $secvalue)) || (eregi(']*object.*\”?[^>]*>', $secvalue)) ||  (eregi(']*iframe.*\”?[^>]*>', $secvalue)) ||  (eregi(']*applet.*\”?[^>]*>', $secvalue)) ||  (eregi(']*window.*\”?[^>]*>', $secvalue)) ||  (eregi(']*document.*\”?[^>]*>', $secvalue)) ||  (eregi(']*cookie.*\”?[^>]*>', $secvalue)) ||  (eregi(']*meta.*\”?[^>]*>', $secvalue)) ||  (eregi(']*style.*\”?[^>]*>', $secvalue)) ||  (eregi(']*alert.*\”?[^>]*>', $secvalue)) ||  (eregi(']*form.*\”?[^>]*>', $secvalue)) ||  (eregi(']*php.*\”?[^>]*>', $secvalue)) ||  (eregi(']*]*>', $secvalue)) ||  (eregi(']*img.*\”?[^>]*>', $secvalue))) 
        {            
            respuesta_estado(403);                     
            header("Location: salir");
            exit();            
        }
    }
}

function hackerDefense_post($ruta)
{  
    // begin hacker defense  
    foreach ($_POST as $secvalue)
    {
        if((eregi(']*script.*\”?[^>]*>', $secvalue)) || (eregi(']*object.*\”?[^>]*>', $secvalue)) ||  (eregi(']*iframe.*\”?[^>]*>', $secvalue)) ||  (eregi(']*applet.*\”?[^>]*>', $secvalue)) ||  (eregi(']*window.*\”?[^>]*>', $secvalue)) ||  (eregi(']*document.*\”?[^>]*>', $secvalue)) ||  (eregi(']*cookie.*\”?[^>]*>', $secvalue)) ||  (eregi(']*meta.*\”?[^>]*>', $secvalue)) ||  (eregi(']*style.*\”?[^>]*>', $secvalue)) ||  (eregi(']*alert.*\”?[^>]*>', $secvalue)) ||  (eregi(']*form.*\”?[^>]*>', $secvalue)) ||  (eregi(']*php.*\”?[^>]*>', $secvalue)) ||  (eregi(']*]*>', $secvalue)) ||  (eregi(']*img.*\”?[^>]*>', $secvalue))) 
        {      
            respuesta_estado(403);
            header("Location: salir");          
            exit();
        }
    }
}


//Comprueba si existe una sesion o una cookie en la página de login, si es así redirecciona al index
//Comprueba que exista una sesion o una cookie, sino redirige al login
function seguridad_sesion($par='',$sec=false)
{
    $arr=split('/',$par);        
    $pag=$arr[sizeof($arr)-1];
    $permiso='';
    if (isset($_SESSION[vS_Cookie]))
    {
        //$cookie = $_SESSION[vS_Cookie];
        //$xml_cookie='<Usuario><usuario>'.$_SESSION['dni'].'</usuario><cookie>'.$cookie.'</cookie></Usuario>';        
        //$cookie_correcto=Logica::PA_UPLA("seguridad.paCon_ComprobarCookie",'array',$xml_cookie,true);  
              
        if($pag!='inicio' && !$sec)
        {
            $xml_cod='<Datos><cod>'.$_SESSION['dni'].'</cod><urlx>'.$pag.'</urlx></Datos>';
            $permiso=Logica::PA_UPLA("[seguridad].[paCon_pagpermitidas]",'',$xml_cod,true);          
        }
        //if ($cookie_correcto['rpta']==1)
        //{            
            if($pag=="sesion" || $permiso == "ninguno")
            {
                if($pag!="sesion")
                    header("Location: inicio?adv=sinpermiso");           
                else
                    header("Location: inicio");           
            }    
            return true;            
        //}
        /*else if($pag!="sesion")
        {
            //session_destroy();
            if($sec)
            {
                return false;
            }
            else
            {                
                header("Location: sesion");
                exit();
            }
        }*/
    }
    else if($pag!="sesion")
    {
        session_destroy();
        header("Location: sesion");
        exit();
    }
}

// ##################### Crear sesión si aún no existe ##################### //    
if (!isset($_SESSION[vS_ContadorErrados]))
{
    $_SESSION[vS_ContadorErrados]=0;
}

?>
