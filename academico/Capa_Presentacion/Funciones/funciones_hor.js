/*================================================================================================
====================================== FUNCIONES HORARIOS ======================================
================================================================================================*/
var listCombos=new Array();
    listCombos[0]="cmb_sede";
    listCombos[1]="cmb_modalidad";
    listCombos[2]="cmb_facultad";
    listCombos[3]="cmb_carrera";
    listCombos[4]="cmb_ciclo";
    listCombos[5]="cmb_salon";
//funcion para calcular la horas ; es decir restar dos horas para
//clacular si la hora registrada es correcta
function calcularHora(v1,v2)
{
  //v1=hora fin
  //v2=hora inicio
  //le agregamos el formato correcto ya que le falta hh:mm:ss
  v1=v1+":00";
  v2=v2+":00";

  horas1=v1.split(":"); /*Mediante la función split separamos el string por ":" y lo convertimos en array. */ 
  horas2=v2.split(":");
  horatotale=new Array();
  for(a=0;a<3;a++) /*bucle para tratar la hora, los minutos y los segundos*/
  {
  horas1[a]=(isNaN(parseInt(horas1[a])))?0:parseInt(horas1[a]) /*si horas1[a] es NaN lo convertimos a 0, sino convertimos el valor en entero*/
  horas2[a]=(isNaN(parseInt(horas2[a])))?0:parseInt(horas2[a])
  horatotale[a]=(horas1[a]-horas2[a]);/* insertamos la resta dentro del array horatotale[a].*/
  }
  horatotal=new Date()  /*Instanciamos horatotal con la clase Date de javascript para manipular las horas*/
  horatotal.setHours(horatotale[0]); /* En horatotal insertamos las horas, minutos y segundos calculados en el bucle*/ 
  horatotal.setMinutes(horatotale[1]);
  horatotal.setSeconds(horatotale[2]);
  //return horatotal.getHours()+":"+horatotal.getMinutes()+":"+horatotal.getSeconds();
  /*Devolvemos el valor calculado en el formato hh:mm:ss*/
  //para el caso devolveremos el array horatotale
  return horatotale;

}
//sirve para buscar el array y devolver la posicion de este en el array
function buscarEnArray(array,dato)
{
  var x=0;
  while(array[x])
  {
    if(array[x]==dato) return x;
    x++;
  }
  return null;
}
function cargar_carreras(codFacultad)
{
    $.get("carrera_temp", { code:codFacultad }, function(resultado)
    {
      if($.trim(resultado)=='salir')
      {
        location.reload();
      }
      else
      {
          if(resultado == false)
          {
            document.getElementById("cmb_carrera").options.length=1;
          }
          else
          { 
              document.getElementById("cmb_carrera").options.length=1;
              $('#cmb_carrera').append(resultado);
              document.getElementById("cmb_carrera").disabled=false;            
          }
      }
    }
    );//fin get
}
//Funcion para cargar la especialidad
function cargar_especialidad(idSelectOrigen)
{   //obtengo el indice del siguiente combo
  var nextComboIndice=buscarEnArray(listCombos,idSelectOrigen)+1;
  var cod_carrera = $("#"+idSelectOrigen).val();
  if(cod_carrera=="0")
  {
    var x=nextComboIndice;//indice 
    var selectActual=null;
    //buscamos los select siguientes al que inicio el evento OnChange y les cambio el estado y deshabilito
    while(listCombos[x])
    {
      selectActual=document.getElementById(listCombos[x]);
      if(x!=5)
      {
        selectActual.length=1;
        selectActual.disabled=true;
      }
      x++;
    }//fin while
  }//fin if
  else
  {
    $.get("especialidad", { code: cod_carrera },function(resultado)
      {
        if($.trim(resultado)=='salir')
        {
          location.reload();
        }
        else
        {
          if(resultado == false)
          {
            document.getElementById("cmb_especialidad").options.length=1;
            document.getElementById("cmb_especialidad").disabled=false;//esto es ya que algunas careras no tienen especialidad               
              //$("#cmb_esp_").attr("disabled",true);                    
          }//fin if
          else
          {              
            //$("#cmb_esp_").attr("disabled",false);
            document.getElementById("cmb_especialidad").options.length=1;        
            $('#cmb_especialidad').append(resultado);
            document.getElementById("cmb_especialidad").disabled=false;
          }//fin else
        }
      }
    );//fin get
  }//fin else
}
function cargar_salon()//Funcion para cargar los salones invoca cmb_turno
{  
  $('#cmb_salon option').remove();
  $('#cmb_salon').append('<option value="0">SALON</option>');
  //var fac=$("#cmb_facultad").val();
  var carr = $("#cmb_carrera").val();
  //var esp = $("#cmb_especialidad").val();
  var cic = $("#cmb_ciclo").val();
  //var tur=$("#cmb_turno").val();
  var sede = $("#cmb_sede").val();
  var moda = $("#cmb_modalidad").val();

    $.get("salonesdispo", { carr:carr,cic:cic,sede:sede,moda:moda},
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
            $('#cmb_salon').append(resultado);
          }
        }
    });//fin get

}
//esta funcion se lanza cuando seleccionamos el combo salones 'cmb_salon'
function cargar_docentes(docente)
{
  if(docente!='')
  {
    $('#cmb_docxsal_u option').remove(); 
    $('#cmb_docxsal_u').append('<option value="0">DOCENTE</option>');
    $.get("horarioDocxSal",{ 
        sede:$("#cmb_sede").val(),
        moda:$("#cmb_modalidad").val(),
        carr:$("#cmb_carrera").val(),
        //espe:$("#cmb_especialidad").val(),        
        ciclo:$("#cmb_ciclo").val()
      } 
      ,function(resultado)
      {
        if($.trim(resultado)=='salir')
        {
          location.reload();
        }
        else
        {
          if(resultado != false)
          {
              $('#cmb_docxsal_u').append(resultado);//crgamos el combo con los docentes  
              $('#cmb_docxsal_u').val(docente); 
          }
        }
      }
    ); 
  }
  else
  {
    $('#cmb_docxsal_a option').remove(); 
    $('#cmb_docxsal_a').append('<option value="0">DOCENTE</option>');
    $.get("horarioDocxSal",{ 
        sede:$("#cmb_sede").val(),
        moda:$("#cmb_modalidad").val(),
        carr:$("#cmb_carrera").val(),
        //espe:$("#cmb_especialidad").val(),        
        ciclo:$("#cmb_ciclo").val()
      } 
      ,function(resultado)
      {
        if($.trim(resultado)=='salir')
        {
          location.reload();
        }
        else
        {
          if(resultado != false)
          {
              $('#cmb_docxsal_a').append(resultado);//crgamos el combo con los docentes  
          }
        }
      }
    ); 
  }

}
//esta funcion se lanza cuando seleccionamos el docente 
function cargar_curxdoc(curso,perId)
{  
  
  if(curso!='')
  {      
    $('#cmb_cursoxsal_u option').remove();
    $('#cmb_cursoxsal_u').append('<option value="0">CURSO</option>');

      $.get("horarioCurxSal", { cod:$("#cmb_salon").val(),doc:perId,carr : $("#cmb_carrera").val(),cic : $("#cmb_ciclo").val(),sede : $("#cmb_sede").val(),
          moda : $("#cmb_modalidad").val()}, function(resultado)
        {
          if($.trim(resultado)=='salir')
        {
          location.reload();
        }
        else
        {
            if(resultado != false)
            {
              $('#cmb_cursoxsal_u').append(resultado);
              $('#cmb_cursoxsal_u').val(curso);  
            }
        }
        }
      );
  }
  else
  {
    $('#cmb_cursoxsal_a option').remove();
    $('#cmb_cursoxsal_a').append('<option value="0">CURSO</option>');
      $.get("horarioCurxSal", { cod:$("#cmb_salon").val(),doc:$("#cmb_docxsal_a").val(),carr : $("#cmb_carrera").val(),cic : $("#cmb_ciclo").val(),sede : $("#cmb_sede").val(),
          moda : $("#cmb_modalidad").val()}, function(resultado)
        {
        if($.trim(resultado)=='salir')
        {
          location.reload();
        }
        else
        {
            if(resultado != false)
            {
              $('#cmb_cursoxsal_a').append(resultado);               
            }
        }
        });
  }

}
//#====================================================================================================0000
    //====================================== FUNCIONES PARA TABLAS DINÁMICAS ==============================0000
    //#====================================================================================================0000
