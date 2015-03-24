function aki(dni,usuario)
{	
	redirect_by_post('../FSECO_V2/Encuestas.php', {
        codigo_p:dni,
        usuario:usuario
    }, true);
}