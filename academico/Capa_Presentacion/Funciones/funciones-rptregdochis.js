var fi_x;
var ff_x;
var d_x;
var e_x;
var c_x;
var cambio=false;

function verexceldoc()
{
    if(v_ver_reghisdoc())
    {
        mostrarCargando();
        
        var params={};
        params['fini']=$("#f_ini_doc").val();    
        params['ffin']=$("#f_fin_doc").val(); 
        params['dep']=$("#pasa_ibus").val();    
        params['est']=$("#cmb_estadobus").val(); 
        params['cad']=$("#cad_i").val();  
        params['excel_opcion']='excel_regdochis';      
        
        redirect_by_post("",params, false);
        ocultarCargando();
    }
}


function v_ver_reghisdoc()
{
    eva=0;
    var rpta='Adv.: ';
    
    //---------------------------------------------------------------------------
   
        if($("#f_ini_doc").val()!="" && $("#f_fin_doc").val()!="")            
        {
            avisoLimpiar("f_ini_doc");
            avisoLimpiar("f_fin_doc");

            if($("#pasa_ibus").val()!="0" || 
            $("#cmb_estadobus").val()!="0" || 
            $("#cad_i").val()!="")
            {
                //avisoLimpiar("tipo_i");
                avisoLimpiar("pasa_ibus");
                avisoLimpiar("cmb_estadobus");
                avisoLimpiar("cad_i");

                aviso("","","");
            }
            else
            {                
                notificacion(1,'¡Advertencia!','Debe ingresar o escoger algún dato más para empezar la busqueda.');                   
                
                cajaColor("pasa_ibus","red"); 
                cajaColor("cmb_estadobus","red"); 
                cajaColor("cad_i","red"); 
            
                eva+=1;  
            }
            
        }
        else
        {   
            notificacion(1,'¡Advertencia!','Debe ingresar un rango de fechas.');                   

            cajaColor("f_ini_doc","red"); 
            cajaColor("f_fin_doc","red");
            eva+=1;        
        }

    //---------------------------------------------------------------------------
    
    if(eva>0)
    {        
        return false;
    }


    return true;
}


