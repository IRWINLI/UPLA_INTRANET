//================= FUNCIÓN QUE REALIZA BÚSQUEDA Y LLAMA A FUNCIÓN QUE AGREGA FILAS A LA GRILLA ===========
//=========================================================================================================
var dni;
var sede;        
var mac;
var carr;
var per;
var cicsec;
var plan;
var codasi;
var expandir_1=0;
var expandir_2=0;

function expandir_caja_1()
{
    if(expandir_1==0)
    {
        expandir_1=1; 
        $("#caja").slideToggle();   
    }
    
}

function expandir_caja_2()
{
    if(expandir_2==0)
    {
        expandir_2=1; 
        $("#caja_2").slideToggle();   
        expandir_1=1; 
        $("#caja").slideToggle();   
    }
    
}

function buscar_Doc_jus(fac)
{    
    if(valcaja())
    {
        var params={};
        params['dni']=$("#bus_jus").val();                
            var i=0;
            while(i<=parseInt($("#cant_filas_jus").val()))
            {
                $("#list_cursos_" + i).remove(); 
                i++;
            }
                $("#cant_filas_jus").val("0");

            mostrarCargando();
        $.ajax({
            data: params,
            type: "GET",
            url: "buscarUEC",
            dataType: "json",            
            success: function(data)
            {
                $("#list_cursos_ tr").remove();
                $("#list_hor_just tr").remove();              
                aviso("","","");                

                if (data[0][0]=="No hay datos")
                {   
                    aviso_adv("No hay datos");
                    $("#label_docente").text("");
                }
                else
                {                    
                    expandir_caja_1();
                    $.each(data, function(index, value) 
                    {                      
                        // comentamos
                        <!-- 
                            /* 
                                index[0] = Sed_Id = HU | index[1] = Sed_Sede = HUANCAYO 
                                index[2] = MAc_Id = 6 | index[3] = MAc_ModAcademica = DISTANCIA
                                index[4] = MAc_Id = 6 | index[5] = MAc_ModAcademica = DISTANCIA                                                                                           
                                index[8] = per_ID
                                
                            */
                        -->
                        // tabla_add(data[index][0],data[index][1],parseInt(data[index][2]),data[index][3],data[index][4],data[index][5],data[index][6],data[index][7],data[index][12],data[index][13],data[index][14],data[index][15],data[index][16]);
                        


                        tabla_add(
                            data[index][0], // Sed_Id = HU
                            data[index][1], // Sed_Sede = HUANCAYO
                            data[index][2], // MAc_Id = 6
                            data[index][3], // MAc_ModAcademica =  Distancia
                            data[index][4], // Car_Id = IS
                            data[index][5], // Car_Carrera = INGENIERIA DE SISTEMAS Y COMPUTACION
                            data[index][6], // Mtr_Anio = 2013
                            data[index][7], // Mtr_Periodo = 2
                            //data[index][6] + "-" + data[index][7] // concatenacion 2013
                            data[index][8],// Per_id =  DNI
                            data[index][12], // Nta_Nivel = 9
                            data[index][13], // Nta_Seccion = A
                            data[index][14], // PEs_Id = 2005

                            data[index][15], // Asi_Id = SA095
                            data[index][16]); // Asi_Asignatura =  TALLER DE METODOLOGIA DE SISTEMAS
                       // Carga los datos del docente en un label
                        //var rowCount = $('#list_cursos_ tr').length;
                        //alerta("Se encontraron " +rowCount + " registros","Mensaje de Informacion");
                        $("#label_docente").text("DOCENTE: " + data[index][9] + " " + data[index][10] + ", " + data[index][11]);
                    });
                }
                
                //aviso_bien("Listo los resultados de busqueda...");
                ocultarCargando();
            }
            ,error: function(){
                //aviso_adv("Ocurrio un problema con JSON:buscarUEC...");      
                ocultarCargando();          
                location.reload();
            }   

        });        
    }
    else
    {
        aviso_mal("Debe ingresar un Dni para buscar");
        cajaColor("bus_jus","red");
    }
}
// funcion para llenar filas
//function tabla_add(sed,sec)
function tabla_add(sed_id,sed,mac_id,mac,carr_id,carr,anio,per,dni_id,cic,sec,plan,cod,uec)
{        
    $("#cant_filas_jus").val(parseInt($("#cant_filas_jus").val()) + 1);
    var oId = $("#cant_filas_jus").val(); 

    //var color_fila='#FFFFFF';

    var strHtml1 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='sede_"+oId+"' id='sede_"+oId+"' value='"+sed_id+"' />" + sed +"</td>";
    var strHtml2 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='mac_"+oId+"' id='mac_"+oId+"' value='"+mac_id+"' />" + mac +"</td>";
    var strHtml3 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='carr_"+oId+"' id='carr_"+oId+"' value='"+carr_id+"' />" + carr +"</td>";
    var strHtml4 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='anio_"+oId+"' id='anio_"+oId+"' value='"+anio+"' />" + anio +"</td>";
    var strHtml5 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='per_"+oId+ "' id='per_"+oId+ "' value='"+ per +"'/>"+per+"</td>";
    var strHtml6 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='cic_"+oId+ "' id='cic_"+oId+ "' value='"+ cic +"'/>"+cic+"</td>";
    var strHtml7 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='sec_"+oId+"' id='sec_"+oId+"' value='"+sec+"' />" + sec +"</td>";
    var strHtml8 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='plan_"+oId+"' id='plan_"+oId+"' value='"+plan+"' />" + plan +"</td>";
    var strHtml9 = "<td onclick='ver_programacion("+oId+");'><input type='hidden' name='cod_"+oId+"' id='cod_"+oId+"' value='"+cod+"' />" + cod +"</td>";
    var strHtml10 = "<td style='font-size:11px;' onclick='ver_programacion("+oId+");'><input type='hidden' name='dni_"+oId+"' id='dni_"+oId+"' value='"+dni_id+"' />" + uec +"</td>";

    
/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
    */
    var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; id='rowDetalle_jus_" + oId + "' align='center' ></tr>";        
    var strHtmlFinal = strHtml1 + strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8 + strHtml9 + strHtml10;
   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_cursos_").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowDetalle_jus_" + oId).html(strHtmlFinal);
}
// funcion para probar los resultados obtenidos
function ver_programacion(id)
{
    /*var cadena = $("#sede_" + id).val() + " ," + $("#mac_"+id).val() 
    + " , " + $("#carr_"+id).val() + " , " + $("#anio_"+id).val()+ " , "
    + $("#per_"+id).val()+" , "+$("#dni_"+id).val() +" , "+$("#cic_"+id).val() 
    + " , " +  $("#sec_"+id).val() + " , " + $('#plan_'+id).val() + " , " + 
    $("#cod_"+id).val();*/
    //alert(cadena);
    
        //
         dni = $("#dni_"+id).val();
         sede = $("#sede_"+id).val();
         mac = $("#mac_"+id).val();
         carr = $("#carr_"+id).val();
         //per = $("#anio_"+id).val()+ "-" + $("#per_"+id).val();
         cicsec = $("#cic_"+id).val() + "-" +  $("#sec_"+id).val();
         //plan = $('#plan_'+id).val();
         codasi = $("#cod_"+id).val();

        cargar_programacion(dni,sede,mac,carr,cicsec,codasi);        
}