function cargar_horario_salon()
{
    var contAux= new Array(7);
        contAux[0]=0;contAux[1]=0;contAux[2]=0;contAux[3]=0;contAux[4]=0;contAux[5]=0;contAux[6]=0;

    color_fila='#FFFFFF';
    //colorOver='#FFE4C4';
    colorOver='rgba(175,175,175,0.5)';
  //variables para almacenar los dias para los td
  var a_horario= new Array();
      a_horario[0]=new Array(7);a_horario[1]=new Array(7);a_horario[2]=new Array(7);a_horario[3]=new Array(7);a_horario[4]=new Array(7);
      a_horario[5]=new Array(7);a_horario[6]=new Array(7);a_horario[7]=new Array(7);a_horario[8]=new Array(7);a_horario[9]=new Array(7);
      a_horario[10]=new Array(7);a_horario[11]=new Array(7);a_horario[12]=new Array(7);a_horario[13]=new Array(7);a_horario[14]=new Array(7);
  ////////////////////inicializar
  for(var f=0;f<a_horario.length;f++)
  {
    for(var c=0;c<7;c++)
    {
      a_horario[f][c]="<td>.<t/d>";
    }
  }
  //////////////////// fin inicializar //////////////////////////
  $("#tbDetalle_horario td").remove();
  var params={};
      //params['codSalon']=$("#cmb_salon").val();
      //params['planEst']=$("#txtPlan").val();
      params['idSede']=$("#cmb_sede").val();
      params['idModalidad']=$("#cmb_modalidad").val();
      params['idCarrera']=$("#cmb_carrera").val();
      params['nivel']=$("#cmb_ciclo").val();
      //params['anioPeriodo']=$("#txtPeriodo").val();
      params['seccion']=$("#cmb_salon option:selected").html();
      //var valor = $("#miCombo option:selected").html();
mostrarCargando();//muestra el icono de carga
  $.ajax({
      data :params,
      type: "GET",
      url: "horario_salones",
      dataType: "json",
      success : function(data)
      {
        //cambiamos la descripcion de los horarios
        document.getElementById('Descripcionhorario').innerHTML=$("#cmb_ciclo option:selected").html()+' Ciclo '+ $("#cmb_salon option:selected").html()+'-'+$("#cmb_carrera option:selected").html()+'- Fac. '+$("#cmb_facultad option:selected").html();
        if (data[0][0]=="No hay datos")
        {}
        else
        {
          var ultimoIndice=0;
          var diaAux=1;
          //alert(a_horario.length);
          for(var c=0;c<7;c++)//filas
          {
            for(var f=0;f<a_horario.length;f++)//columnas
            {
              for(x=ultimoIndice;x<data.length;x++)//recorremos el data  cargaLectiva,estado
              {
                var n_dia_cod=data[x][7];//tengo el dia
                if(n_dia_cod==diaAux)//si
                {
                  var cod_cursosal=data[x][0];
                  var cod_saltem=data[x][1];
                  var cod_cur=data[x][2];
                  var asignatura=data[x][3];
                  var perId=data[x][4];
                  var docente=data[x][5];
                  var n_hor_dia=data[x][6];//codigo de horarios
                  var hora_inicio=data[x][8];
                  var hora_fin=data[x][9];
                  var estado=data[x][11];
                  var carga_lectiva=data[x][13];
                  //preguntamos si esta activo
                  if(estado==1)
                    var texto="<span class='spanAsigHora'>"+asignatura+"</span><br><span class='spanDoceHora'>"+docente+"</span><br><span class='spanHora'>"+hora_inicio+"</span> - <span class='spanHora'>"+hora_fin+"</span>";
                  else
                    var texto="<span>"+asignatura+"</span><br><span>"+docente+"</span><br><span>"+hora_inicio+"</span> - <span>"+hora_fin+"</span><br><span class='spanHora'>Deshabilitado</span>";
                  var fila_texto="<td onmouseover=\"this.style.backgroundColor=\'"+colorOver+"\';\"onmouseout=\"this.style.backgroundColor=\'"+color_fila+"\';\" onclick=\"popup_horarios_update("+estado+",\'"+perId+"\',\'"+cod_cur+"\',"+n_hor_dia+","+n_dia_cod+",\'"+hora_inicio+"\',\'"+hora_fin+"\')\">"+texto+"</td>";
                  ultimoIndice=x+1;
                  a_horario[f][c]=fila_texto;
                  contAux[c]++; break;
                }//fin si
              }//fin data
            }//fin columnas
            diaAux++;
          }//fin filas
          contAux.sort(function(a,b){return b-a});
        generar_horario(a_horario,contAux[0]);
        }//fin else
        ocultarCargando();
      },
      error: function()
      {        
        ocultarCargando();              
        location.reload();
      }
    }); //fin ajax
}
//funcion para armar la tabla a partir e la matriz generada
function generar_horario(matriz_horario,max)
{
  for(var x=0;x<max;x++)
  {
    $("#cant_filas").val(parseInt($("#cant_filas").val())+1);
    var num_filas = $("#cant_filas").val();
    var fila_tr = "<tr id='rowDetalle_anu_" + num_filas + "' align='center' ></tr>";
    var strHtmlFinal = matriz_horario[x][1]+matriz_horario[x][2]+ matriz_horario[x][3] + matriz_horario[x][4] + matriz_horario[x][5]+matriz_horario[x][6]+matriz_horario[x][0];
    //agregamos la linea de tr o una nueva fila
    $("#tbDetalle_horario").append(fila_tr);
    //despues agregamos los campos o td 
    $("#rowDetalle_anu_" + num_filas).html(strHtmlFinal);
  }
}
//#====================================================================================================
//====================================== FIN ==========================================================
//#====================================================================================================

