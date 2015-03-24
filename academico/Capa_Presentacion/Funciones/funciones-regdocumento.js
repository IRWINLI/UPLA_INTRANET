    function agregar_ref()
    {        
        if($('#ref_i').val()!='')
        {
            tabla_add_sedmodfac($('#ref_i').val(),'filas_ref','cant_filas_ref');
            $('#ref_i').val('');
        }
        else
        {
            alerta('debe agregar referencia.'); aviso_adv('debe agregar referencia.');
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

                cargar_agregar_get(url_x,obj_x);
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

function limpiarregproducto()
{
    $("#exp_i").val("0");  
    $("#tipo_i").val("1");  
   // $("#fecimp_i").val(""); 
    $("#numtip_i").val(parseInt($("#numtip_i").val()-1));
    $("#pasa_i").val("0");
    $("#asu_ta").val("");
    $("#ref_i").val(""); 
    $("#cmb_estado").val("0");  
    $("#res_ta").val("Sin Resumen.");    
    $("#btn_agregarEst").prop("checked",true); 
    iniciar_tabla("filas_ref","cant_filas_ref"); 
}

function vertipo()
{   
    alerta_personalizado("popupbox_regtip",530);
}
function regdep()
{   
    alerta_personalizado("popupbox_regdep",490);
}

function regest()
{   
    alerta_personalizado("popupbox_regest",470);
}

function regdocumento()
{
    if(v_reg_doc())
    {
               
        var params={};

        params['codreghidoc']="";
        params['expe']=$("#exp_i").val();  
        params['tip']=$("#tipo_i").val();  
        params['numdoc']=$("#numtip_i").val();          
        params['fimp']=$("#fecimp_i").val(); 
        params['pasa']=$("#pasa_i").val();  
        params['asu']=$("#asu_ta").val(); 

        var cad=''

        for(var i=1;i<= $("#cant_filas_ref").val();i++)
        {
            cad+=$("#ref_"+i).val()+",";
        }

        params['ref']=cad;
        params['est']=$("#cmb_estado").val();  
        params['num']=$("#numref_i").val();  
        params['estatuto']=$("#cmb_estatuto").val();  
        params['res']=$("#res_ta").val(); 

        params['regact']="reg"; 

        //alert(params['ref']);
    
        ejecutarAjaxSimple("regdocitem","POST",params,params['expe']);
        cambio=true;
    }
                
}

function actdocumento()
{
    if(v_reg_doc())
    {
               
        var params={};

        params['codreghidoc']=$("#cod_originalDoc").val();          
        params['expe']=$("#exp_i").val();  
        params['tip']=$("#tipo_i").val();  
        params['numdoc']=$("#numtip_i").val();          
        params['fimp']=$("#fecimp_i").val(); 
        params['pasa']=$("#pasa_i").val();  
        params['asu']=$("#asu_ta").val(); 

        var cad=''

        for(var i=1;i<= $("#cant_filas_ref").val();i++)
        {
            cad+=$("#ref_"+i).val()+",";
        }

        params['ref']=cad;
        params['est']=$("#cmb_estado").val();  
        params['num']=$("#numref_i").val();  
        params['estatuto']=$("#cmb_estatuto").val();  
        params['res']=$("#res_ta").val(); 

        params['regact']="act"; 
        
        //alert(params['estatuto']);
    
        ejecutarAjaxSimple("regdocitem","POST",params,params['expe']);
        cambio=true;
    }
                
}

function regTipoDoc()
{

    if(v_reg_regTipoDoc())
    {               
        var params={};

        params['nom']=$("#tdoc_i_x").val();         

        ejecutarAjaxSimple("regtipdoc-x","POST",params,params['nom'],"cmbtiposdocumentos","tipo_i");        
        $("#tdoc_i_x").val("");
    }
                
}

function v_reg_regTipoDoc()
{
    eva=0;
    if($("#tdoc_i_x").val()!='')
    {     
        avisoLimpiar("tdoc_i_x");
        aviso("","","");     
    }
    else
    {
        aviso_adv("Falta ingresar el tipo de documento.");
        cajaColor("tdoc_i_x","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}




function regdep_x()
{
    //alert("hola");
    if(v_reg_regdep_x())
    {               
        var params={};

        params['dep']=$("#dep_i_x").val();   
        //params['tipo']=$("#cmb_tipo_dep").val();    

        ejecutarAjaxSimple("regdep-x","POST",params,params['dep'],"cmbdependencia","pasa_i");   
        $("#dep_i_x").val("");
    }
                
}

function v_reg_regdep_x()
{
    eva=0;
    if($("#dep_i_x").val()!='')
    {     
        avisoLimpiar("dep_i_x");

       /* if($("#cmb_tipo_dep").val()!='0')
        {     
            avisoLimpiar("cmb_tipo_dep");*/
            aviso("","","");     
        /*}
        else
        {
            aviso_adv("Falta el tipo de dependencia.");
            cajaColor("cmb_tipo_dep","red");        
            eva+=1;
        }    */      
    }
    else
    {
        aviso_adv("Falta ingresar la dependencia.");
        cajaColor("dep_i_x","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}



function regest_x()
{

    if(v_reg_regest_x())
    {               
        var params={};

        params['est']=$("#est_i_x").val();         

        ejecutarAjaxSimple("regest-x","POST",params,params['est'],"cmbestado","cmb_estado");        
        $("#est_i_x").val("");
    }
                
}

function v_reg_regest_x()
{
    eva=0;
    if($("#est_i_x").val()!='')
    {     
        avisoLimpiar("est_i_x");
        aviso("","","");     
    }
    else
    {
        aviso_adv("Falta ingresar el tipo de documento.");
        cajaColor("est_i_x","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}



function v_reg_doc()
{
    
    eva=0;
    if($("#exp_i").val()!='')
    {     
        avisoLimpiar("exp_i");  

        if($("#tipo_i").val()!='0')
        {     
            avisoLimpiar("tipo_i");

            //if($("#fecimp_i").val()!='' && $("#fecimp_i").val().length==10)
            //{     
                //avisoLimpiar("fecimp_i");           

                if($("#pasa_i").val()!='0')
                { 
                    avisoLimpiar("pasa_i");  

                    if($("#cmb_estado").val()!='0')
                    { 
                        avisoLimpiar("cmb_estado");                        

                        if($("#asu_ta").val()!='')
                        {
                            avisoLimpiar("asu_ta");
                            aviso("","","");                                              
                        }
                        else
                        {
                            aviso_adv("Falta ingresar el asunto.");
                            cajaColor("asu_ta","red");        
                            eva+=1;
                        }
                    }
                    else
                    {
                        aviso_adv("Falta elegir el estado");
                        cajaColor("cmb_estado","red");        
                        
                        eva+=1;
                    }
                }
                else
                {
                    aviso_adv("Falta elegir a dónde pasó el documento.");
                    cajaColor("pasa_i","red");        
                    
                    eva+=1;
                }
                
            /*}
            else
            {
                aviso_adv("Falta ingresar la fecha.");
                cajaColor("fecimp_i","red");        
                eva+=1;
            }*/
        }
        else
        {
            aviso_adv("Falta elegir Tipo de Documento.");
            cajaColor("tipo_i","red");        
            eva+=1;
        }   
    }
    else
    {
        aviso_adv("Falta ingresar el expediente.");
        cajaColor("exp_i","red");        
        eva+=1;
    }  

    if(eva>0)
    {

        return false;
    }

    return true;
}

function cargarmarca()
{
    $.get("vercargarmarca", {},
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
                $('#marpro_i').empty();
                $('#marpro_i').append(resultado);  
            }
        }
    });
}

function cargarcategoria()
{
    $.get("vercargarcategoria", {},
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
                $('#cmb_catregpro').empty();
                $('#cmb_catregpro').append(resultado);  
            }
        }
    });
}

function tabla_add_sedmodfac(sed,tab,item)
{        
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    var strHtml1 = "<td><input type='hidden' name='ref_"+oId+"' id='ref_"+oId+"' value='"+sed+"' />" + sed +"</td>";        
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#97B2C7'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' id='"+tab+"_" + oId + "' align='center' onclick=eliminarFila("+oId+",'"+tab+"','"+item+"'); ></tr>";
    var strHtmlFinal = strHtml1 ;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#"+tab).append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#"+tab+"_" + oId).html(strHtmlFinal);
}

function eliminarFila(oId,tab,item)
{   
    //$("#"+num).val(parseInt($("#"+num).val()) - 1);    
    $("#ref_i").val($("#ref_"+oId).val());
    if(confirm('Este registro se quitará, desea continuar?'))
    {
       // $("#"+item).val(parseInt($("#"+item).val()) - 1); 
        $("#"+tab+"_" + oId).remove();   
        
        return false;
    }
    

}
