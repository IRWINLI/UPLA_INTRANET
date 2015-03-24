<?php
header('content-type:text/css');
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$tipoLetra = "Helvetica,Arial,sans-serif";
echo <<<FINCSS



.compromisoHonor
{
    background-color: #FFF;
    width: 71%;
    height: 300px;
    margin-left: 15%;
    border: 1px solid #276193;
    overflow-y: scroll;
}

.titulo_compromiso
{
    color: white;
    font: bold 16px "Open Sans Condensed",sans-serif;
    padding-top:15px;
    padding-left:15px;
    
}

.requisitos_correcto, .requisitos_advertencia, .requisitos_error
{
    background-repeat:no-repeat;
    background-size:30px;
    height:32px;
    padding-left: 40px;
    padding-top: 5px;
}

.requisitos_correcto:hover, .requisitos_advertencia:hover, .requisitos_error:hover
{
    color:$colorPrincipal;
    cursor: hand;
    cursor: pointer;
    font-size:18px;
    background-size: 36px auto;
}

.requisitos_correcto
{
    background-image:url("../Recursos/modulos_intranet/icono_correcto.png");
}
.requisitos_advertencia
{
    background-image:url("../Recursos/modulos_intranet/icono_advertencia.png");
}
.requisitos_error
{
    background-image:url("../Recursos/modulos_intranet/icono_error.png");
}
.requisitos_oculto /*Para ocultar los requisitos no solicitados*/
{
    display:none;
}

#enlace_cuadroDialogo
{
    color: rgba(165, 40, 40, 1);
    font-size: 15px;
}

.estado_aprobado, .estado_convalidado, .estado_bloqueado, .estado_desbloqueado
{
    width:60px;
    height:48px;
    background-image: url('../Recursos/mod_matricula/iconos_estadoAsignaturas.png');
    background-size: 130px 130px;
    background-repeat: no-repeat;

}

.estado_aprobado {background-position: 3px -8px;}
.estado_convalidado {background-position: 3px -70px;}
.estado_bloqueado {background-position: -57px -70px;}
.estado_desbloqueado {background-position: -57px -8px;}


.ui-progressbar {
    position: relative;
}
.progress-label {
    position: absolute;
    left: 1%;
    top: 1px;    
}
.contador_matricula a{
    color:white;
}
.contador_matricula {
    width:305px;
    height:155px;
    background-color:$colorPrincipal;
    background-color:white;
    position:fixed;
    bottom: 70px;
    left: 50px;
    z-index: 700;
    -webkit-border-radius: 9px;
    -moz-border-radius: 9px;
    border-radius: 9px;
    cursor: move;
    background-color:black;
}

.contador_matricula table{
    width:300px;
    color:#FFF;
    cellpadding:0px;
    cellspacing:0px;
    padding-left: 4px;
    padding-right: 0px;
    padding-top: 4px;
}


#nivel_matricula,#nivel_matricula_n,#creditos_selec,#creditos_selec_n,#creditos_max,#creditos_max_n{
    border: 1px solid #444;
    color: black;
    background-color:white;
    
}


#nivel_matricula_n, #creditos_selec_n, #creditos_max_n
{
    width: 55px;
    text-align:center;
    font-size:22px;
}

#nivel_matricula{
    width: 230px;
    height: 46px;
    padding-left: 16px;
    background-image: url('../Recursos/mod_matricula/iconos_creditos.png');
    background-repeat: no-repeat;
    background-size: 53px 125px;
    background-position: 22px -1px;
}

#nivel_matricula_n{

}

#creditos_selec{
    font-weight: bolder;
    font-size: 13px;
    padding-left: 80px;
    padding-right: 15px;
    height: 45px;
    background-image: url('../Recursos/mod_matricula/iconos_creditos.png');
    background-repeat: no-repeat;
    background-size: 53px 125px;
    background-position: 20px -44px;  

}
#creditos_selec_n{

}
#creditos_max{
    font-weight: bolder;
    font-size: 13px;
    padding-left: 80px;
    padding-right: 15px;
    height: 45px;
    background-image: url('../Recursos/mod_matricula/iconos_creditos.png');
    background-repeat: no-repeat;
    background-size: 53px 125px;
    background-position: 20px -83px;  
}
#creditos_max_n{
    
}











