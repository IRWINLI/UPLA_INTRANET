<?php
    if(isset($_POST['excel_opcion']))
    {
        include_once("Capa_Datos/sQuery.php");
        include_once("Capa_Logica/Controlador.php"); 
        date_default_timezone_set('America/Lima');
        switch($_POST['excel_opcion'])
        {
            
            case 'excel_rptcaphor':
                               

                $cod='<horario><capsec><car>'.$_POST['car'].'</car><esp>'.$_POST['esp'].'</esp><mod>'.$_POST['mod'].'</mod><sed>'.$_POST['sed'].'</sed><nivel>'.$_POST['niv'].'</nivel></capsec></horario>';
                $data=Logica::PA_UPLA("[Academico].[pacon_rptcaphor]","array_duro",$cod);        
                
                $titulo_x=array
                (
                    $_POST['fac_x']." - ".$_POST['car_x']." - ".$_POST['esp_x'],
                    $_POST['sed_x']." - ".$_POST['mod_x']." - ".$_POST['niv_x'],
                    date("d/m/Y")
                );
                $datos_xtitulo=array
                (
                    "N",
                    "Nivel",
                    "Sección",
                    "Local",
                    "Aula",
                    "Día",
                    "Hora Inicio",
                    "Hora Fin",
                    "código Asig",
                    "Asignatura",
                    "Capacidad",
                    "Inscritos",
                    "Matriculados",
                    "Observación"
                );

                $datos_x=array
                (                     
                    "n",
                    "nivel",
                    "sec_saltem",
                    "local",
                    "aula",
                    "c_dia_descrip",
                    "ini",
                    "fin",
                    "cod_cur",
                    "asi_asignatura",
                    "cant_matri",
                    "ocupado",
                    "matri",
                    "obs"
                );


                generar_excel($data,$titulo_x,$datos_xtitulo,$datos_x,'CapacidadxSeccionHorarios');
                exit;
            break; 

            case 'excel_rptcalummatri':
                               

                $cod='<horario><capsec><car>'.$_POST['car'].'</car><esp>'.$_POST['esp'].'</esp><mod>'.$_POST['mod'].'</mod><sed>'.$_POST['sed'].'</sed><nivel>'.$_POST['niv'].'</nivel></capsec></horario>';
                $data=Logica::PA_UPLA("[Academico].[pacon_rptcaphorxalumnos]","array_duro",$cod);        
                
                $titulo_x=array
                (
                    $_POST['fac_x']." - ".$_POST['car_x']." - ".$_POST['esp_x'],
                    $_POST['sed_x']." - ".$_POST['mod_x']." - ".$_POST['niv_x'],
                    date("d/m/Y")
                );
                $datos_xtitulo=array
                (
                    "Código",
                    "Alumno",
                    "Plan",
                    "Carrera",
                    "Nivel-F",
                    "Sección-F",
                    "Créd-T",
                    "Cod-Curso",
                    "N-Asig",
                    "Sec-Asig",
                    "Resolución"                    
                );

                $datos_x=array
                (                     
                    "CODA",
                    "NOMBRE",
                    "PLANEst",
                    "ESP",
                    "NivelMat",
                    "SeccionMat",
                    "CreditosMat",
                    "CodigoCurso",
                    "NivelCurso",
                    "SeccionCurso",
                    "RESOL"
                );

                generar_excel($data,$titulo_x,$datos_xtitulo,$datos_x,'AlumnosMatriculados');
                exit;
            break; 

            case 'excel_segacc':
                               

                $cod='<dato><fecini>'.$_POST['fecini'].'</fecini><fecfin>'.$_POST['fecfin'].'</fecfin></dato>';
                $data=Logica::PA_UPLA("[Financiero].[SeguroDeAccidentes_excSegPac]","array_duro",$cod,false,"SGA");        
                
                $titulo_x=array
                (
                    "INSCRIPCIÓN ESTUDIANTES - SEGURO DE ACCIDENTES PERSONALES",
                    "COMPAÑIA DE SEGUROS PACÍFICO",
                    date("d/m/Y")
                );
                $datos_x=array
                (
                    "N",
                    "CODIGO",
                    "APELLIDOS Y NOMBRES",
                    "DNI",
                    "F.NAC",
                    "SEDE"
                );

                generar_excel($data,$titulo_x,$datos_x,$datos_x,'listado_para_SegPacificos');
                exit;
            break;
            case 'excel_segesttodos':                                 

                $cod='<dato><fecini>'.$_POST['fecini'].'</fecini><fecfin>'.$_POST['fecfin'].'</fecfin></dato>';
                $data=Logica::PA_UPLA("[Financiero].[SeguroDeAccidentes]","array_duro",$cod,false,"SGA");        
                
                $titulo_x=array
                (
                    "LISTADO DE ALUMNOS QUE PAGARON POR",
                    "CONCEPTO DE SEGUROS",
                    date("d/m/Y")
                );
                $datos_x=array
                (                     
                    "Codigo",
                    "Dni",
                    "Apellidos y Nombres",
                    "Carrera",
                    "FechaNac",
                    "FechaOper",
                    "Importe",
                    "Cuenta",
                    "SEDE"
                );

                generar_excel($data,$titulo_x,$datos_x,$datos_x,'Listado_Alumnos_Pagaron_Seguro');        
                exit;
            break;
            case 'excel_regdochis':
               
                $cod='<Dato>
                <fini>'.$_POST['fini'].'</fini>
                <ffin>'.$_POST['ffin'].'</ffin>
                <dep>'.$_POST['dep'].'</dep>
                <est>'.$_POST['est'].'</est>
                <cad>'.$_POST['cad'].'</cad>
                </Dato>';
                $data=Logica::PA_UPLA("[reghisdoc].[paCon_busrpt_dochis]","array_duro",$cod,FALSE,"dbTramDoc_SITD");
                
                $titulo_x=array
                (
                    "LISTADO HISTORICO DE DOCUMENTOS",
                    "OFICINA DE RECTORADO",
                    date("d/m/Y")
                );
                $datos_xtitulo=array
                (                     
                    "N°",
                    "Expediente",
                    "Documento",
                    "Num.",
                    "Fecha",
                    "Pasa a",
                    "Asunto",
                    "Estado",
                    "Num.",
                    "Referencia"
                );

                $datos_x=array
                (                     
                    "n",
                    "cod_expe",
                    "des_tip_doc",
                    "numdoc",
                    "fech_imp",
                    "des_Dependencia",
                    "asunto",
                    "nom_est",
                    "num_est",
                    "ref"
                );

                generar_excel($data,$titulo_x,$datos_xtitulo,$datos_x,'Listado_DOCRECTORADO');        
                exit;
            break;

        }    
    }

    require_once('Configuracion/request.php');

    //mapa de navegación ###################################################################################################################

    route('/', "GET", function($params) 
    {
        
      $home_doc = array
      (
        "Logeo" => BASE_URL.$_SERVER["REQUEST_URI"]."sesion",
        "Página de Inicio" => BASE_URL.$_SERVER["REQUEST_URI"]."inicio"
      );
      serve_json($home_doc, JSON_PRETTY_PRINT);  
    });

    // página de inicio ###################################################################################################################

    route('/inicio', "GET", function($params)
    {
        $cad_adi='$("#datos-perfil").hide();$("#contfper").hide();$("#cambiar-portada").hide();';
        if($_SESSION["dni"]=="12345678")
            $cad_adi.='$("#agregar-novedad").show();';//por mientras
        else
            $cad_adi.='$("#agregar-novedad").hide();';//por mientras

        if(isset($_GET["filtro"]))
        {
            if($_GET["filtro"]=="mimuro")
            {
                $cad_adi='$("#agregar-novedad").hide();$("#izquierda").css("top","70");$("#nombre_pek").hide();';
                if($_GET["dequien"]!=$_SESSION["dni"])
                    $cad_adi.='$("#cambiar-portada").hide();';
            }
        }

        if(isset($_GET["adv"]))
        {
            if($_GET["adv"]=='sinpermiso')
            $cad_adi.=' notificacion(1,"¡Advertencia!","Usted vuelve a la página de inicio por no tener permiso para ingresar a ese Sistema, para saber el ¿por qué? comunicarse:Of. Informática tel.211443 RPC.964256160 de 8-1pm y 3-6pm");';  
        }
	
	if(!isset($_SESSION["noticia"]))
        {            
            $_SESSION["noticia"]=1;
        }
        else 
        {
            $cad_adi.=' $("#contenedor-anuncio").hide();$("#fondo_sombra_anuncio").hide();';   
        }

        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();

        echo "<html>";
        echo "<head>";                   
        
        //set_meta_refresh("Refresh","120","inicio"); 
        set_title("Intranet - Portal Principal");
        set_link("menu.php");        
        //set_link("inicio_principal.php"); 
        set_link("dragable-content.js");
        set_link("pagini.css"); 
        set_link("menu.js");
        set_link("general.php");     
        set_link("funciones_paginicio.js");                                  
        //..................................
        //set_link_ext("//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css","css");
        set_link("bootstrapmin.css");
        //set_link("css/style.css");
        //set_link("css/fileupload.css");        

        set_link_ext("//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js","js");
        //set_link_ext("//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js","js");
        //set_link_ext("//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js","js");

        set_link("js/vendor/widget.js");
        set_link("js/iframe-transport.js");
        set_link("js/fileupload.js");
        set_link("js/fileupload-process.js");
        set_link("js/fileupload-image.js");
        set_link("js/fileupload-audio.js");
        set_link("js/fileupload-audio.js");
        set_link("js/fileupload-video.js");
        set_link("js/fileupload-validate.js");        

        //..................................

        script('$(document).ready(function()
        {            
            /*minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");*/
            initdragableElements();//para mover el banner
            $("#video-nove").hide();
            $("#video-nove-muro").hide();  
            $("#previsu").hide();    
            $("#prevideo").hide(); 
            $("#previsu-nove").hide();    
            $("#prevideo-nove").hide(); 
            $("#progress_bar").hide();
            $("#dentroimagen").css("top","-30px");              
            '.$cad_adi.'});');//si necesita insertar un script    
        echo "</head>";
        echo "<body>";  
        echo "<div id='cargando' style='display:none;'></div>";
        //include_template("cabecera.php");          
        include_template("menu.php");        
        include_template("pagina_inicio.php");    
        //include_template("pie.php");
        echo "</body>";
        echo "</html>";
    
    });

    route("/cargar-muro","GET",function($params)
    {   
        $cod='<Dato><arriba>'.$_GET['arriba'].'</arriba><desde>'.$_GET['desde'].'</desde><filtro>'.$_GET["filtro"].'</filtro><dequien>'.$_GET["dequien"].'</dequien><usuario>'.$_SESSION['dni'].'</usuario></Dato>';        
        $datos=Logica::PA_UPLA("[seguridad].[paCon_publicacion]","array",$cod);    
        $solouno=true;
        $inicio=0;
        $fin=0;

        $cad='';

            foreach ($datos as $array):            
                
                $titulo=utf8_encode($array[1]);
                $foto_autor=$array[13];
                $autor=$array[10].' '.$array[11].' '.$array[12];
                //$imagen_muro="imagen$i.jpg";

                
                $texto=utf8_encode($array[2]);
                $dependencia=$array[14];

                $i=$array[0];
                if($solouno)
                {
                    $inicio=$i;
                    $solouno=false;
                }
                if($_GET['arriba']=='0') //sólo cuando vas hacia abajo se actualiza el indice
                    $fin=$i;

                $perfil_editor=set_imagenLazy_r_fuera($foto_autor,"id=foto_autor_muro_".$i." style=width:33px;height:30px;");                

                $imagen_o_video=$array[3];
                $imagen_muro="";
                $ruta_video="";

                switch ($imagen_o_video) 
                {
                    case 'img':
                        $imagen_muro=$array[4];
                        break;

                    case 'vid':
                        $ruta_video=$array[4];
                        break;
                }
                $imagen_publicacion=set_imagenLazy_r_fuera($imagen_muro,"id=imagengenerada_".$i);

                $cad.='<div class="submuro" id="muro_'.$i.'"><div class="subtitulos" style="background:'.$dependencia.';">'.$titulo.'</div><div class="duenio">'.$perfil_editor.'<p onclick=location.href="inicio?filtro=mimuro&dequien='.$array[7].'" style="cursor: pointer;">'.utf8_encode($autor).' | '.$array[8].'</p></div><div class="murito"><hr class="rayagrande"><div class="imamuro"><div style="cursor: pointer;" id=capa_imagen_muro_'.$i.'>'.$imagen_publicacion.'</div>';
                $cad.='<iframe width="100%" height="300" id="prevideo_muro_'.$i.'" src="" frameborder="0" allowfullscreen></iframe><p id="resumen_muro_'.$i.'">';
                $cad.= (strlen($texto)>300)?substr($texto, 0,300).'<a href="#" id="seguirleyendo_muro_'.$i.'">... Seguir leyendo</a>':$texto;
                $cad.='</p><script>$("#seguirleyendo_muro_'.$i.'").click(function(event){event.preventDefault();$("#resumen_muro_'.$i.'").empty();$("#resumen_muro_'.$i.'").append("$texto");});$("#imagengenerada_'.$i.'").lazyload({effect:"fadeIn",placeholder:"Capa_Presentacion/Recursos/img_cargando.gif",threshold:100}); $(function(){switch("'.$imagen_o_video.'"){case "img": $("#prevideo_muro_'.$i.'").hide();break;case "vid": $("#capa_imagen_muro_'.$i.'").hide();$("#prevideo_muro_'.$i.'").attr("src",convertir("'.$ruta_video.'"));break;}});$("#foto_autor_muro_'.$i.'").lazyload({effect:"fadeIn",placeholder:"Capa_Presentacion/Recursos/img_cargando.gif",threshold:100});</script></div></div></div><script type="text/javascript">$("#ultimapublicacion").val("'.$fin.'");$("#capa_imagen_muro_'.$i.'").click(function(event){verimagen("'.$imagen_muro.'","'.$dependencia.'","'.$titulo.'","'.$foto_autor.'","'.$array[7].'","'.utf8_encode($autor).'","'.$array[8].'","'.$texto.'","'.'capa_imagen_muro_'.$i.'");});</script>';

            
            endforeach;

        echo $cad;        
    });

    route("/cargar-novedad","GET",function($params)
    {   
        /*$datos=Logica::PA_UPLA("[seguridad].[paCon_notificacion]","array","");  
        $i=1;
        foreach ($datos as $array_nove):            
            
            $cad='';
            $texto=utf8_encode($array_nove[1]);
            $titulo=utf8_encode($array_nove[0]);

            $imagen_o_video_nov=$array_nove[2];
            $nombre_img="";
            $nombre_video="";

            switch ($imagen_o_video_nov) 
            {
                case 'img':
                    $nombre_img=$array_nove[3];
                    break;

                case 'vid':
                    $nombre_video=$array_nove[3];
                    break;
            }

            $imagen_novedad=set_imagenLazy_r_fuera($nombre_img,"id=novedadgenerada_".$i);

            $cad.='<div class="titunove">'.$titulo.'</div><div><div><a href="#" id="capa_imagen_novedad_'.$i.'">'.$imagen_novedad.'</a><iframe width="100%" height="300" id="prevideo_novedad_'.$i.'" src="" frameborder="0" allowfullscreen></iframe></div><p id="resumen_nove_'.$i.'">'.substr($texto, 0,100).'<a href="" id="seguirleyendo_nove_'.$i.'">... Seguir leyendo</a></p><script type="text/javascript">$(function(){$("#seguirleyendo_nove_'.$i.'").click(function(event){event.preventDefault();$("#seguirleyendo_nove_'.$i.'").remove();$("#resumen_nove_'.$i.'").append("'.substr($texto, 100).'");});});$("#novedadgenerada_'.$i.'").lazyload({effect:"fadeIn",placeholder:"Capa_Presentacion/Recursos/img_cargando.gif",threshold:100});$(function(){switch("'.$imagen_o_video_nov.'"){case "img": $("#prevideo_novedad_'.$i.'").hide();break;case "vid": $("#capa_imagen_novedad_'.$i.'").hide();$("#prevideo_novedad_'.$i.'").attr("src",convertir("'.$nombre_video.'"));break;}});</script></div><hr class="rayapeque">';

            $i++;
        endforeach;

        echo $cad;*/
    });
    
    route("/subirarchivo-img-muro","POST",function($params)
    {   
        error_reporting(E_ALL | E_STRICT);
        require('Configuracion/Librerias/UploadHandler.php');
        $upload_handler = new UploadHandler();

    });

    route("/publicar-reg-muro","POST",function($params)
    {   
 
        $dato='<Dato>
        <titulo_muro>'.utf8_decode(limpiar_seguridad($_POST['titulo-muro'])).'</titulo_muro>
        <texto_intro>'.utf8_decode(limpiar_seguridad($_POST['cuerpo'])).'</texto_intro>
        <recurso_muro>'.utf8_decode(limpiar_seguridad($_POST['recurso-muro'])).'</recurso_muro>
        <ruta>'.utf8_decode($_POST['ruta']).'</ruta>
        <dependencia_publicar>'.utf8_decode(limpiar_seguridad($_POST['dependencia-publicar'])).'</dependencia_publicar>
        <donde_publicar_muro>'.utf8_decode(limpiar_seguridad($_POST['donde-publicar-muro'])).'</donde_publicar_muro>
        <usuario>'.$_SESSION['dni'].'</usuario>
        </Dato>';

        Logica::PA_UPLA("[seguridad].[paIns_publicacion]","json",$dato,true);

    });


    // páginas principales ###################################################################################################################

    route('/matricula',"GET",function($params)
    {
            
        if(seguridad_sesion($params[0],true))
        {
            /*  creacion del xml */
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
            if ($matriculado=='MATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRealizada');
            }
            elseif ($matriculado=='NOMATRICULADO')
            {
                //Código que se ejecutará si aún no se ha matriculado
                header('Location: matriculaRequisitos');
            }
            else
            {
                echo "Error en Matrícula";
            }
            
        }
    });

    route('/ampliarCreditos',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        

        
                conf_pre();
                echo "<html>";
                echo "<head>";
                //set_link("pie.css"); 
                set_link("cabecera.css");
                set_link("menu.php");
                set_link("menu_lateral.php");
                set_link("menu.js");        
                set_link("estilos_matricula.php");
                set_link("funciones_matricula.js");
                set_link("menu_lateral.js");
                set_link("general.php");
                set_link("tabla.php");
                set_title("Matrícula - Ampliación de Créditos");
                
                
                script('$( document ).ready(function(){$("#txt_estudiante").focus();
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();
                });');
                
                echo "</head>";
                echo "<body>";
                echo '<div id="popupbox_constancia"></div>';
                echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
                include_template("menu.php");
                set_aviso();
                set_cargando();
                include_template("menu_lateral.php");
                include_template("mod_MatriculaAmpliarCreditos.php");
                echo "</body>";
                echo "</html>";
            
        
        
    });

    
    route('/rpt-capsaloneshorarios',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        

        
        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css");         
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        set_link("funciones_rptcaphor.js");
        set_title("Reporte - Capacidad Horario");
        
        
        script('$( document ).ready(function(){
            //$("#txt_estudiante").focus();           
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("vercapacidadsalones.php");
        echo "</body>";
        echo "</html>";
            
        
        
    });
    
    route('/activarElectivos',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("funciones_activacionElectivos.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        set_title("Matrícula - Activación de Electivos");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_MatriculaActivarElectivos.php");
        echo "</body>";
        echo "</html>";
        
    });
        
    route('/matriculaRequisitos',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
        $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
        if ($matriculado=='MATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRealizada');
            }
        elseif ($matriculado=='NOMATRICULADO')
            {
                set_status_code(200);
                //seguridad_sesion($params[0]);        
        
        
                conf_pre();
                echo "<html>";
                echo "<head>";
                //set_link("pie.css"); 
                set_link("cabecera.css");
                set_link("menu.php");
                set_link("menu_lateral.php");
                set_link("menu.js");        
                set_link("estilos_matricula.php");
                set_link("funciones_matricula.js");
                set_link("menu_lateral.js");
                set_link("general.php");
                set_link("tabla.php");
                set_title("Matríula - Verificación de Requisitos de Matrícula");
                
                script('$( document ).ready(function(){$("#txt_estudiante").focus();
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();
                });');
                
                if(isset ($_GET['rectificacion']))
                {
                    script('notificacion(2,"Ahora puedes Recticar tu Matrícula","!Muy bien! Ahora puedes corregir tu selección asignaturas y horarios.");');
                }
                
                echo "</head>";
                echo "<body>";
                echo '<div id="popupbox_constancia"></div>';
                echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
                include_template("menu.php");
                set_aviso();
                set_cargando();
                include_template("menu_lateral.php");
                include_template("mod_MatriculaRequisitos.php");
                echo "</body>";
                echo "</html>";
            }
        }
        else{
            header('Location: salir');
        }
    });
    
    
    route('/matriculaRealizada',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
            if ($matriculado=='NOMATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRequisitos');
            }
            elseif ($matriculado=='MATRICULADO')
            {
                
                set_status_code(200);
                //seguridad_sesion($params[0]);        
        
        
                conf_pre();
                echo "<html>";
                echo "<head>";
                //set_link("pie.css"); 
                set_link("cabecera.css");
                set_link("menu.php");
                set_link("menu_lateral.php");
                set_link("menu.js");        
                set_link("estilos_matricula.php");
                set_link("funciones_matricula.js");
                set_link("menu_lateral.js");
                set_link("general.php");
                set_link("tabla.php");
                set_librerias("jquery.PrintArea.js");
                set_title("Matrícula Realizada");
                
                script('$( document ).ready(function(){
                    menu_lateral();
                    
                    $("#btnPrinter").bind("click",function()
                    {
                        $("#i_vistaHorario").printArea();
                    });
                    
                    $("#btnPrinterConstancia").bind("click",function()
                    {
                        $("#rptConstanciaMatricula").printArea();
                    });
                    
                });');
                
                echo "</head>";
                echo "<body>";
                echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
                if (isset($_GET['msj'])){
                    script('notificacion(2,"Matricula Registrada","¡Felicitaciones! Tu matrícula ha sido registrada correctamente. Si gustas ahora puedes imprimir tu Constancia de Matrícula.",10); ');
                }
                
                
                include_template("menu.php");
                set_aviso();
                set_cargando();
                include_template("menu_lateral.php");
                include_template("mod_MatriculaRealizada.php");
                echo "</body>";
                echo "</html>";
            }
        }
    });
    
    
    route('/matriculaActivarRectificacion',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("funciones_activacionElectivos.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        set_title("Matrícula - Activación de Electivos");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_MatriculaActivarRectificacion.php");
        echo "</body>";
        echo "</html>";

    });
    
    route('/ingresoConvalidacionTemporal',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("funciones_activacionElectivos.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        set_title("Matrícula - Activación de Electivos");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_IngresoConvalidacionTemporal.php");
        echo "</body>";
        echo "</html>";

    });
    
    
    route("/insertarConvalidacionTemporal","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $xml=   '<ConvalidacionTemp>
                        <est_id>'.$_POST["codEst"].'</est_id>
                        <usuario_id>'.$_SESSION['dni'].'</usuario_id>
                        <n_informe>'.$_POST["n_informe"].'</n_informe>';
                        
            $asignaturasEst=explode(",",$_POST['asignaturasEst']);
                                    
            for($i=0;$i<count($asignaturasEst);$i++) 
            {
                $xml=$xml.'<Asignatura><Asig>'.$asignaturasEst[$i].'</Asig></Asignatura>';
            }
            $xml=$xml.'</ConvalidacionTemp>';
                    
            Logica::PA_UPLA("[Academico].[paIns_ConvalidacionTemp]","json",$xml,true);
            
        
            //$file = fopen("conva.txt", "a");
            //fwrite($file, $xml . PHP_EOL);
            //fclose($file);
            
            
        }
    }); 
    
    route('/matriculaManual',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("funciones_activacionElectivos.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        set_title("Matrícula - Activación de Electivos");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_MatriculaManual.php");
        echo "</body>";
        echo "</html>";

    });
    
    route('/comprobarConvalidante',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml ='<Dato><usuario>'.$_SESSION['dni'].'</usuario><codEst>'.$_GET["codigo"].'</codEst></Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_ComprobarConvalidante]','json',$buscar_xml);    
        }
    }); 
    
    route('/matriculaManual_comprobarMatricula',"POST",function($params)
    {
            
        if(seguridad_sesion($params[0],true))
        {
            /*  creacion del xml */
            $cod ='<Dato>
                    <codEst>'.$_POST['codigo'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $datos=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","json",$cod,true);

            
        }
    });
    
    route('/comprobarAsignaturaConvalidar',"GET",function($params)
    {
            
        if(seguridad_sesion($params[0],true))
        {
            /*  creacion del xml */
            $cod ='<Dato>
                    <codEst>'.$_GET['codEst'].'</codEst>
                    <codAsig>'.$_GET['codAsign'].'</codAsig>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $datos=Logica::PA_UPLA("[Academico].[paCon_comprobarAsignaturaConvalidar]","json",$cod,false);

            
        }
    });
    
    route('/matriculaManualRequisitos',"POST",function($params)
    {
        
                set_status_code(200);
                //seguridad_sesion($params[0]);        
        
                conf_pre();
                echo "<html>";
                echo "<head>";
                //set_link("pie.css"); 
                set_link("cabecera.css");
                set_link("menu.php");
                set_link("menu_lateral.php");
                set_link("menu.js");        
                set_link("estilos_matricula.php");
                set_link("funciones_matricula.js");
                set_link("menu_lateral.js");
                set_link("general.php");
                set_link("tabla.php");
                set_title("Matríula - Verificación de Requisitos de Matrícula");
                
                script('$( document ).ready(function(){$("#txt_estudiante").focus();
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();
                });');
                
                echo "</head>";
                echo "<body>";
                echo '<div id="popupbox_constancia"></div>';
                echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
                include_template("menu.php");
                set_aviso();
                set_cargando();
                include_template("menu_lateral.php");
                include_template("mod_MatriculaManualRequisitos.php");
                echo "</body>";
                echo "</html>";

    });
    
    
    route('/requisitosMatriculaManual',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <codEst>'.$_POST['codEst'].'</codEst>
                        </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_RequisitosMatricula]','json',$buscar_xml);    
        }
        

    });
    
    route('/matriculaManualPlanEstudios',"POST",function($params)
    {
        
        seguridad_sesion($params[0]);        
        if(seguridad_sesion($params[0],true))
        {
            set_status_code(200);
            $req_verificado=$_POST['requisitos'];
            if ($req_verificado=="satisfactorio_cumplidos"){
                conf_pre();
                echo "<html>";
                echo "<head>";
                //set_link("pie.css"); 
                set_link("cabecera.css");
                set_link("menu.php");
                set_link("menu_lateral.php");
                set_link("menu.js");        
                set_link("estilos_matricula.php");
                set_link("funciones_matricula.js");
                set_link("menu_lateral.js");
                set_link("general.php");
                set_link("tabla.php");
                set_link("barraProgreso.php");
                set_title("Matríula - Selección de Asignaturas");
                set_librerias("jquery.PrintArea.js");
                script('$( document ).ready(function(){
                            menu_lateral();
                            $("#btnPrinter").bind("click",function()
                            {
                                $("#i_vistaHorario").printArea();
                            });
                        });');
                echo "</head>";
                echo "<body>";
                include_template("menu.php");
                set_aviso();
                set_cargando();
                include_template("menu_lateral.php");
                include_template("mod_MatriculaManualPlanEstudios.php");
                echo "</body>";
                echo "</html>";
            }
        }
        else
        {
            header('Location: salir');
        }
    });
    
    
    route('/ListarHorariosDisponibles_Manual',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml =  '<Datos>
                                <codEst>'.$_GET['codEst'].'</codEst>
                                <codAsign>'.$_GET['codAsign'].'</codAsign>
                            </Datos>';

            $datos=logica::PA_UPLA('[Academico].[paCon_horarios_temp]','json',$buscar_xml);    
        }
        
    }); 
    
    route("/SelecionarHorarioEstudiante_MatriculaManual","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $xml=   '<Datos>
			<codEst>'.$_POST['codEst'].'</codEst>
			<c_horario>'.$_POST['c_horario'].'</c_horario>
			<c_horarios_detalle>'.$_POST['c_horarios_detalle'].'</c_horarios_detalle>
			<agregar>'.$_POST['agregar'].'</agregar>
                    </Datos>';
            Logica::PA_UPLA("[Academico].[paIns_SelecionarHorarioEstudiante]","json",$xml,true);
            
            /*
            $file = fopen("horarios.txt", "a");
            fwrite($file, $xml . PHP_EOL);
            fclose($file);
            */
            
        }
    });  
    
    
    route('/consultaEstadoDeuda',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_ConsultaEstadoDeuda.php");
        echo "</body>";
        echo "</html>";
        
    });
    
   
    route('/consultaEstadoDeuda_Estudiante',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);        


        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");        
        set_link("estilos_matricula.php");
        set_link("funciones_matricula.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");
        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_ConsultaEstadoDeuda_Estudiante.php");
        echo "</body>";
        echo "</html>";
        
    });
   
    
    route('/consultarPensiones',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <xTipDI>12</xTipDI>
                            <xNumDI>'.$_GET['codEst'].'</xNumDI>
                        </Dato>';
                        
                   
            /*     
            $file = fopen("consultarPensiones.txt", "a");
            fwrite($file, $buscar_xml . PHP_EOL);
            fclose($file);
            */
                        
            $datos=logica::PA_UPLA('sga.dbo.pa_cuotas_total','json',$buscar_xml);
        }    
            
    });
    
    route('/consultarTasas',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <xTipDI>12</xTipDI>
                            <xNumDI>'.$_GET['codEst'].'</xNumDI>
                        </Dato>';
                        
                        

                        
            $datos=logica::PA_UPLA('sga.dbo.pa_tasasEd_total','json',$buscar_xml);
        }    
            
    });
    
    route('/consultarMatricula',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <xTipDI>12</xTipDI>
                            <xNumDI>'.$_GET['codEst'].'</xNumDI>
                        </Dato>';
                        
                        

                        
            $datos=logica::PA_UPLA('sga.dbo.pa_matricula_total','json',$buscar_xml);
        }    
            
    });
    
    route('/requisitosMatricula',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <codEst>'.$_SESSION['dni'].'</codEst>
                        </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_RequisitosMatricula]','json',$buscar_xml);    
        }
        

    });
    
    route('/consultarConstanciaMatricula',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='<Dato>
                            <codEst>'.$_SESSION['dni'].'</codEst>
                        </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_ConstMatr]','json',$buscar_xml);    
        }
        

    });
    
    route('/BusquedaEst_porCodigoApellido',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {

            
            $buscar_xml ='  <Dato>
                                <datoEst>'.$_POST['datoEst'].'</datoEst>
                            </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_BusquedaEst_porCodigoApellido]','json',$buscar_xml);    
        }
        

    });
    
    
    
    
    route("/SelecionarHorarioEstudiante","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $xml=   '<Datos>
			<codEst>'.$_SESSION['dni'].'</codEst>
			<c_horario>'.$_POST['c_horario'].'</c_horario>
			<c_horarios_detalle>'.$_POST['c_horarios_detalle'].'</c_horarios_detalle>
			<agregar>'.$_POST['agregar'].'</agregar>
                    </Datos>';
            Logica::PA_UPLA("[Academico].[paIns_SelecionarHorarioEstudiante]","json",$xml,true);
            
            /*
            $file = fopen("horarios.txt", "a");
            fwrite($file, $xml . PHP_EOL);
            fclose($file);
            */
            
        }
    });  
    
    route('/ListarAsignaturasElectivas',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml ='  <Datos>
                                <carr>'.$_GET['carr'].'</carr>
                                <esp>'.$_GET['esp'].'</esp>
                                <ciclo>'.$_GET['ciclo'].'</ciclo>
                                <sede>'.$_GET['sede'].'</sede>
                                <moda>'.$_GET['moda'].'</moda>
                                <planEst>'.$_GET['planEst'].'</planEst>
                            </Datos>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_ListarCursosPorCiclo_Electivos]','json',$buscar_xml);    
        }

    });
    
    route('/ListarHorariosDisponibles',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml =  '<Datos>
                                <codEst>'.$_SESSION['dni'].'</codEst>
                                <codAsign>'.$_GET['codAsign'].'</codAsign>
                            </Datos>';

            $datos=logica::PA_UPLA('[Academico].[paCon_horarios_temp]','json',$buscar_xml);    
        }
        
    }); 


    route('/planEstudiosPorCarrera',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml =  '<Datos>
                                <carr>'.$_GET['v_car'].'</carr>
                                <esp>'.$_GET['v_esp'].'</esp>
                            </Datos>';

            $datos=logica::PA_UPLA('[Academico].[paCon_ListarPlanEstudiosPorCarrera]','array',$buscar_xml);
            opciones_combo($datos,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
        
    }); 

    route('/ciclosConElectivos',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml =  '<Datos>
		  <carr>'.$_GET['v_car'].'</carr>
		  <esp>'.$_GET['v_esp'].'</esp>
		  <planEst>'.$_GET['b_plan'].'</planEst>
		</Datos>';
                            
                            	

            $datos=logica::PA_UPLA('[Academico].[paCon_ListarCiclosAsigElectivos]','array',$buscar_xml);
            opciones_combo($datos,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
        
    }); 

    
    route('/progresoEstudiante',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml ='<Dato><codEst>'.$_GET["codigo"].'</codEst></Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_ProgresoEstudiante]','json',$buscar_xml);    
        }
    }); 
    
    route('/ejecutarAmpliacionCreditos',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
          
        
            $buscar_xml ='<Dato>
                            <codEst>'.$_POST["v_codEst"].'</codEst>
                            <observ>'.$_POST["v_obs"].'</observ>
                            <n_cred>4</n_cred>
                            <usu>'.$_SESSION['dni'].'</usu>
                        </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paIns_AmpliarCreditos]','json',$buscar_xml,true);    
        }
    });
    
    route('/ejecutarRectificacionAdicional',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
          
        
            $buscar_xml ='<Dato>
                            <est_id>'.$_POST["v_codEst"].'</est_id>
                            <cod_usuario>'.$_SESSION['dni'].'</cod_usuario>
                            <observ>'.$_POST["v_obs"].'</observ>
                        </Dato>';
                        
            $datos=logica::PA_UPLA('[Academico].[paEli_HabilitarRectificacionAdicional]','json',$buscar_xml,true);    
        }
    });
    
    route('/ejecutarActivacionElectivas',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
          
            $asignaturas=isset($_POST['asignturas']) ? explode(",",$_POST['asignturas'] ): null ;
            
            
            $datos_xml ='<Datos>
                            <General>
                                <carr>'.$_POST["carr"].'</carr>
                                <esp>'.$_POST["esp"].'</esp>
                                <ciclo>'.$_POST["ciclo"].'</ciclo>
                                <sede>'.$_POST["sede"].'</sede>
                                <moda>'.$_POST["moda"].'</moda>
                                <planEst>'.$_POST["planEst"].'</planEst>
                                <usu>'.$_SESSION['dni'].'</usu>
                            </General>';
            for($i=0;$i<count($asignaturas);$i++) 
            {
                $datos_xml=$datos_xml.'
                <Asign>
                    <codigo>'.$asignaturas[$i].'</codigo>	 
                </Asign>';
            }
            
            $datos_xml=$datos_xml.'</Datos>';
            
            /*
            $file = fopen("prueba_matri.txt", "a");
            fwrite($file, $datos_xml . PHP_EOL);
            fclose($file);
            */
                     
            $datos=logica::PA_UPLA('[Academico].[paIns_ActivarElectivos]','json',$datos_xml,true);    
        }
    }); 
        
    route('/matriculaCompromisoHonor',"POST",function($params)
    {
        
        //seguridad_sesion($params[0]);        
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
            if ($matriculado=='MATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRequisitos');
            }
            elseif ($matriculado=='NOMATRICULADO')
            {
                
                set_status_code(200);
                $requisitos=$_POST['requisitos'];
        
                if ($requisitos=="satisfactorio_cumplidos"){
                    conf_pre();
                    echo "<html>";
                    echo "<head>";
                    //set_link("pie.css"); 
                    set_link("cabecera.css");
                    set_link("menu.php");
                    set_link("menu_lateral.php");
                    set_link("menu.js");        
                    set_link("estilos_matricula.php");
                    set_link("funciones_matricula.js");
                    set_link("menu_lateral.js");
                    set_link("general.php");
                    set_link("tabla.php");
                    set_title("Matríula - Compromiso de Honor");
                    
                    script('$( document ).ready(function(){$("#txt_estudiante").focus();
                        minimizar("capa1");
                        minimizar("capa2");
                        minimizar("capa3");
                        menu_lateral();
                    });');
                    
                    echo "</head>";
                    echo "<body>";
                    echo '<div id="popupbox_constancia"></div>';
                    echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
                    include_template("menu.php");
                    set_aviso();
                    set_cargando();
                    include_template("menu_lateral.php");
                    include_template("mod_MatriculaCompromisoHonor.php");
                    echo "</body>";
                    echo "</html>";
                }
                else{
                    header('Location: matriculaRequisitos');
                }
            }
        }
        else
        {
            header('Location: salir');
        }
    });
    
    route('/matriculaComprobante',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
            if ($matriculado=='MATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRequisitos');
            }
            elseif ($matriculado=='NOMATRICULADO')
            {
                set_status_code(200);
                //seguridad_sesion($params[0]);        
                
                $requisitos=$_POST['requisitos'];
                
                if ($requisitos=="satisfactorio_cumplidos"){
                    $datos_xml ='<Dato>
                                    <usu>'.$_SESSION['dni'].'</usu>
                                </Dato>';
                    logica::PA_UPLA('[Academico].paDel_limSalTemp','',$datos_xml);
            
                    conf_pre();
                    echo "<html>";
                    echo "<head>";
                    //set_link("pie.css"); 
                    set_link("cabecera.css");
                    set_link("menu.php");
                    set_link("menu_lateral.php");
                    set_link("menu.js");        
                    set_link("estilos_matricula.php");
                    set_link("funciones_matricula.js");
                    set_link("menu_lateral.js");
                    set_link("general.php");
                    set_link("tabla.php");
                    set_title("Matríula - Comprobante de Pago");
                    script('$( document ).ready(function(){$("#txt_estudiante").focus();
                        minimizar("capa1");
                        minimizar("capa2");
                        minimizar("capa3");
                        menu_lateral();
                    });');
                    
                    echo "</head>";
                    echo "<body>";
                        include_template("menu.php");
                        set_aviso();
                        set_cargando();
                        include_template("menu_lateral.php");
                        include_template("mod_MatriculaComprobante.php");
                    echo "</body>";
                    echo "</html>";
                }
                }
        }
        else
        {
            header('Location: salir');
        }
        
        
    });
    
    
    
    
    
    route('/datosEstudianteMatriculado',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml ='<Datos><codEst>'.$_SESSION['dni'].'</codEst></Datos>';
            
            
            $file = fopen("datos.txt", "a");
            fwrite($file, $buscar_xml. PHP_EOL);
            fclose($file);
            
                        
            $datos=logica::PA_UPLA('[Academico].[paCon_DatosEstudianteMatriculado]','json',$buscar_xml);    
        }
    }); 
    
    
    route('/constMatricula',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='matrprue';
            $codEst=isset($_POST['codEst']) ? $_POST['codEst'] : null ;
            $anio=isset($_POST['anio']) ? $_POST['anio'] : null ;
            $periodo=isset($_POST['periodo']) ? $_POST['periodo'] : null ;
            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $planEst=isset($_POST['planEst']) ? $_POST['planEst'] : null ;

            
            
            $parametros=array
            (
                array("est_id",$codEst),
                array("anio",$anio),
                array("periodo",$periodo),
                array("pes_id",$planEst),
                array("car_id",$carEst),
                array("esp_id",$espEst)
            );
            script('ocultarCargando();');
            set_reporte_jasper($nomarchivo,$parametros); 
        }
    });
        
        
    route('/matriculaPlanEstudios',"POST",function($params)
    {
        
        //seguridad_sesion($params[0]);        
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                    <codEst>'.$_SESSION['dni'].'</codEst>
                </Dato>';
            /* Comprobando si ya se ha matriculad */
            $matriculado=Logica::PA_UPLA("[Academico].[paCon_comprobarMatricula]","",$cod,true);
            if ($matriculado=='MATRICULADO')
            {
                //Código que se ejecutará si ya se ha matriculado
                header('Location: matriculaRequisitos');
            }
            elseif ($matriculado=='NOMATRICULADO')
            {
                
                set_status_code(200);
                $comprobante=$_POST['comprobante'];
                
                
                if ($comprobante=="comprobante_verficado"){
                    $datos_xml ='<Dato>
                                <usu>'.$_SESSION['dni'].'</usu>
                                </Dato>';
                    logica::PA_UPLA('[Academico].paDel_limSalTemp','',$datos_xml);
            
                    conf_pre();
                    echo "<html>";
                    echo "<head>";
                    //set_link("pie.css"); 
                    set_link("cabecera.css");
                    set_link("menu.php");
                    set_link("menu_lateral.php");
                    set_link("menu.js");        
                    set_link("estilos_matricula.php");
                    set_link("funciones_matricula.js");
                    set_link("menu_lateral.js");
                    set_link("general.php");
                    set_link("tabla.php");
                    set_link("barraProgreso.php");
                    set_title("Matríula - Selección de Asignaturas");
                    set_librerias("jquery.PrintArea.js");
                    script('$( document ).ready(function(){
                    menu_lateral();
                    
                    $("#btnPrinter").bind("click",function()
                    {
                        $("#i_vistaHorario").printArea();
                    });
                    
                });');
                    
                    echo "</head>";
                    echo "<body>";
                        include_template("menu.php");
                        set_aviso();
                        set_cargando();
                        include_template("menu_lateral.php");
                        include_template("mod_MatriculaPlanEstudios.php");
                    echo "</body>";
                    echo "</html>";
                }
                
            }
        }
        else
        {
            header('Location: salir');
        }
    });
    
    route('/Eli_RectificacionMatricula',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $datos_xml ='<Dato><alumno>'.$_SESSION['dni'].'</alumno></Dato>';
            
            $fp = fopen("rectif.txt","a");
            fwrite($fp,$datos_xml.PHP_EOL);
            fclose($fp);
            
            logica::PA_UPLA('[Academico].[paEli_rectificacionMatri]','json',$datos_xml,true);
        }
    });
    
    route('/horariosmatricula',"GET",function($params)
    {       

        set_status_code(200);
        seguridad_sesion($params[0]);
        conf_pre();
        echo "<html>";
        echo "<head>";   
        set_title("Configuración Horarios");  
        set_link("menu.php");
        set_link("general.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        set_link("funciones_horarios.js");
        set_link("tabla.php");
        set_link("estilo_horariosmatricula.php");
        set_librerias("jquery.PrintArea.js"); 

        //set_link("estilo_salones.php");
        
        script('$(document).ready(function()
        {
            menu_lateral();     
            $("#cmb_catsec_").hide();
            $("#txt_sec_x").attr("disabled","disabled");
            //$("#txt_lug_x").attr("disabled","disabled");
            //$("#txt_aul_x").attr("disabled","disabled");      

            $("#txt_sec_x").css("background","rgb(233, 233, 233)");
            //$("#txt_lug_x").css("background","rgb(233, 233, 233)");
            //$("#txt_aul_x").css("background","rgb(233, 233, 233)");   

            $("#btn_guardar_tb").attr("disabled","disabled");      
            $("#btn_guardar_tb").text("Continuar!");
            $("#btn_ranghoras_tb").attr("disabled","disabled");                    
            $("#btn_guardar_tb").hide();
            $("#btn_ranghoras_tb").hide();  
            $("#horas").draggable();
            $("#cursosper").draggable();
            $("#capacidades_ventana").draggable();
            $("#fild_horario").css("background-color","rgb(190, 190, 190)");   
            $("#field_filtrohorarios").css("background-color","rgb(255, 255, 255)");         
            $("#img_horario").show(); 
            $("#versalones").hide();

            $("#tb_horario_z").hide();
            $("#fild_horario").hide();

            //Ocultamos el menú al cargar la página
            $("#menu_horario").hide();

            array_horarios=[];
            array_celdas=[];
            array_rowspan_columnas=[]; 
            
            $("#fac_tmp").val("");
            $("#carr_tmp").val("");
            $("#esp_tmp").val("");
            $("#sed_tmp").val("");
            $("#mod_tmp").val("");
            $("#cic_tmp").val("");

            array_celdas_horario_curso=[];

            $("#btn_cambiar").hide();
            $("#cargando_cursos").hide();
            $("#tb_agregar_aux").hide();
            $("#btnPrinter").bind("click",function()
            {
                $("#fild_horario").printArea();
            });

            $("#btnPrinter").hide();
            edicion_o_nuevo="";
            codigo_edi=0; 
            codigos_cursos=[];    

            
        });');

        echo "</head>";
        echo "<body>";       
        echo "<div id='cargando'></div>";        
        include_template("menu.php");         
        include_template("menu_lateral.php");                
        include_template("horario.php");                                   
        echo "</body>";
        echo "</html>";

    });


    route('/cargaLectiva',"GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");    
        set_link("funciones_cargaLectiva.js");
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                       

                    busregistros();

                    $("#btn_act_doc").hide();
                    $("#btn_imp_doc").hide();
                    
                    $("#siperu_rec").prop("checked",true);                    
                    $("#sireg_rec").prop("checked",true);  

                    $("#cmb_insedu").prop("disabled", true);
                    $("#cmb_nomisedu").prop("disabled", true);     
                    $("#cmb_carr").prop("disabled", true);  

                    $("#registro_i").prop("disabled", true); 
                    $("#registro_i").val("Nuevo Registro"); 

                    //$("#fecegre_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});

                    });'); 

        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_cargaLectiva.php"); 
        echo "</body>";
        echo "</html>"; 
    });

     route('/buscarDocente',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $v_dni=isset($_GET['v_dni']) ? $_GET['v_dni'] : null ;    
            $buscar_xml='<datos><dni>'.limpiar_seguridad($v_dni).'</dni></datos>';
            $datos=logica::PA_UPLA('[Academico].[paCon_BuscarDocentes]','json',$buscar_xml);    
        }
        
    }); 
    
    
