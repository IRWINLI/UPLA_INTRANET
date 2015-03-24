<script type="text/javascript">
 $(function(){
    $("#per").css({
      "background": "#f5c774"
    })
      limpiar();//limpiar todas las casillas
      //cargar_lugar();
     // cargar_lugar_colegio();


    <?php
      //$param='<Dato><x_codigo>a81557e</x_codigo></Dato>';
      $param="<Dato><x_codigo>".$_SESSION['dni']."</x_codigo></Dato>";
      $Alumno_Acd=Logica::PA_UPLA("[Ficha].[DatConAlu_S_1]","array",$param);

      foreach ($Alumno_Acd as $alumno):
    ?>
        var cod="<?php echo utf8_encode(trim($alumno['cod']));?>";
        var nom="<?php echo str_replace('"','',utf8_encode(trim($alumno['nom'])));?>";
        var ap_pat="<?php echo str_replace('"','',utf8_encode(trim($alumno['ap_pat'])));?>";
        var ap_mat="<?php echo str_replace('"','',utf8_encode(trim($alumno['ap_mat'])));?>";
        var edad="<?php echo utf8_encode(trim($alumno['edad']));?>";
        var dni="<?php echo utf8_encode(trim($alumno['dni']));?>";
        var f_nac="<?php echo utf8_encode(trim($alumno['f_nac']));?>";
        var f_ing="<?php echo utf8_encode(trim($alumno['f_ing']));?>";
        var tel="<?php echo utf8_encode(trim($alumno['tel']));?>";
        var cel="<?php echo utf8_encode(trim($alumno['cel']));?>";
        var mail="<?php echo utf8_encode(trim($alumno['mail']));?>";
        var dir="<?php echo str_replace('"','',utf8_encode(trim($alumno['dir'])));?>";
        var e_civ="<?php echo utf8_encode(trim($alumno['e_civ']));?>";
        var fac="<?php echo utf8_encode(trim($alumno['fac']));?>";
        var carr="<?php echo utf8_encode(trim($alumno['carr']));?>";
        var mod_acd="<?php echo utf8_encode(trim($alumno['mod_acd']));?>";
    <?php endforeach;?>
     cargar_datosAcd(cod,nom,ap_pat,ap_mat,edad,dni,f_nac,f_ing,tel,cel,mail,utf8_decode(dir),e_civ,fac,carr,mod_acd);
    <?php
      $Alumno=Logica::PA_UPLA("[Ficha].[PA_IsoEnc_U_1]","array",$param);
    ?>
    //capturamos el codigo si hizo encuesta
      var codIsoEcuesta="<?php echo utf8_encode(($Alumno[0]['cod']));?>";
      if(codIsoEcuesta!=''){
        mostrarCargando();
        //departamento
            $("#departamento_l").change(function(){dependencia_provincia();});
            $("#provincia_l").change(function(){dependencia_distrito();});
            $("#provincia_l").attr("disabled",true);
            $("#distrito_l").attr("disabled",true); 
        //fin departamento
        //-------------------------------
        //colegio 
            $("#cboDepColegio").change(function(){dependencia_provincia_c();});
            $("#cboProColegio").change(function(){dependencia_distrito_c();});
            $("#cboDisColegio").change(function(){cargar_tipo_colegio();});
            $("#Sec_Col").change(function(){dependencia_colegio();});
        //fin colegio

      }
      else
      {
        cargar_lugar();
        cargar_lugar_colegio();
      }
       //fin verificar iso encuesta
    <?php
      $Alumno_Fich=Logica::PA_UPLA("[Ficha].[PA_LisDatFic_S_1]","array",$param);
      foreach ($Alumno as $alumno): 
        foreach ($Alumno_Fich as $alumno):
    ?>
            var gr_conv="<?php echo utf8_encode($alumno['gr_conv']);?>";
            var n_hrno="<?php echo utf8_encode($alumno['n_hrno']);?>";
            var n_hrnoNOe="<?php echo utf8_encode($alumno['n_hrnoNOe']);?>";
            var n_hrnoIEE="<?php echo utf8_encode($alumno['n_hrnoIEE']);?>";
            var n_hrnoIEP="<?php echo utf8_encode($alumno['n_hrnoIEP']);?>";
            var prov="<?php echo utf8_encode($alumno['prov']);?>";
            var ciu="<?php echo utf8_encode($alumno['ciu']);?>";
            var dep="<?php echo utf8_encode($alumno['dep']);?>";
            var dis="<?php echo utf8_encode($alumno['dis']);?>";
            var resp_edu="<?php echo utf8_encode($alumno['resp_edu']);?>";
            var ben_u="<?php echo utf8_encode($alumno['ben_u']);?>";
            var casa="<?php echo utf8_encode($alumno['casa']);?>";
            var material="<?php echo utf8_encode($alumno['material']);?>";
            var tipo="<?php echo utf8_encode($alumno['tipo']);?>";
            var zona="<?php echo utf8_encode($alumno['zona']);?>";
            var nro_hab="<?php echo utf8_encode($alumno['nro_hab']);?>";
            var enf="<?php echo utf8_encode($alumno['enf']);?>";
            var seg_acc="<?php echo utf8_encode($alumno['seg_acc']);?>";
            var seg_enf="<?php echo utf8_encode($alumno['seg_enf']);?>";
            var secd="<?php echo utf8_encode($alumno['secd']);?>";
            var int_est="<?php echo utf8_encode($alumno['int_est']);?>";
            var int_mot="<?php echo trim(utf8_encode($alumno['int_mot']));?>";
            var s_elect="<?php echo utf8_encode($alumno['s_elect']);?>";
            var s_telf="<?php echo utf8_encode($alumno['s_telf']);?>";
            var s_net="<?php echo utf8_encode($alumno['s_net']);?>";
            var s_cable="<?php echo utf8_encode($alumno['s_cable']);?>";
            var cod_cole="<?php echo utf8_encode($alumno['Cod_Cole']);?>";

            /////////////////// otros Datos //////////////////////////////
            var nom_emerg="<?php echo str_replace('"','',utf8_encode(trim($alumno['nom_emerg'])));?>";
            var tel_emerg="<?php echo utf8_encode($alumno['tel_emerg']);?>";
            var dep_econom="<?php echo utf8_encode($alumno['dep_econom']);?>";
            var transporte="<?php echo utf8_encode($alumno['transporte']);?>";
            var ingreso="<?php echo utf8_encode($alumno['ingreso']);?>";
            var con_net="<?php echo utf8_encode($alumno['internet']);?>";
            var facebook="<?php echo utf8_encode($alumno['facebook']);?>";
            var twitter="<?php echo utf8_encode($alumno['twitter']);?>";
            var acept_inf="<?php echo utf8_encode($alumno['acept_inf']);?>";
            /////////////////// fin otros datos //////////////////////////
        <?php endforeach;?>

        cargar_datosFich(gr_conv,n_hrno,n_hrnoNOe,n_hrnoIEE,n_hrnoIEP,prov,ciu,dep,dis,resp_edu,ben_u,casa,material,tipo,zona,nro_hab,enf,seg_acc,seg_enf,secd,int_est,int_mot,s_elect,s_telf,s_net,s_cable,cod_cole);
        
        //cargar datos del colegio departamento provincia distrito tipo colegio
        if(cod_cole!=""){
          cargar_datosColegio(cod_cole,secd);
        }
        else
        {
          cargar_lugar_colegio();
        }
        //cargar otros datos
        
        if(nom_emerg !="" && tel_emerg!="")
        cargar_otros_datos(nom_emerg,tel_emerg,dep_econom,transporte,ingreso,con_net,facebook,twitter,acept_inf);

        <?php
        $Alumno_Fich_AEco=Logica::PA_UPLA("[Ficha].[PA_LisAct_L_1]","array",$param);
        foreach ($Alumno_Fich_AEco as $alumno):
        ?>

            var v1="<?php echo utf8_encode($alumno['per']);?>";
            var v2="<?php echo utf8_encode($alumno['ocu']);?>";
            cargar_datosAEco(v1,v2);

        <?php endforeach;?>

        <?php
        $Alumno_Fich_Ing=Logica::PA_UPLA("[Ficha].[PA_LisIng_L_1]","array",$param);
        foreach ($Alumno_Fich_Ing as $alumno):
        ?>
          v1="<?php echo utf8_encode($alumno['per']);?>";
          v2="<?php echo utf8_encode($alumno['cant']);?>";
          cargar_datosIng(v1,v2);
        <?php endforeach;?> 
        <?php
        $Alumno_Fich_Eg=Logica::PA_UPLA("[Ficha].[PA_LisEgr_L_1]","array",$param);
        foreach ($Alumno_Fich_Eg as $alumno):
        ?>
          v1="<?php echo utf8_encode($alumno['nesc']);?>";
          v2="<?php echo utf8_encode($alumno['cant']);?>";
          cargar_datosEg(v1,v2);
        <?php endforeach;?>

    <?php endforeach;?> 
    validar_pestanias();

    });
