//=================================================================================================================
//================================================ FUNCIONES DE APOYO =============================================
//=================================================================================================================
function validarPass()
{

    avisoLimpiar("txt_actualPass");
    avisoLimpiar("txt_nuevoPass");
    avisoLimpiar("txt_nuevoPass2");
    
    if($("#txt_actualPass").val()=='')
    {
        //aviso("Debe ingresar su contraseña actual...","red","black");
        cajaColor("txt_actualPass","red");
        notificacion(1,"!Debe ingresar contraseña actual!",'!Un momento! Usted no ha ingresado su contraseña actual, no se realizó el "Cambio de Contraseña".');
        return false;
    }
    else if($("#txt_nuevoPass").val()=='')
    {
        //aviso("Debe ingresar una contraseña nueva ...","red","black");
        cajaColor("txt_nuevoPass","red");
        notificacion(1,"!Debe ingresar nueva contraseña!",'!Un momento! Usted no ha ingresado su nueva contraseña, no se realizó el "Cambio de Contraseña".');
        return false;
    }
    else if($("#txt_nuevoPass").val()!=$("#txt_nuevoPass2").val())
    {
        //aviso("La nueva contraseña no coincide","red","black");
        cajaColor("txt_nuevoPass2","red");
        notificacion(1,"!Contraseñas no coinciden!",'!Un momento! Las contraseñas nuevas no coindicen, no se realizó el "Cambio de Contraseña".');
        return false;
    }
    else
    {
        return true;
    }
    
}

var cambiarcontrasenia_normal=function(continuar)
{
    if(validarPass())
    {
        mostrarCargando();

        var params={};
        params['actualPass']=$("#txt_actualPass").val();
        params['nuevoPass']=$("#txt_nuevoPass").val();      
    
        
        $.ajax({
        data : params,
        type: "POST",
        url: "ejecambiocontra",
        dataType: "json",
        success : function(data) 
        {        
          
          if (data["rpta"]==1) {
            notificacion(2,"¡Operación ejecutada correctamente!",'¡Muy bien! El cambio de contraseña se ha realizado satisfactoriamente.');
            /*$("#txt_actualPass").prop('disabled', true);
            $("#txt_nuevoPass").prop('disabled', true);
            $("#txt_nuevoPass2").prop('disabled', true);*/
            if(continuar)
            {
             $("#btn_continuar").show();   
             $("#btn_asigCarga").hide();
            }
          }
          else
          {
            notificacion(1,"!Datos incorrectos!",'!Un Momento! Su contraseña actual no es la correcta.');
          }

          ocultarCargando();
        },
        error: function() 
        {
            location.reload();
        }
        });  
    }
}

