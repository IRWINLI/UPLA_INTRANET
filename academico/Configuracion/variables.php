<?php
//==========================================================================
//======================== VARIABLES SECUNDARIAS ===========================
//==========================================================================
//##################### NOMBRE DE VARIABLES DE SESSION //###################
define("vS_ContadorErrados","sistemaupla_contador");
define("vS_Cookie","sistemaupla_cookie");
//################################ CATCHA ##################################
define("tema_captcha","'white'");//Seleccionar el Tema para el Captcha, puede ser:red,white,blackglass,clean
define("n_intentos_captcha",100);//Número de intentos fallídos (para mostrar el captcha).
//##################### CÓDIGO PARA CLAVE SALADA ###########################
define("captcha_public_key",'6LcUYO0SAAAAACXp0pVxjR2JB62vR9yR3VPG3VOL');//
//==========================================================================
//======================== VARIABLES PRINCIPALES ===========================
//==========================================================================
//##################### BASE DE DATOS //###################
define("BD","DBCampusNet");
?>