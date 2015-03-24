<input type="hidden" id="cod_originalDoc" name="cod_originalDoc" value="" />
<input type="hidden" id="cant_filas_ref" name="cant_filas_ref" value="0" />

    <div class="contenedor_cuerpo" name="dv_regpro" id="dv_regpro" style="text-align:-webkit-center">      

          
        <fieldset>
            <p class="titulo_modulo">REGISTRO DE SITUACIÓN EDUCATIVA</p>
            <p class="css_mod_parrafo" text-align:left;">Es necesario que registre su pre-grado.</p>  
                <table>                    
                    <tr>
                        <td>Registro:</td>
                        <td>                        
                            <input class="detalle_" type="text" id="registro_i" name="registro_i" style="width:330px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>A.- Tipo grado:</td>
                        <td>                        
                            <select class="detalle_" id='tipog_i' name='tipog_i' style="width:330px;">
                            <?php 
                                $data=Logica::PA_UPLA("paCon_tipogrado","array","",false,"DBPERSONAL");                        
                                opciones_combo($data,"id","detalle",'elegir');    
                            ?>   
                            </select>                                                         
                        </td>
                    </tr>

                    <tr>
                        <td>B.- Descripción de Grado:</td>
                        <td>
                            <textarea class="detalle_" type="text" id="desgra_i" name="desgra_i" style="width:330px; height:90px;" onkeyUp="return cambiarMay(this);"></textarea> 
                        </td>
                    </tr>

                    <!--tr>
                        <td>Grado Activo:</td>
                        <td>
                            <input type="checkbox" name="chech_act" id="chech_act"  checked>
                        </td>
                    </tr-->                                      
                    <tr>
                        <td>C
                        .- ¿Estudió en una Inst. Edu. del Perú?</td>
                        <td>
                            <div id="d_sino"><input type="radio" name="peru_rec" id="siperu_rec" value="1">Si<input type="radio" name="peru_rec" id="noperu_rec" value="0">No</div>
                            <script type="text/javascript">
                                $("#noperu_rec").click(function () 
                                {  
                                    $("#cmb_insedu").val("0");        
                                    $("#cmb_nomisedu").val("0");
                                    $("#cmb_carr").val("0");
                                    $("#cmb_insedu").prop('disabled', true);  
                                    $("#cmb_nomisedu").prop('disabled', true);  
                                    $("#cmb_carr").prop('disabled', true);  
                                    aviso_bien("No es necesario rellanar F,G,H.");
                                    alerta("si estudió en el extranjero, no es necesario rellanar los Items F,G,H.");
                                    //$("#cmb_carr").val(""); 
                                  
                                });
                                $("#siperu_rec").click(function () 
                                {  
                                    $('#cmb_forsup').val("0");
                                    aviso("","","");
                                    //$("#cmb_carr").val(""); 
                                  
                                });
                            </script>
                        </td>                    
                    </tr>      
                     <tr>
                        <td>D.- ¿Régimen de la Instución Educativa?</td>
                        <td>
                            <div id="d_sino"><input type="radio" name="reg_rec" id="sireg_rec" value="1">Pública<input type="radio" name="reg_rec" id="noreg_rec" value="2">Privada</div>                            
                            <script type="text/javascript">
                                $("#noreg_rec").click(function () 
                                {  
                                    $("#cmb_insedu").val("0");        
                                    $("#cmb_nomisedu").val("0");
                                    $("#cmb_carr").val("0");
                                    $("#cmb_insedu").prop('disabled', true);  
                                    $("#cmb_nomisedu").prop('disabled', true);  
                                    $("#cmb_carr").prop('disabled', true);  
                                    $('#cmb_forsup').val("0");
                                    aviso("","","");
                                    //$("#cmb_carr").val(""); 
                                  
                                });
                                $("#sireg_rec").click(function () 
                                {  
                                    $("#cmb_insedu").val("0");        
                                    $("#cmb_nomisedu").val("0");
                                    $("#cmb_carr").val("0");
                                    $("#cmb_insedu").prop('disabled', true);  
                                    $("#cmb_nomisedu").prop('disabled', true);  
                                    $("#cmb_carr").prop('disabled', true);  
                                    $('#cmb_forsup').val("0");
                                    aviso("","","");
                                    //$("#cmb_carr").val(""); 
                                  
                                });
                            </script>
                        </td>                    
                    </tr>              
                     <tr>
                        <td>E.- Formación Superior Completa</td>
                        <td>                        
                            <select class="detalle_" id='cmb_forsup' name='cmb_forsup' style="width:330px;">
                            <?php 
                                $data=Logica::PA_UPLA("paCon_formasupe","array","",false,"DBPERSONAL");                        
                                opciones_combo($data,"id","detalle",'elegir');    
                            ?>   
                            </select>      
                            <script type="text/javascript">
                                $("#cmb_forsup").click(function () 
                                {
                                    //alert($("#cmb_forsup").val());
                                    if($("#cmb_forsup").val()!="0" && $('input:radio[name=peru_rec]:checked').val()=="1")
                                    {
                                        $.get("opctipins", { codsis: $("#cmb_forsup").val()} ,function(resultado)
                                        { 
                                        
                                            $("#cmb_nomisedu").prop('disabled', true);     
                                            $("#cmb_carr").prop('disabled', true);
                                        
                                            $('#cmb_nomisedu').empty();
                                            $('#cmb_carr').empty();
                                        
                                            if(resultado != false)
                                            {          
                                                $("#cmb_insedu").prop('disabled', false);
                                                $('#cmb_insedu').empty();
                                                $('#cmb_insedu').append(resultado);                                     
                                            }

                                        });
                                    }
                                    else
                                    {
                                        $("#cmb_insedu").prop('disabled', true);                                        
                                        $("#cmb_nomisedu").prop('disabled', true);     
                                        $("#cmb_carr").prop('disabled', true);

                                        $('#cmb_insedu').empty();
                                        $('#cmb_nomisedu').empty();
                                        $('#cmb_carr').empty();
                                    }
                                });
                            </script>                                                   
                        </td>
                    </tr>
                    <tr>
                        <td>F.- Tipo de Institución Educativa:</td>
                        <td>                        
                            <select class="detalle_" id='cmb_insedu' name='cmb_insedu' style="width:330px;">                            
                            </select>                                                                                                              
                        </td>
                    </tr>                   

                    <tr>
                        <td>G.- Nombre de la Institución Educativa:</td>
                        <td>
                            <select class="detalle_" id='cmb_nomisedu' name='cmb_nomisedu' style="width:330px;">
                            </select>                            
                            <script type="text/javascript">
                                $("#cmb_insedu").click(function () 
                                {    
                                    
                                    if($("#cmb_insedu").val()!='0' && $("#cmb_insedu").val() != null && $('input:radio[name=peru_rec]:checked').val()=="1" /*&& $('input:radio[name=reg_rec]:checked').val()!==undefined*/)
                                    {                                        
                                        $.get("opcnomins", 
                                        { 
                                            codtip: $("#cmb_insedu").val(),
                                            codperu: $('input:radio[name=peru_rec]:checked').val(),
                                            codreg: $('input:radio[name=reg_rec]:checked').val()
                                        } ,function(resultado)
                                        {
                                            $("#cmb_carr").prop('disabled', true);                                           
                                            $('#cmb_carr').empty();

                                            if(resultado != false)
                                            {
                                                $("#cmb_nomisedu").prop('disabled', false);
                                                $('#cmb_nomisedu').empty();
                                                $('#cmb_nomisedu').append(resultado);                                     
                                            }
                                        });    
                                    }
                                    else
                                    {
                                        
                                        $("#cmb_nomisedu").prop('disabled', true);
                                        $('#cmb_nomisedu').empty();

                                        $("#cmb_carr").prop('disabled', true);                                           
                                        $('#cmb_carr').empty();
                                    }
                                    
                                });
                            </script>      
                        </td>
                    </tr>
                    <tr>
                        <td>H.- Carrera:</td>
                        <td>
                            <select class="detalle_" id='cmb_carr' name='cmb_carr' style="width:330px;">                            
                            </select>   
                            <script type="text/javascript">
                                $("#cmb_nomisedu").click(function () 
                                {    
                                        //alert($("#cmb_nomisedu").val());            
                                        if($("#cmb_nomisedu").val()!='0')
                                        {
                                            $.get("opcnominscarr", 
                                            { 
                                                codins: $("#cmb_nomisedu").val()
                                            } ,function(resultado)
                                            {                                            
                                                if(resultado != false)
                                                {                
                                                    $("#cmb_carr").prop('disabled', false);  
                                                    $('#cmb_carr').empty();                                                
                                                    $('#cmb_carr').append(resultado);                                     
                                                }
                                            });    
                                        }
                                        else
                                        {
                                            $("#cmb_carr").prop('disabled', true);  
                                            $('#cmb_carr').empty();                
                                        }
                                    
                                    
                                });
                            </script>      
                        
                        </td>
                    </tr>
                    <tr>
                        <td>I.- Año de Egreso:</td>
                        <td>
                            <input class="detalle_" type="text" id="fecegre_i" name="fecegre_i" style="width:330px;" onkeyUp="return ValNumero(this);"  maxlength="4" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>                            
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <button class="css_btn" id="btn_reg_doc" onclick="regsituedu();">Registrar</button>                
                            <button class="css_btn" id="btn_act_doc" onclick="actsituedu();">Actualizar</button>                
                            <button class="css_btn" id="btn_nue_doc" onclick="nuevoreg();">Nuevo</button>                
                        </td>
                    </tr>
                </table>


                
            
        </fieldset>
        
    </div>    

    <div class="contenedor_cuerpo" >   

            <input type="hidden" name="cant_filas_gytpersonal" id="cant_filas_gytpersonal" value="0"/>

            <div class="CSSTableSimple" width="500">
                <table  align="center">
                    <th>ELIMINAR</th>
                    <th>IMPRIMIR</th>
                    <th>NUM.</th>
                    <th>DNI</th>
                    <th>GRADO</th>
                    <th>DESC.GRADO</th>
                    <th>PERU/EXT.</th>
                    <th>REGIMEN</th>
                    <th>FORMACIÓN SUPERIOR</th>
                    <th>TIPO INSTITUCIÓN</th>
                    <th>INSTITUCIÓN</th>
                    <th>CARRERA</th>
                    <th>AÑO</th>                    
                    <tbody id="list_regpersonal_">
                    </tbody>
                </table>    
            </div>
        
    </div>
    
    <div id="popupbox_situaca" style="display:none;"></div>
    