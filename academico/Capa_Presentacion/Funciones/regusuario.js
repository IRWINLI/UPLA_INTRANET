var v_reg_usu=function ()
{
    eva=0;
    var rpta='Adv. falta: ';
    if($("#codigo_reg_usu").val()!='')
    {
        avisoLimpiar("codigo_reg_usu");
    }
    else
    {        
        rpta+='Código o DNI, ';
        cajaColor("codigo_reg_usu","red"); 
        eva+=1;        
    }
    //---------------------------------------------------------------------------
    if($("#nombre_reg_usu").val()!='')
    {
        avisoLimpiar("nombre_reg_usu");
    }
    else
    {        
        rpta+='Nombre, ';
        cajaColor("nombre_reg_usu","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    if($("#apP_reg_usu").val()!='')
    {        
        avisoLimpiar("apP_reg_usu");
    }
    else
    {        
        rpta+='Ap. paterno, ';
        cajaColor("apP_reg_usu","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    if($("#apM_reg_usu").val()!='')
    {        
        avisoLimpiar("apM_reg_usu");
    }
    else
    {        
        rpta+='Ap. materno, ';
        cajaColor("apM_reg_usu","red"); 
        eva+=1;
    }    
    //---------------------------------------------------------------------------
    if($("#nac_priv_dia").val()!='')
    {        
        avisoLimpiar("nac_priv_dia");
    }
    else
    {        
        rpta+='Fech. DD, ';
        cajaColor("nac_priv_dia","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#nac_priv_mes").val()!='')
    {        
        avisoLimpiar("nac_priv_mes");
    }
    else
    {        
        rpta+='Fech. MM, ';
        cajaColor("nac_priv_mes","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#nac_priv_anio").val()!='')
    {        
        avisoLimpiar("nac_priv_anio");
    }
    else
    {        
        rpta+='Fech. AAAA, ';
        cajaColor("nac_priv_anio","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#cmb_sexo").val()!='')
    {        
        avisoLimpiar("cmb_sexo");
    }
    else
    {        
        rpta+='sexo, ';
        cajaColor("cmb_sexo","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    
    if($("#cant_filas_sedmodfac").val()!='0')
    {        
        avisoLimpiar("filas_sedmodfac");
    }
    else
    {        
        rpta+='Dependencia, ';         
        cajaColor("cmb_sed","red"); 
        cajaColor("cmb_mod","red");
        cajaColor("cmb_ed","red");
        eva+=1;
    }


    //---------------------------------------------------------------------------
    
    if($("#cant_filas_priv").val()!='0')
    {        
        avisoLimpiar("cant_filas_priv");
    }
    else
    {        
        rpta+='privilegio, ';
        cajaColor("cmb_sistemas","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#cmb_ec").val()!='0')
    {        
        avisoLimpiar("cmb_ec");
    }
    else
    {        
        rpta+='estado civil, ';
        cajaColor("cmb_ec","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#clave_reg_usu").val()!='')
    {     
        avisoLimpiar("clave_reg_usu");
    }
    else
    {        
        rpta+='Contraseña 1, ';
        cajaColor("clave_reg_usu","red"); 
        eva+=1;
    }

    if($("#clave_reg_usu_2").val()!='')
    {        
        avisoLimpiar("clave_reg_usu_2");
    }
    else
    {        
        rpta+='Contraseña 2, ';
        cajaColor("clave_reg_usu_2","red"); 
        eva+=1;
    }

    if(($("#clave_reg_usu_2").val()!='' && $("#clave_reg_usu").val()!='') && ($("#clave_reg_usu_2").val() == $("#clave_reg_usu").val()))
    {
        avisoLimpiar("clave_reg_usu");
        avisoLimpiar("clave_reg_usu_2");
    }
    else if(($("#clave_reg_usu_2").val()!='' && $("#clave_reg_usu").val()!=''))
    {        
        rpta+='contraseñas diferentes, ';
        cajaColor("clave_reg_usu","red");
        cajaColor("clave_reg_usu_2","red");
        
        eva+=1;
    }    


    if(eva>0)
    {
        //aviso_adv(rpta+".");
        notificacion(1,"¡Advertencia!",rpta+".");
        return false;
    }


    return true;
}


function tabla_add_sedmodfac(sed,sed_,mod,mod_,fac,fac_,tab,item)
{        
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    var strHtml1 = "<td><input type='hidden' name='sed_"+oId+"' id='sed_"+oId+"' value='"+sed+"' />" + sed_ +"</td>";    
    var strHtml2 = "<td><input type='hidden' name='mod_"+oId+"' id='mod_"+oId+"' value='"+mod+"' />" + mod_ +"</td>";    
    var strHtml3 = "<td><input type='hidden' name='fac_"+oId+"' id='fac_"+oId+"' value='"+fac+"' />" + fac_ +"</td>";        
    var strHtmlTr = "<tr onmouseover=colortb1=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb1; style='cursor: pointer;' id='"+tab+"_" + oId + "' align='center' onclick=eliminarFila("+oId+",'"+tab+"','"+item+"'); ></tr>";
    var strHtmlFinal = strHtml1 + strHtml2 + strHtml3;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#"+tab).append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#"+tab+"_" + oId).html(strHtmlFinal);
}

function tabla_add_priv(sispriv,sis,priv,tab,item,name)
{        
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    var strHtml1 = "<td><input type='hidden' name='"+name+oId+"' id='"+name+oId+"' value='"+sispriv+"' />" + sis +"</td>";    
    var strHtml2 = "<td>" + priv +"</td>";    
    var strHtmlTr = "<tr onmouseover=colortb2=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb2; style='cursor: pointer;'; id='"+tab+"_" + oId + "' align='center' onclick=eliminarFila("+oId+",'"+tab+"','"+item+"'); ></tr>";
    var strHtmlFinal = strHtml1 + strHtml2;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#"+tab).append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#"+tab+"_" + oId).html(strHtmlFinal);
}

function tabla_add_catmuro(sed,sed_,tab,item)
{        
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    var strHtml1 = "<td><input type='hidden' name='catmuro_"+oId+"' id='catmuro_"+oId+"' value='"+sed+"' />" + sed_ +"</td>";                
    var strHtmlTr = "<tr onmouseover=colortb3=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb3; style='cursor: pointer;' id='"+tab+"_" + oId + "' align='center' onclick=eliminarFila("+oId+",'"+tab+"','"+item+"'); ></tr>";
    var strHtmlFinal = strHtml1;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#"+tab).append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#"+tab+"_" + oId).html(strHtmlFinal);
}

function eliminarFila(oId,tab,item)
{   
    //$("#"+num).val(parseInt($("#"+num).val()) - 1);    
    $("#"+item).val(parseInt($("#"+item).val())); 
    switch(tab)
    {
        case "filas_sedmodfac":listadep.splice($.inArray($.trim($("#sed_"+oId).val())+$.trim($("#mod_"+oId).val())+$.trim($("#fac_"+oId).val()),listadep),1);break;
        case "list_privilegios":listaprivi.splice($.inArray($.trim($("#priv_"+oId).val()),listaprivi),1);break;
        case "filas_catemuro":liscatmuro.splice($.inArray($.trim($("#catmuro_"+oId).val()),liscatmuro),1);break;
    }
    
    $("#"+tab+"_" + oId).remove();       

 
    return false;
}

function ver_dependencia()
{
    if($("#cmb_sed").val()=='0')
    {
        //aviso_adv("falta ingresar Sede...");
        notificacion(1,"¡Advertencia!","falta ingresar Sede...");
        cajaColor("cmb_sed","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_sed");
    }

    if($("#cmb_mod").val()=='0')
    {
        //aviso_adv("falta ingresar Modalidad...");
        notificacion(1,"¡Advertencia!","falta ingresar Modalidad...");
        cajaColor("cmb_mod","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_mod");
    }

    if($("#cmb_ed").val()=='0')
    {
        //aviso_adv("falta ingresar Facultad...");
        notificacion(1,"¡Advertencia!","falta ingresar Facultad...");
        cajaColor("cmb_ed","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_ed");
    }
    
    return true;

}

