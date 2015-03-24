 
  var listCombos=new Array();
    listCombos[0]="cmb_sede";
    listCombos[1]="cmb_modalidad";
    listCombos[2]="cmb_facultad";
    listCombos[3]="cmb_carrera";
    listCombos[4]="cmb_ciclo";
    listCombos[5]="cmb_salon";
  
  
  
  
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
  