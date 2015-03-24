//=================================================================================================================
//================================================ FUNCIONES SALONES ==============================================
//=================================================================================================================
//=================================================================================================================
     var v_ver_salones=function()
    {

        avisoLimpiar("cmb_facultad");
        avisoLimpiar("cmb_car_");
        avisoLimpiar("cmb_esp_");
        avisoLimpiar("cmb_sed_");
        avisoLimpiar("cmb_mod_");
        avisoLimpiar("sel_ciclo");

        //---------------------------------------------------------------------------
        if($("#cmb_facultad").val()!="0")
        {
            
            if($("#cmb_car_").val()!="0")
            {                
                if($("#cmb_esp_ option").length==1 ||($("#cmb_esp_ option").length>1 && $("#cmb_esp_").val()!="SX"))
                {                    
                    if($("#cmb_sed_").val()!="0")
                    {
                        if($("#cmb_mod_").val()!="0")
                        {
                            /*if($("#sel_ciclo").val()!="0")
                            {   */                           
                                aviso("","","");
                                return true;
                            /*}
                            else
                            {     
                                notificacion(1,"¡Advertencia!","Debe escoger un ciclo.",3);
                                cajaColor("sel_ciclo","red");                 
                            }*/
                        }
                        else
                        {     
                            notificacion(1,"¡Advertencia!","Debe escoger una modalidad.",3);
                            cajaColor("cmb_mod_","red");                 
                        }
                    }
                    else
                    {     
                        notificacion(1,"¡Advertencia!","Debe escoger una sede.",3);
                        cajaColor("cmb_sed_","red");                 
                    } 
                }
                else
                {     
                    notificacion(1,"¡Advertencia!","Debe escoger una especialidad.",3);
                    cajaColor("cmb_esp_","red");                 
                }                                
            }
            else
            {     
                notificacion(1,"¡Advertencia!","Debe escoger una carrera.",3);
                cajaColor("cmb_car_","red");                 
            }
        }
        else
        {   
            notificacion(1,"¡Advertencia!","Debe escoger una facultad.",3);
            cajaColor("cmb_facultad","red");         
        }
        //---------------------------------------------------------------------------
                
        return false;
    }


    var Cargando=function(idMostrar,idOcultar)
    {
        $("#"+idOcultar).hide();
        $("#"+idMostrar).show().css("display", "inline");        
    }
    
    $(function()
    {
    

    $("#cmb_facultad").change(function()
    {        
        cargar_carreras();
    });

    $("#cmb_car_").change(function()
    {
        dependencia_especialidad();
    });   

    // cargando combos -------------
    function cargar_carreras()
    {
        Cargando("cargando_carrera","cmb_car_");
        $('#cmb_car_').empty();
        document.getElementById("cmb_car_").options.length=0;
        $('#cmb_car_').append('<option value="0">CARRERA</option>');  

        var x=$("#cmb_facultad").val();
        $.get("carrera", { code: x }, function(resultado)
        {
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_car_').append(resultado);         
                    Cargando("cmb_car_","cargando_carrera");
                }
                else
                {
                    Cargando("cmb_car_","cargando_carrera");   
                }
            }

        }); 

        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>');         

    }
        
    function dependencia_especialidad()
    {        
        Cargando("cargando_especialidad","cmb_esp_");
        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>'); 

        var code = $("#cmb_car_").val();
        
        $.get("especialidad", { code: code },
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
                    $('#cmb_esp_').append(resultado);  
                    Cargando("cmb_esp_","cargando_especialidad");
                }
                else
                {
                    Cargando("cmb_esp_","cargando_especialidad");
                }
            }
        });
    }
});

function verexceldoc(opcion)
{

    if(v_ver_salones())
    {
        mostrarCargando();
        
        var params={};
        params['fac']=$("#cmb_facultad").val();  
        params['fac_x']=$("#cmb_facultad option:selected").text();
        params['car']=$("#cmb_car_").val(); 
        params['car_x']=$("#cmb_car_ option:selected").text();
        params['esp']=$("#cmb_esp_").val();    
        params['esp_x']=$("#cmb_esp_ option:selected").text();  
        params['sed']=$("#cmb_sed_").val(); 
        params['sed_x']=$("#cmb_sed_ option:selected").text();  
        params['mod']=$("#cmb_mod_").val();  
        params['mod_x']=$("#cmb_mod_ option:selected").text();    
        params['niv']=$("#sel_ciclo").val();
        params['niv_x']=$("#sel_ciclo option:selected").text();              
        params['excel_opcion']=opcion;      
        
        redirect_by_post("",params, false);
        ocultarCargando();
    }
}
