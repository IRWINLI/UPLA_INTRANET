    function getViewPortHeight()
    {
        var viewportwidth;
        var viewportheight;

        //Standards compliant browsers (mozilla/netscape/opera/IE7)
        if (typeof window.innerWidth != 'undefined')
        {
            viewportwidth = window.innerWidth,
            viewportheight = window.innerHeight
        }

        // IE6
        else if (typeof document.documentElement != 'undefined'
        && typeof document.documentElement.clientWidth !=
        'undefined' && document.documentElement.clientWidth != 0)
        {
            viewportwidth = document.documentElement.clientWidth,
            viewportheight = document.documentElement.clientHeight
        }

        //Older IE
        else
        {
            viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
            viewportheight = document.getElementsByTagName('body')[0].clientHeight
        }

        return viewportheight;
    }

    function alerta_personalizado_prueba(div_x,titulo){   
    

    $("#"+div_x).dialog({
            title:titulo,
            resizable: true,
            modal: true,
            minWidth : 680,
            maxHeight:600,
            position: ["center",170],
            buttons: {
                OK: function() 
                {
                    $( this ).dialog( "close" );
                }
            }
        });
    }

    function val_busbusalumgen()
    {
        if($.trim($("#c_search_psb_box").val()).length > 3)
        {
            avisoLimpiar("c_search_psb_box");            
            aviso("","","");
            return true;
        }
        else
        {     
            aviso_adv('Ingrese un dato mayor a 3 dígitos.');               
            alerta('Ingrese un dato mayor a 3 dígitos.');
            cajaColor("c_search_psb_box","red"); 
            return false;
        }    

    }
    
