<style type="text/css">
    #bannerfondo
    {
        background:#e8e8e8;
        height:375px;
        width:100%;        
        text-align:center;
        text-align:-webkit-center;
        text-align:-o-center;
        text-align:-moz-center;
        text-align:-ms-center;

        z-index:1;
        position: absolute;
        top: 35;
        min-width: 1000px;

    }
    #dentroimagen
    {        
        /*
        height: 375px;
        position: absolute;   
        */
        width: 900px;     
    }    

    #banner
    {        
        height: 366px;
        width: 900px;        
        z-index:2;      
        /*border: 1px solid black;     */
        background:white;  

        margin:0 auto;/*para iexplore fundamental*/
    }
    #banner img
    {
        width:100%;        
        height: auto;
    }
    
    #foto_perfil
    {
        background: white;
        height: 149px;
        width: 144px;
        z-index:5;
        position: absolute;
        top:237;    
        padding:6px 6px 6px 6px;    
        border:1px solid rgb(226, 226, 226);
        border-radius:3px 3px 3px 3px;
    }
    #foto_perfil img
    {
        width:100%;
        height: 100%; 
        border-radius:3px 3px 3px 3px;   
    }
    #contfper
    {
        width:90%;
    }

    #muro
    {
        background: #e8e8e8;
        height:400%;
        width: 900px;
        position: absolute;
        top:402px;
        /*left: 348px;*/
        z-index: 1;
    }
    #menux
    {
        background:white;
        height: 50px;
        width: 900px;
        position: absolute;
        z-index: 2;
        top: 366px;
        border-radius: 0px 0px 7px 7px;
        border: 1px solid rgb(207, 207, 207);
        

    }

    .novedades
    {
        background: white;
        height: auto;
        width: 270px;
        /*padding: 5px 10px 5px 10px;*/
        border-radius: 3px 3px 3px 3px;
        /*position: absolute; 
        top:431px;*/
        border: 1px solid rgb(207, 207, 207);
        margin: 10 auto;
    }

    .novedades-agregar
    {
        background: white;
        height: auto;
        width: 270px;
        /*padding: 5px 10px 5px 10px;*/
        border-radius: 3px 3px 3px 3px;
        /*position: absolute; 
        top:70px;*/
        border: 1px solid rgb(207, 207, 207);
    }

    .novedades-agregar-muro
    {
        background: white;
        height: auto;
        width: 600px;
        /*padding: 5px 10px 5px 10px;*/
        border-radius: 3px 3px 3px 3px;
        /*position: absolute; 
        top:70px;*/
        border: 1px solid rgb(207, 207, 207);

    }

    .submuro    
    {
        background: white;
        height: auto;
        width: 600px;
        /*right:0%;
        /*padding: 5px 10px 5px 10px;*/
        border-radius: 3px 3px 3px 3px;
        /*position: absolute;         */
        border: 1px solid rgb(207, 207, 207);
        margin: 10 auto;
    }
    .subtitulos
    {
        border-radius: 2px 2px 0px 0px;
        background:rgba(182, 182, 182, 0.15);
        height:33px;         
        text-align: left; 
        padding: 16px 16px 0px;
        border-bottom: 1px solid rgb(226, 226, 226);  
        color: rgb(100, 100, 100);      
    }

    #subtitulos_visor
    {
        border-radius: 2px 2px 0px 0px;
        background:rgba(182, 182, 182, 0.15);     
        text-align: left; 
        padding: 8px 16px 5px;
        border-bottom: 1px solid rgb(226, 226, 226);  
        color: rgb(100, 100, 100);      
    }
    
    .novedad
    {
        padding: 7px 15px 7px 12px;  
    }
    .novedad img
    {
        /*padding: 7px 7px 7px 7px;  */
        border-radius: 3px 3px 3px 3px;               
        border: 1px solid rgb(226, 226, 226); 
    }
    .novedad p
    {
        text-align: justify;
        font:italic 12px 'Open Sans Condensed', sans-serif;
        padding: 2px 15px 2px 15px;
    }

    .titunove
    {
        padding: 7px 7px 7px 7px;
        color:rgb(99, 99, 99);        
    }
   
    .duenio
    {
        margin: 0 auto;    
        padding: 0px 15px 0px 54px;
    }
    .duenio img
    {
        position: absolute;
        left: 15px;
    }
    .duenio p
    {
        /*position: absolute;*/
        color:rgb(185,185,185);
        text-align: left;     
          
        font-size:14px;
        line-height: 29px;        
    }

  
    .murito
    {
        padding: 0px 15px 7px 15px;  
    }
    .murito img
    {
        /*padding: 7px 7px 7px 7px;  */
        /*border-radius: 3px 3px 3px 3px;
        border: 1px solid rgb(226, 226, 226); */
        border-bottom: 1px solid rgb(230, 230, 230);
    }
    .murito p
    {
        text-align: justify;
        font:italic 12px 'Open Sans Condensed', sans-serif;
        padding: 2px 15px 2px 15px;
    }
    .titunovemuri
    {
        padding: 7px 7px 15px 7px;
        text-align: right;
        color:rgb(99, 99, 99);
    }    

    .rayapeque 
    {
        /* background: rgba(255,255,255,0.25); */
        background-color: rgba(199, 199, 199,0.25);
        height: 1px;
        width: 239px;
        border: none;
    }

    .rayagrande 
    {
        /* background: rgba(255,255,255,0.25); */
        background-color: rgba(199, 199, 199,0.25);
        height: 1px;
        width: 572;
        border: none;
    }

    #opciones
    {     
        /*background: orange;   */
        width: auto;
        height: 50px;
        z-index: 2;
        position:absolute;   
        left: 299px;
        color:rgb(100, 100, 100);
    }
    .opcion
    {
        width: 100px;
        height: 100%;        
        /*background: orange;  */
        text-align: center;
        border-left:1px solid rgb(207, 207, 207);
        border-right:1px solid rgb(207, 207, 207);
        
        line-height: 47px;/*alinear vertical*/
        position: absolute;  
        color: inherit;      
    }

    .imamuro
    {
        border: 1px solid rgb(230, 230, 230);
    }

    /**********************/


