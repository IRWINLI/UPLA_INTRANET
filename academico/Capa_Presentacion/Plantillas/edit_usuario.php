<style type="text/css">
    form
    {
        padding: 12px 20px;
    }
    tr
    {
        text-align: left;
    }    
    td
    {
       width:200px;
    }
</style>
<div class="contenedor_cuerpo" style="padding-left: 93px;">
    <fieldset>
        <p class="titulo_modulo">EDITAR USUARIO</p>
        <div>
        <form id="form_editusu" name="form_editusu" action="editUsuario" method="POST">

            <input type="hidden" id="cant_filas_priv" name="cant_filas_priv" value="0" />
            <input type="hidden" id="cant_filas_sedmodfac" name="cant_filas_sedmodfac" value="0" />            
            <input type="hidden" id="cant_filas_catemuro" name="cant_filas_catemuro" value="0" />
            <input type="hidden" id="codigo_edit_usu_aux" name="codigo_edit_usu_aux" value="" />

                <table id="tabla_datosEstudiante">
                    <tr>
                        <td>Buscar código o Dni:</td>
                        <td>

                            <div class="form_busqueda">
                                 <input placeholder = 'Ingrese DNI del Docente' type="busqueda" name="dniusuario" id="dniusuario" maxlength="8"/>
                                 <!--button class="css_btn_buscar" id="btn_reg_est" onclick="buscarDocente();"/-->
                                 <div class="css_btn_buscar" onclick="buscar_act_usu();"></div>
                            </div>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            <HR width=100% align="center"> 
                        </td>
                    </tr>
                    <tr>
                        <td>Código o DNI:</td>
                        <td>
                            <input type="texto" id="codigo_edit_usu" name="codigo_edit_usu" maxlength="8" spellcheck="false" value="" placeholder="Codigo o DNI" style="background: rgb(233, 233, 233);" disabled="true"/>
                        </td>                        
                    </tr>
                    
                    <tr>
                        <td>Nombre:</td>
                        <td>
                            <input type="texto" id="nombre_edit_usu" name="nombre_edit_usu" spellcheck="false" value="" placeholder="Nombre(s)"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Ap. Paterno:</td>
                        <td>
                            <input type="texto" id="apP_edit_usu" name="apP_edit_usu" spellcheck="false" value="" placeholder="Apellido Paterno"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Ap. Materno:</td>
                        <td>
                            <input type="texto" id="apM_edit_usu" name="apM_edit_usu" spellcheck="false" value="" placeholder="Apellido Materno"/>
                        </td>
                    </tr>      

                    <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td>
                            <select class="detalle_" id="nac_priv_dia_edit" name="nac_priv_dia_edit" placeholder="DD" style="width:100px;">
                                <option value="0">DD</option>
                                <?php opciones_combo_numeros(1,31);?>                            
                            </select>/
                            <select class="detalle_" id="nac_priv_mes_edit" name="nac_priv_mes_edit" placeholder="MM" style="width:100px;">
                                <option value="0">MM</option>
                                <?php opciones_combo_numeros(1,12);?>                             
                            </select>/
                            <select class="detalle_" id="nac_priv_anio_edit" name="nac_priv_anio_edit" placeholder="AAAA" style="width:132px;">
                                <option value="0">AAAA</option>
                                <?php opciones_combo_numeros(1930,date("Y"));?>                                 
                            </select>
                            
                        </td>
                    </tr>            

                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <input type="texto" id="email_priv_edit" name="email_priv_edit" value="@"  placeholder="micorreo@dedonde.com" />
                        </td>
                    </tr>         

                    <tr>
                        <td>Dirección:</td>
                        <td>
                            <input type="texto" id="dir_priv_edit" name="dir_priv_edit" value="" placeholder="direccion - distrito"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Teléfono:</td>
                        <td>
                            <input type="texto" id="tel_priv_edit" name="tel_priv_edit" value="" placeholder="064-212122"/>
                        </td>
                    </tr> 

                    <tr>
                        <td>Celular:</td>
                        <td>
                            <input type="texto" id="cel_priv_edit" name="cel_priv_edit" value="" placeholder="97878787"/>
                        </td>
                    </tr>    
                  
                    <tr>
                        <td>sexo:</td>
                        <td>
                            <select class="detalle_" name="cmb_sexo_edit" id="cmb_sexo_edit" style="width:348px;">
                                <option value="">...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>                        
                        </td>
                    </tr>    

                    <tr>
                        <td>Estado civil:</td>
                        <td>
                        <?php 
                            $data=Logica::PA_UPLA("[seguridad].[paCon_EstCiv]","array");                        
                            combo($data,"id","detalle","cmb_ec_edit",'...','','detalle_','width:348px;');                                
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Dependencia:</td>
                        <td>
                        <?php                         
                             $data=Logica::PA_UPLA("[Academico].[paLis_sede_todo]","array");
                             combo($data,"id","detalle","cmb_sed_edit",'Sede.','','detalle_','width:113px;');           
                        ?>
                        <?php 
                            $data=Logica::PA_UPLA("[Academico].[paLis_modalidad_todo]","array");
                            combo($data,"id","detalle","cmb_mod_edit",'Modalidad','','detalle_','width:113px;');            
                        ?>
                        <?php 
                            $data=Logica::PA_UPLA("[seguridad].[paCon_Dep]","array");                        
                            combo($data,"id","detalle","cmb_ed_edit",'Facultad','','detalle_','width:113px;');            
                        ?>
                        <script>
                        
                            $("#cmb_ed_edit").change(function()
                            {                                 
                                var sed_=$("#cmb_sed_edit option:selected").html();
                                var mod_=$("#cmb_mod_edit option:selected").html();
                                var fac_=$("#cmb_ed_edit option:selected").html();

                                var sed=$("#cmb_sed_edit").val();
                                var mod=$("#cmb_mod_edit").val();
                                var fac=$("#cmb_ed_edit").val();

                                var it_=sed+mod+fac;

                                if($.inArray(it_,listadep) == -1)
                                {
                                    if(ver_dependencia())
                                    {
                                        tabla_add_sedmodfac(sed,sed_,mod,mod_,fac,fac_,'filas_sedmodfac','cant_filas_sedmodfac');  
                                        listadep.push(it_);        
                                    }                                                      
                                }
                                else
                                {
                                    notificacion(1,"¡Advertencia!","Ya agregó esta dependencia...");
                                }
                                                    
                            });
                        </script>                                                   
                        </td>
                    </tr>   
                    <tr>
                        <td></td>
                        <td>
                            <div class="CSSTableSimple">
                            <table style="width:345px;height:25px;">                                
                                <th>Sede</th>
                                <th>Mod.</th>                                            
                                <th>Fac.</th>                                                    
                                <tbody id="filas_sedmodfac">                        
                                </tbody>
                            </table>
                        </div>
                        </td>
                    </tr>                         
                    <tr>
                        <td>Privilegios:</td>
                        <td>                        
                        <?php 
                            $data=Logica::PA_UPLA("[seguridad].[PaCon_Sistemas]","array");                        
                            combo($data,"id","detalle","cmb_sistemas_edit","Seleccione Sistema...","","detalle_","width:170px;");                        
                        ?>
                        <script>                            
                            $("#cmb_sistemas_edit").change(function()
                            {      
                                var num=$(this).val();

                                $.get("lista_priv", {sis:num} ,function(resultado)
                                {
                                    if(resultado == false)
                                    {
                                        $('#cmb_priv_edit').empty();
                                        $('#cmb_priv_edit').append("Sin privilegios...");  
                                    }
                                    else
                                    {
                                        $('#cmb_priv_edit').empty();
                                        $('#cmb_priv_edit').append(resultado);                                     
                                    }
                                });
                                
                            });
                        </script>
                        <select name="cmb_priv_edit" id ="cmb_priv_edit" class="detalle_" style="width:170px;">                     
                        </select>
                            <script>                            
                                $("#cmb_priv_edit").change(function()
                                { 
                                    var val_priv=$("#cmb_priv_edit option:selected").html();
                                    var val_sist=$("#cmb_sistemas_edit option:selected").html();
                                    var val_sis_priv=$(this).val();
                                    
                                    if($.inArray(val_sis_priv,listaprivi) == -1)
                                    {
                                        if($(this).val()!='0')
                                        tabla_add_priv(val_sis_priv,val_sist,val_priv,'list_privilegios','cant_filas_priv');                            
                                        listaprivi.push(val_sis_priv);    
                                    }
                                    else
                                    {
                                        notificacion(1,"¡Advertencia!","Ya agregó este privilegio..");
                                    }
                               
                                });
                            </script>                               
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="CSSTableSimple">
                                <table style="width:345px;height:25px;">                                
                                    <th>Sistema</th>
                                    <th>Rol</th>                    
                                    <tbody id="list_privilegios">                        
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Categoria en Muro:</td>
                        <td>
                        <input type="hidden" id="liscatmuro_edit" val=""/>
                        <?php                         
                             $data=Logica::PA_UPLA("[seguridad].[paCon_catmuro]","array");
                             combo($data,"id","detalle","cmb_catmuro_edit",'categorias...','','detalle_','width:348px;');           
                        ?>                        
                        <script>                        
                            $("#cmb_catmuro_edit").change(function()
                            {                      
                                var valcatmuro=$(this).val();
                                var textcatmuro=$("#cmb_catmuro_edit option:selected").html();
                                
                                if($.inArray(valcatmuro,liscatmuro) == -1)
                                {
                                    tabla_add_catmuro(valcatmuro,textcatmuro,'filas_catemuro','cant_filas_catemuro');                      
                                    liscatmuro.push(valcatmuro);    
                                }
                                else
                                {
                                    notificacion(1,"¡Advertencia!","Ya agregó esta categoría...");
                                }
                                
                            });
                        </script>                                                   
                        </td>
                    </tr>   
                    <tr>
                        <td></td>
                        <td>
                            <div class="CSSTableSimple">
                            <table style="width:345px;height:25px;">                                
                                <th>Categoría</th>
                                <tbody id="filas_catemuro">                        
                                </tbody>
                            </table>
                        </div>
                        </td>
                    </tr>             
                    <tr>
                    <td>Activo:</td>
                    <td>
                        <input type="texto" id="activo_edit" name="activo_edit" disabled="true" style="background: rgb(233, 233, 233);"/>
                    </td>
                </tr>
                </table>                
        </form>  
        
        <HR width=100% align="center"> 
                    
        <button class="css_btn" onclick="if(v_edit_usu()){$('#form_editusu').submit();}" id="btn_edit_usu" style="position: relative;left:20px;">Actualizar</button>         
        <button class="css_btn" onclick="eliminarusuario('1');" id="btn_edit_usu" style="position: relative;left:20px;">Eliminar</button> 
        <button class="css_btn" onclick="eliminarusuario('0');" id="btn_edit_usu" style="position: relative;left:20px;">Act/Des</button> 
        <button class="css_btn" onclick="alerta('En desarrollo...','Mensaje');" id="btn_edit_usu" style="position: relative;left:20px;">Estadisitcas</button> 
        </div>
    </fieldset>
</div>






