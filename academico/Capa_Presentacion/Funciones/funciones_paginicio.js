function reg_post()
{
    

        ocultar_notificacion();
        var params={};

        //guaradar en el servidor de archivos
          //con la confimacion devuelve la ruta:          
        //guardar en la base de datos

        params['dependencia-publicar']=$("#dependencia-publicar").val();
        params['donde-publicar-muro']=$("#donde-publicar-muro").val();  
        params['titulo-muro']=$("#titulo-muro").val();  
        params['recurso-muro']=$("#recurso-muro").val();          
        var ruta="";
        switch($("#recurso-muro").val())
        {
          case 'img':ruta='';/*$("#add_ima_muro").val();*/break;
          case 'vid':ruta=$("#video-nove-muro").val();break;
        }
        params['ruta']=ruta.split("&")[0]; 
        params['cuerpo']=$("#texto_intro").val().replace('<', '').replace('>', '');         
    
        //alert(params['dependencia-publicar']);
        //alert(params['donde-publicar-muro']);
        //alert(params['titulo-muro']);
        //alert(params['recurso-muro']);
        //alert(params['ruta']);
        //alert(params['cuerpo']);

        //mostrarCargando();         
        
        $.ajax({
            data : params,
            type: 'POST',
            url: 'publicar-reg-muro',
            dataType: "json",
            success : function(data)
            {                
              switch(data["rpta"])
              {
                case '0':notificacion(0,"¡No es posible continuar!","¡Ocurrio un error!, se cancelo la transacción vuelva a intentarlo.");break;
                case '2':
                  notificacion(2,"¡Correcto!","El registro se realizó de manera correcta.",3);
                  publicar_muro_nuevo();
                  limpiar();
                break;
              }               
              //ocultarCargando();  
              
            }
            ,error: function()
            {
                //aviso("registrarUsuario no puedo realizarse!");                                        
                ocultarCargando();
                location.reload();
                
            }
        });        
    
}


function v_reg_post()
{
    
    eva=true;

    avisoLimpiar("dependencia-publicar");  
    avisoLimpiar("donde-publicar-muro");  
    avisoLimpiar("titulo-muro");  
    avisoLimpiar("recurso-muro");  
    avisoLimpiar("add_ima_muro");  
    avisoLimpiar("video-nove-muro");  
    avisoLimpiar("texto_intro");  
        /*switch($("#recurso-muro").val())
        {
          case 'img':$("#add_ima_muro").val();break;
          case 'vid':ruta=$("#video-nove-muro").val();break;
        }*/

    if($("#dependencia-publicar").val()!='0')
    {     
      //avisoLimpiar("exp_cod");  

      if($.trim($("#titulo-muro").val())!='')
      {
        var llave=false;
        switch($("#recurso-muro").val())
        {
          case 'img':
            if($("#eligioimg").val()!='0')
            {     
              llave=true;
            }             
            else
            {
              cajaColor("add_ima_muro","red"); 
              notificacion(1,"¡Faltan datos!","Debe elegir una imagen para su publicación.");
            }
          break;
          case 'vid':
            if($.trim($("#video-nove-muro").val())!='')
            {     
              llave=true;
            }
            else
            {
              cajaColor("video-nove-muro","red"); 
              notificacion(1,"¡Faltan datos!","Debe pegar la url de un video para su publiación.");
            }   
          break;
        }

        if(llave)
        {     
          if($.trim($("#texto_intro").val())!='')
          {     
            eva=false;
            aviso("","","");
          }     
          else
          {
            cajaColor("texto_intro","red"); 
            notificacion(1,"¡Faltan datos!","Debe ingresar un contenido a su publicación.");
          }        
        }               
      }
      else
      {
        cajaColor("titulo-muro","red"); 
        notificacion(1,"¡Faltan datos!","Debe ingresar un título a su publicación.");
      }

    }
    else
    {
      cajaColor("dependencia-publicar","red"); 
      notificacion(1,"¡Faltan datos!","Debe elegir una dependecia, para poder filtrar las publicaciones.");
    }
    

    if(eva)
    {        
        return false;
    }

    return true;
}

function publicar_muro(fil,deq)
{
  var desdeaqui=''+(parseInt($("#ultimapublicacion").val())-1);  
  
  if(desdeaqui>0 && $("#semaforo").val()=="verde")
  {
    $("#semaforo").val("rojo");    
    $.get("cargar-muro", {arriba:"0",desde:desdeaqui,filtro:fil,dequien:deq} ,function(resultado)
    {                     
        if($.trim(resultado)=='salir')
        {
            location.reload();
        }
        else
        {
            if(resultado != false)            
            { 
                var cad='';                  
                $("#derecha-sub").append(resultado);                
                $("#semaforo").val("verde");         
            }
        }
    });
  }  
}

function publicar_novedad()
{
  $.get("cargar-novedad", {} ,function(resultado)
  {    
          
      if($.trim(resultado)=='salir')
      {
          location.reload();
      }
      else
      {
          if(resultado != false)            
          { 
              var cad='';                  
              $("#muro-novedades").append(resultado);
          }
      }
  });
}

function publicar_muro_nuevo()
{
  var desdeaqui=$("#primerapublicacion").val();

  $.get("cargar-muro", {arriba:"1",desde:desdeaqui} ,function(resultado)
  {    
          
      if($.trim(resultado)=='salir')
      {
          location.reload();
      }
      else
      {
          if(resultado != false)            
          { 
              var cad='';                  
              $("#derecha-sub").prepend(resultado);
          }
      }
  });
}

function limpiar()
{
  $("#dependencia-publicar").val("0");  
  $("#donde-publicar-muro").val("0");  
  $("#titulo-muro").val("");  
  $("#recurso-muro").val("img");  
  $("#add_ima_muro").val("");  
  $("#video-nove-muro").val("");  
  $("#texto_intro").val(""); 
  $("#video-nove").hide();
  $("#video-nove-muro").hide();  
  $("#previsu").hide();    
  $("#prevideo").hide();   
 
  $("#add_ima_muro").show();
  
  $("#caja_muro").slideToggle();  
}