/*----------------------------
    The Navigation Menu
-----------------------------*/


#colorNav > ul{
    width: 450px; /* Increase when adding more menu items */
    margin:0 auto;    
    height: 100%;    

}

#colorNav > ul > li{ /* will style only the top level li */
    list-style: none;
    box-shadow: 0 0 10px rgba(100, 100, 100, 0.2) inset,1px 1px 1px #CCC;
    display: inline-block;
    line-height: 1;
    margin: 1px;
    border-radius: 3px;    
    /*position:relative;*/
}

#colorNav > ul > li > a{
    /*color:inherit;
    text-decoration:none !important;
    font-size:24px;
    padding: 25px;*/
}

#colorNav li ul{
    position:absolute;
    list-style:none;
    text-align:center;
    /*width:180px;*/
    left:563px;
    margin-left:-300px;

    top:25px;
    font:bold 12px 'Open Sans Condensed', sans-serif;/* bonita fuente*/

    /* This is important for the show/hide CSS animation */
    max-height:0px;
    overflow:hidden;    
    
    -webkit-transition:max-height 0.4s linear;
    -moz-transition:max-height 0.4s linear;
    -ms-transition:max-height 0.4s linear;
    -o-transition:max-height 0.4s linear;
    transition:max-height 0.4s linear;        
}

#colorNav li ul li{
background-color:rgb(247, 247, 247);
}

#colorNav li ul li a{
padding:5px;
color: rgb(100, 100, 100);
/*text-decoration:none !important;*/
display:block;
border: 1px solid #D3D3D3;/*1px solid rgb(199, 196, 196)*/
}

#colorNav li ul li:nth-child(odd){ /* zebra stripes */
background-color:#D3D3D3;
}

#colorNav li ul li:hover{
background-color:rgb(252, 214, 134);
}

#colorNav li ul li:first-child{
border-radius:3px 3px 0 0;
margin-top:25px;
position:relative;
}

#colorNav li ul li:first-child:before{ /* the pointer tip */
content:'';
position:absolute;
width:1px;
height:1px;
border:5px solid transparent;
border-bottom-color:#D3D3D3;
left:40%;
top:-10px;
margin-left:-5px;
}

#colorNav li ul li:hover:first-child:before
{    
    content:'';
    position:absolute;
    width:1px;
    height:1px;
    border:5px solid transparent;
    border-bottom-color:rgb(252, 214, 134);
    left:40%;
    top:-10px;
    margin-left:-5px;
}

#colorNav li ul li:last-child{
border-bottom-left-radius:3px;
border-bottom-right-radius:3px;
}

/* This will trigger the CSS */
/* transition animation on hover */

#colorNav li:hover ul{
max-height:1000px; /* Increase when adding more dropdown items */
}

 /********************/
 /****** INPUT ******/
 /*******************/
.textoinput
{
    width: 100%;
    padding: 3px;
    height: 29px;
}
.btnletra
{
    background:rgba(255,255,255,0);
    border:none;
    color:red;
}
.boton
{
    border: none;
    background: #3071a9;
    color: white;
    border-radius: 2px;
    width: 100px;
    height: 30px;
    font-size: 14px;
    /*text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;*/
}

.boton:hover
{
    background: #285e8e;    
}
#izquierda
{
    top: 60px;
    position: absolute;    
}


#derecha
{
    left: 299px;
    position: absolute;
    top: 70px;
}
#cap_mejorandoimagen
{
    background: rgba(0, 0, 0, 0);
    height: 365px;
    z-index: 5;
    position: absolute;
    top: 1;
    width: 901px;
}

div.upload {
    width: 39px;
    height: 34px;
    background: url(Capa_Presentacion/Recursos/imagesini/upload.png);
    overflow: hidden;
    position: absolute;
    margin: 23;
    z-index: 100;
    
}
div.upload:hover
{
    background: url(Capa_Presentacion/Recursos/imagesini/upload2.png);    
    width: 131px;
    height: 34px;
    margin: 23;
    transition:all 0.5s ease-in 0s;
    -moz-transition:all 0.5s ease-in 0s;
    -o-transition:all 0.5s ease-in 0s;
    -webkit-transition:all 0.5s ease-in 0s;
    -ms-transition:all 0.5s ease-in 0s;
}

div.upload input {    
    opacity: 0 !important;
    width: 100%;
    height: 100%;    
}

div.upload-perfil {
    width: 39px;
    height: 34px;
    background: url(Capa_Presentacion/Recursos/imagesini/upload_perfil.png);
    overflow: hidden;
    position: absolute;
    margin: 0;
    z-index: 100;
    top: 122px;
    
}

div.upload-perfil:hover
{
    background: url(Capa_Presentacion/Recursos/imagesini/upload_perfil2.png);
    background-color: rgba(0,0,0,0.5);
    width: 143px;        
    
    transition:width, height 0.5s linear 0s;
    -moz-transition:width, height 0.5s linear 0s;
    -o-transition:width, height 0.5s linear 0s;
    -webkit-transition:width, height 0.5s linear 0s;
    -ms-transition:width, height 0.5s linear 0s;
}


div.upload-perfil input {    
    opacity: 0 !important;
    width: 100%;
    height: 100%;    
}

/****** file ******/

 #progress_bar {
    margin: 10px 0;
    padding: 3px;
    border: 1px solid #000;
    font-size: 14px;
    clear: both;
    opacity: 0;
    -moz-transition: opacity 1s linear;
    -o-transition: opacity 1s linear;
    -webkit-transition: opacity 1s linear;
    z-index: 20;
    position: absolute;
    width: 891px;
    top: 145px;
  }
  #progress_bar.loading {
    opacity: 1.0;
  }
  #progress_bar .percent {
    background-color: #99ccff;
    height: auto;
    width: 0;
  }
 
</style>

