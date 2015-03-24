    function agregar_ref()
    {        
        avisoLimpiar('add_tra');        
        if($('#add_tra').val()!='')
        {
            $( "#form1" ).submit();
        }
        else
        {
            
            cajaColor("add_tra","red");        
            alerta('debe agregar referencia.'); 
            aviso_adv('debe agregar referencia.');
        }    
    }
    
    function cargar_agregar_get(url,obj)
    {
    
        $.get(url, {},
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
                    $('#'+obj).empty();
                    $('#'+obj).append(resultado);  
                }
            }
        });
    }

    function ejecutarAjaxSimple(url,metodo,params,referido,url_x,obj_x)
    {        
        mostrarCargando();  
        
        $.ajax({
            data : params,
            type: metodo,
            url: url,
            dataType: "json",
            success : function(data)
            {                
                if(data["rpta"]=='1')
                {                    
                    aviso_bien(referido+' | Se realizó Correctamente. =D');   
                    alerta(referido+' | Se realizó Correctamente. =D');
                }                
                else if(data["rpta"]=='2')
                {
                    aviso_adv(referido+' | Tuvo un inconveniente X( vuelva a intentarlo...');                                            
                    alerta(referido+' | Tuvo un inconveniente X( vuelva a intentarlo...');                                         
                }
                else 
                {
                    aviso_mal(referido+' | Tuvo problema: '+data["rpta"]);
                    alerta(referido+' | Tuvo problema: '+data["rpta"]);                            
                }
                
                ocultarCargando();

//                cargar_agregar_get(url_x,obj_x);
                
                if(url_x==="recibidos")                
                    redirect_by_post("recibidos",{},false);

                /*switch(url)
                {
                    case 'registrarUnidades':
                        cargar_agregar_get("verunidadesmedida","aqui_um");
                    break;
                    case 'registrarAlmProducto':
                        busproductocompra();
                    break;
                    

                }*/
                
            }
            ,error: function()
            {
                //aviso("registrarUsuario no puedo realizarse!");                                        
                ocultarCargando();
                location.reload();
            }
        });
    
    }

function alerta_personalizado(div_x,tam)
    {   
        $("#"+div_x).dialog({
            
            resizable: true,
            modal: true,
            minWidth : tam,
            position: ["center",170],
            buttons: {},
            close: function() 
            { 
                                    
                $( this ).dialog( "close" );
            }
        });
    }

function limpiarreg()
{
    $("#mod_tra").val("0");  
    $("#exp_cod").val("");  
    $("#jus_tra").val(""); 
    $("#add_tra").val("");

    iniciar_tabla("filas_tra","cant_filas_tra"); 
}

function limpiaract()
{
    $("#modtra_i").val("");  
    $("#exp_cod").val("");  
    $("#jus_tra").val(""); 
    $("#est_tra").val("0");
    $("#obs_tra").val("");
    $("#add_tra").val("");

    iniciar_tabla("filas_tra","cant_filas_tra"); 
}

function regdocumento()
{
    if(v_reg_tra())
    {
        
        var params={};

        params['cod_mod']=$("#mod_tra").val();  
        //params['cod_accion']=$("#est_tra").val();                
        params['cod_accion']=1;                
        //params['destinatario']=$("#fecimp_i").val(); 
        params['alumno']=$("#exp_cod").val();  
        params['razon']=$("#jus_tra").val(); 
        //params['obs']=$("#obs_tra").val(); 
        params['obs']=""; 

        var cad=''

        for(var i=1;i<= $("#cant_filas_tra").val();i++)
        {
            if(($("#codarc_"+i).val()+'')!=='undefined')
            cad+=$("#codarc_"+i).val()+"/"+$("#archivo_"+i).val()+",";
        }

        params['archivos']=cad; 
        /*
        alert('mod: '+params['cod_mod']);    
        alert(params['cod_accion']);    
        alert(params['alumno']);    
        alert(params['razon']);    
        alert(params['obs']);
        alert(params['archivos']);          
        alert($("#mod_tra option:selected").text());
        */
        ejecutarAjaxSimple("regtraitem","POST",params,$("#mod_tra option:selected").text());

        limpiarreg();

        cambio=true;
    }
                
}

function actdocumento()
{
    
    if(v_act_tra() && v_reg_tra())
    {
        var params={};

        params['cod_item']=$("#exp_tra").val();  
        params['cod_accion']=$("#est_tra").val();                
        params['inf_adi']=$("#obs_tra").val(); 
        params['destinatario']=$("#remi_tra").val();  
        params['eliminados']=$("#filas_eliminadas").val();         

        var cad=''

        for(var i=1;i<= $("#cant_filas_tra").val();i++)
        {          
            
            if(($("#codarc_"+i).val()+'')!=='undefined' && $("#estado_bloq_"+i).val() === 'undefined')
            cad+=$("#codarc_"+i).val()+"/"+$("#archivo_"+i).val()+",";
        }

        params['archivos']=cad;     

        params['cod_alumno']=$("#exp_cod").val();  
        params['cod_modi']=$("#mod_tra").val();  
        params['jus']=$("#jus_tra").val();  
        
        /*alert(params['cod_item']);    
        alert(params['cod_accion']);    
        alert(params['inf_adi']);    
        alert(params['destinatario']);    
        alert(params['eliminados']);
        alert(params['archivos']);  */
    

        ejecutarAjaxSimple("regtraitem-act","POST",params,$("#mod_tra option:selected").text(),"recibidos");

        

        //limpiaract();
        cambio=true;
        
    }
                
}

