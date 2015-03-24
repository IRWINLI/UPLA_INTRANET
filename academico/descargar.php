<?php
// Codigo creado por Juniors Friends y Sharing Wall //
// http://juniorsfriends.jimdo.com/
// http://www.sharingwall.com/
//
// Este codigo es totalmente gratuito y estaremos sacando mas versiones! //

// Nombre del Software: Wall Upload!
// Version del Software: 0.1
//
// Solamente nos gustaria que te registraras en el sitio de http://www.sharingwall.com/
// ya que hai estaremos colocando mas informacion sobre este software en particular
// y hai podras encontrar mas actualizaciones sobre ello
//
// Te agradeceremos mucho tu registro en Sharing Wall, para que la comunidad siga creciendo! //

// NOMBRE DEL SITIO WEB //
$nombre_del_sitio_web = "Wall Upload!";

// CARPETA PARA GUARDAR EL ARCHIVO //
$carpeta_donde_se_guardara_el_archivo = "archivos/";
// NO OLVIDES PONER SIEMPRE UNA BARRA FINAL DESPUES DEL NOMBRE DE LA CARPETA, POR EJEMPLO archivos/
// SI CAMBIAS EL NOMBRE DE LA CARPETA AQUI, TAMBIEN CAMBIALA EN EL DIRECTORIO,
// SINO, NO SE GUARDARAN LAS COSAS
      
// PREFIJO CON EL QUE SE GURDARA EL ARCHIVO //
$prefijo_para_guardar_archivo = "UPLOADS";
// POR EJEMPLO EL NOMBRE QUE SE LE DARIA AL ARCHIVO CUANDO SE GUARDE, SERIA EL SIGUIENTE:
// UPLOADS_6BW0FDEODRNIY26LB.png

?>
<?php
$enlace = $carpeta_donde_se_guardara_el_archivo.$_GET["file"];
$enlace2 = $_GET["nombre"];
header ("Content-Disposition: attachment; filename=".$enlace2."\n");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace); 
?>  
