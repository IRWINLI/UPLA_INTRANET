function cargar_historial()
{    
    if(valfechas())
    {

        var params={};
        params['i_fecha_log']=$("#i_fecha_log").val();        
        params['i_fecha_log_2']=$("#i_fecha_log_2").val();
                
            var i=0;
            while(i<=parseInt($("#cant_filas_log").val()))
            {
                $("#list_log_" + i).remove(); 
                i++;
            }
                $("#cant_filas_log").val("0");

        

            mostrarCargando();
        $.ajax({
            data: params,
            type: "GET",
            url: "buscarlogmarc",
            dataType: "json",            
            success: function(data)
            {
                 

                /*$("#list_cursos_ tr").remove();
                $("#list_hor_just tr").remove();    */          
                aviso("","","");                

                if (data[0][0]=="No hay datos")
                {   
                    aviso_adv("No hay datos");
                    //$("#label_docente").text("");
                }
                else
                {                    
                    //expandir_caja_1();
                    $.each(data, function(index, value) 
                    {   
                        tabla_add_log(data[index][5],data[index][0],data[index][1],data[index][2],data[index][3],data[index][4]);
                    });
                    aviso_bien("Listo los resultados de busqueda...");
                }
                
                
                ocultarCargando();
            }
            ,error: function(){
                //aviso_adv("Ocurrio un problema con JSON:buscarlogmarc...");      
                ocultarCargando();          
                location.reload();
            }   

        });        
    }
    
    
}


function valfechas()
{
    if($.trim($("#i_fecha_log").val())!='' && $.trim($("#i_fecha_log_2").val())!='')
    {
        /*if(compare_dates(fecha, fecha2)parseInt($("#i_fecha_log").val()) < parseInt($("#i_fecha_log_2").val()))
        {*/
            avisoLimpiar("i_fecha_log");
            avisoLimpiar("i_fecha_log_2");
            return true;
        /*}
        else
        {
            aviso_adv("La Hora final debe ser mayor a la hora de inicio...");
            cajaColor("i_fecha_log","red"); 
            cajaColor("i_fecha_log_2","red"); 
        }        */
    }
    else
    {
        aviso_adv("Le falta ingresar la fecha...");
        cajaColor("i_fecha_log","red");             
        cajaColor("i_fecha_log_2","red");
    }
     
    
    return false;

}

function imagenes_rpta(cad)
{
    switch (cad)
    {
        case '1':return 'temas/tema_completo.png';
        case 'X':return 'temas/tema_nulo.png';
        case '0':return 'temas/tema_incompleto.png';
        case 'J':return 'temas/tema_justificadp.png';
        case 'T':return 'temas/tema_tarde.png';
    }
}

function tabla_add_log(curso,dia,horario,ingreso,salida,fecha)
{        
    $("#cant_filas_log").val(parseInt($("#cant_filas_log").val()) + 1);
    var oId = $("#cant_filas_log").val(); 

    //var color_fila='#FFFFFF';
    

    var strHtml0 = "<td onclick=''><input type='hidden' name='curso_"+oId+"' id='curso_"+oId+"' value='"+curso+"' />" + curso +"</td>";
    var strHtml1 = "<td onclick=''><input type='hidden' name='dia_"+oId+"' id='dia_"+oId+"' value='"+dia+"' />" + dia +"</td>";
    var strHtml2 = "<td onclick=''><input type='hidden' name='fecha_"+oId+"' id='fecha_"+oId+"' value='"+fecha+"' />" + fecha +"</td>";       
    var strHtml3 = "<td onclick=''><input type='hidden' name='horario_"+oId+"' id='horario_"+oId+"' value='"+horario+"' />" + horario +"</td>";
    var strHtml4 = "<td onclick=''><input type='hidden' name='ingreso_"+oId+"' id='ingreso_"+oId+"' value='"+ingreso+"' />" + set_imagen(imagenes_rpta(ingreso),'30','30') +"</td>";
    var strHtml5 = "<td onclick=''><input type='hidden' name='salida_"+oId+"' id='salida_"+oId+"' value='"+salida+"' />" + set_imagen(imagenes_rpta(salida),'30','30')+"</td>";       
    

    
/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; id='rowDetalle_log_" + oId + "' align='center' ></tr>";        
    var strHtmlFinal = strHtml0 + strHtml1 + strHtml2 + strHtml3+ strHtml4+ strHtml5;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_log_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_log_" + oId).html(strHtmlFinal);
}

