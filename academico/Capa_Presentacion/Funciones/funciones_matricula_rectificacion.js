//================= VARIABLES GLOBALES NECESARIAS PARA INTERACTUAR CON LAS FUNCIONES ======================
//=========================================================================================================

/* Arreglos que almacenan resultados de búsqueda */
var codigoArr=new Array();
var nombreArr=new Array();
var facultadArr=new Array();
var carreraArr=new Array();
var especialidadArr=new Array();
var carrera_idArr=new Array();
var especialidad_idArr=new Array();
var plan_idArr=new Array();
var pagoMatriculaArr = new Array();
var estaMatriculadoArr = new Array();
/* Contador que asigna un indice a los resultados de la búsqueda */
var contador=0;

/*Variables que almacenan datos del estudiante seleccionado luego de la búsqueda*/
var car;
var esp;
var plan;
var codEst;

/* Arreglos que almacena asignaturas matriculables del estudiante seleccionado */
var arregloAsignaturas = new Array(new Array());

var codigoAsignatura = new Array();
var nombreAsignatura = new Array();
var nivelAsignatura = new Array();
var creditosAsignatura = new Array();
var preladoAsignatura_1 = new Array();
var preladoAsignatura_2 = new Array();
var preladoAsignatura_3 = new Array();
var tipoAsignatura = new Array();
var turnoAsignatura = new Array();
var seccionAsignatura = new Array();
var curSalAsignatura = new Array();
var turnoManana = new Array();
var turnoTarde = new Array();
var turnoNoche = new Array();


var selecAsignatura = new Array();//Asignatura seleccionada (True o False)
var matriculableAsignatura = new Array();

/* Arreglo que almacena información de cŕeditos */
var arregloCarreraCreditos = new Array();

/*Arreglos que almacenan los ciclos según los cursos seleccionados*/
var ciclosSeleccionados = new Array();//Array para almacenar los ciclos según cursos seleccionados para matricular
var ciclosSeleccionados_creditos=new Array();//Array para almacenar cantidad de créditos los ciclos según cursos seleccionados para matricular


//================= FUNCIÓN QUE REALIZA BÚSQUEDA Y LLAMA A FUNCIÓN QUE AGREGA FILAS A LA GRILLA ===========
//=========================================================================================================

function buscarEstudiante(key)
{
    
    //Obtenemos el valor unicode de la tecla:
    if (key.charCode)unicode=key.charCode;
    else unicode=key.keyCode;
    if (unicode==13) {//Si la tecla presiona es ENTER, se procede...
        var busqueda = $("#txt_estudiante").val();
        if (busqueda !='' && busqueda.length != 0){//Si el valor ingresado no es nulo
            //Cargamos el Pop Up
            //$('#popupbox').load("grilla_Alumnos");
            $('#popupbox').dialog({
                title: "Búsqueda de Estudiante",
                modal: true,
                width: 800,
                height: 400,
                draggable:true,
                position: ["center",100],
                closeOnEscape : "true",
                close: function() { /*Nada..*/ }
            });
            mostrarCargando();//========= Mostrar "Cargando"
            $.ajax({
                data: {busqueda : busqueda},
                type: "GET",
                url: "buscarEstudiantes",
                dataType: "json",
                async:false,
                success: function(data){
                    //alert("JARM");
                    $( "#tablaEstudiantes tr" ).remove();//Se limpia la tabla
                    for(var i=0;typeof(data[i])!= "undefined";i++){
                        
                        /* Basandose en el Procedimiento Almacenado */
                        //data[X][0] -> Codigo
                        //data[X][1] -> Nombre
                        //data[X][2] -> Facultad
                        //data[X][3] -> Carrera
                        //data[X][4] -> Especialidad
                        //data[X][5] -> Carrera_id
                        //data[X][6] -> Especialidad_id
                        //data[X][7] -> Plan_id
                        //data[X][8] -> Matrícula
                        var codigo=data[i][0];
                        var nombre=data[i][1];
                        var facultad=data[i][2];
                        var carrera=data[i][3];
                        var especialidad=data[i][4];
                        var carrera_id=data[i][5];
                        var especialidad_id=data[i][6];
                        var plan_id=data[i][7];
                        var pago=data[i][8];
                        //$('#aviso_busqueda').text("");
                        
                        
                        agregarGrilla(codigo,nombre,facultad,carrera,especialidad,carrera_id,especialidad_id,plan_id,pago,i);
                    }

                //$('#popupbox').load("grilla_Alumnos");
                
                ocultarCargando();//========= Ocultar "Cargando"
                aviso_bien("Se cargó correctamente...");
                },error: function(){
                    location.reload();
                    //alert("Error sistema JSON, vuelva a intentarlo");
                }
            
            })
            //
        }
    }
   
}
   
//=================  FUNCIÓN QUE AGREGA FILAS A LA GRILLA ======================================================================
//==============================================================================================================================
    
