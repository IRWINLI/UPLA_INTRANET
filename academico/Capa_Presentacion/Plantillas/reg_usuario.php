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
<div class="contenedor_cuerpo" style="padding-left: 169px;">
    <fieldset>
        <p class="titulo_modulo">REGISTRAR DE USUARIO</p>
        <div>
        <form id="form_regusu" name="form_regusu" action="regUsuario" method="POST">
            <input type="hidden" id="cant_filas_priv" name="cant_filas_priv" value="0" />
            <input type="hidden" id="cant_filas_sedmodfac" name="cant_filas_sedmodfac" value="0" />            
            <input type="hidden" id="cant_filas_catemuro" name="cant_filas_catemuro" value="0" />
                <table id="tabla_datosEstudiante">
                    <tr>
                        <td>Código o DNI:</td>
                        <td>

                            <input type="texto" id="codigo_reg_usu" name="codigo_reg_usu" maxlength="8" spellcheck="false" value="" placeholder="Codigo o DNI"/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Nombre:</td>
                        <td>
                            <input type="texto" id="nombre_reg_usu" name="nombre_reg_usu" spellcheck="false" value="" placeholder="Nombre(s)"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Ap. Paterno:</td>
                        <td>
                            <input type="texto" id="apP_reg_usu" name="apP_reg_usu" spellcheck="false" value="" placeholder="Apellido Paterno"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Ap. Materno:</td>
                        <td>
                            <input type="texto" id="apM_reg_usu" name="apM_reg_usu" spellcheck="false" value="" placeholder="Apellido Materno"/>
                        </td>
                    </tr>      

                    <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td>
                            <select class="detalle_" id="nac_priv_dia" name="nac_priv_dia" placeholder="DD" style="width:100px;">
                                <option value="">DD</option>
                                <?php opciones_combo_numeros(1,31);?>                            
                            </select>/
                            <select class="detalle_" id="nac_priv_mes" name="nac_priv_mes" placeholder="MM" style="width:100px;">
                                <option value="">MM</option>
                                <?php opciones_combo_numeros(1,12);?>                             
                            </select>/
                            <select class="detalle_" id="nac_priv_anio" name="nac_priv_anio" placeholder="AAAA" style="width:132px;">
                                <option value="">AAAA</option>
                                <?php opciones_combo_numeros(1930,date("Y"));?>                                 
                            </select>
                            
                        </td>
                    </tr>            

                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <input type="texto" id="email_priv" name="email_priv" value="@"  placeholder="micorreo@dedonde.com" />
                        </td>
                    </tr>         

                    <tr>
                        <td>Dirección:</td>
                        <td>
                            <input type="texto" id="dir_priv" name="dir_priv" value="" placeholder="direccion - distrito"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Teléfono:</td>
                        <td>
                            <input type="texto" id="tel_priv" name="tel_priv" value="" placeholder="064-212122"/>
                        </td>
                    </tr> 

                    <tr>
                        <td>Celular:</td>
                        <td>
                            <input type="texto" id="cel_priv" name="cel_priv" value="" placeholder="97878787"/>
                        </td>
                    </tr>    

                    <tr>
                        <td>Contraseña:</td>
                        <td>
                            <input type="password" id="clave_reg_usu" name="clave_reg_usu" spellcheck="false" value="" placeholder="Contraseña" maxlength="20"/>
                        </td>
                    </tr>     


                    <tr>
                        <td>Contraseña:</td>
                        <td>
                            <input class="detalle_" type="password" id="clave_reg_usu_2" name="clave_reg_usu_2" spellcheck="false" value="" placeholder="Contraseña" maxlength="20"/>
                        </td>
                    </tr>      

                    <tr>
                        <td>sexo:</td>
                        <td>
                            <select class="detalle_" name="cmb_sexo" id="cmb_sexo" style="width:348px;">
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
                            combo($data,"id","detalle","cmb_ec",'...','','detalle_','width:348px;');                                
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Dependencia:</td>
                        <td>
                        <?php                         
                             $data=Logica::PA_UPLA("[Academico].[paLis_sede_todo]","array");
                             combo($data,"id","detalle","cmb_sed",'Sede.','','detalle_','width:113px;');           
                        ?>
                        <?php 
                            $data=Logica::PA_UPLA("[Academico].[paLis_modalidad_todo]","array");
                            combo($data,"id","detalle","cmb_mod",'Modalidad','','detalle_','width:113px;');            
                        ?>
                        <?php 
                            $data=Logica::PA_UPLA("[seguridad].[paCon_Dep]","array");                        
                            combo($data,"id","detalle","cmb_ed",'Facultad','','detalle_','width:113px;');            
                        ?>
                        <script>
                        listadep=[];
                            $("#cmb_ed").change(function()
                            { 
                                
                                var sed_=$("#cmb_sed option:selected").html();
                                var mod_=$("#cmb_mod option:selected").html();
                                var fac_=$("#cmb_ed option:selected").html();

                                var sed=$("#cmb_sed").val();
                                var mod=$("#cmb_mod").val();
                                var fac=$("#cmb_ed").val();

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
                            combo($data,"id","detalle","cmb_sistemas","Seleccione Sistema...","","detalle_","width:170px;");                        
                        ?>
                        <script>                            
                            $("#cmb_sistemas").change(function()
                            {      
                                var num=$("#cmb_sistemas").val();

                                $.get("lista_priv", {sis:num} ,function(resultado)
                                {
                                    if(resultado == false)
                                    {
                                        $('#cmb_priv').empty();
                                        $('#cmb_priv').append("Sin privilegios...");  
                                    }
                                    else
                                    {
                                        $('#cmb_priv').empty();
                                        $('#cmb_priv').append(resultado);                                     
                                    }
                                });
                                
                            });
                        </script>
                        <select name="cmb_priv" id ="cmb_priv" class="detalle_" style="width:170px;">                     
                        </select>
                            <script>
                            listaprivi=[];
                                $("#cmb_priv").change(function()
                                { 
                                    var val_priv=$("#cmb_priv option:selected").html();
                                    var val_sist=$("#cmb_sistemas option:selected").html();
                                    var val_sis_priv=$("#cmb_priv").val();
                                    
                                    if($.inArray(val_sis_priv,listaprivi) == -1)
                                    {
                                        if($("#cmb_priv").val()!='0')
                                        tabla_add_priv(val_sis_priv,val_sist,val_priv,'list_privilegios','cant_filas_priv','priv_');                            
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
                        <input type="hidden" id="liscatmuro" val=""/>
                        <?php                         
                             $data=Logica::PA_UPLA("[seguridad].[paCon_catmuro]","array");
                             combo($data,"id","detalle","cmb_catmuro",'categorias...','','detalle_','width:348px;');           
                        ?>                        
                        <script>
                        liscatmuro=[];
                            $("#cmb_catmuro").change(function()
                            {                      
                                var valcatmuro=$(this).val();
                                var textcatmuro=$("#cmb_catmuro option:selected").html();
                                
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
                </table>
        </form>  
        <HR width=100% align="center"> 
        <button class="css_btn" onclick="if(v_reg_usu()){$('#form_regusu').submit();}" id="btn_reg_usu" style="position: relative;left:20px;">Registrar</button> 
        </div>
    </fieldset>
</div>
