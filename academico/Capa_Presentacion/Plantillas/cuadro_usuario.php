<div class="sub_menu" id="capa1" style="top:36px;right:0px; text-align:left; min-width: 230px;max-width: 320px;display: none;">

        <div style="background:rgb(201,201,201); font-family:serif;background: #fef9db;padding: 10px 20px; " >
            <div>Esta cuenta la gestiona <b>OUIS</b></div> 
            <a class="gb_W" href="http://www.google.com/support/accounts/bin/answer.py?answer=181692&amp;hl=es" target="_blank">Más información</a>
        </div>
        <br>
        <div style="text-align:center;">
            <?php 
                set_imagen_style_fuera($_SESSION["fotoperfil"],"style='width:100;'");                             
            ?>            
        </div>        
        <div style="text-align:center;">
            <?php echo substr(ucwords(strtolower(utf8_encode($_SESSION['nomape']))),0,25).((strlen(utf8_encode($_SESSION['nomape']))>25)?"...":"");?>
        </div>
  
        <div style="padding: 10px 20px; text-align:left;">

            <?php
                $cod='<Dato><n_id_sistema>8</n_id_sistema><c_cod_usuario>'.$_SESSION['dni'].'</c_cod_usuario></Dato>';
                $data=Logica::PA_UPLA("[seguridad].[paLis_opc]","array",$cod);                

                set_opciones_intranet($data,'opcion','uri');
            ?>                                     

        </div>

        <div style="background: #f5f5f5;border-top: 1px solid #ccc;border-color: rgba(0,0,0,.2);padding: 10px 20px; text-align:center;" >
            <?php  set_href("salir","Cerrar sesión","classname");?>               
        </div>        

</div>