function agregarGrilla(codigo,nombre,facultad,carrera,especialidad,carrera_id,especialidad_id,plan_id,pago,posicionCampo) 
{
    if (posicionCampo==0)
    {
        
        nuevaFila = document.getElementById("tablaEstudiantes").insertRow(-1);
        nuevaFila.id = posicionCampo;
                   
        // +CELDAS: Agregamos las nuevas celdas a la fila los campos necesarios, agregando a sus nombres el número de campo:
        nuevaCelda = nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML = '<label>CODIGO</label>';
        
        nuevaCelda = nuevaFila.insertCell(-1);
        nuevaCelda.innerHTML = '<label>ESTUDIANTES</label>';
        
        nuevaCelda = nuevaFila.insertCell(-1);  
        nuevaCelda.innerHTML = '<label>FACULTAD</label>';
                        
        nuevaCelda = nuevaFila.insertCell(-1);  
        nuevaCelda.innerHTML = '<label>CARRERA</label>';
                        
        nuevaCelda = nuevaFila.insertCell(-1);  
        nuevaCelda.innerHTML = '<label>ESPECIALIDAD</label>';
    }
    
        
    // +FILA: Agregamos una nueva fila a la tabla, asignándole a la propiedad "id" el número de campo:
    //document.getElementById("tablaEstudiantes").removeChild();
    nuevaFila = document.getElementById("tablaEstudiantes").insertRow(-1);
    nuevaFila.id = posicionCampo;

    // +CELDAS: Agregamos las nuevas celdas a la fila los campos necesarios, agregando a sus nombres el número de campo:

    nuevaCelda = nuevaFila.insertCell(-1);
    nuevaCelda.innerHTML = '<a  onclick="seleccionarEstudiante('+contador+');"><label>' + codigo + '</label></a>';
                    
    nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<a href="javascript:void(0);" onclick="seleccionarEstudiante('+contador+');"><label>' + nombre + '</label></a>';

    nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<a href="javascript:void(0);" onclick="seleccionarEstudiante('+contador+');"><label>' + facultad + '</label></a>';
                
    nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<a href="javascript:void(0);" onclick="seleccionarEstudiante('+contador+');"><label>' + carrera + '</label></a>';
                
    nuevaCelda = nuevaFila.insertCell(-1);  
    nuevaCelda.innerHTML = '<a href="javascript:void(0);" onclick="seleccionarEstudiante('+contador+');"><label>' + especialidad + '</label></a>';

        
    codigoArr[contador]=codigo;
    nombreArr[contador]=nombre;
    facultadArr[contador]=facultad;
    carreraArr[contador]=carrera;
    especialidadArr[contador]=especialidad;
    carrera_idArr[contador]=carrera_id;
    especialidad_idArr[contador]=especialidad_id;
    plan_idArr[contador]=plan_id;
    pagoMatriculaArr[contador]=pago;    
    estaMatriculadoArr[contador]=false;
    contador++;

    return;
}
    

//================= FUNCIÓN QUE OBTIENE DATOS DE ESTUDIANTE AL SER SELECCIONADO DESDE LA GRILLA ===========
//=========================================================================================================

function seleccionarEstudiante(n)
{
    
    mostrarCargando();//========= Mostrar "Cargando"
    var params={};
    params['codEst']=codigoArr[n];
    
    $.ajax({
	    data : params,
	    type: "GET",
	    url: "comprobarMatricula",
            dataType: "json",
            success : function(data) 
            {
                
                pagoMatriculaArr[n]=data[0][0];
                estaMatriculadoArr[n]=data[0][1];
                

                if (pagoMatriculaArr[n]=='NO PAGO') {
                    ocultarCargando();//========= Ocultar "Cargando"
                    alerta ("Lo sentimos, el estudiante "+nombreArr[n]+" no ha registrado ningún pago de Matrícula. Sin embargo, si el estudiante ya ha pagado, debe esperar la actualización del Banco.");
                    //$('#aviso_busqueda').text("Lo sentimos, el estudiante "+nombreArr[n]+" no ha registrado ningún pago de Matrícula. \nSin embargo, si el estudiante ya ha pagado, debe esperar la actualización del banco.");
                }
                
                else{
                    
                    limpiarFormularios();
                    
                    //$('#popupbox_sinblock').load('Capa_Presentacion/plantillas/plantilla_mod_matricula/grilla_Asignaturas.php');
                    //$('#popupbox_sinblock').draggable();
                    //$('#popupbox_sinblock').show();
                    
                    document.getElementById("codigo_estudiante").value = codigoArr[n];
                    document.getElementById("nombre_estudiante").value = nombreArr[n];
                    document.getElementById("facultad_estudiante").value = facultadArr[n];
                    document.getElementById("carrera_estudiante").value = carreraArr[n];
                    document.getElementById("especialidad_estudiante").value = especialidadArr[n];
                    document.getElementById("planEst_estudiante").value = plan_idArr[n];
                    document.getElementById("Pago_estudiante").value = pagoMatriculaArr[n];
                    
                    
                    $('#txt_estudiante').attr('disabled', true);
                    $('#txt_estudiante').hide();
                    $("#div_buscarAlumno").css("display","block");
                    /* ------------ Para Ocultar pop up ---------- */
                    $('.ui-dialog').hide();
                    $('.ui-widget-overlay').hide();
                    /* ------------------------------------------- */
                    
                    
                    car=carrera_idArr[n];
                    esp=especialidad_idArr[n];
                    plan=plan_idArr[n];
                    codEst=codigoArr[n];
                    
                    
                    obtenerCreditaje(car,esp,codEst);
                    obtenerAsignaturas(car,esp,plan,codEst);
                    
                    ocultarCargando();//========= Ocultar "Cargando"
                    //aviso("Se cargó correctamente...","white","green");
                    

                    


                    if (estaMatriculadoArr[n]!=1) {
                        //alumnosYaMatriculados();
			$('#popupbox_asignaturas').hide();
                        alerta("Este alumno no está matriculado, no puede acceder a la Rectificación de Matrícula..");
                        
                    }
                    
                   
                }
	    }
            ,error: function()
            {
                location.reload();
		//alert("Error de Sistema: JSON");					
	    }
    });

    
    
}




//================= FUNCIÓN QUE OBTIENE LOS DATOS DE CRÉDITAJE DE LA CARRERA Y ESPECIALIDAD ===============
//=========================================================================================================