//#====================================================================================================
//======================================  FUNCIONES PARA MOSTRAR EL POPUP ==========================
//#====================================================================================================

//VENTANA EMERGENTE PARA AGREGAR UN NUEVO HORARIO
function popup_horarios_agregar()
{
  $('#cmb_docxsal_a option').remove();
  $('#cmb_cursoxsal_a option').remove();
  $('#cmb_cursoxsal_a').append('<option value="0">CURSO</option>');
  cargar_docentes('');
  $('#cmb_docxsal_a').attr("disabled", false);
  $('#cmb_cursoxsal_a').attr("disabled", false);
  $('#cmb_dia_a').attr("disabled", false);
  $('#popupbox_Agregar_horario').dialog({

    title: "Agregar Horario",
    modal: true,
    width: 500,
    height: 300,
    draggable:true,
    position: ["center",100],
    closeOnEscape : "true",
    buttons: 
          {
            "Agregar": function() 
            { 
              if($("#cmb_docxsal_a").val()!='0')//1
              {
                document.getElementById("cmb_docxsal_a").style.border="";
                if($("#cmb_cursoxsal_a").val()!='0')//2
                {
                  document.getElementById("cmb_cursoxsal_a").style.border="";
                  if($("#cmb_dia_a").val()!='0')//3
                  {
                    document.getElementById("cmb_dia_a").style.border="";
                    horaReal=new Array();
                    horaReal=calcularHora($("#cmb_hora_fin_a").val(),$("#cmb_hora_inicio_a").val());
                     ///////////////////////para validar el horario
                      if(horaReal[1]>=45)//preguntamos si los minutos son igual a una hora lectiva
                      {
                        document.getElementById("cmb_hora_inicio_a").style.border="";
                        document.getElementById("cmb_hora_fin_a").style.border="";
                        regHorario();//actualizar horarios/////////////////
                        $( this ).dialog( "close" );
                        cargar_horario_salon();

                      }
                      else if(horaReal[0]>=1)
                      {
                        document.getElementById("cmb_hora_inicio_a").style.border="";
                        document.getElementById("cmb_hora_fin_a").style.border="";
                        regHorario();//regsitrar horarios/////////////////
                        $( this ).dialog( "close" );
                        cargar_horario_salon();
                      }
                      else
                      {
                        document.getElementById("cmb_hora_inicio_a").style.border="2px solid red";
                        document.getElementById("cmb_hora_fin_a").style.border="2px solid red";

                      }
                      /////////////////fin validar horario
                  }
                  else//3
                  {
                    document.getElementById("cmb_dia_a").style.border="2px solid red";

                  }

                }
                else//2
                {
                  document.getElementById("cmb_cursoxsal_a").style.border="2px solid red";

                }
              }
              else//1
              {
                document.getElementById("cmb_docxsal_a").style.border="2px solid red";

              }
            },
            "Cancelar": function() 
            {
              $( this ).dialog( "close" );
              ocultar();
              document.getElementById("cmb_hora_inicio_a").style.border="2px solid red";
              document.getElementById("cmb_hora_fin_a").style.border="2px solid red";
            }
          },
        close: function() { 
          document.getElementById("cmb_hora_inicio_a").style.border="2px solid red";
          document.getElementById("cmb_hora_fin_a").style.border="2px solid red";
          ocultar();
         }        
    });    
}
//FIN VENTANA EMERGENTE PARA AGREGAR UN NUEVO HORARIO