.contador_ciclo, .contador_credito{
    width: 50px;
    height: 60px;
    background-color: #000;
    border-radius: 9px;
    margin-top: 13px;
    margin-left: 20px;
    color: #FFF;
    font-size: 35px;
    padding-left: 10px;
    float:left;
}

.contador_credito{
    width:100px;
}

.letras_contador{
    font-size: 10px;
    font-weight: bold;
    margin-top: -6px;
    text-align:center;
    margin-left: -10px;
}

.contador_btnDetalle{
    position: absolute;
    background-color: #000;
    top: -23px;
    height: 20px;
    width: 191px;
    left: 37px;
    -webkit-border-top-left-radius: 9px;
    -webkit-border-top-right-radius: 9px;
    -moz-border-radius-topleft: 9px;
    -moz-border-radius-topright: 9px;
    border-top-left-radius: 9px;
    border-top-right-radius: 9px;
    font-size: 12px;
    text-align:center;
    color:white;
    padding-top:3px;
}





/*==================== ESTILOS DE CUADRO DE DÍALOGO ====================*/

.cuadroHorario
{
    position: fixed;
    top: 25%;
    left: 50%;
    width: 600px;
    margin-left: -250px;
    margin-top: -120px;
    background-color:white;
    /*background-color:#444;*/
    border-radius:10px;
    z-index:1000;
    padding-left: 17px;
    padding-right:33px;
    padding-bottom:20px;
    color: #444;
    font-weight: bold;
}

.cuadroHorario_titulo
{
    height: 34px;
    margin-top: 0px;
    margin-bottom: -5px;
    border-bottom: 1px solid #CFCFCF;
    font-size: 21px;
    color: $colorPrincipal;
    padding-top:7px;
    width:575px;
    background-image: url('../Recursos/mod_matricula/asignatura_horarios.png');
    background-position: 9px 10px;
    background-repeat: no-repeat;
    background-size: 29px 29px;
    padding-left: 42px;
    padding-top: 10px;

}

.cuadroHorario_icono_0,.cuadroHorario_icono_1,.cuadroHorario_icono_2
{
    width: 52px;
    height: 60px;
    
    background-size: 47px auto;
    background-repeat: no-repeat;
    background-position: 0px 13px;
    float: left;
}

.cuadroHorario_icono_0{background-image: url('../Recursos/modulos_intranet/icono_error.png');}
.cuadroHorario_icono_1{background-image: url('../Recursos/modulos_intranet/icono_advertencia.png');}
.cuadroHorario_icono_2{background-image: url('../Recursos/modulos_intranet/icono_correcto.png');}

.cuadroDialogo_contenido
{
    width:415px;
    height:100px;
    text-align :justify;
    margin-top:8px;
    padding-left:54px;
}

.cuadroHorario_descripcion
{
    color:black;
    font-weight:normal;
}

.cuadroHorario_btnCerrar
{
    background-image: url('../Recursos/modulos_intranet/btn_cerrar_notificacion.png');
    float: right;
    width: 25px;
    height: 32px;
    background-size: 48px 18px;
    background-position: 3px 4px;
    background-repeat: no-repeat;
    margin-right: -30px;
    margin-top: 2px;
}
.cuadroHorario_btnCerrar:hover
{
    background-position: -27px 4px;
}

.asignatura_seleccionada
{
    background-color:red;
}

.CSScheckbox_X, .CSScheckbox_Disponible, .CSScheckbox_Seleccionado, .CSSeditarHorarioHabilitado, .CSSeditarHorarioNoHabilitado
{
    background-image: url('../Recursos/mod_matricula/marcadoNoMarcardo.png');
    width:78px;
    height:30px;
    background-size: 60px;
    background-repeat: no-repeat;
}

.CSScheckbox_X{
    background-position: 15px -200px;
}

.CSScheckbox_Disponible{
    background-position: 15px -150px;
}

.CSScheckbox_Disponible:hover{
    background-size: 71px auto;
    background-position: 9px -182px;
}

.CSScheckbox_Seleccionado{
    background-position: 15px -150px;
}

.CSScheckbox_Seleccionado:hover{
    background-size: 71px auto;
    background-position: 9px -182px;
}