route('/controlAsisDocent',"GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");    
        set_link("funciones_cargaLectiva.js");
        set_link("funciones_logmarcaciones.js");
        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                       

                    $( "#i_fecha_log" ).datepicker();

                    });'); 

        echo "</head>";
        echo "<body>";
        echo '<div id="AsistenciaDocente"></div>';
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_controlDocentAsist.php"); 
        echo "</body>";
        echo "</html>"; 
    });


    route('/disponibilidadsalones',"GET",function($params)
    {       

        set_status_code(406);
        seguridad_sesion($params[0]);
        conf_pre();
        echo "<html>";
        echo "<head>";   
                       
        set_link("menu.php");
        set_link("general.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        //set_link("salones.js");
        
        script('$(document).ready(function()
        {            
           /* minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3"); */                      
            menu_lateral();                        

        });');
        echo "</head>";
        echo "<body>";       
        echo "<div id='cargando'></div>";                
        include_template("menu.php"); 
        set_aviso();   
        include_template("menu_lateral.php"); 
        //echo "<p>406</p>";               
        //echo "</br>";
        //echo "No se puede ofrecer la página solicitada con las características de contenido requeridas.</p>";
        //include_template("rpt_dispo_salones.php");                                   
        echo "</body>";
        echo "</html>";

    });

    route('/rptregistrohisdoc',"GET",function($params)
    {       

        set_status_code(200);
        seguridad_sesion($params[0]);
        conf_pre();
        echo "<html>";
        echo "<head>";   
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-rptregdochis.js");
        
        script('$(document).ready(function()
        {            
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");                       
            menu_lateral();    
            $("#f_ini_doc").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                
            $("#f_fin_doc").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                                    

        });');
        echo "</head>";
        echo "<body>";       
        echo "<div id='cargando'></div>";                
        include_template("menu.php"); 
        set_aviso();   
        include_template("menu_lateral.php");                
        include_template("rpt_reghisdoc.php");                                   
        echo "</body>";
        echo "</html>";

    });
    
    route('/temas',"GET",function($params)
    {
        set_status_code(200);
        seguridad_sesion($params[0]);
        
        conf_pre();
        echo "<html>";
        echo "<head>";
        //set_link("pie.css"); 
        set_link("cabecera.css");
        set_link("menu.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("estilos_temas.php");
        set_link("funciones_matricula.js");
        set_link("menu_lateral.js");
        set_link("general.php");
        set_link("tabla.php");        
        
        script('$( document ).ready(function(){$("#txt_estudiante").focus();
            minimizar("capa1");
            minimizar("capa2");
            minimizar("capa3");
            menu_lateral();
        });');
        
        echo "</head>";
        echo "<body>";
        
        echo '<div id="popupbox_constancia"></div>';
        echo '<a href="javascript:mostrar_popupAsignaturas()"><div id="popupbox_minimizado">Asignaturas Matriculables</div></a>';
        include_template("menu.php");
        set_aviso();
        set_cargando();
        include_template("menu_lateral.php");
        include_template("mod_Temas.php");

        echo "</body>";
        echo "</html>";
    });
    
    
    route('/grilla_Alumnos',"GET",function($params)
    {
        seguridad_sesion($params[0],true);
        conf_pre();
        echo "<html>";
        echo "<head>";        
        set_link("tabla.php");
        script('$( document ).ready(function(){
               $("#buscar").focus();
               $("#buscar").val($("#txt_estudiante").val());
               //$("#txt_estudiante").val("");
               });');
        echo "</head>";
        echo "<body>";
        include_popup("grilla_Alumnos.php");        
        echo "</body>";
        echo "</html>";
        
    });

    route("/inicio-academico","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        

        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
                
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    });'
                ); 
        echo "</head>";
        echo "<body>";        
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("inicio-academico.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    
    route("/inicio-financiero","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
                
        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("inicio-financiero.php"); 
        echo "</body>";
        echo "</html>"; 
    });    

    route("/inicio-gradosytitulos","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        

        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
                
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    });'
                ); 
        echo "</head>";
        echo "<body>";        
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("inicio-gradosytitulos.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/inicio-almacen","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        

        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
                
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    });'
                ); 
        echo "</head>";
        echo "<body>";        
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("inicio-almacen.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/tramitesga","GET,POST",function($params)
    {
        $rpta='Módulo para dar atención a un trámite o Requerimiento.';
        if(isset($_POST['n_cod_tra']))
        {            
            $cod='<dat_grabado><selec>
                <DNI>'.limpiar_seguridad($_SESSION['dni']).'</DNI>
                <Numdi>'.utf8_encode($_POST['n_cod_tra']).'</Numdi>
                <TipoId>'.utf8_encode($_POST['cmb_tramite_']).'</TipoId>
                <Referencia>'.utf8_encode($_POST['i_refe']).'</Referencia>
                <periodo>'.utf8_encode($_POST['cmb_perianio_']).'-'.utf8_encode($_POST['cmb_peri_']).'</periodo>
            </selec></dat_grabado>';
            $rpta=Logica::PA_UPLA("[sga].[PaIns_Tramite]","",$cod,true,"SGA").' | '.utf8_encode($_POST['n_cod_tra']);             
        }
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();               

        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");   
        set_link("funciones_tramite.js");     
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    if("'.$rpta.'"=="Módulo para dar atención a un trámite o Requerimiento.")                    
                        aviso_bien("'.$rpta.'");
                    else
                        aviso_adv("'.$rpta.'");

                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("tramite.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/psegurossga","GET",function($params)
    {        
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();               

        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones_regsegurossga.js");     
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();      
                    $("#f_ini_b").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                
                    $("#f_fin_b").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("pagosseguros.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    

    route("/obsAcad","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
	    seguridad_sesion($params[0]);
        conf_pre();               

        set_link("menu.php");
        set_link("general.php");        
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");   
        set_link("funciones_ampliacioncred.js");     
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                      
                    });'
                );
        
        echo "</head>";
        echo "<body>";
        echo '<div id="popupbox_constancia"></div>';
        echo "<div id='cargando'></div>";
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_obsAcad.php"); 
        echo "</body>";
        echo "</html>"; 
    });
    

    
//para asignar horarios a los docentes segun los salones
    route("/horarios","GET",function($params)
    {
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();         
        
        set_link("menu.php");//para traer el menu principal
        set_link("general.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        set_link("estilo_horarios.css");
        set_link("tabla.php"); //para crear las tablas dinamicamente
        set_link("funciones_hor.js");

        script('$( document ).ready(function(){
                minimizar("capa1");
                minimizar("capa2");
                minimizar("capa3");
                menu_lateral(); 
                });'
            ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        echo '<a href="javascript:popup_horarios_agregar();mostrar()"><div id="popupbox_minimizado">Agregar Horario</div></a>';   
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_horarios.php");            
        echo "</body>";
        echo "</html>";
    });

    route("/marcaciones","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");
        set_link("funciones_justificar.js");
        set_link("estilo_just.php");
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $( "#i_fecha_jus" ).datepicker();                   
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
        include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_justifi.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/logmarcaciones","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones_logmarcaciones.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $( "#i_fecha_log" ).datepicker();
                    $( "#i_fecha_log_2" ).datepicker();
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("mod_logmarcaciones.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/regdocumentos","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        //set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-regdocumento.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();                    
                    
                    $("#fecimp_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#btn_agregarEst").prop("checked",true);                    
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("registrodoc.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    
    route("/verifDocenteHuella","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        //set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-regdocumento.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();
                    $("#btn_eli_doc").hide();
                    
                    $("#fecimp_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#btn_agregarEst").prop("checked",true);                    
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("verifDocenteHuella.php"); 
        echo "</body>";
        echo "</html>"; 
    });
    
    route("/ingresarDocenteHuella","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        //set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-regdocumento.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();
                    $("#btn_eli_doc").hide();
                    
                    $("#fecimp_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#btn_agregarEst").prop("checked",true);                    
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("ingresarDocenteHuella.php"); 
        echo "</body>";
        echo "</html>"; 
    });
    
    route("/regpergra","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones_regsunat.js");
     
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                       

                    busregistros();

                    $("#btn_act_doc").hide();
                    $("#btn_imp_doc").hide();
                    
                    $("#siperu_rec").prop("checked",true);                    
                    $("#sireg_rec").prop("checked",true);  

                    $("#cmb_insedu").prop("disabled", true);
                    $("#cmb_nomisedu").prop("disabled", true);     
                    $("#cmb_carr").prop("disabled", true);  

                    $("#registro_i").prop("disabled", true); 
                    $("#registro_i").val("Nuevo Registro"); 

                    //$("#fecegre_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});

                    });'); 

        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("per_reg.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/inicio-controlBiometrico","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $( "#i_fecha_jus" ).datepicker();                   
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("controlBiometrico.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/inicio-encuestas","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                       
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            //include_template("fseco.php"); 
            include_template("inicio-encuestas.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/inicio-sitd","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                       
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("inicio-sistramite.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/enviados","GET",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones_enviados.js"); 
        set_link("estilo_just.php");   

        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();                    
                    
                    $("#f_ini_").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#f_fin_").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    //$("#btn_agregarEst").prop("checked",true);  
                    buscar_enviados();                  
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("bandeja_enviados.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/recibidos","GET,POST",function($params)
    {        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones_recibidos.js"); 
        set_link("estilo_just.php");   

        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();                    
                    
                    $("#f_ini_").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#f_fin_").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    //$("#btn_agregarEst").prop("checked",true);  
                    //buscar_recibidos();                  
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("bandeja_recibidos.php"); 
        echo "</body>";
        echo "</html>"; 
    });


    route("/regtramite-adm","POST,GET",function($params)
    {     
        if(seguridad_sesion($params[0],true))
        {   
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        //seguridad_sesion($params[0]);
        conf_pre();       

        set_link("menu.php");
        set_link("general.php");
        //set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-regtramite.js");        
        

        $cad_dis="";
        $resuelto="";
        if($_POST['accion']=='3' || $_POST['accion']=='6')
        {
              $cad_dis='$("#exp_cod").attr("disabled", "disabled");
                    $("#mod_tra").attr("disabled", "disabled");
                    $("#jus_tra").attr("disabled", "disabled");
                    $("#jus_tra").css( "background-color", "rgb(221, 221, 221)");
                    $("#jus_tra").css( "width", "342PX");
                    $("#jus_tra").css( "height", "81px");
                    $("#est_tra").attr("disabled", "disabled");
                    $("#obs_tra").attr("disabled", "disabled");                    
                    $("#obs_tra").css( "background-color", "rgb(221, 221, 221)");
                    $("#obs_tra").css( "width", "342PX");
                    $("#obs_tra").css( "height", "81px");
                    $("#add_tra").attr("disabled", "disabled");
                    $("#btn_SUBIR").hide();';  

                $resuelto=',"si"';
        }
        else if($_SESSION['dni']=="41085476")
        {
              $cad_dis='$("#exp_cod").attr("disabled", "disabled");
                    $("#mod_tra").attr("disabled", "disabled");
                    $("#jus_tra").attr("disabled", "disabled");
                    $("#jus_tra").css( "background-color", "rgb(221, 221, 221)");
                    $("#jus_tra").css( "width", "342PX");
                    $("#jus_tra").css( "height", "81px");';
        }
        else
        {
            $cad_dis='$("#est_tra").attr("disabled", "disabled");
                    $("#obs_tra").attr("disabled", "disabled");                    
                    $("#obs_tra").css( "background-color", "rgb(221, 221, 221)");
                    $("#obs_tra").css( "width", "342PX");
                    $("#obs_tra").css( "height", "81px");';            
        }

        $cad="";
        
        if(isset($_POST["codigo"]))
        {            
            //cargar datos
            $cad.='$("#codigo").val("'.$_POST['codigo'].'");';
            $cad.='$("#cod_alum2").val("'.$_POST['cod_alum2'].'");';
            $cad.='$("#codmod").val("'.$_POST['codmod'].'");';
            $cad.='$("#justi").val("'.$_POST['justi'].'");';
            $cad.='$("#accion").val("'.$_POST['accion'].'");';
            $cad.='$("#remi").val("'.$_POST['remi'].'");';
            $cad.='$("#obs").val("'.$_POST['obs'].'");';

            $cad.='$("#exp_tra").val("'.$_POST['codigo'].'");';
            $cad.='$("#exp_cod").val("'.$_POST['cod_alum2'].'");';
            //$cad.='$("#modtra_i").val("'.$_POST['modi'].'");';
            $cad.='$("#mod_tra").val("'.$_POST['codmod'].'");';            
            $cad.='$("#jus_tra").val("'.str_replace("*", '\"', $_POST['justi']).'");';
            $cad.='$("#est_tra").val("'.$_POST['accion'].'");';   
            $cad.='$("#remi_tra").val("'.$_POST['remi'].'");';                 
            $cad.='$("#obs_tra").val("'.str_replace("*", '\"', $_POST['obs']).'");';
            
            //referencias
            $cod='<dato><cod>'.$_POST['codigo'].'</cod></dato>';
            $datos=Logica::PA_UPLA("[General].[paCon_arcadj]","array",$cod); 
            
            $cadena_codigos=" ";
            $tmp_filas_eliminadas=isset($_POST["tmp_filas_eliminadas"])?$_POST["tmp_filas_eliminadas"]:"";
            foreach ($datos as $array):            
                if(!strpos((" ".$tmp_filas_eliminadas),$array[1]))
                {
                    $cad.='array=[];';
                    $cad.='array[0]="'.$array[2].'";';
                    $cad.='array[1]="'.$array[1].'";';
                    $cad.='array[3]="'.$array[0].'";';
                    if($array[3] != $_SESSION['dni'])
                    {
                        $cad.='array[2]="BLOQUEADO";';
                    }
                    else                
                    {
                        $cad.='array[2]="DESBLOQUEADO";';
                    }
                    $cadena_codigos.=$array[1]." ";
                    $cad.='tabla_add_sedmodfac(array,"filas_tra","cant_filas_tra"'.$resuelto.');';
                }
            endforeach;
            
            
            //actualizar
            if(isset($_POST["env"]))
            {
                $cod='<dato><cod>'.$_POST['env'].'</cod></dato>';
                Logica::PA_UPLA("[General].[paAct_vistoRec]","",$cod);     
            }
            
                $cadW='';

                  
                //echo $_POST['obs_tra'];
                //$cadW.='$("#est_tra").val("'.$_POST['est_tra'].'");';
                //$cadW.='$("#obs_tra").val("'..'");';
                //$cadW.='$("#jus_tra").val("'..'");';
                //echo $cadena_codigos;
                //echo "<br>";
                $cant_filas_tra=isset($_POST["cant_filas_tra"])?$_POST["cant_filas_tra"]:"0";

                for($i=1;$i<=$cant_filas_tra;$i++)
                {
                    //cad+=$("#codarc_"+i).val()+"/"+$("#archivo_"+i).val()+",";

                    //echo $_POST["codarc_".$i];
                    if(isset($_POST["archivo_".$i]) && !strpos($cadena_codigos, $_POST["codarc_".$i]))
                    {
                        $cadW.='array_=[];';
                        $cadW.='array_[0]="'.$_POST["archivo_".$i].'";';
                        $cadW.='array_[1]="'.$_POST["codarc_".$i].'";';
                        $cadW.='tabla_add_sedmodfac(array_,"filas_tra","cant_filas_tra");';
                    }
                }
               
                if($tmp_filas_eliminadas!=" ")
                {
                    $cadW.='$("#tmp_filas_eliminadas").val("'.$tmp_filas_eliminadas.'");';
                }

                $obs_tra_=isset($_POST["obs_tra"])?$_POST["obs_tra"]:"";

                if($obs_tra_!="")
                {
                    $cadW.='$("#obs_tra").val("'.$obs_tra_.'");';
                }

                $est_tra_=isset($_POST["est_tra"])?$_POST["est_tra"]:"";

                if($est_tra_!="")
                {
                    $cadW.='$("#est_tra").val("'.$est_tra_.'");';
                }

                $exp_cod_=isset($_POST["exp_cod"])?$_POST["exp_cod"]:"";

                if($exp_cod_!="")
                {
                    $cadW.='$("#exp_cod").val("'.$exp_cod_.'");';
                }

                $mod_tra_=isset($_POST["mod_tra"])?$_POST["mod_tra"]:"";                

                if($mod_tra_!="")
                {
                    $cadW.='$("#mod_tra").val("'.$mod_tra_.'");';
                }

                $jus_tra_=isset($_POST["jus_tra"])?$_POST["jus_tra"]:"";                

                if($jus_tra_!="")
                {
                    $cadW.='$("#jus_tra").val("'.$jus_tra_.'");';
                }


                //$cadW.='$("#est_tra").val("'.$_POST['est_tra'].'");';
                //

                $add_tra_=isset($_FILES['add_tra']['name'])?$_FILES['add_tra']['name']:"";      

                if($add_tra_!='')
                {   

                // CARPETA PARA GUARDAR EL ARCHIVO //
                $carpeta_donde_se_guardara_el_archivo = "archivos/";
                // PREFIJO CON EL QUE SE GURDARA EL ARCHIVO //
                $prefijo_para_guardar_archivo = "UPLOADS";

                //==================== GENERAMOS UN NOMBRE ====================//
                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                $cad_1 = "";
                for($i=0;$i<18;$i++) {
                $cad_1 .= substr($str,rand(0,36),1); 
                }
                //============= FIN DE LA GENERACION DEL NOMBRE ===============//

                $nombre_del_archivo = $_FILES['add_tra']['name'];
                $ruta_de_archivo = $_FILES['add_tra']['tmp_name'];
                //$peso_del_archivo = $_POST['archivo']['size'];

                // CON ESTA FUNCION SAACAMOS Y CONVERTIMOS EL PESO DEL ARCHIVO SUBIDO //
                function tamano_archivo($peso , $decimales = 2 ) {
                $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
                return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
                }                

                // OBTENEMOS LA EXTENCION DEL ARCHIVO //
                $obtener_extencion = $nombre_del_archivo; 
                $verificar_extencion = explode(".", $obtener_extencion); 
                $extension = end($verificar_extencion);
                
                // UBICAMOS EL DESTINO DONDE SE GUARDARA Y CON QUE NOMBRE LO HARA //
                $destino =  $carpeta_donde_se_guardara_el_archivo.$prefijo_para_guardar_archivo.'_'.$cad_1.'.'.$extension;


                 $tam_archivo=isset($_FILES['add_tra']['size'])?$_FILES['add_tra']['size']:10485761;

                if($tam_archivo<=10485760)
                {                              
                    $subidos_=isset($_SESSION["subido_anterior-adm"])?$_SESSION["subido_anterior-adm"]:"";
              
                    if($subidos_!=($_FILES['add_tra']['name'].'___-___'.$_FILES['add_tra']['size']))
                    {
                        move_uploaded_file($ruta_de_archivo,$destino); 
                        $_SESSION["subido_anterior-adm"]=$_FILES['add_tra']['name'].'___-___'.$_FILES['add_tra']['size'];

                        if($_FILES['add_tra']['name'] != '')
                        {
                            $cadW.='array=[];';
                            $cadW.='array[0]="'.$nombre_del_archivo.'";';
                            $cadW.='array[1]="'.$prefijo_para_guardar_archivo.'_'.$cad_1.'.'.$extension.'";';
                            $cadW.='tabla_add_sedmodfac(array,"filas_tra","cant_filas_tra");';
                        }
                    }
                }
                else
                {
                    $cadW.='alerta("No se cargo porque el archivo pesa mas de 10 MB.");';
                }
            }
        }
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral(); '.$cad_dis.' '.$cad.' '.$cadW.'});'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("registrotramite-adm.php"); 
        echo "</body>";
        echo "</html>"; 
    }
    });

    route("/regtramite","GET,POST",function($params)
    {        
         
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        $cadW='';

        if($_POST)
        {            
            // CARPETA PARA GUARDAR EL ARCHIVO //
            $carpeta_donde_se_guardara_el_archivo = "archivos/";
            // PREFIJO CON EL QUE SE GURDARA EL ARCHIVO //
            $prefijo_para_guardar_archivo = "UPLOADS";

            //==================== GENERAMOS UN NOMBRE ====================//
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $cad = "";
            for($i=0;$i<18;$i++) {
            $cad .= substr($str,rand(0,36),1); 
            }
            //============= FIN DE LA GENERACION DEL NOMBRE ===============//

            $nombre_del_archivo = $_FILES['add_tra']['name'];
            $ruta_de_archivo = $_FILES['add_tra']['tmp_name'];
            //$peso_del_archivo = $_POST['archivo']['size'];

            // CON ESTA FUNCION SAACAMOS Y CONVERTIMOS EL PESO DEL ARCHIVO SUBIDO //
            function tamano_archivo($peso , $decimales = 2 ) {
            $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
            return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
            }
            
            
            $cadW.='$("#exp_cod").val("'.$_POST['exp_cod'].'");';
            $cadW.='$("#mod_tra").val("'.$_POST['mod_tra'].'");';
            $cadW.='$("#jus_tra").val("'.$_POST['jus_tra'].'");';
            
            for($i=1;$i<=$_POST["cant_filas_tra"];$i++)
            {
                //cad+=$("#codarc_"+i).val()+"/"+$("#archivo_"+i).val()+",";
                if(isset($_POST["archivo_".$i]))
                {
                    $cadW.='array_=[];';
                    $cadW.='array_[0]="'.$_POST["archivo_".$i].'";';
                    $cadW.='array_[1]="'.$_POST["codarc_".$i].'";';
                    $cadW.='tabla_add_sedmodfac(array_,"filas_tra","cant_filas_tra");';
                }
            }


            // OBTENEMOS LA EXTENCION DEL ARCHIVO //
            $obtener_extencion = $nombre_del_archivo; 
            $verificar_extencion = explode(".", $obtener_extencion); 
            $extension = end($verificar_extencion);
            
            // UBICAMOS EL DESTINO DONDE SE GUARDARA Y CON QUE NOMBRE LO HARA //
            $destino =  $carpeta_donde_se_guardara_el_archivo.$prefijo_para_guardar_archivo.'_'.$cad.'.'.$extension;
            //move_uploaded_file($ruta_de_archivo,$destino); 
            
            $tam_archivo=isset($_FILES['add_tra']['size'])?$_FILES['add_tra']['size']:10485761;

            if($tam_archivo<=10485760)
            {                
          
                $subidos_=isset($_SESSION["subido_anterior"])?$_SESSION["subido_anterior"]:"";
          
                if($subidos_!=($_FILES['add_tra']['name'].'___-___'.$_FILES['add_tra']['size']))
                {
                    move_uploaded_file($ruta_de_archivo,$destino); 
                    $_SESSION["subido_anterior"]=$_FILES['add_tra']['name'].'___-___'.$_FILES['add_tra']['size'];

                    if($_FILES['add_tra']['name'] != '')
                    {
                        $cadW.='array=[];';
                        $cadW.='array[0]="'.$nombre_del_archivo.'";';
                        $cadW.='array[1]="'.$prefijo_para_guardar_archivo.'_'.$cad.'.'.$extension.'";';
                        $cadW.='tabla_add_sedmodfac(array,"filas_tra","cant_filas_tra");';
                    }
                }
            }
            else
            {
                $cadW.='alerta("No se cargo porque el archivo pesa mas de 10 MB.");';
            }

              
            
            //echo 'la ruta: '.$ruta_de_archivo;
        }
        
        
        set_link("menu.php");
        set_link("general.php");
        //set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");        
        set_link("funciones-regtramite.js");        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    $("#btn_act_doc").hide();                    
                    '.$cadW.'});'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("registrotramite.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/eliminararchivo","POST",function($params)
    {   
        $cod='<Datos><cod_item>'.$_POST['cod_item'].'</cod_item></Datos>';
        $rpta=Logica::PA_UPLA("[General].[paEli_archivoadj]","",$cod,true);    

        //if($rpta=='1')
            unlink('archivos/'.$_POST["file"]);
            
        echo $rpta;        
    });

    route("/subirarchivo","POST",function($params)
    {       
        //if(seguridad_sesion($params[0],true))
        //{ 

            // CARPETA PARA GUARDAR EL ARCHIVO //
            $carpeta_donde_se_guardara_el_archivo = "Archivos/";
            // PREFIJO CON EL QUE SE GURDARA EL ARCHIVO //
            $prefijo_para_guardar_archivo = "UPLOADS";

                //==================== GENERAMOS UN NOMBRE ====================//
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $cad = "";
            for($i=0;$i<18;$i++) {
            $cad .= substr($str,rand(0,36),1); 
            }
          //============= FIN DE LA GENERACION DEL NOMBRE ===============//
          
          $nombre_del_archivo = $_FILES['add_tra']['name'];
          $ruta_de_archivo = $_FILES['add_tra']['tmp_name'];
          //$peso_del_archivo = $_POST['archivo']['size'];
          
          // CON ESTA FUNCION SAACAMOS Y CONVERTIMOS EL PESO DEL ARCHIVO SUBIDO //
          function tamano_archivo($peso , $decimales = 2 ) {
          $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
          return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
          }

              // OBTENEMOS LA EXTENCION DEL ARCHIVO //
            $obtener_extencion = $nombre_del_archivo; 
            $verificar_extencion = explode(".", $obtener_extencion); 
            $extension = end($verificar_extencion);
            
            // UBICAMOS EL DESTINO DONDE SE GUARDARA Y CON QUE NOMBRE LO HARA //
            $destino =  $carpeta_donde_se_guardara_el_archivo.$prefijo_para_guardar_archivo.'_'.$cad.'.'.$extension;
            move_uploaded_file($ruta_de_archivo,$destino);
            
            // MOSTRAMOS QUE EL ARCHIVO SE HA SUBIDO CORRECTAMENTE //
            //echo '<b>Tu archivo se ha subido correctamente!</b><br>';
            echo $nombre_del_archivo.' - '.$ruta_de_archivo;
        //}
    });

     route("/regtraitem","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<Datos>
            <cod_mod>'.$_POST['cod_mod'].'</cod_mod>
            <cod_accion>'.$_POST['cod_accion'].'</cod_accion>
            <remite>'.$_SESSION['dni'].'</remite>
            <destinatario>'.'41085476'.'</destinatario>
            <alumno>'.limpiar_seguridad(utf8_decode($_POST['alumno'])).'</alumno>
            <razon>'.limpiar_seguridad(utf8_decode($_POST['razon'])).'</razon>
            <obs>'.limpiar_seguridad(utf8_decode($_POST['obs'])).'</obs>';
                      

            //$cod.="<asu>".limpiar_seguridad(str_replace("?",'"',utf8_decode($_POST['asu'])))."</asu>";

            $array_x=explode(",",$_POST['archivos']);
            for($i=0;$i<sizeof($array_x)-1;$i++)
            {
                $array_x_m=explode("/",$array_x[$i]);
                $cod.='<archivos>
                <cod_arc>'.limpiar_seguridad(utf8_decode($array_x_m[0])).'</cod_arc>
                <nombre>'.limpiar_seguridad(utf8_decode($array_x_m[1])).'</nombre>
                </archivos>';
            }

            
            $cod.='</Datos>';
            
            Logica::PA_UPLA("[General].[paIns_regtramite]","json",$cod,true);
                
                        
        }
    }); 

    route("/regtraitem-act","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<Datos>
            <cod_item>'.$_POST['cod_item'].'</cod_item>
            <cod_accion>'.$_POST['cod_accion'].'</cod_accion>
            <inf_adi>'.limpiar_seguridad(utf8_decode($_POST['inf_adi'])).'</inf_adi>
            <remitente>'.$_SESSION['dni'].'</remitente>
            <destinatario>'.$_POST['destinatario'].'</destinatario>
            <cod_mod>'.$_POST['cod_modi'].'</cod_mod>
            <alumno>'.limpiar_seguridad(utf8_decode($_POST['cod_alumno'])).'</alumno>
            <razon>'.limpiar_seguridad(utf8_decode($_POST['jus'])).'</razon>';

            $array_x=explode("-",$_POST['eliminados']);
            for($i=0;$i<sizeof($array_x);$i++)
            {
                
                $cod.='<arch_eli>
                <cod>'.limpiar_seguridad(utf8_decode($array_x[$i])).'</cod>                
                </arch_eli>';
            }

            $array_x=explode(",",$_POST['archivos']);
            for($i=0;$i<sizeof($array_x)-1;$i++)
            {
                $array_x_m=explode("/",$array_x[$i]);
                $cod.='<arch_ag>
                <cod_arc>'.limpiar_seguridad(utf8_decode($array_x_m[0])).'</cod_arc>
                <nombre>'.limpiar_seguridad(utf8_decode($array_x_m[1])).'</nombre>
                </arch_ag>';
            }

            
            $cod.='</Datos>';

            Logica::PA_UPLA("[General].[paAct_regtramite]","json",$cod,true);
                        
        }
    }); 



    route("/buscarEnviados","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<dato>
            <dni>'.limpiar_seguridad($_SESSION['dni']).'</dni>
            <est_id>'.limpiar_seguridad($_GET['est_id']).'</est_id>
            <recp>'.limpiar_seguridad($_GET['recp']).'</recp>
            <f_ini>'.limpiar_seguridad($_GET['f_ini']).'</f_ini>
            <f_fin>'.limpiar_seguridad($_GET['f_fin']).'</f_fin>
            <moda>'.limpiar_seguridad($_GET['moda']).'</moda>
            <est>'.limpiar_seguridad($_GET['est']).'</est>
            </dato>';

            Logica::PA_UPLA("[General].[paCon_enviados]","json",$cod);        
        }
    });
    
    
    route("/buscarEnviados","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<dato>
            <dni>'.limpiar_seguridad($_SESSION['dni']).'</dni>
            <est_id>'.limpiar_seguridad($_GET['est_id']).'</est_id>
            <recp>'.limpiar_seguridad($_GET['recp']).'</recp>
            <f_ini>'.limpiar_seguridad($_GET['f_ini']).'</f_ini>
            <f_fin>'.limpiar_seguridad($_GET['f_fin']).'</f_fin>
            <moda>'.limpiar_seguridad($_GET['moda']).'</moda>
            <est>'.limpiar_seguridad($_GET['est']).'</est>
            </dato>';

            Logica::PA_UPLA("[General].[paCon_enviados]","json",$cod);        
        }
    });
    
    route("/verificarComprobantePago","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<Dato>
                    <codEst>'.limpiar_seguridad($_SESSION['dni']).'</codEst>
                    <comprobante>'.limpiar_seguridad($_POST['comprobante']).'</comprobante>
                </Dato>';
            
            Logica::PA_UPLA("[Academico].[paCon_verificarComprobantePago]","json",$cod,true);        
        }
    });

    route("/buscarRecibidos","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<dato>
            <dni>'.limpiar_seguridad($_SESSION['dni']).'</dni>
            <est_id>'.limpiar_seguridad($_GET['est_id']).'</est_id>
            <recp>'.limpiar_seguridad($_GET['recp']).'</recp>
            <f_ini>'.limpiar_seguridad($_GET['f_ini']).'</f_ini>
            <f_fin>'.limpiar_seguridad($_GET['f_fin']).'</f_fin>
            <moda>'.limpiar_seguridad($_GET['moda']).'</moda>
            <est>'.limpiar_seguridad($_GET['est']).'</est>
            </dato>';

            Logica::PA_UPLA("[General].[paCon_recibidos]","json",$cod);        
        }
    });



    /*route("/fseco","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
        set_link("screen.css");        
        set_link("style.css");   
        set_link("funciones_fseco.js");   
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                                         
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("fseco.php"); 
        echo "</body>";
        echo "</html>"; 
    });*/

    route("/rptFSECOestadistica","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
                
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
        
        set_link("screen.css");        
        set_link("style.css");   
        
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();   
                    reporte();                                      
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("rpt-estadisticaFSECO.php"); 
        echo "</body>";
        echo "</html>"; 
    });
