    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro" style="text-align:-webkit-center;"PER    >       
        <fieldset>
            <legend>Ingresar Docente con huella capturada</legend>
            <div>
                 <input placeholder = 'Ingrese DNI del Docente' type="text" name="v_dni" id="v_dni" onkeyUp="return ValNumero(this);" maxlength="8"/>
                 <br><br>
                 <label id='lbl_foto'>116-</label><input placeholder = 'Ingrese #Foto' type="text" name="v_foto" id="v_foto" maxlength="4" onkeyUp="return ValNumero(this);" style="width:270px"; />
                <br><br>
                <select class="detalle_" name="cmb_sed" id="cmb_sed" style="width:300px;" >
			   <option value="00">SELECCIONE SEDE</option> 
			   <option value="HU">HUANCAYO</option>
                </select>                 
                <br><br>
                <select class="detalle_" name="cmb_mod" id="cmb_mod" style="width:300px;" >
			   <option value="00">SELECCIONE MODALIDAD</option> 
			   <option value="01">PRESENCIAL</option>
                           <option value="06">DISTANCIA</option>
                </select>                 
                <br><br>
                <select class="detalle_" name="cmb_fac" id="cmb_fac" style="width:300px;" >
			   <option value="00">SELECCIONE FACULTAD</option> 
			   <option value="01">FAC. INGENIERÍA</option>
                           <option value="02">FAC. CIENCIAS ADMINISTRATIVAS Y CONTRABLES</option>
                           <option value="03">FAC. DERECHO Y CIENCIAS POLÍTICAS</option>
                           <option value="04">FAC. EDUCACIÓN Y CIENCIAS HUMANAS</option>
                           <option value="05">FAC. CIENCIAS DE LA SALUD</option>
                </select>                 
                <br><br>                

                 
                 <button class="button button-flat-primary" id="btn_reg_est" onclick="insertarDocente();">Ingresar</button>
            </div>
            </fieldset>
    </div>
    
    <script>
        
    function insertarDocente(){
        var dni = $('#v_dni').val();
        var foto = $('#lbl_foto').text()+$('#v_foto').val();
        var sede = $('#cmb_sed').val();
        var modalidad = $('#cmb_mod').val();
        var facultad = $('#cmb_fac').val();
        

        
        if (dni.length!=8){
            alerta("El DNI no ha sido ingresado de manera correcta.","Alerta!!");
        }
        else if (foto.length!=8) {
            alerta("El número de FOTO no ha sido ingresada de manera correcta.","Alerta!!");
        }
        
        else if (sede=='00') {
            alerta("El número de SEDE no ha sido ingresada de manera correcta.","Alerta!!");
        }
        
        else if (modalidad=='00') {
            alerta("El número de MODALIDAD no ha sido ingresada de manera correcta.","Alerta!!");
        }
        
        else if (facultad=='00') {
            alerta("El número de FACULTAD no ha sido ingresada de manera correcta.","Alerta!!");
        }
        
        else{
           
                var params={};
                params['v_dni']=dni;
                params['v_foto']=foto;
                params['v_sede']=sede;
                params['v_modalidad']=modalidad;
                params['v_facultad']=facultad;
                
                $.ajax({
                    data : params,
                    type: "POST",
                    url: "insertDocConHuella",
                    dataType: "json",
                    success : function(data){
                                    
                        ocultarCargando();//========= Mostrar "Cargando"
                        //alert(data[0]);
                        if (data['rpta'].substring(0, 23)=="Insertado Correctamente"){
                            
                            aviso(data['rpta'],"white","green");
                        }
                        else{
                            aviso(data['rpta'],"white","red");
                        }
                        $('#v_dni').val("");
                        $('#v_foto').val("");
                        $('#cmb_sed').val("00");
                        $('#cmb_mod').val("00");
                        $('#cmb_fac').val("00");            
                    }
                    ,error: function()
                    {
                        //alert("Error de Sistema: JSON");
                        location.reload();					
                    }
                });
            
        }
        
    }
    </script>  
