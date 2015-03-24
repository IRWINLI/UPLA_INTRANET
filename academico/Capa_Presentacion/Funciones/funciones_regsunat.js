
function nuevoreg()
{
    $("#registro_i").val("Nuevo Registro");
    $("#tipog_i").val("0");        
    $("#desgra_i").val("");
    //params['actgrado']=$("#chech_act").is(':checked');
    $("#cmb_forsup").val("0");
    $("#siperu_rec").prop("checked",true);                    
    $("#sireg_rec").prop("checked",true);          

    
    $("#cmb_insedu").val("0");        
    $("#cmb_nomisedu").val("0");
    $("#cmb_carr").val("0");
    $("#fecegre_i").val(""); 

    $("#btn_reg_doc").show();
    $("#btn_act_doc").hide();
    $("#btn_imp_doc").hide();

}

function ejecutarAjaxSimple(url,metodo,params,referido)
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

                busregistros();
                //cargar_agregar_get(url_x,obj_x);
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



function regsituedu()
{
    if(v_reg_situedu())
    {     
        if(confirm('¿Está seguro de los datos registrados?, una vez registrado sólo podrá cambiarlos en la Oficina de Personal, ya que esta información tiene caracter de Declaración Jurada.'))
        {              
            var params={};
            params['tgrado']=$("#tipog_i").val();        
            params['descgrado']=$("#desgra_i").val();
            //params['actgrado']=$("#chech_act").is(':checked');
            params['forsup']=$("#cmb_forsup").val();
            params['peru']=$('input:radio[name=peru_rec]:checked').val();   

            params['regedu']=$('input:radio[name=reg_rec]:checked').val();
            params['tinst']=$("#cmb_insedu").val();        
            params['nominst']=$("#cmb_nomisedu").val();
            params['carrinst']=$("#cmb_carr").val();
            params['anioeg']=$("#fecegre_i").val();

            ejecutarAjaxSimple("regsituacademica","POST",params,"");
        }

    }   
                
}

function actsituedu()
{
    if(v_reg_situedu())
    {                
        var params={};

        params['regcod']=$("#registro_i").val();
        params['tgrado']=$("#tipog_i").val();        
        params['descgrado']=$("#desgra_i").val();
        //params['actgrado']=$("#chech_act").is(':checked');
        params['forsup']=$("#cmb_forsup").val();
        params['peru']=$('input:radio[name=peru_rec]:checked').val();        
        params['regedu']=$('input:radio[name=reg_rec]:checked').val();
        params['tinst']=$("#cmb_insedu").val();        
        params['nominst']=$("#cmb_nomisedu").val();
        params['carrinst']=$("#cmb_carr").val();
        params['anioeg']=$("#fecegre_i").val();
               
        
        ejecutarAjaxSimple("actsituacademica","POST",params,"");
    }   
                
}

function v_reg_situedu()
{

    eva=0;



    if($("#tipog_i").val()!='0')
    {     
        avisoLimpiar("tipog_i");           

        if($("#cmb_forsup").val()!='0')
        {     
            avisoLimpiar("cmb_forsup");           

            if($('input:radio[name=peru_rec]:checked').val()=='1')
            {             
                if($("#cmb_insedu").val()!='0')
                {     
                    avisoLimpiar("cmb_insedu");  
                    
                        if($("#cmb_nomisedu").val()!='0')
                        {     
                            avisoLimpiar("cmb_nomisedu");           
                            

                            if($("#cmb_carr").val()!='0')
                            {     
                                avisoLimpiar("cmb_carr");           

                                if($("#fecegre_i").val()!='')
                                {     
                                    avisoLimpiar("fecegre_i");           

                                    aviso("","","");
                                }
                                else
                                {
                                    aviso_adv("Falta elegir Año de Egreso.");
                                    cajaColor("fecegre_i","rgb(255, 0, 51)");        
                                    eva+=1;
                                }
                            }
                            else
                            {
                                aviso_adv("Falta elegir la carrera.");
                                cajaColor("cmb_carr","rgb(255, 0, 51)");        
                                eva+=1;
                            }
                        }
                        else
                        {
                            aviso_adv("Falta elegir Nombre de la Institución Educativa.");
                            cajaColor("cmb_nomisedu","rgb(255, 0, 51)");        
                            eva+=1;
                        }                
                  
                }
                else
                {
                    aviso_adv("Falta elegir Institución Educativa.");
                    cajaColor("cmb_insedu","rgb(255, 0, 51)");        
                    eva+=1;
                }
            }
            if($('input:radio[name=peru_rec]:checked').val()=='0')
            {
                if($("#fecegre_i").val()!='')
                {     
                    avisoLimpiar("fecegre_i");           

                    aviso("","","");
                }
                else
                {
                    aviso_adv("Falta elegir Año de Egreso.");
                    cajaColor("fecegre_i","rgb(255, 0, 51)");        
                    eva+=1;
                }
            }
            
        }
        else
        {
            aviso_adv("Falta elegir su formación superior.");
            cajaColor("cmb_forsup","rgb(255, 0, 51)");        
            eva+=1;
        }
    }
    else
    {
        aviso_adv("Falta Ingresar tipo de Bachiller.");
        cajaColor("tipog_i","rgb(255, 0, 51)");        
        eva+=1;
    }   
   

    if(eva>0)
    {

        return false;
    }

    return true;
}


