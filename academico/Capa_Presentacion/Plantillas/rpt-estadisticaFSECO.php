<div class="contenedor_cuerpo" >
	<div id="popupbox_estadisiticas"></div>
	<script>
		function reporte()
		{

		    //nuevoreg();
		    //var reg_num_x=$("#num_"+n).val(); 
		    mostrarCargando();

		    $.post("RptFsecoEsta", {anio:'2014',per:'2'} ,function(resultado)
		    {
		        if(resultado != false)
		        {
		            $("#popupbox_estadisiticas").empty();
		            $("#popupbox_estadisiticas").append(resultado);
		           // alerta_personalizado("popupbox_estadisiticas","850");            
		            ocultarCargando();
		        }
		    });                     
		    
		}

		function alerta_personalizado(div_x,tam)
	    {   
	        $("#"+div_x).dialog({
	            
	            resizable: true,
	            modal: true,
	            minWidth : tam,
	            maxHeight:600,
	            position: ["center",170],
	            buttons: {},
	            close: function() 
	            { 
	                                    
	                $( this ).dialog( "close" );
	            }
	        });
	    }
	</script>	       
</div>