<input type="hidden" id="anchobannerimg" value="0" />
<input type="hidden" id="altobannerimg" value="0" />
<input type="hidden" id="ultimapublicacion" value="0"/>
<input type="hidden" id="primerapublicacion" value="0">

<input type="hidden" id="semaforo" value="verde">
<input type="hidden" id="eligioimg" value="0">

<div id="bannerfondo">    
    <div id="banner">
        <!--button onclick="abortRead();">Cancel read</button-->
        <div id="progress_bar"><div class="percent">0%</div></div>
        <div class="upload" id="cambiar-portada">
            <input type="file" id="subirfondobanner" />
            
            <script type="text/javascript">
                var _URL = window.URL || window.webkitURL;

                $("#subirfondobanner").change(function(e)
                {   
                    notificacion(1,"¡PrOntO!","Habilitaremos la opción para guardar su banner - Oficina de Informática, trabajando para brindarle un mejor servicio.");                        
                    //$("#banerimagen").remove();
                    //$("#dentroimagen").append("<?php set_imagen_style("",'id=banerimagen');?>");
                    
                    $("#cap_mejorandoimagen").hide();
                    //alert("se esta quitando la capa de bloqueo");

                    $("#dentroimagen").css("position","absolute");//para posicionar la imagen en absolute
                    $("#dentroimagen").css("top","0px");

                    
                    readURL(this,"banerimagen");
                    
                    var file, img;
                    if ((file = this.files[0])) {
 
                    img = new Image();
                    img.onload = function () 
                    {
                        //alert(this.width + " " + this.height);
                        $("#anchobannerimg").val(this.width);
                        $("#altobannerimg").val(this.height);

                        //if(this.height<=400 || (this.width>=1500 && this.width<=1000))
                        if(this.height<=390 && this.width>=900)
                            $("#banerimagen").height("100%");       
                        else if(this.height>390 && this.width<900)
                            $("#banerimagen").height("auto");       
                        else if(this.height<=390 && this.width<=900)
                            $("#banerimagen").height("100%");       
                        else if(this.height>390 && this.height< (this.width/2) && this.width>900)
                            $("#banerimagen").height("100%");
                        else if(this.width>(this.width/3) && this.width>900)
                            $("#banerimagen").height("auto");
                         
                    };
                    img.src = _URL.createObjectURL(file);                    
                    }                      
                });

            </script>
        </div>
        <?php   
            $usu_aux=$_SESSION['dni']; 
            if(isset($_GET["dequien"]))
            {                    
                if(trim($_GET["dequien"])!='' || isset($_GET["dequien"]))
                {
                    $usu_aux=$_GET["dequien"];                     
                }
            }

            $datos_ar=Logica::PA_UPLA('seguridad.paCon_MostrarDatosUsuario_esp','array','<Datos><usuario>'.$usu_aux.'</usuario></Datos>'); 
            
        ?>
        <div class="dragableElement" id="dentroimagen">            
            <?php set_imagenLazy_fuera($datos_ar[0]['banner'],'id="banerimagen"');?>
        </div>
        <div id="cap_mejorandoimagen"></div> 
        <div id="contfper">
            <div id="foto_perfil">
                <?php set_imagenLazy_fuera($datos_ar[0]["fotoperfil"]);?>  
                <div class="upload-perfil" id="cambiar-foto-perfil"><input type="file" id="subirperfill"/></div>
                <p style="position: absolute;color: white;font: bold 24px 'Open Sans Condensed', sans-serif;width: 400px;top: 66;left: 175;text-shadow: -1px 0 rgb(66, 66, 66),0 1px rgb(66, 66, 66),1px 0 rgb(66, 66, 66),0 -1px rgb(66, 66, 66); text-align: left;">
                <?php 
                    $array_nombre=explode(" ",utf8_encode($datos_ar[0]['nomape']));
                    echo ucwords(strtolower($array_nombre[0]." ".$array_nombre[1]));
                ?>
                </p>               
            </div>    
        </div>        
        <div id="menux">
            <div id="nombre_pek">
                <p style="position: absolute;color: rgb(189, 189, 189);font: normal 19px 'Open Sans Condensed', sans-serif;width: 300px;top: -6;left:-5;">
                    <?php 
                        $array_nombre=explode(" ",utf8_encode($_SESSION['nomape']));
                        echo ucwords(strtolower($array_nombre[0]." ".$array_nombre[1]));
                    ?>
                </p>               
            </div>
            <div id="opciones"> 
                <a class="opcion" href="inicio?filtro=mimuro&dequien=<?php echo $_SESSION['dni'];?>" onmouseOver="$(this).css('background-color','rgba(236,236,236,0.5)');" onmouseout="$(this).css('background-color','rgba(255,255,255,0)');" style="left:0px">Mi Muro</a>                                
                <a class="opcion" href="inicio?filtro=noticias" onmouseOver="$(this).css('background-color','rgba(236,236,236,0.5)');" onmouseout="$(this).css('background-color','rgba(255,255,255,0)');" style="left:101px">Noticias</a>
                <a class="opcion" href="inicio?filtro=eventos" onmouseOver="$(this).css('background-color','rgba(236,236,236,0.5)');" onmouseout="$(this).css('background-color','rgba(255,255,255,0)');" style="left:202px">Eventos</a>                                                
                <nav id="colorNav">
                    <ul>
                        <li onmouseover="$('#ulopcion').css('max-height','1000px');" onmouseout="$('#ulopcion').css('max-height','00px');">
                            <a class="opcion" onmouseOver="$(this).css('background-color','rgba(236,236,236,0.5)');" onmouseout="$(this).css('background-color','rgba(255,255,255,0)');" style="left:303px">Muro<?php set_imagenLazy("imagesini/flechaabajo.png","style='width: 13px;height: 16px;left: 70%;top: 32%;position: absolute;opacity: 0.70;'");?></a> 
                            <ul id="ulopcion">
                            <?php 
                                $data=Logica::PA_UPLA("[General].[paCon_dependencias]","array","",false);                                                        
                                opciones_menu($data,"id","detalle","sigla","Todas las Dependencias"); 
                            ?>  
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

            <div id="izquierda">

                <div class="novedades-agregar" id="datos-perfil">
                    <!--a href="#" id="mostrar_perfil"-->
                    <div class="subtitulos" style="text-align:center;">Perfil</div>
                    <!--/a-->
                    
                        <div class="novedad" id="caja_perfil">
                            <div style="position:absolute;">Nombre: </div>
                            <div style="text-align:right;"><?php echo (trim($datos_ar[0]['nomape'])=="")?"?":substr(ucwords(strtolower(utf8_encode($datos_ar[0]['nomape']))),0,21).((strlen(utf8_encode($datos_ar[0]['nomape']))>21)?"...":"");?></div>
                            <div style="position:absolute;">Cumple: </div>
                            <div style="text-align:right;"><?php echo (trim($datos_ar[0]['fnacusuario'])=="")?"?":utf8_encode($datos_ar[0]['fnacusuario']);?></div>                            
                            <!--div style="position:absolute;">Sexo: </div>
                            <div style="text-align:right;"><?php //echo ucwords(strtolower($_SESSION['sexo']));?></div-->                            
                            <div style="position:absolute;">Celular: </div>
                            <div style="text-align:right;"><?php echo (trim($datos_ar[0]['celular'])=="")?"?":ucwords(strtolower($datos_ar[0]['celular']));?></div>                            
                            <div style="position:absolute;">Carrera: </div>
                            <div style="text-align:right;"><?php echo (trim($datos_ar[0]['carrera'])=="")?"?":substr(ucwords(strtolower(utf8_encode($datos_ar[0]['carrera']))),0,20).((strlen(utf8_encode($datos_ar[0]['carrera']))>20)?"...":"");?></div>                            
                        </div>
                </div>             
                <div class="novedades-agregar" id="agregar-novedad">
                    <a href="#" id="mostrar"><div class="subtitulos">¿Alguna Novedad?</div></a>
                        <div class="novedad" id="caja" style="display: none;">
                            <div class="titunove"><input class="textoinput" type="text" id="titulo-nove" style="text-align:center;" placeholder="Ingrese el título"/></div>
                            <div class="titunove">
                                <select class="textoinput" style="width: 230px;background: white; text-align:center;" id="recurso">
                                    <option value="img">imagen</option>
                                    <option value="vid">video</option>
                                </select>
                            </div>
                            <div class="titunove">
                                <input class="textoinput" type="file" id="add_ima" name="add_ima" style="width:229px;border:1px solid rgb(187, 187, 187);" tabindex="4" />
                                <input class="textoinput" type="text" id="video-nove" style="text-align:center;" placeholder="Ingrese url" title="Ctr+V" />
                            </div>       
                            <div class="titunove">
                                <img id="previsu-nove" src="#" alt="your image" />
                                <iframe width="100%" height="300" id="prevideo-nove" src="" frameborder="0" allowfullscreen></iframe>

                                <script type="text/javascript">                                    

                                    $('#add_ima').bind('change', function() 
                                    {
                                        var ext=$("#add_ima").val().split('.').pop().toLowerCase();
                                        if($.inArray(ext,["gif","jpg","jpge","tif","tiff","ico","png"])==-1)
                                        {
                                            alerta("Este tipo de Archivo no esta permitido: Solo puede subir archivos - imagen de formato: gif, jpg, jpge, tif, tiff, ico, png","Aviso");
                                            $('#add_ima').val("");
                                            $("#previsu-nove").hide();
                                        }
                                        else
                                        {
                                            readURL(this,"previsu-nove");                                
                                            $("#previsu-nove").show();    
                                        }                                        
                                        
                                    });
                                    /*
                                    $("#add_ima").change(function(){
                                        readURL(this,"previsu-nove");                                
                                        $("#previsu-nove").show();
                                    });
                                    */

                                    $("#video-nove").on('keyup', function(){                                    
                                        /*alert(convertir($("#video-nove-muro").val()));*/
                                        $("#prevideo-nove").attr("src",convertir($("#video-nove").val()));
                                        $("#prevideo-nove").show();
                                    });

                                    $("#video-nove").bind("contextmenu",function(e){return false});

                                </script>

                            </div>
                            <div class="titunove"><textarea class="textoinput" id="titulo-nove" style="text-align:center; height:100px;max-width:229px;" placeholder="¿Alguna descripción?"></textarea></div>
                            <hr class="rayapeque">
                            <button class="boton" onclick="alert()">Publicar</button>
                            <!--hr class="rayapeque"-->
                        </div>
                </div>
                <script type="text/javascript">
                
                        $("#recurso").change(function()
                        {         
                            $("#previsu-nove").hide();    
                            $("#prevideo-nove").hide();     
                            $("#video-nove").val("");     
                            $("#add_ima").val("");
                            
                           switch($("#recurso").val())
                           {
                                case "img": $("#video-nove").hide(); $("#add_ima").show();break;
                                case "vid": $("#video-nove").show(); $("#add_ima").hide();break;
                           }                           
                        });                                    
                        $(function()
                        {
                            $("#mostrar").click(function(event) 
                            {
                                //$("#caja2").append($("#caja2").text().trim()+"holaaa");
                                event.preventDefault();  
                                $("#caja").slideToggle();                                
                            });                                    
                        });
                    
                </script>
                
                <div class="novedades">
                    <div class="subtitulos" style="text-align:center;">Novedades</div>
                        <div class="novedad" id="muro-novedades">
                            <?php 
                                
                                $datos=Logica::PA_UPLA("[seguridad].[paCon_notificacion]","array","");  
                                $i=1;
                                foreach ($datos as $array_nove):

                                    
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
                            ?>
                            <div class="titunove"><?php echo $titulo;?></div>
                            <div>
                                <!--iframe width="100%" height="300" src="//www.youtube.com/embed/hxDc4O2MWLI?list=PLlWB3f78Xu4lmJBCNcZgH1BT20mYoYrTM" frameborder="0" allowfullscreen></iframe-->                        
                                <div>                                                            
                                    <div style="cursor: pointer;" id="capa_imagen_novedad_<?php echo $i;?>" onclick="verimagen_noticia('<?php echo $nombre_img;?>','<?php echo $titulo;?>','<?php echo $texto;?>','novedadgenerada_<?php echo $i;?>');">
                                        <?php set_imagenLazy_fuera($nombre_img,"id=novedadgenerada_".$i);?>
                                    </div>
                                    <iframe width="100%" height="300" id="prevideo_novedad_<?php echo $i;?>" src="" frameborder="0" allowfullscreen></iframe>
                                </div>
                                    <p id="resumen_nove_<?php echo $i;?>">
                                        <?php                                                                                        
                                            echo (strlen(trim($texto))>200)?substr(trim($texto), 0,200)."<a href='' id='seguirleyendo_nove_".$i."'>... Seguir leyendo</a>":trim($texto);
                                        ?>
                                    </p>  
                                    <script type="text/javascript">                                     
                                        $(function()
                                        {
                                            $("#seguirleyendo_nove_<?php echo $i;?>").click(function(event) 
                                            {
                                                event.preventDefault();//evita que se recargue la hoja
                                                //$("#seguirleyendo_nove_<?php echo $i;?>").remove();                                   
                                                $("#resumen_nove_<?php echo $i;?>").empty();
                                                $("#resumen_nove_<?php echo $i;?>").append('<?php echo $texto;?>');
                                            });                                    
                                        });   
                                        $(function()
                                        {
                                            switch("<?php echo $imagen_o_video_nov; ?>")
                                            {
                                                case "img": $("#prevideo_novedad_<?php echo $i;?>").hide();break;
                                                case "vid": $("#capa_imagen_novedad_<?php echo $i;?>").hide();
                                                            $("#prevideo_novedad_<?php echo $i;?>").attr("src",convertir("<?php echo $nombre_video;?>"));break;
                                            }

                                        });                    
                                    </script>                          
                            </div>
                            <hr class="rayapeque">  
                            <?php
                            $i++;
                                endforeach;
                            ?>
                        </div>
                </div>
            </div>

             <div id="derecha">
                <div class="novedades-agregar-muro" id="agregar-muro">
                    <a href="#" id="mostrar_muro"><div class="subtitulos">¿Algo que agregar?</div></a>
                        <div class="novedad" id="caja_muro" style="display: none;">
                            <div class="titunove" style="text-align:left">
                                <select class="textoinput" style="width: 50%;background: white; text-align:left;" id="dependencia-publicar">                                 
                                <?php 
                                    $data=Logica::PA_UPLA("[seguridad].[paCon_dependenciaposibles]","array","<Dato><usuario>".$_SESSION['dni']."</usuario></Dato>",false);
                                    opciones_combo($data,"id","detalle","¿Dependencia?"); 
                                ?>                                  
                                </select>
                                <select class="textoinput" style="width: 49%;background: white; text-align:left;" id="donde-publicar-muro">                                
                                <?php 
                                    $data=Logica::PA_UPLA("[seguridad].[paCon_dondeverse]","array","<Dato><usuario>".$_SESSION['dni']."</usuario></Dato>",false);
                                    opciones_combo($data,"id","detalle","Ninguna categoría en especial..."); 
                                ?>                                  
                                </select>
                            </div>
                            <div class="titunove"><input class="textoinput" type="text" id="titulo-muro" style="text-align:center;" maxlength="70" placeholder="Ingrese el título"/></div>                            
                            <div class="titunove" style="text-align:left">
                                <select class="textoinput" style="width: 20%;background: white; text-align:left;" id="recurso-muro">
                                    <?php 
                                    $data=Logica::PA_UPLA("[seguridad].[paCon_multimedia]","array","",false);
                                    opciones_combo($data,"id","detalle"); 
                                    ?>                            
                                </select>
                                <input class="textoinput" type="file" id="add_ima_muro" style="width:79%;border:1px solid rgb(187, 187, 187);" tabindex="4" />
                                <input class="textoinput" type="text" id="video-nove-muro" style="width:79%; text-align:center;" placeholder="Ingrese url (Crt + V)" title="Crt+V"/>

                            <!--##################################33-->

                                
                                    </br>
                                    </br>
                                    <!-- The global progress bar -->
                                    <div id="progress" class="progress">                                    
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files"></div>
                                 
                                

                            <!--##################################33-->
                            </div>       
                            <div class="titunove" style="text-align:center" >
                                <img id="previsu" src="" alt="your image" />
                                <iframe width="100%" height="300" id="prevideo" src="" frameborder="0" allowfullscreen></iframe>

                                <script type="text/javascript">                                

                                    $('#add_ima_muro').bind('change', function() 
                                    {
                                        var ext=$("#add_ima_muro").val().split('.').pop().toLowerCase();
                                        if($.inArray(ext,["gif","jpg","jpge","tif","tiff","ico","png"])==-1)
                                        {
                                            alerta("Este tipo de Archivo no esta permitido: Solo puede subir archivos - imagen de formato: gif, jpg, jpge, tif, tiff, ico, png","Aviso");
                                            $('#add_ima_muro').val("");
                                            $("#prevideo").hide();
                                        }
                                        else
                                        {
                                            readURL(this,"previsu");                                
                                            $("#previsu").show();
                                        }
                                        
                                    });

                                    function readURL(input,obj) {
                                    if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                    $('#'+obj).attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                    }
                                    }

                                    /*$("#add_ima_muro").change(function(){
                                        
                                    });*/


                                    $("#video-nove-muro").on('keyup', function(){                                    
                                        /*alert(convertir($("#video-nove-muro").val()));*/
                                        $("#prevideo").attr("src",convertir($("#video-nove-muro").val()));
                                        $("#prevideo").show();
                                    });

                                    $("#video-nove-muro").bind("contextmenu",function(e){return false});

                                    function convertir(urlx)
                                    {                
                                        var urlrpta="";                    
                                        if(urlx.indexOf("&")==-1)
                                        {
                                            urlrpta='https://www.youtube.com/embed/'+urlx.substring(urlx.indexOf("v")+2);                                            
                                        }
                                        else
                                        {
                                            urlrpta='https://www.youtube.com/embed/'+urlx.substring(urlx.indexOf("v")+2,urlx.indexOf("&"));
                                        }
                                        
                                                                               
                                        return urlrpta;
                                    }
                                </script>

                            </div>

                            <div class="titunove"><textarea class="textoinput" id="texto_intro" style="text-align:justify; height:80px;max-width: 554px;" placeholder="¿Alguna descripción?"></textarea></div>                            
                            <hr class="rayagrande">
                            <div style="text-align: right;">
                                <button class="boton" id="registrapublicar" onclick="reg_post">Publicar</button>
                                <!--button class="boton" onclick="if(v_reg_post()){reg_post();}">Publicar</button-->
                            </div>
                            <!--hr class="rayapeque"-->
                        </div>
                </div>
                <script type="text/javascript">
                
                        $("#recurso-muro").change(function()
                        {  
                            $("#previsu").hide();    
                            $("#prevideo").hide();                               
                            $("#video-nove-muro").val("");     
                            $("#add_ima-muro").val("");
                           switch($("#recurso-muro").val())
                           {
                                case "img": $("#video-nove-muro").hide(); $("#add_ima_muro").show();break;
                                case "vid": $("#video-nove-muro").show(); $("#add_ima_muro").hide();break;
                           }                           
                        });                                    
                        $(function()
                        {
                            $("#mostrar_muro").click(function(event) 
                            {
                                //$("#caja2").append($("#caja2").text().trim()+"holaaa");
                                event.preventDefault();  
                                $("#caja_muro").slideToggle();                                
                            });                                    
                        });
                    
                </script>
                <div id="derecha-sub">
                <?php   
                    $cod='<Dato><arriba>0</arriba><desde>0</desde><filtro>'.$_GET["filtro"].'</filtro><dequien>'.$_GET["dequien"].'</dequien><usuario>'.$_SESSION['dni'].'</usuario></Dato>';
                    $datos=Logica::PA_UPLA("[seguridad].[paCon_publicacion]","array",$cod);  
                    $solouno=true;
                    $inicio=0;
                    $fin=0;
                    foreach ($datos as $array):            

                        $texto=utf8_encode($array[2]);
                        $dependencia=$array[14];
                        $titulo=utf8_encode($array[1]);
                        $perfil_autor=utf8_encode($array[13]);
                        $autor=$array[10].' '.$array[11].' '.$array[12];
                        $i=$array[0];

                        if($solouno)
                        {
                            $inicio=$i;
                            $solouno=false;
                        }
                        $fin=$i;

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
                ?>
                    <div class="submuro" id="muro_<?php echo $i;?>">                    
                            <div class="subtitulos" style="background:<?php echo $dependencia;?>;"><?php echo $titulo;?></div>                  
                                <div class="duenio">                                    
                                    <?php set_imagenLazy_fuera($perfil_autor,"id=foto_autor_muro_".$i." style='width:33px;height:30px;'")?>
                                    <p onclick=location.href="inicio?filtro=mimuro&dequien=<?php echo $array[7];?>" style="cursor: pointer;"><?php echo utf8_encode($autor);?> | <?php echo $array[8];?></p>                            
                                </div>
                            <div class="murito">                                
                                <hr class="rayagrande">
                                <!--div class="titunovemuri"></div-->
                                <div class="imamuro">
                                    <!--a href="#" id="capa_imagen_muro_<?php echo $i;?>"-->
                                    <div style="cursor: pointer;" id="capa_imagen_muro_<?php echo $i;?>" onclick="verimagen('<?php echo $imagen_muro;?>','<?php echo $dependencia;?>','<?php echo $titulo;?>','<?php echo $perfil_autor;?>','<?php echo $array[7];?>','<?php echo utf8_encode($autor);?>','<?php echo $array[8];?>','<?php echo $texto;?>','imagengenerada_<?php echo $i;?>');">
                                        <?php set_imagenLazy_fuera($imagen_muro,"id=imagengenerada_".$i);?>
                                    </div>
                                    <!--/a-->
                                    <iframe width="100%" height="300" id="prevideo_muro_<?php echo $i;?>" src="" frameborder="0" allowfullscreen></iframe>

                                    <p id="resumen_muro_<?php echo $i;?>">
                                        <?php                                                                                       
                                            echo (strlen(trim($texto))>300)?substr(trim($texto), 0,300)."<a href='' id='seguirleyendo_muro_".$i."'>... Seguir leyendo</a>":trim($texto);
                                        ?>                                
                                    </p>
                                     
                                    <script type="text/javascript">                                                                             
                                            $("#seguirleyendo_muro_<?php echo $i;?>").click(function(event)
                                            {                                                
                                                event.preventDefault();//evita que se recargue la hoja
                                                //$("#seguirleyendo_muro_<?php echo $i;?>").remove();                                   
                                                $("#resumen_muro_<?php echo $i;?>").empty();
                                                $("#resumen_muro_<?php echo $i;?>").append('<?php echo $texto;?>');
                                            });                                                                                            
                                            $(function()
                                            {
                                                switch("<?php echo $imagen_o_video; ?>")
                                                {
                                                    case "img": $("#prevideo_muro_<?php echo $i;?>").hide();break;
                                                    case "vid": $("#capa_imagen_muro_<?php echo $i;?>").hide();
                                                                $("#prevideo_muro_<?php echo $i;?>").attr("src",convertir("<?php echo $ruta_video;?>"));break;
                                                }
                                            });
                                    </script>   

                                </div>
                            </div>
                    </div>
                                
                <?php
                    endforeach;
                ?>
                <script type="text/javascript">
                          
                        $("#primerapublicacion").val("<?php echo $inicio;?>");                        
                        $("#ultimapublicacion").val("<?php echo $fin;?>");
                    
                </script>
                </div>
            </div>

        </div>
        <div id="muro">
    
        </div>
    </div>