function mostrarbusquedatodosalumnos()
    {        
        if(val_busbusalumgen())
        {
            
            mostrarCargando();
            var params={};
            params['cad']=$.trim($("#c_search_psb_box").val());    
            iniciar_tabla("list_resultxx_","cant_filas_resultxx");  
            
            
            var sindatos=false;
            $.ajax({
                    data : params,
                    type: "GET",
                    url: "buscarGeneralAlumno",
                    dataType: "json",
                    success : function(data)
                    {                
                        //alerta(data);
                        $.each(data, function(index, value) 
                        {                       
                            
                            if(!(data[index][0]=='No hay datos')) 
                            tabla_addXXX(data[index][0],data[index][1],data[index][2],data[index][3],data[index][4], data[index][5]);
                            
                        });


                        alerta_personalizado_prueba("popupbox_BBalumnosBB","Alumnos");

                        ocultarCargando();
                    }
                    ,error: function()
                    {
                        //aviso("registrarUsuario no puedo realizarse!");                                        
                        ocultarCargando();
            location.reload();
            
                    }
                });
        } 

        
    }

   function tabla_addXXX(dat1,dat2,dat3,dat4,dat5,dat6)
    {        
        $("#cant_filas_resultxx").val(parseInt($("#cant_filas_resultxx").val()) + 1);
        var oId = $("#cant_filas_resultxx").val(); 

        //var color_fila='#FFFFFF';

        var strHtml1 = "<td>" + dat1 +"</td>";
        var strHtml2 = "<td>" + dat2 +"</td>";
        var strHtml3 = "<td>" + dat3 +"</td>";
        var strHtml4 = "<td>" + dat4 +"</td>";
        var strHtml5 = "<td>" + dat5 +"</td>";
        var strHtml6 = "<td>" + dat6 +"</td>";
        
    /*
        if(parseInt(oId)%2==0)            
            color_fila=$("#color_sesion").val();                            
        else
            color_fila='#FFFFFF';    
        */
        var strHtmlTr = "<tr onmouseover=this.style.backgroundColor='#E4E4E4'; onmouseout=this.style.backgroundColor='#FFFFFF' style='cursor: pointer;'; id='rowDetalle_resultxx_" + oId + "' align='center' ></tr>";        
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3+ strHtml4 + strHtml5 + strHtml6;
       //tambien se puede agregar todo el HTML de una sola vez.
        $("#list_resultxx_").append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#rowDetalle_resultxx_" + oId).html(strHtmlFinal);
    }

    function cambiarMay(cad)
    {
        cad.value=cad.value.toUpperCase();
    }    

    function iniciar_tabla(cuadrores,numfilas)
    {    
        var i=1;
        $("#"+cuadrores).empty();
        $("#"+numfilas).val("0");
            
    }
    /*function reporte(nomrpt,parametros)
    {
        $.post("RptSalones", {rpt:nomrpt, parametros} ,function(resultado)
        {
            if(resultado != false)
            {
                $("#reporte").append(resultado);
            }
        }); 
    }*/
    /*Funcion para cambiar el idoma del date picker*/
    $(function()
    {
    $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    });
    /*fin Funcion para cambiar el idoma del date picker*/

    function set_imagen(href,h,w)
    {
     return '<img src="Capa_Presentacion/Recursos/'+href+'" width="'+w+'px" height="'+h+'px" >';        
    }

    
     function compare_dates(fecha, fecha2)
      {
        var xMonth=fecha.substring(3, 5);
        var xDay=fecha.substring(0, 2);
        var xYear=fecha.substring(6,10);
        var yMonth=fecha2.substring(3, 5);
        var yDay=fecha2.substring(0, 2);
        var yYear=fecha2.substring(6,10);
        if (xYear> yYear)
        {
            return(true)
        }
        else
        {
          if (xYear == yYear)
          { 
            if (xMonth> yMonth)
            {
                return(true)
            }
            else
            { 
              if (xMonth == yMonth)
              {
                if (xDay> yDay)
                  return(true);
                else
                  return(false);
              }
              else
                return(false);
            }
          }
          else
            return(false);
        }
    }

    
    function ver_ocul(nombre_capa)
    {
        
        var eva=document.getElementById(nombre_capa).style.display;
        if(eva=='block')
        {
            minimizar(nombre_capa);              
        }
        else
        {
            maximizar(nombre_capa);
        }
    }

    function minimizar(nombre_capa){
    document.getElementById(nombre_capa).style.display="none";
    }
    function maximizar(nombre_capa){
    document.getElementById(nombre_capa).style.display="block";
    }

    function asignarCaptcha()
    {        
        var modelo=Recaptcha.get_challenge();
        var resp=Recaptcha.get_response();

        $("#captcha_modelo").val(modelo);
        $("#captcha_respuesta").val(resp);
        /*
        $("#captcha_modelo").val(document.getElementById("recaptcha_challenge_field").value);
        $("#captcha_respuesta").val(captcha_respuesta=document.getElementById("recaptcha_response_field").value);*/
        /*if (resp.length == 0) 
        {//Si no se rellena el CAPTCHA
            cajaErrada="recaptcha_response_field";
            aviso ="Debe rellenar el código Captcha";
            avisoError(cajaErrada,aviso);
        }*/
        
    }

    // ######################################################################## //
    // ************************* FUNCIONES DE AVISOS ************************** //
    // ######################################################################## //
    /*
        Estas funciones son útiles para mostrar avisos en pantalla
    */

    /*function loginEnter(key,contErrores,n_intentos_captcha)
    {//Cuando presiona enter en el login, para llamar a la funcion login  
        var unicode
        if (key.charCode)
        {
            unicode=key.charCode;
        }
        else
        {
            unicode=key.keyCode;
        }    
     
        if (unicode == 13)
        {
            login(contErrores,n_intentos_captcha);
            
        }
    }*/

    //Muestra un mensaje en el label "aviso" del color indicado
    function aviso(mensaje,color,back)
    {        
        $("#aviso").text(mensaje);
        $("#aviso").css("color", color);
        $("#aviso").css("background", back);        
    }
    
    function aviso_bien(mensaje)
    {        
        $("#aviso").text(mensaje);
        $("#aviso").css("color", "white");
        $("#aviso").css("background", "rgb(134, 197, 75)");        
    }

    function aviso_mal(mensaje)
    {
        $("#aviso").text(mensaje);
        $("#aviso").css("color", "white");
        $("#aviso").css("background", "rgb(197, 75, 95)");        
    }

    function aviso_adv(mensaje)
    {
        $("#aviso").text(mensaje);
        $("#aviso").css("color", "white");
        $("#aviso").css("background", "rgb(223, 195, 47)");        
    }

    //Encierra de rojo la caja de texto errada y muestra en el label "aviso" el mensaje
    function cajaColor(cajaErrada,color) 
    {        
        document.getElementById(cajaErrada).style.border="2px solid "+color;        
        return false;
    }
        
    //Limpia la caja de texto encerrada y limpia tmb el label "aviso"
    function avisoLimpiar(cajaErrada) 
    {
        document.getElementById(cajaErrada).style.border="";
        //$("#aviso").text("");
    }

    // ######################################################################## //
    // ************************* FUNCIONES OTRAS ****************************** //
    // ######################################################################## //

    String.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) 
    {
        var n = this,
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
        decSeparator = decSeparator == undefined ? "." : decSeparator,
        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
        sign = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
        return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
    };



    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) 
    {
        var n = this,
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
        decSeparator = decSeparator == undefined ? "." : decSeparator,
        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
        sign = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
        return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
    };

    function utf8_decode (str_data) 
    {
        // http://kevin.vanzonneveld.net
        // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
        // +      input by: Aman Gupta
        // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +   improved by: Norman "zEh" Fuchs
        // +   bugfixed by: hitwork
        // +   bugfixed by: Onno Marsman
        // +      input by: Brett Zamir (http://brett-zamir.me)
        // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        // +   bugfixed by: kirilloid
        // *     example 1: utf8_decode('Kevin van Zonneveld');
        // *     returns 1: 'Kevin van Zonneveld'

        var tmp_arr = [],
        i = 0,
        ac = 0,
        c1 = 0,
        c2 = 0,
        c3 = 0,
        c4 = 0;

        str_data += '';

        while (i < str_data.length) {
        c1 = str_data.charCodeAt(i);
        if (c1 <= 191) {
        tmp_arr[ac++] = String.fromCharCode(c1);
        i++;
        } else if (c1 <= 223) {
        c2 = str_data.charCodeAt(i + 1);
        tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
        i += 2;
        } else if (c1 <= 239) {
        // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
        c2 = str_data.charCodeAt(i + 1);
        c3 = str_data.charCodeAt(i + 2);
        tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
        i += 3;
        } else {
        c2 = str_data.charCodeAt(i + 1);
        c3 = str_data.charCodeAt(i + 2);
        c4 = str_data.charCodeAt(i + 3);
        c1 = ((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63);
        c1 -= 0x10000;
        tmp_arr[ac++] = String.fromCharCode(0xD800 | ((c1>>10) & 0x3FF));
        tmp_arr[ac++] = String.fromCharCode(0xDC00 | (c1 & 0x3FF));
        i += 4;
        }
        }
        return tmp_arr.join('');
    }

    function blokear_tecla(codigo)
    {   
        $("form").keypress(function (e) 
        {
            if (e.which == codigo) 
            {
                return false;
            }
        });
    }

    function Valida_Advertencia(id,control)
    {
        if(control=='radio'){
        var r = document.getElementsByName(id);
        for(var x=0;r[x];x++){
        r[x].parentNode.style.border="2px solid blue";
        }
        }
        else
        {
            $("#"+id).css("border","2px solid blue");                
        }
    }

    function Valida_Bien(id,control)
    {
        if(control=='radio'){
        var r = document.getElementsByName(id);
        for(var x=0;r[x];x++){
        r[x].parentNode.style.border="";
        }
        }
        else
        {
        //document.getElementById(id).style.border="none";
        $("#"+id).css("border","none");
        }
    }

    function Valida_Error(id,control)
    {
        if(control=='radio'){
        var r = document.getElementsByName(id);
        for(var x=0;r[x];x++){
        r[x].parentNode.style.border="1px solid red";
        }
        }
        else
        {
        $("#"+id).css("border","2px solid red");        
        }
    }

    function ValidaSinDato(valor)
    {
        if(valor!=""){
        return true;
        }
        return false;
    }

    function ValidaNumero_Fijo(tel)
    {
        if((/^\d{6}$/.test(tel)) || (/^\d{7}$/.test(tel))) {
        return true;
        }
        return false;
    }

    function ValidaNumero_Cel(cel)
    {
        if((/^\d{9}$/.test(cel)) || (/^\d{10}$/.test(cel))) {
        return true;
        }
        return false;
    }

    function ValidaMail(mail) 
    {
        var er = /^[0-9a-z_\-\.]+@([a-z0-9\-]+\.?)*[a-z0-9]+\.([a-z]{2,4}|travel)$/i;
        return er.test(mail);
    }

    function ValidaDni(dni_usuario)
    {
        if(dni_usuario=="1234567" || dni_usuario=="87654321" || dni_usuario=="00000000" || dni_usuario=="12345678"||dni_usuario=="11111111"||dni_usuario=="22222222"|| dni_usuario== "33333333" || dni_usuario== "44444444" || dni_usuario== "55555555" || dni_usuario== "66666666" || dni_usuario== "77777777" ||  dni_usuario== "88888888" || dni_usuario== "99999999" || dni_usuario.length!=8 )
        {
        return false;
        }
        return true;
    }


    function enviar(form)
    {
        form.submit();
    }


    function Abrir_ventana(pagina) 
    {
    var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
    window.open(pagina,"",opciones);
    }

    // Documento JavaScript
    // Esta función cargará las paginas
    function llamarasincrono (url, id_contenedor)
    {
        var pagina_requerida = false;
        if (window.XMLHttpRequest)
        {
        // Si es Mozilla, Safari etc
        pagina_requerida = new XMLHttpRequest ();
        } else if (window.ActiveXObject)
        {
        // pero si es IE
        try 
        {
        pagina_requerida = new ActiveXObject ("Msxml2.XMLHTTP");
        }
        catch (e)
        {
        // en caso que sea una versión antigua
        try
        {
        pagina_requerida = new ActiveXObject ("Microsoft.XMLHTTP");
        }
        catch (e)
        {
        }
        }
        } 
        else
        return false;
        pagina_requerida.onreadystatechange = function ()
        {
        // función de respuesta
        cargarpagina (pagina_requerida, id_contenedor);
        }
        pagina_requerida.open ('GET', url, true); // asignamos los métodos open y send
        pagina_requerida.send (null);
    }
    // todo es correcto y ha llegado el momento de poner la información requerida
    // en su sitio en la pagina xhtml
    function cargarpagina (pagina_requerida, id_contenedor)
    {
        if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf ("http") == - 1))
        document.getElementById (id_contenedor).innerHTML = pagina_requerida.responseText;
    }

    //funcion que te permite capturar datos desde la url
    function locationVars (vr)
    {

        try{var src = String( window.location.href ).split('?')[1];
        var vrs = src.split('&');

        for (var x = 0, c = vrs.length; x < c; x++) 
        {
        if (vrs[x].indexOf(vr) != -1)
        {
        return decodeURI( vrs[x].split('=')[1] );
        break;
        };
        };}catch(Exception){

        return 0;   
        }

    }

    //funcion que se activa cuando se envian datos GET en específico del numero de expediente
    function cargar_url(url_x){
    $('[name="ch_num_exp"]').attr('checked',true);
    $("input#i_num_exp").val(url_x);
    buscar();
    }
    //validar DNI al ingreso-------------------------------------
    function ceros_izq(variable){
        cad='';
        for(i=0;i<variable.length;i++)
        {
             v=variable.substr(i,1);
             
             switch(v){
                case '0':cad+=v;break;
                case '1':cad+=v;break;
                case '2':cad+=v;break;
                case '3':cad+=v;break;
                case '4':cad+=v;break;
                case '5':cad+=v;break;
                case '6':cad+=v;break;
                case '7':cad+=v;break;
                case '8':cad+=v;break;
                case '9':cad+=v;break;

             }
            
        }

        return cad;
    }

    function Solo_Numerico(variable)
    {
        
        Numer=parseInt(variable);
        //esto valida el inicio
        if (isNaN(Numer))
        {
            return "";
        }
        
        
        
        return ceros_izq(variable);
    }

    function ValNumero(Control)
    {
        Control.value=Solo_Numerico(Control.value);
    }
    //---------------------------------------------------------

    //funcion para hacer indiferente las mayusculas y las tildes
    function general(palabra)
    {
        return palabra.toUpperCase().replace(/Á/g,"A").replace(/É/g,"E").replace(/Í/g,"I").replace(/Ó/g,"O").replace(/Ú/g,"U");
    }

    //funcion que te permite cortar los espacios en blando de los extremo de una cadena
    function trim (myString)
    {
    return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
    }

    //detectar navegador
    function detecta(){
    var navegador = navigator.appName;
    //alert(navegador);
    switch (navegador){
    case "Microsoft Internet Explorer": return "Su navegador es Internet Explorer";
    case "Netscape": return "Su navegador es Mozilla o Google Chrome";
    default: return "Otros navegadores";
    }
    }

    //Funcion para bloquear el enter en un input
    function testForEnter() 
    {    
    if (event.keyCode == 13) 
    {        
    event.cancelBubble = true;
    event.returnValue = false;
    }
    } 

    //determinar habilita y desabilita un input segun el check
    function act_check(check_x,objeto_x)
    {   
        if($("#"+check_x).is(':checked')){
         $("#"+objeto_x).attr("disabled",false);
        }
        else{
         $("#"+objeto_x).attr("disabled",true); 
            }
    }

    //funcion para jS   str_replace de php
    function str_replace(busca, repla, orig)
    {
    str     = new String(orig);

    rExp    = "/"+busca+"/g";
    rExp    = eval(rExp);
    newS    = String(repla);

    str = new String(str.replace(rExp, newS));

    return str;
    }


    //funcion que busca el value pasando el texto
    function busca_val(cmb,text_tip_doc){
    var combo = document.getElementById("cmb");
    for (var i = 1; i <= combo.length; i++)
    {
    //alert($("#Tipo_doc option[value="+i+"]").text());
    if($("#"+cmb+" option[value="+i+"]").text()==text_tip_doc){
    return i;
    }
    }}


   //metodo que permite enviar y abrir hojas con variables post que necesitan ser manejados con estructuras de datos 
    //como json o xml
    function redirect_by_post(purl, pparameters, in_new_tab) 
    {
        pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
        in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

        var form = document.createElement("form");
        $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
        if (in_new_tab) 
        {
            $(form).attr("target", "_blank");//"_blank"
        }
        $.each(pparameters, function(key) 
        {
            $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
        });
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);

        return false;        
    }

    function unescapeTxt(s){
    return unescape(s);
    }

    function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
    break;
    }
    }
    }

    function open_win(pg)
    {
    window.open(pg,"_blank","hotkeys=si ,channelmode=yes, directories=yes, toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400");
    }
