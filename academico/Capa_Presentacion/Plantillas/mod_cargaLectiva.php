    <div class="contenedor_cuerpo">       
        <fieldset>
            <div class="titulo_modulo">ASIGNACIÓN DE CARGA LECTIVA</div>

            <p class="css_mod_subtitulo">Buscar Docente</p>
            
            <div class="form_busqueda">
                 <input placeholder = 'Ingrese DNI del Docente' type="busqueda" name="dniDocente" id="dniDocente" onkeyUp="return ValNumero(this);" maxlength="8"/>
                 <!--button class="css_btn_buscar" id="btn_reg_est" onclick="buscarDocente();"/-->
                 <div class="css_btn_buscar" onclick="buscarDocente();"></div>
            </div>
            
            <p id="lbl_nombre" class="css_mod_parrafo">---</p>
                 
            <p class="css_mod_subtitulo">Datos de Carga Lectiva</p>
             
            <div class="div_busqueda">
                <select class="detalle_" name="cmb_sede" id="cmb_sede" style="width:200px;" disabled>
                    <option value="0">SEDE</option> 
                        <?php
                            $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
                            $data=Logica::PA_UPLA("[Academico].[paLis_sede]","array",$xml_x);
                            opciones_combo($data,"id","detalle");
                        ?>  
                </select>

                <select class="detalle_" name="cmb_modalidad" id="cmb_modalidad" style="width:200px;" disabled>
                    <option value="0">MODALIDAD</option> 
                        <?php 
                          $data=Logica::PA_UPLA("[Academico].[paLis_modalidad]","array",$xml_x);
                          opciones_combo($data,"id","detalle");
                        ?>
                </select>

		<select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:200px;" disabled>
                    <option value="0">FACULTAD</option>
                        <?php
                           $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
                           opciones_combo($data,"id","detalle");
                        ?>              
                    </select>
                <br/><br/>
		
                <select class="detalle_" name="cmb_carrera" id="cmb_carrera" style="width:200px;" disabled>
                    <option value="0">CARRERA</option>               
                </select>

                <select class="detalle_" name="cmb_ciclo" id="cmb_ciclo" style="width:200px;" disabled>
                       <option value="0">CICLO</option> 
                       <?php
                          $data=Logica::PA_UPLA("[Academico].[paLis_ciclos]","array");
                          opciones_combo($data,"id","detalle");
                       ?>
                </select>
    
                <select class="detalle_" name="cmb_salon" id="cmb_salon" style="width:200px;" onchange="cargar_horario_salon();ocultar();cargar_docentes()" disabled>
                   <option value="0">SALON</option>                   
                </select>
                <br><br>

                <select class="detalle_" name="cmb_cursoxsal_u" id="cmb_cursoxsal_u" style="width:350px" disabled="true">
                    <option value="0">CURSO</option> 
                </select>
                
                <br><br>
                
                <button class="css_btn" id="btn_asigCarga" onclick="asignarCargaLectiva()" style="width: 160px;">Asignar</button>
                <br><br><label id="aviso_aux" style="color:blue;font-weight: bold"></label>
            </div>
                                
        </fieldset>
        
    </div>
    
