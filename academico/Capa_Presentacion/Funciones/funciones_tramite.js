function validar_antes()
{ 
  
	  if($("#n_cod_tra").val()===undefined)
    {
        //aviso("Ingrese el código y dale Entre o click e Buscar","red","black");
        cajaColor("t_codigo","red");  
        return false;     
    }
    else 
    {      
      cajaColor("t_codigo","");  
      if($("#cmb_tramite_").val()=='0')
      {
          //aviso("Debe ingresar el trámite correspondiente...","red","black");
          cajaColor("cmb_tramite_","red");  
          return false;     
      }
      else
      {
        cajaColor("cmb_tramite_","");        
        if($("#i_refe").val()=='')
        {
            //aviso("Debe referencia o documento correspondiente...","red","black");
            cajaColor("i_refe","red");  
            return false;     
        }   
        else
        {
            return true;
        }
      }
    }


}

function validar_tramite(obj,sms)
{
  if($("#"+obj).val()=='')
    {
        aviso(sms,"red","black");
        cajaColor(obj,"red");  
        return false;     
    }
    else
    {
      return true;
    }
}


function buscar_tramite()
{
  
  if(validar_tramite("t_codigo","Debe ingresar el código"))
  {    
    var params={};
    params['cod']=$("#t_codigo").val();

    mostrarCargando();

    $.ajax({
        data :params,
        type: "GET",
        url: "buscar-alumno-cod",
        dataType: "json",
        success : function(data)
        {          
          if (data[0][0]=="No hay datos")
          {              
              aviso_adv("No hay datos");
          }
          else if(data[0][0]=="No Existe Registro")
          {
            aviso_adv(data[0][0]+' '+params['cod']);
            $('#d_busqueda').empty();
          }
          else
          { 
            $('#d_busqueda').empty();
            cadena="<div><input type='hidden' name='n_cod_tra' id='n_cod_tra' value='"+data[0][0]+"'/>"+data[0][0]+" | "+data[0][1]+" | "+data[0][2]+"</div><div>"+data[0][4]+"</div><div>"+data[0][3]+"</div>";
            $('#d_busqueda').append(cadena);
          }

          ocultarCargando();
        },
        error: function()
        {
          ocultarCargando();
          location.reload();
          //aviso_mal("Error al esperar Datos, comunicarse con el proveedor!");
          //alert("Error del Ajax");                    
        }

      }); 
  }	
}