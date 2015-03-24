function validar_antes()
{ 
  
	  if($("#n_cod_tra").val()===undefined)
    {
        aviso_adv("Debe ingresar el código...");
        cajaColor("t_codigo","red");  
        return false;     
    }
    else 
    {      
      cajaColor("t_codigo","#d9d9d9");
      aviso("","",""); 

      if($("#cmb_tipo").val()=='0')
      {
          aviso_adv("Debe escoger Motivo...");          
          cajaColor("cmb_tipo","red");  
          return false;     
      } 
      else
      {
        cajaColor("cmb_tipo","#d9d9d9");
        aviso("","",""); 
        if($("#doc_refe").val()=='')
        {
            aviso_adv("Debe rellenar el número de registro...");          
            cajaColor("doc_refe","red");  
            return false;     
        } 
        else
        {        
            cajaColor("doc_refe","#d9d9d9");  
            return true;     
        }
      }      
    }


}

function reg_amp_cred()
{
        var params={};
        params['cod']=$("#n_cod_tra").val();
        params['obs']=$("#ta_obs").val();
        params['cre']=$("#cmb_tipo").val();
        params['reg']=$("#doc_refe").val();

        mostrarCargando();

        $.ajax({
            data :params,
            type: "POST",
            url: "regampcred",
            dataType: "json",
            success : function(data)
            { 
              if(data["rpta"]=='1')
              aviso_bien($("#n_cod_tra").val()+"| Se registro correctamente.");              
              else
              aviso_mal(data["rpta"]);              
              
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
function ampliar()
{
  if(validar_antes())
  {        
        var params={};
        params['cod']=$("#n_cod_tra").val();

        mostrarCargando();

        $.ajax({
            data :params,
            type: "GET",
            url: "comprobarMatricula",
            dataType: "json",
            success : function(data)
            { 
              if (data[0][0]=="NO PAGO")
              {                        
                if(confirm('Este alumno no pago matrícula, desea continuar?'))
                {
                  reg_amp_cred();
                }
                else
                {
                  aviso_adv('Se cancelo la transacción');
                }                
              }
              else
              {
                reg_amp_cred();
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

function validar_tramite(obj,sms)
{
  if($("#"+obj).val()=='')
    {
        aviso_adv(sms);
        cajaColor(obj,"red");  
        return false;     
    }
    else
    {
        cajaColor(obj,"#d9d9d9");  
        return true;
    }
}


function buscar_ampli()
{
  
  if(validar_tramite("t_codigo","Debe ingresar el código"))
  {    
    var params={};
    params['cod']=$("#t_codigo").val();

    mostrarCargando();

    $.ajax({
        data :params,
        type: "GET",
        url: "buscar-alumno-academico",
        dataType: "json",
        success : function(data)
        {          
          
          if (data[0][0]=="No hay datos")
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