function busregistros()
{   
    
    //if(val_buspro())
    //{
        
        mostrarCargando();
        var params={};        
        
        iniciar_tabla("list_regpersonal_","cant_filas_gytpersonal");  
        
        var sindatos=false;
        $.ajax({
                data : params,
                type: "GET",
                url: "buscarpersonalRegGT",
                dataType: "json",
                success : function(data)
                {                
                    //alert(data);
                    $.each(data, function(index, value) 
                    {                       
                        
                        if(!(data[index][0]=='No hay datos'))
                        tabla_add(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4], data[index][5],data[index][6],data[index][7],data[index][8], data[index][9],data[index][10],data[index][11],data[index][12],data[index][13],data[index][14],data[index][15],data[index][16],data[index][17]);
                        
                    });

                    

                    //alerta_personalizado('popupbox_pg','Resultados');

                    ocultarCargando();
                }
                ,error: function()
                {
                    location.reload();//aviso("registrarUsuario no puedo realizarse!");                                        
                    ocultarCargando();
                }
            });
    //}    

}
/*function iniciar_tabla()
{    
    var i=1;
    $("#list_productosgeneral_").empty();
    $("#cant_filas_pg").val("0");
        
}*/

function tabla_add(num,tip,dni,codgrado,gra,des,pe,reg,codta,vi,codti,tin,codins,ins,codcar,car,fec,anio)
{        
    $("#cant_filas_gytpersonal").val(parseInt($("#cant_filas_gytpersonal").val()) + 1);
    var oId = $("#cant_filas_gytpersonal").val(); 

    //var color_fila='#FFFFFF';

    var strHtml1 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='num_"+oId+"' id='num_"+oId+"' value='"+num+"' /><input type='hidden' name='tip_"+oId+"' id='tip_"+oId+"' value='"+tip+"' />" + num +"</td>";
    var strHtml2 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='dni_"+oId+"' id='dni_"+oId+"' value='"+dni+"' />" + dni +"</td>";
    var strHtml3 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='gra_"+oId+"' id='gra_"+oId+"' value='"+codgrado+"' />" + gra +"</td>";
    var strHtml4 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='des_"+oId+"' id='des_"+oId+"' value='"+des+"' />" + des +"</td>";
    var strHtml5 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='pe_"+oId+"' id='pe_"+oId+"' value='"+pe+"' />" + pe +"</td>";
    var strHtml6 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='reg_"+oId+"' id='reg_"+oId+"' value='"+reg+"' />" +reg+"</td>"; 

    var strHtml7 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='vi_"+oId+"' id='vi_"+oId+"' value='"+codta+"' />" +vi+"</td>";    
    var strHtml8 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='tin_"+oId+"' id='tin_"+oId+"' value='"+codti+"' />" +tin+"</td>";    
    var strHtml9 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='ins_"+oId+"' id='ins_"+oId+"' value='"+codins+"' />" +ins+"</td>";    
    var strHtml10 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='car_"+oId+"' id='car_"+oId+"' value='"+codcar+"' />" +car+"</td>";    
    var strHtml11 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='anio_"+oId+"' id='anio_"+oId+"' value='"+anio+"' />" +anio+"</td>";    
   //var strHtml12 = "<td onclick='elisituedu("+oId+");'>"+set_imagen("elimina.png","20","20")+"</td>";    
    var strHtml12 = "<td onclick=alerta('"+"Sin_permiso_acerquese_a_la_Of._de_Personal."+"');>"+set_imagen("elimina.png","20","20")+"</td>";    
    var strHtml13 = "<td onclick=reporte("+oId+");>"+set_imagen("impresora.png","30","30")+"</td>";    

    

/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;background:white;' id='rowDetalle_regpersonal_" + oId + "' align='center' ></tr>";        
    var strHtmlFinal = strHtml12 + strHtml13 + strHtml1 + strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8 + strHtml9 + strHtml10 + strHtml11;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_regpersonal_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_regpersonal_" + oId).html(strHtmlFinal);
}

