<div class="contenedor_cuerpo" style="padding-left: 93px;padding-top: 177px;"> 
    <!--form name="frm_cc" id="frm_cc" action="ejecambiocontra" method="POST"-->
        <fieldset>
            <p class="titulo_modulo">CAMBIAR CONTRASEÑA</p>

            <input type="hidden" id="val_cookie" name="val_cookie" maxlength="8" spellcheck="false" value="<?php echo $_SESSION[vS_Cookie] ?>"/>
                <div style="float: right">
                    <label>Contraseña Actual:</label><br>
                    <input type="password" id="txt_actualPass" name="txt_actualPass" spellcheck="false" value="" placeholder="Contraseña actual" />
                    <br>
                    
                    <label>Nueva Contraseña:</label><br>
                    <input type="password" id="txt_nuevoPass" name="txt_nuevoPass" spellcheck="false" value="" placeholder="Nueva contraseña" />
                    <br>
                
                    <label>Comprobación Contraseña:</label><br>
                    <input type="password" id="txt_nuevoPass2" name="txt_nuevoPass2" spellcheck="false" value="" placeholder="Confirme nueva contraseña" />
                    <br><br>
                    <input type="submit" class="css_btn" id="btn_asigCarga" onclick="cambiarcontrasenia_normal()" value="Cambiar"/>
                </div>
                <div style="padding-top:20px;padding-left: 30px;">
                    <?php set_imagen("/modulos_intranet/cambiar_contrasena.jpg","200","200") ;?>
                </div>


</fieldset>
</div>