//funciones para cargar el colegio
 function cargar_lugar_colegio()
          {
            cargar_departamento_c();//llamar a llenar combo departamento

            $("#cboDepColegio").change(function(){dependencia_provincia_c();});
            $("#cboProColegio").change(function(){dependencia_distrito_c();});
            $("#cboDisColegio").change(function(){cargar_tipo_colegio();});
            $("#Sec_Col").change(function(){dependencia_colegio();});

            $("#cboProColegio").attr("disabled",true);
            $("#cboDisColegio").attr("disabled",true);
             $("#Sec_Col").attr("disabled",true);
            $("#cboColegioProce").attr("disabled",true);

          }

        function cargar_departamento_c()
          {
            $.get("fseco-usu-ListDep",{}, function(resultado)
            {
              if(resultado == false)
              {
                alert("Error");
              }
              else 
              {
                $('#cboDepColegio').append(resultado);
              }
            }); 
          }

              // cargando combos -------------
          var codeEC;
          function dependencia_provincia_c()
          {  
            var codDepa = $("#cboDepColegio").val();
            codeEC=codDepa; 
            $.get("fseco-usu-ListProv", { code:codDepa }, function(result)
            {
                if($.trim(result)=='salir')
                {
                  location.reload();
                }
                else
                {
                    if(result == false)
                    {
                      document.getElementById("cboProColegio").options.length=1;    
                      document.getElementById("cboDisColegio").options.length=1;
                      document.getElementById("Sec_Col").options.length=1;
                      document.getElementById("cboColegioProce").options.length=1;

                      $("#cboProColegio").attr("disabled",true);
                      $("#cboDisColegio").attr("disabled",true);
                      $("#Sec_Col").attr("disabled",true);
                      $("#cboColegioProce").attr("disabled",true);
                    }
                    else
                    { 

                        if(codDepa==""){
                          document.getElementById("cboProColegio").options.length=1;//cantidad de opciones
                          
                          $("#cboProColegio").attr("disabled",true);
                          $("#cboDisColegio").attr("disabled",true);
                          $("#Sec_Col").attr("disabled",true);
                          $("#cboColegioProce").attr("disabled",true);
                        }
                        else
                        {
                          $("#cboProColegio").attr("disabled",false);
                          document.getElementById("cboProColegio").options.length=1;    
                          $('#cboProColegio').append(result);
                        }           
                    }
                      document.getElementById("cboDisColegio").options.length=1;
                      document.getElementById("Sec_Col").options.length=1;
                      document.getElementById("cboColegioProce").options.length=1;

                      $("#cboDisColegio").attr("disabled",true);
                      $("#Sec_Col").attr("disabled",true);
                      $("#cboColegioProce").attr("disabled",true); 
              }
            }
            );//fin get
          }
          var CodeProvincia;
          function dependencia_distrito_c()
          {  
            var dept=$("#cboDepColegio").val();
            var code = $("#cboProColegio").val();
            CodeProvincia=code;
            $.get("fseco-usu-ListDistr", { dep:dept,pro:code }, function(resultado)
            {
                if($.trim(resultado)=='salir')
                {
                  location.reload();
                }
                else
                {
                    if(resultado == false)
                    {
                      document.getElementById("cboDisColegio").options.length=1;
                      document.getElementById("Sec_Col").options.length=1;
                      document.getElementById("cboColegioProce").options.length=1;

                      $("#cboDisColegio").attr("disabled",true);
                      $("#Sec_Col").attr("disabled",true);
                      $("#cboColegioProce").attr("disabled",true);
                    }
                    else
                    { 
                        if(code==""){
                          document.getElementById("cboDisColegio").options.length=1;
                          document.getElementById("Sec_Col").options.length=1;
                          document.getElementById("cboColegioProce").options.length=1;

                          $("#cboDisColegio").attr("disabled",true);
                          $("#Sec_Col").attr("disabled",true);
                          $("#cboColegioProce").attr("disabled",true);
                        }
                        else
                        {
                          $("#cboDisColegio").attr("disabled",false);
                          document.getElementById("cboDisColegio").options.length=1;
                          $('#cboDisColegio').append(resultado);

                        }
                      document.getElementById("Sec_Col").options.length=1;
                      document.getElementById("cboColegioProce").options.length=1;
                      $("#Sec_Col").attr("disabled",true);
                      $("#cboColegioProce").attr("disabled",true);                             
                    }
              }
            });//fin get
          }

          function cargar_tipo_colegio(){

            var dist = $("#cboDisColegio").val();

            $("#Sec_Col").attr("disabled",false);
            document.getElementById("Sec_Col").options.length=1;

            if(dist ==""){
                document.getElementById("Sec_Col").options.length=1;
                $("#Sec_Col").attr("disabled",true);
                document.getElementById("cboColegioProce").options.length=1;
                $("#cboColegioProce").attr("disabled",true);

            }
            else{
                $("#Sec_Col").attr("disabled",false);
                document.getElementById("Sec_Col").options.length=1;
                $("#Sec_Col").append('<option value="ESTATAL">Estatal</option>');
                $("#Sec_Col").append('<option value="PARTICULAR">Particular</option>');
            }
            //desativa el boton colegio procedencia
            document.getElementById("cboColegioProce").options.length=1;
            $("#cboColegioProce").attr("disabled",true);

          }

          function dependencia_colegio()
          { 
            var dep=$("#cboDepColegio").val();
            var pro=$("#cboProColegio").val();
            var dis=$("#cboDisColegio").val();
            var tip_cole=$("#Sec_Col").val();
            var cod_tip_col="02";//estatal
            if(tip_cole=='PARTICULAR')cod_tip_col="01";

            $.get("fseco-usu-ListColegio", { dep:dep,pro:pro,dis:dis,col:cod_tip_col }, function(resultado)
            {
              
                if($.trim(resultado)=='salir')
                {
                  location.reload();

                }
                else
                {
                    if(resultado == false)
                    {
                      document.getElementById("cboColegioProce").options.length=1;   
                      $("#cboColegioProce").attr("disabled",true);
                    }
                    else
                    {  
                        if(tip_cole ==""){
                          document.getElementById("cboColegioProce").options.length=1;
                          $("#cboColegioProce").attr("disabled",true);
                        }
                        else
                        {
                          $("#cboColegioProce").attr("disabled",false);
                          document.getElementById("cboColegioProce").options.length=1;
                          $('#cboColegioProce').append(resultado); 
                        }            
                    }
                }
            });//fin get
          }