</div>
<style type="text/css">
    .contenedor-visor-clase
    {
        z-index: 2;        
        /*left: 23%;*/

        width:100%;        
        text-align:center;
        text-align:-webkit-center;
        text-align:-o-center;
        text-align:-moz-center;
        text-align:-ms-center;        
        min-width: 1000px;
        position: fixed;
        top: 20%;

    }
    .visordeimagenes
    {
        background-color: white;
        height: 461px;
        width: 923px;
        border-radius: 7px;
        border: solid 1px rgb(114, 114, 114);
    }
    
    .visordenoticias
    {
        background-color: white;
        height: 541px;
        width: 764px;
        border-radius: 7px;
        border: solid 1px rgb(114, 114, 114);
    }
    #visordecomentarios
    {
        background-color: white;
        height: 424px;
        width: 254px;
        top: -434px;
        position: relative;
        right: -322;
        border-radius: 0px 7px 7px 0px;
    }
    #imagenvisor_
    {
        height: 435px;        
        left: -129;        
        top: -23;
        position: relative;
        border-radius: 7px 0px 0px 7px;
        /*border: solid 1px white;*/
    }
    
    #imagenvisor_novedad
    {        
        height: 385px;
        
        top: 13;
        position: relative;
        border-radius: 7px 0px 0px 7px;
    }

    #imagenvisor_anuncio
    {
        height: 418px;
        width: 717px;
        left: 0;
        top: 14;
        position: relative;
        border-radius: 7px 0px 0px 7px;
        /* border: solid 1px white;*/
    }

    #rayavisor
    {
        background-color: rgba(199, 199, 199,0.25);
        height: 1px;
        width: 223px;
        border: none;
        position: relative;         
    }
    #cuerpo
    {
        position: relative;
        width: 215;
        font-size: 11;
        text-align:justify;
    }

    .visor
    {
        margin: 0 auto;    
        padding: 0px 15px 0px 54px;
    }
    .visor img
    {
        position: absolute;
        left: 15px;
    }
    .visor p
    {
        /*position: absolute;*/
        color:rgb(185,185,185);
        text-align: left;    
          
        font-size:12px;
        /*line-height: 29px;*/
    }
  
