<input id="archivoExcel" type="file" name="file">
<br>
<a href="javascript:leerArchivoHorarios()">Subir</a>
        
        
<script>
    
    function leerArchivoHorarios(){
        var archivo = $('#archivoExcel').val();
        //archivo = archivo.replace("/","//");
        var params={};
        
        params['nom_archivo']=archivo;

        $.ajax({
            data : params,
            async:false,
            type: "GET",
            url: "leerArchivoHorarios",
            dataType: "json",
            success : function(data){
                alert(data[6][10]);                
            }
            ,error: function(){
                alert("Error de Sistema: JSON");					
            }
        });
        
        
        
        alert(archivo);
    }
    
</script>