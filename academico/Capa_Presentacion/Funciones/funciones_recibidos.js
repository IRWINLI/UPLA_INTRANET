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


function buscar_recibidos()
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

        

        iniciar_tabla("list_rec_","cant_filas_recs"); 
        
        $.ajax({
                data : params,
                type: "GET",
                url: "buscarRecibidos",
                dataType: "json",
                success : function(data)
                {   
                    
                    $.each(data, function(index, value) 
                    {   
                        if(!(data[index][0]=='No hay datos'))                
                        tabla_add(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5],data[index][6],data[index][7],data[index][8],data[index][9],data[index][10],data[index][11],data[index][12]);
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

function tabla_add(n_2,n_3,n_4,n_5,n_6,n_7,n_8,n_9,n_10,n_11,n_12,n_13,n_14)
{        
    $("#cant_filas_recs").val(parseInt($("#cant_filas_recs").val()) + 1);
    var oId = $("#cant_filas_recs").val(); 

    //var color_fila='#FFFFFF';
    var ima="";
    
    
        if(n_8==1){ima=set_imagen("esperando.gif",40,60);}
        else if(n_8==4){ima=set_imagen("observado.gif",30,25);}
        else if(n_8==3){ima=set_imagen("bien.png",40,40);}
        else if(n_8==6){ima=set_imagen("anulado.png",35,30);}
    
    
    //var strHtml1 = "<td onclick='ver_doc("+oId+");'><input type='hidden' name='cod_"+oId+"' id='cod_"+oId+"' value='"+n_2+"' />" + n_1 +"</td>";
    var strHtml2 = "<td><div title='"+n_6+"'><input type='hidden' id='remi_x_"+oId+"' value='"+n_12+"'>" + n_2 +"</div></td>";
    var strHtml3 = "<td><div title='"+n_6+"'><input type='hidden' id='cod_alum_x_"+oId+"' value='"+n_3+"'>" + n_3 +"</div></td>";
    var strHtml4 = "<td><div title='"+n_6+"'><input type='hidden' id='cod_mod_x_"+oId+"' value='"+n_4+"'/><input type='hidden' id='cod_mod_"+oId+"' value='"+n_14+"'/>" + n_4 +"</div></td>";
    var strHtml5 = "<td><div title='"+n_6+"'><label id='cod_jus_x_"+oId+"' hidden>"+n_10.replace(/"/g, "*")+"</label><label id='obs_x_"+oId+"' hidden>"+n_13.replace(/"/g, "*")+"</label>" + n_5 +"</div></td>";
    //var strHtml6 = "<td>" + n_6 +"</td>";    
    var strHtml7 = "<td><div title='"+n_6+"'>" +ima+"</div></td>"; 
    //var strHtml10 = "<td onclick='elidocumento("+oId+");'>" + n_11 +"</td>";
    
    

/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var visto='white';
    var sombra='#E4E4E4';
    if(n_7 == 0)
    {
        visto='#FFC50F';
        sombra='#AC850C';
    }
     
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='"+sombra+"'; onmouseout=this.style.backgroundColor='"+visto+"' style='cursor: pointer;background:"+visto+";' id=rowDetalle_rec_" + oId + " align=center onclick='ver("+oId+","+n_8+","+n_9+","+n_11+");'></tr>";        
    var strHtmlFinal = strHtml2 + strHtml3+ strHtml4 + strHtml5 +  strHtml7;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_rec_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_rec_" + oId).html(strHtmlFinal);
}

function ver(num,accion,codigo,cod_env)
{
    //alerta($("#cod_"+num).val());    
    //$("#rowDetalle_pagosdoc_"+num).css("background-color","yellow");
    //alerta_personalizado_pag('popupbox_editpro','editpro-popup?cod='+$("#cod_"+num).val());
    
    pasa={};
    pasa["accion"]=accion;
    pasa["codigo"]=codigo;
    pasa["cod_alum2"]=$("#cod_alum_x_"+num).val();    
    pasa["modi"]=$("#cod_mod_x_"+num).val();
    pasa["justi"]=$("#cod_jus_x_"+num).text();
    pasa["env"]=cod_env;
    pasa["remi"]=$("#remi_x_"+num).val();
    pasa["obs"]=$("#obs_x_"+num).text();
    pasa["codmod"]=$("#cod_mod_"+num).val();
    
    redirect_by_post("regtramite-adm",pasa,false);
}

function resumen(str)
{
    cad=srt.substring(12);
    if(srt.length >12)
        cad+="...";
    
    return cad;
}

/*
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
               rebuscar();
               cambio=false;
            }
        }
    });
}*/