function obtenerCreditaje(car,esp,codEst)
{
    var params={};
    params['codEst']=codEst;

    
    var ampliar =0;
    
    $.ajax({
	    data : params,
	    type: "GET",
	    url: "consultAmpĺiaCred",
            dataType: "json",
            async:false,
            success : function(data) 
            {
                ampliar=data['rpta'];
	    }
            ,error: function()
            {
                location.reload();
		//alert("Error de Sistema: JSON");					
	    }
    });
    
    
    
    //consultAmpĺiaCred
    var params={};
    params['carEst']=car;
    params['espEst']=esp;
    $.ajax({
	    data : params,
	    type: "GET",
	    url: "listarCreditos",
            dataType: "json",
            success : function(data) 
            {
                arregloCarreraCreditos = new Array();//Se comienza limpiando el arreglo

		for(var i=0;typeof(data[i])!= "undefined";i++){
                    arregloCarreraCreditos[i]=parseInt(data[i][1])+parseInt(ampliar);
                    if (ampliar>0) {
                        $('#txt_observaciones').text("Ampliación de Créditos ("+ampliar+")" );
                    }
                    

                    //alert(arregloCarreraCreditos[i]);
                    //alert(data[i][1]);
                }
	    }
            ,error: function()
            {
                location.reload();
		//alert("Error de Sistema: JSON");					
	    }
    });
        
}


//================= FUNCIÓN QUE OBTIENE Y ALMACENA LAS ASIGNATURAS MATRICULABLES DEL ESTUDUANTE ===========
//=========================================================================================================

function obtenerAsignaturas(car,esp,plan,codEst){
        
        $("#div_constMatricula").css("display","none");
        $("#div_matricular").css("display","block");
    
    
        //Se limpian los arrays que almacenan los cursos antes de listarlos
        codigoAsignatura = new Array();
        nombreAsignatura = new Array();
        nivelAsignatura = new Array();
        creditosAsignatura = new Array();
        preladoAsignatura_1 = new Array();
        preladoAsignatura_2 = new Array();
        preladoAsignatura_3 = new Array();
        tipoAsignatura = new Array();
        turnoAsignatura = new Array();
	seccionAsignatura = new Array();
        curSalAsignatura = new Array();
	selecAsignatura = new Array();//Asignatura seleccionada (True o False)
        matriculableAsignatura = new Array();
        //-------------------------------------------------------------------
        
        //$('#popupbox_asignaturas').load("grilla_asignMatriculables");
        
        mostrar_popupAsignaturas();
        
        var ciclo=0;
        var cont_ciclo=0;
        var resultados=false;
        
        
        var params={};
        params['carEst']=car;
        params['espEst']=esp;
        params['planEst']=plan;
        params['codEst']=codEst;
        

        $.ajax({
            data: params,
            type: "GET",
            url: "asignMatriculables",
            dataType: "json",
            //async:false,
            success : function(data){
                //alert(data);
                //typeof(data[i])!= "undefined"
                for(var i=0;typeof(data[i])!= "undefined";i++){
                    resultados = true;
                    //Basandose en el Procedimiento Almacenado //
                    //data[X][0] -> Codigo de Asignatura
                    //data[X][1] -> Nombre de Asignatura
                    //data[X][2] -> Nivel o Ciclo de Asignatura
                    //data[X][3] -> # de Créditos de Asignatura
                    //data[X][4] -> Prelado 1
                    //data[X][5] -> Prelado 2
                    //data[X][6] -> Prelado 3
                    //data[X][7] -> Estado de Asignatura (N->Normal, X->Con prelado incompleto, E->Electivo)

                    codigoAsignatura[i]=data[i][0];
                    nombreAsignatura[i]=data[i][1];
                    nivelAsignatura[i]=parseInt(data[i][2]);
                    creditosAsignatura[i]=data[i][3];
                    preladoAsignatura_1[i]=data[i][4];
                    preladoAsignatura_2[i]=data[i][5];
                    preladoAsignatura_3[i]=data[i][6];
                    tipoAsignatura[i]=data[i][7];
                    turnoAsignatura[i]="0";
                    seccionAsignatura[i]="0";
		    selecAsignatura[i]=false; //No obtiene datos de BD, sirve para determinar si esta selecta
                    matriculableAsignatura[i]=true;//No obtiene datos de BD, sirve para determinar si es matriculable
                    //aviso("Se cargó correctamente...","white","green");

                   
                    
                    
                    if (parseInt(ciclo) != parseInt(nivelAsignatura[i])){
    
                        cont_ciclo++;
                        ciclo = nivelAsignatura[i];
                        if (cont_ciclo==1) {
                            $('#listaCiclos').append('<option value="'+parseInt(ciclo)+'" selected="selected">'+ciclo+'° nivel</option>');
                            $( "#listaCiclos" ).val(parseInt(ciclo));
                        }
                        else{
                            $('#listaCiclos').append('<option value="'+parseInt(ciclo)+'" >'+ciclo+'° nivel</option>');
                        }
                    }
                    
                }
                
                listarAsignaturasPorNivel();
		cursosYaMatriculados();

                //alert("JARM->"+resultados);
                
            },
            error: function(){
                location.reload();
                //    alert("Error sistema JSON, vuelva a intentarlo");
            } 
        });
        
        
    }
    
    
    
    
    
    
    function mostrar_popupAsignaturas(){
        
        $('#popupbox_asignaturas').show();
        $('#popupbox_asignaturas').draggable();
        /*
        $('#popupbox_asignaturas').dialog({
            title: "Asignaturas Matriculables",
            modal: false,
            width: 400,
            height: 500,
            draggable:true,
            position: [30,50],
            resizable:false,
            closeOnEscape : "true",
            close: function() {
                $("#popupbox_minimizado").css("display", "block");
                }
        });
        */
        $("#popupbox_minimizado").css("display", "none");
    }
    
    function ocultar_popupAsignaturas(){
        
        $('#popupbox_asignaturas').hide();
        $('#popupbox_asignaturas').draggable();
        /*
        $('#popupbox_asignaturas').dialog({
            title: "Asignaturas Matriculables",
            modal: false,
            width: 400,
            height: 500,
            draggable:true,
            position: [30,50],
            resizable:false,
            closeOnEscape : "true",
            close: function() {
                $("#popupbox_minimizado").css("display", "block");
                }
        });
        */
        $("#popupbox_minimizado").css("display", "block");
    }
    
    
    
    
    
    

//================= FUNCIÓN QUE LISTA ASIGNATURAS SEGÚN NIVEL O CICLO SELECCIONADO ========================
//=========================================================================================================

