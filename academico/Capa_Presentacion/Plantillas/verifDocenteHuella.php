    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro">       
        <fieldset>
            <legend>Verificar Captura de Huella Dactilar - Docentes </legend>
            <div>
                 <input placeholder = 'Ingrese DNI del Docente' type="text" name="dniDocente" id="dniDocente" onkeyUp="return ValNumero(this);" maxlength="8"/>
                 <button class="button button-flat-primary" id="btn_reg_est" onclick="buscarDocente();">Buscar</button>
                 <br><br>
                 DNI: <label id="lbl_dni" style="font-weight: bolder">---</label><br>
                 Nombre: <label id="lbl_nombre" style="font-weight: bolder">---</label><br>
                 Facultad: <label id="lbl_facultad" style="font-weight: bolder">---</label><br>
                 Modalidad: <label id="lbl_modalidad" style="font-weight: bolder">---</label><br>
                 Sede: <label id="lbl_sede" style="font-weight: bolder">---</label><br>
                 Registro de Huella: <label id="lbl_regHuella" style="font-weight: bolder">---</label><br>
            </div>
            </fieldset>
    </div>
    
    <script>
        
        function buscarDocente() {
            var dniDoc = $("#dniDocente").val();
        
            if (dniDoc.length!=8){
                alerta("El DNI no ha sido ingresado de manera correcta","Alerta!!");
            }
            
            else
            {
                var params={};
                params['v_dni']=dniDoc;
                
                $.ajax({
                    data : params,
                    type: "GET",
                    url: "consultarHuella",
                    dataType: "json",
                    success : function(data){
                                    
                        ocultarCargando();//========= Mostrar "Cargando"
                        //alert(data[0]);
                        if (data[0]!="DNI no encontrado"){
                            $("#lbl_dni").text(data[0][0]);
                            $("#lbl_nombre").text(data[0][1]);
                            $("#lbl_facultad").text(data[0][4]);
                            $("#lbl_modalidad").text(data[0][3]);
                            $("#lbl_sede").text(data[0][2]);
                            
                            if (data[0][5]==1) {
                                $("#lbl_regHuella").text("HUELLA DACTILAR REGISTRADA");
                                $("#lbl_regHuella").css("color","blue");
                            }
                            else{
                                $("#lbl_regHuella").text("HUELLA DACTILAR NO REGISTRADA");
                                $("#lbl_regHuella").css("color","Red");
                            }
                            
                        
                            
                            
                        }
                        else{
                            alerta("No se encontraron datos","Alerta!!");
                            $("#lbl_dni").text("---");
                            $("#lbl_nombre").text("---");
                            $("#lbl_facultad").text("---");
                            $("#lbl_modalidad").text("---");
                            $("#lbl_sede").text("---");
                            $("#lbl_regHuella").text("---");
                            $("#lbl_regHuella").css("color","black");
                        }
                                        
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