.CSSasignSelecta{
    background-image: url('../Recursos/mod_matricula/fnd_asignSelecta.png');
    color: black;
    font-weight: bolder;
}

.CSSeditarHorarioHabilitado{
    background-position: 12px -152px;
}
.CSSeditarHorarioHabilitado:hover{
    background-size: 70px auto;
    background-position: 12px -182px;
}

.CSSeditarHorarioNoHabilitado{
    background-position: 12px -198px;
}

.icon_tipoAsignatura_TN,.icon_tipoAsignatura_TT,.icon_tipoAsignatura_TE,.icon_tipoAsignatura_TA,.icon_tipoAsignatura_TP,.icon_tipoAsignatura_TI,.icon_tipoAsignatura_TX
{
    background-image: url('../Recursos/mod_matricula/iconos_tipoAsignaturas.png');
    background-size: 75px auto;
    background-repeat: no-repeat;
    text-align:left;
    width:320px;
}
.icon_tipoAsignatura_TN{background-position: 10px 6px;}
.icon_tipoAsignatura_TT{background-position: 10px -50px;}
.icon_tipoAsignatura_TE{background-position: 10px -108px;}
.icon_tipoAsignatura_TA,.icon_tipoAsignatura_TX{background-position: 10px -160px;}
.icon_tipoAsignatura_TP{background-position: 10px -226px;}
.icon_tipoAsignatura_TI{background-position: 10px -290px;}

.CSSbtnVistaPrevia
{
    position: absolute;
    width: 100px;
    height: 90px;
    background-image: url('../Recursos/mod_matricula/btn_matricula.png');
    bottom: 103px;
    left: -57px;
    background-size: 106px;
    background-position: 0px 96px;
    cursor:pointer;
    cursor: hand;
}

.CSSbtnVistaPrevia:hover
{
    background-position: 0px -13px;
}


.CSSbtnAmpliarCreditos
{
    position: absolute;
    width: 33px;
    height: 30px;
    background-image: url('../Recursos/mod_matricula/btn_ejecutarMatricula.png');
    background-color:black;
    bottom: 16px;
    left: 297px;
    background-size: 167px auto;
    background-position: -7px 210px;
    cursor: pointer;
    border-radius:12px;
}

.CSSbtnMatricular_div
{
    position: absolute;
    width: 184px;
    height: 65px;
    background-color: #000;
    bottom: -55px;
    left: 121px;
    background-size: 151px auto;
    background-position: 3px 147px;
    cursor: pointer;
    border-radius: 6px;
}

.CSSbtnMatricular
{
    position: absolute;
    width: 160px;
    height: 42px;
    background-image: url('../Recursos/mod_matricula/btn_ejecutarMatricula.png');
    background-color: #105372;
    bottom: 11px;
    left: 12px;
    background-size: 151px auto;
    background-position: 3px 147px;
    cursor: pointer;
    border-radius: 4px;
}

.CSSbtnMatricular:hover
{
    background-color: #7B3E3E;
}




/*============================ ESTILOS DE AMPLIACIÓN DE CRÉDITOS ===================================*/

.CSSdatosEst{
    background-image: url('../Recursos/mod_matricula/icono_estudiantes_2.png');
    font-size: 15px;
    font-weight: bold;
    background-size: 120px auto;
    height: 190px;
    background-repeat: no-repeat;
    /*padding-left: 165px;*/
    padding-left: 0px;
    background-position: 444px 0px;
    margin-top:10px;
}

.CSSdatosEst_2{
    background-image: url('../Recursos/mod_matricula/iconos_RectificacionMatricula.png');
    font-size: 15px;
    font-weight: bold;
    background-size: 164px auto;
    height: 190px;
    background-repeat: no-repeat;
    padding-left: 0px;
    background-position: 422px 0px;
    margin-top: 10px;
}

.CSSingresoEst{
    background-image: url('../Recursos/mod_matricula/icono_estudiantes.png');
    font-size: 15px;
    font-weight: bold;
    background-size: 57px auto;
    height: 47px;
    background-repeat: no-repeat;
    padding-left: 68px;
    background-position: 0px -57px;
}

