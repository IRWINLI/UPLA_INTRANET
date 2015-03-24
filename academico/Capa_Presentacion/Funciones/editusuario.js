var eliminarusuario=function(eli)
{    
    ocultar_notificacion();
    params={};
    params['eli']=eli;
    params['dni']=$("#codigo_edit_usu").val();

//preguntar si va eliminar

    if($.trim(params['dni'])=='')
    {
        notificacion(1,"¡Advertencia!","Primero debe ubicar el usuario.");
        cajaColor("dniusuario","red");         
    }
    else
    {
           $("#dialogConfirmediusu").empty();
        if(eli==1)
        {         
            $("<p>¿Está seguro que desea eliminar este usuario?</p>").appendTo("#dialogConfirmediusu");    
        }
        else
        {
            switch($.trim($("#activo_edit").val()))
            {
                case 'activo':$("<p>¿Está seguro que desea desactivar este usuario?</p>").appendTo("#dialogConfirmediusu");break;
                case 'desactivo':$("<p>¿Está seguro que desea activar este usuario?</p>").appendTo("#dialogConfirmediusu");break;
            }                    
        }
        
    $("#dialogConfirmediusu").dialog({
        resizable: false,        
        width:400,            
        modal: true,
        position: ["center",100],
        buttons: {
        'confirmar':function() 
        {
            mostrarCargando();
            $.ajax({
            data : params,
            type: "POST",
            url: "eliminarusuario-fucc",
            dataType: "json",
            success : function(data)
            {               
                switch(data['rpta'])
                {
                    case '0':notificacion(0,"¡Error!","Ocurrio algún problema vuelva a intentarlo.");break;
                    case '1':notificacion(1,"¡Advertencia!","Este usuario no existe, no está registrado.");break;
                    case '2':                
                    if(eli==1)
                    {
                        limpiar();    
                        notificacion(2,"¡Correcto!","se eliminó correctamente.");
                    }
                    else
                    {
                        switch($.trim($("#activo_edit").val()))
                        {
                            case 'activo':notificacion(2,"¡Correcto!","se desactivó correctamente.");$("#activo_edit").val("desactivo");break;
                            case 'desactivo':notificacion(2,"¡Correcto!","se activó correctamente.");$("#activo_edit").val("activo");break;
                        }                    
                    }                
                    break;
                }
                $("#dialogConfirmediusu").dialog('close');
                ocultarCargando();
            }
            ,error: function()
            {
                aviso("buscarUsuPre no puedo realizarse!","white","black");                     
            }
            });
        },
        Cancel:function() {
            $(this).dialog('close');
        }
    }
    });
       
    }
}

var limpiar=function()
{
    $("#codigo_edit_usu").val("");
    $("#codigo_edit_usu_aux").val("");
    $("#nombre_edit_usu").val("");
    $("#apP_edit_usu").val("");
    $("#apM_edit_usu").val("");
    
    $("#nac_priv_dia_edit").val("0");
    $("#nac_priv_mes_edit").val("0");
    $("#nac_priv_anio_edit").val("0");

    $("#email_priv_edit").val("");
    $("#dir_priv_edit").val("");
    $("#tel_priv_edit").val("");
    $("#cel_priv_edit").val("");

    $("#cmb_sexo_edit").val("0");
    $("#cmb_ec_edit").val("0");

    $("#cant_filas_priv").val("0");
    $("#cant_filas_sedmodfac").val("0");
    $("#cant_filas_catemuro").val("0");

    $("#cmb_sed_edit").val("0");
    $("#cmb_mod_edit").val("0");
    $("#cmb_ed_edit").val("0");

    $("#cmb_sistemas_edit").val("0");
    $("#cmb_priv_edit").val("0");
    $("#cmb_catmuro_edit").val("0");


    //$("#filas_sedmodfac > tbody:last").children().remove();//borrar apartir del primero
    $("#filas_sedmodfac").children().remove();
    $("#list_privilegios").children().remove();
    $("#filas_catemuro").children().remove();    

    //limpiar arrays

    listadep.splice(0);
    listaprivi.splice(0);
    liscatmuro.splice(0);

    //limpiar cajas

    avisoLimpiar("dniusuario");    
    avisoLimpiar("codigo_edit_usu");    
    avisoLimpiar("nombre_edit_usu");    
    avisoLimpiar("apP_edit_usu");    
    avisoLimpiar("apM_edit_usu");    
    avisoLimpiar("nac_priv_dia_edit");    
    avisoLimpiar("nac_priv_mes_edit");    
    avisoLimpiar("nac_priv_anio_edit");    
    avisoLimpiar("cmb_sexo_edit");    
    avisoLimpiar("filas_sedmodfac");
    avisoLimpiar("cmb_sed_edit");
    avisoLimpiar("cmb_mod_edit");
    avisoLimpiar("cmb_ed_edit");            
    avisoLimpiar("cant_filas_priv");    
    avisoLimpiar("cmb_ec_edit");    
    avisoLimpiar("cmb_sistemas_edit");  

}