function ver_programacion(n)
{
    //alerta("Usted no tiene permiso para editar este registro, comuníquese con la Of. de Personal - TELF. 201626.");
/*
    $("#btn_reg_doc").hide();
    $("#btn_act_doc").show();
    $("#btn_imp_doc").show();


    $("#registro_i").val($("#num_"+n).val());
    $("#tipog_i").val($("#gra_"+n).val());        
    $("#desgra_i").val($("#des_"+n).val());
    //params['actgrado']=$("#chech_act").is(':checked');
    $("#cmb_forsup").val($("#vi_"+n).val());

    var b;
    var c;

    switch($("#pe_"+n).val())
    {
        case "PERUANA":
            $("#siperu_rec").prop("checked",true);
            b=1;
        break;

        case "EXTRANJERA":        
            $("#noperu_rec").prop("checked",true);
            b=0;
        break;
    }

    switch($("#reg_"+n).val())
    {
        case "PUBLICA":
            $("#sireg_rec").prop("checked",true);
            c=1;
        break;
        case "PRIVADA":
            $("#noreg_rec").prop("checked",true);
            c=2;
        break;
    }

           
    
    if(b==1)
    {    
        cmb_tipinsedu($("#tin_"+n).val(),$("#vi_"+n).val());   
        cmb_nomtipinsedu($("#ins_"+n).val(),$("#tin_"+n).val(),b,c);    
        cmb_carrins($("#car_"+n).val(),$("#ins_"+n).val());
    }
    else
    {
        $("#cmb_insedu").prop('disabled', true);                                        
        $("#cmb_nomisedu").prop('disabled', true);     
        $("#cmb_carr").prop('disabled', true);

        $('#cmb_insedu').empty();
        $('#cmb_nomisedu').empty();
        $('#cmb_carr').empty();
    }

    $("#fecegre_i").val($("#anio_"+n).val());  

    $("#tipog_i").focus();
  */
}

function cmb_tipinsedu(cod,codsis_x)
{
        mostrarCargando();
        $.get("opctipins", { codsis: codsis_x} ,function(resultado)
        { 
            if(resultado != false)
            {          
                $("#cmb_insedu").prop('disabled', false);
                $('#cmb_insedu').empty();
                $('#cmb_insedu').append(resultado); 
                $('#cmb_insedu').val(cod);                                    
            }

        });
    
}

function cmb_nomtipinsedu(cod,a,b,c)
{
    $.get("opcnomins", 
    { 
        codtip: a,
        codperu: b,
        codreg: c
    } ,function(resultado)
    {
       
        if(resultado != false)
        {
            $("#cmb_nomisedu").prop('disabled', false);
            $('#cmb_nomisedu').empty();
            $('#cmb_nomisedu').append(resultado);                                     
            $('#cmb_nomisedu').val(cod);
        }
    });
}

function cmb_carrins(cod,ins)
{
    $.get("opcnominscarr", 
    { 
        codins: ins
    } ,function(resultado)
    {                                            
        if(resultado != false)
        {                
            $("#cmb_carr").prop('disabled', false);  
            $('#cmb_carr').empty();                                                
            $('#cmb_carr').append(resultado);
            $('#cmb_carr').val(cod);                      
            ocultarCargando();
        }
    }); 
}

function elisituedu(n)
{
    if(confirm('Este registro se eliminará, desea continuar?'))
    {
        var params={};
        params['num_x']=$("#num_"+n).val();

        ejecutarAjaxSimple("elisituacademica","POST",params,"");
        nuevoreg();
    }
    else
    {
      aviso_adv('Se cancelo la transacción');
    } 
                
}

function reporte(n)
{
    nuevoreg();
    var reg_num_x=$("#num_"+n).val(); 
    mostrarCargando();

    $.post("RptSituAca", {cod_reg:reg_num_x} ,function(resultado)
    {
        if(resultado != false)
        {
            $("#popupbox_situaca").empty();
            $("#popupbox_situaca").append(resultado);
            alerta_personalizado("popupbox_situaca","850");            
            ocultarCargando();
        }
    });                     
    //alerta_personalizado("popupbox_situaca","600");
    
                                         

    //window.open ("http://200.37.187.3/ReportServer/Pages/ReportViewer.aspx?%2fReporteVirtual%2fRpt_Constancia_situacion_edu&rs:Command=Render&NUMREGTGRADO="+reg_num_x+"&NUMDOCUTTRABA="+coo+"&rs:Format=PDF");    
}

function alerta_personalizado(div_x,tam)
    {   
        $("#"+div_x).dialog({
            
            resizable: true,
            modal: true,
            minWidth : tam,
	    maxHeight:600,
            position: ["center",170],
            buttons: {},
            close: function() 
            { 
                                    
                $( this ).dialog( "close" );
            }
        });
    }