function listarAsignaturasPorNivel() {
    
    var ciclo= $( "#listaCiclos" ).val();//Se obtiene el ciclo seleccionado
    $( "#tabla_cursosMatriculables tr" ).remove();//Se limpia la tabla
    
    var electivosActivos=false;
    var actividadesActivos=false;
        
    for(var i=0;i<codigoAsignatura.length;i++){
        if (selecAsignatura[i] &&  parseInt(nivelAsignatura[i])==ciclo) {
            if (tipoAsignatura[i]=='E') {//Si hay un electivo activo, se activa esta bandera para hacer un recorrido mas adelante y pintar(bloquear) todos los electivos del ciclo
                electivosActivos=true;
            }
            if (tipoAsignatura[i]=='A') {//Si hay una actividad activa, se activa esta bandera para hacer un recorrido mas adelante y pintar(bloquear) todos las actividades del ciclo
                actividadesActivos=true;
            }
        }
    }
    
    for(var i=0;i<codigoAsignatura.length;i++){
        if (i==0) {
            nuevaFila = document.getElementById("tabla_cursosMatriculables").insertRow(-1);
            nuevaFila.innerHTML ='<th>Cod.</th><th>Nombre</th><th>Créd.</th><th style="width:10px;">Selecc.</th>';
        }
            
        //----------------------------------------------------------------------------------------------------------------------------------
            
        if (electivosActivos==true) {//Si hay algun electivo en el ciclo, se vuelve a hacer un recorrido para pintar(bloquear) todos los electivos del ciclo
            for(var j=1;j<codigoAsignatura.length;j++){
                if (tipoAsignatura[i]=='E' && parseInt(nivelAsignatura[i])==ciclo) {
                    //cursoEstado(codigoAsignatura[i],true);
                    matriculableAsignatura[j]=true;
                }
            }
        }
        
        if (actividadesActivos==true) {//Si hay alguna actividad en el ciclo, se vuelve a hacer un recorrido para pintar(bloquear) todas las actividades del ciclo
            for(var j=1;j<codigoAsignatura.length;j++){
                if (tipoAsignatura[i]=='A' && parseInt(nivelAsignatura[j])==ciclo) {
                    //cursoEstado(codigoAsignatura[i],true);
                    matriculableAsignatura[j]=true;
                }
            }
        }
        
        // ----------------- IMPRIMIR -----------------------------------

        if (parseInt(nivelAsignatura[i])==ciclo && matriculableAsignatura[i]==true && selecAsignatura[i]==false) {
                

            if (tipoAsignatura[i]=='N') {//Si es una asignatura normal, las letras son Azules
                var codigo = "'"+codigoAsignatura[i]+"'";
                nuevaFila = document.getElementById("tabla_cursosMatriculables").insertRow(-1);
                nuevaFila.innerHTML ='<input type="hidden" id="tipoAsig_'+codigoAsignatura[i]+'" value="'+tipoAsignatura[i]+'"><td class="asign_normal" id="codigoAsig_'+codigoAsignatura[i]+'">'+codigoAsignatura[i]+'</td><td class="asign_normal" id="nombreAsig_'+codigoAsignatura[i]+'">'+nombreAsignatura[i]+'</td><td class="asign_normal" id="creditosAsig_'+codigoAsignatura[i]+'">'+creditosAsignatura[i]+'</td><td class="asign_normal" id="botonAsig_'+codigoAsignatura[i]+'"><input type="submit" value=">" onclick="javascript:seleccionarCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(92, 103, 162); color:white;"></td>';          
            }
            else if (tipoAsignatura[i]=='E' && electivosActivos==false) {//Si es una asignatura electiva, las letras son Verdes
                var codigo = "'"+codigoAsignatura[i]+"'";
                nuevaFila = document.getElementById("tabla_cursosMatriculables").insertRow(-1);
                nuevaFila.innerHTML ='<input type="hidden" id="tipoAsig_'+codigoAsignatura[i]+'" value="'+tipoAsignatura[i]+'"><td class="asign_electivo" id="codigoAsig_'+codigoAsignatura[i]+'">'+codigoAsignatura[i]+'</td><td class="asign_electivo" id="nombreAsig_'+codigoAsignatura[i]+'">'+nombreAsignatura[i]+'</td><td class="asign_electivo" id="creditosAsig_'+codigoAsignatura[i]+'">'+creditosAsignatura[i]+'</td><td class="asign_electivo" id="botonAsig_'+codigoAsignatura[i]+'"><input type="submit" value=">" onclick="javascript:seleccionarCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(110, 175, 98); color:white;"></td>';                    
            }
            else if (tipoAsignatura[i]=='A' && actividadesActivos==false) {//Si es una asignatura Actividad, las letras son Azules
                var codigo = "'"+codigoAsignatura[i]+"'";
                nuevaFila = document.getElementById("tabla_cursosMatriculables").insertRow(-1);
                nuevaFila.innerHTML ='<input type="hidden" id="tipoAsig_'+codigoAsignatura[i]+'" value="'+tipoAsignatura[i]+'"><td class="asign_actividad" id="codigoAsig_'+codigoAsignatura[i]+'">'+codigoAsignatura[i]+'</td><td class="asign_actividad" id="nombreAsig_'+codigoAsignatura[i]+'">'+nombreAsignatura[i]+'</td><td class="asign_actividad" id="creditosAsig_'+codigoAsignatura[i]+'">'+creditosAsignatura[i]+'</td><td class="asign_actividad" id="botonAsig_'+codigoAsignatura[i]+'"><input type="submit" value=">" onclick="javascript:seleccionarCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(175, 98, 98); color:white;"></td>';
            }
            else if (tipoAsignatura[i]=='X') {//Si es una asignatura con Prelado no completado, las letras son Azules
                var codigo = "'"+codigoAsignatura[i]+"'";
                nuevaFila = document.getElementById("tabla_cursosMatriculables").insertRow(-1);
                nuevaFila.innerHTML ='<input type="hidden" id="tipoAsig_'+codigoAsignatura[i]+'" value="'+tipoAsignatura[i]+'"><td class="asign_preladoIncompleto" id="codigoAsig_'+codigoAsignatura[i]+'">'+codigoAsignatura[i]+'</td><td class="asign_preladoIncompleto" id="nombreAsig_'+codigoAsignatura[i]+'">'+nombreAsignatura[i]+'</td><td class="asign_preladoIncompleto" id="creditosAsig_'+codigoAsignatura[i]+'">'+creditosAsignatura[i]+'</td><td class="asign_preladoIncompleto" id="botonAsig_'+codigoAsignatura[i]+'">Prelado Incompleto</td>';
            }
        }
        
 
        
    }
}

    function cursosYaMatriculados(){

	/*
	seleccionarCurso('11511A');
	seleccionarCurso('11116');
	seleccionarCurso('11212');
	seleccionarCurso('11215');
	
	$("#turnos_11511A").val("MANANA");
	$("#turnos_11116").val("MANANA");
	$("#turnos_11212").val("MANANA");
	$("#turnos_11215").val("MANANA");
	*/
	
	
	var AlumnoCodigo_Matricular = $("#codigo_estudiante").val();
	var params={};
	params['codEst']=AlumnoCodigo_Matricular;
	
	mostrarCargando();
	
	$.ajax({
            data: params,
            type: "GET",
            url: "asignYaMatriculadas",
            dataType: "json",
            async:false,
            success: function(data){
		
		for (var i =0; typeof(data[i])!= "undefined";i++){
		    seleccionarCurso(data[i][0],data[i][1],data[i][2]);
		    
		    
		    
		    for (var j=0; j<codigoAsignatura.length;j++){
			
			if (codigoAsignatura[j]==data[i][0]) {
			    turnoAsignatura[j]=data[i][1];
			    seccionAsignatura[j]=data[i][2];
			    hab_cupo_secc(j);
			}
			
			
		    }
		   
		    //guardarTurno(i);
		}

		
	    },
            error: function(){
        location.reload();
		//alert("Error sistema JSON, vuelva a intentarlo");
            },
                        
        });
    }
    