/*
    route("/fseco-adm","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
        set_link("screen.css");        
        set_link("style.css");   
        set_link("funciones_fseco.js");   
        
        script('$( document ).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();                                         
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("fseco-adm.php"); 
        echo "</body>";
        echo "</html>"; 
    });
*/
   
    route('/CargaLectivaTemas',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $carga=isset($_GET['cargaLec']) ? $_GET['cargaLec'] : null ;    
            //$carga='21423306';
            $buscar_xml='<Docente><CargaLectiva>'.limpiar_seguridad($carga).'</CargaLectiva></Docente>';
            $datos=logica::PA_UPLA('[Academico].[paCon_ListarTemas]','json',$buscar_xml);    
        }
        
    });
    
    route('/consultarHuella',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $v_dni=isset($_GET['v_dni']) ? $_GET['v_dni'] : null ;    
            $buscar_xml='<datos><dni>'.limpiar_seguridad($v_dni).'</dni></datos>';
            $datos=logica::PA_UPLA('[Academico].[paCon_DocentesConMarca]','json',$buscar_xml);    
        }
        
    });    

    route('/InsertarTemas',"POST",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $arreglos_id_horario=isset($_POST['arreglos_id_horario']) ? $_POST['arreglos_id_horario'] : null ;
            $arreglos_temas=isset($_POST['arreglos_temas']) ? $_POST['arreglos_temas'] : null ;
            $xml='<Temas_CargaLectiva>';
            
            for($i =0; $i<sizeof($arreglos_id_horario); $i++){
                $xml=$xml.'<Tema><cod_hor>'.$arreglos_id_horario[$i].'</cod_hor><desc_tem>'.utf8_decode($arreglos_temas[$i]).'</desc_tem></Tema>';
            }
            
            $xml=$xml.'</Temas_CargaLectiva>';
            
            
            $file = fopen("prueba_temas.txt", "a");
            fwrite($file, $xml . PHP_EOL);
            fclose($file);
            
            
            $datos=logica::PA_UPLA('[Academico].[paIns_Temas]','json',$xml);    
        }
        
    });
    
    //para eliminar los horarios en teoria
    route("/deshabHorario","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Dato>
                <sed_id>'.$_POST['sed_id'].'</sed_id>
                <mac_id>'.$_POST['mac_id'].'</mac_id>
                <car_id>'.$_POST['car_id'].'</car_id>
                <nta_nivel>'.$_POST['nta_nivel'].'</nta_nivel>
                <nta_seccion>'.$_POST['nta_seccion'].'</nta_seccion>
                <asi_id>'.$_POST['asi_id'].'</asi_id>
                <n_dia_cod>'.$_POST['n_dia_cod'].'</n_dia_cod>
                <n_hor_dia>'.$_POST['n_hor_dia'].'</n_hor_dia>
                <bandera>'.$_POST['estado_hora'].'</bandera>
            </Dato>';

            Logica::PA_UPLA("[academico].[PA_HabDeshabHorario]","json",$cod,true);
        }
            
    });

    //para registrar los horarios
    route("/regHorario","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Dato>
                <sed_id>'.$_POST['sed_id'].'</sed_id>
                <mac_id>'.($_POST['mac_id']).'</mac_id>
                <car_id>'.$_POST['car_id'].'</car_id>                
                <nta_nivel>'.$_POST['nta_nivel'].'</nta_nivel>
                <nta_seccion>'.$_POST['nta_seccion'].'</nta_seccion>                
                <asi_id>'.$_POST['asi_id'].'</asi_id>
                <n_dia_cod>'.$_POST['n_dia_cod'].'</n_dia_cod>
                <d_hor_ini_hora>'.$_POST['d_hor_ini_hora'].'</d_hor_ini_hora>
                <d_hor_fin_hora>'.$_POST['d_hor_fin_hora'].'</d_hor_fin_hora>
                <n_hor_dia>'.$_POST['n_hor_dia'].'</n_hor_dia>
                <c_local>'.$_POST['c_local'].'</c_local>
            </Dato>';

            Logica::PA_UPLA("[academico].[PA_InsertaHorario]","json",$cod,true);                    
        }

    });//fin registrar horario
    
    
    route("/insertDocConHuella","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod='<datos>
                    <dni>'.$_POST['v_dni'].'</dni>
                    <foto>'.$_POST['v_foto'].'</foto>
                    <sede>'.$_POST['v_sede'].'</sede>
                    <modalidad>'.$_POST['v_modalidad'].'</modalidad>
                    <facultad>'.$_POST['v_facultad'].'</facultad>
                </datos>';

            Logica::PA_UPLA("[Academico].[paIns_DocentesConHuella]","json",$cod,true);                    
        }

    });

    ///actualizar horario
    route("/editarHorario","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
        
            $cod='<Dato>
                <n_hor_codigo>'.$_POST['n_hor_codigo'].'</n_hor_codigo>
                <n_dia_cod>'.$_POST['n_dia_cod'].'</n_dia_cod>
                <d_hor_ini_hora>'.$_POST['d_hor_ini_hora'].'</d_hor_ini_hora>
                <d_hor_fin_hora>'.$_POST['d_hor_fin_hora'].'</d_hor_fin_hora>
            </Dato>';

        }    Logica::PA_UPLA("[Academico].[PA_ActualizarHorario]","json",$cod,true);                    
    });

    ///fin actualizar horario

    route("/delHorario","POST",function($params)
     {
        if(seguridad_sesion($params[0],true))
        {

            $codHorario='
                        <Horario>
                        <codigo>'.limpiar_seguridad($_POST['codHorario']).'</codigo>
                        </Horario>';
            Logica::PA_UPLA("[Academico].[paDel_horario]","json",$codHorario,true); 
        }

     }   
        );
    route("/horarioCurxSal", "GET", function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {

            $data=Logica::PA_UPLA('[Academico].[paLis_CurxSal]','array',"<Dato><cod>".limpiar_seguridad($_GET['cod'])."</cod><doc>".limpiar_seguridad($_GET['doc'])."</doc><carrera>".limpiar_seguridad($_GET['carr'])."</carrera><ciclo>".limpiar_seguridad($_GET['cic'])."</ciclo><sede>".limpiar_seguridad($_GET['sede'])."</sede><moda>".limpiar_seguridad($_GET['moda'])."</moda></Dato>");        
            echo opciones_combo($data,'id','detalle');
        }
        else
        {
            echo 'salir';
        }
    });

    route("/horarioDocxSal", "GET", function($params)
    {      
        if(seguridad_sesion($params[0],true))
        {

            $data=Logica::PA_UPLA('[Academico].[paLis_docentes_rpc]','array',
            '<Dato>
                <sede>'.$_GET['sede'].'</sede>
                <modalidad>'.$_GET['moda'].'</modalidad>
                <carrera>'.$_GET['carr'].'</carrera>           
                <ciclo>'.$_GET['ciclo'].'</ciclo>
            </Dato>');        

            opciones_combo($data,'id','detalle');
        }
        else
        {
            echo 'salir';
        }
    });
    route("/horario_salones", "GET", function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $buscar_xml=
            '<Dato>            
                <idSede>'.$_GET['idSede'].'</idSede>
                <idModalidad>'.$_GET['idModalidad'].'</idModalidad>
                <idCarrera>'.$_GET['idCarrera'].'</idCarrera>
                <nivel>'.$_GET['nivel'].'</nivel>            
                <seccion>'.$_GET['seccion'].'</seccion>
            </Dato>';
            $datos=logica::PA_UPLA('[Academico].paLis_horarios_salon','json',$buscar_xml);
        }
    });
    route('/buscarEstudiantes',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {

            $buscar=isset($_GET['busqueda']) ? $_GET['busqueda'] : null ;
            $buscar_xml='<Estudiantes><buscar>'.limpiar_seguridad($buscar).'</buscar></Estudiantes>';
            $datos=logica::PA_UPLA('[Academico].paCon_BusquedaEstudiante','json',$buscar_xml);              
        }
    });
    
 
    route('/asignMatriculables',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $planEst=isset($_GET['planEst']) ? $_GET['planEst'] : null ;
            $codigoEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            
            $datos_xml='<Asignaturas><carrera>'.limpiar_seguridad($carEst).'</carrera><especialidad>'.limpiar_seguridad($espEst).'</especialidad><planEstudios>'.limpiar_seguridad($planEst).'</planEstudios><codigoEst>'.limpiar_seguridad($codigoEst).'</codigoEst></Asignaturas>';        
            $datos=logica::PA_UPLA('[Academico].paCon_BusquedaCurMatricular','json',$datos_xml);
        }
    });
    
    route('/asignMatriculables_convalidados',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $planEst=isset($_GET['planEst']) ? $_GET['planEst'] : null ;
            $codigoEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            
            $datos_xml='<Asignaturas><carrera>'.limpiar_seguridad($carEst).'</carrera><especialidad>'.limpiar_seguridad($espEst).'</especialidad><planEstudios>'.limpiar_seguridad($planEst).'</planEstudios><codigoEst>'.limpiar_seguridad($codigoEst).'</codigoEst></Asignaturas>';        
            $datos=logica::PA_UPLA('[Academico].paCon_BusquedaCurMatricular_convalidacion','json',$datos_xml);
        }
    });  
    
    route('/asignMatriculables_rectificacion',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $planEst=isset($_GET['planEst']) ? $_GET['planEst'] : null ;
            $codigoEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            
            $datos_xml='<Asignaturas><carrera>'.limpiar_seguridad($carEst).'</carrera><especialidad>'.limpiar_seguridad($espEst).'</especialidad><planEstudios>'.limpiar_seguridad($planEst).'</planEstudios><codigoEst>'.limpiar_seguridad($codigoEst).'</codigoEst></Asignaturas>';        
            $datos=logica::PA_UPLA('[Academico].paCon_BusquedaCurMatricular_rectificacion','json',$datos_xml);
        }
    });
    

    
    route('/asignYaMatriculadas',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $codigoEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            
            $datos_xml='
            <Estudiante>
		<codigo>'.$codigoEst.'</codigo>
            </Estudiante>';
            
            $datos=logica::PA_UPLA('[Academico].paCon_CursosMatriculados','json',$datos_xml);
        }
    });  
    
    
    route('/grilla_asignMatriculables',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            conf_pre();
            echo "<html>";
            echo "<head>";        
            set_link("tabla.php");
            echo "</head>";
            echo "<body>";
            echo "</body>";
            echo "</html>";        
        }
    });

    route('/comprobarMatricula',"GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {

            $codEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            $datos_xml='<Estudiante><pago_matricula>'.limpiar_seguridad($codEst).'</pago_matricula></Estudiante>';
            $datos=logica::PA_UPLA('[Academico].paCon_PagoMatricula','json',$datos_xml);              

        }

    });
    
    route('/listarCreditos',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $datos_xml='<Estudiante><Carrera>'.limpiar_seguridad($carEst).'</Carrera><Especialidad>'.limpiar_seguridad($espEst).'</Especialidad></Estudiante>';
            $datos=logica::PA_UPLA('[Academico].paCon_PlanEstudiosCredito','json',$datos_xml);              
        }
    });
    
    route('/consultAmpĺiaCred',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            
            $codEst=isset($_GET['codEst']) ? $_GET['codEst'] : null ;
            
            
            $datos_xml='
            <datos>
		<cod_alumno>'.$codEst.'</cod_alumno>
            </datos>
            ';
            $datos=logica::PA_UPLA('[Academico].[paCon_ConsultAmpliaCred] ','json',$datos_xml,true);              
        }
    });
    
    
    
    
    route('/rpt_AsistenciaDocente',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='rpt_asistenciaDocenteDiaria';
            
            
            $local=isset($_POST['local']) ? $_POST['local'] : null ;
            $fecha_marcado=isset($_POST['fechamarcado']) ? $_POST['fechamarcado'] : null ;

            $parametros=array
            (
                array("local",$local),
                array("fecha_marcado",$fecha_marcado)
            );
            script('ocultarCargando();');
            set_reporte_jasper($nomarchivo,$parametros);
            
        }
    });
    

    route('/rptObsAcad',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='observacionesAcademicas';
            
            
            $tipoObs = isset($_POST['tipoObs']) ? $_POST['tipoObs'] : null ;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : null ;
            $periodo= isset($_POST['periodo']) ? $_POST['periodo'] : null ;
            $fac = isset($_POST['fac']) ? $_POST['fac'] : null ;
            $car = isset($_POST['car']) ? $_POST['car'] : null ;
            $esp = isset($_POST['esp']) ? $_POST['esp '] : null ;
            

            
            $parametros=array
            (
                
                array("tipo_obs",$tipoObs),
                array("anio",$anio),
                array("periodo",$periodo),
                array("fac",$fac),
                array("car",$car),
                array("esp",$esp)

            );
            script('ocultarCargando();');
            set_reporte_jasper($nomarchivo,$parametros);
            
        }
    });
    
    route('/ejecutarMatricula',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $usu=$_SESSION['dni'];       
            
            $codEst=isset($_POST['codEst']) ? $_POST['codEst'] : null ;
            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $planEst=isset($_POST['planEst']) ? $_POST['planEst'] : null ;
            $nivelMatr=isset($_POST['nivelMatr']) ? $_POST['nivelMatr'] : null ;
            $totalCred=isset($_POST['totalCred']) ? $_POST['totalCred'] : null ;
            $totalCursos=isset($_POST['totalCursos']) ? $_POST['totalCursos'] : null ;

            $asignaturasEst=isset($_POST['asignaturasEst']) ? explode(",",$_POST['asignaturasEst'] ): null ;
            $turnosEst=isset($_POST['turnosEst']) ? explode(",",$_POST['turnosEst'] ): null ;
            $curSal=isset($_POST['curSal']) ? explode(",",$_POST['curSal']) : null ;
            $nivelEst=isset($_POST['nivelEst']) ? explode(",",$_POST['nivelEst']) : null ;
            $creditEst=isset($_POST['creditEst']) ?explode( ",",$_POST['creditEst']) : null ;
            
            $datos_xml ='        
            <Matricular>
            <Encargado>
            <usu>'.$usu.'</usu>
            <motivo>Matricula presencial</motivo>
            </Encargado>
            <Estudiante>
            <est_id>'.$codEst.'</est_id>
            <car_id>'.$carEst.'</car_id>
            <esp_id>'.$espEst.'</esp_id>
            <pes_id>'.$planEst.'</pes_id>    
            <nivelMatri>'.$nivelMatr.'</nivelMatri>
            <totalCred>'.$totalCred.'</totalCred>
            <totalCur>'.$totalCursos.'</totalCur>
            </Estudiante>
            <Asignaturas>';
                
                
            /*
            $file = fopen("prueba_matri.txt", "a");
            fwrite($file, $datos_xml . PHP_EOL);
            fclose($file);
            */
            
            logica::PA_UPLA('[Academico].PA_Ins_MatriNormal','json',$datos_xml,true);  
        }
    });
    
    route('/ejecutarMatricula_Convalidacion',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $usu=$_SESSION['dni'];       
            
            $codEst=isset($_POST['codEst']) ? $_POST['codEst'] : null ;
            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $planEst=isset($_POST['planEst']) ? $_POST['planEst'] : null ;
            $nivelMatr=isset($_POST['nivelMatr']) ? $_POST['nivelMatr'] : null ;
            $totalCred=isset($_POST['totalCred']) ? $_POST['totalCred'] : null ;
            $totalCursos=isset($_POST['totalCursos']) ? $_POST['totalCursos'] : null ;

            $asignaturasEst=isset($_POST['asignaturasEst']) ? explode(",",$_POST['asignaturasEst'] ): null ;
            $turnosEst=isset($_POST['turnosEst']) ? explode(",",$_POST['turnosEst'] ): null ;
            $curSal=isset($_POST['curSal']) ? explode(",",$_POST['curSal']) : null ;
            $nivelEst=isset($_POST['nivelEst']) ? explode(",",$_POST['nivelEst']) : null ;
            $creditEst=isset($_POST['creditEst']) ?explode( ",",$_POST['creditEst']) : null ;
            
            $datos_xml ='        
            <Matricular>
            <Encargado>
            <usu>'.$usu.'</usu>
            <motivo>Matricula presencial</motivo>
            </Encargado>
            <Estudiante>
            <est_id>'.$codEst.'</est_id>
            <car_id>'.$carEst.'</car_id>
            <esp_id>'.$espEst.'</esp_id>
            <pes_id>'.$planEst.'</pes_id>    
            <nivelMatri>'.$nivelMatr.'</nivelMatri>
            <totalCred>'.$totalCred.'</totalCred>
            <totalCur>'.$totalCursos.'</totalCur>
            </Estudiante>
            <Asignaturas>';
                
                
            for($i=0;$i<count($asignaturasEst);$i++) 
            {
                $datos_xml=$datos_xml.'
                <Asig>
                <asi_id>'.$asignaturasEst[$i].'</asi_id>
                <cod_cursal>'.$curSal[$i].'</cod_cursal>
                <asi_nivel>'.$nivelEst[$i].'</asi_nivel>
                <asi_credito>'.$creditEst[$i].'</asi_credito>	 
                </Asig>';
                
                /*
                $datos_xml=$datos_xml.'
                <Asig>
                <asi_id>'.$asignaturasEst[$i].'</asi_id>
                <turno>'.$turnosEst[$i].'</turno>
                <cod_cursal>'.$curSal.'</cod_cursal>
                <asi_nivel>'.$nivelEst[$i].'</asi_nivel>
                <asi_credito>'.$creditEst[$i].'</asi_credito>	 
                </Asig>';
                */
    	   }
            $datos_xml=$datos_xml.'</Asignaturas></Matricular>';
            
            /*$file = fopen("prueba_matri.txt", "a");
            fwrite($file, $datos_xml . PHP_EOL);
            fclose($file);*/
            
            
            logica::PA_UPLA('[Academico].PA_Ins_MatriConvalidacion','json',$datos_xml,true);  
        }
    });
    
    route('/rectificarMatricula',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $usu=$_SESSION['dni'];       
            
            $codEst=isset($_POST['codEst']) ? $_POST['codEst'] : null ;
            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $planEst=isset($_POST['planEst']) ? $_POST['planEst'] : null ;
            $nivelMatr=isset($_POST['nivelMatr']) ? $_POST['nivelMatr'] : null ;
            $totalCred=isset($_POST['totalCred']) ? $_POST['totalCred'] : null ;
            $totalCursos=isset($_POST['totalCursos']) ? $_POST['totalCursos'] : null ;

            $asignaturasEst=isset($_POST['asignaturasEst']) ? explode(",",$_POST['asignaturasEst'] ): null ;
            $turnosEst=isset($_POST['turnosEst']) ? explode(",",$_POST['turnosEst'] ): null ;
            $curSal=isset($_POST['curSal']) ? explode(",",$_POST['curSal']) : null ;
            $nivelEst=isset($_POST['nivelEst']) ? explode(",",$_POST['nivelEst']) : null ;
            $creditEst=isset($_POST['creditEst']) ?explode( ",",$_POST['creditEst']) : null ;
            
            $datos_xml ='        
            <Matricular>
            <Encargado>
            <usu>'.$usu.'</usu>
            <motivo>Matricula presencial</motivo>
            </Encargado>
            <Estudiante>
            <est_id>'.$codEst.'</est_id>
            <car_id>'.$carEst.'</car_id>
            <esp_id>'.$espEst.'</esp_id>
            <pes_id>'.$planEst.'</pes_id>    
            <nivelMatri>'.$nivelMatr.'</nivelMatri>
            <totalCred>'.$totalCred.'</totalCred>
            <totalCur>'.$totalCursos.'</totalCur>
            </Estudiante>
            <Asignaturas>';
                
                
            for($i=0;$i<count($asignaturasEst);$i++) 
            {
                $datos_xml=$datos_xml.'
                <Asig>
                <asi_id>'.$asignaturasEst[$i].'</asi_id>
                <cod_cursal>'.$curSal[$i].'</cod_cursal>
                <asi_nivel>'.$nivelEst[$i].'</asi_nivel>
                <asi_credito>'.$creditEst[$i].'</asi_credito>	 
                </Asig>';
                
                /*
                $datos_xml=$datos_xml.'
                <Asig>
                <asi_id>'.$asignaturasEst[$i].'</asi_id>
                <turno>'.$turnosEst[$i].'</turno>
                <cod_cursal>'.$curSal.'</cod_cursal>
                <asi_nivel>'.$nivelEst[$i].'</asi_nivel>
                <asi_credito>'.$creditEst[$i].'</asi_credito>	 
                </Asig>';
                */
    	   }
            $datos_xml=$datos_xml.'</Asignaturas></Matricular>';
            

            
            
            logica::PA_UPLA('[Academico].[PA_Ins_MatriRectificacion]','json',$datos_xml,true);  
        }
    });  
    
    route('/consultarTurnos',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $asigCod=isset($_GET['asigCod']) ? $_GET['asigCod'] : null ;
            $asigNiv=isset($_GET['asigNiv']) ? $_GET['asigNiv'] : null ;        
            
            $datos_xml ='<Dato><carr>'.$carEst.'</carr><esp>'.$espEst.'</esp><cur>'.$asigCod.'</cur><niv>'.$asigNiv.'</niv></Dato>';
                   

                   
                    
            $datos=logica::PA_UPLA('[Academico].PA_Lis_turSal','json',$datos_xml);
        }
    });
    
    route('/consultarSecciones',"GET",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_GET['carEst']) ? $_GET['carEst'] : null ;
            $espEst=isset($_GET['espEst']) ? $_GET['espEst'] : null ;
            $asigCod=isset($_GET['asigCod']) ? $_GET['asigCod'] : null ;
            $asigNiv=isset($_GET['asigNiv']) ? $_GET['asigNiv'] : null ;        
            $asigTur=isset($_GET['asigTur']) ? $_GET['asigTur'] : null ; 
            
            $datos_xml ='<Dato>
                            <carr>'.$carEst.'</carr>
                            <esp>'.$espEst.'</esp>
                            <cur>'.$asigCod.'</cur>
                            <niv>'.$asigNiv.'</niv>
                            <turn>'.$asigTur.'</turn>
                         </Dato>';               
            

            
            $datos=logica::PA_UPLA('[Academico].PA_Lis_turSal_Secciones','json',$datos_xml);
        }
    });
        
    route('/habCupoTurnos',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $asigCod=isset($_POST['asigCod']) ? $_POST['asigCod'] : null ;
            $asigNiv=isset($_POST['asigNiv']) ? $_POST['asigNiv'] : null ;
            $asigTur=isset($_POST['asigTur']) ? $_POST['asigTur'] : null ;   
            
            $datos_xml ='<Dato><carr>'.$carEst.'</carr><esp>'.$espEst.'</esp><cur>'.$asigCod.'</cur><niv>'.$asigNiv.'</niv><turno>'.$asigTur.'</turno><codMatriculador>'.$_SESSION['dni'].'</codMatriculador></Dato>';
                       
            $datos=logica::PA_UPLA('[Academico].paIns_habCupoTurno','json',$datos_xml,true);
        }
    });
    
    route('/habCupoTurnos_secc',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {

            $carEst=isset($_POST['carEst']) ? $_POST['carEst'] : null ;
            $espEst=isset($_POST['espEst']) ? $_POST['espEst'] : null ;
            $asigCod=isset($_POST['asigCod']) ? $_POST['asigCod'] : null ;
            $asigNiv=isset($_POST['asigNiv']) ? $_POST['asigNiv'] : null ;
            $asigTur=isset($_POST['asigTur']) ? $_POST['asigTur'] : null ;   
            $asigSecc=isset($_POST['asigSecc']) ? $_POST['asigSecc'] : null ;
            
            $datos_xml ='<Dato><carr>'.$carEst.'</carr><esp>'.$espEst.'</esp><cur>'.$asigCod.'</cur><niv>'.$asigNiv.'</niv><turno>'.$asigTur.'</turno><codMatriculador>'.$_SESSION['dni'].'</codMatriculador><salon>'.$asigSecc.'</salon></Dato>';
            
            /*$fp = fopen("hab_tur_secc.txt","a");
            fwrite($fp,$datos_xml.PHP_EOL);
            fclose($fp);*/
            
            $datos=logica::PA_UPLA('[Academico].paIns_habCupoTurno_opc','json',$datos_xml,true);
        }
    });
    
    route('/anuCupoTurnos',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $asigCod=isset($_POST['asigCod']) ? $_POST['asigCod'] : null ;
            $datos_xml ='<Dato><cur>'.$asigCod.'</cur><codMatriculador>'.$_SESSION['dni'].'</codMatriculador></Dato>';
            $datos=logica::PA_UPLA('[Academico].paEli_CupoTurno','',$datos_xml);
        }
    });

    route('/limpiarTempSalon',"POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $datos_xml ='<usu>'.limpiar_seguridad($_SESSION['dni']).'</usu>';
            $datos=logica::paDel_limSalTemp('[Academico].paEli_CupoTurno','',$datos_xml);
        }
    });   

    route('/RptSalones',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='Rpt_Salones';//nombre del archivo JASPER                    
            $car=isset($_POST['car']) ? $_POST['car'] : null ;
            $esp=isset($_POST['esp']) ? $_POST['esp'] : null ;
            $parametros=array
            (
                array("car",$car),
                array("esp",$esp)
            );
            set_reporte_jasper($nomarchivo,$parametros);        
            script('ocultarCargando();');
        }
    });          

    route('/carrera',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><codfac>".$_GET["code"]."</codfac></Dato>";
            $data=Logica::PA_UPLA("[Academico].[paLis_carrera]","array",$cod);
            opciones_combo($data,"id","detalle");            
        }
        else
        {
            echo 'salir';
        }
    });

    route('/carrera_temp',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><dni>".limpiar_seguridad($_SESSION['dni'])."</dni><codfac>".$_GET["code"]."</codfac></Dato>";
            $data=Logica::PA_UPLA("[Academico].[paLis_carrera_tempmarcacion]","array",$cod);
            opciones_combo($data,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
    });
    

    route('/especialidad',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><codesp>".$_GET["code"]."</codesp></Dato>";
            $data=Logica::PA_UPLA("[Academico].[paLis_especialidad]","array",$cod);
            opciones_combo($data,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
    });

    route('/planEstfiltroz',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Datos><carr>".$_GET["carr"]."</carr><esp>".$_GET["esp"]."</esp></Datos>";
            $data=Logica::PA_UPLA("[Academico].[paCon_ListarPlanEstudiosPorCarrera]","array",$cod);
            opciones_combo($data,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
    });
    
    route('/cursosfiltroz',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Datos><carr>".$_GET["carr"]."</carr><esp>".$_GET["esp"]."</esp><ciclo>".$_GET["ciclo"]."</ciclo><planEst>".$_GET["planEst"]."</planEst></Datos>";
            $data=Logica::PA_UPLA("[Academico].[paCon_ListarCursosPorCiclo]","array",$cod);
            opciones_combo($data,"id","detalle");
        }
        else
        {
            echo 'salir';
        }
    });

    route('/buscarSalones',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $x_num=isset($_GET['FacSal_']) ? $_GET['FacSal_'] : null ;
            $x_carr=isset($_GET['carr_']) ? $_GET['carr_'] : null ;
            $x_esp=isset($_GET['esp_']) ? $_GET['esp_'] : null ;
            $x_sed=isset($_GET['sed_']) ? $_GET['sed_'] : null ;
            $x_mod=isset($_GET['mod_']) ? $_GET['mod_'] : null ;
            $x_niv=isset($_GET['niv_']) ? $_GET['niv_'] : null ;

            $cod="<Dato><fac>".$x_num."</fac><carr>".$x_carr."</carr><esp>".$x_esp."</esp><sed>".$x_sed."</sed><moda>".$x_mod."</moda><niv>".$x_niv."</niv></Dato>";
            Logica::PA_UPLA("[AcadEMICO].[paLis_salones]","json",$cod);                            
            //$xml = simplexml_load_string($data[0]["detalle"]);//convertir a xml la cadena
            //echo json_encode ($xml);
        }
    });

    route('/verhorariomatriz',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {            

            $cod="<Dato><codsaltem>".$_GET['cod']."</codsaltem></Dato>";            
    
            Logica::PA_UPLA("[Academico].[paCon_horariosmatriz]","json",$cod);                            
            //$xml = simplexml_load_string($data[0]["detalle"]);//convertir a xml la cadena
            //echo json_encode ($xml);
        }
    });

    route('/verhorariomatriz-matriculados',"GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {            

            $cod="<Dato><alumno>".$_GET["alu"]."</alumno></Dato>";            
    
            Logica::PA_UPLA("[Academico].[paCon_horariosmatriz_elegidos]","json",$cod);                            
            //$xml = simplexml_load_string($data[0]["detalle"]);//convertir a xml la cadena
            //echo json_encode ($xml);
        }
    });

    route('/eliminarSalones', "POST", function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><codsalon>".$_POST["codsalon_"]."</codsalon><usuario>".$_SESSION["dni"]."</usuario></Dato>";
                     
            Logica::PA_UPLA("[Academico].[paEli_salones]","json",$cod,true);      
        }
        
    });

    route("/cuadroSeleccion", "GET", function($params)
    {        
        include_template("cuadro_seleccion.php");           
    });

    route("/seleccioncursos", "GET", function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {
            $data=Logica::PA_UPLA('[Academico].[paLis_codcurmatriya]','array','<Dato><cod>'.$_GET['cod_cur'].'</cod></Dato>');
            $cad='';
            foreach ($data as $fila):                   
              $cad.=$fila['cod_cur'].',';
            endforeach;
            echo $cad;
        }

    });

    route('/turnos_carrera_ciclo',"GET", function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Dato>
                    <carrera>'.$_GET['car'].'</carrera>
                    <especialidad>'.$_GET['es'].'</especialidad>
                    <ciclo>'.$_GET['cic'].'</ciclo>
                 </Dato>';
            $data=logica::PA_UPLA("[Academico].[paLis_turnoxcarreraxciclo_rpc]","array",$cod);

            opciones_combo($data,'detalle','detalle');
        }
    });
    
    route("/lista_cursal", "GET", function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><ciclo>".$_GET['ciclo']."</ciclo><carr>".$_GET['carr']."</carr><esp>".$_GET['esp']."</esp></Dato>";                  
            $data=Logica::PA_UPLA("[Academico].[paLis_asigsal]","array",$cod);
            $cont_cursal=0;
            foreach ($data as $fila):         
              echo '<li><input type="checkbox" id="cb'.$cont_cursal.'" value="'.utf8_encode($fila['val']).'" /><label for="cb'.$cont_cursal.'">'.utf8_encode($fila['val'])." | ".utf8_encode($fila['nom']).'</label></li>';
              $cont_cursal++;
            endforeach;
            echo '<input type="hidden" id="cant_checksal" name="cant_checksal" value="'.$cont_cursal.'" />';
        }
    });    

    route("/lista_cursalEdit", "GET", function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><ciclo>".$_GET['ciclo']."</ciclo><carr>".$_GET['carr']."</carr><esp>".$_GET['esp']."</esp></Dato>";                  
            $data=Logica::PA_UPLA("[Academico].[paLis_asigsal]","array",$cod);
            $cont_cursal=0;
            foreach ($data as $fila):         
              echo '<li><input type="checkbox" id="cbEdit'.$cont_cursal.'" value="'.utf8_encode($fila['val']).'" /><label for="cb'.$cont_cursal.'">'.utf8_encode($fila['val'])." | ".utf8_encode($fila['nom']).'</label></li>';
              $cont_cursal++;
            endforeach;
            echo '<input type="hidden" id="cant_checksalEdit" name="cant_checksalEdit" value="'.$cont_cursal.'" />';
        }
    });    

    route("/regSalones","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><sec>".$_POST['sec_']."</sec><fac>".$_POST['fac_']."</fac><carr>".$_POST['carr_']."</carr><esp>".$_POST['esp_']."</esp><moda>".$_POST['moda_']."</moda><sed>".$_POST['sed_']."</sed><niv>".$_POST['niv_']."</niv><loc>".utf8_decode(limpiar_seguridad($_POST['loc_']))."</loc><aul>".utf8_decode(limpiar_seguridad($_POST['aul_']))."</aul><usuario>".$_SESSION["dni"]."</usuario>";
            $cod.="<cursos>";
            $array_=explode("-",$_POST['cad_']);            

            for($i=0;$i<sizeof($array_)-1;$i++)
            {
                $array_aux=explode("_",$array_[$i]);  
                $cod.="<cur>";
                $cod.="<cod>".$array_aux[0]."</cod>";
                $cod.="<cap>".$array_aux[9]."</cap>";
                $cod.="<horaini>".$array_aux[2]."</horaini>";
                $cod.="<horafin>".$array_aux[3]."</horafin>";
                $cod.="<dia>".$array_aux[4]."</dia>";
                $cod.="<horasacad>".$array_aux[5]."</horasacad>";
                $cod.="<color>".$array_aux[6]."</color>";
                $cod.="<obs>".utf8_decode(limpiar_seguridad($array_aux[10]))."</obs>";
                $cod.="</cur>";
            }

            $cod.="</cursos></Dato>";

            Logica::PA_UPLA("[Academico].[paIns_salones]","json",$cod,true);                                              
        }
    });
    
    route("/registrarMatricula","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $xml='
                <Matricular>
                    <Encargado>
                        <usu>'.$_SESSION["dni"].'</usu>
                        <motivo>Matricula presencial</motivo>
                    </Encargado>
                    <Estudiante>
                        <est_id>'.$_SESSION["dni"].'</est_id>
                        <nivelMatri>'.$_POST["nivelMatri"].'</nivelMatri>
                        <totalCred>'.$_POST["totalCred"].'</totalCred>
                        <totalCur>'.$_POST["totalCur"].'</totalCur>
                    </Estudiante>
                </Matricular>' ;
            
            /*
            $file = fopen("prueba_matri.txt", "a");
            fwrite($file, $xml . PHP_EOL);
            fclose($file);
            */
            

            Logica::PA_UPLA("[Academico].[PA_Ins_MatriNormal]","json",$xml,true);                                              
        }
    }); 

    route("/actSalones","POST",function($params)
    {
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><cod_saltem>".$_POST['codsaltem_']."</cod_saltem><sec>".$_POST['sec_']."</sec><fac>".$_POST['fac_']."</fac><carr>".$_POST['carr_']."</carr><esp>".$_POST['esp_']."</esp><moda>".$_POST['moda_']."</moda><sed>".$_POST['sed_']."</sed><niv>".$_POST['niv_']."</niv><loc>".utf8_decode(limpiar_seguridad($_POST['loc_']))."</loc><aul>".utf8_decode(limpiar_seguridad($_POST['aul_']))."</aul><usuario>".$_SESSION["dni"]."</usuario>";
            $cod.="<cursos>";
            $array_=explode("-",$_POST['cad_']);            

            for($i=0;$i<sizeof($array_)-1;$i++)
            {
                $array_aux=explode("_",$array_[$i]);  
                $cod.="<cur>";
                $cod.="<cod>".$array_aux[0]."</cod>";
                $cod.="<cap>".$array_aux[9]."</cap>";
                $cod.="<horaini>".$array_aux[2]."</horaini>";
                $cod.="<horafin>".$array_aux[3]."</horafin>";
                $cod.="<dia>".$array_aux[4]."</dia>";
                $cod.="<horasacad>".$array_aux[5]."</horasacad>";
                $cod.="<color>".$array_aux[6]."</color>";
                $cod.="<ocupado>".$array_aux[8]."</ocupado>";
                $cod.="<obs>".utf8_decode(limpiar_seguridad($array_aux[10]))."</obs>";
                $cod.="<codreg>".$array_aux[11]."</codreg>";
                $cod.="</cur>";
            }

            $cod.="</cursos></Dato>";

            Logica::PA_UPLA("[Academico].[paAct_salones]","json",$cod,true);                                              
        }
    });    

    route('/salonesdispo',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><carrera>".$_GET['carr']."</carrera><ciclo>".$_GET['cic']."</ciclo><sede>".$_GET['sede']."</sede><moda>".$_GET['moda']."</moda></Dato>";
            $data=Logica::PA_UPLA("[Academico].[paLis_salones_rpc]","array",$cod);
            opciones_combo($data,"detalle","detalle");
        }
        else
        {
            echo 'salir';
        }
    }); 

    route("/buscarUEC","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Dato><Per_Id>'.limpiar_seguridad($_GET['dni']).'</Per_Id>
            <dni>'.limpiar_seguridad($_SESSION['dni']).'</dni></Dato>';
            Logica::PA_UPLA("[Academico].[pa_CLe_Sel_Docente_horario]","json",$cod);                        
        }
    });   

    route("/buscarlogmarc","GET",function($params)
    {   
        if(seguridad_sesion($params[0],true))
        {
            $fecha_ini=$_GET['i_fecha_log']; 
            
            $year=substr($fecha_ini,6,4);
            $month=substr($fecha_ini,3,2);
            $day=substr($fecha_ini,0,2);
            
            $fecha_ini=$year."-".$month."-".$day;

            $fecha_fin=$_GET['i_fecha_log_2']; 
            
            $year=substr($fecha_fin,6,4);
            $month=substr($fecha_fin,3,2);
            $day=substr($fecha_fin,0,2);
            
            $fecha_fin=$year."-".$month."-".$day;
            
            
            
            //$fecha_ini=date("Y-m-d",strtotime($_GET['i_fecha_log'])); 
            //$fecha_fin=date("Y-m-d",strtotime($_GET['i_fecha_log_2'])); 
            
            //$fecha_ini=$_GET['i_fecha_log']; 
            //$fecha_fin=$_GET['i_fecha_log_2']; 
            
            $cod='<Docente>
            <cookie>'.$_SESSION[vS_Cookie].'</cookie>
            <fecha_ini>'.limpiar_seguridad($fecha_ini).'</fecha_ini>
            <fecha_fin>'.limpiar_seguridad($fecha_fin).'</fecha_fin>
            </Docente>';

            
             /*$file = fopen("archivo.txt", "a");
             fwrite($file, $cod . PHP_EOL);
             fclose($file);*/
             
             
            Logica::PA_UPLA("[Academico].[paCon_AsistenciaDiaria]","json",$cod);                        
        }
    });

    route("/verProgramacion","GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            /*  creacion del xml */
            $cod ='<Dato>
                <Per_id>'.$_GET['Per_id'].'</Per_id>
                <Sed_Id>'.$_GET['Sed_Id'].'</Sed_Id>
                <MAc_Id>'.$_GET['MAc_Id'].'</MAc_Id>
                <Car_Id>'.$_GET['Car_Id'].'</Car_Id>            
                <l_Nivel_Seccion>'.$_GET['l_Nivel_Seccion'].'</l_Nivel_Seccion>            
                <Asi_Id>'.$_GET['Asi_Id'].'</Asi_Id>
            </Dato>';
            //$cod='<Dato><Mtr_Anio_Periodo>'.$_GET['per'].'</Mtr_Anio_Periodo><Per_Id>'.$_GET['dni'].'</Per_Id></Dato>';
            Logica::PA_UPLA("[Academico].[paCon_EstadoAsistencias]","json",$cod);                       
        }
    }); 

    route("/verjustificarasis","GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            /*  creacion del xml */
            $cod ='<Dato>
                <cod>'.limpiar_seguridad($_GET['cod']).'</cod>            
            </Dato>';
            //$cod='<Dato><Mtr_Anio_Periodo>'.$_GET['per'].'</Mtr_Anio_Periodo><Per_Id>'.$_GET['dni'].'</Per_Id></Dato>';
            Logica::PA_UPLA("[Academico].[paCon_EstadoJustificacion]","json",$cod);                       
        }
    });   


     route("/justificarHorarioDocente","GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod ='<Dato>
                <Per_id>'.$_GET['Per_id'].'</Per_id>
                <Sed_Id>'.$_GET['Sed_Id'].'</Sed_Id>
                <MAc_Id>'.$_GET['MAc_Id'].'</MAc_Id>
                <Car_Id>'.$_GET['Car_Id'].'</Car_Id>            
                <l_Nivel_Seccion>'.$_GET['l_Nivel_Seccion'].'</l_Nivel_Seccion>            
                <Asi_Id>'.$_GET['Asi_Id'].'</Asi_Id>
                <texmotivo>'.$_GET['text_motivo'].'</texmotivo>
                <dia_marcado>'.$_GET['dia_marcado'].'</dia_marcado>
                <dia>'.$_GET['dia'].'</dia>
                <dia_marcado_remplazo>'.$_GET['dia_marcado_remplazo'].'</dia_marcado_remplazo>
                <hora_ini>'.$_GET['ini'].'</hora_ini>
                <hora_fin>'.$_GET['fin'].'</hora_fin>
                <sino>'.$_GET['sino'].'</sino>

            </Dato>';
            Logica::PA_UPLA("[Academico].[PA_RegJustificaHorario]","json",$cod,true);                       
        }
    }); 

    
    
    
    route("/buscar-alumno-cod","GET",function($params)
    {     
        if(seguridad_sesion($params[0],true))
        {
            $cod='<dat_grabado><selec><codigo>'.limpiar_seguridad($_GET['cod']).'</codigo></selec></dat_grabado>';
            Logica::PA_UPLA("[sga].[paCon_cliente]","json",$cod,false,"SGA");                        
        }
    });  

    route("/buscar-alumno-academico","GET",function($params)
    {     
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Estudiante><cod>'.limpiar_seguridad($_GET['cod']).'</cod></Estudiante>';
            Logica::PA_UPLA("[Academico].[paCon_buscaralumno]","json",$cod);                        
        }
    });

    route("/regampcred","POST",function($params)
    {     
        if(seguridad_sesion($params[0],true))
        {
            $cod='<Estudiante><cod>'.limpiar_seguridad($_POST['cod']).'</cod><obs>'.limpiar_seguridad($_POST['obs']).'</obs><cre>'.limpiar_seguridad($_POST['cre']).'</cre><reg>'.limpiar_seguridad(utf8_decode($_POST['reg'])).'</reg><usu>'.limpiar_seguridad($_SESSION['dni']).'</usu></Estudiante>';
            Logica::PA_UPLA("[Academico].[paIns_ampcredalum]","json",$cod,true);                        
        }
    });

    route("/lista_priv","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {         
            $data=Logica::PA_UPLA("[seguridad].[paCon_ListarPrivilegios]","array","<Dato><sis>".limpiar_seguridad($_GET['sis'])."</sis></Dato>");
            opciones_combo($data,"id","detalle","Seleccione Privilegio...");
        }
    });

    route("/modalidades_usu","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {         
            $data=Logica::PA_UPLA("[general].[paCon_modalidadxsede]","array","<Dato><usuario>".$_SESSION["dni"]."</usuario><sede>".$_GET["sede"]."</sede></Dato>");
            opciones_combo($data,"id","detalle","MODALIDAD");
        }
        else
        {
            echo 'salir';
        }
    });

    route("/versegurosalumnos","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {         
            $cod='<dato><fecini>'.limpiar_seguridad($_GET['fecini']).'</fecini><fecfin>'.limpiar_seguridad($_GET['fecfin']).'</fecfin></dato>';
            Logica::PA_UPLA("[Financiero].[SeguroDeAccidentes]","json",$cod,false,"SGA");        
        }
    });   

    route("/regdocitem","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<dato>
            <codreghidoc>'.limpiar_seguridad($_POST['codreghidoc']).'</codreghidoc>
            <expe>'.limpiar_seguridad($_POST['expe']).'</expe>
            <tip>'.limpiar_seguridad($_POST['tip']).'</tip>
            <numdoc>'.limpiar_seguridad($_POST['numdoc']).'</numdoc>            
            <fimp>'.limpiar_seguridad($_POST['fimp']).'</fimp>
            <pasa>'.limpiar_seguridad(utf8_decode($_POST['pasa'])).'</pasa>';
            $cod.="<asu>".limpiar_seguridad(str_replace("?",'"',utf8_decode($_POST['asu'])))."</asu>";

            $array_x=explode(",",$_POST['ref']);
            for($i=0;$i<sizeof($array_x)-1;$i++)
            {
                $cod.="<detalle><ref>".limpiar_seguridad(str_replace("?",'"',utf8_decode($array_x[$i])))."</ref></detalle>";
            }

            $cod.='<est>'.limpiar_seguridad($_POST['est']).'</est>
            <num>'.limpiar_seguridad($_POST['num']).'</num>
            <estatuto>'.limpiar_seguridad($_POST['estatuto']).'</estatuto>';
            $cod.="<res>".limpiar_seguridad(str_replace("?",'"',utf8_decode($_POST['res'])))."</res>
            </dato>";

            switch($_POST['regact'])
            {
                case 'reg':Logica::PA_UPLA("[reghisdoc].[paIns_regdocumentos]","json",$cod,true,"dbTramDoc_SITD");break;
                case 'act':Logica::PA_UPLA("[reghisdoc].[paAct_regdocumentos]","json",$cod,true,"dbTramDoc_SITD");break;
            }
                        
        }
    }); 

    route("/elidocitem","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<dato><codreghidoc>'.limpiar_seguridad($_POST['codreghidoc']).'</codreghidoc></dato>';

            Logica::PA_UPLA("[reghisdoc].[elidocitem]","json",$cod,true,"dbTramDoc_SITD");           
                        
        }
    }); 

    route("/regtipdoc-x","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<dato><nom>'.limpiar_seguridad($_POST['nom']).'</nom></dato>';
            Logica::PA_UPLA("[reghisdoc].[paIns_regtipodoc]","json",$cod,true,"dbTramDoc_SITD");        
        }
    });

    route("/regdep-x","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<dato>
            <dep>'.limpiar_seguridad($_POST['dep']).'</dep>            
            </dato>';
            Logica::PA_UPLA("[reghisdoc].[paIns_regdependencias]","json",$cod,true,"dbTramDoc_SITD");        
        }
    });     

    route("/regest-x","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $cod='<dato>
            <est>'.limpiar_seguridad($_POST['est']).'</est>            
            </dato>';
            Logica::PA_UPLA("[reghisdoc].[paIns_regestado]","json",$cod,true,"dbTramDoc_SITD");        
        }
    });  
    ###############################################################################################

    route("/cmbtiposdocumentos","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $data=Logica::PA_UPLA("[reghisdoc].[paCon_tiposdocumentos]","array","",false,"dbTramDoc_SITD");                        
            opciones_combo($data,"id","detalle",'elegir');        
        }
    }); 

    route("/cmbdependencia","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $data=Logica::PA_UPLA("[reghisdoc].[paCon_dependencia]","array","",false,"dbTramDoc_SITD");                        
            opciones_combo($data,"id","detalle",'elegir');      
        }
    }); 

    route("/cmbestado","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $data=Logica::PA_UPLA("[reghisdoc].[paCon_estado]","array","",false,"dbTramDoc_SITD");                        
            opciones_combo($data,"id","detalle",'elegir');         
        }
    }); 

    route("/buscarDocHisReg","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<Dato>
            <fini>'.limpiar_seguridad($_GET['fini']).'</fini>
            <ffin>'.limpiar_seguridad($_GET['ffin']).'</ffin>
            <dep>'.limpiar_seguridad($_GET['dep']).'</dep>
            <est>'.limpiar_seguridad($_GET['est']).'</est>
            <cad>'.limpiar_seguridad($_GET['cad']).'</cad>
            </Dato>';
            Logica::PA_UPLA("[reghisdoc].[paCon_busrpt_dochis]","json",$cod,FALSE,"dbTramDoc_SITD");        
        }
    });

    route("/editpro-popup", "GET", function($params)
    {

        $cod="<Dato><cod>".limpiar_seguridad($_GET['cod'])."</cod></Dato>";
        $data1=Logica::PA_UPLA("[reghisdoc].[paCon_coddoc]","array",$cod,false,"dbTramDoc_SITD"); 

        $data2=Logica::PA_UPLA("[reghisdoc].[paCon_refdoc]","array",$cod,false,"dbTramDoc_SITD"); 

        echo '<style>#dv_regpro{padding-left:0px; padding-top:0px;}</style>';        
        
        set_link("funciones-regdocumento.js");        

   
        $cadenascript='$( document ).ready(function(){                 
                    $("#btn_reg_doc").hide();
                    $("#btn_reg_limp").hide();                    

                    $("#exp_i").val("'.utf8_decode($data1[0]['cod_expe']).'"); 
                    $("#tipo_i").val("'.$data1[0]['cod_tipodoc'].'"); 
                    $("#numtip_i").val("'.utf8_encode($data1[0]['numdoc']).'"); 
                    $("#fecimp_i").val("'.$data1[0]['fech_imp'].'"); 
                    $("#pasa_i").val("'.$data1[0]['pasa_cod_dep'].'");';
                    $cadenascript.="$('#asu_ta').val('".utf8_encode($data1[0]['asunto'])."');";
                    $cadenascript.='$("#cmb_estado").val("'.$data1[0]['cod_est'].'"); 
                    $("#numref_i").val("'.utf8_encode($data1[0]['num_est']).'"); 
                    $("#cmb_estatuto").val("'.$data1[0]['estatuto'].'");';
                    $cadenascript.="$('#res_ta').val('".utf8_encode($data1[0]['resumen'])."');";

                    $cadenascript.='$("#cod_originalDoc").val("'.$data1[0]['cod_reghisdoc'].'"); 
                    
                    $("#exp_i").prop("disabled", true); ';
                    
                    for($i=0;$i<sizeof($data2);$i++)
                    {
                        $cadenascript.="tabla_add_sedmodfac('".utf8_encode($data2[$i]['referencia'])."','filas_ref','cant_filas_ref');";
                    }

                    $cadenascript.=' $("#fecimp_i").datepicker({dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: "-100:+0"});
                    $("#btn_agregarEst").prop("checked",true);                    
                    });';
                
        script($cadenascript);
         
            include_template("registrodoc.php");        
     
    });

    route("/regtramite-popup", "GET", function($params)
    {

        echo '<style>#dv_regpro{padding-left:0px; padding-top:0px;}</style>';        
        $cod="<Dato><cod>".limpiar_seguridad($_GET['cod'])."</cod></Dato>";
        $data1=Logica::PA_UPLA("[reghisdoc].[paCon_coddoc]","array",$cod,false,"dbTramDoc_SITD"); 

        set_link("funciones-regtramite.js");        
        
        script('$( document ).ready(function(){ 
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        //echo "<div id='cargando'></div>";            
            include_template("registrotramite.php"); 
        echo "</body>";
        echo "</html>"; 
     
    });

//################################################ PERSONAL ###########################################

    route("/opctipins","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            $data=Logica::PA_UPLA("paCon_tipoinsedu","array","<dato><codsis>".$_GET['codsis']."</codsis></dato>",false,"DBPERSONAL");                        
            opciones_combo($data,"id","detalle",'elegir');   
        }
    }); 

    route("/opcnomins","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            //$par='<dato><codtip>8</codtip><codperu>1</codperu><codreg>1</codreg></dato>';
            $par='<dato><codtip>'.$_GET['codtip'].'</codtip><codperu>'.$_GET['codperu'].'</codperu><codreg>'.$_GET['codreg'].'</codreg></dato>';
            $data=Logica::PA_UPLA("paCon_tiponomins","array",$par,false,"DBPERSONAL");                        
            opciones_combo($data,"id","detalle",'elegir');   
        }
    }); 

    route("/opcnominscarr","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {  
            
            $par='<dato><codins>'.$_GET['codins'].'</codins></dato>';
            $data=Logica::PA_UPLA("paCon_tiponominscarr","array",$par,false,"DBPERSONAL");                        
            opciones_combo($data,"id","detalle",'elegir');   
        }
    });

    route("/regsituacademica","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {       

            $par='<dato>
            <dni>'.$_SESSION['dni'].'</dni>
            <codgrado>'.$_POST['tgrado'].'</codgrado>
            <descgrado>'.utf8_decode($_POST['descgrado']).'</descgrado>
            <forsupcom>'.$_POST['forsup'].'</forsupcom>
            <fecegreso>'.$_POST['anioeg'].'</fecegreso>
            <insedu>'.$_POST['nominst'].'</insedu>
            <carr>'.$_POST['carrinst'].'</carr>
            <peru>'.$_POST['peru'].'</peru>
            <tipuni>'.$_POST['regedu'].'</tipuni>
            <tipinsedu>'.$_POST['tinst'].'</tipinsedu>
            </dato>';

            
            Logica::PA_UPLA("paIns_regstuedu","json",$par,true,"DBPERSONAL");                        
            
        }
    });

    route("/actsituacademica","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {       

            $par='<dato>
            <reg>'.$_POST['regcod'].'</reg>
            <dni>'.$_SESSION['dni'].'</dni>
            <codgrado>'.$_POST['tgrado'].'</codgrado>
            <descgrado>'.utf8_decode($_POST['descgrado']).'</descgrado>
            <forsupcom>'.$_POST['forsup'].'</forsupcom>
            <fecegreso>'.$_POST['anioeg'].'</fecegreso>
            <insedu>'.$_POST['nominst'].'</insedu>
            <carr>'.$_POST['carrinst'].'</carr>
            <peru>'.$_POST['peru'].'</peru>
            <tipuni>'.$_POST['regedu'].'</tipuni>
            <tipinsedu>'.$_POST['tinst'].'</tipinsedu>
            </dato>';
                     
            Logica::PA_UPLA("paAct_regstuedu","json",$par,true,"DBPERSONAL");                        
            
        }
    });

    route("/buscarpersonalRegGT","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {       

            $par='<dato>
            <dni>'.$_SESSION['dni'].'</dni>   
            </dato>';
           
            Logica::PA_UPLA("paCon_sistaca","json",$par,false,"DBPERSONAL");                        
            
        }
    });

    route("/elisituacademica","POST",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        {       

            $par='<dato>
            <dni>'.$_SESSION['dni'].'</dni>         
            <num>'.$_POST['num_x'].'</num>
            </dato>';
                     
            Logica::PA_UPLA("paDel_regpergt","json",$par,true,"DBPERSONAL");                        
            
        }
    });

    route('/RptSituAca',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='const_SitEduc';//nombre del archivo JASPER                    
            $cod=$_POST['cod_reg'];
            $coo=$_SESSION['dni'];
            $parametros=array
            (
                array("NUMREGTGRADO",$cod),
                array("NUMDOCUTTRABA",$coo)
            );
            set_reporte_jasper($nomarchivo,$parametros);        
            script('ocultarCargando();');
        }
    });  

    route('/RptRegHisDocTodo',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='regisDoc_rpt';//nombre del archivo JASPER                    
            $parametros=array
            (
                array("fini",$_POST['fini']),
                array("ffin",$_POST['ffin']),
                array("tip",''),
                array("dep",$_POST['dep']),
                array("est",$_POST['est']),
                array("cad",$_POST['cad'])
            );
            set_reporte_jasper($nomarchivo,$parametros,1000,780);                 
        }
    });  

    route('/RptFsecoEsta',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $nomarchivo='reportSP_paCon_rptestadisiticas_v4';//nombre del archivo JASPER                    
            $p_1=$_POST['anio'];
            $p_2=$_POST['per'];
            $parametros=array
            (
                array("anio",$p_1),
                array("per",$p_2)
            );
            set_reporte_jasper($nomarchivo,$parametros);                    
        }
    });  

    route("/buscarGeneralAlumno","GET",function($params)
    {       
        if(seguridad_sesion($params[0],true))
        { 

            $cod='<dato>         
            <cad>'.utf8_decode(limpiar_seguridad($_GET['cad'])).'</cad>
            </dato>';
            Logica::PA_UPLA("[General].[buscarGeneralAlumno]","json",$cod);        
        }
    });
    
    