function cargar_programacion(dni,sede,mac,carr,cicsec,codasi)
{
    var params={};

        params['Per_id'] = dni;
        params['Sed_Id'] = sede;
        params['MAc_Id'] = mac;
        params['Car_Id'] = carr;
        //params['l_Mtr_Anio_Periodo'] = per;
        params['l_Nivel_Seccion'] = cicsec;
        //params['PEs_Id'] = plan;
        params['Asi_Id'] = codasi;

            var i=0;
            while(i<=parseInt($("#cant_filas_jus").val()))
            {
                $("#list_hor_just" + i).remove(); 
                i++;
            }
                $("#cant_filas_jus").val("0");

        mostrarCargando();

        $.ajax({
            data: params,
            type: "GET",
            url: "verProgramacion",
            dataType: "json",            
            success: function(data)
            {
                
                $("#list_hor_just tr").remove();
                aviso("","","");
                if (data[0][0]=="1000")
                {                   
                    aviso_adv("No hay horario asignado por el momento...");
                }
                else
                {
                    expandir_caja_2();

                    var asignatura=data[1][1];
                    var temp =1;
                    var lunes ='------';
                    var martes ='------';
                    var miercoles ='------';
                    var jueves ='------';
                    var viernes ='------';
                    var sabado ='------';
                    var domingo ='------';
                    var l=new Array(4),m=new Array(4),mi=new Array(4),j=new Array(4),v=new Array(4),s=new Array(4),d=new Array(4),dat='', hor='';

                    for (var i=0;i<data.length-1;i++)
                    {                       

                        var semana=data[i][0];
                        var color_estilo="";
                        if (data[i][4]==0) {color_estilo="rgb(218, 77, 22)"}
                        else if (data[i][4]==1) {color_estilo="rgb(236, 212, 85)"}
                        else if (data[i][4]==2) {color_estilo="rgb(46, 94, 196)"}
                        else if (data[i][4]==3) {color_estilo="rgb(96, 165, 42)"} // justificado
                        else if (data[i][4]==4) {color_estilo="rgb(243, 0, 243)"}
                        else if (data[i][4]==5) {color_estilo="rgb(204, 166, 15)"} // justificado
                        if (temp==semana) 
                        {
                            if (data[i][2]=='LUNES') 
                            {
                                l[0]=data[i][5];
                                l[1]=data[i][3];
                                l[2]=data[i][6];
                                l[3]=data[i][7];

                                lunes='<div style="color:'+color_estilo+'"> '+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='MARTES') 
                            {
                                m[0]=data[i][5];
                                m[1]=data[i][3];
                                m[2]=data[i][6];
                                m[3]=data[i][7];

                                martes='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='MIERCOLES') 
                            {
                                mi[0]=data[i][5];
                                mi[1]=data[i][3];
                                mi[2]=data[i][6];
                                mi[3]=data[i][7];

                                miercoles='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='JUEVES') 
                            {
                                j[0]=data[i][5];
                                j[1]=data[i][3];
                                j[2]=data[i][6];
                                j[3]=data[i][7];

                                jueves='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='VIERNES') 
                            {
                                v[0]=data[i][5];
                                v[1]=data[i][3];
                                v[2]=data[i][6];
                                v[3]=data[i][7];

                                viernes='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='SABADO') 
                            {
                                s[0]=data[i][5];
                                s[1]=data[i][3];
                                s[2]=data[i][6];
                                s[3]=data[i][7];

                                sabado='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            else if (data[i][2]=='DOMINGO') 
                            {
                                d[0]=data[i][5];
                                d[1]=data[i][3];
                                d[2]=data[i][6];
                                d[3]=data[i][7];

                                domingo='<div style="color:'+color_estilo+'">'+data[i][3]+'<br>'+data[i][6]+'<br>'+data[i][5]+'</div>';
                            }
                            
                        }

                        if(temp!=data[i+1][0])
                        {
                            tabla_programacion(
                                semana, // semana
                                asignatura, // curso                                
                                lunes,// lun
                                martes,// mar
                                miercoles,// mie
                                jueves,// jue
                                viernes,// vie
                                sabado, // sab
                                domingo, // dom
                                l,
                                m,
                                mi,
                                j,
                                v,
                                s,
                                d
                                //,dat
                            );
                            temp++;
                            lunes ='------';
                            martes ='------';
                            miercoles ='------';
                            jueves ='------';
                            viernes ='------';
                            sabado ='------';
                            domingo ='------';                            
                        }
                    }
                    aviso_bien("Se cargó correctamente...");
                }
                ocultarCargando();                
                
            },error: function(){
                ocultarCargando();
                location.reload();
                //aviso_mal("Ocurrio un problema con el JSON: verProgramacion...");                    
            }        
        });       
}

function validar(x,y)
{    
    if(x==null || y=='------' || x =='MARCACION COMPLETA')
    {  
        return false; 
    }
    else
    {
        return true;
    }

}

function substrFecha(texto){
    texto.substr(30,10);
    return;
}

function valcaja()
{
    if($('#bus_jus').val()!='')
        return true;

    return false;
}

//function tabla_programacion(sem,curso,dom,lun,mar,mie,jue,vie,sab,lun_eva,mar_eva,mie_eva,jue_eva,vie_eva,sab_eva,dom_eva,dat){

function tabla_programacion(sem,curso,lun,mar,mie,jue,vie,sab, dom,lun_eva,mar_eva,mie_eva,jue_eva,vie_eva,sab_eva,dom_eva){
    //var fecha = mie.substr(30,10); // captura la fecha
    //var hora = mar.substr(54,10);    
    //alert(lun_eva[0]);
    //alert(fecha);
    //var color_fila='#FFFFFF';    

    $("#cant_filas_jus2").val(parseInt($("#cant_filas_jus2").val()) + 1);
    var oId = $("#cant_filas_jus2").val(); 
/*
    if(parseInt(oId)%2==0)            
        color_fila=$("#color_sesion").val();                            
    else
        color_fila='#FFFFFF';    
*/
    
    var strHtml1 = "<td>" + sem +"</td>";
    var strHtml2 = "<td style='font-size:11px;'>" + curso +"</td>";
    var strHtml3 = "<td onmouseover=if("+validar(lun_eva[0],lun)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(lun_eva[0],lun)+"){popup_justificar('"+lun_eva[1]+"','"+lun_eva[2]+"','lunes','"+lun_eva[3]+"');}>" + lun +"</td>";    
    var strHtml4 = "<td onmouseover=if("+validar(mar_eva[0],mar)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(mar_eva[0],mar)+"){popup_justificar('"+mar_eva[1]+"','"+mar_eva[2]+"','martes','"+mar_eva[3]+"');}>" + mar +"</td>";
    var strHtml5 = "<td onmouseover=if("+validar(mie_eva[0],mie)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(mie_eva[0],mie)+"){popup_justificar('"+mie_eva[1]+"','"+mie_eva[2]+"','miercoles','"+mie_eva[3]+"');}>" + mie +"</td>";
    var strHtml6 = "<td onmouseover=if("+validar(jue_eva[0],jue)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(jue_eva[0],jue)+"){popup_justificar('"+jue_eva[1]+"','"+jue_eva[2]+"','jueves','"+jue_eva[3]+"');}>" + jue +"</td>";
    var strHtml7 = "<td onmouseover=if("+validar(vie_eva[0],vie)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(vie_eva[0],vie)+"){popup_justificar('"+vie_eva[1]+"','"+vie_eva[2]+"','viernes','"+vie_eva[3]+"');}>" + vie +"</td>";
    var strHtml8 = "<td onmouseover=if("+validar(sab_eva[0],sab)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(sab_eva[0],sab)+"){popup_justificar('"+sab_eva[1]+"','"+sab_eva[2]+"','sabado','"+sab_eva[3]+"');}>" + sab +"</td>";
    var strHtml9 = "<td onmouseover=if("+validar(dom_eva[0],dom)+"){this.style.backgroundColor='#E4E4E4';} onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; onclick=if("+validar(dom_eva[0],dom)+"){popup_justificar('"+dom_eva[1]+"','"+dom_eva[2]+"','domingo','"+dom_eva[3]+"');}>" + dom +"</td>";
    

    var strHtmlTr = "<tr id='rowHorario_jus_" + oId + "' align='center' ></tr>";
    var strHtmlFinal = strHtml1 + strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8 + strHtml9;

   //tambien se puede agregar todo el HTML de una sola vez.
    $("#list_hor_just").append(strHtmlTr);
    //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
    $("#rowHorario_jus_" + oId).html(strHtmlFinal);
}

function ciclo_dosCifras(ciclo){
        var ciclo_dos='00';
        var n = parseInt(ciclo);
        
        if (n<10){
            ciclo_dos='0'+ciclo;
        }
        else{
            ciclo_dos=''+ciclo;
        }
        return ciclo_dos;
}

//function para sacar el popup de justificacion
function popup_justificar(f,h,dia,cod){
    
     $('#txt_fecha').val(f);
     $('#txt_hora').val(h);     
     $('#txt_motivo').val("");
    
    var params={};
    params['cod'] = cod;    
    
    $.ajax({
        data :params,
        type: "GET",
        url: "verjustificarasis",
        dataType: "json",
        success : function(data)
        {
            //$("#d_rpta").remove();
            //$('#txt_motivo').disabled('true');
            //alert(data[0][0]);            
            //alert(data[0][4]);            
            aviso("","","");
            $("#d_rpta").empty();                
            $('#txt_motivo').attr("disabled", false);
            $('#i_fecha_jus').attr("disabled", false);
            $('#cmb_hora_inicio_jus').attr("disabled", false);
            $('#cmb_hora_fin_jus').attr("disabled", false);
            $("#si_rec").attr('checked', true);
            $('#d_sino').show();
            avisoLimpiar("i_fecha_jus");
            avisoLimpiar("cmb_hora_fin_jus");
            avisoLimpiar("cmb_hora_inicio_jus");

            var i=0;
            
            if(data[0][3]!=' ')
            {
                i=0;                
            }
            else
            {
                i=1;                
            }

            if(data[0][4]==1)//bloquear y mostrar mensaje
            {                     
                
                $("#d_rpta").append("ya realizo su marcación del día de recuperación");                                          
                aviso_adv("No puede realizar ningun cambio porque ya marco su recuperación");
                
                $('#txt_motivo').val(data[i][0]);
                $('#i_fecha_jus').val(data[i][1]);                
                $('#cmb_hora_inicio_jus').val(data[i][2]);
                $('#cmb_hora_fin_jus').val(data[i][3]);

                $('#txt_motivo').attr("disabled", true);
                $('#i_fecha_jus').attr("disabled", true);
                $('#cmb_hora_inicio_jus').attr("disabled", true);
                $('#cmb_hora_fin_jus').attr("disabled", true);
                $('#d_sino').hide();
                /*$('#no_rec').hide();
                $('#l_si').hide();
                $('#l_no').hide();*/
                poppup_ventana_justificar(dia)  
                
            }
            else
            {                
                if(data[0][4]==2)//no se puede justificar
                {                    
                    alerta("Este es un día de Recuperación","Advertencia");
                    aviso_adv("Este es un día de Recuperación");
                }            
                else
                {                 
                    
                    if(data[1][0]=='No hay datos')
                    {
                        i=0;                
                    }
                    else
                    {
                        i=1;                
                    }

                    if(data.length==1)
                    {        
                        //alert("aqui");
                        $('#txt_motivo').val("");
                        $('#i_fecha_jus').val("");
                        $('#cmb_hora_inicio_jus').val("06:00");
                        $('#cmb_hora_fin_jus').val("06:00");
                    }
                    else
                    {
                        //alert("alla");
                        $('#txt_motivo').val(data[i][0]);
                        $('#i_fecha_jus').val(data[i][1]);                
                        $('#cmb_hora_inicio_jus').val(data[i][2]);
                        $('#cmb_hora_fin_jus').val(data[i][3]);
                    } 
                    poppup_ventana_justificar(dia)   
                }
            }

        },
        error: function()
        {
            //aviso_mal("Ocurrio un problema con el JSON: verjustificarasis...");             
            location.reload();
        }

      }); 
     
}

function poppup_ventana_justificar(dia)
{
    var llave_=false;
    $('#popupbox_just').dialog
    ({
        title: "Justificar Inasistencia",
        modal: true,
        width: 400,
        height: 470,
        closeText: 'Close',
        draggable:true,
        position: ["center",100],
        closeOnEscape : "true",
        buttons: 
              {
                Justificar: function() 
                {    
                      
                      if(veri_jus())
                      {    
                        
                        var params={};
                            params['Per_id'] = dni;
                            params['Sed_Id'] = sede;
                            params['MAc_Id'] = mac;
                            params['Car_Id'] = carr;        
                            params['l_Nivel_Seccion'] = cicsec;        
                            params['Asi_Id'] = codasi;
                            params['text_motivo'] = $("#txt_motivo").val();
                            params['dia_marcado'] = $("#txt_fecha").val();
                            params['dia'] = dia;
                            params['dia_marcado_remplazo'] = $("#i_fecha_jus").val();
                            params['ini'] = $("#cmb_hora_inicio_jus").val();
                            params['fin'] = $("#cmb_hora_fin_jus").val();   
                            params['sino'] = $('input:radio[name=sino]:checked').val();   

                        $.ajax({
                            data :params,
                            async: false,
                            type: "GET",
                            url: "justificarHorarioDocente",
                            dataType: "json",
                            success : function(data)                            
                            {
                                
                                if(data['rpta']!='Ingrese otra fecha, esta fecha se le ha asigado anteriormente')
                                {                 
                                    cargar_programacion(dni,sede,mac,carr,cicsec,codasi);                                                      
                                    llave_=true;
                                }
                                else    
                                {
                                    aviso_mal(data['rpta']);
                                    alerta(data['rpta'],'Advetencia');
                                    llave_=false;
                                }                            
                                    

                            },
                            error: function()
                            {
                              //aviso_mal("Ocurrio un problema con el JSON: justificarHorarioDocente...");                  
                              location.reload();
                            }

                          }); 
                      } 

                      if(llave_)
                      $( this ).dialog( "close" );                           
                    
                }
                ,
                Cancel: function() 
                {
                  $( this ).dialog( "close" );
                }
              }, 
        close: function() { /*Nada..*/ }
    });  
}

function veri_jus()
{    
    if($("#txt_motivo").val()!='')
    {
        
        if($('input:radio[name=sino]:checked').val()=='no')
        {
            avisoLimpiar("i_fecha_jus");
            avisoLimpiar("cmb_hora_fin_jus");
            avisoLimpiar("cmb_hora_inicio_jus");
            return true;
            
        }
        else
        {
            
            if($.trim($("#i_fecha_jus").val())!='')
            {
                if(parseInt($("#cmb_hora_inicio_jus").val()) < parseInt($("#cmb_hora_fin_jus").val()))
                {
                    avisoLimpiar("cmb_hora_fin_jus");
                    avisoLimpiar("cmb_hora_inicio_jus");
                    return true;
                }
                else
                {
                    aviso_adv("La Hora final debe ser mayor a la hora de inicio...");
                    cajaColor("cmb_hora_fin_jus","red"); 
                    cajaColor("cmb_hora_inicio_jus","red"); 
                }
                avisoLimpiar("i_fecha_jus");
            }
            else
            {
                aviso_adv("Le falta ingresar la fecha...");
                cajaColor("i_fecha_jus","red");             
            }
        }
        avisoLimpiar("txt_motivo");
    }
    else
    {
        aviso_adv("Le falta ingresar el Motivo o razón...");
        cajaColor_adv("txt_motivo");             
    }
    
    return false;
}

function cambio(num)
{
    if(num==1)
    expandir_1=0
    else
    expandir_1=1    
}

function cambio_2(num)
{
    if(num==1)
    expandir_2=0
    else
    expandir_2=1    
}


$(function()
{
    $("#mostrar").click(function(event) 
    {
        event.preventDefault();
        $("#caja").slideToggle();
        cambio(expandir_1);
        //expandir_caja_1();
    });
    /*$("#caja a").click(function(event) 
    {
        event.preventDefault();
        $("#caja").slideUp();
    });*/
    $("#h_docente").click(function(event) 
    {
        event.preventDefault();
        $("#caja_2").slideToggle();
        cambio_2(expandir_2);
        //expandir_caja_2();
    });
    /*$("#caja_2 a").click(function(event) 
    {
        event.preventDefault();
        $("#caja_2").slideUp();
    });*/
});