//================= CUANDO SE SELECCIONA UN CURSO =========================================================
//=========================================================================================================

    function seleccionarCurso(codigoAsig,turnoAsig,seccAsig){
        var agregarCurso =true;
        

	
        for(var i=0;i<codigoAsignatura.length;i++){
	    
	    var nuevoCiclo=nivelAsignatura[i];
			var nuevoCiclo_creditos=creditosAsignatura[i];
            if (codigoAsignatura[i]==codigoAsig) {
                var cicloAgregado=false;
                for (var j=0;j<=ciclosSeleccionados.length;j++){
                    //alert("ciclo>"+ciclosSeleccionados[j]);
                    //alert("ciclo2>"+$('#listaCiclos').val());
                    //if(ciclosSeleccionados[j]==$('#listaCiclos').val()){
		    if(ciclosSeleccionados[j]==nivelAsignatura[i]){
                       ciclosSeleccionados_creditos[j]=parseInt(ciclosSeleccionados_creditos[j])+parseInt(nuevoCiclo_creditos);//Si se selecciona un curso de un nivel ya seleccionado, se aumenta los créditos correspondientes
                       cicloAgregado=true;
                       break;
                    }
                }
                if (cicloAgregado==false) {
                    //alert("Newciclo>"+ciclosSeleccionados[j]);
                    //alert("Newciclo2>"+$('#listaCiclos').val());
                    if (ciclosSeleccionados.length<3) {
			
			var nuevoCiclo=nivelAsignatura[i];
			var nuevoCiclo_creditos=creditosAsignatura[i];
			
			//alert("JARM22-> "+nivelAsignatura[i]+" <->"+nuevoCiclo_creditos);
			
                        ciclosSeleccionados.push(nuevoCiclo);
                        ciclosSeleccionados_creditos.push(nuevoCiclo_creditos);//Si se selecciona un curso de un nivel aún no seleccionado, se agrega el nuevo nivel con los créditos correspondientes
                    }
                    else{
                        alerta("¡Un momento! No es posible asignar asignaturas de más de 3 niveles. Esta asignatura no se agregará.");
                        agregarCurso=false;
                    }
                }
                if (agregarCurso) {

                    
                    
                    
                    var params={};
                    params['carEst']=car;
                    params['espEst']=esp;
                    params['asigCod']=codigoAsignatura[i];
                    params['asigNiv']=ciclo_dosCifras(nivelAsignatura[i]);
                    turnoManana[i]=false;
                    turnoTarde[i]=false;
                    turnoNoche[i]=false;
                    
                    $.ajax({
                        data: params,
                        type: "GET",
                        url: "consultarTurnos",
                        dataType: "json",
                        async:false,
                        success: function(data){

			    
                            var n_turnos = 0
                            for(var j=0;typeof(data[j])!= "undefined";j++){
                                if (data[j]=='MANANA') {turnoManana[i]=true; n_turnos++}
                                else if (data[j]=='TARDE') {turnoTarde[i]=true; n_turnos++}
                                else if (data[j]=='NOCHE') {turnoNoche[i]=true; n_turnos++}
                            }
                            //alert("JARM"+n_turnos);
                            if (n_turnos>0) {
                                selecAsignatura[i]=true;
                                matriculableAsignatura[i]=false;
                                imprimirCursosSelectos(turnoAsig,seccAsig);
                                listarAsignaturasPorNivel();
                                
                            }
                            else{
                                aviso_adv("La Asignatura "+nombreAsignatura[i]+" no tiene turnos disponibles.");
                            }
                        },
                        error: function(){
                            location.reload();
                            //alert("Error sistema JSON, vuelva a intentarlo");
                        },
                        complete:function(){
                            
                            
                            
                            
                        }
                        
                    });
                    
                    
                }
            }
        }
        
        
        
    }
    