///////////////VENTANA EMERGENTE PARA UPDATE UN HORARIO EXISTENTE
function popup_horarios_update(estadoHora,perId,curso,codHorario,dia,inicio,fin)
{  
  cargar_docentes(perId);
  $('#cmb_docxsal_u').val(perId); 
  cargar_curxdoc(curso,perId);
  $('#cmb_dia_u').val(dia);
  $('#cmb_hora_inicio_u').val(inicio);
  $('#cmb_hora_fin_u').val(fin);

  $('#cmb_docxsal_u option').remove();
  $('#cmb_cursoxsal_u option').remove();
  $('#cmb_cursoxsal_u').append('<option value="0">CURSO</option>');

  //condicional para las ventanas
  if(estadoHora=='1')//esta habilitado
  {
    $('#cmb_hora_inicio_u').removeAttr('disabled','');
    $('#cmb_hora_fin_u').removeAttr('disabled','');//habilita los controles
      //"Deshabilitar"
      ////////////////////VENTANA DE DIALOGO si estado es habilitado//////////////////////////////////////////////////

    $('#popupbox_update_horario').dialog({

      title: "Actualizar / Deshabilitar / Eliminar Horario",
      modal: true,
      width: 500,
      height: 300,
      draggable:true,
      position: ["center",100],
      closeOnEscape : "true",
      buttons: 
            {//inicia buttons
             "Actualizar": function() //inicia actualizar
              { 
                if($("#cmb_docxsal_u").val()!='0')//1
                {
                  document.getElementById("cmb_docxsal_u").style.border="";
                  if($("#cmb_cursoxsal_u").val()!='0')//2
                  {
                    document.getElementById("cmb_cursoxsal_u").style.border="";
                    if($("#cmb_dia_u").val()!='0')//3
                    {
                      document.getElementById("cmb_dia_u").style.border="";
                      horaReal=new Array();
                      horaReal=calcularHora($("#cmb_hora_fin_u").val(),$("#cmb_hora_inicio_u").val());
                      ///////////////////////para validar el horario
                      if(horaReal[1]>=45)//preguntamos si los minutos son igual a una hora lectiva
                      {
                        document.getElementById("cmb_hora_inicio_u").style.border="";
                        document.getElementById("cmb_hora_fin_u").style.border="";
                        editHorario(codHorario);//actualizar horarios/////////////////
                        $( this ).dialog( "close" );
                        cargar_horario_salon();

                      }
                      else if(horaReal[0]>=1)
                      {
                        document.getElementById("cmb_hora_inicio_u").style.border="";
                        document.getElementById("cmb_hora_fin_u").style.border="";
                        editHorario(codHorario);//actualizar horarios/////////////////
                        $( this ).dialog( "close" );
                        cargar_horario_salon();
                      }
                      else
                      {
                        document.getElementById("cmb_hora_inicio_u").style.border="2px solid red";
                        document.getElementById("cmb_hora_fin_u").style.border="2px solid red";

                      }
                      /////////////////fin validar horario
                      
                    }
                    else//3
                    {
                      document.getElementById("cmb_dia_u").style.border="2px solid red";

                    }
                  }
                  else//2
                  {
                    document.getElementById("cmb_cursoxsal_u").style.border="2px solid red";

                  }
                }
                else//1
                {
                  document.getElementById("cmb_docxsal_u").style.border="2px solid red";

                }
              },
              "Deshabilitar": function() 
              {
                deshabilitarHorario(curso,dia,estadoHora);
              },
              "Eliminar":function()
              {
                //llamar a una ventana popput de eliminar
                eliminarHorario(codHorario)

              },
              "Cancel":function()
              {
                document.getElementById("cmb_hora_inicio_u").style.border="";
                document.getElementById("cmb_hora_fin_u").style.border="";
                $( this ).dialog( "close" );
                ocultar();
              }
            },
          close: function() {
            document.getElementById("cmb_hora_inicio_u").style.border="";
            document.getElementById("cmb_hora_fin_u").style.border="";
            ocultar();
           }        
      }); 
  ////////////////FIN VENTANA DIALOGO/////////////////////////////////   
  }
  else if(estadoHora=='0')//esta deshabilitado
  {
    $('#cmb_hora_inicio_u').attr('disabled','disabled');//deshabilita los controles
    $('#cmb_hora_fin_u').attr('disabled','disabled');

      //"Habilitar"
      $('#popupbox_update_horario').dialog({

      title: "Habilitar / Eliminar Horario",
      modal: true,
      width: 500,
      height: 300,
      draggable:true,
      position: ["center",100],
      closeOnEscape : "true",
      buttons: 
            {//inicia buttons
              "Habilitar": function() 
              {
                deshabilitarHorario(curso,dia,estadoHora);
              },
              "Eliminar":function()
              {
                //llamar a una ventana popput de eliminar
                eliminarHorario(codHorario)

              },
              "Cancel":function()
              {
                $( this ).dialog( "close" );
                ocultar();
              }
            },
          close: function() { 
            ocultar();
           }        
      }); 
  ////////////////FIN VENTANA DIALOGO/////////////////////////////////   
  }

  ///fin condicional

}
//FIN VENTANA EMERGENTE PARA UPDATE UN HORARIO EXISTENTE