/*
    route("/codigos","GET",function($params)
    {       
        include_template("codigos.php"); 
    });
*/
##################################################################################################
######################### FICHA SOCIO ECONOMICA ##################################################
##################################################################################################


    route("/fseco","GET",function($params)
    {
        
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre();       
        
        //set_link("editusuario.js");
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
        set_link("screen.css");        
        set_link("style.css");   
        set_link("funciones_fseco.js");   
        
        script('$( document ).ready(function(){
                    /*minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");*/
                    menu_lateral();                                         
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("fseco.php"); 
        echo "</body>";
        echo "</html>"; 
    });


    route("/fseco-adm","GET,POST",function($params)
    {
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre(); 
           
        set_link("estilo_fseco_style.php");  
        set_link("estilo_fseco_apoyo.css");
        set_link("funciones-fseco-apoyo.js");     
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
 
        set_link("funciones_fseco.js");

        script('$(document).ready(function(){
                    minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");
                    menu_lateral();
                    $("#fech_nac").datepicker({dateFormat: "dd-mm-yy", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                               
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("fseco-adm.php"); 
        echo "</body>";
        echo "</html>"; 
    });

    route("/fseco-usu","GET",function($params)
    {
        echo "<html>";
        echo "<head>";
        set_status_code(200); 
        seguridad_sesion($params[0]);
        conf_pre(); 
           
        set_link("estilo_fseco_style.php");  
        set_link("estilo_fseco_apoyo.css");
        set_link("funciones-fseco-apoyo.js");     
        set_link("menu.php");
        set_link("general.php");
        set_link("tabla.php");
        set_link("menu_lateral.php");
        set_link("menu.js");
        set_link("menu_lateral.js");  
 
        set_link("funciones_fseco.js");

        script('$(document).ready(function(){
                    /*minimizar("capa1");
                    minimizar("capa2");
                    minimizar("capa3");*/
                    menu_lateral();
                    $("#fech_nac").datepicker({dateFormat: "dd-mm-yy", changeMonth: true, changeYear: true, yearRange: "-100:+0"});                               
                    });'
                ); 
        echo "</head>";
        echo "<body>";
        echo "<div id='cargando'></div>";
            include_template("menu.php");
            set_aviso();
            include_template("menu_lateral.php");   
            include_template("fseco-usu.php"); 
        echo "</body>";
        echo "</html>"; 
    });
    route("/fseco-usu-reg","POST",function($params)
    {
        ########################################
        ########################################
        $action='';
        //Si 'action' es enviada por post, esta debe ser capturada
        if(isset($_POST['action'])&& isset($_POST['usuAdmin'])){
            $action=$_POST['action'];
            $usuAdmin=$_POST['usuAdmin'];
            switch ($action)
            {
                case 'guardarFSECO':  
                  //    xml ficha socio economica:
                    $codigo=isset($_POST['txtCod']) ? $_POST['txtCod'] : null;
                    $rED=isset($_POST['rED']) ? $_POST['rED'] : null;
                    $BU=isset($_POST['BU']) ? $_POST['BU'] : null;
                    //.......vivienda
                    $vT=isset($_POST['vT']) ? $_POST['vT'] : null;
                    $vM=isset($_POST['vM']) ? $_POST['vM'] : null;
                    $vTI=isset($_POST['vTI']) ? $_POST['vTI'] : null;
                    $vU=isset($_POST['vU']) ? $_POST['vU'] : null;
                    $vHO=isset($_POST['vHO']) ? $_POST['vHO'] : null;
                    $vSS1=isset($_POST['vSS1']) ? $_POST['vSS1'] : "false";
                    $vSS2=isset($_POST['vSS2']) ? $_POST['vSS2'] : "false";
                    $vSS3=isset($_POST['vSS3']) ? $_POST['vSS3'] : "false";
                    $vSS4=isset($_POST['vSS4']) ? $_POST['vSS4'] : "false";
                    
                    //......Ingresos
                    $iP=isset($_POST['iP']) ? $_POST['iP'] : null;
                    $iM=isset($_POST['iM']) ? $_POST['iM'] : null;
                    $iOR=isset($_POST['iOR']) ? $_POST['iOR'] : null;
                    $iE=isset($_POST['iE']) ? $_POST['iE'] : null;
                    //......Egresos
                    $eAL=isset($_POST['eAL']) ? $_POST['eAL'] : null;
                    $eED=isset($_POST['eED']) ? $_POST['eED'] : null;
                    $eVS=isset($_POST['eVS']) ? $_POST['eVS'] : null;
                    $eO=isset($_POST['eO']) ? $_POST['eO'] : null;
                    //........Datos Familiares
                    $GC=isset($_POST['GC']) ? $_POST['GC'] : null;


                    $N_Herm=isset($_POST['N_Herm']) ? $_POST['N_Herm'] : "Ninguno";
                    $N_Herm_NE=isset($_POST['N_Herm_NE']) ? $_POST['N_Herm_NE'] : "Ninguno";
                    $N_Herm_Est_IEE=isset($_POST['N_Herm_Est_IEE']) ? $_POST['N_Herm_Est_IEE'] : "Ninguno";
                    $N_Herm_Est_IEP=isset($_POST['N_Herm_Est_IEP']) ? $_POST['N_Herm_Est_IEP'] : "Ninguno";
                    
                    //.............Salud
                    $Adol_Enf=isset($_POST['Adol_Enf']) ? $_POST['Adol_Enf'] : null;
                    $Seg_Acc=isset($_POST['Seg_Acc']) ? $_POST['Seg_Acc'] : null;
                    $Seg_Enf=isset($_POST['Seg_Enf']) ? $_POST['Seg_Enf'] : "NINGUNO";
                    
                    //......Mas datos del alumno
                    $Int_EU=isset($_POST['Int_EU']) ? $_POST['Int_EU'] : null;
                    $mot_int_est=isset($_POST['mot_int_est']) ? $_POST['mot_int_est'] : "NINGUNO";
                    $Sec_Col=isset($_POST['Sec_Col']) ? $_POST['Sec_Col'] : null;
                    $Ciu_Pro=isset($_POST['Ciu_Pro']) ? $_POST['Ciu_Pro'] : null;
                    $Pro_L=isset($_POST['Pro_L']) ? $_POST['Pro_L'] : null;
                    $Dist_L=isset($_POST['Dist_L']) ? $_POST['Dist_L'] : null;
                    $Dep_L=isset($_POST['Dep_L']) ? $_POST['Dep_L'] : null;
                    //codigo del colegio
                    $cboColegioProce=isset($_POST['cboColegioProce']) ? $_POST['cboColegioProce']:null;
                    //datos

                    //......otros datos del alumno
                    $nom_emerg_=isset($_POST['txtContEmerg']) ? $_POST['txtContEmerg']:null;
                    $tel_emerg_=isset($_POST['txtTelEmerg']) ? $_POST['txtTelEmerg']:null;
                    $dep_econom_=isset($_POST['optDepenEconom']) ? $_POST['optDepenEconom']:null;
                    $transporte_=isset($_POST['cboTransporte']) ? $_POST['cboTransporte']:null;
                    $ingreso_=isset($_POST['cboIngrFamiliar']) ? $_POST['cboIngrFamiliar']:null;
                    $internet_=isset($_POST['cboInternet']) ? $_POST['cboInternet']:null;
                    $facebook_=isset($_POST['optFacebook']) ? $_POST['optFacebook']:null;
                    $twitter_=isset($_POST['optTwitter']) ? $_POST['optTwitter']:null;
                    $acept_inf_=isset($_POST['optInformacion']) ? $_POST['optInformacion']:null;
                    //fin otros datos alumno

                    //------------------------------------------------------------------
                    //------------------- Armar xml ------------------------------------
                    $dom = new DOMDocument('1.0');
                    $dom->formatOutput = true;
                    $FICHASOCIOECONOMICA = $dom->createElement('FICHASOCIOECONOMICA', '');
                    $dom->appendChild($FICHASOCIOECONOMICA);
                    $datos = $dom->createElement('datos', '');
                    $FICHASOCIOECONOMICA->appendChild($datos);

                    $cod_matri = $dom->createElement('cod_matri',$codigo);
                    $datos->appendChild($cod_matri);
                    $resp_edu = $dom->createElement('resp_edu',$rED);
                    $datos->appendChild($resp_edu);
                    $beneficio_u = $dom->createElement('beneficio_u',$BU);
                    $datos->appendChild($beneficio_u);
                    $pension = $dom->createElement('pension','algo');//falta traer la pension
                    $datos->appendChild($pension);
                    $bandera = $dom->createElement('bandera','true');
                    $datos->appendChild($bandera);

                    $vivienda = $dom->createElement('vivienda','');
                    $datos->appendChild($vivienda);

                    $tendencia = $dom->createElement('tendencia', $vT);
                    $vivienda->appendChild($tendencia);
                    $material = $dom->createElement('material', $vM);
                    $vivienda->appendChild($material);
                    $tipo = $dom->createElement('tipo', $vTI);
                    $vivienda->appendChild($tipo);
                    $ubicacion = $dom->createElement('ubicacion', $vU);
                    $vivienda->appendChild($ubicacion);
                    $n_hab_ocup = $dom->createElement('n_hab_ocup',$vHO);
                    $vivienda->appendChild($n_hab_ocup);
                    $s_elt = $dom->createElement('s_elt', $vSS1);
                    $vivienda->appendChild($s_elt);
                    $s_telf = $dom->createElement('s_telf', $vSS2);
                    $vivienda->appendChild($s_telf);
                    $s_int = $dom->createElement('s_int', $vSS3);
                    $vivienda->appendChild($s_int);
                    $s_cable = $dom->createElement('s_cable', $vSS4);
                    $vivienda->appendChild($s_cable);


                    $ingresos = $dom->createElement('ingresos','');
                    $datos->appendChild($ingresos);
                    $ingreso = $dom->createElement('ingreso', '');
                    $ingresos->appendChild($ingreso);
                    $persona_I = $dom->createElement('persona_I', 'PADRE');
                    $ingreso->appendChild($persona_I);
                    $cantidad_I = $dom->createElement('cantidad_I', $iP);
                    $ingreso->appendChild($cantidad_I);

                    $ingreso = $dom->createElement('ingreso', '');
                    $ingresos->appendChild($ingreso);
                    $persona_I = $dom->createElement('persona_I', 'MADRE');
                    $ingreso->appendChild($persona_I);
                    $cantidad_I = $dom->createElement('cantidad_I', $iM);
                    $ingreso->appendChild($cantidad_I);

                    $ingreso = $dom->createElement('ingreso', '');
                    $ingresos->appendChild($ingreso);
                    $persona_I = $dom->createElement('persona_I', 'OTRO RESPONSABLE');
                    $ingreso->appendChild($persona_I);
                    $cantidad_I = $dom->createElement('cantidad_I', $iOR);
                    $ingreso->appendChild($cantidad_I);

                    $ingreso = $dom->createElement('ingreso', '');
                    $ingresos->appendChild($ingreso);
                    $persona_I = $dom->createElement('persona_I', 'ESTUDIANTE');
                    $ingreso->appendChild($persona_I);
                    $cantidad_I = $dom->createElement('cantidad_I', $iE);
                    $ingreso->appendChild($cantidad_I);


                    $egresos = $dom->createElement('egresos','');
                    $datos->appendChild($egresos);
                    $egreso = $dom->createElement('egreso', '');
                    $egresos->appendChild($egreso);
                    $necesidad = $dom->createElement('necesidad', 'ALIMENTACION');
                    $egreso->appendChild($necesidad);
                    $cantidad_E = $dom->createElement('cantidad_E', $eAL);
                    $egreso->appendChild($cantidad_E);

                    $egreso = $dom->createElement('egreso', '');
                    $egresos->appendChild($egreso);
                    $necesidad = $dom->createElement('necesidad', 'EDUCACION');
                    $egreso->appendChild($necesidad);
                    $cantidad_E = $dom->createElement('cantidad_E', $eED);
                    $egreso->appendChild($cantidad_E);

                    $egreso = $dom->createElement('egreso', '');
                    $egresos->appendChild($egreso);
                    $necesidad = $dom->createElement('necesidad', 'SERVICIOS BASICOS PUBLICOS, PRIVADOS Y VIVIENDA');
                    $egreso->appendChild($necesidad);
                    $cantidad_E = $dom->createElement('cantidad_E', $eVS);
                    $egreso->appendChild($cantidad_E);

                    $egreso = $dom->createElement('egreso', '');
                    $egresos->appendChild($egreso);
                    $necesidad = $dom->createElement('necesidad', 'OTROS');
                    $egreso->appendChild($necesidad);
                    $cantidad_E = $dom->createElement('cantidad_E', $eO);
                    $egreso->appendChild($cantidad_E);


                    $actividades_eco = $dom->createElement('actividades_eco','');
                    $datos->appendChild($actividades_eco);
                    //------------------------------------------------------------------

                    //---------------------------- ACT.E. PADRE ------------------------
                    $array[0]=isset($_POST['P1']) ? $_POST['P1'] : null;
                    $array[1]=isset($_POST['P2']) ? $_POST['P2'] : null;
                    $array[2]=isset($_POST['P3']) ? $_POST['P3'] : null;
                    $array[3]=isset($_POST['P4']) ? $_POST['P4'] : null;
                    $array[4]=isset($_POST['P5']) ? $_POST['P5'] : null;
                    $array[5]=isset($_POST['P6']) ? $_POST['P6'] : null;
                    $array[6]=isset($_POST['P7']) ? $_POST['P7'] : null;
                    $array[7]=isset($_POST['P8']) ? $_POST['P8'] : null;


                    for($i = 0; $i < count($array); $i++)
                    {

                    if(isset($array[$i])){
                    $actidad_eco = $dom->createElement('actidad_eco', '');
                    $actividades_eco->appendChild($actidad_eco);
                    $persona_AE = $dom->createElement('persona_AE', 'PADRE');
                    $actidad_eco->appendChild($persona_AE);
                    $ocupacion = $dom->createElement('ocupacion', $array[$i]);
                    $actidad_eco->appendChild($ocupacion);

                    }
                    }
                    //------------------------------------------------------------------

                    //----------------------------- ACT.E. MADRE -----------------------
                    $array[0]=isset($_POST['M1']) ? $_POST['M1'] : null;
                    $array[1]=isset($_POST['M2']) ? $_POST['M2'] : null;
                    $array[2]=isset($_POST['M3']) ? $_POST['M3'] : null;
                    $array[3]=isset($_POST['M4']) ? $_POST['M4'] : null;
                    $array[4]=isset($_POST['M5']) ? $_POST['M5'] : null;
                    $array[5]=isset($_POST['M6']) ? $_POST['M6'] : null;
                    $array[6]=isset($_POST['M7']) ? $_POST['M7'] : null;
                    $array[7]=isset($_POST['M8']) ? $_POST['M8'] : null;

                    for($i = 0; $i < count($array); $i++)
                    {
                    if(isset($array[$i])){

                    $actidad_eco = $dom->createElement('actidad_eco', '');
                    $actividades_eco->appendChild($actidad_eco);
                    $persona_AE = $dom->createElement('persona_AE', 'MADRE');
                    $actidad_eco->appendChild($persona_AE);
                    $ocupacion = $dom->createElement('ocupacion', $array[$i]);
                    $actidad_eco->appendChild($ocupacion);

                    }
                    }
                    //------------------------------------------------------------------

                    //--------------------------- ACT.E. OTRO RESPONSABLE --------------
                    $array[0]=isset($_POST['OR1']) ? $_POST['OR1'] : null;
                    $array[1]=isset($_POST['OR2']) ? $_POST['OR2'] : null;
                    $array[2]=isset($_POST['OR3']) ? $_POST['OR3'] : null;
                    $array[3]=isset($_POST['OR4']) ? $_POST['OR4'] : null;
                    $array[4]=isset($_POST['OR5']) ? $_POST['OR5'] : null;
                    $array[5]=isset($_POST['OR6']) ? $_POST['OR6'] : null;
                    $array[6]=isset($_POST['OR7']) ? $_POST['OR7'] : null;
                    $array[7]=isset($_POST['OR8']) ? $_POST['OR8'] : null;

                    for($i = 0; $i < count($array); $i++)
                    {
                    if(isset($array[$i])){
                    $actidad_eco = $dom->createElement('actidad_eco', '');
                    $actividades_eco->appendChild($actidad_eco);
                    $persona_AE = $dom->createElement('persona_AE', 'OTRO RESPONSABLE');
                    $actidad_eco->appendChild($persona_AE);
                    $ocupacion = $dom->createElement('ocupacion', $array[$i]);
                    $actidad_eco->appendChild($ocupacion);

                    }
                    }
                    //------------------------------------------------------------------

                    //--------------------------- ACT.E. OTRO RESPONSABLE --------------
                    $array[0]=isset($_POST['EST1']) ? $_POST['EST1'] : null;
                    $array[1]=isset($_POST['EST2']) ? $_POST['EST2'] : null;
                    $array[2]=isset($_POST['EST3']) ? $_POST['EST3'] : null;
                    $array[3]=isset($_POST['EST4']) ? $_POST['EST4'] : null;
                    $array[4]=isset($_POST['EST5']) ? $_POST['EST5'] : null;
                    $array[5]=isset($_POST['EST6']) ? $_POST['EST6'] : null;
                    $array[6]=isset($_POST['EST7']) ? $_POST['EST7'] : null;
                    $array[7]=isset($_POST['EST8']) ? $_POST['EST8'] : null;

                    for($i = 0; $i < count($array); $i++)
                    {
                    if(isset($array[$i])){
                    $actidad_eco = $dom->createElement('actidad_eco', '');
                    $actividades_eco->appendChild($actidad_eco);
                    $persona_AE = $dom->createElement('persona_AE', 'ESTUDIANTE');
                    $actidad_eco->appendChild($persona_AE);
                    $ocupacion = $dom->createElement('ocupacion', $array[$i]);
                    $actidad_eco->appendChild($ocupacion);

                    }
                    }
                    //------------------------------------------------------------------

                    //----------------- DATOS FAMILIARES -------------------------------
                    $datos_familiares = $dom->createElement('datos_familiares','');
                    $datos->appendChild($datos_familiares);

                    $grupo_conv = $dom->createElement('grupo_conv',$GC);
                    $datos_familiares->appendChild($grupo_conv);
                    $num_herm = $dom->createElement('num_herm', $N_Herm);
                    $datos_familiares->appendChild($num_herm);
                    $num_hermNOe = $dom->createElement('num_hermNOe', $N_Herm_NE);
                    $datos_familiares->appendChild($num_hermNOe);
                    $num_hermIEE = $dom->createElement('num_hermIEE', $N_Herm_Est_IEE);
                    $datos_familiares->appendChild($num_hermIEE);
                    $num_hermIEP = $dom->createElement('num_hermIEP', $N_Herm_Est_IEP);
                    $datos_familiares->appendChild($num_hermIEP);
                    //------------------------------------------------------------------

                    //----------------- SALUD ------------------------------------------
                    $salud = $dom->createElement('salud','');
                    $datos->appendChild($salud);

                    $adol_enf = $dom->createElement('adol_enf',$Adol_Enf);
                    $salud->appendChild($adol_enf);
                    $seg_acc = $dom->createElement('seg_acc', $Seg_Acc);
                    $salud->appendChild($seg_acc);
                    $seg_enf = $dom->createElement('seg_enf', $Seg_Enf);
                    $salud->appendChild($seg_enf);
                    //------------------------------------------------------------------

                    //------------------------------- MAS DATOS DEL ALUMNO -------------
                    $mas_datos_alumno = $dom->createElement('mas_datos_alumno','');
                    $datos->appendChild($mas_datos_alumno);

                    $interrup_EU = $dom->createElement('interrup_EU',$Int_EU);
                    $mas_datos_alumno->appendChild($interrup_EU);
                    $interrup_EU_mot = $dom->createElement('interrup_EU_mot', $mot_int_est);
                    $mas_datos_alumno->appendChild($interrup_EU_mot);
                    $secundaria = $dom->createElement('secundaria', $Sec_Col);
                    $mas_datos_alumno->appendChild($secundaria);
                    $ciudad_proc = $dom->createElement('ciudad_proc', $Ciu_Pro);
                    $mas_datos_alumno->appendChild($ciudad_proc);
                    $dep = $dom->createElement('dep', $Dep_L);
                    $mas_datos_alumno->appendChild($dep);
                    $prov = $dom->createElement('prov', $Pro_L);
                    $mas_datos_alumno->appendChild($prov);
                    $dist = $dom->createElement('dist', $Dist_L);
                    $mas_datos_alumno->appendChild($dist);
                    //creamos un nodo para codigo de colegio
                    $cod_cole=$dom->createElement('Col_Id',$cboColegioProce);
                    $mas_datos_alumno->appendChild($cod_cole);
                    //------------------------------------------------------------------
                
                    //------------------------------- OTROS DATOS DEL ALUMNO -------------
                    $otros_datos_alumno = $dom->createElement('otros_datos_alumno','');
                    $datos->appendChild($otros_datos_alumno);
                    $nom_emerg = $dom->createElement('nom_emerg',$nom_emerg_);
                    $otros_datos_alumno->appendChild($nom_emerg);
                    $tel_emerg = $dom->createElement('tel_emerg', $tel_emerg_);
                    $otros_datos_alumno->appendChild($tel_emerg);
                    $dep_econom = $dom->createElement('dep_econom', $dep_econom_);
                    $otros_datos_alumno->appendChild($dep_econom);
                    $transporte = $dom->createElement('transporte', $transporte_);
                    $otros_datos_alumno->appendChild($transporte);
                    $ingreso = $dom->createElement('ingreso', $ingreso_);
                    $otros_datos_alumno->appendChild($ingreso);
                    $internet = $dom->createElement('internet', $internet_);
                    $otros_datos_alumno->appendChild($internet);
                    $facebook = $dom->createElement('facebook', $facebook_);
                    $otros_datos_alumno->appendChild($facebook);
                    $twitter = $dom->createElement('twitter', $twitter_);
                    $otros_datos_alumno->appendChild($twitter);
                    $acept_inf = $dom->createElement('acept_inf', $acept_inf_);
                    $otros_datos_alumno->appendChild($acept_inf);
                    //------------------------------------------------------------------

                    //------------------------------- AUX DATOS DEL ALUMNO -------------
                    $aux_datos_alumno = $dom->createElement('aux_datos_alumno','');
                    $datos->appendChild($aux_datos_alumno);

                    $codigoX = $dom->createElement('codigoX',$codigo);
                    $aux_datos_alumno->appendChild($codigoX);

                    $usuario = $dom->createElement('usuario',$_SESSION['dni']);
                    $aux_datos_alumno->appendChild($usuario);

                    $razon = $dom->createElement('razon','probando');
                    $aux_datos_alumno->appendChild($razon);

                    //------------------------------------------------------------------
              //

                    $archivo=$dom->saveXML();
                    /*$view->Reg_Ficha=*///Datos::insertFicha($archivo,$codigo,'46153858','probando');

                    $rpta=Logica::PA_UPLA("[Ficha].[PA_Fic_I_1]","json",$archivo,true);
                    
                    $v_fch=isset($_POST['fech_nac']) ? $_POST['fech_nac'] : null;
                    $v_tel=$_POST['tel-F'];
                  
                    if ($v_tel==null) {
                          $v_tel='000000';
                    }
                    //isset($_POST['tel-F']) ? $_POST['tel-F'] : 000;

                    $v_cel=isset($_POST['tel-Cel']) ? $_POST['tel-Cel'] : null;
                    $v_mail=isset($_POST['e-mail']) ? $_POST['e-mail'] : null;
                    $v_dir=isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
                    $v_Eciv=isset($_POST['estado_civ']) ? $_POST['estado_civ'] : null;
                    $v_dni=isset($_POST['dni']) ? $_POST['dni'] : null;

                    $xml='
                            <Dato>
                                <x_cod>'.$codigo.'</x_cod>,
                                <x_ECiv>'.$v_Eciv.'</x_ECiv>,
                                <x_Fnac>'.$v_fch.'</x_Fnac>,
                                <x_Tel>'.$v_tel.'</x_Tel>,
                                <x_Cel>'.$v_cel.'</x_Cel>,
                                <x_Mail>'.$v_mail.'</x_Mail>,
                                <x_Dir>'.$v_dir.'</x_Dir>,
                                <x_dni>'.$v_dni.'</x_dni>,
                            </Dato>
                    ';
                    $rpta1=Logica::PA_UPLA("[Ficha].[PA_RegDatAcd_I_1]","json",$xml,true);

                    if($usuAdmin=='admin')
                    {
                        header('Location: fseco-adm?codBuscar='.$codigo);
                    }
                    else if($usuAdmin=='usu'){
                        header('Location:fseco-usu');
                    }
                break;
            default :
                break;
            }
         }
        ########################################
        #########################################
        ##########################################
    }

        );

#LISTA DE DEPARTAMENTO
    route('/fseco-usu-ListDep',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $data=Logica::PA_UPLA("[Ficha].[PA_ListDep_L]","array");
            opciones_combo($data,"id","departamento");
        }
        else
        {
            echo 'salir';
        }
    });