//============================ funciones para cargar divs superpuestos ===================
function Carga(url,id)
{        
    //Creamos un objeto dependiendo del navegador
    var objeto;
    if (window.XMLHttpRequest)
    {
        alert('hola');
    //Mozilla, Safari, etc
    objeto = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
    //Nuestro querido IE
    try {
    objeto = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
    try { //Version mas antigua
    objeto = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {}
    }
    }
    if (!objeto)
    {
    alert("No ha sido posible crear un objeto de XMLHttpRequest");
    }

    alert(objeto);
    //Cuando XMLHttpRequest cambie de estado, ejecutamos esta funcion
    objeto.onreadystatechange=function()
    {
    cargarobjeto(objeto,id);
    }
    objeto.open('GET', url, true); // indicamos con el método open la url a cargar de manera asíncrona
    objeto.send(null); // Enviamos los datos con el metodo send
}


function cargarobjeto(objeto, id)
{
    if (objeto.readyState == 4) //si se ha cargado completamente
    document.getElementById(id).innerHTML=objeto.responseText;
    else //en caso contrario, mostramos un gif simulando una precarga
    document.getElementById(id).innerHTML='<img src="loader.gif" alt="cargando" />';
}
//============================================================================================
/*function muestra_oculta_div(id)
{
    if (document.getElementById)
    { //se obtiene el id
        var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
        el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
    }
    }
    window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
  /*  muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
//}

//=============================================================================================================================================================================
   
    //function devuelve datos importantes ssobre un combo(){
    //  var texto
    /*texto = "El numero de opciones del select: " + document.formul.miSelect.length
    var indice = document.formul.miSelect.selectedIndex
    texto += "\nIndice de la opcion escogida: " + indice*/
    //var valor = document.c_tipo_pro.miSelect.options[indice].value
    //texto += "\nValor de la opcion escogida: " + valor
    //var textoEscogido = document.formul.miSelect.options[indice].text
    //texto += "\nTexto de la opcion escogida: " + textoEscogido
    //alert(texto)
    
    //  }

        //
    /*$("#q").keydown(function(e){
        if(e.keyCode == 13){
          alert("diste Enter");
          //Aki código a ejecutar
       }
    })*/
    
    
    
//#====================================================================================================0000
//======== FUNCION PARA CARGAR PÁGINA DESDE MENU O BOTONES DE INICIO DE APOYO =========================0000
//#====================================================================================================0000
    

function cargarPagina(action) {

        // Creamos el formulario auxiliar
        var form = document.createElement( "form" );
        
        // Le añadimos atributos como el name, action y el method
        form.setAttribute( "name", "formulario" );
        form.setAttribute( "action", "index.php" );
        form.setAttribute( "method", "post" );
        
        // Creamos un input para enviar el valor
        var input = document.createElement( "input" );
        
        // Le añadimos atributos como el name, type y el value
        input.setAttribute( "name", "action" );
        input.setAttribute( "type", "hidden" );
        input.setAttribute( "value", action);
        
        // Añadimos el input al formulario
        form.appendChild( input );
        
        // Añadimos el formulario al documento
        document.getElementsByTagName( "body" )[0].appendChild( form );
        
        // Hacemos submit
        document.formulario.submit();   
    }
    
function mostrarCargando(){

    $("#cargando").css("display", "block");
    return;
}

function ocultarCargando(){
    $("#cargando").css("display", "none");
}


function alerta(mensaje,titulo){
    var div = $('<div />').appendTo('body');
    div.attr('id', 'alerta');
    $( "#alerta" ).empty();
    $("#alerta").append(mensaje);
    $( "#alerta" ).dialog({
        title:titulo,
        resizable: true,
        modal: true,
        minWidth : 500,
        position: ["center",170],
        buttons: {
                OK: function() {
                $( this ).dialog( "close" );
            }
        }
    });
}

//Función utilizada para convertir arreglo en cadena, luego en PHP se puede usar explode() para volver a convertir en arreglo

function arreglo_cadena(arreglo){
        cadena=arreglo[0];
        for (var i=1; i<arreglo.length;i++){
            cadena=cadena+','+arreglo[i];
        }
        return cadena;
    }
    
//#====================================================================================================0000
//======================================== FUNCIÓN DE NOTIFICACIONES ==================================0000
//#====================================================================================================0000

    //Función que muestra una notificación indicando si una operación ha sido satisfactoria o no
    //Esta función permite generar 3 tipos de notificaciones (correcto, advertencia y error)
    //Ejem1. notificacion ("error","¡Se ha detectado un error!","Se ha detectado un error en la ejecución de la operación")
    //Ejem2. notificacion (0,"¡Se ha detectado un error!","Se ha detectado un error en la ejecución de la operación")
    
    function notificacion(estado,titulo,mensaje,tiempo) {
        
        if (!$('#notificacion').length){
            $("body").append('<div id="notificacion" style="bottom: -130px;"></div>');
            $("#notificacion").append('<div id="icono_correcto" class="notif_icon" display="none" style="display: none;"></div>');  
                $("#icono_correcto").append('<img width="50px" height="50px" alt="" src="Capa_Presentacion/Recursos/modulos_intranet/icono_correcto.png"></img>');
            $("#notificacion").append('<div id="icono_advertencia" class="notif_icon" display="none" style="display: block;"></div>');
                $("#icono_advertencia").append('<img width="50px" height="50px" alt="" src="Capa_Presentacion/Recursos/modulos_intranet/icono_advertencia.png"></img>');
            $("#notificacion").append('<div id="icono_error" class="notif_icon" display="none" style="display: none;"></div>');
                $("#icono_error").append('<img width="50px" height="50px" alt="" src="Capa_Presentacion/Recursos/modulos_intranet/icono_error.png"></img></img>');
            $("#notificacion").append('<div class="notif_btnCerrar" display="none" onclick="ocultar_notificacion();"></div>');
            $("#notificacion").append('<div id="notif_titulo" class="notif_titulo" display="none"></div>');
            $("#notificacion").append('<div id="notif_mensaje" class="notif_mensaje" display="none"></div>');
        }
        
        if (tiempo == undefined) {
            tiempo = 0;
        }
        
        //Estableciendo valor de "estado" si es que este ha sido declarado en números
        if (estado==2) estado = "correcto";
        else if(estado==1) estado = "advertencia"; 
        else if(estado==0) estado = "error";

        //Desactivar todos los div de íconos de notificación
        $('#icono_correcto').css("display","none");
        $('#icono_advertencia').css("display","none");
        $('#icono_error').css("display","none");
        
        //Activar el div de ícono de notificación específico
        $('#icono_'+estado).css("display","block");
        
        //Asignar título y mensaje de la notificación
        $('#notif_titulo').text(titulo);
        $('#notif_mensaje').text(mensaje);

        //Obtener y reproducir sonido
        var sonido = document.getElementById("sonido_"+estado);
        sonido.play();
        
        //Hacer aparecer div de notificación
        
        
                  
        //var i=parseInt($("#notificacion").css("bottom"));//Obtiene valor actual del "bottom"
        var i = -130;
        var temp=setInterval(function(){
            if (i==5) {
                
                clearInterval(temp);
            }
            $("#notificacion").css("bottom",i)
            i=i+1;
        },5);
        
        var j=0;
        if (tiempo!=0) {
            setInterval(function(){
                j=j+1;
                if (j==tiempo) {
                    ocultar_notificacion();
                }
                               
            },1000);
        }
        
        
    }
    
    function ocultar_notificacion(){
        
        var i=parseInt($("#notificacion").css("bottom"));//Obtiene valor actual del "bottom"       
        
        if (i==5) {
            var temp=setInterval(function(){
            if (i==-130) {
                clearInterval(temp);
            }
            $("#notificacion").css("bottom",i)
            i=i-1;
            },5);
        }
        return;
    }

    function bloquearPagina(desaperecerClick){
        var onClick = '';
        
        if (desaperecerClick==true) {
            onClick = 'onclick="desbloquearPagina()"';
        }
        if (!$('pantallaBloqueada').length){
            $("body").append('<div class="pantallaBloqueada" id="pantallaBloqueada" '+onClick+' style="display:none"></div>'); 
        }
        $("#pantallaBloqueada").css( "display", "block" );
    }
    
    function desbloquearPagina(){
        $("#pantallaBloqueada").css( "display", "none" );
    }