</style>

    <div class="contenedor-visor-clase" id="contenedor-anuncio" onclick="">
        <div class="visordenoticias" id="visordeimagenes_id_anuncio" onclick="">                
            <div class="subtitulos" style="background:rgba(182, 182, 182, 0.15);text-align:center">
                TUTORIAL PARA MATRICULA EN LÍNEA
                <div id="cerrarhoras" style="cursor: pointer;text-align: right;">            
                    <?php set_imagen("cerrar.png","25","25","cerrar","style='position:relative;top:-22px;' onclick=noveranuncio();","","cerrar2.png","cerrar.png")?>
                </div>
            </div>
            <div id='img_vid_not'>
                <iframe width="100%" height="300" id="imagenvisor_anuncio" src="https://www.youtube.com/embed/FdIKZWZjaHg" frameborder="0" allowfullscreen=""></iframe>    
            </div>
                <p id="texto_not" style="text-align: center;padding: 10px; font-size:14;">
                    Este tutorial nos muestra cómo debemos realizar nuestra matrícula "en línea". Este y otros videos están publicados en novedades (al lado izquierdo de la pantalla) y en la pestaña Noticias.            
                </p>
        </div>            
    </div>
    
    <div onclick="noveranuncio();" id="fondo_sombra_anuncio" style="width: 100%;height: 100%;background-color: rgba(0,0,0,0.6);position: fixed;top: 0;left: 0;z-index: 1;" ></div>
    
    <div class="contenedor-visor-clase" id="contenedor-visor" style="display:none" onclick="">        
    </div>

    <div onclick="noverimagen();" id="fondo_sombra" style="display:none;width: 100%;height: 100%;background-color: rgba(0,0,0,0.6);position: fixed;top: 0;left: 0;z-index: 1;" ></div>

    <script type="text/javascript">

    var noverimagen=function()
    {
        
        $('#contenedor-visor').hide();
        $('#fondo_sombra').hide();
        $("#contenedor-visor").empty();
    }

    var noveranuncio=function()
    {
        
        $('#contenedor-anuncio').hide();
        $('#fondo_sombra_anuncio').hide();
        $("#img_vid_not").empty();
    }
    texto_visor_todo='';
    var verimagen=function(img_ruta,color,titulo,img_perfil,dequien,autor,cuando,texto_,img)
    {
        var img_cerrar='<?php echo set_imagen_r("cerrar.png","25","25","cerrar","id=cerrar_img_visor style=left:150px;top:1px;padding:6px; onclick=noverimagen(); ","","cerrar2.png","cerrar.png")?>';
        
        var cadena='';
        cadena+='<div class="visordeimagenes" id="visordeimagenes_id">';
        cadena+='<div id="cerrarhoras" style="cursor: pointer;text-align: right;">'+img_cerrar+'</div>';
        //cadena+='<iframe width="100%" height="300" id="imagenvisor_" src="https://www.youtube.com/embed/kcZmWcJxjJI" frameborder="0" allowfullscreen></iframe>';
        //cadena+='<?php set_imagen_style_fuera("'+img_ruta+'","id=imagenvisor_"); ?>';
        var imagen = $('#'+img);  
        //alert(imagen.width()); // ancho original. Ej. 800
        //alert(imagen.height()); // alto original. Ej: 600    
        var imagen_='';
        if(imagen.height()>425)
            imagen_='<?php set_imagen_style_fuera("'+img_ruta+'","id=imagenvisor_"); ?>';
        else
            imagen_='<?php set_imagen_style_fuera("'+img_ruta+'","id=imagenvisor_ style=width:637px;"); ?>';

        cadena+=imagen_;
        cadena+='<div id="visordecomentarios">';
        cadena+='<div id="subtitulos_visor" style="background:'+color+';text-align: center;font-size:12px;">'+titulo+'</div>';                  
        cadena+='<div class="visor">';
        cadena+='<?php set_imagen_style_fuera("'+img_perfil+'","style=width:33px;height:30px;")?>';        
        cadena+='<p onclick=location.href="inicio?filtro=mimuro&dequien='+dequien+'" style="cursor: pointer;font-size:11px;">';
        cadena+=autor;
        cadena+='<br>';
        cadena+=cuando;
        cadena+='</p>';
        cadena+='</div>';
        cadena+='<hr id="rayavisor">';
        cadena+='<p id="cuerpo" >';

        texto_visor_todo=texto_;

        if(texto_.length>100)        
            texto_visor=texto_.substring(0, 100)+"<a href='' onclick=event.preventDefault();segurileyendo(); id='seguirleyedo_visor'>... Seguir leyendo</a>";        
        else        
            texto_visor=texto_;
        
        cadena+=texto_visor;
        cadena+='</p>';
        cadena+='</div>';
        cadena+='</div>';
        //alert(cadena);
        $("#contenedor-visor").empty();
        $("#contenedor-visor").append(cadena);

        $('#contenedor-visor').show();
        $('#fondo_sombra').show();
    }


    var segurileyendo=function()
    {
        
        $("#seguirleyedo_visor").remove();                                   
        $("#cuerpo").append(texto_visor_todo.substring(100));
    }

    texto_novedad_todo='';
    var verimagen_noticia=function(img_ruta,titulo,texto_,img)
    {
        var cadena='';
        cadena+='<div class="visordenoticias" id="visordeimagenes_id_anuncio" onclick="">';
        cadena+='<div class="subtitulos" style="background:rgba(182, 182, 182, 0.15);text-align:center">';
        cadena+=titulo;
        cadena+='<div id="cerrarhoras" style="cursor: pointer;text-align: right;">'
        cadena+='<?php echo set_imagen_r("cerrar.png","25","25","cerrar","style=position:relative;top:-22px; onclick=noveranuncio(); ","","cerrar2.png","cerrar.png")?>';
        cadena+='</div>';
        cadena+='</div><div id="img_vid_not">';
        var imagen = $('#'+img);  
        var imagen_='';
        if(imagen.height()>425)
            imagen_='<?php set_imagen_style_fuera("'+img_ruta+'","id=imagenvisor_novedad"); ?>';
        else
            imagen_='<?php set_imagen_style_fuera("'+img_ruta+'","id=imagenvisor_novedad style=width:691px;"); ?>';

        cadena+=imagen_;        
        cadena+='<p id="texto_not" style="text-align: justify;padding: 10px 38px 26px;font-size:14;">';
        texto_novedad_todo=texto_;
        var texto_visor='';
        if(texto_.length>400)        
            texto_visor=texto_.substring(0, 400)+"<a href='' onclick=event.preventDefault();segurileyendo_novedad_anuncio(); id='seguirleyedo_nov_not'>... Seguir leyendo</a>";        
        else        
            texto_visor=texto_;
        
        cadena+=texto_visor;        
        cadena+='</p></div>';

        $("#contenedor-anuncio").empty();
        $("#contenedor-anuncio").append(cadena);

        $('#contenedor-anuncio').show();
        $('#fondo_sombra_anuncio').show();
              
    }

    var segurileyendo_novedad_anuncio=function()
    {
        
        $("#seguirleyedo_nov_not").remove();                                   
        $("#texto_not").append(texto_novedad_todo.substring(400));
    }
        
    $(function(){
    $("img").lazyload({
        effect:"fadeIn",
        placeholder:"Capa_Presentacion/Recursos/img_cargando.gif",
        threshold:100
        });        
    }); 
    $(window).scroll(function() 
    {
        /*alert($(window).scrollTop());
        alert($(window).height());
        alert($(document).height()); */   
        
        if(($(window).scrollTop() + document.getElementsByTagName('body')[0].clientHeight)+500 >= $(document).height()) 
        {
            
          publicar_muro('<?php echo $_GET["filtro"]?>','<?php echo $_GET["dequien"];?>');
          //publicar_novedad();           
            
        }

    });
     $(document).keydown(function(e){
        if(e.keyCode == 27){
            noverimagen();    
            noveranuncio();
        }
    });

