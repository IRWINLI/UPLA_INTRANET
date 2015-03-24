
<?php
  $img1="../Recursos/fseco/checked.png";
  $img2="../Recursos/fseco/error.png";
header('content-type:text/css');

echo <<<FINCSS
/*{
    margin:0px;
    padding:0px;
}*/
#contentx{
    margin:0px auto;
    text-align:center;
    width:600px;
    position:relative;
    height:100%;
}
#wrapper{
    -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
    box-shadow:0px 0px 3px #aaa;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    border-radius:10px;
    /*border:2px solid #fff;
    background-color:#f9f9f9;*/
    width:625px;
    overflow:hidden;
}
#steps{
    width:600px;
	/*height:320px;*/
    overflow:hidden;
}
.step{
    float:left;
    width:600px;
	/*height:320px;*/
}
#navigation{
    height:45px;
    background-color:#e9e9e9;
    border-top:1px solid #fff;
    -moz-border-radius:0px 0px 10px 10px;
    -webkit-border-bottom-left-radius:10px;
    -webkit-border-bottom-right-radius:10px;
    border-bottom-left-radius:10px;
    border-bottom-right-radius:10px;
    font: 17px Helvetica,Arial,sans-serif;
}
#navigation ul{
    list-style:none;
	float:left;
	margin-left:-47px;
}
#navigation ul li{
	float:left;
    border-right:1px solid #ccc;
    border-left:1px solid #ccc;
    position:relative;
	margin:0px 2px;
}
#navigation ul li a{
    display:block;
    height:45px;
    background-color:#444;
    color:#777;
    outline:none;
    /*font-weight:bold;*/
    text-decoration:none;
    line-height:45px;
    padding:0px 0px;
    border-right:0px solid #fff;
    border-left:0px solid #fff;
    background:#f0f0f0;
    background:
        -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0.09, rgb(240,240,240)),
        color-stop(0.55, rgb(227,227,227)),
        color-stop(0.78, rgb(240,240,240))
        );
    background:
        -moz-linear-gradient(
        center bottom,
        rgb(240,240,240) 9%,
        rgb(227,227,227) 55%,
        rgb(240,240,240) 78%
        )
}
#navigation ul li a:hover,
#navigation ul li.selected a{
    background:#f5c774;
    color:#666;
    text-shadow:1px 1px 1px #fff;
}
span.checked{
    background:transparent url($img1) no-repeat top left;
    position:absolute;
    top:0px;
    left:1px;
    width:20px;
    height:20px;
}
span.error{
    background:transparent url($img2) no-repeat top left;
    position:absolute;
    top:0px;
    left:1px;
    width:20px;
    height:20px;
}

#steps form fieldset{
    border:none;
    padding-bottom:20px;
}
#steps form legend{
    text-align:left;
    background-color:#f0f0f0;
    color:#666;
    /*  font-size:24px;
    text-shadow:1px 1px 1px #fff;
    font-weight:bold;*/
    float:left;
    width:590px;
    padding:5px 0px 5px 10px;
    margin:10px 0px;
    border-bottom:1px solid #fff;
    border-top:1px solid #d9d9d9;
}
#steps form p{
    float:left;
    clear:both;
    margin:5px 0px;
    background-color:#f4f4f4;
    border:1px solid #fff;
    width:400px;
    padding:10px;
    margin-left:100px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
    box-shadow:0px 0px 3px #aaa;
}
#steps form p label{
    width:160px;
    /*float:left;
    text-align:right;*/
    margin-right:15px;
    /*line-height:26px;*/
    color:#666;
    text-shadow:1px 1px 1px #fff;
    font-weight:bold;
}
#steps form input:not([type=radio]),
#steps form textarea,
#steps form select{
    background: #DDDDDD;/*AQUI CAMBIAR EL COLOR DE LOS INPUT*/
    border: 1px solid #A8A8A8;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    outline: none;
    padding: 5px;
    width: 100%;
    /*float:right;*/
}
#steps form input:focus{
    -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
    box-shadow:0px 0px 3px #FFFFFF;
    background-color:#FFFEEF;
}
#steps form p.submit{
    background:none;
    border:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
    box-shadow:none;
}
#steps form button {
	border:none;
	outline:none;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    color: #ffffff;
    display: block;
    cursor:pointer;
    margin: 0px auto;
    clear:both;
    padding: 7px 25px;
    text-shadow: 0 1px 1px #777;
    /*font-weight:bold;
    font-family:"Century Gothic", Helvetica, sans-serif;
    font-size:22px;*/
    -moz-box-shadow:0px 0px 3px #aaa;
    -webkit-box-shadow:0px 0px 3px #aaa;
    box-shadow:0px 0px 3px #aaa;
    background:#4797ED;
}
#steps form button:hover {
    background:#d8d8d8;
    color:#666;
    text-shadow:1px 1px 1px #fff;
}

FINCSS;
?>
