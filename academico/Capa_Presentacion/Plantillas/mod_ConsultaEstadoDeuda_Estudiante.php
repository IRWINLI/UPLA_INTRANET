<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">CONSULTA DE ESTADO DE DEUDA</p>
        <div id="listaEstudiantes" class="CSSTableSimple" style="margin-top:10px;">
            <table id="ListaEstudiantes"></table>
        </div>
        
        <br>
        <div id="listaEstadoDeuda" class="CSSTableSimple_claro" style="display:none">
            
            <label class="CSS-msjDeuda">Código: </label>
            <label id="lbl_codigo" style="font-size:15px; font-weight:bold;">---</label><br>
            
            <label class="CSS-msjDeuda">Estudiante: </label>
            <label id="lbl_estudiante" style="font-size:15px; font-weight:bold;">---</label><br>
            
            <br>
            <label class="CSS-msjDeuda">MATRÍCULA</label>
            <table id="t_matricula" style="width: 800px;"></table><br>
            
            <label class="CSS-msjDeuda">TASA EDUCATIVA</label>
            <table id="t_tasa" style="width: 800px;"></table>
            <label id="total_tasa" class="CSS-Total" style="padding-left:630px">---</label><br><br>
            
            <label class="CSS-msjDeuda">CUOTAS DE PENSIÓN ACADÉMICA</label>
            <table id="t_pensiones" style="width: 800px;"></table>
            <label id="total_pensiones" class="CSS-Total" style="padding-left:630px">---</label>
            
        </div>
    
    </fieldset>
    

    <div class="pantallaBloqueada" id="pantallaBloqueada" style="display:none" onclick="javascript:ocultar_detalleRequisito()">
            
    </div>
    
</div>

<script>
    
    buscarEstadoDeuda("<?php echo $_SESSION['dni'] ?>","<?php echo utf8_encode($_SESSION['nomape']) ?>");
    
    function buscarEstadoDeuda(codEst,nomEst) {
        
        mostrarCargando();
        
        $("#lbl_estudiante").text(nomEst);
        $("#lbl_codigo").text(codEst);
        var params={};
        params['codEst']=codEst;
        $("#msj_no_matricula").hide();
        $("#label_tasa").hide();
        $("#label_pensiones").hide();
        
        $("#t_pensiones tr").remove();
        $("#t_tasa tr").remove();
        $("#t_matricula tr").remove();
        
        
        $("#total_tasa").text("Total: 00.00");
        $("#total_pensiones").text("Total: 00.00");
        
        $.ajax({
            data:params,
            type:"GET",
            url:"consultarPensiones",
            dataType:"json",
            async:false,
            success: function(data)
            {
                $('#t_pensiones').append('<tr><th>Concepto</th><th>Fecha de Vencimiento</th><th>Importe</th><th>Mora</th><th>Monto Total</th></tr>'); 
                if (data!='No hay datos') {
                    
                    var suma_pensiones=0;
                    var moneda_pensiones="";
                    for(var i=0;typeof(data[i])!='undefined';i++)
                    {
                        var colorMora = '';
                        if (parseFloat(data[i][4])>0)colorMora = 'style = "color:red"';
                        $('#t_pensiones').append("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+"</td><td>"+data[i][2]+data[i][3]+"</td><td "+colorMora+">"+data[i][2]+data[i][4]+"</td><td style='font-weight:bold'>"+data[i][2]+" "+data[i][5]+"</td></tr>");
                        suma_pensiones+=parseFloat(data[i][5]);
                        moneda_pensiones=data[i][2];
                    }
                    $("#total_pensiones").text("Total: "+moneda_pensiones+suma_pensiones);
                }
                else{
                    $('#t_pensiones').append("<tr><td>Ninguno</td><td>Ninguno</td><td>Ninguno</td><td>Ninguno</td><td style='font-weight:bold'>Ninguno</td></tr>");
                }
            },
            error:function()
            {
                location.reload();   
            }
        });
        
        
        
        $.ajax({
            data:params,
            type:"GET",
            url:"consultarTasas",
            dataType:"json",
            async:false,
            success: function(data)
            {
                $('#t_tasa').append('<tr><th style="width: 300px;">Concepto</th><th style="width: 100px;">Monto</th><th style="width: 200px;">Observaciones</th></tr>');
                if (data!='No hay datos') {
                    var suma_tasa=0;
                    var moneda_tasa='';
                    for(var i=0;typeof(data[i])!='undefined';i++)
                    {
                        $('#t_tasa').append("<tr><td>"+data[i][0]+"</td><td>"+data[i][1]+data[i][2]+"</td><td>"+data[i][3]+"</td></tr>");
                        suma_tasa+=parseFloat(data[i][2]);
                        moneda_tasa=data[i][1];
                    }
                    $("#total_tasa").text("Total: "+moneda_tasa+suma_tasa);
                    
                }
                else{
                    $('#t_tasa').append("<tr><td>Ninguno</td><td>Ninguno</td><td>Ninguno</td></tr>");
                }                
            },
            error:function()
            {
                location.reload();   
            }
        });
        

        
        $.ajax({
            data:params,
            type:"GET",
            url:"consultarMatricula",
            dataType:"json",
            async:false,
            success: function(data)
            {
                $('#t_matricula').append('<tr><th style="width: 300px;">Concepto</th><th style="width: 100px;">Monto</th><</tr>');
                if (data[0][0]!='--') {
                    
                    for(var i=0;typeof(data[i])!='undefined';i++)
                    {
                        $('#t_matricula').append("<tr><td>"+data[i][0]+"</td><td>S/. "+data[i][1]+"</td></tr>");
                    }
                    
                }
                else{
                    $('#t_matricula').append("<tr><td>Ninguno</td><td>Ninguno</td></tr>");
                }                
            },
            error:function()
            {
                location.reload();   
            }
        });
        
        $('#listaEstudiantes').css("display","none");
        $('#listaEstadoDeuda').css("display","block");
        ocultarCargando();
    }

    
    
</script>





<style type="text/css" >
    .CSS-msjDeuda{
        color: #08298A;
        font-weight: bold;
        font-size: 16px;
    }
    
    .CSS-Total{
        color:#4E4E4E ;
        font-weight: bold;
        font-size: 20px;
    }
</style>