function busrehisdoc()
{
    if(v_ver_reghisdoc())
    {
        ocultar_notificacion();

        mostrarCargando();
        
        var params={};
        params['fini']=$("#f_ini_doc").val();    
        params['ffin']=$("#f_fin_doc").val(); 
        params['dep']=$("#pasa_ibus").val();    
        params['est']=$("#cmb_estadobus").val(); 
        params['cad']=$("#cad_i").val(); 

        fi_x=$("#f_ini_doc").val();
        ff_x=$("#f_fin_doc").val();
        d_x=$("#pasa_ibus").val();
        e_x=$("#cmb_estadobus").val();
        c_x=$("#cad_i").val();         

        iniciar_tabla("list_pagosdoc_","cant_filas_docs"); 
        
        $.ajax({
                data : params,
                type: "GET",
                url: "buscarDocHisReg",
                dataType: "json",
                success : function(data)
                {   
                    
                    $.each(data, function(index, value) 
                    {   
                        if(!(data[index][0]=='No hay datos'))                
                        tabla_add(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5],data[index][6],data[index][7],data[index][8],data[index][9],data[index][10]);
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

function tabla_add(n_1,n_2,n_3,n_4,n_5,n_6,n_7,n_8,n_9,n_10,n_11)
{        
    $("#cant_filas_docs").val(parseInt($("#cant_filas_docs").val()) + 1);
    var oId = $("#cant_filas_docs").val(); 

    //var color_fila='#FFFFFF';

    var strHtml1 = "<td onclick='ver_doc("+oId+");'><input type='hidden' name='cod_"+oId+"' id='cod_"+oId+"' value='"+n_2+"' />" + n_1 +"</td>";
    //var strHtml2 = "<td onclick='ver_doc("+oId+");'>" + n_3 +"</td>";
    var strHtml3 = "<td onclick='ver_doc("+oId+");'>" + n_4 +" "+n_5+"</td>";
    //var strHtml4 = "<td onclick='ver_doc("+oId+");'>" + n_5 +"</td>";
    var strHtml5 = "<td onclick='ver_doc("+oId+");'>" + n_6 +"</td>";
    var strHtml6 = "<td onclick='ver_doc("+oId+");'>" + n_7 +"</td>";
    var strHtml7 = "<td onclick='ver_doc("+oId+");' style='text-align: justify;'>" + n_8 +"</td>";
    var strHtml8 = "<td onclick='ver_doc("+oId+");' style='text-align: justify;'>" + n_9 +"</td>";
    //var strHtml9 = "<td onclick='ver_doc("+oId+");'>" + n_10 +"</td>";
    //var strHtml10 = "<td onclick='ver_doc("+oId+");'>" + n_11 +"</td>";
    //var strHtml10 = "<td onclick='elidocumento("+oId+");'>" + n_11 +"</td>";
    var strHtml11 = "<td onclick='elidocumento("+oId+");'>"+set_imagen("elimina.png","20","20")+"</td>"  

/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#444444'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' id='rowDetalle_pagosdoc_" + oId + "' align='center' ></tr>";        
    var strHtmlFinal = strHtml1 + strHtml3+ strHtml5 + strHtml6 + strHtml7 +strHtml8 + strHtml11;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_pagosdoc_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_pagosdoc_" + oId).html(strHtmlFinal);
}

function ver_doc(num)
{
    //alerta($("#cod_"+num).val());    
    //$("#rowDetalle_pagosdoc_"+num).css("background-color","yellow");
    alerta_personalizado_pag('popupbox_editpro','editpro-popup?cod='+$("#cod_"+num).val(),481);

}

function alerta_personalizado_pag(div_x,pagina,minw){   
    
    $("#"+div_x).load(pagina);
    $("#"+div_x).dialog({
        
        resizable: true,
        modal: true,
        minWidth : (typeof(minw)=== "undefined"?650:minw),
        position: ["center",170],
        buttons: 
        {
            /*OK: function() 
            {
                $( this ).dialog( "close" );
            }*/
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
}

function rebuscar()
{
     mostrarCargando();
            
                var params={};
                params['fini']=fi_x;
                params['ffin']=ff_x;
                params['dep']=d_x;
                params['est']=e_x;
                params['cad']=c_x;

                iniciar_tabla("list_pagosdoc_","cant_filas_docs"); 
                
                $.ajax({
                        data : params,
                        type: "GET",
                        url: "buscarDocHisReg",
                        dataType: "json",
                        success : function(data)
                        {   
                            
                            $.each(data, function(index, value) 
                            {   
                                if(!(data[index][0]=='No hay datos'))                
                                tabla_add(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5],data[index][6],data[index][7],data[index][8],data[index][9],data[index][10]);
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

function elidocumento(num)
{
        if(confirm('Va eliminar este registro, desea continuar?'))
        {
          
            var params={};

            params['codreghidoc']=$("#cod_"+num).val();                
            //alert(params['codreghidoc']);
            ejecutarAjaxSimple("elidocitem","POST",params,$("#exp_i").val());            
            cambio=true;            
            rebuscar();
        }
        else
        {
          aviso_adv('Se cancelo la operación.');
        }  
}

function verpdf()
{
    
    //var reg_num_x=$("#num_"+n).val(); 
    if(v_ver_reghisdoc())
    {
            var params={};
            params['fini']=$("#f_ini_doc").val();    
            params['ffin']=$("#f_fin_doc").val(); 
            params['dep']=$("#pasa_ibus").val();    
            params['est']=$("#cmb_estadobus").val(); 
            params['cad']=$("#cad_i").val(); 

        mostrarCargando();

        $.post("RptRegHisDocTodo", params ,function(resultado)
        {
            if(resultado != false)
            {
                $("#popupbox_DOHISPDF").empty();
                $("#popupbox_DOHISPDF").append(resultado);
                alerta_personalizado("popupbox_DOHISPDF","1200");            
                ocultarCargando();
            }
        });                     
    }
    //alerta_personalizado("popupbox_situaca","600");
    
                                         

    //window.open ("http://200.37.187.3/ReportServer/Pages/ReportViewer.aspx?%2fReporteVirtual%2fRpt_Constancia_situacion_edu&rs:Command=Render&NUMREGTGRADO="+reg_num_x+"&NUMDOCUTTRABA="+coo+"&rs:Format=PDF");    
}

function alerta_personalizado(div_x,tam)
    {   
        $("#"+div_x).dialog({
            
            resizable: true,
            modal: true,
            minWidth : tam,
            maxHeight:800,
            position: ["center",170],
            buttons: {},
            close: function() 
            { 
                                    
                $( this ).dialog( "close" );
            }
        });
    }