//esto es para mostrar el div de Agregar Horario
function ocultar() {
    $("#popupbox_minimizado").css("display", "block");
}
function mostrar() {
    $("#popupbox_minimizado").css("display", "none");
}

//#====================================================================================================
//====================================== FIN  =========================================================
//#====================================================================================================

//=====================================================================================================
//==========================VENTANAS DE CONFIRMACION POPUP=============================================
//=====================================================================================================

function eliminarHorario(codHorario)
{  
    $("#dialogConfirmElim").dialog({
        resizable: false,
        width:400,            
        modal: true,
        position: ["center",100],
        buttons: {
            'confirmar':function() 
            {
                elimHorario(codHorario);  
                $( this ).dialog( "close" );
                $("#popupbox_update_horario").dialog( "close" );              
                cargar_horario_salon();
            },
            Cancel:function() {
                $(this).dialog('close');
            }
        }
    });  
}

function deshabilitarHorario(curso,dia,estado)
{  
  if(estado=='0')
  {
    $("#dialogConfirmDesa").attr('title', 'Habilitar');
    document.getElementById('parrafoDes').innerHTML='Desea Habilitar este Registro?';

  }
  else if(estado=='1')
  {
    $("#dialogConfirmDesa").attr('title', 'Deshabilitar');
    document.getElementById('parrafoDes').innerHTML='Desea deshabilitar este Registro?';
  }

    $("#dialogConfirmDesa").dialog({
        resizable: false,
        width:400,            
        modal: true,
        position: ["center",100],
        buttons: {
            'confirmar':function() 
            {
                desahorario(curso,dia,estado);    
                $( this ).dialog( "close" );
                $("#popupbox_update_horario").dialog( "close" ); 
                cargar_horario_salon();
            },
            Cancel:function() {
                $(this).dialog('close');
            }
        }
    });  
}

