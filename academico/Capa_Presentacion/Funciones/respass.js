    
function res_paw_usu()
{
    if(v_res_paw_usu())
    {
        params={};        
        params.dni=$("#codigo_reg_usu").val();
         mostrarCargando();
             $.ajax({
                data : params,
                type: "POST",
                url: "restaurarpass",
                dataType: "json",
                success : function(data)
                {
                    switch(data["rpta"])
                    {
                        case "0":notificacion(0,"¡Error al realizar la operación!.","El Código o DNI ingresado no fue encontrado en la Base de Datos. La restauración de contraseña no fue realizada.");break;
                        case "1":notificacion(2,"¡Operación realizada correctamente!.","¡Muy bien! La restauración de contraseña fue realizada de manera satisfactoria.");break; 
                        case "2":notificacion(1,"¡Operación cancelada!.","¡Advertencia! Usted no tiene permiso para restaurar la contraseña de este estudiante.");break; 
                    }                                              
                    ocultarCargando();                    
                }
                ,error: function()
                {
                    //aviso_mal("restaurar pass no puedo realizarse!");                                        
                    ocultarCargando();
                    location.reload();
                }
            });
    }            
}

function v_res_paw_usu()
{
    if($("#codigo_reg_usu").val()!='')
    {
        document.getElementById("codigo_reg_usu").style.border="";
        return true;
    }

    notificacion(0,'¡Error al realizar la operación!','¡Un momento! Usted no ha ingresado el "Código" o "DNI" del Usuario. La restauración de contraseña no fue realizada.');
    document.getElementById("codigo_reg_usu").style.border="2px solid red";

    return false;
}