//================= CUANDO SE ANULA UN CURSO ==============================================================
//=========================================================================================================

    function anularCurso(codigoAsig){
        //alert("JARM");
        for(var i=0;i<codigoAsignatura.length;i++){
            if (codigoAsignatura[i]==codigoAsig) {
                //cursoEstado(codigoAsig,false);
                matriculableAsignatura[i]=true;
                selecAsignatura[i]=false;
                turnoAsignatura[i]="0";
                qui_cupo(i);
                for (var j=0;j<codigoAsignatura.length;j++){
                    if(parseInt(ciclosSeleccionados[j])==parseInt(nivelAsignatura[i])){
                        ciclosSeleccionados_creditos[j]=parseInt(ciclosSeleccionados_creditos[j])-parseInt(creditosAsignatura[i]);
                        if (parseInt(ciclosSeleccionados_creditos[j])==0) {
                            ciclosSeleccionados.splice(j,1);
                            ciclosSeleccionados_creditos.splice(j,1);
                            
                        }
                    }
                    
                }
                
                
            }
        }
        imprimirCursosSelectos();
        listarAsignaturasPorNivel();
    }
    
    
    
    
    function guardarTurno(i)
    {
        turnoAsignatura[i]=$("#turnos_"+codigoAsignatura[i]).val();
        //hab_cupo(i);
    
    }
    
    function guardarSeccion(i)
    {
        seccionAsignatura[i]=$("#seccion_"+codigoAsignatura[i]).val();
        hab_cupo_secc(i);
    
    }
    
    
    
    
//================= FUNCIÓN PARA HABILITAR CUPO EN SALONES ================================================
//=========================================================================================================
    
    function hab_cupo(i){
        
        var params={};
        params['carEst']=car;
        params['espEst']=esp;
        params['asigCod']=codigoAsignatura[i];
        params['asigNiv']=ciclo_dosCifras(nivelAsignatura[i]);
        params['asigTur']=turnoAsignatura[i];
        
        
        //alert(params['carEst']);
        //alert(params['espEst']);
        //alert(params['asigCod']);
        //alert(params['asigNiv']);
        //alert(params['asigTur']);
        //mostrarCargando();
        $.ajax({
            data: params,
            type: "POST",
            url: "habCupoTurnos",
            dataType: "json",
            //async:false,
            success: function(data){
		curSalAsignatura[i]=data['rpta'];
                //ocultarCargando();
            },
            error: function(){
                location.reload();
                //alert("Error sistema JSON, vuelva a intentarlo");
            }
        });
        
    }

    function hab_cupo_secc(i){
        
	
	
        var params={};
        params['carEst']=car;
        params['espEst']=esp;
        params['asigCod']=codigoAsignatura[i];
        params['asigNiv']=ciclo_dosCifras(nivelAsignatura[i]);
        params['asigTur']=turnoAsignatura[i];
        params['asigSecc']=seccionAsignatura[i];
        
        //alert(params['carEst']);
        //alert(params['espEst']);
        //alert(params['asigCod']);
        //alert(params['asigNiv']);
        //alert(params['asigTur']);
        //mostrarCargando();
        $.ajax({
            data: params,
            type: "POST",
            url: "habCupoTurnos_secc",
            dataType: "json",
            //async:false,
            success: function(data){
		curSalAsignatura[i]=data['rpta'];
                //ocultarCargando();
            },
            error: function(){
                location.reload();
                //alert("Error sistema JSON, vuelva a intentarlo");
            }
        });
        
    }




//================== FUNCIÓN PARA QUITAR CUPO EN SALONES ==================================================
//=========================================================================================================

    function qui_cupo(i){
        
        var params={};
        params['asigCod']=codigoAsignatura[i];

        

        //alert(params['asigCod']);

        //mostrarCargando();
        $.ajax({
            data: params,
            type: "POST",
            url: "anuCupoTurnos",
            //dataType: "json",
            //async:false,
            success: function(data){
                //ocultarCargando();
            },
            error: function(){
                location.reload();
                //alert("Error sistema JSON, vuelva a intentarlo");
            }
        });
        
    }






    
    
    
