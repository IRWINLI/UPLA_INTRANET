<div class="contenedor_cuerpo" >
    <fieldset>
        <p class="titulo_modulo">COMPROBANTE DE PAGO</p>
        <label>Usted ha realizado satisfactoriamente su "Pago de Matrícula", sin embargo, por medidas de seguridad es necesario que
            ingrese el código de su Comprobante de Pago de la siguiente manera:</label><br><br>
        <div class="datos_del_Estudiante" style="">
            <input type="texto" id="codigoComprobante" name="codigoComprobante"  onkeyUp="return ValNumero(this);" spellcheck="false" value="" placeholder="Código de Comprobante (Sólo Números)"/>
            <input type="submit" class="css_btn" id="btn_Comprobar"  onclick="compr_comprobante()" value="COMPROBAR"/><br>
            <input type="submit" class="css_btn" id="btn_Continuar"  onclick="continuarComprob()" value="CONTINUAR" style="display:none;margin-top: -30px;"/>
        </div><br>
        <label>Los que pagaron en AGENTES del Banco Continental, comunicarse con su facultad, para indicarles como ingresar el código de Comprobante. Ojo sólo los del que pagaron en AGENTE.
       </label>
        <?php set_imagen("mod_matricula/comprobantesPago_completo_5.jpg","",900)?>
        
    </fieldset>

</div>



<script>
    
    function compr_comprobante() {
        mostrarCargando();
        var comprobanteEscrito = $("#codigoComprobante").val();
        
        
        
        var params={};

        params['comprobante']=comprobanteEscrito;
        
        //mostrarCargando();//========= Mostrar "Cargando"
                        
        $.ajax({
            data : params,
            type: "POST",
            url: "verificarComprobantePago",
            dataType: "json",
            success : function(data){
                
                
                
                if (data['rpta']==1) {
                    ocultar_notificacion();
                    continuarComprob();
                    
                    //notificacion(2,"Comprobante Verificado","¡Muy Bien! El comprobante ha sido verificado y es el correcto. Puede continuar con el proceso de matrícula.");
                    //$("#codigoComprobante").prop('disabled', true);
                    //$("#codigoComprobante").css('display', "none");
                    //$("#btn_Comprobar").css('display', "none");
                    //$("#btn_Continuar").css('display', "block");
                    //continuarComprob();
                }
                else
                {
                    notificacion(1,"Comprobante Incorrecto","Lo sentimos, el comprobante ingresado no es el correcto, por favor vuelva a intentarlo.",8);
                }
                ocultarCargando();
            }
            ,error: function()
            {
                location.reload();
                //alert("Error de Sistema: JSON");					
            }
        });
    }
        
        
        
        
        
        
        
        
 
        
        
        

    
    function continuarComprob() {
        var params={};
        params['comprobante']="comprobante_verficado";
        redirect_by_post("matriculaPlanEstudios",params, false);
    }

</script>