#FIN LISTA DE DEPARTAMENTO

##lISTA DE PROVINCIA
    route('/fseco-usu-ListProv',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="<Dato><x_dep>".$_GET["code"]."</x_dep></Dato>";
            $data=Logica::PA_UPLA("[Ficha].[PA_ListProv_L_1]","array",$cod);
            opciones_combo($data,"id","provincia");
        }
        else
        {
            echo 'salir';
        }
    });
## FIN LISTA DE PROVINCIA

##lISTA DE DISTRITO
    route('/fseco-usu-ListDistr',"GET",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $cod="
            <Dato>
                <x_dep>".$_GET["dep"]."</x_dep>,
                <x_pro>".$_GET["pro"]."</x_pro>
            </Dato>";
            $data=Logica::PA_UPLA("[Ficha].[PA_ListDist_L_1]","array",$cod);
            opciones_combo($data,"id","distrito");
        }
        else
        {
            echo 'salir';
        }
    });
    
## FIN LISTA DE DISTRITO

##lista de colegios
    route('/fseco-usu-ListColegio',"GET",function($params)
    {        
      if(seguridad_sesion($params[0],true))
        {
            $cod="
            <Dato>
                <x_dep>".$_GET["dep"]."</x_dep>,
                <x_pro>".$_GET["pro"]."</x_pro>,
                <x_dis>".$_GET["dis"]."</x_dis>,
                <x_col>".$_GET["col"]."</x_col>
            </Dato>";
            $data=Logica::PA_UPLA("[Ficha].[PA_ListColegio]","array",$cod);
            opciones_combo($data,"id","colegio");
        }
        else
        {
            echo 'salir';
        }
    });
