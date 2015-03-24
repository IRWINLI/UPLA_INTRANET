//=================================================================================================================
//================================================ FUNCIONES SALONES ==============================================
//=================================================================================================================
    var agrear_fila=function(tb,f)
    {
        var array_hora_ult=$.trim(($("#horas_"+($("#cant_filas_horario").val())).text()).split("-")[1]).split(":");
        var i; 
        var j;                                       
        var cuartos=["00","15","30","45"];
        switch(array_hora_ult[1])
        {
            case "00": i=3;j=parseInt(array_hora_ult[0]);break;
            case "15": i=0;j=parseInt(array_hora_ult[0])+1;break;
            case "30": i=1;j=parseInt(array_hora_ult[0])+1;break;
            case "45": i=2;j=parseInt(array_hora_ult[0])+1;break;
        }                    
        tabla_add_nuevosalon(((array_hora_ult[0]+":"+array_hora_ult[1])+" - "+(dosdigitos(j+"")+":"+cuartos[i])),tb,f);
    }    

    var ver_salones=function()
    {  
        if(v_ver_salones())
        {
            $("#fac_tmp").val($("#cmb_facultad").val());
            $("#carr_tmp").val($("#cmb_car_").val());
            $("#esp_tmp").val($("#cmb_esp_").val());
            $("#sed_tmp").val($("#cmb_sed_").val());
            $("#mod_tmp").val($("#cmb_mod_").val());
            $("#cic_tmp").val($("#sel_ciclo").val());

            $("#cmb_catsec_").hide();
            $("#txt_sec_x").show();            
            $("#tbDetalle_salones").empty();
            $("#txt_sec_x").attr("disabled","disabled");
            //$("#txt_lug_x").attr("disabled","disabled");
            //$("#txt_aul_x").attr("disabled","disabled");      

            $("#txt_sec_x").css("background","rgb(233, 233, 233)");
            //$("#txt_lug_x").css("background","rgb(233, 233, 233)");
            //$("#txt_aul_x").css("background","rgb(233, 233, 233)");   

            $("#btn_guardar_tb").attr("disabled","disabled");      
            $("#btn_guardar_tb").text("Continuar!");  

            limpiar();
            
            Cargando("cargando_tabla","versalones");
            
            var params={};
            
            params['FacSal_']=$("#cmb_facultad").val();
            params['carr_']=$("#cmb_car_").val();
            params['esp_']=$("#cmb_esp_").val();

            params['sed_']=$("#cmb_sed_").val();
            params['mod_']=$("#cmb_mod_").val();
            params['niv_']=$("#sel_ciclo").val();

            $.ajax({
                    data : params,
                    type: "GET",
                    url: "buscarSalones",
                    dataType: "json",
                    success : function(data) 
                    {                        
                        var i=1;
                        $.each(data, function(index, value) 
                        {   
                            if(!(data[index][0]=='No hay datos'))                                                                    
                                tabla_add_salones(i,$.trim(data[index][0]),$.trim(data[index][1]),$.trim(data[index][2]),$.trim(data[index][3]),"tbDetalle_salones","cant_filas_sal");                                

                            i+=1;                                                            
                        });
                       
                        Cargando("versalones","cargando_tabla");
                    },
                    error: function() 
                    {                    
                        //aviso("buscarSalones no devuelve datos utilizables!","white","black");                                                                
                        location.reload();
                        ocultarCargando();
                    }
            });

        }
        
    }

    var tabla_add_salones=function(i,cod,sec,loc,aul,tab,item)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val(); 
        
        var strHtml1 = "<td><input type='hidden' name='priv_"+oId+"' id='priv_"+oId+"' value='"+cod+"' />" + i +"</td>";    
        var strHtml2 = "<td><input type='hidden' name='sec_"+oId+"' id='sec_"+oId+"' value='"+sec+"' />" + sec +"</td>";    
        var strHtml3 = "<td><input type='hidden' name='loc_"+oId+"' id='loc_"+oId+"' value='"+loc+"' />" + loc +"</td>";    
        var strHtml4 = "<td><input type='hidden' name='aul_"+oId+"' id='aul_"+oId+"' value='"+aul+"' />" + aul +"</td>";    
        var strHtmlTr = "<tr onmouseover=colortb1=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb1; style='cursor: pointer;' id='"+tab+"_" + oId + "' align='center' onclick=opcionesdefila("+oId+",'"+tab+"','"+item+"'); ></tr>";
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    var dosdigitos=function(num)
    {        
        if(num.length<2)
            return "0"+num;
        else
            return num;
    }

    var tabla_add_capacidad=function(i,cod,cur,arr_dias,ocu,tab,item,cant)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val();                

        var strHtml1 = "<td style='width: 17px;'><input type='hidden' name='codarray_"+oId+"' id='codarray_"+oId+"' value='"+cod+"' />" + i +"</td>";    
        var strHtml2 = "<td>" + cur +"</td>";    
        var strHtml3 = "<td>" + ((typeof(arr_dias[2])=="undefined")?"":arr_dias[2]) +"</td>";    
        var strHtml4 = "<td>" + ((typeof(arr_dias[3])=="undefined")?"":arr_dias[3]) +"</td>";    
        var strHtml5 = "<td>" + ((typeof(arr_dias[4])=="undefined")?"":arr_dias[4]) +"</td>";    
        var strHtml6 = "<td>" + ((typeof(arr_dias[5])=="undefined")?"":arr_dias[5]) +"</td>";    
        var strHtml7 = "<td>" + ((typeof(arr_dias[6])=="undefined")?"":arr_dias[6]) +"</td>";    
        var strHtml8 = "<td>" + ((typeof(arr_dias[7])=="undefined")?"":arr_dias[7]) +"</td>";    
        var strHtml9 = "<td>" + ((typeof(arr_dias[1])=="undefined")?"":arr_dias[1]) +"</td>";    
        var strHtml10 = "<td>" + ocu +"</td>";  
        var strHtml11 = "<td><select class='detalle_' name='sel_cant_"+oId+"' id='sel_cant_"+oId+"' onchange='asig_cantcurso($(this).val(),"+oId+","+ocu+");' onkeyup='asig_cantcurso($(this).val(),"+oId+","+ocu+");' onclick='asig_cantcurso($(this).val(),"+oId+","+ocu+");' style='width: 50px;height:25px;font: icon;font-size: 12px;'><option value='00'>00</option>"+'<option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option>'+"</select></td><script>$('#sel_cant_"+oId+" option[value="+cant+"]').attr('selected',true);</script>";            
        //var strHtml12 = "<td><textarea id='ta_obs_"+oId+"' rows='2' cols='15' onkeyup='asig_obscurso($(this).val(),"+oId+");' >"+obs+"</textarea></td>";
        var strHtmlTr = "<tr onmouseover=colortb1=$(this).css('background'); onmouseout=this.style.backgroundColor=colortb1; style='cursor: pointer;' id='"+tab+"_" + oId + "' align='center'></tr>";
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8 + strHtml9 + strHtml10 + strHtml11; //+ strHtml12;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    var asig_cantcurso=function(cant,id,ocu)
    {   
        if(parseInt(ocu)>parseInt(cant))
        {            
            $("#sel_cant_"+id).val(dosdigitos(ocu+""));
            //cajaColor("sel_cant_"+id,"red");                
            notificacion(1,"¡Advertencia!","La capacidad no puede ser menor, a los inscritos.",4);                                        
            cant=ocu;
        }
         //avisoLimpiar("sel_cant_"+id);    

        var array_codigos=$("#codarray_"+id).val().split(",");
        for (var i = 0; i < array_codigos.length; i++) 
        {            
            var array_tmp=array_celdas_horario_curso[array_codigos[i]].split("_");
            array_tmp[array_tmp.length-2]=cant;                
            array_celdas_horario_curso[array_codigos[i]]="";
            var j = 0;
            for (; j<array_tmp.length-1; j++) 
            {
                array_celdas_horario_curso[array_codigos[i]]+=array_tmp[j]+"_";
            }            
            array_celdas_horario_curso[array_codigos[i]]+=array_tmp[j];
        }                   
    }

    var asig_obscurso=function(obs,id)
    {                 
        
        var array_codigos=$("#codarray_"+id).val().split(",");
        for (var i = 0; i < array_codigos.length; i++) 
        {            
            var array_tmp=array_celdas_horario_curso[array_codigos[i]].split("_");                
            array_tmp[array_tmp.length-1]=$.trim(obs);
            array_celdas_horario_curso[array_codigos[i]]="";
            var j = 0;
            for (; j<array_tmp.length-1; j++) 
            {
                array_celdas_horario_curso[array_codigos[i]]+=array_tmp[j]+"_";
            }            
            array_celdas_horario_curso[array_codigos[i]]+=array_tmp[j];
        }               
       
             
    }

    var reg_salon__=function()
    {   
        
        var cade_="";        
        for(i=0;i<array_celdas_horario_curso.length;i++)  
        {
            if(array_celdas_horario_curso[i]!="")
                cade_+=array_celdas_horario_curso[i].replace(/-/g, "")+"-";
                
        }                       

        var llave=true;
        
        for (var i = 1; i <= parseInt($("#cant_filas_capahorario").val()); i++) 
        {            
            if($("#sel_cant_"+i).val()=="00")
            {   
                cajaColor("sel_cant_"+i,"red");
                llave=false;
            }
            else
                avisoLimpiar("sel_cant_"+i);
        }

        if(!llave)
            notificacion(1,"¡Advertencia!","Debe asignar las capacidades por curso.",4);                                        

        if(v_reghorario() && llave)
        {            
           mostrarCargando();
        
            var params={};
                           
            params['sec_']=$("#cmb_catsec_ option:selected").text();
            params['fac_']=$("#fac_tmp").val();
            params['carr_']=$("#carr_tmp").val();
            params['esp_']=$("#esp_tmp").val(); 
            params['moda_']=$("#mod_tmp").val();
            params['sed_']=$("#sed_tmp").val();
            params['niv_']=$("#cic_tmp").val();
            params['loc_']=$("#txt_lug_x").val();  
            params['aul_']=$("#txt_aul_x").val();            
            params['cad_']=cade_; 

            //alert(params['sec_']);
            //alert(params['cad_']);

            $.ajax({
                    data : params,
                    type: "POST",
                    url: "regSalones",
                    dataType: "json",
                    success : function(data) 
                    {                           
                        switch(data['rpta'])
                        {
                            case '0':notificacion(0,"¡Error!","Ocurrio algún problema vuelva a intentarlo.",3);break;
                            case '1':notificacion(1,"¡Advertencia!","Ya no puede crear horarios; esta fuera de fecha.",3);break;
                            case '2':notificacion(2,"¡Felicidades!","Se guardo correctamente.",3);limpiar();$('#fondo_sombra').hide();$('#capacidades_ventana').hide();break;
                            case '3':notificacion(0,"¡Error grave!","Base de Datos.",3);break;
                        }

                        ocultarCargando();
                    },
                    error: function() 
                    {
                       //aviso("regSalones no puedo realizarse!","white","black");                   
                       location.reload();
                    }
            });
        }
    }


    var act_salon__=function()
    {   
        //llenar array[]=indice_cant   
        //alert("actualizar");
        var cade_="";        
        for(i=0;i<array_celdas_horario_curso.length;i++)  
        {
            if(array_celdas_horario_curso[i]!="")
            {
                //alert(codigos_cursos[i]);
                cade_+=array_celdas_horario_curso[i].replace(/-/g, "")+'_'+((typeof(codigos_cursos[i])==="undefined")?'0':codigos_cursos[i])+"-";
            }
        }         
        //alert(codigo_edi);              

        var llave=true;
        
        for (var i = 1; i <= parseInt($("#cant_filas_capahorario").val()); i++) 
        {            
            if($("#sel_cant_"+i).val()=="00")
            {   
                cajaColor("sel_cant_"+i,"red");
                llave=false;
            }
            else
                avisoLimpiar("sel_cant_"+i);
        }

        if(!llave)
            notificacion(1,"¡Advertencia!","Debe asignar las capacidades por curso.",4);                                        

        if(v_reghorario() && llave)
        {            
           // mostrarCargando();

            var params={};
                           
            params['codsaltem_']=codigo_edi;//$("#salonact").val();
            params['sec_']=$("#cmb_catsec_ option:selected").text();
            params['fac_']=$("#fac_tmp").val();
            params['carr_']=$("#carr_tmp").val();
            params['esp_']=$("#esp_tmp").val(); 
            params['moda_']=$("#mod_tmp").val();
            params['sed_']=$("#sed_tmp").val();
            params['niv_']=$("#cic_tmp").val();
            params['loc_']=$("#txt_lug_x").val();  
            params['aul_']=$("#txt_aul_x").val();
            params['cad_']=cade_; 
            params['cod_saltem']=codigo_edi;

            
            //alert(params['codsaltem_']);
            //alert(params['cad_']);
            //alert(params['codsaltem_']);
            //notificacion(1,"¡Advertencia!","En unos momentos habilitaremos la opción de edición, estamos haciendo unos cambios para que pueda editar su horarios y no halla conflictos con las MATRICULAS DE LOS ESTUDIANTES.");

            $.ajax({
                    data : params,
                    type: "POST",
                    url: "actSalones",
                    dataType: "json",
                    success : function(data) 
                    {                           
                        switch(data['rpta'])
                        {
                            case '0':notificacion(0,"¡Error!","Ocurrio algún problema, vuelva a intentarlo.",3);break;
                            case '1':notificacion(1,"¡Advertencia!","Ya no puede crear horarios; esta fuera de fecha.",3);break;
                            case '2':notificacion(2,"¡Felicidades!","Se actualizó correctamente.",3);limpiar();$('#fondo_sombra').hide();$('#capacidades_ventana').hide();break;
                            case '3':notificacion(0,"¡Error grave!","Base de Datos.",3);break;
                        }
                        ocultarCargando();
                    },
                    error: function() 
                    {
                       //aviso("regSalones no puedo realizarse!","white","black");                   
                       location.reload();
                    }
            });
           
        }
    }

    var vercapacidadeshorario=function()
    {  
        if(v_reghorario())
        {
            $("#tbDetalle_capa_horario").empty();
            $("#cant_filas_capahorario").val("0");

            var yarecorri="";
            cont=0;
            for(j=0;j<array_celdas_horario_curso.length;j++)   
            {
                var codi="";
                var array=array_celdas_horario_curso[j].split("_");                 
                var dias_=[];
                var cant="00";
                if(array_celdas_horario_curso[j]!="" && cuantoshayen_array(array[0],yarecorri.split(","))<1)
                {                
                    yarecorri+=array[0]+',';
                    codi=j;
                    dias_[array[4]]="x";
                    //alert(array[1]+") canti 1ro:"+array[9]);
                    cant=array[9];
                    for(i=j+1;i<array_celdas_horario_curso.length;i++)  
                    {            
                        if(array_celdas_horario_curso[i]!="")
                        {   
                            var array_aux=array_celdas_horario_curso[i].split("_");

                            if(array_aux[0]==array[0])
                            {
                                //alert(array[1]+") canti 2do:"+array[9]+" -> "+array_aux[9]+" = "+(array_aux[9]!=array[9]));
                                if(array_aux[9]!=array[9])
                                    cant="00";
                                
                                codi+=","+i;    
                                dias_[array_aux[4]]="x";
                            }                       
                        }            
                    }                    
                    cont++;           
                    
                    tabla_add_capacidad(cont,codi,array[1],dias_,array[8],"tbDetalle_capa_horario","cant_filas_capahorario",dosdigitos(cant));
                }

            }        

            $("#fondo_sombra").show();
            var posicion=$("#btn_guardar_tb").position();        
            $("#capacidades_ventana").css({'left':posicion.left-550, 'top':posicion.top-300});
            $('#capacidades_ventana').show();        
        }
    }

    var cuantoshayen_array=function(cad,array_x)
    {
        var cont=0;
        for(i=0;i<array_x.length;i++)   
        {
            if(cad==array_x[i])
                cont++;
        }
        
        return cont;
    }

    var tabla_add_nuevosalon=function(horas,tab,item)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val(); 
        
        var strHtml1 = "<td id='horas_"+oId+"'><input type='hidden' name='horas_"+oId+"' id='horas_"+oId+"' value='"+horas+"' />" + horas +"</td>";    
        var strHtml2 = "<td style='cursor: pointer;' id='lunes_"+oId+"' onclick=cambiarcolorcelda('lunes_"+oId+"');><input type='hidden' id='lunes_cod_"+oId+"'/></td>";
        var strHtml3 = "<td style='cursor: pointer;' id='martes_"+oId+"' onclick=cambiarcolorcelda('martes_"+oId+"');><input type='hidden' id='martes_cod_"+oId+"'/></td>";
        var strHtml4 = "<td style='cursor: pointer;' id='miercoles_"+oId+"' onclick=cambiarcolorcelda('miercoles_"+oId+"');><input type='hidden' id='miercoles_cod_"+oId+"'/></td>";
        var strHtml5 = "<td style='cursor: pointer;' id='jueves_"+oId+"' onclick=cambiarcolorcelda('jueves_"+oId+"');><input type='hidden' id='jueves_cod_"+oId+"' /></td>";
        var strHtml6 = "<td style='cursor: pointer;' id='viernes_"+oId+"' onclick=cambiarcolorcelda('viernes_"+oId+"');><input type='hidden' id='viernes_cod_"+oId+"''/></td>";
        var strHtml7 = "<td style='cursor: pointer;' id='sabado_"+oId+"' onclick=cambiarcolorcelda('sabado_"+oId+"');><input type='hidden' id='sabado_cod_"+oId+"' /></td>";
        var strHtml8 = "<td style='cursor: pointer;' id='domingo_"+oId+"' onclick=cambiarcolorcelda('domingo_"+oId+"');><input type='hidden' id='domingo_cod_"+oId+"'/></td>";

        var strHtmlTr = "<tr id='"+tab+"_" + oId + "' align='center'></tr>";
        //onclick=eliminarfila("+oId+",'"+tab+"','"+item+"');
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    //color de sombra
    /*
    azul:rgba(0,70,219,0.4)
    verde oscuro:rgba(92,221,92,0.4)
    naranja:rgba(221,164,92,0.4)
    rosado:rgba(185,92,221,0.4)
    celeste:rgba(92,200,221,0.4)
    rojo:rgba(255,0,0,0.4)
    verde limon:rgba(163,255,0,0.4)
    */
    var cambiarcolorcelda=function(obj)
    {
        
        /*
        mejoras:
        Que la seleccion sea hacia arriba tambien.
        */
        var array_obj_aux=obj.split("_");
        //alert(array_horarios[obj]);        
        var tamanio=array_celdas.length;
        //alert(array_horarios[obj]);
        if(typeof(array_horarios[obj])==="undefined" || array_horarios[obj])
        {               
            array_horarios[obj]=false;
            //alert("1ro: "+array_horarios[obj]);
            sombrearitems("#horas_"+array_obj_aux[1],true);

            if(evaluarceldacolor(obj))
                $("#"+obj).css({'background-color':'rgba(221,164,92,0.4)'});            
            //alert("tamaño: "+tamanio);
            if(tamanio==0)
                array_celdas.push(obj);
            else 
            {                
                var ultimo=obj.split('_');
                var penultimo=array_celdas[tamanio-1].split('_');
                //alert(array_celdas[tamanio-1]);
                
                //selecciona hacia abajo
                if((ultimo[0] == penultimo[0]) && (parseInt(ultimo[1])-1 == parseInt(penultimo[1])))
                    array_celdas.push(obj);   
                else                
                {
                    limpiartodaslasceldas();                
                    array_celdas=[];
                    array_horarios=[];                      
                    //agrtegando el actual
                    array_horarios[obj]=false;  
                    sombrearitems("#horas_"+array_obj_aux[1],true);
                    if(evaluarceldacolor(obj))                  
                        $("#"+obj).css({'background-color':'rgba(221,164,92,0.4)'});

                    array_celdas.push(obj);                  
                }
            }                
        }
        else
        {
            array_horarios[obj]=true;
            //alert("2ro: "+array_horarios[obj]);
            sombrearitems("#horas_"+array_obj_aux[1],false);
            //$("#"+obj).css("background-color",(parseInt($.trim(obj.split('_')[1]))%2!=0)?"rgb(255,255,255)":"rgb(208,208,208)");              
            if(evaluarceldacolor(obj))
                $("#"+obj).css({"background-color":"rgb(255,255,255)"});                          
            //alert("falso: "+array_celdas[tamanio-1]);
            //alert("falso: "+obj);
            if(array_celdas[tamanio-1]!=obj)
            {
                limpiartodaslasceldas();
                array_celdas=[];
                array_horarios=[];
            }
            else
                array_celdas.pop();
        }


    }

    var sombrearitems=function(obj,si)
    {
        if(si)
            $(obj).css({'background-color':'rgb(48,48,48)','color':'rgb(180,92,92)'});
        else
            $(obj).css({'background-color':'#D0D0D0','color':'#555'});
    }


    var evaluarceldacolor=function(obj)
    {
        //alert($("#"+obj).css("background-color"));
        return $("#"+obj).css("background-color")==("rgb(255, 255, 255)") || $("#"+obj).css("background-color")==("rgba(221, 164, 92, 0.4)") || $("#"+obj).css("background-color")==("rgba(0, 0, 0, 0)") || $("#"+obj).css("background-color") == "transparent" || $("#"+obj).css("background-color")==("rgba(221, 164, 92, 0.398438)");        
    }

    var limpiartodaslasceldas=function()
    {        
        $("#tb_horario_z tbody tr").each(function(index){            
            //var color_aux=(index%2!=0)?"rgb(255,255,255)":"rgb(208,208,208)";                  
            var color_aux="rgb(255,255,255)";                  
            $(this).children("td").each(function(i)
            {                
                if(i>0)
                {
                    //alert($(this).css("background-color"));
                    //alert($(this).css("background-color")==("rgb(255, 255, 255)"));
                    //alert(($(this).css("background-color")==("rgba(221, 164, 92, 0.4)")));                    
                    //alert("======");
                    if(evaluarceldacolor($(this).attr("id")))
                        $(this).css("background-color",color_aux);
                }
                else
                    $(this).css({"background-color":"#D0D0D0",'color':'#555'});
            });
        });        
    }
    var existe_idTd=function(id,cant)
    {
        //alert("buscando: "+id);
        var respuesta=false;

        /*alert("total"+$("#tb_horario_z tbody tr").length);
        alert("indice"+cant);
        alert("indice"+row);
        if(isNaN(row))
            row=0;
        alert((cant+row));*/
        /*alert($("#tb_horario_z tbody tr").length);
        alert($("#cant_filas_horario").val());
        alert(cant);
        alert(id);*/
        if($("#tb_horario_z tbody tr").length==cant)
            respuesta=true;
        else
        {
            $("#tb_horario_z tbody td").each(function(index)
            {
                if($(this).attr("id")==id)            
                    respuesta=true;
            }); 
        }
            
        return respuesta;
    }

    var devolverRowspanAtds=function()
    {
        $("#tb_horario_z tbody td").each(function(index)
        {               
            if(typeof(array_rowspan_columnas[$(this).attr("id")])!=="undefined")  
                combinarceldas($(this).attr("id"),array_rowspan_columnas[$(this).attr("id")]);                                                
        });
    }

    var quitarRowspanAtds=function(exceptoColum)
    {
        //alert(exceptoColum);
        for(var i=0;i<dias.length;i++) 
        {
            if(dias[i]!=exceptoColum)
            {
                $("#tb_horario_z tbody td").each(function(index)
                {                             
                    if(index>0)
                    {
                        var array_td_col=$(this).attr("id").split("_");                        
                        if(array_td_col[0]==dias[i] && $(this).attr("rowspan")>1)
                            array_rowspan_columnas[$(this).attr("id")]=dividirceldas($(this).attr("id"));                                   
                    }                        
                });     
            }         
        }
        //alert("termino de quitar");
    }

    var dividirceldas=function(indice_x)
    {
        obj_indice=$("#"+indice_x);
        var indice_aux="";
        var array_ind=indice_x.split("_");
        //alert(array_ind[0]);
        switch(array_ind[0])
        {
            case "lunes":indice_aux="horas_";break;
            case "martes":indice_aux="lunes_";break;
            case "miercoles":indice_aux="martes_";break;
            case "jueves":indice_aux="miercoles_";break;
            case "viernes":indice_aux="jueves_";break;
            case "sabado":indice_aux="viernes_";break;
            case "domingo":indice_aux="sabado_";break; 
        }
        //alert("#"+indice_x);
        var cant=parseInt(obj_indice.attr("rowspan"));
        //alert("quitando rowspan: "+obj_indice.attr("rowspan"));
        obj_indice.removeAttr("rowspan");        
        //alert("quitado rowspan: "+obj_indice.attr("rowspan"));
        var inicio=(parseInt(array_ind[1])+1);
        var fin=(inicio+cant-2);
        for (var i = inicio,j=1; i<=fin; i++,j++)    
            $("<td style='cursor: pointer;' id='"+array_ind[0]+"_"+i+"' onclick=cambiarcolorcelda('"+array_ind[0]+"_"+i+"');><input type='hidden' id='"+array_ind[0]+"_cod_"+i+"'/>").insertAfter("#"+indice_aux+(parseInt(array_ind[1])+j));                 
                       
        return cant;
    }

    var combinarceldas=function(obj,cont)
    {
        $("#"+obj).attr("rowspan",cont);
        var array_aux=obj.split("_");
        
        for(var i=parseInt(array_aux[1])+1;i<parseInt(array_aux[1])+cont;i++)
        {
            $("#"+array_aux[0]+"_"+i).remove();
        }        
        limpiartodaslasceldas();                
        array_celdas=[];
        array_horarios=[];   

    }

    var generarhoras=function(horas,tab,item)
    {
        $("#btn_guardar_tb").show();
        $("#btn_ranghoras_tb").hide();
        for (var i = 0; i < $.inArray($("#cmb_rangodehoras2").val(),horas) ; i++)                             
            tabla_add_nuevosalon((horas[i]+" - "+horas[i+1]),tab,item);            
        
        $("#horas").hide();
        $("#tb_horario_z").show();
        $("#fondo_sombra").hide();
        $("#tb_agregar_aux").show();
    }

    var limpiar=function()
    {
        $("#txt_sec_x").val("");
        $("#txt_lug_x").val("");
        $("#txt_aul_x").val("");
        $("#cmb_catsec_").val("0");
        $("#cmb_catsec_").hide();
        $("#txt_sec_x").show();
        $("#txt_sec_x").attr("disabled","disabled");
        //$("#txt_lug_x").attr("disabled","disabled");
        //$("#txt_aul_x").attr("disabled","disabled");

        $("#txt_sec_x").css("background","rgb(233, 233, 233)");
        //$("#txt_lug_x").css("background","rgb(233, 233, 233)");
        //$("#txt_aul_x").css("background","rgb(233, 233, 233)"); 

        $("#btn_guardar_tb").text("Continuar!");
        $("#btn_ranghoras_tb").attr("disabled","disabled");                    
        $("#btn_guardar_tb").hide();
        $("#btn_ranghoras_tb").hide();
        $("#fild_horario").css("background-color","rgb(190, 190, 190)");      
        $("#field_filtrohorarios").css("background-color","rgb(255, 255, 255)");  
        $("#img_horario").show();  
        $("#versalones").hide();  
        $("#tb_horario_z").hide();
        $("#fild_horario").hide();
        array_horarios=[];
        array_celdas=[];
        array_rowspan_columnas=[];
        
        $("#cursosper").hide();
        $("#horas").hide();

        array_celdas_horario_curso=[];   

        $("#fondo_sombra").hide();    
        avisoLimpiar("cmb_catsec_");
        avisoLimpiar("txt_lug_x");
        avisoLimpiar("txt_aul_x");
        //avisoLimpiar("sel_cant"); 

        $("#btn_cambiar").hide();
        $("#cargando_cursos").hide(); 

        $("#cant_filas_horario").val("0");
        $("#tb_agregar_aux").hide();
        $("#salonact").val("0");
        $("#btnPrinter").hide();
        edicion_o_nuevo='';
        codigo_edi=0;
        codigos_cursos=[];
    }

    var comprobar_cursos=function(obj)
    {
        //alert(">"+obj+"<");
        var arr=[];
        for(i=0;i<array_celdas_horario_curso.length;i++)  
        {
            var reco=array_celdas_horario_curso[i].split("_");

            if(array_celdas_horario_curso[i]!="" && parseInt(reco[8])>0)
            {    
                arr[i]=reco[0];                 
            }
        }        
        
            /*alert(array_celdas_horario_curso[i]);
            alert($.inArray(obj,arr));
            alert(arr2[8]);*/
            
            var indi=$.inArray(obj,arr);            
            
            if(indi>=0)
            {            
                //alert(array_celdas_horario_curso[indi]);            
                if(parseInt(array_celdas_horario_curso[indi].split("_")[8])>0)
                return false;    
            }              
        
        return true;
    }
    codigo_edi=0;
    var verhorario=function(id_)
    {   
        Cargando("cargando_tabla_horarios","");
        
        var params={};            
        params['cod']=$("#priv_"+id_).val();                        
        limpiar();
        codigo_edi=$("#priv_"+id_).val();                        
        $.ajax({
                data : params,
                type: "GET",
                url: "verhorariomatriz",
                dataType: "json",
                success : function(data) 
                {   
                    
                    $.each(data, function(index, value) 
                    {   
                        if(!(data[index][0]=='No hay datos'))                                                                                                    
                            tabla_ver_salonexists($.trim(data[index][1]),$.trim(data[index][2]),$.trim(data[index][3]),$.trim(data[index][4]),$.trim(data[index][5]),$.trim(data[index][6]),$.trim(data[index][7]),$.trim(data[index][8]),$.trim(data[index][9]),'tbDetalle_horario','cant_filas_horario');                                                        
                    });
                    edicion_o_nuevo='e';

                    $("#tb_agregar_aux").show();
                    $("#btnPrinter").show();
                    Cargando("","cargando_tabla_horarios");
                },
                error: function() 
                {                    
                    //aviso("buscarSalones no devuelve datos utilizables!","white","black");                                                                
                    location.reload();
                    //ocultarCargando();
                }
        });

        $("#fild_horario").show();
        $("#txt_sec_x").val($("#sec_"+id_).val());
        $("#txt_lug_x").val($("#loc_"+id_).val());
        $("#txt_aul_x").val($("#aul_"+id_).val());
        $("#tbDetalle_salones").empty();
        $("#tbDetalle_horario").empty();        
        $("#btn_guardar_tb").removeAttr("disabled");      
        $("#btn_guardar_tb").text("Continuar!");
        
        $("#salonact").val(params['cod']);
        

        $("#btn_ranghoras_tb").removeAttr("disabled");    
        $("#btn_guardar_tb").show();
        
        $("#txt_guia1").text($("#cmb_facultad option:selected").text()+" - "+$("#cmb_car_ option:selected").text()+" - "+(($("#cmb_esp_").val()=="SX")?"--":$("#cmb_esp_ option:selected").text()));
        $("#txt_guia2").text($("#cmb_sed_ option:selected").text()+" - "+$("#cmb_mod_ option:selected").text()+" - "+$("#sel_ciclo option:selected").text()+" CICLO");  

        $("#fild_horario").css("background-color","rgb(255, 255, 255)");
        $("#field_filtrohorarios").css("background-color","rgb(190, 190, 190)"); 
        $("#img_horario").hide();
        $("#tb_horario_z").show();
        $("#cant_filas_sal").val("0");  

    }

    contador_semana=[];
    codigos_cursos=[];

    var asignardatostmp=function(dia,cad,oId)
    {   

        var datos=cad.split("_");
        if(datos[0]!="")
        {
            var dia_cod=codigodia(dia);
            var tex="";
            codigos_cursos[array_celdas_horario_curso.length]=datos[0];
            array_celdas_horario_curso.push(datos[1]+"_"+datos[2]+"_"+datos[8]+"_"+datos[9]+"_"+dia_cod+"_"+datos[5]+"_"+datos[6]+"_"+datos[7]+"_"+(datos[3].split("/")[0])+"_"+(datos[3].split("/")[1])+"_"+datos[10]);

            var cod=array_celdas_horario_curso.length-1;
            if($.trim(datos[10])!="")                
                tex=datos[2]+"<br>"+datos[10]+"<br>("+datos[3]+")";        
            else
                tex=datos[2]+"<br>("+datos[3]+")";        

            contador_semana[dia]=parseInt(datos[5]);
            return "<td style='cursor: pointer;background-color:"+datos[6]+";' id='"+dia+"_"+oId+"' rowspan='"+datos[5]+"' onclick=cambiarcolorcelda('"+dia+"_"+oId+"');><input type='hidden' id='"+dia+"_cod_"+oId+"' value='"+cod+"'/><input type='hidden' id='"+dia+"_edit_"+oId+"' value='"+datos[0]+"'/>"+tex+"</td>";            
        }
        else
            return "<td style='cursor: pointer;' id='"+dia+"_"+oId+"' onclick=cambiarcolorcelda('"+dia+"_"+oId+"');><input type='hidden' id='"+dia+"_cod_"+oId+"'/></td>";
     
    }

     var celdas=function(dia,cad,oId)
     {
        var strHtmlx="";

        if(contador_semana[dia]<=1 || typeof(contador_semana[dia])==='undefined')
            strHtmlx = asignardatostmp(dia,cad,oId);
        else        
            contador_semana[dia]=parseInt(contador_semana[dia])-1;            
        
        return strHtmlx
     }

    var tabla_ver_salonexists=function(horas_ini,horas_fin,lu,ma,mi,ju,vi,sa,dom,tab,item)
    {        
        $("#"+item).val(parseInt($("#"+item).val()) + 1);  
        //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
        var oId = $("#"+item).val(); 
        
        var strHtml1 = "<td id='horas_"+oId+"'><input type='hidden' name='horas_"+oId+"' id='horas_"+oId+"' value='"+horas_ini+" - "+horas_fin+"' />" + horas_ini+" - "+horas_fin +"</td>";            
        var strHtml2 = celdas("lunes",lu,oId);
        var strHtml3 = celdas("martes",ma,oId);
        var strHtml4 = celdas("miercoles",mi,oId);
        var strHtml5 = celdas("jueves",ju,oId);
        var strHtml6 = celdas("viernes",vi,oId);
        var strHtml7 = celdas("sabado",sa,oId);
        var strHtml8 = celdas("domingo",dom,oId);

        var strHtmlTr = "<tr id='"+tab+"_" + oId + "' align='center'></tr>";
        //onclick=eliminarfila("+oId+",'"+tab+"','"+item+"');
        var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8;

       //tambien se puede agregar todo el HTML de una sola vez.
        $("#"+tab).append(strHtmlTr);
        //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
        $("#"+tab+"_" + oId).html(strHtmlFinal);
    }

    var nuevohorario=function(id_)
    {        
        if(v_ver_salones())
        {
            limpiar();
            $("#fild_horario").show();
            $("#cmb_catsec_").show();
            $("#txt_sec_x").hide();
            $("#txt_lug_x").removeAttr("disabled");
            $("#txt_aul_x").removeAttr("disabled");
            $("#tbDetalle_salones").empty();
            $("#tbDetalle_horario").empty();            
            $("#btn_guardar_tb").removeAttr("disabled");  
            $("#btn_ranghoras_tb").removeAttr("disabled");
            //$("#btn_guardar_tb").show();
            $("#btn_ranghoras_tb").show();      
            $("#txt_sec_x").css("background","rgb(255, 255, 255)");
            //$("#txt_lug_x").css("background","rgb(255, 255, 255)");
            //$("#txt_aul_x").css("background","rgb(255, 255, 255)");
            $("#btn_guardar_tb").text("Continuar!");            
            $("#fild_horario").css("background-color","rgb(255, 255, 255)");      
            $("#field_filtrohorarios").css("background-color","rgb(190, 190, 190)");      
            $("#img_horario").hide();
            $("#txt_guia1").text($("#cmb_facultad option:selected").text()+" - "+$("#cmb_car_ option:selected").text()+" - "+(($("#cmb_esp_").val()=="SX")?"--":$("#cmb_esp_ option:selected").text()));
            $("#txt_guia2").text($("#cmb_sed_ option:selected").text()+" - "+$("#cmb_mod_ option:selected").text()+" - "+$("#sel_ciclo option:selected").text()+" CICLO");  
            $("#cant_filas_horario").val("0");        

            //temporales para guardar la ubicacion en el sistema académico

            $("#fac_tmp").val($("#cmb_facultad").val());
            $("#carr_tmp").val($("#cmb_car_").val());
            $("#esp_tmp").val($("#cmb_esp_").val());
            $("#sed_tmp").val($("#cmb_sed_").val());
            $("#mod_tmp").val($("#cmb_mod_").val());
            $("#cic_tmp").val($("#sel_ciclo").val());

            $("#btn_agregar").show();
            $("#btn_cambiar").hide();
            $("#salonact").val("0");
        }                
    }

    var cargarcmbplanestudio=function()
    {
        $.get("planEstfiltroz", 
        { 
            carr: $("#cmb_car_").val(),
            esp: $("#cmb_esp_").val()             
        },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                $('#cmb_planes').empty();
                if(resultado != false)            
                {                
                    $('#cmb_planes').append(resultado);  
                    cargarcmbcursos();
                    //Cargando("cmb_esp_","cargando_especialidad");
                }
                else
                {
                    //Cargando("cmb_cursos","cargando_especialidad");
                }
            }
        });
    }

    var cargarcmbcursos=function()
    {
        Cargando("cargando_cursos","cmb_cursos");
        $.get("cursosfiltroz", 
        { 
            carr: $("#cmb_car_").val(),
            esp: $("#cmb_esp_").val(),
            ciclo: $("#sel_ciclo").val(),
            planEst: $("#cmb_planes").val(), 
        },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                $('#cmb_cursos').empty();
                if(resultado != false)            
                {                
                    $('#cmb_cursos').append(resultado);  
                    Cargando("cmb_cursos","cargando_cursos");
                }
                else
                {
                    Cargando("cmb_cursos","cargando_cursos");
                }
            }
        });
    }



    var rangodehoras=function()
    {        
        if(v_reghorario_primero())
        {      
            $("#fondo_sombra").show();
            var posicion=$("#btn_ranghoras_tb").position();        
            $("#horas").css({'left':posicion.left-300, 'top':posicion.top-150});
            $("#horas").show();            
            generarhorashasta();   
        }
    }

    hora_inicio="";
    hora_fin="";
    dia_cod="";

    var agregarcurso=function(id_cuadro)
    {        
        var array_aux=id_cuadro.split("_");

        $("#fondo_sombra").show();

        var posicion=$("#"+id_cuadro).position();  

        $("#cursosper").css({'left':posicion.left+60, 'top':posicion.top-400});        
        $('#cursosper').show();   

        var hora=($("#horas_"+array_aux[1]).text()+" "+$("#horas_"+(parseInt(array_aux[1])+parseInt($("#"+id_cuadro).attr("rowspan"))-1)).text()).split("-");        
        var h_ini=$.trim(hora.shift());
        var h_fin=$.trim(hora.pop());

        $("#cursosper_tit").text("CURSO / "+array_aux[0]+": "+h_ini+" - "+h_fin);
        $("#indice_horario").val(id_cuadro);

        hora_inicio=h_ini;
        hora_fin=h_fin;
        dia_cod=codigodia(array_aux[0]);
    }

    var editarcurso=function(id_cuadro)
    {        
        var array_aux=id_cuadro.split("_");

        $("#fondo_sombra").show();
        
        var posicion=$("#"+id_cuadro).position();  

        $("#cursosper").css({'left':posicion.left+60, 'top':posicion.top-400});        
        $('#cursosper').show();   

        var hora=($("#horas_"+array_aux[1]).text()+" "+$("#horas_"+(parseInt(array_aux[1])+parseInt($("#"+id_cuadro).attr("rowspan"))-1)).text()).split("-");        
        var h_ini=$.trim(hora.shift());
        var h_fin=$.trim(hora.pop());

        $("#cursosper_tit").text("CURSO / "+array_aux[0]+": "+h_ini+" - "+h_fin);
        $("#indice_horario").val(id_cuadro);

        //**************************
        /*alert($("#"+array_aux[0]+"_cod_"+array_aux[1]).val());
        alert(array_celdas_horario_curso[$("#"+array_aux[0]+"_cod_"+array_aux[1]).val()]);*/

        var array_valcelda=array_celdas_horario_curso[$("#"+array_aux[0]+"_cod_"+array_aux[1]).val()].split("_");
        /*alert(array_valcelda[7]);
        alert(array_valcelda[0]);
        alert(array_valcelda[1]);
        alert(array_valcelda[6]);
        alert(colorfondocelda_rgba(array_valcelda[6]));*/
                
        $("#cmb_planes").val(array_valcelda[7]); 
        Cargando("cargando_cursos","cmb_cursos");        
        $.get("cursosfiltroz", 
        { 
            carr: $("#carr_tmp").val(),
            esp: $("#esp_tmp").val(),
            ciclo: $("#cic_tmp").val(),
            planEst: array_valcelda[7], 
        },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                $('#cmb_cursos').empty();
                if(resultado != false)            
                {                
                    $('#cmb_cursos').append(resultado);  
                    $("#cmb_cursos").val(array_valcelda[0]);

                    if(comprobar_cursos(array_valcelda[0]))
                        $("#cmb_cursos").prop("disabled",true);
                   
                    Cargando("cmb_cursos","cargando_cursos");
                }
                else
                {
                    Cargando("cmb_cursos","cargando_cursos");
                }
            }
        });
        $("#ta_obs_x").val(array_valcelda[10]);
        //$("#sel_cant").val(array_valcelda[1]);
        $("#cmb_colorcelda").val(colorfondocelda_rgba(array_valcelda[6]));
        //**************************        
        hora_inicio=h_ini;
        hora_fin=h_fin;
        dia_cod=codigodia(array_aux[0]);
    }

    var colorfondocelda_rgba=function(color)
    {
        switch(color)
        {
            case "rgb(255,255,255)":return "BLANCO";
            case "rgba(0,70,219,0.4)":return "AZUL";
            case "rgba(92,221,92,0.4)":return "VERDE";
            case "rgba(250, 230, 0, 0.4)":return "AMARILLO";
            case "rgba(185,92,221,0.4)":return "ROSADO";
            case "rgba(92,200,221,0.4)":return "CELESTE";
            case "rgba(255,0,0,0.4)":return "ROJO";
            case "rgba(163,255,0,0.4)":return "LIMON";
            case "rgba(138, 77, 10, 0.4)":return "MARRON";
            case "rgba(88, 0, 219, 0.4)":return "VIOLETA";
            case "rgba(0, 219, 210, 0.4)":return "CELESTE_AGUA";
            case "rgba(255, 163, 0, 0.4)":return "NARANJADO";
            case "rgba(204, 171, 0, 0.4)":return "AMARILLO_OSCURO";
            case "rgba(75, 0, 117, 0.4)":return "MORADO";
            case "rgba(0, 104, 185, 0.4)":return "CELESTE_OSCURO";
            case "rgba(156, 0, 0, 0.4)":return "ROJO_OSCURO";
            case "rgba(5, 122, 28, 0.4)":return "VERDE_OSCURO";
            case "rgba(255, 182, 182, 0.4)":return "ROSADO_CLARO";            
        }        
    }

    var codigodia=function(dia)
    {
        switch($.trim(dia).toLowerCase())
        {
            case "domingo":return 1;
            case "lunes":return 2;
            case "martes":return 3;
            case "miercoles":return 4;
            case "jueves":return 5;
            case "viernes":return 6;
            case "sabado":return 7;
        }
    }

    array_celdas_horario_curso=[];

    var agregarhora_tabla=function()
    {   
        //if(v_agregarhra_tabla())
        //{
            obj=$("#"+$("#indice_horario").val());
            //obj.empty();
            //obj.append($("#cmb_cursos option:selected").text()+"<br>(0/"+$("#sel_cant").val()+")");
            //alert($("#ta_obs_x").val());
            if($.trim($("#ta_obs_x").val())=='')        
                obj.append($("#cmb_cursos option:selected").text());        
            else
                obj.append($("#cmb_cursos option:selected").text()+'<br>'+$.trim($("#ta_obs_x").val())) ;        

            var colorfondo=colorfondocelda($("#cmb_colorcelda").val());
            obj.css('background-color',colorfondo);  

            array_celdas_horario_curso.push($("#cmb_cursos").val()+"_"+$("#cmb_cursos option:selected").text()+"_"+hora_inicio+"_"+hora_fin+"_"+dia_cod+"_"+((typeof(obj.attr("rowspan"))==="undefined")?'1':obj.attr("rowspan"))+"_"+colorfondo+"_"+$("#cmb_planes").val()+"_0"+"_00_"+$.trim($("#ta_obs_x").val()));
            var array_obj=obj.attr("id").split("_");
            $("#"+array_obj[0]+"_cod_"+array_obj[1]).val(array_celdas_horario_curso.length-1);

            $('#cursosper').hide(); 
            $("#fondo_sombra").hide();           
        //}        
    }


    var volvernormalcelda=function(obj)
    {
        var obj_array=obj.split("_");
        //alert(array_celdas_horario_curso[$("#"+obj_array[0]+"_cod_"+obj_array[1]).val()]);
        array_celdas_horario_curso[$("#"+obj_array[0]+"_cod_"+obj_array[1]).val()]="";
        //alert(array_celdas_horario_curso[$("#"+obj_array[0]+"_cod_"+obj_array[1]).val()]);
        var codigo="<input type='hidden' id='"+obj_array[0]+"_cod_"+obj_array[1]+"'/>";        
        $("#"+obj).text("");
        $("#"+obj).append(codigo);
        $("#"+obj).css("background-color","rgb(255,255,255)");                                                          
    }

    var v_agregarhra_tabla=function()
    {
        avisoLimpiar("sel_cant");        

        //---------------------------------------------------------------------------
                       
        if($("#sel_cant").val()!="0")
        {
            aviso("","","");
            return true;                            
        }
        else
        {     
            notificacion(1,"¡Advertencia!","Debe escoger la capacidad por curso.",3);                        
            cajaColor("sel_cant","red");  
        } 
                
        //---------------------------------------------------------------------------
                
        return false;
    }

    var colorfondocelda=function(color)
    {
        switch(color)
        {
            case "BLANCO":return "rgb(255,255,255)";
            case "AZUL":return "rgba(0,70,219,0.4)";
            case "VERDE":return "rgba(92,221,92,0.4)";
            case "AMARILLO":return "rgba(250, 230, 0, 0.4)";            
            case "ROSADO":return "rgba(185,92,221,0.4)";
            case "CELESTE":return "rgba(92,200,221,0.4)";
            case "ROJO":return "rgba(255,0,0,0.4)";
            case "LIMON":return "rgba(163,255,0,0.4)";
            case "MARRON":return "rgba(138, 77, 10, 0.4)";    
            case "VIOLETA":return "rgba(88, 0, 219, 0.4)";
            case "CELESTE_AGUA":return "rgba(0, 219, 210, 0.4)";
            case "NARANJADO":return "rgba(255, 163, 0, 0.4)";
            case "AMARILLO_OSCURO":return "rgba(204, 171, 0, 0.4)";
            case "MORADO":return "rgba(75, 0, 117, 0.4)";
            case "CELESTE_OSCURO":return "rgba(0, 104, 185, 0.4)"; 
            case "ROJO_OSCURO":return "rgba(156, 0, 0, 0.4)";
            case "VERDE_OSCURO":return "rgba(5, 122, 28, 0.4)"; 
            case "ROSADO_CLARO":return "rgba(255, 182, 182, 0.4)"; 
        }        
    }

    var opcionesdefila=function(id_,tb_,can_)
    {              
        
        $("#dialog-confirm-operacion").dialog({
            resizable: false,
            
            width:350,            
            modal: true,
            position: ["center",300],
            buttons: {
                'Ver Salón': function() 
                {
                    verhorario(id_);      
                    $( this ).dialog( "close" );
                },
                'Eliminar': function() 
                {
                    eliminarFila(id_);
                    $( this ).dialog( "close" );
                }
            }
        });  
    }


    var eliminarFila=function(id)
    {              
        
        $("#dialog-confirm-eliminar").dialog({
            resizable: false,
            
            width:350,            
            modal: true,
            position: ["center",300],
            buttons: {
                Cancel: function() {
                    $(this).dialog('close');
                },
                'confirmar': function() 
                {
                    eliminar_item(id);      
                    $( this ).dialog( "close" );
                }                
            }
        });  
    }

    function eliminar_item(id)
    {

        var params={};
               
        params['codsalon_']=$("#priv_"+id).val();

        $.ajax({
        data : params,
        type: "POST",
        url: "eliminarSalones",
        dataType: "json",
        success : function(data) 
        {   
            switch(data['rpta'])
            {
                case '0':notificacion(0,"¡Error!","Ocurrio algún problema vuelva a intentarlo.",3);break;
                case '1':notificacion(1,"¡Advertencia!","Operación cancelada, existen alumnos matriculados en este horario.",5);break;
                case '2':notificacion(2,"¡Felicidades!","Se eliminó correctamente.",3);ver_salones();cargarcmbplanestudio();break;
                case '3':notificacion(0,"¡Error grave!","Base de Datos.",3);break;                
            }

        },
        error: function() 
        {
            //aviso("eliminarSalones no puedo realizarse!","white","black");                    
            location.reload();
        }
        });  

    }

    function editar__(oId)
    {        
        $("#dialog-form" ).dialog( "open" );
        $("#l_titpop").text($("#i_seccion_" + oId).val());        
        $("#name").val($("#i_cant_x_" + oId).val());
        $("#x_edit").val(oId);
        $("#i_desd_").val($("#i_descrip_" + oId).val());        
        var axu_codcur=$("#eliminar_check" + oId).val();  
        $("#i_x_cod").val(axu_codcur);   


        var aux=$("#i_seccion_" + oId).val();       
        var num=aux.substring(0,aux.indexOf("->"));  
/*
         if($("#x_especi").val()=='SX')
            var car_esp_=$("#x_carrera").val();
        else                        
            var car_esp_=$("#x_especi").val();
 */

        $.get("lista_cursalEdit", { ciclo: numero_ciclo(num),carr:$("#x_carrera").val(),esp:$("#x_especi").val()} ,function(resultado)
        {
            if(resultado == false)
            {
                $('#f_lista_edit').empty();
                $('#f_lista_edit').append("No existe información...");  
            }
            else
            {
                $('#f_lista_edit').empty();
                $('#f_lista_edit').append(resultado);

                    $.get("seleccioncursos", {cod_cur:axu_codcur} ,function(resultado_aux)
                    {
                        if(resultado_aux != false)
                        {
                            for(c=0;c<parseInt($("#cant_checksalEdit").val());c++)
                            {   
                               if(resultado_aux.indexOf($("#cbEdit"+c).val())!=-1)
                                $("#cbEdit"+c).prop("checked", "checked");                           
                            }
                        }
                    });               
                                                     
            }
        });
    }  

    var v_ver_salones=function()
    {

        avisoLimpiar("cmb_facultad");
        avisoLimpiar("cmb_car_");
        avisoLimpiar("cmb_esp_");
        avisoLimpiar("cmb_sed_");
        avisoLimpiar("cmb_mod_");
        avisoLimpiar("sel_ciclo");

        //---------------------------------------------------------------------------
        if($("#cmb_facultad").val()!="0")
        {
            
            if($("#cmb_car_").val()!="0")
            {                
                if($("#cmb_esp_ option").length==1 ||($("#cmb_esp_ option").length>1 && $("#cmb_esp_").val()!="SX"))
                {                    
                    if($("#cmb_sed_").val()!="0")
                    {
                        if($("#cmb_mod_").val()!="0")
                        {
                            if($("#sel_ciclo").val()!="0")
                            {                              
                                aviso("","","");
                                return true;
                            }
                            else
                            {     
                                notificacion(1,"¡Advertencia!","Debe escoger un ciclo.",3);
                                cajaColor("sel_ciclo","red");                 
                            }
                        }
                        else
                        {     
                            notificacion(1,"¡Advertencia!","Debe escoger una modalidad.",3);
                            cajaColor("cmb_mod_","red");                 
                        }
                    }
                    else
                    {     
                        notificacion(1,"¡Advertencia!","Debe escoger una sede.",3);
                        cajaColor("cmb_sed_","red");                 
                    } 
                }
                else
                {     
                    notificacion(1,"¡Advertencia!","Debe escoger una especialidad.",3);
                    cajaColor("cmb_esp_","red");                 
                }                                
            }
            else
            {     
                notificacion(1,"¡Advertencia!","Debe escoger una carrera.",3);
                cajaColor("cmb_car_","red");                 
            }
        }
        else
        {   
            notificacion(1,"¡Advertencia!","Debe escoger una facultad.",3);
            cajaColor("cmb_facultad","red");         
        }
        //---------------------------------------------------------------------------
                
        return false;
    }

    var celdasocupadas=function()
    {
        var cant=0;

        for(i=0;i<array_celdas_horario_curso.length;i++)
            if(array_celdas_horario_curso[i]!="")
                cant++;

        return cant;
    }

    var v_reghorario=function()
    {

        avisoLimpiar("cmb_catsec_");
        avisoLimpiar("txt_lug_x");
        avisoLimpiar("txt_aul_x");
        
        //---------------------------------------------------------------------------
        if($("#cmb_catsec_").val()!="0" || $("#txt_sec_x").val()!="")
        {            
            if($("#txt_lug_x").val()!="")
            {
                if($("#txt_aul_x").val()!="")
                {   
                    if(celdasocupadas()>0)
                    {
                        aviso("","","");
                        return true;                            
                    }
                    else
                    {     
                        notificacion(1,"¡Advertencia!","Debe escoger al menos un curso.",7);                        
                    } 
                }
                else
                {     
                    notificacion(1,"¡Advertencia!","Debe ingresar el aula.",3);
                    cajaColor("txt_aul_x","red");                 
                }                                
            }
            else
            {     
                notificacion(1,"¡Advertencia!","Debe ingresar el local.",3);
                cajaColor("txt_lug_x","red");                 
            }
        }
        else
        {   
            notificacion(1,"¡Advertencia!","Debe escoger una sección.",3);
            cajaColor("cmb_catsec_","red");         
        }
        //---------------------------------------------------------------------------
                
        return false;
    }

    var v_reghorario_primero=function()
    {

        avisoLimpiar("cmb_catsec_");
        avisoLimpiar("txt_lug_x");
        avisoLimpiar("txt_aul_x");
        
        //---------------------------------------------------------------------------
        if($("#cmb_catsec_").val()!="0")
        {            
            if($("#txt_lug_x").val()!="")
            {
                if($("#txt_aul_x").val()!="")
                {                    
                    aviso("","","");
                    return true;                                                
                }
                else
                {     
                    notificacion(1,"¡Advertencia!","Debe ingresar el aula.",3);
                    cajaColor("txt_aul_x","red");                 
                }                                
            }
            else
            {     
                notificacion(1,"¡Advertencia!","Debe ingresar el local.",3);
                cajaColor("txt_lug_x","red");                 
            }
        }
        else
        {   
            notificacion(1,"¡Advertencia!","Debe escoger una sección.",3);
            cajaColor("cmb_catsec_","red");         
        }
        //---------------------------------------------------------------------------
                
        return false;
    }