//fin funciones para cargar el luagar de los colegios
 function cargar_lugar()
          {
            cargar_departamento();//llamar a llenar combo departamento
            $("#departamento_l").change(function(){dependencia_provincia();});
            $("#provincia_l").change(function(){dependencia_distrito();});
            $("#provincia_l").attr("disabled",true);
            $("#distrito_l").attr("disabled",true);  
          }

          function cargar_departamento()
          {
            $.get("fseco-usu-ListDep",{}, function(resultado)
            {
              if(resultado == false)
              {
              alert("Error");
              }
              else
              {
                $('#departamento_l').append(resultado); 
              }
            }); 
          }

              // cargando combos -------------
          var codeE;
          function dependencia_provincia()
          {  
            var codDepa = $("#departamento_l").val();
            codeE=codDepa; 
            $.get("fseco-usu-ListProv", { code:codDepa }, function(result)
            {
             
                if($.trim(result)=='salir')
                {
                  location.reload();
                }
                else
                {
                    if(result == false)
                    {
                      document.getElementById("provincia_l").options.length=1;    
                      document.getElementById("distrito_l").options.length=1;
                      $("#provincia_l").attr("disabled",true);
                      $("#distrito_l").attr("disabled",true);
                    }
                    else
                    { 
                        if(codDepa ==0){
                          document.getElementById("provincia_l").options.length=1;//cantidad de opciones
                          $("#provincia_l").attr("disabled",true);
                        }
                        else
                        {
                          $("#provincia_l").attr("disabled",false);
                          document.getElementById("provincia_l").options.length=1;    
                          $('#provincia_l').append(result);
                        }   
                      document.getElementById("distrito_l").options.length=1;//cantidad de opciones
                      $("#distrito_l").attr("disabled",true);          
                    }
              }
            }
            );//fin get
          }
          function dependencia_distrito()
          {
            var depa=$("#departamento_l").val();
            var code = $("#provincia_l").val();
            $.get("fseco-usu-ListDistr", { dep:depa,pro:code }, function(resultado)
            {
             
                if($.trim(resultado)=='salir')
                {
                  location.reload();
                }
                else
                {
                    if(resultado == false)
                    {
                      document.getElementById("distrito_l").options.length=1;   
                      $("#distrito_l").attr("disabled",true);
                    }
                    else
                    { 
                        if(code ==0){
                          document.getElementById("distrito_l").options.length=1;
                          $("#distrito_l").attr("disabled",true);
                        }
                        else
                        {
                          $("#distrito_l").attr("disabled",false);
                          document.getElementById("distrito_l").options.length=1;
                          $('#distrito_l').append(resultado); 
                        }            
                    }
              }
            });//fin get

          }
      //------------------------------
      //------------------------------------------