##fin lista de colegios

##lista de id colegio
    route('/fseco-usu-ListColegio_Id',"GET",function($params)
    {        
      if(seguridad_sesion($params[0],true))
        {
            $cod="
            <Dato>
                <x_codId>".$_GET["codId"]."</x_codId>
            </Dato>";
            $data=Logica::PA_UPLA("[Ficha].[PA_ListColegio_Id]","json",$cod);
        }
        else
        {
            echo 'salir';
        }
    });
##fin lista de Id colegio

#REPORTE FSECO-ADM
   route('/fseco-adm-reporte',"POST",function($params)
    {        
        if(seguridad_sesion($params[0],true))
        {
            $nomArchivo='RPT_FSECO_Est';//nombre del archivo JASPER                    
            $cod=isset($_POST['cod']) ? $_POST['cod'] : null ;
            $rpt=isset($_POST['rpt']) ? $_POST['rpt'] : null ;
            $parametros=array
            (
                array("cod",$cod),
                array("rpt",$rpt)
            );
            set_reporte_jasper($nomArchivo,$parametros);        
        }
    });   

#FIN REPORTE FSECO-ADM

#REPORTE FSECO-usuario
   route('/fseco-usu-reporte',"post,get",function($params)
    {      
        echo "<html>";
        echo "<head>";
        set_status_code(200);
        conf_pre();
        set_librerias("jquery.PrintArea.js"); 
       // seguridad_sesion($params[0]);
        $url_reporte_fseco='';
        if(seguridad_sesion($params[0],true))
        {
            $nomArchivo='rpt_constancia';//nombre del archivo JASPER                    
            $cod=isset($_POST['cod']) ? $_POST['cod'] : null ;
            $rpt=isset($_POST['rpt']) ? $_POST['rpt'] : null ;
            $parametros=array
            (
                array("cod",$cod),
                array("rpt",$rpt)
            );
            $url_reporte_fseco=set_reporte_jasper($nomArchivo,$parametros,1140,620,'.html');  
        }
       Script('$(document).ready(function()
            {
                
                $("#btnPrinter").bind("click",function()
                    {
                        $("#imprimir_capa").printArea();
                    });
                $("#imprimir_capa").load("'.$url_reporte_fseco.'");
            });'
        );  
        echo "</head>";
        echo "<body style='text-align:center;'>"; 
        echo"<p><input type='button' id='btnPrinter' value='Imprimir Constancia'></p>";
            echo "<div class='imprimir_' id='imprimir_capa'>";
                
            echo "</div>";
            
        echo "</body>";
        echo "</html>"; 
    });   

#FIN REPORTE FSECO-usuario
    
##################################################################################################
######################### FIN FICHA SOCIO ECONOMICA ##############################################
##################################################################################################
  respuesta_estado(404);
?>
