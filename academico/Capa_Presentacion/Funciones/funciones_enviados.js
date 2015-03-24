$(function()
{
    $("#mostrar").click(function(event) 
    {
        event.preventDefault();
        $("#caja").slideToggle();
        cambio(expandir_1);
        //expandir_caja_1();
    });    
});

function v_ver_reghisdoc()
{
    eva=0;
    var rpta='Adv.: ';
    
    //---------------------------------------------------------------------------
   
        if(
            ($("#f_ini_doc").val()!="" && $("#f_fin_doc").val()!="") || 
            $("#pasa_ibus").val()!="0" || 
            $("#cmb_estadobus").val()!="0" || 
            $("#cad_i").val()!="")
        {
            avisoLimpiar("f_ini_doc");
            avisoLimpiar("f_fin_doc");
            
                //avisoLimpiar("tipo_i");
                avisoLimpiar("pasa_ibus");
                avisoLimpiar("cmb_estadobus");
                avisoLimpiar("cad_i");

                aviso("","","");
            
        }
        else
        {     
            aviso_adv('Debe ingresar algún dato para empear la busqueda.');               
                //cajaColor("tipo_i","red"); 
                cajaColor("pasa_ibus","red"); 
                cajaColor("cmb_estadobus","red"); 
                cajaColor("cad_i","red"); 

            cajaColor("f_ini_doc","red"); 
            eva+=1;        
        }

    //---------------------------------------------------------------------------
    
    if(eva>0)
    {        
        return false;
    }


    return true;
}


function buscar_enviados()
{
    //alert(control.value)
    
        mostrarCargando();
        
        var params={};
        params['est_id']=$("#estid_i").val();    
        params['recp']=$("#emi_i").val(); 
        params['f_ini']=$("#f_ini_").val();    
        params['f_fin']=$("#f_fin_").val(); 
        params['moda']=$("#cmb_modi").val(); 
        params['est']=$("#cmb_estado").val(); 

        

        iniciar_tabla("list_env_","cant_filas_envs"); 
        
        $.ajax({
                data : params,
                type: "GET",
                url: "buscarEnviados",
                dataType: "json",
                success : function(data)
                {   
                    
                    $.each(data, function(index, value) 
                    {   
                        if(!(data[index][0]=='No hay datos'))                
                        tabla_add(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5],data[index][6]);
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

function tabla_add(n_2,n_3,n_4,n_5,n_6,n_7,n_8)
{        
    $("#cant_filas_envs").val(parseInt($("#cant_filas_envs").val()) + 1);
    var oId = $("#cant_filas_envs").val(); 

    //var color_fila='#FFFFFF';

       var ima="";
    
    
        if(n_8==1){ima=set_imagen("esperando.gif",40,60);}
        else if(n_8==4){ima=set_imagen("observado.gif",30,25);}
        else if(n_8==3){ima=set_imagen("bien.png",40,40);}
        else if(n_8==6){ima=set_imagen("anulado.png",35,30);}
    

    //var strHtml1 = "<td onclick='ver_doc("+oId+");'><input type='hidden' name='cod_"+oId+"' id='cod_"+oId+"' value='"+n_2+"' />" + n_1 +"</td>";
    var strHtml2 = "<td><div title='"+n_6+"'>" + n_2 +"</div></td>";
    var strHtml3 = "<td><div title='"+n_6+"'>" + n_3 +"</div></td>";
    var strHtml4 = "<td><div title='"+n_6+"'>" + n_4 +"</div></td>";
    var strHtml5 = "<td><div title='"+n_6+"'>" + n_5 +"</div></td>";
    //var strHtml6 = "<td>" + n_6 +"</td>";            
    var strHtml6 = "<td><div title='"+n_6+"'>" + ima +"</div></td>";            
    //var strHtml10 = "<td onclick='elidocumento("+oId+");'>" + n_11 +"</td>";
    
    

/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' id='rowDetalle_env_" + oId + "' align='center' onclick='ver("+n_7+")'></tr>";        
    var strHtmlFinal = strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_env_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_env_" + oId).html(strHtmlFinal);
}

function ver(codigo)
{
    //alert(accion);
    //alert(codigo);
    //alerta($("#cod_"+num).val());    
    //$("#rowDetalle_pagosdoc_"+num).css("background-color","yellow");
    //alerta_personalizado_pag('popupbox_regtramite','regtramite-popup?cod='+codigo);

}

function alerta_personalizado_pag(div_x,pagina){   
    
    $("#"+div_x).load(pagina);

    $("#"+div_x).dialog({
        
        resizable: true,
        modal: true,
        minWidth : 650,
        position: ["center",170],
        buttons: 
        {
            OK: function() 
            {
                $( this ).dialog( "close" );
            }
        }
        ,
        close: function() 
        {     
            if(cambio)
            {           
             //  rebuscar();
               cambio=false;
            }
        }
    });
}