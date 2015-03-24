<?php
function imagen_estado($n_8)
{
    $ima="";
    if($n_8==1){$ima=set_imagen("esperando.gif",50,80);}
    else if($n_8==4){$ima=set_imagen("observado.gif",40,40);}
    else if($n_8==3){$ima=set_imagen("bien.png",50,60);}
    else if($n_8==6){$ima=set_imagen("anulado.png",40,40);}    
    return $ima;
}
?>
<form name="form2" enctype="multipart/form-data" method="post" class="actimagen" action="regtramite-adm">

<input type="hidden" id="cod_originalDoc" name="cod_originalDoc" value="" />
<input type="hidden" id="cant_filas_tra" name="cant_filas_tra" value="0" />
<input type="hidden" id="filas_eliminadas" name="filas_eliminadas" value="" />
<input type="hidden" id="codigo" name="codigo" value="" />
<input type="hidden" id="cod_alum2" name="cod_alum2" value="" />
<input type="hidden" id="codmod" name="codmod" value="" />
<input type="hidden" id="justi" name="justi" value="" />
<input type="hidden" id="accion" name="accion" value="" />            
<input type="hidden" id="remi" name="remi" value="" />            
<input type="hidden" id="obs" name="obs" value="" />

<input type="hidden" id="tmp_filas_eliminadas" name="tmp_filas_eliminadas" value=" " />      
<input type="hidden" id="subidos" name="subidos" value="" />      
            

<input class="detalle_" type="hidden" id="exp_tra" name="exp_tra" />
<input class="detalle_" type="hidden" id="remi_tra" name="remi_tra" />
    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro">       
        <fieldset>
            <legend><?php  echo imagen_estado($_POST['accion'])?> | Trámite</legend>        
            <div class="datos_del_Estudiante">      
                <table>
                    <!--tr>
                        <td>Expediente</td>
                        <td>
                            <input class="detalle_" type="hidden" id="exp_tra" name="exp_tra" onkeyUp="return cambiarMay(this);" style="width:341PX;text-align:center;" disabled="true" value="NUEVO"/>
                        </td>
                    </tr-->
                     <tr>
                        <td>Código de Alumno</td>
                        <td>
                            <input class="detalle_" type="text" id="exp_cod" name="exp_cod" onkeyUp="return cambiarMay(this);" maxlength="7" style="width:341PX;text-align:center;" tabindex="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Modificación</td>
                        <td>                        
                            <!--select class="detalle_" id='mod_tra' name='mod_tra' style="width:250PX;text-align:center;" tabindex="2" disabled="true"-->
                            <select class="detalle_" id='mod_tra' name='mod_tra' style="width:341PX;text-align:center;" tabindex="2" >
                            <?php 
                                $data=Logica::PA_UPLA("[General].[paCon_modificacion]","array","",false);                        
                                opciones_combo($data,"id","detalle","elegir");    
                            ?>   
                            </select>                             
                             
                             <!--input class="detalle_" type="text" id="modtra_i" name="modtra_i" style="width:341px;text-align:center;" disabled="true" /-->
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
                        </td>
                    </tr>
                    <tr>
                        <td>Inf. Adicional</td>                    
                        <td>                        
                            <textarea class="detalle_" type="text" id="obs_tra" name="obs_tra" style="width:341PX; height:110px;" tabindex="6" onkeypress="if (event.keyCode == 13) event.returnValue = false;">Ninguna.</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <HR width=100% align="center"> 
                        </td>
                    </tr>
                    <tr>
                        <td>Archivos Adjuntos</td>
                        <td>
                            <input type="file" id="add_tra" name="add_tra" style="width:250px;background-color:white;" tabindex="4"/>                            
                              |                         
                            <!--input class="button button-flat-primary" type="button" name="btn_SUBIR" id="btn_SUBIR" onclick="agregar_ref();" placeholder="Nombre" value="Subir"/-->                            
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
                                       
                </table>
                <br>
            <div>
                <!--button class="button button-flat-primary" id="btn_act_doc" onclick="actdocumento();">Actualiz.</button-->                
                <input type="button" class="button button-flat-primary" id="btn_reg_doc" onclick="actdocumento();" value="Enviar" />
                <!--button class="button button-flat-primary" id="btn_eli_doc" onclick="elidocumento();">Eliminar</button-->
                
            </div>

            </div>
        </fieldset>
    </div>
</form>