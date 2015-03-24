
<div class="contenedor_cuerpo" style="width:732px;padding-left: 218px;">
    <fieldset id="field_filtrohorarios" style="min-width: 670px;">
        <p class="titulo_modulo">EXPORTAR CAPACIDAD DE HORARIOS POR SECCIÓN</p>

        <label name="l_dequien" id="l_dequien"></label><br>        
        <div>
            <select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:174px;">
                <option value="0">FACULTAD</option>
                <?php
                $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
                $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
                opciones_combo($data,"id","detalle");
                ?>              
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 132px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_carrera'");?>
            <select class="detalle_" name="cmb_car_" id="cmb_car_" style="width:200px;">
                <option value="0">CARRERA</option>               
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 107px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_especialidad'");?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:216px;">
                <option value="SX">SIN ESPECIALIDAD</option>               
            </select>
        </div>
        <div>            
            <select class="detalle_" name="cmb_sed_" id="cmb_sed_" style="width:174px;">                
                <?php
                $xml_x="<Dato><usuario>".$_SESSION['dni']."</usuario></Dato>";
                $data=Logica::PA_UPLA("[general].[paCon_sede]","array",$xml_x);              
                opciones_combo($data,"id","detalle","SEDE");
                ?>             
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 132px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_modalidad'");?>
            <select class="detalle_" name="cmb_mod_" id="cmb_mod_" style="width:200px;">                                           
                <option value="0">MODALIDAD</option>  
            </select>
            <script type="text/javascript">
            
                $("#cmb_sed_").change(function(){
                    Cargando("cargando_modalidad","cmb_mod_");
                    var codsede;
                    if((codsede=$(this).val())!='0')
                    {                        
                        $.get("modalidades_usu", {sede:codsede} ,function(resultado)
                        {
                          if($.trim(resultado)=='salir')
                          {
                              location.reload();
                          }
                          else
                          {
                              if(resultado != false)            
                              { 
                                $("#cmb_mod_").empty();                                
                                $("#cmb_mod_").append(resultado);
                                Cargando("cmb_mod_","cargando_modalidad");
                              }
                              else
                              {
                                Cargando("cmb_mod_","cargando_modalidad");
                              }
                          }
                        });
                    }
                    else
                    {
                        $("#cmb_mod_").empty();
                        $("#cmb_mod_").append('<option value="0">MODALIDAD</option>');
                    }

                });
            </script>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="sel_ciclo" id="sel_ciclo" style="width:214px;">
                <option value="0">TODOS LOS CICLOS</option>
                <option value="01">I</option>
                <option value="02">II</option>
                <option value="03">III</option>
                <option value="04">IV</option>
                <option value="05">V</option>
                <option value="06">VI</option>
                <option value="07">VII</option>
                <option value="08" >VIII</option>
                <option value="09">IX</option>
                <option value="10">X</option>
                <option value="11">XI</option>
                <option value="12">XII</option>                
            </select>   
        </div>
        <br>
        <DIV style="text-align:center;">
        <button class="css_btn" onclick="verexceldoc('excel_rptcaphor');" style="width: 296px;height: 83PX;font-size: 17px;"><?php set_imagen_style("descargar.png","style='height: 49px;margin: -12 9 -10;'"); ?>EXPORTAR CAPACIDAD POR SALONES</button>
        |
        <button class="css_btn" onclick="verexceldoc('excel_rptcalummatri');" style="width: 296px;height: 83PX;font-size: 17px;"><?php set_imagen_style("iconos_alu.png","style='height: 49px;margin: -12 9 -10;'"); ?>EXPORTAR ALUMNOS MATRICULADOS</button>
        </DIV>
        
    </fieldset>
</div>