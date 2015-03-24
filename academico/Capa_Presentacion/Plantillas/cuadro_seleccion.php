<div style="text-align:right">
<?php set_imagen("salones/cerrar_esq_2.png","30","25","editar","onclick","ocultar();","salones/cerrar_esq.png","salones/cerrar_esq_2.png");?>
</div>
<div style="text-align:left">
<label class="cuadro">SALÓN</label>
</div>
<br>
<div style="text-align:center;">
<table>
    <tr>        
        <td>
            <select class="detalle_" name="sel_ciclo" id="sel_ciclo">
                <option value="0">Ciclo</option>
                <option value="PRIMERO">Primero</option>
                <option value="SEGUNDO">Segundo</option>
                <option value="TERCERO">Tercero</option>
                <option value="CUARTO">Cuarto</option>
                <option value="QUINTO">Quinto</option>
                <option value="SEXTO">Sexto</option>
                <option value="SEPTIMO">Septimo</option>
                <option value="OCTAVO" >Octavo</option>
                <option value="NOVENO">Noveno</option>
                <option value="DECIMO">Decimo</option>
                <option value="ONCEAVO">Onceavo</option>
                <option value="DOCEAVO">Doceavo</option>
                <option value="TRECEAVO">Treceavo</option>
                <option value="CATORCEAVO">Catorceavo</option>
                <option value="QUINCEAVO">Quinceavo</option>
            </select>            
            <script>
                $("#sel_ciclo").change(function()
                {        
                    var num=$("#sel_ciclo").val();
                    ubi_inicio=num;
                    mover_web(num);
/*
                    if($("#x_especi").val()=='SX')
                        var car_esp=$("#x_carrera").val();
                    else                        
                        var car_esp=$("#x_especi").val();
*/

                    $.get("lista_cursal", { ciclo: numero_ciclo(num),carr:$("#x_carrera").val(),esp:$("#x_especi").val()} ,function(resultado)
                    {
                        if(resultado == false)
                        {                            
                            $('#f_lista').empty();
                            $('#f_lista').append("No existe información...");  
                        }
                        else
                        {                            
                            $('#f_lista').empty();
                            $('#f_lista').append(resultado);                                     
                        }
                    });
                   
                });
                
            </script>
            
        </td>
        <td>
            <select class="detalle_" name="sel_turno" id="sel_turno">
                <option value="0">Turno</option>
                <option value="MANANA">Mañana</option>
                <option value="TARDE">Tarde</option>
                <option value="NOCHE">Noche</option>
            </select>
        </td>
        <td>
            <select class="detalle_" name="sel_cant" id="sel_cant">
                <option value="0">Capacidad</option>
                <?php opciones_combo_numeros(1,100);?>                 
        </select>    
        </td>
    </tr>
   
    <tr>      
        <td class="sub_tit" colspan="3" align="center">
        <br>
        </td>
    </tr>
    <tr>      
        <td class="sub_tit" colspan="3" align="center" name="p_1" id="p_1">
        ¿Qué cursos pueden dictarse?
        </td>
    </tr>
    <tr>      
        <td colspan="3">
        <div class="sub_tit">
            <fieldset class="group">
            <ul class="checkbox" name="f_lista" id="f_lista">             
            </ul>    
            </fieldset> 
            <label name="n_xx" id="n_xx"></label>
        </div>
        </td>
    </tr>
    <tr>      
        <td class="sub_tit" colspan="3" align="center">
            ¿Donde se llevará acabo?
        </td>
    </tr>
    <tr>               
        <td colspan="3" align="center">
            <input type="text" name="i_desd" id="i_desd" style="width: 569px;text-align:center;"/>    
        </td>
    </tr>      
    <tr>       
        <td colspan="3" align="center">
        <br>
            <button class="detalle_" onclick="reg_salon__();">Agregar</button>
        </td>
    </tr>

</table>
<br>
  
</div>
