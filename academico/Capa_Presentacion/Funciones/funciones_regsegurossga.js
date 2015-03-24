function verexcel()
{
    if(v_ver_segest())
    {
        var params={};
        params['fecini']=$("#f_ini_b").val();                    
        params['fecfin']=$("#f_fin_b").val();
        params['excel_opcion']='excel_segacc';
        
        redirect_by_post("",params, false);
    }
}
function verexceltodo()
{
    if(v_ver_segest())
    {
        var params={};
        params['fecini']=$("#f_ini_b").val();                    
        params['fecfin']=$("#f_fin_b").val();
        params['excel_opcion']='excel_segesttodos';
        
        redirect_by_post("",params, false);
    }
}


function ver_segest()
{
    if(v_ver_segest())
    {
         mostrarCargando();
         var params={};
        
            params['fecini']=$("#f_ini_b").val();                    
            params['fecfin']=$("#f_fin_b").val(); 
            params['cad']=$("#t_cadseg").val();             

            iniciar_tabla("list_pagosseguro_","cant_filas_seg");

        $.ajax({
            data : params,
            type: "GET",
            url: "versegurosalumnos",
            dataType: "json",
            success : function(data)
            {                

                $.each(data, function(index, value) 
                {               
                    if(!(data[index][0]=='No hay datos'))
                    {                            
                        tabla_add(index+1,data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5],data[index][6],data[index][7],data[index][8]);                        
                    }
                });

                ocultarCargando();
            }
            ,error: function()
            {
                //aviso("registrarUsuario no puedo realizarse!");                                                        
                ocultarCargando();
                location.reload();
            }
        });
    }
                
}

function v_ver_segest()
{
    eva=0;
    var rpta='Adv.: ';
    
    //---------------------------------------------------------------------------
    if($("#f_ini_b").val()!='')
    {
        avisoLimpiar("f_ini_b");
        if($("#f_ini_b").val()<= $("#f_fin_b").val())
        {
            avisoLimpiar("f_ini_b");
            avisoLimpiar("f_fin_b");
            aviso("","","");
        }
        else
        {     
            aviso_adv('La fecha de inicio debe ser menor.');               
            cajaColor("f_ini_b","red"); 
            eva+=1;        
        }
    }
    else
    {   
        aviso_adv('Falta ingresar fecha de inicio.');  
        cajaColor("f_ini_b","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    
    if(eva>0)
    {        
        return false;
    }


    return true;
}

function tabla_add(numitem,codest,dni,nomapes,car,fecnac,fecope,imp,cuenta,sede)
{        
    
    $("#cant_filas_seg").val(parseInt($("#cant_filas_seg").val()) + 1);
    var oId = $("#cant_filas_seg").val(); 

    //var color_fila='#FFFFFF';

    var strHtml1 = "<td>" + numitem +"</td>";
    var strHtml2 = "<td>" + car +"</td>";
    var strHtml3 = "<td>" + codest +"</td>";
    var strHtml4 = "<td>" + nomapes +"</td>";
    var strHtml5 = "<td>" + fecope +"</td>";
    var strHtml6 = "<td>" + imp +"</td>";
    var strHtml7 = "<td>" + dni +"</td>";
    var strHtml8 = "<td>" + fecnac +"</td>";
    var strHtml9 = "<td>" + cuenta +"</td>";
    var strHtml10 = "<td>" + sede +"</td>";
    
       

/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; id='rowDetalle_pagosseguro_" + oId + "' align='center' ></tr>";        
    var strHtmlFinal = strHtml1 + strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6+ strHtml7 + strHtml8 + strHtml9 + strHtml10;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_pagosseguro_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_pagosseguro_" + oId).html(strHtmlFinal);
}

/*
function ver_programacion(n)
{
    $("#dv_buspro_cod").empty();
    $("#dv_buspro_cod").append("<label>Código: "+$("#cb_"+n).val()+"</label>");

    $("#dv_buspro_nom").empty();
    $("#dv_buspro_nom").append("<label>Nombre: "+$("#nom_"+n).val()+"</label>");

    $("#dv_buspro_cat").empty();
    $("#dv_buspro_cat").append("<label>Catego.: "+$("#cat_"+n).val()+"</label>");

    $("#leg_com").empty();
    $("#leg_com").append("<label>Registro de Compras | "+$("#cb_"+n).val()+"</label>");

    $("#cod_proprimary").val($("#codp_"+n).val());   
    $("#cod_nomprimary").val($("#cb_"+n).val());        
    
    $("#popupbox_pg").dialog( "close" ); 
    $("#t_codigovent").val("");
    $("#procant_i").focus();

    busproductocompra($("#cod_proprimary").val());

    cargarmedida();
}
*/