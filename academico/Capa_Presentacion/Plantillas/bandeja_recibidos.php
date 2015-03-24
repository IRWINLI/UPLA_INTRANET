<div class="contenedor_cuerpo">    

     <p class="titulo_módulo">RECIBIDOS</p>

        <div>            
            <select class="detalle_" id='cmb_estado' name='cmb_estado' style="width:150px;" >
            <?php 
                $data=Logica::PA_UPLA("[General].[paCon_accionesTram]","array","");                        
                opciones_combo($data,"id","detalle",'cualquier Estado...');                         
            ?>   
            </select>                                      
            <button class="button button-flat-primary"  name="btn_busseg" id="btn_busseg" onclick="buscar_recibidos();">Buscar</button>          
        </div>
        <br>
        <a href="#" class="mostrar" id="mostrar" style="text-align: right;">Busqueda Avanzada</a>
        <div class="caja" id="caja" style="text-align:-webkit-right">
            <div>
            <table>
                <tr>
                    <!--td rowspan="4"><?php set_imagen('banner_color.jpg','130','320');?></td-->
                    <td>Código del Alumno:</td>
                    <td><input class="detalle_" type="text" id="estid_i" name="estid_i" style="width:250px;" placeholder="Código del Alumno"/></td>
                </tr>
                <tr>
                    <td>Emisor:</td>
                    <td><input class="detalle_" type="text" id="emi_i" name="emi_i" style="width:250px;" placeholder="DNI del Emisor" /></td>
                </tr>
                <tr>
                    <td>Modificación:</td>
                    <td>
                        <select class="detalle_" id='cmb_modi' name='cmb_modi' style="width:250px;">
                        <?php 
                            $data=Logica::PA_UPLA("[General].[paCon_modificacion]","array","");                        
                            opciones_combo($data,"id","detalle",'cualquier Modificación...');                              
                        ?>   
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>
                        <input class="detalle_" type="text" name="f_ini_" id="f_ini_"  placeholder="AAAA-MM-DD" style="width:115px;" maxlength="10"/>
                        al
                        <input class="detalle_" type="text" name="f_fin_" id="f_fin_"  placeholder="AAAA-MM-DD" style="width:115px;" maxlength="10"/>                        
                    </td>
                </tr>
                

            </table>
            
            </div>
            <br>
            
            
            
        </div>
              
          
    <input type="hidden" name="cant_filas_envs" id="cant_filas_recs" value="0"/>

     <div class="CSSTableSimple" width="700">
        <table align="center">
                              
            <th>REMITENTE</th>            
            <th>ALUMNO</th>
            <th>MODIFICACION</th>
            <th>FECHA</th>
            <th>ESTADO</th>

            <tbody id="list_rec_">
            </tbody>
        </table>            
    </div>