//================= FUNCIÓN QUE IMPRIME LOS CURSOS SELECTOS ===============================================
//=========================================================================================================
    function imprimirCursosSelectos(turnoAsig,seccAsig){
    setTimeout(function(){
        $("#tabla_cursosEstudiante tr").remove();
        nuevaFila = document.getElementById("tabla_cursosEstudiante").insertRow(-1);
        nuevaFila.innerHTML ='<th style="font-size: 14px;font-weight: bold;">Nivel</th><th style="font-size: 14px;font-weight: bold;">Código</th><th style="font-size: 14px;font-weight: bold;">Asignatura</th><th style="font-size: 14px;font-weight: bold;">Créditos</th><th colspan="2" style="font-size: 14px;font-weight: bold;">Turno</th><th style="font-size: 14px;font-weight: bold;">Quitar</th>';
        var creditosAcumulados=0;
        //alert("JARM vale");
        
        
        
        for(var i=0;i<300;i++){
            if (selecAsignatura[i]) {
                
                var codigo = "'"+codigoAsignatura[i]+"'";
                var params={};
                params['carEst']=car;
                params['espEst']=esp;
                params['asigCod']=codigo;
                params['asigNiv']=ciclo_dosCifras(nivelAsignatura[i]);

                
                var mananas_d='disabled';
                var tardes_d='disabled';
                var noches_d='disabled';

		
                if(turnoManana[i]) mananas_d=''; 
                if(turnoTarde[i]) tardes_d='';
                if(turnoNoche[i]) noches_d='';
                

		
		//alert(tardes_d);
		
                    opciones = '<select size="1" id="turnos_'+codigoAsignatura[i]+'" onchange="javascript:consultarSecciones('+i+')"><option value="0">Ninguno</option><option '+mananas_d+' value="MANANA">Mañanas</option><option '+tardes_d+' value="TARDE">Tardes</option><option '+noches_d+' value="NOCHE">Noches</option></select>';
                    subopciones = '<select id="seccion_'+codigoAsignatura[i]+'" disabled="disabled" onchange="javascript:guardarSeccion('+i+')"><option value="0">---</option></select>'; 
                    
		    
		    
		    var idListaTurno='turnos_'+codigoAsignatura[i];
                    if (tipoAsignatura[i]=='N') {
                        nuevaFila = document.getElementById("tabla_cursosEstudiante").insertRow(-1);
                        nuevaFila.innerHTML ='<td id="selectNivel_'+codigoAsignatura[i]+'" class="celda">'+nivelAsignatura[i]+'</td><td id="selectcodigo_'+codigoAsignatura[i]+'" class="celda">'+codigoAsignatura[i]+'</td><td id="selectnombre_'+codigoAsignatura[i]+'" class="celda">'+nombreAsignatura[i]+'</td><td id="selectcreditos_'+codigoAsignatura[i]+'" class="celda" style="width:10px;">'+creditosAsignatura[i]+'</td>              <td id="selectturnos_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+opciones+'</td>             <td id="selecseccion_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+subopciones+'</td>                                   <td class="celda" id="selectboton_'+codigoAsignatura[i]+'" style="width:10px;"><input type="submit" value="X" onclick="javascript:anularCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(140,0,0); color:white;"></td>';                    
                    }
                    else if (tipoAsignatura[i]=='E') {
                        nuevaFila = document.getElementById("tabla_cursosEstudiante").insertRow(-1);
                        nuevaFila.innerHTML ='<td id="selectNivel_'+codigoAsignatura[i]+'" class="celda_letras_verdes">'+nivelAsignatura[i]+'</td><td id="selectcodigo_'+codigoAsignatura[i]+'" class="celda_letras_verdes">'+codigoAsignatura[i]+'</td><td id="selectnombre_'+codigoAsignatura[i]+'" class="celda_letras_verdes">'+nombreAsignatura[i]+'</td><td id="selectcreditos_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+creditosAsignatura[i]+'</td>              <td id="selectturnos_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+opciones+'</td>          <td id="selecseccion_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+subopciones+'</td>                         <td class="celda_letras_verdes" id="selectboton_'+codigoAsignatura[i]+'" style="width:10px;"><input type="submit" value="X" onclick="javascript:anularCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(140,0,0); color:white;"></td>';                    
                    }
                    else if (tipoAsignatura[i]=='A') {
                        
                        nuevaFila = document.getElementById("tabla_cursosEstudiante").insertRow(-1);
                        nuevaFila.innerHTML ='<td id="selectNivel_'+codigoAsignatura[i]+'" class="celda_letras_naranjas">'+nivelAsignatura[i]+'</td><td id="selectcodigo_'+codigoAsignatura[i]+'" class="celda_letras_naranjas">'+codigoAsignatura[i]+'</td><td id="selectnombre_'+codigoAsignatura[i]+'" class="celda_letras_naranjas">'+nombreAsignatura[i]+'</td><td id="selectcreditos_'+codigoAsignatura[i]+'" class="celda_letras_naranjas" style="width:10px;">'+creditosAsignatura[i]+'</td>              <td id="selectturnos_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+opciones+'</td>        <td id="selecseccion_'+codigoAsignatura[i]+'" class="celda_letras_verdes" style="width:10px;">'+subopciones+'</td>                           <td class="celda_letras_naranjas" id="selectboton_'+codigoAsignatura[i]+'" style="width:10px;"><input type="submit" value="X" onclick="javascript:anularCurso('+codigo+')" id="boton_'+codigoAsignatura[i]+'" style="background-color:rgb(140,0,0); color:white;"></td>';                    
                    }
                                
		    $("#turnos_"+codigoAsignatura[i]).val(turnoAsignatura[i]);
		    consultarSecciones(i);
		    $("#seccion_"+codigoAsignatura[i]).val(seccionAsignatura[i]);
                    creditosAcumulados+=parseInt(creditosAsignatura[i]);
                    

                    
                    //guardarTurno(i);
                    
                

            }
        }
        $("#acumuladosCreditos").text(creditosAcumulados);
        calcularCiclo();
        
    },100)
    }
    
    
    function consultarSecciones(i)
    {
	guardarTurno(i);
	
	
	
	var params={};
	params['i']=i;
        params['carEst']=car;
        params['espEst']=esp;
        params['asigCod']=codigoAsignatura[i];
        params['asigNiv']=ciclo_dosCifras(nivelAsignatura[i]);
        params['asigTur']=$('#turnos_'+params['asigCod']).val();
	

	mostrarCargando();
	$.ajax({
            data: params,
            type: "GET",
            url: "consultarSecciones",
            dataType: "json",
            async:false,
            success: function(data){
		
		
		$('#seccion_'+params['asigCod']).empty();
		$('#seccion_'+params['asigCod']).append('<option id="0">---</option>');
		
		if (params['asigTur']!='0') {
		    for (var i=0;typeof(data[i])!= "undefined";i++) {
		    
		    $('#seccion_'+params['asigCod']).removeAttr('disabled');
		    $('#seccion_'+params['asigCod']).append('<option value="'+data[i]+'">'+data[i]+'</option>');
		    
		    }
		}
		//curSalAsignatura[params['i']]='0';
		ocultarCargando();
		
                ocultarCargando();
            },
            error: function(){
                location.reload();
                //alert("Error sistema JSON, vuelva a intentarlo");
            }
        });
	
	return;
    }
    
    

