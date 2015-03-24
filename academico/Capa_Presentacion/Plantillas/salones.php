<input type="hidden" id="cant_campos_anu" name="cant_campos" value="0" />
<input type="hidden" id="ciclo_auxi" name="ciclo_auxi" value="0" />
<input type="hidden" id="truno_siglo" name="truno_siglo" value="0" />
<input type="hidden" id="x_carrera" name="x_carrera" value="0" />
<input type="hidden" id="x_especi" name="x_especi" value="0" />
<input type="hidden" id="x_edit" name="x_edit" value="0" />
        
<div class="contenedor_cuerpo" style="width:732px;">
    <fieldset>
        <p class="titulo_modulo">CONFIGURACIÓN DE HORARIOS</p>

        <label name="l_dequien" id="l_dequien"></label><br>        
        <div>
            <select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:175px;">
                <option value="0">FACULTAD</option>
                <?php
                $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
                $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
                opciones_combo($data,"id","detalle");
                ?>              
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="cmb_car_" id="cmb_car_" style="width:175px;">
                <option value="0">CARRERA</option>               
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:175px;">
                <option value="SX">ESPECIALIDAD</option>               
            </select>
        </div>
        <div>            
            <button class="css_btn" onclick="cargar_datos();" style="width:95px">Ver Salones</button>
            <?php set_imagen_style("Flecha-2.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="sel_ciclo" id="sel_ciclo" style="width:70px;">
                <option value="0">Ciclo</option>
                <option value="PRIMERO">Primero</option>
                <option value="SEGUNDO">Segundo</option>
                <option value="TERCERO">Tercero</option>
                <option value="CUARTO">Cuarto</option>
                <option value="QUINTO">Quinto</option>
                <option value="SEXTO">Sexto</option>
                <option value="SEPTIMO">Septimo</option>
                <option value="OCTAVO" >Octavo</option>
                <option value="NOVENO">Noveno</option>
                <option value="DECIMO">Decimo</option>
                <option value="ONCEAVO">Onceavo</option>
                <option value="DOCEAVO">Doceavo</option>                
            </select>   
            <?php set_imagen_style("Flecha-2.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:184px;">
                <option value="SX">MODALIDAD</option>               
            </select>
            <?php set_imagen_style("Flecha-2.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:167px;">
                <option value="SX">SEDE</option>               
            </select>
            <?php set_imagen_style("Flecha-2.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
        </div>
        <br>
        
        <div id="versalones">         
            <div class="CSSTableSimple">        
                <table style="width:615px;" align="center">
                    <th>Nro</th>
                    <th>Sección</th>
                    <th>Local</th>
                    <th>Aula</th>                    
                    <tbody id="tbDetalle_anu">

                    </tbody>
                    <tr>
                        <td><?php set_imagen("agregar-item.png","30","30")?></td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                </table>
            </div>            
        </div>
      
        </fieldset>

        <fieldset style="padding-top: 0px;">
        <legend style="text-align:center;">Horario</legend>
        <div style="padding-bottom:15px;">
            <label style="padding-right: 2px;">Sección:</label>
            <!--input type="texto" id="txt_lugar" style="width:80px;background: rgb(233, 233, 233); height: 26px;border-radius: 3px;" disabled="true"/-->
            <select class="detalle_" name="cmb_catsec_" id="cmb_catsec_" style="width:80px;background: rgb(233, 233, 233);" disabled="true">
                <option value="0">Sección</option>               
            </select>
            
            <label style="padding-right: 2px;">Local:</label>
            <input class="detalle_" type="text" id="txt_lugar" style="width:210px;background: rgb(233, 233, 233);" disabled="true"/>
       
            <label style="padding-right: 2px;">Aula:</label>
            <input class="detalle_" type="text" id="txt_lugar" style="width:73px;background: rgb(233, 233, 233);" disabled="true"/>
        |    
            <button class="css_btn" onclick="cargar_datos();" style="width:75px">Guardar</button>
        </div>        
        
        <div class="CSSTableSimple" >        
            <table style="width:615px;" align="center">
                <th>Hora/Dia</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>                
                <tbody id="tbDetalle_anu">

                </tbody>
                <tr>
                    <td><?php set_imagen("agregar-item.png","30","30")?></td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                </tr>
            </table>
        </div>
    </fieldset>
</div>


<div id="dialog-confirm" title="¿Desea eliminar este Registro?">  
</div>

<!--..................................................................................................-->
<!--pop pup -->
<!--..................................................................................................-->

<script type="text/javascript">
//=================================================================================================================
//================================================ FUNCIONES SALONES ==============================================
//=================================================================================================================

    function cargar_datos()
    {

        if($("#cmb_car_").val()!='0')
        {
            if($("#cmb_esp_ option").length == 1 || $("#cmb_esp_").val()!='SX')
            {    
                $("#x_carrera").val($("#cmb_car_").val());
                $("#x_especi").val($("#cmb_esp_").val());
                $("#l_dequien").text("HUANCAYO - PRESENCIAL: "+$("#cmb_car_ option[value="+$("#x_carrera").val()+"]").text()+" - "+$("#cmb_esp_ option[value="+$("#x_especi").val()+"]").text());

                ver_salones();              
                
                ocultar();                      
                document.getElementById("cmb_car_").style.border="";
                document.getElementById("cmb_esp_").style.border="";
            }
            else
            {
                document.getElementById("cmb_esp_").style.border="2px solid red";       
            }
        }
        else
        {
            document.getElementById("cmb_car_").style.border="2px solid red";
        }
    }

    function seleccionarEstudiante_2()
    {   
        
        $('#popupbox_sinblock_inmovil').load('cuadroSeleccion');
        $('#popupbox_sinblock_inmovil').draggable();
        $('#popupbox_sinblock_inmovil').show();        
        //$('#block').hide();
        //$('#popupbox').hide(); 
    }

    var ubi_inicio="";

    function ver_salones()
    {  
        
        var i=0;
            while(i<=parseInt($("#cant_campos_anu").val()))
            {
                $("#rowDetalle_anu_" + i).remove(); 
                i++;
            }
                $("#cant_campos_anu").val("0");

        var params={};
        
        params['FacSal_']=$("#cmb_facultad").val();
        params['carr_']=$("#x_carrera").val();
        params['esp_']=$("#x_especi").val();

        $.ajax({
                data : params,
                type: "GET",
                url: "buscarSalones",
                dataType: "json",
                success : function(data) 
                {
                    for(var i=0;i<45;i++)
                    {            
                        var ma_=(parseInt(data['Item'][i]['Datos']['total_tur'])==0)?1:parseInt(data['Item'][i]['Datos']['total_tur']);
                        var ta_=(parseInt(data['Item'][i+1]['Datos']['total_tur'])==0)?1:parseInt(data['Item'][i+1]['Datos']['total_tur']);
                        var no_=(parseInt(data['Item'][i+2]['Datos']['total_tur'])==0)?1:parseInt(data['Item'][i+2]['Datos']['total_tur']);

                        var total_ciclo=ma_+ta_+no_;
                        
                        cliclo_html_inicio(i,data,total_ciclo)
                        i=i+1;
                        ciclos_html(i,data);
                        i=i+1;
                        ciclos_html(i,data);
                    }
                    aviso("cargo Correctamente...","white","orange");
                },
                error: function() 
                {                    
                    //aviso("buscarSalones no devuelve datos utilizables!","white","black");                                        
                    location.reload();
                }
        });
    }

    function ciclos_html(i,data)
    {    

    if(data['Item'][i]['Sec-Est']['Detalle']==undefined)
    {                                
        agregar_registros(false,"",0,true,data['Item'][i]['Datos']['turno_tem'],1,"","",false,"","");    
    }else
    {
        if(data['Item'][i]['Sec-Est']['Detalle'].length==undefined && data['Item'][i]['Sec-Est']['Detalle']['can_saltem']!=undefined)
        {
            agregar_registros(false,"",0,true,data['Item'][i]['Datos']['turno_tem'],data['Item'][i]['Datos']['total_tur'],data['Item'][i]['Sec-Est']['Detalle']['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle']['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle']['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle']['saldesc']);
        }
        else if(data['Item'][i]['Sec-Est']['Detalle'].length!=undefined)
        {                      
            for(var index=0; index<data['Item'][i]['Sec-Est']['Detalle'].length;index++)    
            {                                    
                if(index<1)
                {                                    
                    agregar_registros(false,"",0,true,data['Item'][i]['Datos']['turno_tem'],data['Item'][i]['Datos']['total_tur'],data['Item'][i]['Sec-Est']['Detalle'][index]['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle'][index]['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['saldesc']);
                }
                else
                {
                    agregar_registros(false,"",0,false,"",0,data['Item'][i]['Sec-Est']['Detalle'][index]['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle'][index]['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['saldesc']);
                }
            }
        }
    }

    }
    /*

    */
    function cliclo_html_inicio(i,data,filas_ciclo)
    {
    if(data['Item'][i]['Sec-Est']['Detalle']==undefined)
    {   
        agregar_registros(true,data['Item'][i]['Datos']['ciclo_tem'],filas_ciclo,true,data['Item'][i]['Datos']['turno_tem'],1,"","",false,"","");    
    }else
    {
        if(data['Item'][i]['Sec-Est']['Detalle'].length==undefined && data['Item'][i]['Sec-Est']['Detalle']['can_saltem']!=undefined)
        {

            agregar_registros(true,data['Item'][i]['Datos']['ciclo_tem'],filas_ciclo,true,data['Item'][i]['Datos']['turno_tem'],1,data['Item'][i]['Sec-Est']['Detalle']['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle']['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle']['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle']['saldesc']);
        }
        else if(data['Item'][i]['Sec-Est']['Detalle'].length!=undefined)
        {                      
            
            for(var index=0; index<data['Item'][i]['Sec-Est']['Detalle'].length;index++)                            
            {
                
                if(index<1)
                {                                    
                    agregar_registros(true,data['Item'][i]['Datos']['ciclo_tem'],filas_ciclo,true,data['Item'][i]['Datos']['turno_tem'],data['Item'][i]['Datos']['total_tur'],data['Item'][i]['Sec-Est']['Detalle'][index]['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle'][index]['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['saldesc']);                    
                }
                else
                {
                    agregar_registros(false,"",0,false,"",0,data['Item'][i]['Sec-Est']['Detalle'][index]['Sec_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['can_saltem'],true,data['Item'][i]['Sec-Est']['Detalle'][index]['cod_saltem'],data['Item'][i]['Sec-Est']['Detalle'][index]['saldesc']);
                }
            }

        }
    } 

    }
    //#====================================================================================================0000
    //====================================== FUNCIONES PARA TABLAS DINÁMICAS ==============================0000
    //#====================================================================================================0000

    function agregar_registros(cp1,dat1,num1,cp2,dat2,num2,dat3,dat4,img_el,cod_det_sal,des){
        
        $("#cant_campos_anu").val(parseInt($("#cant_campos_anu").val()) + 1);
        var oId = $("#cant_campos_anu").val();
        var axu_ciclo="";
        var axu_turno="";
        
        
        if(cp1)
        {
            var strHtml1 = "<td rowspan="+num1+" >"+dat1+"</td>";     
            axu_ciclo=dat1;
        }
        else
        {
            axu_ciclo=$("#i_aux_ciclo" + (oId-1)).val();            
        }

        if(cp2)
        {
            var strHtml2 = "<td rowspan="+num2+" >"+dat2+"</td>"; 
            axu_turno=dat2;     
        }
        else
        {
            axu_turno=$("#i_aux_turno" + (oId-1)).val();
        }

        var strHtml3 = "<td ><input type='hidden' id='i_aux_ciclo" + oId + "' name='i_aux_ciclo" + oId + "' value='" + axu_ciclo + "'/><input type='hidden' id='i_aux_turno" + oId + "' name='i_aux_turno" + oId + "' value='" + axu_turno + "'/>" + dat3  +'</td>' ;      
        var strHtml4 = "<td ><input type='hidden' id='i_cant_x_" + oId + "' name='i_cant_x_" + oId + "' value='" + dat4 + "'/>" + dat4 + '</td>' ;  

        var img="",elim="";
        if(img_el)
        {  
            img='<?php set_imagen("salones/editar_2.png","25","30","Editar","onclick","editar__(' + oId + ');","salones/editar.png","salones/editar_2.png");?>';
            el='<input type="checkbox" class="squaredTwo" name="eliminar_check" id="eliminar_check'+oId+'" value="'+cod_det_sal+'" onclick=mostrar_otras_opciones();>';             
            //'<?php set_imagen("salones/quitar_2.png","25","30","Eliminar","onclick","eliminarFila(' + oId + ');","salones/quitar.png","salones/quitar_2.png");?>';  
            
        }
        else
        {
            img="-";
            el="-";
        }

        
        var strHtml6 = "<td ><input type='hidden' id='i_descrip_" + oId + "' name='i_descrip_" + oId + "' value='" + des + "'/>" + des +"</td>";
        var strHtml7 = "<td ><input type='hidden' id='i_seccion_" + oId + "' name='i_seccion_" + oId + "' value='" + (axu_ciclo +"->"+ axu_turno + "->" +dat3) + "'/>" + img +'</td>' ;
        var strHtml8 = "<td >" + el +'</td>' ;
                
        var strHtmlTr = "<tr id='rowDetalle_anu_" + oId + "' align='center' ></tr>";//onmouseover=this.style.backgroundColor='#ffff66'; onmouseout=this.style.backgroundColor='#d4e3e5';
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml6 + strHtml7 + strHtml8;

        //tambien se puede agregar todo el HTML de una sola vez.
        $("#tbDetalle_anu").append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#rowDetalle_anu_" + oId).html(strHtmlFinal);
    }

    //#====================================================================================================0000
    //====================================== FUNCIONES PARA TABLAS DINÁMICAS ==============================0000
    //#====================================================================================================0000

    function todasFilas()
    {
        for(c=1;c<parseInt($("#cant_campos_anu").val());c++)
        {            
            $("#eliminar_check"+c).prop("checked", "checked");                           
        }
    }

    function ninFilas()
    {
        for(c=1;c<parseInt($("#cant_campos_anu").val());c++)
        {
            $("#eliminar_check"+c).prop("checked", "");                           
        }
        minimizar("div_btnarri");
    }


    function mostrar_otras_opciones()
    {        
        var key=false;
        
        for(c=1;c<parseInt($("#cant_campos_anu").val());c++)
        {
            if($("#eliminar_check"+c).is(':checked'))
            {        
                key=true;
                maximizar("div_btnarri");
                /*maximizar("div_btnTod");
                maximizar("div_btnNin");*/
                break;
            }            
        }

        if(!key)
        {
            minimizar("div_btnarri");
            /*minimizar("div_btnTod");
            minimizar("div_btnNin");*/
        }
            
    }

    function eliminarFila()
    {              
        
        $("#dialog-confirm").dialog({
            resizable: false,
            
            width:350,            
            modal: true,
            position: ["center",300],
            buttons: {
                'confirmar': function() 
                {
                    eliminar_item();      
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });  
    }

    function eliminar_item()
    {
        
        var cade_cur_eli="";
        var params={};
        
                        //params['action']="eliminar_fila";
                        for(c=1;c<parseInt($("#cant_campos_anu").val());c++)
                        {
                            if($("#eliminar_check"+c).is(':checked'))
                            cade_cur_eli+=$("#eliminar_check"+c).val()+",";
                        }

                               
                        params['fac_sal_']=$("#cmb_facultad").val();
                        params['carr_eli']=$("#x_carrera").val();
                        params['esp_eli']=$("#x_especi").val(); 
                        params['grupo_eli']=cade_cur_eli;        
                          
                        

                        $.ajax({
                        data : params,
                        type: "POST",
                        url: "eliminarSalones",
                        dataType: "json",
                        success : function(data) 
                        {   
                            
                                //ubi_inicio=$("#i_aux_ciclo" + oId).val();                        
                                ver_salones();  
                                //mover_web(ubi_inicio);    
                        
                        },
                        error: function() 
                        {
                            //aviso("eliminarSalones no puedo realizarse!","white","black");                    
                            location.reload();
                        }
                        });  

    }

    function editar__(oId)
    {        
        $("#dialog-form" ).dialog( "open" );
        $("#l_titpop").text($("#i_seccion_" + oId).val());        
        $("#name").val($("#i_cant_x_" + oId).val());
        $("#x_edit").val(oId);
        $("#i_desd_").val($("#i_descrip_" + oId).val());        
        var axu_codcur=$("#eliminar_check" + oId).val();  
        $("#i_x_cod").val(axu_codcur);   


        var aux=$("#i_seccion_" + oId).val();       
        var num=aux.substring(0,aux.indexOf("->"));  
/*
         if($("#x_especi").val()=='SX')
            var car_esp_=$("#x_carrera").val();
        else                        
            var car_esp_=$("#x_especi").val();
 */

        $.get("lista_cursalEdit", { ciclo: numero_ciclo(num),carr:$("#x_carrera").val(),esp:$("#x_especi").val()} ,function(resultado)
        {
            if(resultado == false)
            {
                $('#f_lista_edit').empty();
                $('#f_lista_edit').append("No existe información...");  
            }
            else
            {
                $('#f_lista_edit').empty();
                $('#f_lista_edit').append(resultado);

                    $.get("seleccioncursos", {cod_cur:axu_codcur} ,function(resultado_aux)
                    {
                        if(resultado_aux != false)
                        {
                            for(c=0;c<parseInt($("#cant_checksalEdit").val());c++)
                            {   
                               if(resultado_aux.indexOf($("#cbEdit"+c).val())!=-1)
                                $("#cbEdit"+c).prop("checked", "checked");                           
                            }
                        }
                    });               
                                                     
            }
        });
    }  

    //..................................................................................................
    //pop pup ------------------------------------------------------------------------------------------
    //..................................................................................................

    $(function() 
    {
        var name = $( "#name" ),
        email = $( "#email" ),
        password = $( "#password" ),
        allFields = $( [] ).add( name ).add( email ).add( password ),
        tips = $( ".validateTips" );

    //funcion pra indicar el error
        function updateTips( t ) 
        {
            tips
            .text( t )
            .addClass( "ui-state-highlight" );
            setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }
         
        
        //funcion para evaluar si es numero o no
        function checkNum( o ) 
        {
          if (isNaN(o.val())) {
            o.addClass( "xui-state-error" );
            updateTips( "Ingrese un Número" );
            return false;
          } 
          else if(o.val()=='')
          {
            o.addClass( "xui-state-error" );
            updateTips( "Ingrese un Número" );
            return false;
          }
          else {      
            return true;
          }
        }

        $( "#dialog-form" ).dialog(
        {
          autoOpen: false,
          height: 560,
          width: 500,
          modal: true,
          position: ["center",300],
          buttons: 
          {
            "Actualizar": function() 
            {
            var bValid = true;
            allFields.removeClass( "ui-state-error" ); 
            bValid = bValid && checkNum(name);     

            if($("#name").val()==""){ bValid=cajaColor("name","red"); }else{ cajaColor("name",""); }

            var cade_cur="";

            for(c=0;c<parseInt($("#cant_checksalEdit").val());c++)
            {
                if($("#cbEdit"+c).is(':checked'))
                cade_cur+=$("#cbEdit"+c).val()+",";
            }        

            if(cade_cur==""){ bValid=cajaColor("c_nom","red"); }else{ cajaColor("c_nom",""); } 

              if ( bValid ) 
              {          
                edit_accion(cade_cur);
                $( this ).dialog( "close" );
              }    
            }
            ,
            Cancel: function() 
            {
              $( this ).dialog( "close" );
            }
          }
          ,
          close: function() 
          {
            allFields.val( "" ).removeClass( "ui-state-error" );
          }

        });

    });

    //..................................................................................................
    //pop pup ------------------------------------------------------------------------------------------
    //..................................................................................................

    function edit_accion(cade_cur)
    {
            var params={};
        
            params['cod_sal']=$("#i_x_cod").val();                    
            params['fac_sal_']=$("#cmb_facultad").val();   
            params['can_sal']=$("#name").val();
            params['carr_edit']=$("#x_carrera").val();
            params['esp_edit']=$("#x_especi").val();
            params['desc_edit']=$("#i_desd_").val();  
            params['cursos_']=cade_cur;   

            $.ajax({
                    data : params,
                    type: "POST",
                    url: "editarFila",
                    dataType: "json",
                    success : function(data) 
                    {   
                        if(data['rpta']=='Actualizado')
                        {            
                            ubi_inicio=$("#i_aux_ciclo" + $("#x_edit").val()).val();                        
                            ver_salones();  
                            mover_web(ubi_inicio); 
                        }
                        else
                        {
                            alert(data['rpta']);
                        }
                    },
                    error: function() 
                    {
                        //aviso("editarFila no puedo realizarse!","white","black");                     
                        location.reload();
                    }
            }); 
     
    }

    function reg_salon__()
    {
        
        var llave=true;
        if($("#sel_ciclo").val()=="0"){ llave=cajaColor("sel_ciclo","red"); }else{ avisoLimpiar("sel_ciclo"); }
        if($("#sel_turno").val()=="0"){ llave=cajaColor("sel_turno","red"); }else{ avisoLimpiar("sel_turno"); }
        if($("#sel_cant").val()=="0"){ llave=cajaColor("sel_cant","red"); }else{ avisoLimpiar("sel_cant"); }
        if($("#i_desd").val()==""){ llave=cajaColor("i_desd","red"); }else{ avisoLimpiar("i_desd"); }

        var cade_cur="";
        
        for(c=0;c<parseInt($("#cant_checksal").val());c++)
        {
            if($("#cb"+c).is(':checked'))
            cade_cur+=$("#cb"+c).val()+",";
        }
        if(cade_cur==""){ llave=cajaColor("p_1","red"); }else{ avisoLimpiar("p_1"); }        

        if(llave)
        {
            
            var params={};
                           
            params['ciclo_']=$("#sel_ciclo").val();0
            params['turno_']=$("#sel_turno").val();
            params['cant_']=$("#sel_cant").val();
            params['fac_sal_']=$("#cmb_facultad").val(); 
            params['carr_reg']=$("#x_carrera").val();
            params['esp_reg']=$("#x_especi").val();
            params['cmb_tipSal']=$("#cmb_tipSal").val();
            params['i_desd']=$("#i_desd").val();  
            params['cursos_']=cade_cur;  

            $.ajax({
                    data : params,
                    type: "POST",
                    url: "regSalones",
                    dataType: "json",
                    success : function(data) 
                    {   
                        if(data['rpta']=='OK')
                        {                   
                            ver_salones();
                            mover_web(ubi_inicio);
                        }
                        else
                        {
                            aviso_adv("no se registro vuleva a intentarlo por favor.");                               
                        }
                        
                    },
                    error: function() 
                    {
                       //aviso("regSalones no puedo realizarse!","white","black");                   
                       location.reload();
                    }
            });
        }
    }

    function ocultar() {
        $('#popupbox_sinblock_inmovil').hide();
        $("#popupbox_minimizado").css("display", "block");
    }

    function mostrar() {
        $('#popupbox_sinblock_inmovil').show();        
        $("#popupbox_minimizado").css("display", "none");
    }

//=================================================================================================================

</script>
