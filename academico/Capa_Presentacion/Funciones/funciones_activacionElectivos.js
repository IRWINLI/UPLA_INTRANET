var ArregloAsignElectivas=new Array();
var ArregloElectivasSelectas = Array();

//=================================================================================================================
//================================================ FUNCIONES SALONES ==============================================
//=================================================================================================================

    var listarElectivos=function()
    {  
        if(comprobar_combos())
        {
            var params={};
                                       
            params['carr']=$("#cmb_car_").val();
            params['esp']=$("#cmb_esp_").val();
            params['ciclo']=$("#sel_ciclo").val();
            params['sede']=$("#cmb_sed_").val();
            params['moda']=$("#cmb_mod_").val();
            params['planEst']=$("#cmb_planes").val(); 

            $("#t_electivos td").remove();
            
            $.ajax({
                    data : params,
                    type: "GET",
                    url: "ListarAsignaturasElectivas",
                    dataType: "json",
                    success : function(data) 
                    {
                        $("#btn_activarElectivos").css("display","block");
                         
                        ArregloAsignElectivas.length=0;
                            
                        for(var i=0;typeof(data[i])!= "undefined";i++)
                        {
                            ArregloAsignElectivas.push(data[i][0]);
                            var v_checked = '';
                            if (data[i][2]=='SI') {
                                v_checked = 'checked';
                                
                            }
                            $("#t_electivos").append('<tr><td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td><input id="chbx_'+data[i][0]+'" type="checkbox" '+v_checked+'></input></td></tr>');
                            
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
    
    var insertarElectivos = function()
    {
        ArregloElectivasSelectas.length=0;
        for (var i=0;typeof(ArregloAsignElectivas[i])!="undefined";i++)
        {
            if($("#chbx_"+ArregloAsignElectivas[i]).is(':checked')) {
                ArregloElectivasSelectas.push(ArregloAsignElectivas[i]);
            }
        }
        
        var params={};
                                       
        params['carr']=$("#cmb_car_").val();
        params['esp']=$("#cmb_esp_").val();
        params['ciclo']=$("#sel_ciclo").val();
        params['sede']=$("#cmb_sed_").val();
        params['moda']=$("#cmb_mod_").val();
        params['planEst']=$("#cmb_planes").val();
        params['asignturas']=arreglo_cadena(ArregloElectivasSelectas);
        
        $.ajax({
            data : params,
            type: "POST",
            url: "ejecutarActivacionElectivas",
            dataType: "json",
            success : function(data) 
            {
                if(data['rpta']=='INSERTADO')
                {
                    notificacion(2,"Se han registrado los Cambios","Se han registrado las Asignaturas Electivas seleccionadas.",10);
                }
                else if (data['rpta']=='TIEMPOPASADO')
                {
                    notificacion(0,"El proceso de matrícula ha comenzado","Lo sentimos, no es posible realizar cambios puesto que el periodo de matrículas ha comenzado",10);
                    listarElectivos();
                }
                else if(data['rpta']=='ERROR')
                {
                    notificacion(0,"Error","Error en el registro, consulte con el administrador del sistema.",10);
                }
            },
            error: function() 
            {
                //aviso("regSalones no puedo realizarse!","white","black");                   
                location.reload();
            }
        });

    }
    

    var tabla_add_salones=function(i,cod,sec,loc,aul,tab,item)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val(); 
        
        var strHtml1 = "<td><input type='hidden' name='priv_"+oId+"' id='priv_"+oId+"' value='"+cod+"' />" + i +"</td>";    
        var strHtml2 = "<td><input type='hidden' name='sec_"+oId+"' id='sec_"+oId+"' value='"+sec+"' />" + sec +"</td>";    
        var strHtml3 = "<td><input type='hidden' name='loc_"+oId+"' id='loc_"+oId+"' value='"+loc+"' />" + loc +"</td>";    
        var strHtml4 = "<td><input type='hidden' name='aul_"+oId+"' id='aul_"+oId+"' value='"+aul+"' />" + aul +"</td>";    
        var strHtmlTr = "<tr onmouseover=colortb1=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb1; style='cursor: pointer;' id='"+tab+"_" + oId + "' align='center' onclick=opcionesdefila("+oId+",'"+tab+"','"+item+"'); ></tr>";
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    var tabla_add_nuevosalon=function(horas,tab,item)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val(); 
        
        var strHtml1 = "<td style='cursor: pointer;' id='horas_"+oId+"'><input type='hidden' name='horas_"+oId+"' id='horas_"+oId+"' value='"+horas+"' />" + horas +"</td>";    
        var strHtml2 = "<td style='cursor: pointer;' id='lunes_"+oId+"' onclick=cambiarcolorcelda('lunes_"+oId+"');><input type='hidden' name='lunes_"+oId+"' id='lunes_"+oId+"' value='' /></td>";//ondblclick=agregarcurso('LUNES',"+oId+",'lunes_"+oId+"');
        var strHtml3 = "<td style='cursor: pointer;' id='martes_"+oId+"' onclick=cambiarcolorcelda('martes_"+oId+"');><input type='hidden' name='martes_"+oId+"' id='martes_"+oId+"' value='' /></td>";    //ondblclick=agregarcurso('MARTES',"+oId+",'martes_"+oId+"');
        var strHtml4 = "<td style='cursor: pointer;' id='miercoles_"+oId+"' onclick=cambiarcolorcelda('miercoles_"+oId+"');><input type='hidden' name='miercoles_"+oId+"' id='miercoles_"+oId+"' value='' /></td>";    //onclick=agregarcurso('MIERCOLES',"+oId+",'miercoles_"+oId+"');
        var strHtml5 = "<td style='cursor: pointer;' id='jueves_"+oId+"' onclick=cambiarcolorcelda('jueves_"+oId+"');><input type='hidden' name='jueves_"+oId+"' id='jueves_"+oId+"' value='' /></td>";    //onclick=agregarcurso('JUEVES',"+oId+",'jueves_"+oId+"');
        var strHtml6 = "<td style='cursor: pointer;' id='viernes_"+oId+"' onclick=cambiarcolorcelda('viernes_"+oId+"');><input type='hidden' name='viernes_"+oId+"' id='viernes_"+oId+"' value='' /></td>";    //onclick=agregarcurso('VIERNES',"+oId+",'viernes_"+oId+"');
        var strHtml7 = "<td style='cursor: pointer;' id='sabado_"+oId+"' onclick=cambiarcolorcelda('sabado_"+oId+"');><input type='hidden' name='sabado_"+oId+"' id='sabado_"+oId+"' value='' /></td>";    //onclick=agregarcurso('SABADO',"+oId+",'sabado_"+oId+"');
        var strHtml8 = "<td style='cursor: pointer;' id='domingo_"+oId+"' onclick=cambiarcolorcelda('domingo_"+oId+"');><input type='hidden' name='domingo_"+oId+"' id='domingo_"+oId+"' value='' /></td>";    //onclick=agregarcurso('DOMINGO',"+oId+",'domingo_"+oId+"');

        var strHtmlTr = "<tr id='"+tab+"_" + oId + "' align='center'></tr>";
        //onclick=eliminarfila("+oId+",'"+tab+"','"+item+"');
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    //color de sombra
    /*
    azul:rgba(0,70,219,0.4)
    verde oscuro:rgba(92,221,92,0.4)
    naranja:rgba(221,164,92,0.4)
    rosado:rgba(185,92,221,0.4)
    celeste:rgba(92,200,221,0.4)
    rojo:rgba(255,0,0,0.4)
    verde limon:rgba(163,255,0,0.4)
    */
    var cambiarcolorcelda=function(obj)
    {
        
        /*
        mejoras:
        Que la seleccion sea hacia arriba tambien.
        */
        var array_obj_aux=obj.split("_");
        //alert(array_horarios[obj]);        
        var tamanio=array_celdas.length;
        //alert(array_horarios[obj]);
        if(typeof(array_horarios[obj])==="undefined" || array_horarios[obj])
        {               
            array_horarios[obj]=false;
            //alert("1ro: "+array_horarios[obj]);
            sombrearitems("#horas_"+array_obj_aux[1],true);

            if(evaluarceldacolor(obj))
                $("#"+obj).css('background-color','rgba(221,164,92,0.4)');            
            //alert("tamaño: "+tamanio);
            if(tamanio==0)
                array_celdas.push(obj);
            else 
            {                
                var ultimo=obj.split('_');
                var penultimo=array_celdas[tamanio-1].split('_');
                //alert(array_celdas[tamanio-1]);
                
                //selecciona hacia abajo
                if((ultimo[0] == penultimo[0]) && (parseInt(ultimo[1])-1 == parseInt(penultimo[1])))
                    array_celdas.push(obj);   
                else                
                {
                    limpiartodaslasceldas();                
                    array_celdas=[];
                    array_horarios=[];                      
                    //agrtegando el actual
                    array_horarios[obj]=false;  
                    sombrearitems("#horas_"+array_obj_aux[1],true);
                    if(evaluarceldacolor(obj))                  
                        $("#"+obj).css('background-color','rgba(221,164,92,0.4)');

                    array_celdas.push(obj);                  
                }
            }                
        }
        else
        {
            array_horarios[obj]=true;
            //alert("2ro: "+array_horarios[obj]);
            sombrearitems("#horas_"+array_obj_aux[1],false);
            //$("#"+obj).css("background-color",(parseInt($.trim(obj.split('_')[1]))%2!=0)?"rgb(255,255,255)":"rgb(208,208,208)");              
            if(evaluarceldacolor(obj))
                $("#"+obj).css("background-color","rgb(255,255,255)");                          
            //alert("falso: "+array_celdas[tamanio-1]);
            //alert("falso: "+obj);
            if(array_celdas[tamanio-1]!=obj)
            {
                limpiartodaslasceldas();
                array_celdas=[];
                array_horarios=[];
            }
            else
                array_celdas.pop();
        }


    }

    var sombrearitems=function(obj,si)
    {
        if(si)
            $(obj).css({'background':'rgb(48,48,48)','color':'rgb(180,92,92)'});
        else
            $(obj).css({'background-color':'#D0D0D0','color':'#555'});
    }


    var evaluarceldacolor=function(obj)
    {
        //alert($("#"+obj).css("background-color"));
        return $("#"+obj).css("background-color")==("rgb(255, 255, 255)") || $("#"+obj).css("background-color")==("rgba(221, 164, 92, 0.4)") || $("#"+obj).css("background-color")==("rgba(0, 0, 0, 0)");        
    }

    var limpiartodaslasceldas=function()
    {        
        $("#tb_horario_z tbody tr").each(function(index){            
            //var color_aux=(index%2!=0)?"rgb(255,255,255)":"rgb(208,208,208)";                  
            var color_aux="rgb(255,255,255)";                  
            $(this).children("td").each(function(i)
            {                
                if(i>0)
                {
                    //alert($(this).css("background-color"));
                    //alert($(this).css("background-color")==("rgb(255, 255, 255)"));
                    //alert(($(this).css("background-color")==("rgba(221, 164, 92, 0.4)")));                    
                    //alert("======");
                    if(evaluarceldacolor($(this).attr("id")))
                        $(this).css("background-color",color_aux);
                }
                else
                    $(this).css({"background-color":"#D0D0D0",'color':'#555'});
            });
        });        
    }
    var existe_idTd=function(id)
    {
        //alert("buscando: "+id);
        var respuesta=false;
        $("#tb_horario_z tbody td").each(function(index)
        {   
            if($(this).attr("id")==id)            
                respuesta=true;
        }); 
        return respuesta;
    }

    var devolverRowspanAtds=function()
    {
        $("#tb_horario_z tbody td").each(function(index)
        {               
            if(typeof(array_rowspan_columnas[$(this).attr("id")])!=="undefined")  
                combinarceldas($(this).attr("id"),array_rowspan_columnas[$(this).attr("id")]);                                                
        });
    }

    var quitarRowspanAtds=function(exceptoColum)
    {
        for(var i=0;i<dias.length;i++) 
        {
            if(dias[i]!=exceptoColum)
            {
                $("#tb_horario_z tbody td").each(function(index)
                {                             
                    if(index>0)
                    {
                        var array_td_col=$(this).attr("id").split("_");                        
                        if(array_td_col[0]==dias[i] && $(this).attr("rowspan")>1)                        
                            array_rowspan_columnas[$(this).attr("id")]=dividirceldas($(this).attr("id"));                                   
                    }                        
                });     
            }         
        }
    }

    var dividirceldas=function(indice_x)
    {
        obj_indice=$("#"+indice_x);
        var indice_aux="";
        var array_ind=indice_x.split("_");
        switch(array_ind[0])
        {
            case "lunes":indice_aux="horas_";break;
            case "martes":indice_aux="lunes_";break;
            case "miercoles":indice_aux="martes_";break;
            case "jueves":indice_aux="miercoles_";break;
            case "viernes":indice_aux="jueves_";break;
            case "sabado":indice_aux="viernes_";break;
            case "domingo":indice_aux="sabado_";break; 
        }
        
        var cant=parseInt(obj_indice.attr("rowspan"));
        obj_indice.removeAttr("rowspan");        
        var inicio=(parseInt(array_ind[1])+1);
        var fin=(inicio+cant-2);
        for (var i = inicio,j=1; i<=fin; i++,j++) 
        {            
            $("<td style='cursor: pointer;' id='"+array_ind[0]+"_"+i+"' onclick=cambiarcolorcelda('"+array_ind[0]+"_"+i+"');><input type='hidden' name='"+array_ind[0]+"_"+i+"' id='"+array_ind[0]+"_"+i+"' value='' />" ).insertAfter("#"+indice_aux+(parseInt(array_ind[1])+j));    
        };
        
        return cant;
    }

    var combinarceldas=function(obj,cont)
    {
        $("#"+obj).attr("rowspan",cont);
        var array_aux=obj.split("_");
        
        for(var i=parseInt(array_aux[1])+1;i<parseInt(array_aux[1])+cont;i++)
        {
            $("#"+array_aux[0]+"_"+i).remove();
        }        
        limpiartodaslasceldas();                
        array_celdas=[];
        array_horarios=[];   

    }

    var generarhoras=function(horas,tab,item)
    {
        $("#btn_guardar_tb").show();
        $("#btn_ranghoras_tb").hide();
        for (var i = 0; i < $.inArray($("#cmb_rangodehoras2").val(),horas) ; i++)                             
            tabla_add_nuevosalon((horas[i]+" - "+horas[i+1]),tab,item);            
        
        $("#horas").hide();
        $("#tb_horario_z").show();
    }

    var limpiar=function()
    {
        $("#txt_sec_x").val("");
        $("#txt_lug_x").val("");
        $("#txt_aul_x").val("");
        $("#cmb_catsec_").val("0");
        $("#cmb_catsec_").hide();
        $("#txt_sec_x").show();
        $("#txt_sec_x").attr("disabled","disabled");
        $("#txt_lug_x").attr("disabled","disabled");
        $("#txt_aul_x").attr("disabled","disabled");

        $("#txt_sec_x").css("background","rgb(233, 233, 233)");
        $("#txt_lug_x").css("background","rgb(233, 233, 233)");
        $("#txt_aul_x").css("background","rgb(233, 233, 233)"); 

        $("#btn_guardar_tb").text("Guardar");
        $("#btn_ranghoras_tb").attr("disabled","disabled");                    
        $("#btn_guardar_tb").hide();
        $("#btn_ranghoras_tb").hide();
        $("#fild_horario").css("background-color","rgb(190, 190, 190)");      
        $("#field_filtrohorarios").css("background-color","rgb(255, 255, 255)");  
        $("#img_horario").show();  
        $("#versalones").hide();  
        $("#tb_horario_z").hide();
        $("#fild_horario").hide();
        array_horarios=[];
        array_celdas=[];
        array_rowspan_columnas=[];
        
        $("#cursosper").hide();
        $("#horas").hide();
    }

    var verhorario=function(id_)
    {        
        limpiar();

        $("#fild_horario").show();
        $("#txt_sec_x").val($("#sec_"+id_).val());
        $("#txt_lug_x").val($("#loc_"+id_).val());
        $("#txt_aul_x").val($("#aul_"+id_).val());
        $("#tbDetalle_salones").empty();
        $("#tbDetalle_horario").empty();        
        $("#btn_guardar_tb").removeAttr("disabled");      
        $("#btn_guardar_tb").text("Actualizar");
        $("#btn_ranghoras_tb").removeAttr("disabled");    
        $("#btn_guardar_tb").show();
        $("#txt_guia1").text($("#cmb_facultad option:selected").text()+" - "+$("#cmb_car_ option:selected").text()+" - "+$("#cmb_esp_ option:selected").text());
        $("#txt_guia2").text($("#cmb_sed_ option:selected").text()+" - "+$("#cmb_mod_ option:selected").text()+" - "+$("#sel_ciclo option:selected").text()+" CICLO");  
        $("#fild_horario").css("background-color","rgb(255, 255, 255)");
        $("#field_filtrohorarios").css("background-color","rgb(190, 190, 190)"); 
        $("#img_horario").hide();
        $("#tb_horario_z").show();
        $("#cant_filas_sal").val("0");
    }

    var nuevohorario=function(id_)
    {        
        if(comprobar_combos())
        {
            limpiar();
            $("#fild_horario").show();
            $("#cmb_catsec_").show();
            $("#txt_sec_x").hide();
            $("#txt_lug_x").removeAttr("disabled");
            $("#txt_aul_x").removeAttr("disabled");
            $("#tbDetalle_salones").empty();
            $("#tbDetalle_horario").empty();            
            $("#btn_guardar_tb").removeAttr("disabled");  
            $("#btn_ranghoras_tb").removeAttr("disabled");
            //$("#btn_guardar_tb").show();
            $("#btn_ranghoras_tb").show();      
            $("#txt_sec_x").css("background","rgb(255, 255, 255)");
            $("#txt_lug_x").css("background","rgb(255, 255, 255)");
            $("#txt_aul_x").css("background","rgb(255, 255, 255)");
            $("#btn_guardar_tb").text("Guardar");            
            $("#fild_horario").css("background-color","rgb(255, 255, 255)");      
            $("#field_filtrohorarios").css("background-color","rgb(190, 190, 190)");      
            $("#img_horario").hide();
            $("#txt_guia1").text($("#cmb_facultad option:selected").text()+" - "+$("#cmb_car_ option:selected").text()+" - "+$("#cmb_esp_ option:selected").text());
            $("#txt_guia2").text($("#cmb_sed_ option:selected").text()+" - "+$("#cmb_mod_ option:selected").text()+" - "+$("#sel_ciclo option:selected").text()+" CICLO");  
            $("#cant_filas_horario").val("0");            
        }                
    }

    var cargarcmbcursos=function()
    {
        $.get("cursosfiltroz", 
        { 
            carr: $("#cmb_car_").val(),
            esp: $("#cmb_esp_").val(),
            ciclo: $("#sel_ciclo").val(),
            planEst: $("#cmb_planes").val(), 
        },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                $('#cmb_cursos').empty();
                if(resultado != false)            
                {                
                    $('#cmb_cursos').append(resultado);  
                    //Cargando("cmb_esp_","cargando_especialidad");
                }
                else
                {
                    //Cargando("cmb_cursos","cargando_especialidad");
                }
            }
        });
    }

    var rangodehoras=function()
    {        
        var posicion=$("#btn_ranghoras_tb").position();        
        $("#horas").css({'left':posicion.left, 'top':posicion.top+68});
        $("#horas").show();
        generarhorashasta();   
    }

    var agregarcurso=function(id_cuadro)
    {        
        var array_aux=id_cuadro.split("_");
        var posicion=$("#"+id_cuadro).position();          
        $("#cursosper").css({'left':posicion.left+30, 'top':posicion.top+25});
        $('#cursosper').show();        
        var hora=($("#horas_"+array_aux[1]).text()+" "+$("#horas_"+(parseInt(array_aux[1])+parseInt($("#"+id_cuadro).attr("rowspan"))-1)).text()).split("-");        
        $("#cursosper_tit").text("CURSO / "+array_aux[0]+": "+hora.shift()+" - "+hora.pop());
        $("#indice_horario").val(id_cuadro);
    }

    var agregarhora_tabla=function()
    {   
        obj=$("#"+$("#indice_horario").val());
        obj.empty();
        obj.append($("#cmb_cursos option:selected").text()+"<br>0/"+$("#sel_cant").val());        
        obj.css('background-color',colorfondocelda($("#cmb_colorcelda").val()));  
        $('#cursosper').hide();
    }

    var colorfondocelda=function(color)
    {
        switch(color)
        {
            case "BLANCO":return "rgb(255,255,255)";
            case "AZUL":return "rgba(0,70,219,0.4)";
            case "VERDE":return "rgba(92,221,92,0.4)";
            case "AMARILLO":return "rgba(250, 230, 0, 0.4)";            
            case "ROSADO":return "rgba(185,92,221,0.4)";
            case "CELESTE":return "rgba(92,200,221,0.4)";
            case "ROJO":return "rgba(255,0,0,0.4)";
            case "LIMON":return "rgba(163,255,0,0.4)";
            case "MARRON":return "rgba(138, 77, 10, 0.4)";    
            case "VIOLETA":return "rgba(88, 0, 219, 0.4)";
            case "CELESTE_AGUA":return "rgba(0, 219, 210, 0.4)";
            case "NARANJADO":return "rgba(255, 163, 0, 0.4)";                
        }        
    }

    var opcionesdefila=function(id_,tb_,can_)
    {              
        
        $("#dialog-confirm-operacion").dialog({
            resizable: false,
            
            width:350,            
            modal: true,
            position: ["center",300],
            buttons: {
                'Ver': function() 
                {
                    verhorario(id_);      
                    $( this ).dialog( "close" );
                },
                'Eliminar': function() 
                {
                    eliminarFila();
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });  
    }


    var eliminarFila=function()
    {              
        
        $("#dialog-confirm-eliminar").dialog({
            resizable: false,
            
            width:350,            
            modal: true,
            position: ["center",300],
            buttons: {
                Cancel: function() {
                    $(this).dialog('close');
                },
                'confirmar': function() 
                {
                    eliminar_item();      
                    $( this ).dialog( "close" );
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

    var comprobar_combos=function()
    {

        avisoLimpiar("cmb_facultad");
        avisoLimpiar("cmb_car_");
        avisoLimpiar("cmb_esp_");
        avisoLimpiar("cmb_sed_");
        avisoLimpiar("cmb_mod_");
        avisoLimpiar("cmb_planes");
        avisoLimpiar("sel_ciclo");

        //---------------------------------------------------------------------------
        if($("#cmb_facultad").val()!="0")
        {
            
            if($("#cmb_car_").val()!="0")
            {
                if($("#cmb_esp_").val()!="0")
                {                    
                    if($("#cmb_sed_").val()!="0")
                    {
                        if($("#cmb_mod_").val()!="0")
                        {
                            if ($("#cmb_planes").val()!="0")
                            {
                                if($("#sel_ciclo").val()!="0")
                                {                              
                                    aviso("","","");
                                    return true;
                                }
                                else
                                {     
                                    notificacion(1,"¡Advertencia!","Debe escoger un ciclo.",3);
                                    cajaColor("sel_ciclo","red");                 
                                }
                            }
                            else
                            {
                                notificacion(1,"¡Advertencia!","Debe escoger un Plan de Estudios.",3);
                                cajaColor("cmb_planes","red"); 
                            }
                        }
                        else
                        {     
                            notificacion(1,"¡Advertencia!","Debe escoger una modalidad.",3);
                            cajaColor("cmb_mod_","red");                 
                        }
                    }
                    else
                    {     
                        notificacion(1,"¡Advertencia!","Debe escoger una sede.",3);
                        cajaColor("cmb_sed_","red");                 
                    } 
                }
                else
                {     
                    notificacion(1,"¡Advertencia!","Debe escoger una especialidad.",3);
                    cajaColor("cmb_esp_","red");                 
                }                                
            }
            else
            {     
                notificacion(1,"¡Advertencia!","Debe escoger una carrera.",3);
                cajaColor("cmb_car_","red");                 
            }
        }
        else
        {   
            notificacion(1,"¡Advertencia!","Debe escoger una facultad.",3);
            cajaColor("cmb_facultad","red");         
        }
        //---------------------------------------------------------------------------
                
        return false;
    }


    //..................................................................................................
    //pop pup ------------------------------------------------------------------------------------------
    //..................................................................................................
/*
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
*/
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

/*
            $cod="<Dato><sec>".$_POST['sec_']."</sec><fac>".$_POST['fac_']."</fac><carr>".$_POST['carr_']."</carr><esp>".$_POST['esp_']."</esp><moda>".$_POST['moda_']."</moda><sed>".$_POST['sed_']."</sed><niv>".$_POST['niv_']."</niv><loc>".$_POST['loc_']."</loc><aul>".$_POST['aul_']."</aul><usuario>".$_POST['usuario_']."</usuario>";
            $cod.="<cursos>";
            $array_cod=explode(",",$_POST['cod_']);
            $array_cap=explode(",",$_POST['cap_']);
            $array_hi=explode(",",$_POST['hi_']);
            $array_hf=explode(",",$_POST['hf_']);
            $array_dia=explode(",",$_POST['dia_']);
            */

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
/*
    function ocultar() {
        $('#popupbox_sinblock_inmovil').hide();
        $("#popupbox_minimizado").css("display", "block");
    }

    function mostrar() {
        $('#popupbox_sinblock_inmovil').show();        
        $("#popupbox_minimizado").css("display", "none");
    }
*/
//=================================================================================================================
    var Cargando=function(idMostrar,idOcultar)
    {
        $("#"+idOcultar).hide();
        $("#"+idMostrar).show().css("display", "inline");        
    }
    
    $(function()
    {
    

    $("#cmb_facultad").change(function()
    {   $("#t_electivos td").remove();
        $("#btn_activarElectivos").css("display","none");
        cargar_carreras();
    });

    $("#cmb_car_").change(function()
    {
        $("#t_electivos td").remove();
        $("#btn_activarElectivos").css("display","none");
        dependencia_especialidad();
    });   

    $("#cmb_mod_").change(function()
    {
        $("#t_electivos td").remove();
        $("#btn_activarElectivos").css("display","none");
        cargar_planes();    
    });
    
    $("#cmb_planes").change(function()
    {
        $("#t_electivos td").remove();
        $("#btn_activarElectivos").css("display","none");
        cargar_ciclos();    
    });
    
    $("#sel_ciclo").change(function()
    {
        $("#t_electivos td").remove();
        $("#btn_activarElectivos").css("display","none");
    });
    
    // cargando combos -------------
    function cargar_carreras()
    {
        Cargando("cargando_carrera","cmb_car_");
        $('#cmb_car_').empty();
        document.getElementById("cmb_car_").options.length=0;
        $('#cmb_car_').append('<option value="0">CARRERA</option>');
        
        $('#cmb_car_').val("0");
        
        var x=$("#cmb_facultad").val();
        
        $('#cmb_sed_').val("0");
        
        $.get("carrera", { code: x }, function(resultado)
        {
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_car_').append(resultado);         
                    Cargando("cmb_car_","cargando_carrera");
                }
                else
                {
                    Cargando("cmb_car_","cargando_carrera");   
                }
            }

        }); 

        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>');         

    }
        
    function dependencia_especialidad()
    {        
        Cargando("cargando_especialidad","cmb_esp_");
        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>'); 

        var code = $("#cmb_car_").val();
        $('#cmb_sed_').val("0");
        $.get("especialidad", { code: code },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_esp_').append(resultado);  
                    Cargando("cmb_esp_","cargando_especialidad");
                }
                else
                {
                    Cargando("cmb_esp_","cargando_especialidad");
                }
            }
        });
    }
    
    function cargar_planes() {
        //Cargando("cargando_planestudios","cmb_planes");
        $('#cmb_planes').empty();
        document.getElementById("cmb_planes").options.length=0;
        $('#cmb_planes').append('<option value="0">PLAN ESTUDIOS</option>');
        
        
        v_car=$("#cmb_car_").val();
        v_esp=$("#cmb_esp_").val();
        
        $.get("planEstudiosPorCarrera", { v_car:v_car, v_esp:v_esp},
        function(resultado)
        {
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_planes').append(resultado);  
                    //Cargando("cmb_planes","cargando_planestudios");
                }
                else
                {
                    //Cargando("cmb_planes","cargando_planestudios");
                }
            }
        });
        Cargando("cmb_planes","cargando_planestudios");
        
        $('#cmb_planes').val("0");
    }
    
    function cargar_ciclos() {
        Cargando("cargando_ciclo","sel_ciclo");
        $('#sel_ciclo').empty();
        document.getElementById("sel_ciclo").options.length=0;
        
        $('#sel_ciclo').append('<option value="0">CICLO</option>');
        $('#sel_ciclo').val("0");
        
        v_car=$("#cmb_car_").val();
        v_esp=$("#cmb_esp_").val();
        b_plan=$("#cmb_planes").val();
        
        
        $.get("ciclosConElectivos", { v_car:v_car, v_esp:v_esp, b_plan:b_plan},
        function(resultado)
        {
            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#sel_ciclo').append(resultado);  
                    Cargando("sel_ciclo","cargando_ciclo");
                }
                else
                {
                    Cargando("sel_ciclo","cargando_ciclo");
                }
            }
        });
    }
    
});