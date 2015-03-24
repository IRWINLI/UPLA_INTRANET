
<?php set_imagenLazy("login/fondo2.jpg","id='todo'"); ?>

<div id="gen">
  <div id="capa_1log">
  <div><?php set_imagenLazy("login/escudo2.png","style='widht:65px;height:55px;'"); ?></div>
  INTRANET
  </div>
  <div id="capa_2log">
    <form novalidate id="gaia_loginform" action="login" method="POST">
      <?php
        //################################################################   
            //variables de sesion
            add_vS("color1","#105372");  
            add_vS("color2","#0B3B52");
            add_vS("sistema","0");
            add_vS("letra","");
        //################################################################
        //################################################################
            //crea variables de Session, para datos de usuario
            $val_vS="dni,nomape,sexo,banner,fotoperfil,correo,celular,telefono,colorinterfaz1,colorinterfaz2,posibanner,fnacusuario,carrera";
            setDatosUsuarios($val_vS);
        //################################################################
      ?> 

      <div class="alrededor">
        <input class="ingresos" type="usuario" id="usuario" name="usuario" spellcheck="false" onFocus=""  value="" maxlength="8" placeholder="Ingresar Usuario"/>    
      </div>
      
      <div class="alrededor">
        <input class="ingresos" type="password" id="contrasena" name="contrasena" placeholder="Ingresar Contraseña"/>
      </div>  
      <hr/>

      <div class="alrededor">
        <?php
          $error=null;
          if ($_SESSION[vS_ContadorErrados]>=n_intentos_captcha)
          {     
          echo '<br>';
          echo '<br>';
          echo recaptcha_get_html(captcha_public_key, $error);                        
          }
        ?>                                         
        <!--input type="submit" class="boton" id="nuevoEstudiante_FaCarEsp" onclick="asignarCaptcha();" value="Ingresar"--> 
        <input type="submit" class="boton" id="nuevoEstudiante_FaCarEsp" value="Ingresar"> 
      </div>        
    </form>
  </div>
  <div class="mensajez" id="mensajex">  
  </div>
</div>
<script type="text/javascript">
  $("img").lazyload({
          effect:"fadeIn",
          placeholder:"Capa_Presentacion/Recursos/img_cargando.gif",
          threshold:100
          });        
        
</script>