.CSSingresoEst_Conv{
    background-image: url('../Recursos/mod_matricula/asignaturaConvalidada.png');
    font-size: 15px;
    font-weight: bold;
    background-size: 63px auto;
    height: 66px;
    background-repeat: no-repeat;
    padding-left: 68px;
    background-position: 0px 1px;
}

.CSS_X_quitar{
    background-image: url('../Recursos/mod_matricula/x.png');
    background-size: 28px auto;
    background-repeat: no-repeat;
    background-position: 26px 2px;
}

.CSS_fondo_Convalidacion{
    background-image: url('../Recursos/mod_matricula/asignaturas.png');
    background-size: 107px auto;
    background-repeat: no-repeat;
    background-position: 463px 2px;
}

.css_btn:disabled,.css_btn:disabled:hover
{
    background-color: #CCC;
    color: #AAA;
    border-color: #AAA;
}

.CSSHorarioSeleccionado_SI
{
    background-image: url('../Recursos/mod_matricula/marcadoNoMarcardo.png');
    width: 78px;
    height: 44px;
    background-size: 60px auto;
    background-repeat: no-repeat;
    background-position: 13px -57px;
}

.CSSHorarioSeleccionado_NO
{
    background-image: url('../Recursos/mod_matricula/marcadoNoMarcardo.png');
    width: 78px;
    height: 44px;
    background-size: 60px auto;
    background-repeat: no-repeat;
    background-position: 13px -8px;
}

.CSSemergente_horario
{
    width:1150px;
    background-color:white;
    border-radius:10px;
    z-index:1020;
    position: fixed;
    left:5%;
    padding-bottom: 30px;
}