var buscar_act_usu= function ()
{
    
    ocultar_notificacion();
    
    params={};    
    params.bus=$("#dniusuario").val();

    if($.trim(params.bus)=='')
    {
        notificacion(1,"¡Advertencia!","Ingrese un código primero.");
        cajaColor("dniusuario","red");         
    }
    else
    {
        limpiar();
        mostrarCargando();
        $.ajax({
            data : params,
            type: "GET",
            url: "buscarUsuPre",
            dataType: "json",
            success : function(data)
            {                 
                if(data[0][0]=='No hay datos')
                {
                    notificacion(1,"¡Advertencia!","Este usuario no existe, no está registrado.");   
                    ocultarCargando();
                }    
                else
                {
                    $("#codigo_edit_usu").val($.trim(data[0][0]));
                    $("#codigo_edit_usu_aux").val($.trim(data[0][0]));
                    $("#nombre_edit_usu").val($.trim(data[0][1]));
                    $("#apP_edit_usu").val($.trim(data[0][2]));
                    $("#apM_edit_usu").val($.trim(data[0][3]));
                    var fecha=$.trim(data[0][4]).split('-');
                    $("#nac_priv_dia_edit").val(fecha[0]);
                    $("#nac_priv_mes_edit").val(fecha[1]);
                    $("#nac_priv_anio_edit").val(fecha[2]);

                    $("#email_priv_edit").val($.trim(data[0][5]));
                    $("#dir_priv_edit").val($.trim(data[0][6]));
                    $("#tel_priv_edit").val($.trim(data[0][7]));
                    $("#cel_priv_edit").val($.trim(data[0][8]));

                    $("#cmb_sexo_edit").val(data[0][9]);
                    $("#cmb_ec_edit").val(data[0][10]);
                    $("#activo_edit").val((data[0][11]==1)?"activo":"desactivo");

                    //#### usuario - dependencias

                    $.ajax({
                    data : params,
                    type: "GET",
                    url: "buscarUsuPre-dep",
                    dataType: "json",
                    success : function(data)
                    {     
                        $.each(data, function(index, value) 
                        {   
                            if(!(data[index][0]=='No hay datos'))                                        
                            {
                                tabla_add_sedmodfac($.trim(data[index][0]),$.trim(data[index][1]),$.trim(data[index][2]),$.trim(data[index][3]),$.trim(data[index][4]),$.trim(data[index][5]),'filas_sedmodfac','cant_filas_sedmodfac');
                                listadep.push($.trim(data[index][0])+$.trim(data[index][2])+$.trim(data[index][4])); 
                            }                        
                        });  

                        $.ajax({
                        data : params,
                        type: "GET",
                        url: "buscarUsuPre-priv",
                        dataType: "json",
                        success : function(data)
                        {     
                            $.each(data, function(index, value) 
                            {   
                                if(!(data[index][0]=='No hay datos'))                                        
                                {
                                    tabla_add_priv($.trim(data[index][2]),$.trim(data[index][1]),$.trim(data[index][3]),'list_privilegios','cant_filas_priv');                            
                                    listaprivi.push($.trim(data[index][2]));             
                                }
                            });


                            //#### usuario - muro

                            $.ajax({
                            data : params,
                            type: "GET",
                            url: "buscarUsuPre-catmuro",
                            dataType: "json",
                            success : function(data)
                            {     
                                $.each(data, function(index, value) 
                                {   
                                    if(!(data[index][0]=='No hay datos'))                                        
                                    {
                                        tabla_add_catmuro($.trim(data[index][0]),$.trim(data[index][1]),'filas_catemuro','cant_filas_catemuro');                      
                                        liscatmuro.push($.trim(data[index][0]));               
                                    }
                                });
                                
                                //notificacion(2,"¡Correcto!","Listo!!...");

                                ocultarCargando();
                            }
                            ,error: function()
                            {
                                aviso("buscarUsuPre no puedo realizarse!","white","black");
                                location.reload();                     
                            }
                            });  
                            
                        }
                        ,error: function()
                        {
                            aviso("buscarUsuPre no puedo realizarse!","white","black");                     
                            location.reload();
                        }
                        });
                          
                          
                    }
                    ,error: function()
                    {
                        aviso("buscarUsuPre no puedo realizarse!","white","black");                     
                        location.reload();
                    }
                    });

                    //#### usuario - privilegio                    
                }                
                
            }
            ,error: function()
            {
                aviso("buscarUsuPre no puedo realizarse!","white","black");  
                location.reload();                   
            }
        });
    }
    
}