//================= FUNCIÓN QUE CALCULA EL CICLO SEGÚN LOS CURSOS SELECCIONADOS ===========================
//=========================================================================================================
    var cicloTotal;
    function calcularCiclo(){
        var cicloMasCreditos=0;//Nivel con más créditos
        var cicloMasCreditos_cantidad=0;//cantidad de cŕeditos del nivel con más créditos
        
        for(var i=0;i<ciclosSeleccionados_creditos.length;i++){
            //alert("JARM--Ciclo->"+ciclosSeleccionados[i]+"<-Ciclo #cred"+ciclosSeleccionados_creditos[i]);
            if (ciclosSeleccionados_creditos[i]>cicloMasCreditos_cantidad) {//Si la cantidad de créditos del nivel es mayor que el cursos que almacena al mayor, el cursos almacena este nuevo mayor.
                //alert("JARM: Nuevo Mayor (dif)");
                cicloMasCreditos=ciclosSeleccionados[i];
                cicloMasCreditos_cantidad=ciclosSeleccionados_creditos[i];
            }
            else if (ciclosSeleccionados_creditos[i]==cicloMasCreditos_cantidad) {//Si la cantidad de créditos del nivel es igual al cursor que almacena al mayor, se determina que ciclo es menor, y se almacena.
                if (ciclosSeleccionados[i]<cicloMasCreditos) {
                    //alert("JARM: Nuevo Mayor (igua)");
                    cicloMasCreditos=ciclosSeleccionados[i];
                    cicloMasCreditos_cantidad=ciclosSeleccionados_creditos[i];
                }
                else{
                    //No se hace nada, pues ya tenemos almacenado lo que necesitamos.
                }
            }
        }
        //alert("JARM cicloMasCreditos->"+cicloMasCreditos);
        $("#nivelAcademico").text(cicloMasCreditos+"° nivel");
        cicloTotal = cicloMasCreditos;
        $("#totalCreditos").text(arregloCarreraCreditos[cicloMasCreditos-1]);
        $("#disponiblesCreditos").text(parseInt($("#totalCreditos").text())-parseInt($("#acumuladosCreditos").text()));
        comprobarCreditos();
    }

//================= FUNCIÓN QUE COMPRUEBA SI NO SE SUPERA LA CANTIDAD MÁXIMA DE CRÉDITOS ==================
//=========================================================================================================
function comprobarCreditos(){
        var total= parseInt($("#totalCreditos").text());
        var acumulados = parseInt($("#acumuladosCreditos").text());

        
        if (acumulados>total) {
            //avisoSimple("","red");
            aviso_mal("Se supera el límite máximo de créditos.");
        }
        else{
            //avisoSimple("----","blue");
            aviso_bien("Se cargó correctamente...");
        }
        
        /*
        //Se suma o resta los creditos seleccionados a los acumulados y se imprime el resultado.
        //También se activa o desactiva la selección de turnos
        if ($("#selectAsign_"+i).is(':checked')) {
            var acumulados = parseInt(acumulados) + parseInt(seleccionados);
            $("#turno_"+i).attr("disabled",false);
        }
        else{
            var acumulados = parseInt(acumulados) - parseInt(seleccionados);
            $("#turno_"+i).attr("disabled",true);
            $("#selecTodasAsignaturas").attr('checked', false);//Se desactiva el checkbox de "Seleccionar Todos" por si esta seleccionado"
        }
        $("#acumuladosCreditos").text(acumulados);
        
        //Se comprueba si la cantidad de creditos acumulados supera al total
        if (acumulados>total) {
            avisoSimple("Se supera el límite máximo de créditos.","red");
        }
        else{
            avisoSimple("----","blue");
        }
        */
    }


function mostrarConstMatricula() {
    
    anio="2014";
    periodo="2";
        
    mostrarCargando();
    
    
    $.post("constMatricula", {codEst:codEst,anio:anio,periodo:periodo,carEst:car,espEst:esp,planEst:plan} ,function(resultado)
		            {
		                if(resultado != false)
		                {
		                    $("#popupbox_constancia").append(resultado);
		                }
		            }); 

    
    
    $('#popupbox_constancia').dialog({
        title: "Constancia de Matrícula",
        modal: true,
        width: 900,
        height: 600,
        draggable:true,
        position: ["center",10],
        closeOnEscape : "true"
    });
   

   
}



function ver_rpta()
		{
			
			
			if($("#cmb_car_").val()!='0')
	        {
	            if($("#cmb_esp_ option").length == 1 || $("#cmb_esp_").val()!='SX')
	            {    	                
	                //$("#l_dequien").text("HUANCAYO - PRESENCIAL: "+$("#cmb_car_ option[value="+$("#x_carrera").val()+"]").text()+" - "+$("#cmb_esp_ option[value="+$("#x_especi").val()+"]").text());
	                mostrarCargando();
	                $.post("RptSalones", {car:$("#cmb_car_").val(),esp:$("#cmb_esp_").val()} ,function(resultado)
		            {
		                if(resultado != false)
		                {
		                    $("#reporte").append(resultado);
		                }
		            }); 	                
	                                     
	                document.getElementById("cmb_car_").style.border="";
	                document.getElementById("cmb_esp_").style.border="";
	            }
	            else
	            {
	                document.getElementById("cmb_esp_").style.border="2px solid red";       
	            }
	        }
	        else
	        {
	            document.getElementById("cmb_car_").style.border="2px solid red";
	        }			
			            
		}







function limpiarFormularios() {
    ciclosSeleccionados = new Array();//Array para almacenar los ciclos según cursos seleccionados para matricular
    ciclosSeleccionados_creditos=new Array();   
    
    $("#tabla_cursosEstudiante tr").remove();
    //avisoSimple("----","blue");
    //$("#div_imprimir").hide(); //Se Oculta Boton Imprimir
    //$("#div_matricular").show();//Se Muestra Boton Matricular
    
    //$("#nivelAcademico").text("0° nivel");
    //$("#totalCreditos").text("0");
    //$("#acumuladosCreditos").text("0");
    //$("#disponiblesCreditos").text("0");
    return;
}

function dialogo_mensaje(){
     $( "#dialogo_mensaje" ).dialog({
        modal: true,
        buttons: {
            Ok: function() {
                $( this ).dialog( "close" );
            }
        }
    });
}


