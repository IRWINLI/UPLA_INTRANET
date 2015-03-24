<style>
    body 
    {
        background: url('Capa_Presentacion/Recursos/fondo_login_1.jpg');        
    }

</style>
<input type="hidden" id="cod_originalDoc" name="cod_originalDoc" value="" />
<input type="hidden" id="cant_filas_ref" name="cant_filas_ref" value="0" />
    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro">       
        <fieldset style='min-width: 392px;background-color: rgba(255,255,255,0.5);'>
            <p class="titulo_modulo">Registro de Documentos</p>
            <!--legend>Registro de Documentos</legend-->        
                 
                <table>
                    <tr>
                        <td>Expediente</td>
                        <td>
                            <input class="detalle_" type="text" id="exp_i" name="exp_i" onkeyUp="return cambiarMay(this);" value="0" tabindex="1"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td>                        
                            <select class="detalle_" id='tipo_i' name='tipo_i' style="width:100px;font-size: 11px;" tabindex="2">
                            <?php 
                                $data=Logica::PA_UPLA("[reghisdoc].[paCon_tiposdocumentos]","array","",false,"dbTramDoc_SITD");                        
                                opciones_combo($data,"id","detalle");    
                            ?>   
                            </select>                             
                              #
                             <input class="detalle_" type="text" id="numtip_i" name="numtip_i" style="width:92px;" tabindex="3"/>
                              | 
                            <input class="button button-flat-primary" type="button" name="btn_tipodoc" id="btn_tipodoc" value="Ag.Tipos" onclick="vertipo();" />
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha Imp.</td>
                        <td>
                            <input class="detalle_" type="text" id="fecimp_i" name="fecimp_i" tabindex="4" />
                        </td>
                    </tr>
                    <tr>
                        <td>Pasa a</td>
                        <td>                        
                            <select class="detalle_" id='pasa_i' name='pasa_i' style="width:208px;font-size: 11px;" tabindex="5">
                            <?php 
                                $data=Logica::PA_UPLA("[reghisdoc].[paCon_dependencia]","array","",false,"dbTramDoc_SITD");                        
                                opciones_combo($data,"id","detalle",'elegir');                              
                            ?>   
                            </select>
                             | 
                            <input class="button button-flat-primary" type="button" name="btn_pasa" id="btn_pasa" value="Ag.Dep." onclick="regdep();" />
                        </td>
                    </tr>
                    <tr>
                        <td>Asunto</td>                    
                        <td>                        
                            <textarea class="detalle_" type="text" id="asu_ta" name="asu_ta" style="width:300px; height:110px;font-size: 11px;text-align: justify;" tabindex="6" ></textarea>
                        </td>
                    </tr>                    
                    <tr>
                        <td>Estado</td>
                        <td>                      
                            <select class="detalle_" id='cmb_estado' name='cmb_estado' style="width:100px;font-size: 11px;" tabindex="7">
                            <?php 
                                $data=Logica::PA_UPLA("[reghisdoc].[paCon_estado]","array","",false,"dbTramDoc_SITD");                        
                                opciones_combo($data,"id","detalle");                         
                            ?>   
                            </select>                            
                             #
                             <input class="detalle_" type="text" id="numref_i" name="numref_i" style="width:92px;" tabindex="8"/>
                              | 
                            <input class="button button-flat-primary" type="button" name="btn_agregarEst" id="btn_agregarEst" onclick="regest();" value="Ag.estado" />                            
                        </td>
                    </tr>
                    <tr>
                        <td>Referencia</td>
                        <td>
                           <input class="detalle_" type="text" id="ref_i" name="ref_i" style="width:209px;" onkeyUp="return cambiarMay(this);" tabindex="9"/>
                              | 
                                <!--?php set_imagen('agregar.png','30px','30px')?-->
                            <input class="button button-flat-primary" type="button" name="btn_agregarREF" id="btn_agregarREF" onclick="agregar_ref();" value="+"/>
                            <br>                     
                            <table width="300" border="0">                
                                                                
                                <th style='background:#A6A6A7;'>Referencia</th>                                                                                               
                                <tbody id="filas_ref">                        
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Estatuto</td>
                        <td>                      
                            <select class="detalle_" id='cmb_estatuto' name='cmb_estatuto' style="width:300px;font-size: 11px;" tabindex="10">
                            <?php 
                                $data=Logica::PA_UPLA("[reghisdoc].[paCon_estatuto]","array","",false,"dbTramDoc_SITD");                        
                                opciones_combo($data,"id","detalle",'elegir');                         
                            ?>   
                            </select>                                                        
                        </td>

                    </tr>                                      
                    <tr>
                        <td>Resumen</td>                    
                        <td>                        
                            <textarea class="detalle_" type="text" id="res_ta" name="res_ta" style="width:300px; height:100px;text-align: justify;font-size: 11px;" tabindex="11" >Sin Resumen.</textarea>
                        </td>
                    </tr>
                   
                </table>
                <br>

                <button class="button button-flat-primary" id="btn_act_doc" onclick="actdocumento();">Actualiz.</button>
                <button class="button button-flat-primary" id="btn_reg_doc" onclick="regdocumento();">Registrar</button>
	        <!--button class="button button-flat-primary" id="btn_eli_doc" onclick="elidocumento();">Eliminar</button-->
                <button class="button button-flat-primary" id="btn_reg_limp" onclick="limpiarregproducto();">Limpiar</button>

        </fieldset>
    </div>
    <div id="popupbox_regtip" style="display:none;">
            <fieldset>
                <p class="titulo_modulo">Registro de Documentos</p>
                    <table>
                        <tr>
                            <td>Tipo de Documento</td>
                            <td>
                                <input class="detalle_" type="text" id="tdoc_i_x" name="tdoc_i_x" onkeyUp="return cambiarMay(this);" style="width:200px;"/>
                                 | 
                                 <button class="button button-flat-primary" id="btn_reg_tipodoc" onclick="regTipoDoc();">Registrar</button>                
                            </td>
                        </tr>
                    </table>
            </fieldset>
    </div>
    <div id="popupbox_regdep" style="display:none;">
            <fieldset>
                <p class="titulo_modulo">Registro de Dependencia</p>                               
                    <table>
                        <tr>
                            <td>Dependencia</td>
                            <td>
                                <input class="detalle_" type="text" id="dep_i_x" name="dep_i_x" style="width:300px;"/>                                
                            </td>
                        </tr>
                        <!--tr>
                        <td>Tipo</td>
                        <td>                      
                            <select class="detalle_" id='cmb_tipo_dep' name='cmb_tipo_dep' style="width:300px;">
                                <?php 
                                    //$data=Logica::PA_UPLA("[reghisdoc].[paCon_tipodep]","array","",false,"dbTramDoc_SITD");                        
                                    //opciones_combo($data,"id","detalle",'...');                         
                                ?>   
                            </select>                                                         
                        </td>
                        </tr-->
                        <tr>
                            <td></td>
                            <td style="text-align:right;">                                
                                <button class="button button-flat-primary" id="btn_reg_dep" onclick="regdep_x();">Registrar</button>                
                            </td>
                        </tr>
                    </table>
            </fieldset>
    </div>
    <div id="popupbox_regest" style="display:none;">
            <fieldset>
                <p class="titulo_modulo">Registro de Estados</p>                               
                    <table>
                        <tr>
                            <td>Estado</td>
                            <td>
                                <input class="detalle_" type="text" id="est_i_x" name="est_i_x" onkeyUp="return cambiarMay(this);" style="width:200px;"/>
                                 | 
                                 <button class="button button-flat-primary" id="btn_reg_est" onclick="regest_x();">Registrar</button>                
                            </td>
                        </tr>
                    </table>
            </fieldset>
    </div>