function v_act_tra()
{
    
    eva=0;

    avisoLimpiar("est_tra");  
    avisoLimpiar("obs_tra");  


    if($("#est_tra").val()!='1')
    {     
        //avisoLimpiar("exp_cod");  

        if($.trim($("#obs_tra").val())!='')
        {     
               aviso("","","");
        }
        else
        {
            
            if(!confirm('¿Alguna información adicional?'))
            {
                $("#obs_tra").val("Ninguna.");
            }
            else  
            {
                aviso_adv("Falta ingresar información adicional.");
                cajaColor("obs_tra","red");        
                eva+=1;
            }
        }
    }
    else
    {
        
        aviso_adv("Falta ingresar el estado.");
        cajaColor("est_tra","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}


function v_reg_tra()
{
    
    eva=0;

    avisoLimpiar("exp_cod");  
    avisoLimpiar("jus_tra");  
    avisoLimpiar("mod_tra");

    if($.trim($("#exp_cod").val())!='')
    {     
        //avisoLimpiar("exp_cod");  

        if($("#exp_cod").val().length>=7)
        {     
            //avisoLimpiar("exp_cod");  

            if($("#mod_tra").val()!='0')
            {     
                //avisoLimpiar("mod_tra");

                    if($.trim($("#jus_tra").val())!='')
                    { 
                        avisoLimpiar("jus_tra");  
                    }
                    else
                    {
                        aviso_adv("Falta ingresar su justificación.");
                        cajaColor("jus_tra","red");        
                        
                        eva+=1;
                    }
            }
            else
            {
                aviso_adv("Falta elegir la Modificación.");
                cajaColor("mod_tra","red");        
                eva+=1;
            }   
        }
        else
        {
            aviso_adv("El código es de 7 dígitos.");
            cajaColor("exp_cod","red");        
            eva+=1;
        }  
    }
    else
    {
        aviso_adv("Falta ingresar el Código de Estudiante.");
        cajaColor("exp_cod","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}

function tabla_add_sedmodfac(array,tab,item,resuelto)
{        
    
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    //var strHtml1 = "<td><input type='hidden' name='codigo_"+oId+"' id='codigo_"+oId+"' value='"+array[0]+"' />" + array[0] +"</td>";   
    var strHtml1 = "<td onmouseover=this.style.backgroundColor='#97B2C7'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' ><input type='hidden' name='codarc_"+oId+"' id='codarc_"+oId+"' value='"+array[1]+"' /><input type='hidden' name='archivo_"+oId+"' id='archivo_"+oId+"' value='"+array[0]+"' /><input type='hidden' name='cod_archivo_"+oId+"' id='cod_archivo_"+oId+"' value='"+array[3]+"' /><input type='hidden' name='estado_bloq_"+oId+"' id='estado_bloq_"+oId+"' value='"+array[2]+"' />"+array[0]+"</td>";        
    var strHtml2 = "<td onmouseover=this.style.backgroundColor='#97B2C7'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;';><div title='Descargar'><a href='descargar.php?file="+array[1]+"&nombre="+array[0]+"'>"+set_imagen("descargar.png","30","30")+"</a></div></td>";    
    if(resuelto!=="si")
    {
        if(array[2]=='BLOQUEADO')
        {
            var strHtml3 = "<td onmouseover=this.style.backgroundColor='#97B2C7'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;';><div title='No se puede quitar'>"+set_imagen("prohibido.png","30","30")+"</div></td>";
        }
        else
        {
            var strHtml3 = "<td onmouseover=this.style.backgroundColor='#97B2C7'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' onclick=eliminarFila("+oId+",'"+tab+"','"+item+"');><div title='Quitar'>"+set_imagen("papelera.png","30","25")+"</div></td>";
        }    
    }
    
    var strHtmlTr = "<tr style='background:white;' id='"+tab+"_" + oId + "' align='center'></tr>";
    var strHtmlFinal = strHtml1 + strHtml3 + strHtml2;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#"+tab).append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#"+tab+"_" + oId).html(strHtmlFinal);
}

function eliminarFila(oId,tab,item)
{   
    //$("#"+num).val(parseInt($("#"+num).val()) - 1);    
    //$("#tra_i").val($("#tra_"+oId).val());
    
    if(confirm('Este registro se quitará de la base de datos, está de acuerdo?'))
    {
        //$("#"+item).val(parseInt($("#"+item).val()) - 2); 
        $("#tmp_filas_eliminadas").val($("#tmp_filas_eliminadas").val()+" "+$("#codarc_"+oId).val());
        //alert($("#tmp_filas_eliminadas").val());

        
        if($("#cod_archivo_"+oId).val()!=='undefined')
        {   
            $cad_eli=$("#filas_eliminadas").val();
            $cad_eli+="-"+$("#cod_archivo_"+oId).val();
            $("#filas_eliminadas").val($cad_eli);
            //alert($("#filas_eliminadas").val());    
        }       

        $.post("eliminararchivo", {file:$("#codarc_"+oId).val(),cod_item:$("#cod_archivo_"+oId).val()},function(resultado)
        {          
            //alert(resultado==1);
            //if(resultado==1)
            //{
                
                alerta("Se elimino correctamente!");
                $("#"+tab+"_" + oId).remove();           
            //}
            //else
             //   alerta("No se pudo eliminar vuelva a intentarlo!");

        });

        

        return true;
    }
    

}