//#====================================================================================================
//====================================== REGISTRAR UPDATE DELETE DESHABILITAR =========================
//#====================================================================================================
function regHorario()
{   
    var params={};
    params['sed_id']=$("#cmb_sede").val();
    params['mac_id']=$("#cmb_modalidad").val();
    params['car_id']=$("#cmb_carrera").val(); 
    //params['anio_periodo']=$("#txtPeriodo").val();      
    params['nta_nivel']=$("#cmb_ciclo").val();
    params['nta_seccion']=$("#cmb_salon").val();      
    //params['pes_id']="2007B";//falta
      //jala los datos del popup registrar y/o insertar
    params['asi_id']=$("#cmb_cursoxsal_a").val();      
    params['n_dia_cod']=$("#cmb_dia_a").val();//el numero de dia que lleva el curso 1-->domingo     
    params['d_hor_ini_hora']=$("#cmb_hora_inicio_a").val();      
    params['d_hor_fin_hora']=$("#cmb_hora_fin_a").val();
    params['n_hor_dia']=1;     
    params['c_local']=$("#cmb_facultad").val();//local
    params['c_dni']=$("#cmb_docxsal_a").val();//dni docente
    

    
    $.ajax({
    data : params,
    type: "POST",
    url: "regHorario",
    dataType: "json",
    async: false,
    success : function(data) 
    {        
      aviso_bien("Operacion Realizada Correctamente");
      //aviso_bien("Mensaje! "+data['rpta']);
    },
    error: function() 
    {
        //aviso_mal("Error!...Datos No procesados");                
        location.reload();
    }
    });  
}
////////////funcion para actualizar el horario
function editHorario(codHorario)
{   
    var params={};
    params['n_hor_codigo']=codHorario;
    params['n_dia_cod']=$("#cmb_dia_u").val();//el numero de dia que lleva el curso 1-->domingo     
    params['d_hor_ini_hora']=$("#cmb_hora_inicio_u").val();      
    params['d_hor_fin_hora']=$("#cmb_hora_fin_u").val();

    $.ajax({
    data : params,
    type: "POST",
    url: "editarHorario",
    dataType: "json",
    async: false,
    success : function(data) 
    {        
      aviso_bien("Operacion Realizada Correctamente");
      //aviso_bien("Mensaje! "+data['rpta']);
    },
    error: function() 
    {
        //aviso_mal("Error!...Datos No procesados");                
        location.reload();
    }
    });  
}
/////////fin actualizar
function elimHorario(codHorario)
{  
    var params={};
    params['codHorario']=codHorario;
    alert(params['codHorario']);
    $.ajax({
    data : params,
    type: "POST",
    url: "delHorario",
    dataType: "json",
    success : function(data) 
    {        
      //alert(data['rpta']);
      aviso_bien("Se Eliminaron los registros Correctamente"); 
    },
    error: function() 
    {
      //aviso_mal("Error! no se Eliminaron los registros");                    
      location.reload();
    }
    });  
}
function desahorario(curso,dia,estado)//deshabilitar horario
{
    var params={};
    params['sed_id']=$("#cmb_sede").val();
    params['mac_id']=$("#cmb_modalidad").val();
    params['car_id']=$("#cmb_carrera").val();      
    params['nta_nivel']=$("#cmb_ciclo").val();
    params['nta_seccion']=$("#cmb_salon").val();      
    params['asi_id']=curso;    
    params['n_dia_cod']=dia;//el numero de dia que lleva el curso 1-->domingo     
    params['n_hor_dia']=1;
    params['estado_hora']=estado;
    $.ajax({
    data : params,
    type: "POST",
    url: "deshabHorario",
    dataType: "json",
    success : function(data) 
    {        
      aviso_bien("Operacion Realizada Correctamente");
    },
    error: function() 
    {
      //aviso_mal("Error! no se Cambiaron los datos");                    
      location.reload();
    }
    }); 
}
