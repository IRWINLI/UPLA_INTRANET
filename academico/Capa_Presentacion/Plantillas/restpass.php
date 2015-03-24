    <div class="contenedor_cuerpo" style="padding-left: 93px;">
        <fieldset>
        <p class="titulo_modulo">RESTAURAR CONTRASEÑA DE ALUMNOS</p>
        <!-- ######## Formulario que muestra datos del estudiante seleccionado ######## -->
        <div style="float: right; padding-right: 90px;" class="datos_del_Estudiante">
          <label>Código o DNI:</label><br>
          <input type="texto" id="codigo_reg_usu" name="codigo_reg_usu" maxlength="8" spellcheck="false" value="" placeholder="Ingrese Codigo o DNI"/><br>
          <input type="button" class="css_btn" id="btn_asigCarga" onclick="res_paw_usu()" value="RESTABLECER"/>
        </div>
        <div style="padding-top:6px;padding-left: 30px;">
            <?php set_imagen("/modulos_intranet/restaurar_contrasena.png","100","100") ;?>
        </div>
      </fieldset>
    </div>