//=================================================================================================================
    var Cargando=function(idMostrar,idOcultar)
    {
        $("#"+idOcultar).hide();
        $("#"+idMostrar).show().css("display", "inline");        
    }
    
    $(function()
    {
    

    $("#cmb_facultad").change(function()
    {        
        cargar_carreras();
    });

    $("#cmb_car_").change(function()
    {
        dependencia_especialidad();
    });   

    // cargando combos -------------
    function cargar_carreras()
    {
        Cargando("cargando_carrera","cmb_car_");
        $('#cmb_car_').empty();
        document.getElementById("cmb_car_").options.length=0;
        $('#cmb_car_').append('<option value="0">CARRERA</option>');  

        var x=$("#cmb_facultad").val();
        $.get("carrera", { code: x }, function(resultado)
        {
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_car_').append(resultado);         
                    Cargando("cmb_car_","cargando_carrera");
                }
                else
                {
                    Cargando("cmb_car_","cargando_carrera");   
                }
            }

        }); 

        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>');         

    }
        
    function dependencia_especialidad()
    {        
        Cargando("cargando_especialidad","cmb_esp_");
        $('#cmb_esp_').empty();
        document.getElementById("cmb_esp_").options.length=0;
        $('#cmb_esp_').append('<option value="SX">ESPECIALIDAD</option>'); 

        var code = $("#cmb_car_").val();
        
        $.get("especialidad", { code: code },
        function(resultado)
        {            
            if($.trim(resultado)=='salir')
            {
                location.reload();
            }
            else
            {
                if(resultado != false)            
                {                
                    $('#cmb_esp_').append(resultado);  
                    Cargando("cmb_esp_","cargando_especialidad");
                }
                else
                {
                    Cargando("cmb_esp_","cargando_especialidad");
                }
            }
        });
    }
});