.CSSbloqueoPantalla
{
    width: 100%;
    font-family: Helvetica,Arial,sans-serif;
    color: #FFF;
    float: left;
    height: 100%;
    background-color: #000;
    z-index: 1000;
    position: fixed;
    left: 0px;
    top: 0px;
    opacity: 0.5;
}






  .CSSTableSimple_2 table
  {
    border-collapse: collapse;
    /*margin:0px;
    padding:0px;
    width:800px;*/
    border: 1px solid #A3A3A3;
    color:#555;
                
  }
      
  .CSSTableSimple_2 td
  {
    vertical-align:middle;  
    border:0px solid #A3A3A3;
    border-width:1px 1px 1px 1px;
    text-align:center;
    /*padding:0px;*/
    font-size:12px;

    font-weight:normal;

    padding-left: 5px;
    padding-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;

    max-width: 10px;
    width: 11em; 
    /*border: 1px solid #000000;*/
    word-wrap: break-word;

    font-style: normal;
    font-size: 12px;
    height:32px;notificacion(2,"Matricula Registrada","¡Felicitaciones! Tu matrícula ha sido registrada correctamente. Si gustas ahora puedes imprimir tu Constancia de Matrícula."); 
  }

  /*.CSSTableSimple_2  tr:nth-child(even) td:nth-child(1){ background-color:#D0D0D0; }*/
  .CSSTableSimple_2  td:nth-child(1){ background-color:#D0D0D0; }/*COLOR DE UN REGISTRO SI OTRO NO*/
  .CSSTableSimple_2 tr:first-child th
  {   
    background-color: #D0D0D0;
    border: 0px solid #A3A3A3;
    text-align: center;
    border-width: 0px 0px 1px 1px;
    font-size: 13px;
    /*font-weight: bold;*/
    color:#555;
    height: 45px;
    /*padding: 14px;
    background-image:url(../Recursos/recursos_tabla/tabla_fondo_cabecera.jpg);*/

  }
  
  .CSSDatosMatricula
  {
    width:900px;
    height:200px;
  }
  
  .CSSbtnVerHorarios
  {
    font-size: 13px;
    color: #555;
    background-image: url('../Recursos/mod_matricula/iconos_MatriculasRealizadas.png');
    background-position: 13px 1px;
    height: 139px;
    width: 202px;
    background-size: 560px;
    background-repeat: no-repeat;
    margin-top: 22px;
    margin-left: 55px;
    float:left;
  }
  
  .CSSbtnConstanciaMatricula
  {
    font-size: 13px;
    color: #555;
    background-image: url('../Recursos/mod_matricula/iconos_MatriculasRealizadas.png');
    background-position: -180px 1px;
    height: 139px;
    width: 202px;
    background-size: 560px;
    background-repeat: no-repeat;
    margin-top: 22px;
    margin-left: 80px;
    float:left;
  }
  .CSSbtnRectificacionMatricula
  {
    font-size: 13px;
    color: #555;
    background-image: url('../Recursos/mod_matricula/iconos_MatriculasRealizadas.png');
    background-position: -376px 1px;
    height: 139px;
    width: 202px;
    background-size: 560px;
    background-repeat: no-repeat;
    margin-top: 22px;
    margin-left: 80px;
    float:left;
  }
  
  /*================ LEYENDA DEL MODULO DE MATRICULA ================================= */

  .css_leyendaTipos
  {
    height: 363px;
    background-image: url('../Recursos/mod_matricula/leyenda_tipos.png');
    background-size: 120px auto;
    text-align: center;
    padding-top: 83px;
    color: #198C19;
    font-weight: bold;
    position: fixed;
    right: 1%;
    width: 120px;
    background-repeat:no-repeat;
    cursor: move;
  }
  
  
  label
  {
    color: #000080;
    font-weight: bold; 
  }
  
  .CSSavisoMatricula
  {
    position: fixed;
    background-color: #2068C5;
    width: 322px;
    height: 142px;
    left: 6px;
    z-index: 101;
    bottom: 270px;
    color: #FFF;
    border-radius: 10px;
    padding: 10px;
    text-align: justify;
    font-size: 14px;
    border: 5px solid #000;
    cursor: move;
  }
  
  .CSSleyenda_requisitos
  {
    width: 780px;
    height: 54px;
    background-image: url('../Recursos/mod_matricula/leyenda_requisitos.jpg');
    background-size: 770px;
    background-repeat: no-repeat;
  }
  
  .CSSpopupbox_constanciaMatricula
  {
    width: 900px;
    padding-bottom: 15px;
    background-color: white;
    position: fixed;
    z-index:1005;
    border-radius: 10px;
    border: 3px solid $colorPrincipal;
  }
  .CSSrptConstanciaMatricula
  {
    width: 830px;
    min-height: 420px;
    margin-left: 35px;
    margin-top: 35px;
    text-align:center;
  }
  
  .CSSlbl_datosConstancia
  {
    text-align: left;
    width: 80px;
    margin-left: 20px;
    font-weight: bold;
    color: #4E69C9;
    font-family: Times New Roman,Times,Garamond,Georgia,Cambria;
    font-size: 14px;
    float:left;
  }
  
  .CSSlbl_datosDinamicosConstancia
  {
    text-align: left;
    width: 500px;
    margin-left: 20px;
    font-weight: bold;
    color: black;
    font-family: Times New Roman,Times,Garamond,Georgia,Cambria;
    font-size: 13px;
    float:left;
    
  }
  
    .CSSfotoConstancia
    {
        position: absolute;
        width: 90px;
        height: 102px;
        right: 64px;
        top: 48px;
        background-image: url('../Recursos/mod_matricula/sinfoto.jpg');
        background-size: 90px 102px;
    }

  /* ======================== TABLA PARA LA CONSTANCIA DE MATRÍCULA ======================== */
  

    .CSSTableConstancia 
    {
	border-collapse: collapse;
	border: 2px solid black;
        width:790px;
        margin-bottom: 135px;
    }
    
    .CSSTableConstancia td, .CSSTableConstancia th
    {
        border: 1px solid #000;
        text-align: center;
        font-size: 13px;
    }
    
    .CSSTableConstancia th
    {
        background-color:rgba(0, 105, 194, 0.36);;
    }
    
    .CSS_PieConstanciaMatricula
    {
        background-color: rgba(0, 105, 194, 0.36);
        position: absolute;
        bottom: 74px;
        border-radius: 10px;
        padding-right: 15px;
        padding-left: 15px;
        border: 1px solid #000;
        width: 759px;
        text-align: left;
        font-size: 14px;
        font-weight: bold;
    }
    .CSSfirmaConstancia
    {
        bottom: 107px;
        position: absolute;
        font-size: 13px;
        font-weight: bold;
        border-top: 1px solid #000;
        padding-top: 5px;
        right: 62px;
    }
FINCSS;
?>
