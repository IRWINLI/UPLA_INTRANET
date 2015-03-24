<?php
$_SESSION["color1"]=isset($_GET['col'])?$_GET['col']:$_SESSION["color1"];
$_SESSION["color2"]=isset($_GET['col_sombra'])?$_GET['col_sombra']:$_SESSION["color2"];
$_SESSION["sistema"]=isset($_GET['sistema'])?$_GET['sistema']:$_SESSION["sistema"];
$_SESSION["letra"]=isset($_GET['letra'])?$_GET['letra']:$_SESSION["letra"];
?>
<!--========================= FIN VENTANA ===============================-->
<div class="contenedor_menu" >
    <div style="width:initial; float:left; text-align: center;">
    <ul class="nav">
        <li>
            <a onclick="ver_ocul('capa3')">
                <?php set_imagen_style("Flecha.png","style='height: 20px;width: 22px;top: 8px;padding: 4px 6px 3px 6px;'");?>
            </a>
        </li>
        <li>            
                <div style="width: 1px;background: white;height: 28px;top: 4px;position: absolute;"></div>
            
        </li>                 
        <li><a href="inicio"><?php set_imagen_style("logo_UPLA.png","style='height: 10px;width: 205px;padding: 9px 5px 6px 9px;'");?></a></li>            
        <!--li><a><?php set_imagen("nada.png","26","10");?></a></li>
        <li><a><?php set_imagen("nada.png");?></a></li-->        
    </ul>

    </div>
    <div style="width:initial; float:right; text-align:center;">
        <ul class="nav">
            <li>
                <a>
                    <?php set_imagen_style("chat.png","style='height: 14px;width: 15px;padding: 8px 2px 4px 1px;'");?>
                </a>
            </li>
            <li>
                <a onclick="ver_ocul('capa2')">
                    <?php set_imagen_style("engrane.png","style='height: 14px;width: 15px;padding: 8px 2px 4px 1px;'");?>
                </a>
            </li>
            <li>
                <a onclick="ver_ocul('capa1')">                
                    <?php                
                        set_imagen_style_fuera($_SESSION["fotoperfil"],"style='height: 26px;width: 27px;padding: 0px 3px 0px 2px;'");                                                                        
                    ?>
                </a>                              
            </li>
        </ul>
    </div>
</div>    

<br>
<?php
    include_template("cuadro_usuario.php");
?>

<?php
    include_template("opciones_adicionales.php");
?>

<?php
    include_template("panel_sistemas.php");
?>