</script>
<div class="contenedor_cuerpo" style="padding-top: 4px;">    
    <br>

      <div id="">
	<!--  cabecera -->
	     <div align="center">
	        <table class="cxcc" border="0" style="text-align:left; width: 600px; box-shadow: 0px 0px 0px black;" >
	            <tr>
	              <td>
	                <label style="color: rgb(38, 116, 168);font-family: 'Times New Roman', Times, serif;font-size: 10px;">
	                  <p align="justify">	                    
	                  </p>
	                </label>
	            </tr>
	            <tr>
	              <td>
	                <br>
	                <p align="left">
	                  <label style="color: rgb(168, 38, 38);font-family: 'Times New Roman', Times, serif;font-size: 15px;" id="aviso_tit" name="aviso_tit">
	                  
	                  </label>
	                </p>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                <p align="justify">
	                  <label style="color: rgb(250, 0, 0);font-family: 'Times New Roman', Times, serif;font-size: 15px;" id="aviso_adv" name="aviso_adv">
	                  
	                  </label>
	                </p>
	              </td>
	            </tr>
	            <tr>
	              <td>
	                <p align="justify">
	                  <label style="color: rgb(38, 116, 168);font-family: 'Times New Roman', Times, serif;font-size: 15px;" id="aviso_err" name="aviso_err">
	                  
	                  </label>
	                </p>
	              </td>
	            </tr>
	        </table>
	      </div>
	<!-- fin cabecera -->
      <?php set_imagen("fseco/checked.png","15","15");?>, Completo / 
      <?php set_imagen("fseco/error.png","15","15");?>, Incompleto
		<!--botones de imprimir y guardar -->
	      <div align="right">
          <button title="Imprimir" type="button" id="cod_b" onclick=if(validar_pestanias()){imprimir($("#cod").val(),"alumno_fseco");}else{alert("'.'falta_rellenar_encuesta'.'");} ><?php set_imagen("fseco/icono_imp.jpg","30","30");?></button> 
          <button title="Registrar Datos"  type="button" id="reg" value="registrar" onclick="submitForm();"><?php set_imagen("fseco/guardar.jpg","30","30");?></button>
          </div>
         <!-- fin botones de imprimir y guardar -->

         <!-- Datos de Navegacion -->
        <div align="center">

          <div id="cargando" style="display:none;"><?php set_imagen("fseco/cargando_cuadrado.gif","112","112");?></div> 
            <?php 
              $menu=array('per'=>'Dts. Pers.',
                'aca'=>'Dts. Acad.',
                'conv'=>'Dts. Conv.',
                'aEco'=>'Dts. Eco.',
                'ing'=>'Ingresos',
                'eg'=>'Egresos',
                'viv'=>'Vivienda',
                'sal'=>'Salud',
                'otro'=>'Otros');   
            pestaias_menu($menu);//menus
          ?>
        <!-- wrapper -->
     	<div id="wrapper">
        <!-- steps -->
          	<div id="steps">
            <!-- formulario -->
	            <form name="FRM_fseco" id="FRM_fseco" action="fseco-usu-reg" method="post" >
		            <?php 
                   $items=array('Datos Personales'=>'fseco-usu-datos-personales.php',
                      'Datos Academicos'=>'fseco-usu-datos-academicos.php',
                      'Grupo Convivencia'=>'fseco-usu-datos-grConv.php',
                      'Economico-Ocupacion del:'=>'fseco-usu-datos-economia.php',
                      'Ingresos económico mensual S/.(promedio de los tres últimos meses)'=>'fseco-usu-datos-ingresos.php',
                      'Egresos económico mensual a nivel de la familia(si se autosostiene, a nivel personal)'=>'fseco-usu-datos-egresos.php',
                      'Vivienda'=>'fseco-usu-datos-vivienda.php',
                      'Salud'=>'fseco-usu-datos-salud.php',
                      'Otros Datos'=>'fseco-usu-datos-otros.php');
                   pestaias_items($items);
		            ?>
	            <div id="mensaje_correcto" style="display: none;" title="Correcto">
	                    <!--<div style="width:450px; height: 190px;" id="int_dialog" align="center">
	                        <tr align="center">
	                          <img src="Herramientas/Recursos/images/correcto.jpg" width="150" height="150">
	                        </tr>
	                    </div>-->
	                  </div>
	                  <input type="hidden" name = "action" id= "action" value="guardarFSECO" />
                    <input type="hidden" name = "usuAdmin" id= "usuAdmin" value="usu" />

	            </form><!-- fin formulario -->
      		</div>

    <!-- fin steps -->
        </div>
		<!-- fin wrapper -->
    </div><!-- fin fin -->
</div><!-- fin contenedor cuerpo-->

<form name="frm_oculto", id="frm_oculto" action="fseco-usu-reporte" method="POST" target="_blank">
    <input type="hidden" name = "usuario_cod" id= "usuario" value="" />
    <input type="hidden" name = "usuario_rpta" id= "rpta" value="" />
</form>

<script> 
//------------------------------------- verificar accion por cada boton de cambio de hoja ------------------------------------
$("#otro").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#per").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#lug").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
 validar_pestanias();
});
$("#aca").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#conv").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#aEco").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#ing").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#eg").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#viv").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
$("#sal").click(function () {
    //desseleccionar la pestaña de Dts.Pers.
    $("#per").css({
      "background": ""
    })
    //findesseleccionar la pestaña de Dts.Pers.
  validar_pestanias();
});
//------------------------------------------------------------------------------------------------------------------------
</script>
