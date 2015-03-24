<form name="form1" enctype="multipart/form-data" method="post" class="actimagen" action="regtramite">
<input type="hidden" id="cod_originalDoc" name="cod_originalDoc" value="" />
<input type="hidden" id="cant_filas_tra" name="cant_filas_tra" value="0" />


    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro">       
        <fieldset>
            <legend>Trámites</legend>        
            <div class="datos_del_Estudiante">      
                <table>
                    <!--tr>
                        <td>Expediente</td>
                        <td>
                            <input class="detalle_" type="text" id="exp_tra" name="exp_tra" onkeyUp="return cambiarMay(this);" style="width:341PX;text-align:center;" disabled="true" value="NUEVO"/>
                        </td>
                    </tr-->
                     <tr>
                        <td>Código de Alumno</td>
                        <td>
                            <input class="detalle_" type="text" id="exp_cod" name="exp_cod" onkeyUp="return cambiarMay(this);" onkeypress="if (event.keyCode == 13) event.returnValue = false;" maxlength="7" style="width:341PX;text-align:center;" tabindex="1"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Modificación</td>
                        <td>                        
                            <!--select class="detalle_" id='mod_tra' name='mod_tra' style="width:250PX;text-align:center;" tabindex="2"-->
                            <select class="detalle_" id='mod_tra' name='mod_tra' style="width:341PX;text-align:center;" tabindex="2" >
                            <?php 
                                $data=Logica::PA_UPLA("[General].[paCon_modificacion]","array","",false);                        
                                opciones_combo($data,"id","detalle","elegir");    
                            ?>   
                            </select>                             
                             <!-- #
                             <input class="detalle_" type="text" id="numtip_i" name="numtip_i" style="width:92px;"/-->
                              <!--| 
                            <input class="button button-flat-primary" type="button" name="btn_tipodoc" id="btn_tipodoc" value="Ag.Mod." onclick="vertipo();" /-->
                            
                        </td>
                    </tr>              
                    <tr>
                        <td>Justificación</td>
                        <td>                        
                            <textarea class="detalle_" type="text" id="jus_tra" name="jus_tra" style="width:342PX; height:81px;" tabindex="3" onkeypress="if (event.keyCode == 13) event.returnValue = false;"></textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <td colspan="2">
                            <HR width=100% align="center"> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Puede subir archivos que tengan un peso menor igual a 10MB.
                        </td>
                    </tr>
                    <tr>
                        <td>Archivos Adjuntos</td>
                        <td>
                            <input type="file" id="add_tra" name="add_tra" style="width:250px;background-color:white;" tabindex="4"/>                            
                              | 
                                <!--?php set_imagen('agregar.png','30px','30px')?-->
                            <input class="button button-flat-primary" type="Submit" name="btn_SUBIR" id="btn_SUBIR" placeholder="Nombre" value="Subir"/>                                                        
                            <script type="text/javascript">
                                //<![CDATA[
                                    
                                $('#add_tra').bind('change', function() {
                                var size=0;
                                if(window.File && window.FileReader && window.FileList && window.Blob){
                                //alert(this.files[0].size + ' bytes');
                                size=this.files[0].size;
                                }else{
                                // IE
                                    var Fs = new ActiveXObject("Scripting.FileSystemObject");
                                    var ruta = document.upload.file.value;
                                    var archivo = Fs.getFile(ruta);
                                    size = archivo.size;
                                    //alert(size + " bytes");
                                }
                                
                                if(size>10485760)
                                {
                                    alerta("El archivo pesa más de 10 MB, eliga otro.");
                                    $('#add_tra').val("");
                                }
                                 
                                });
                            
                                 
                                //]]>
                            </script>
                            <br>                                                 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <HR width=100% align="center"> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="477" border="0"> 
                                <th>NOMBRE DEL ARCHIVO</th>            
                                <th colspan="2">ACCIÓN</th>                                                                                                                                                                                                                                      
                                <tbody id="filas_tra">                        
                                </tbody>
                            </table>                            
                        </td>
                    </tr>
                    <!--tr>
                        <td>Estado</td>
                        <td>                      
                            <select class="detalle_" id='est_tra' name='est_tra' style="width:341px;" tabindex="5">
                            <?php 
                                $data=Logica::PA_UPLA("[General].[paCon_accionesTram]","array","",false);                        
                                opciones_combo($data,"id","detalle","");                         
                            ?>   
                            </select>                            
                             <!--#
                             <input class="detalle_" type="text" id="numref_i" name="numref_i" style="width:92px;"/>
                              | 
                            <input class="button button-flat-primary" type="button" name="btn_agregarEst" id="btn_agregarEst" onclick="regest();" value="Ag.estado" /-->                            
                        <!--/td>
                    </tr>
                    <tr>
                        <td>Observación</td>                    
                        <td>                        
                            <textarea class="detalle_" type="text" id="obs_tra" name="obs_tra" style="width:341PX; height:110px;" tabindex="6"></textarea>
                        </td>
                    </tr-->                    
                </table>
                <br>
                </form>      
                <!--button class="button button-flat-primary" id="btn_act_doc" onclick="actdocumento();">Actualiz.</button-->
                <input type="button" class="button button-flat-primary" id="btn_reg_doc" onclick="regdocumento();" value="Registrar" />
                <!--button class="button button-flat-primary" id="btn_eli_doc" onclick="elidocumento();">Eliminar</button-->
                <!--input type="button" class="button button-flat-primary" id="btn_reg_limp" onclick="limpiarreg();" value="Limpiar"/-->
            </div>
        </fieldset>
    </div>  

