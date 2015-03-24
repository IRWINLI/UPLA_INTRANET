<?php
header('content-type:text/css');
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$tipoLetra = "Helvetica,Arial,sans-serif";
echo <<<FINCSS

/**
 * Default Look and Feel
 */
.alertify,
.alertify-log {
	font-family: sans-serif;
}
.alertify {
	background: #FFF;
	border: 0px solid #333; /* browsers that don't support rgba */
	border-radius: 8px;
	box-shadow: 0 3px 3px rgba(0,0,0,.3);
	-webkit-background-clip: padding;     /* Safari 4? Chrome 6? */
	   -moz-background-clip: padding;     /* Firefox 3.6 */
	        background-clip: padding-box; /* Firefox 4, Safari 5, Opera 10, IE 9 */
	top:25%;
}
.alertify-text {
	border: 1px solid #CCC;
	padding: 10px;
	border-radius: 4px;
}
.alertify-button {
	border-radius: 4px;
	color: #FFF;
	font-weight: bold;
	padding: 6px 15px;
	text-decoration: none;
	text-shadow: 1px 1px 0 rgba(0,0,0,.5);
	box-shadow: inset 0 1px 0 0 rgba(255,255,255,.5);
	background-image: -webkit-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
	background-image:    -moz-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
	background-image:     -ms-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
	background-image:      -o-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
	background-image:         linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        text-align: right;
        margin-top: 4px;
}
.alertify-button:hover,
.alertify-button:focus {
	outline: none;
	box-shadow: 0 0 15px #2B72D5;
	background-image: -webkit-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
	background-image:    -moz-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
	background-image:     -ms-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
	background-image:      -o-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
	background-image:         linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
}
.alertify-button:active {
	position: relative;
	top: 1px;
}
	.alertify-button-cancel {
		background-color: $colorPrincipal;

	}
	.alertify-button-ok {
		background-color: $colorPrincipal;

	}
.alertify-log {
	background: #1F1F1F;
	background: rgba(0,0,0,.9);
	padding: 15px;
	border-radius: 4px;
	color: #FFF;
	text-shadow: -1px -1px 0 rgba(0,0,0,.5);
}
	.alertify-log-error {
		background: #FE1A00;
		background: rgba(254,26,0,.9);
	}
	.alertify-log-success {
		background: #5CB811;
		background: rgba(92,184,17,.9);
	}
	
FINCSS;
?>	