function v_act_usu()
{
    if($("#codigo_reg_usu").val()!='')
    {
        //aviso("Ingrese el código y dale Entre o click e Buscar","red","black");
        cajaColor("txt_act_est","");         
        return true;
    }
    cajaColor("txt_act_est","red");         
    //document.getElementById("txt_act_est").style.border="2px solid red";

    return false;
}

var v_edit_usu=function ()
{
    eva=0;
    var rpta='Adv. falta: ';
    if($("#codigo_edit_usu").val()!='')
    {
        avisoLimpiar("codigo_edit_usu");
    }
    else
    {        
        rpta+='Código o DNI, ';
        cajaColor("codigo_edit_usu","red"); 
        eva+=1;        
    }
    //---------------------------------------------------------------------------
    if($("#nombre_edit_usu").val()!='')
    {
        avisoLimpiar("nombre_edit_usu");
    }
    else
    {        
        rpta+='Nombre, ';
        cajaColor("nombre_edit_usu","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    if($("#apP_edit_usu").val()!='')
    {        
        avisoLimpiar("apP_edit_usu");
    }
    else
    {        
        rpta+='Ap. paterno, ';
        cajaColor("apP_edit_usu","red"); 
        eva+=1;
    }
    //---------------------------------------------------------------------------
    if($("#apM_edit_usu").val()!='')
    {        
        avisoLimpiar("apM_edit_usu");
    }
    else
    {        
        rpta+='Ap. materno, ';
        cajaColor("apM_edit_usu","red"); 
        eva+=1;
    }    
    //---------------------------------------------------------------------------
    if($("#nac_priv_dia_edit").val()!='0')
    {        
        avisoLimpiar("nac_priv_dia_edit");
    }
    else
    {        
        rpta+='Fech. DD, ';
        cajaColor("nac_priv_dia_edit","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#nac_priv_mes_edit").val()!='0')
    {        
        avisoLimpiar("nac_priv_mes_edit");
    }
    else
    {        
        rpta+='Fech. MM, ';
        cajaColor("nac_priv_mes_edit","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#nac_priv_anio_edit").val()!='0')
    {        
        avisoLimpiar("nac_priv_anio_edit");
    }
    else
    {        
        rpta+='Fech. AAAA, ';
        cajaColor("nac_priv_anio_edit","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#cmb_sexo_edit").val()!='')
    {        
        avisoLimpiar("cmb_sexo_edit");
    }
    else
    {        
        rpta+='sexo, ';
        cajaColor("cmb_sexo_edit","red"); 
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
        cajaColor("cmb_sed_edit","red"); 
        cajaColor("cmb_mod_edit","red");
        cajaColor("cmb_ed_edit","red");
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
        cajaColor("cmb_sistemas_edit","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    if($("#cmb_ec_edit").val()!='0')
    {        
        avisoLimpiar("cmb_ec_edit");
    }
    else
    {        
        rpta+='estado civil, ';
        cajaColor("cmb_ec_edit","red"); 
        eva+=1;
    }

    //---------------------------------------------------------------------------
    

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

function tabla_add_priv(sispriv,sis,priv,tab,item)
{        
    $("#"+item).val(parseInt($("#"+item).val()) + 1);  
    //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
    var oId = $("#"+item).val(); 
    
    var strHtml1 = "<td><input type='hidden' name='priv_"+oId+"' id='priv_"+oId+"' value='"+sispriv+"' />" + sis +"</td>";    
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
    if($("#cmb_sed_edit").val()=='0')
    {
        //aviso_adv("falta ingresar Sede...");
        notificacion(1,"¡Advertencia!","falta ingresar Sede...");
        cajaColor("cmb_sed_edit","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_sed_edit");
    }

    if($("#cmb_mod_edit").val()=='0')
    {
        //aviso_adv("falta ingresar Modalidad...");
        notificacion(1,"¡Advertencia!","falta ingresar Modalidad...");
        cajaColor("cmb_mod_edit","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_mod_edit");
    }

    if($("#cmb_ed_edit").val()=='0')
    {
        //aviso_adv("falta ingresar Facultad...");
        notificacion(1,"¡Advertencia!","falta ingresar Facultad...");
        cajaColor("cmb_ed_edit","red"); 
        return false;
    }
    else
    {
        aviso("","","");
        avisoLimpiar("cmb_ed_edit");
    }
    
    return true;

}