<script>
        function buscarDocente() {
            var dniDoc = $("#dniDocente").val();
            
            if (dniDoc.length!=8){
                alerta("El DNI no ha sido ingresado de manera correcta","Alerta!!");
            }
            
            else
            {
                var params={};
                params['v_dni']=dniDoc;
                $.ajax({
                    data : params,
                    type: "GET",
                    url: "buscarDocente",
                    dataType: "json",
                    success : function(data){
                                    
                        ocultarCargando();//========= Mostrar "Cargando"
                        //alert(data[0]);
                        if (data[0]!="DNI no encontrado"){
                            $("#lbl_nombre").text(data[0][1]);
                            //$("#lbl_nombre").attr('bakground-color','grey');
                            //$("#dniDocente").attr('disabled','disabled');
                            document.getElementById("cmb_sede").disabled = false;
                        }
                        else{
                            alerta("¡No se encontró! Posiblemente no tenga contrato o no es docente.","Alerta!!");
                            $("#lbl_nombre").text("---");
                        }
                                        
                    }
                    ,error: function()
                    {
                        //alert("Error de Sistema: JSON");
                        location.reload();					
                    }
                });
            }
            
            
        }
        


  //================== SEDE ======================
    $("#cmb_sede").change(
      function()
        {
          var nextComboIndice=buscarEnArray(listCombos,'cmb_sede')+1;
            
          //alert(nextComboIndice);
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            //desactivar el control
            combo.disabled = true;
            x++;
          }
          document.getElementById("cmb_modalidad").disabled = false;
          document.getElementById("cmb_cursoxsal_u").disabled = true;
        }
      );
  //===================== FIN SEDE ===========================

  //=================== MODALIDAD ============================
    $("#cmb_modalidad").change(
      function()
        {
          var nextComboIndice=buscarEnArray(listCombos,'cmb_modalidad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

          if($("#cmb_sede").val()!='0')
          {

            document.getElementById("cmb_sede").style.border="";
            document.getElementById("cmb_facultad").disabled = false;
          }
          else
          {
            document.getElementById("cmb_sede").style.border="2px solid red";
            document.getElementById("cmb_modalidad").selectedIndex=0;
          }
          document.getElementById("cmb_cursoxsal_u").disabled = true;
        }
      );
//================= FIN MODALIDAD =======================
//================== FACULTAD ======================
    $("#cmb_facultad").change(
      function()
        {
          var nextComboIndice=buscarEnArray(listCombos,'cmb_facultad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_modalidad").val()!='0')
          {

            document.getElementById("cmb_modalidad").style.border="";
            cargar_carreras($("#cmb_facultad").val());
            document.getElementById("cmb_carrera").disabled = false;
            
          }
          else
          {
            document.getElementById("cmb_modalidad").style.border="2px solid red";
            document.getElementById("cmb_facultad").selectedIndex=0;
          }
        document.getElementById("cmb_cursoxsal_u").disabled = true;
        }
      );
  //===================== FIN FACULTAD ===========================

  //================== CARRERA ======================
    $("#cmb_carrera").change(
      function()
        {
          var nextComboIndice=buscarEnArray(listCombos,'cmb_carrera')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_facultad").val()!='00')
          {

            document.getElementById("cmb_facultad").style.border="";
            document.getElementById("cmb_ciclo").disabled = false;
            //document.getElementById("cmb_especialidad").disabled = false;
            //cargar_especialidad($("#cmb_carrera").val());
          }
          else
          {
            document.getElementById("cmb_facultad").style.border="2px solid red";
            document.getElementById("cmb_carrera").selectedIndex=0;
          }
            document.getElementById("cmb_cursoxsal_u").disabled = true;
        }
      );
  //===================== FIN CARRERA ===========================

  //================== ESPECIALIDAD ======================
    /*$("#cmb_especialidad").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_especialidad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_carrera").val()!='0')
          {

            document.getElementById("cmb_carrera").style.border="";
            document.getElementById("cmb_especialidad").disabled = false;
            document.getElementById("cmb_ciclo").disabled = false;
          }
          else
          {
            document.getElementById("cmb_carrera").style.border="2px solid red";
            document.getElementById("cmb_especialidad").selectedIndex=0;
          }

        }
      );*/
  //===================== FIN ESPECIALIDAD ===========================

  //================== CICLO ======================
    $("#cmb_ciclo").change(
      function()
        {
            
          var nextComboIndice=buscarEnArray(listCombos,'cmb_ciclo')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_carrera").val()!='0')
          {

            document.getElementById("cmb_carrera").style.border="";
            document.getElementById("cmb_salon").disabled = false;
            cargar_salon();
          }
          else
          {
            document.getElementById("cmb_carrera").style.border="2px solid red";
            document.getElementById("cmb_ciclo").selectedIndex=0;
          }
          document.getElementById("cmb_cursoxsal_u").disabled = true;
        }
      );
  //===================== FIN CICLO ===========================
    //================== SALON ======================
    $("#cmb_salon").change(
      function()
        {
            if ($('#cmb_salon').val()==0) {
               document.getElementById("cmb_cursoxsal_u").style.border="";
                document.getElementById("cmb_cursoxsal_u").disabled = true;
            }
            else{
                document.getElementById("cmb_cursoxsal_u").style.border="";
                document.getElementById("cmb_cursoxsal_u").disabled = false;    
            }
            
            
            $('#cmb_cursoxsal_u option').remove();
            $('#cmb_cursoxsal_u').append('<option value="0">CURSO</option>');
            
 
              $.get("horarioCurxSal_CargaLectiva", { cod:$("#cmb_salon").val(),carr : $("#cmb_carrera").val(),cic : $("#cmb_ciclo").val(),sede : $("#cmb_sede").val(),
                  moda : $("#cmb_modalidad").val()}, function(resultado)
                {
                    
         
                if($.trim(resultado)=='salir')
                {
                  location.reload();
                }
                else
                {
                    if(resultado != false)
                    {
                      $('#cmb_cursoxsal_u').append(resultado);
                      $('#cmb_cursoxsal_u').val(curso);  
                    }
                }
                }
              );

        }
      );
  //===================== FIN SALON ===========================

  
   //=======================================================================================================
   //======================================================================================================= 
   //======================================================================================================= 
  
  
    function asignarCargaLectiva(){
        var sed_id = $('#cmb_sede').val();
        var mac_id = $('#cmb_modalidad').val();
        var car_id = $('#cmb_carrera').val();
        var nta_nivel = $('#cmb_ciclo').val();
        var nta_seccion = $('#cmb_salon').val();
        var per_id = $('#dniDocente').val();
        var asi_id = $('#cmb_cursoxsal_u').val();
        
        if (asi_id != "0") {
            
                var params={};
                params['sed_id']=sed_id;
                params['mac_id']=mac_id;
                params['car_id']=car_id;
                params['nta_nivel']=nta_nivel;
                params['nta_seccion']=nta_seccion;
                params['per_id']=per_id;
                params['asi_id']=asi_id;
            
                $.ajax({
                data : params,
                type: "POST",
                url: "insCargaLectiva",
                dataType: "json",
                async: false,
                success : function(data) 
                {
                    alerta(data['rpta'],"AVISO");
                    $('#aviso_aux').text(data['rpta']);

                    if (data['rpta']=="Ya existe esta Carga Lectiva") {
                        $('#aviso_aux').css("color", "red");
                    }
                    else{
                        //location.href="cargaLectiva";
                        document.getElementById("cmb_sede").disabled = true;
                        document.getElementById("cmb_modalidad").disabled = true;
                        document.getElementById("cmb_facultad").disabled = true;
                        document.getElementById("cmb_carrera").disabled = true;
                        document.getElementById("cmb_ciclo").disabled = true;
                        document.getElementById("cmb_salon").disabled = true;
                        document.getElementById("cmb_cursoxsal_u").disabled = true;
                        $('#aviso_aux').css("color", "blue");
                        $('#btn_asigCarga').hide();
                    }
 

                },
                error: function() 
                {
                    //aviso_mal("Error!...Datos No procesados");                
                    location.reload();
                }
            });  
            
            
            
            
            
            
            

        }
        else{
            alerta("No se han seleccionado todos los campos necesarios para asignar la Carga Lectiva","Aviso");
        }   
        
        
        
    }
  
  
</script>