</script>

<!--
Faltan:
guardar: 1.- subir a servidor de imagenes, y guardar en base de datos
condicionar guardar novedades

guardar poscion del banner
guardar color del menu
guardar foto de perfil
guardar banner
guardar nuevas posts
-->


<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    /*var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'subirarchivo-img-muro',*/
        var url = 'subirarchivo-img-muro',
        uploadButton = $('<button id="subirimgenasr"/>').prop('disabled', true).text('Processing...');
            /*.on('click', function () {
                alert();
                var $this = $(this), data = $this.data();
                    $this.off('click').text('Abort')
            .on('click', function () {
                        $this.remove();
                        data.abort();
                    });           
                data.submit().always(function () {                   
                   // $this.remove();
                });
            });*/

    $("#registrapublicar").on("click",function(){            
        var data = $("#subirimgenasr").data();                
        //if(v_reg_post())
        if(true)
        {
            notificacion(1,"¡PrOntO!","Habilitaremos la opción de públicar - Oficina de Informática, trabajando para brindarle un mejor servicio.");
            //data.submit();
        }
    })

    $('#add_ima_muro').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {        
        $("#eligioimg").val("1");//para controlar si eligio una img
        alert("entro");
        data.context = $('<div id="parabotonupload" style="display: none;"/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>').append($('<span/>'));//.text(file.name));//nombre del archivo
            if (!index) {
                node.append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        /*if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }*/
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {                
        reg_post();
        /*$.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });*/
    }).on('fileuploadfail', function (e, data) {

        /*$.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });*/
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
