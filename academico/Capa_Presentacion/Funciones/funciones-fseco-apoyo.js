//$.ajaxSetup({ cache: false });

var adv=false;
var err=false;


//limipiar cuadros del formulario
function limpiar()
{
	$("textarea#razon").val("");
	$("input#nombres").val("");
	$("input#apellidos_paterno").val("");
	$("input#apellidos_materno").val("");
	$("input#edad").val("");
	$("input#dni").val("");
	$("input#fech_nac").val("");
	$("input#aIng").val("");
	$("input#tel-F").val("");
	$("input#tel-Cel").val("");
	$("input#e-mail").val("");
	$("input#domicilio").val("");
	$("input#txtFac").val("");
	$("input#txtCarPro").val("");
	$("input#txtModEst").val("");	
	$("input#txtPen").val("");	
	$("input#estado_civ").val("");	

	$('#N_Herm').val("Ninguno");
	$("#N_Herm_NE").attr("disabled",true);
	$('#N_Herm_NE').val("Ninguno");
	$("#N_Herm_Est_IEE").attr("disabled",true);
	$('#N_Herm_Est_IEE').val("Ninguno");
	$("#N_Herm_Est_IEP").attr("disabled",true);
	$('#N_Herm_Est_IEP').val("Ninguno");
	$('#provincia_l').val("");
	$('#distrito_l').val("");
	$("#distrito_l").attr("disabled",true);
	$('#ciudad_de_proced').val("");
	$('#Adol_Enf').val("No");	
	$('#Seg_Acc').val("No");
	$('#Seg_Enf').val("NINGUNO");
	$("#Seg_Enf").attr("disabled",false);


	$('#Sec_Col').val("ESTATAL");	
	$('#Int_EU').val("No");	
	$('#mot_int_est').val("NINGUNO");
	$("#mot_int_est").attr("disabled",true);


	$('[name="vSS1"]').attr('checked',false);	
	$('[name="vSS2"]').attr('checked',false);	
	$('[name="vSS3"]').attr('checked',false);	
	$('[name="vSS4"]').attr('checked',false);	

	$('input:radio[name=GC]')[0].checked = false;
	$('input:radio[name=GC]')[1].checked = false;
	$('input:radio[name=GC]')[2].checked = false;					 
	$('input:radio[name=GC]')[3].checked = false;
	$('input:radio[name=GC]')[4].checked = false;
	$('input:radio[name=GC]')[5].checked = false;
	$('input:radio[name=GC]')[6].checked = false;

	$('input:radio[name=rED]')[0].checked = false;
	$('input:radio[name=rED]')[1].checked = false;
	$('input:radio[name=rED]')[2].checked = false;
	$('input:radio[name=rED]')[3].checked = false;
	$('input:radio[name=rED]')[4].checked = false;
	$('input:radio[name=rED]')[5].checked = false;

	$('input:radio[name=BU]')[0].checked = false;
	$('input:radio[name=BU]')[1].checked = false;
	$('input:radio[name=BU]')[2].checked = false;
	$('input:radio[name=BU]')[3].checked = false;

	$('input:radio[name=vT]')[0].checked = false;
	$('input:radio[name=vT]')[1].checked = false;
	$('input:radio[name=vT]')[2].checked = false;
	$('input:radio[name=vT]')[3].checked = false;
	$('input:radio[name=vT]')[4].checked = false;

	$('input:radio[name=vM]')[0].checked = false;
	$('input:radio[name=vM]')[1].checked = false;
	$('input:radio[name=vM]')[2].checked = false;
	$('input:radio[name=vM]')[3].checked = false;

	$('input:radio[name=vTI]')[0].checked = false;
	$('input:radio[name=vTI]')[1].checked = false;
	$('input:radio[name=vTI]')[2].checked = false;

	$('input:radio[name=vU]')[0].checked = false;
	$('input:radio[name=vU]')[1].checked = false;
	$('input:radio[name=vU]')[2].checked = false;
	$('input:radio[name=vU]')[3].checked = false;

	$('input:radio[name=vHO]')[0].checked = false;
	$('input:radio[name=vHO]')[1].checked = false;
	$('input:radio[name=vHO]')[2].checked = false;
	$('input:radio[name=vHO]')[3].checked = false;
	$('input:radio[name=vHO]')[4].checked = false;

	$('input:radio[name=iP]')[0].checked = false;
	$('input:radio[name=iP]')[1].checked = false;
	$('input:radio[name=iP]')[2].checked = false;
	$('input:radio[name=iP]')[3].checked = false;
	$('input:radio[name=iP]')[4].checked = false;
	$('input:radio[name=iP]')[5].checked = false;

	$('input:radio[name=iM]')[0].checked = false;
	$('input:radio[name=iM]')[1].checked = false;
	$('input:radio[name=iM]')[2].checked = false;
	$('input:radio[name=iM]')[3].checked = false;
	$('input:radio[name=iM]')[4].checked = false;
	$('input:radio[name=iM]')[5].checked = false;

	$('input:radio[name=iOR]')[0].checked = false;
	$('input:radio[name=iOR]')[1].checked = false;
	$('input:radio[name=iOR]')[2].checked = false;
	$('input:radio[name=iOR]')[3].checked = false;
	$('input:radio[name=iOR]')[4].checked = false;
	$('input:radio[name=iOR]')[5].checked = false;

	$('input:radio[name=iE]')[0].checked = false;
	$('input:radio[name=iE]')[1].checked = false;
	$('input:radio[name=iE]')[2].checked = false;
	$('input:radio[name=iE]')[3].checked = false;
	$('input:radio[name=iE]')[4].checked = false;

	$('input:radio[name=eAL]')[0].checked = false;
	$('input:radio[name=eAL]')[1].checked = false;
	$('input:radio[name=eAL]')[2].checked = false;

	$('input:radio[name=eED]')[0].checked = false;
	$('input:radio[name=eED]')[1].checked = false;
	$('input:radio[name=eED]')[2].checked = false;
	$('input:radio[name=eED]')[3].checked = false;

	$('input:radio[name=eVS]')[0].checked = false;
	$('input:radio[name=eVS]')[1].checked = false;
	$('input:radio[name=eVS]')[2].checked = false;

	$('input:radio[name=eO]')[0].checked = false;
	$('input:radio[name=eO]')[1].checked = false;
	$('input:radio[name=eO]')[2].checked = false;

	$(':input').filter(':checkbox').attr("checked", false);
}
      		
function imprimir(x_cod,x_rpt){
	if(x_cod.length == 7 && x_rpt!="")
	{
		$("#aviso_adv").text("");
		$("#mensaje_correcto").empty();

		switch(x_rpt)
		{
		    case 'adm_fseco':
		    	//abrir pagina
		    	mostrarCargando();
				params={};
				params.cod=x_cod;
				params.rpt=x_rpt;
				//alert(params.cod+" "+params.rpt);
				$.post("fseco-adm-reporte",params,function(resultado){
					
		        	if(resultado!=false)
		        	{
		        		$("#mensaje_correcto").append(resultado);
		        		ocultarCargando();
		        	}
		        	else{
		        		ocultarCargando();
		        	}
		        });
		       	//abrir popup
				$("#mensaje_correcto").dialog({
					modal: true,
					title: "Reporte",
					width: 1000,
					height: 700,
					minWidth: 1000,
					maxWidth: 1200,
					position: [400,400],
					show: "clip",
					hide: "clip"
				});			
			//alert(params.cod+" "+params.rpt);
		        //$("#mensaje_correcto").load('fseco-adm-reporte?'+$.params());

		    break;

		    case 'alumno_fseco':
		    	//abrir pagina
				params={};
				params.cod=x_cod;
				params.rpt=x_rpt;
				/*
				$.post("fseco-usu-reporte",params,function(resultado){
					
		        	if(resultado!=false)
		        	{
		        		$("#mensaje_correcto").append(resultado);
		        	}
		        });
		       	//abrir popup
				$("#mensaje_correcto").dialog({
					modal: true,
					title: "Reporte",
					width: 1000,
					height: 700,
					minWidth: 1000,
					maxWidth: 1200,
					position: [400,400],
					show: "clip",
					hide: "clip"

				});
			*/
				//redirect_by_post("fseco-usu-reporte",{cod:x_cod,rpt:x_rpt},false);
				redirect_by_post("fseco-usu-reporte",params,true);
		    break;
		}	    	
	}
	else
	{
		switch(x_rpt)
		{
		    case 'adm_fseco':
		    	$("#aviso_adv").text("Ingrese Código de Alumno Válido.");	
		    break;

		    case 'alumno_fseco':
		    	$("#aviso_adv").text("Su datos en el Sistema Académico estan incompletos, acérquese a la Of. de Informática.");	
		    break;
		}
	}
}
//funcion para activar btn submit
function submitForm()
{
	//document.FRM_fseco.submit.click();
	if(validar_cuadros())
	{
		
		document.FRM_fseco.submit();
	}
	else{
		
		$("#aviso_tit").text("FALTA LLENAR DATOS:");
		
		if(err){
		$("#aviso_adv").text("Los cuadros rojos deben y pueden ser llenados desde aqui.");
		}else{$("#aviso_adv").text("");}
		if(adv){
		$("#aviso_err").text("Los cuadros Azules NO PUEDEN ser RELLENADO O EDITADOS desde aqui, para rellenar estos datos debe apersonarse a la Oficina de Informática y contactar con el encargado del Sistema Académico, el puede rellenar o corrigira la información que le falta.");
		}else{$("#aviso_err").text("");}  
	}
}

function buscar(x_cod)
{
	if(x_cod.length == 7){
		
		//$("#cargando").css("display", "inline");
		$("#aviso_adv").text("");
		$("#codBuscar").val($("#txtCodigo_p").val());
		$('#form_buscar').submit();
	}
	else
	{
	$("#aviso_adv").text("Ingrese Código de Alumno Válido.");	
	}
	//$("#cargando").css("display", "none");

} 
//script que captura codigo y trae todos los datos conocidos-->
function cargar_datosAcd(cod,nom,ap_pat,ap_mat,edad,dni,f_nac,f_ing,tel,cel,mail,dir,e_civ,fac,carr,mod_acd){
 	
	//Datos conocidos del Sistema Académico --------
	$("input#cod").val(cod);
	$("input#nombres").val(nom);
	$("input#apellidos_paterno").val(ap_pat);
	$("input#apellidos_materno").val(ap_mat);
	$("input#edad").val(edad);
	$("input#dni").val(dni);
	$("input#fech_nac").val(f_nac);
	$("input#aIng").val(f_ing);
	$("input#tel-F").val(tel);
	$("input#tel-Cel").val(cel);
	$("input#e-mail").val(mail);
	$("input#domicilio").val(dir);
	//$("#estado_civ option[value='"+e_civ+"']").attr("selected",true);
	document.getElementById("estado_civ").options[e_civ].selected='selected';
	$("input#txtFac").val(fac);
	$("input#txtCarPro").val(carr);
	$("input#txtModEst").val(mod_acd);	
	//$("input#txtPen").val(data[0]['$PENSION']);	
	//----------------------------------------------
	//.....................fin
	//......................................llamara a datos de la ficha	 
}
/// funcion para cargar otros datos
function cargar_otros_datos(nom_emerg,tel_emerg,dep_econom,transporte,ingreso,con_net,facebook,twitter,acept_inf){

	$("#txtContEmerg").val(nom_emerg);
	$("#txtTelEmerg").val(tel_emerg);

	document.getElementById("cboTransporte").options[transporte].selected='selected';
	document.getElementById("cboIngrFamiliar").options[ingreso].selected='selected';
	document.getElementById("cboInternet").options[parseInt(con_net)].selected='selected';
	//$("#cboInternet option[value='"+con_net+"'']").attr("selected",true);

	switch(dep_econom){
		case "si":cheq1=0;break;
		case "no":cheq1=1;break;					
	default:cheq1=1;break;
	}
	$('input:radio[name=optDepenEconom]')[cheq1].checked = true;

	switch(facebook){
		case "si":cheq2=0;break;
		case "no":cheq2=1;break;					
	default:cheq2=1;break;
	}
	$('input:radio[name=optFacebook]')[cheq2].checked = true;

	switch(twitter){
		case "si":cheq3=0;break;
		case "no":cheq3=1;break;					
	default:cheq3=1;break;
	}
	$('input:radio[name=optTwitter]')[cheq3].checked = true;

	switch(acept_inf){
		case "si":cheq4=0;break;
		case "no":cheq4=1;break;					
	default:cheq4=1;break;
	}
	$('input:radio[name=optInformacion]')[cheq4].checked = true;
}

/// fin funcion para cargar otros datos
function cargar_datosFich(gr_conv,n_hrno,n_hrnoNOe,n_hrnoIEE,n_hrnoIEP,prov,ciu,dep,dis,resp_edu,ben_u,casa,material,tipo,zona,nro_hab,enf,seg_acc,seg_enf,secd,int_est,int_mot,s_elect,s_telf,s_net,s_cable,cod_cole)
{
	var cheq; 
	switch(gr_conv){
	case "PADRES Y HERMANOS":cheq=0;break;
	case "MADRE Y HERMANOS":cheq=1;break;
	case "PADRE Y HERMANOS":cheq=2;break;
	case "SOLO CON MADRE":cheq=3;break;
	case "CON HERMANOS":cheq=4;break;
	case "OTROS FAMILIARES":cheq=5;break;
	case "SOLO":cheq=6;break;
	default:cheq=6;break;
	}

	$('input:radio[name=GC]')[cheq].checked = true;
	//-----------------------------------------------
	//-----------------------------------------------
	var hr;

	$('#N_Herm').val(n_hrno);

	hr=n_hrnoNOe;
	$('#N_Herm_NE').val(hr);
	if(hr!="Ninguno"){
	$("#N_Herm_NE").attr("disabled",false);
	}

	hr=n_hrnoIEE;
	$('#N_Herm_Est_IEE').val(hr);
	if(hr != "Ninguno"){
	$("#N_Herm_Est_IEE").attr("disabled",false);
	}

	hr=n_hrnoIEP;
	$('#N_Herm_Est_IEP').val(hr);
	if(hr!="Ninguno"){
	$("#N_Herm_Est_IEP").attr("disabled",false);
	}
	//-----------------------------------------------
	//----------------------------------------------- Cambiar
	$.get("fseco-usu-ListDep",{}, function(resultado)
	{

	if(resultado == false)
	{
		alert("Error combo departamento");
	}
	else
	{
		$('#departamento_l').append(resultado);			
		$("#departamento_l option[value="+dep+"]").attr("selected",true);
		//----------------------------------------------------------------------------
		$.get("fseco-usu-ListProv", { code:dep }, function(resultado)
		{	
			

			if(resultado == false)
			{
				document.getElementById("provincia_l").options.length=1;		
				document.getElementById("distrito_l").options.length=1;
				$("#provincia_l").attr("disabled",true);
				$("#distrito_l").attr("disabled",true);
			}
			else
			{

				$("#provincia_l").attr("disabled",false);
				document.getElementById("provincia_l").options.length=1;		
				$('#provincia_l').append(resultado);	
				document.getElementById("distrito_l").options.length=1;
				$("#distrito_l").attr("disabled",true);
				$("#provincia_l option[value="+prov+"]").attr("selected",true);
				//---------------------------------------------------------------------------------
				$.get("fseco-usu-ListDistr", { dep:dep,pro:prov }, function(resultado)
				{
					if(resultado == false)
					{
						document.getElementById("distrito_l").options.length=1;		
						$("#distrito_l").attr("disabled",true);
					}
					else
					{
						$("#distrito_l").attr("disabled",false);
						document.getElementById("distrito_l").options.length=1;
						$('#distrito_l').append(resultado);			
						$("#distrito_l option[value="+dis+"]").attr("selected",true);
						dLug();
						//si no tiene colegio aqui tienen que detener el cargando
						if(cod_cole==null || cod_cole=='')
							ocultarCargando();
					}
				});
			}
	});
	}
	});	
	$('#ciudad_de_proced').val(ciu);
	//-----------------------------------------------
	//-----------------------------------------------
	switch(resp_edu){
	case "AMBOS PADRES":cheq=0;break;
	case "SOLO MADRE":cheq=1;break;
	case "SOLO PADRE":cheq=2;break;
	case "HERMANO(S)":cheq=3;break;
	case "OTROS RESPONSABLES":cheq=4;break;
	case "SE AUTOSOSTIENE":cheq=5;break;

	default:cheq=5;break;
	}
	$('input:radio[name=rED]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(ben_u){
	case "POR CONVENIO":cheq=0;break;
	case "POR CAFAEE":cheq=1;break;
	case "OTROS":cheq=2;break;
	case "NINGUNO":cheq=3;break;
						
	default:cheq=3;break;
	}
	$('input:radio[name=BU]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(casa){
	case "PROPIA":cheq=0;break;
	case "ALQUILADA":cheq=1;break;
	case "ALQUILER-VENTA":cheq=2;break;
	case "ALOJADO":cheq=3;break;
	case "OTROS":cheq=4;break;
						
	default:cheq=4;break;
	}
	$('input:radio[name=vT]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(material){
	case "NOBLE":cheq=0;break;
	case "ADOBE":cheq=1;break;
	case "MIXTO":cheq=2;break;
	case "OTROS":cheq=3;break;
												
	default:cheq=3;break;
	}
	$('input:radio[name=vM]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(tipo){
	case "INDEPENDIENTE":cheq=0;break;
	case "MULTI-FAMILIAR":cheq=1;break;
	case "SOLO UN HABITANTE":cheq=2;break;
																		
	default:cheq=0;break;
	}
	$('input:radio[name=vTI]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(zona){
	case "Z-RURAL":cheq=0;break;
	case "Z-URBANA":cheq=1;break;
	case "Z-COMERCIAL":cheq=2;break;
	case "Z-RESIDENCIAL":cheq=3;break;
																		
	default:cheq=1;break;
	}
	$('input:radio[name=vU]')[cheq].checked = true;	
	//-----------------------------------------------
	//-----------------------------------------------
	switch(nro_hab){
	case "1":cheq=0;break
	case "2":cheq=1;break;
	case "3":cheq=2;break;
	case "4":cheq=3;break;
	case "5 A MAS":cheq=4;break;
																		
	default:cheq=0;break;
	}
	$('input:radio[name=vHO]')[cheq].checked = true;
	//-----------------------------------------------
	//-----------------------------------------------
	$('#Adol_Enf').val(enf);	

	$('#Seg_Acc').val(seg_acc);	
	//-----------------------------------------------
	//-----------------------------------------------
	var sE=seg_enf;
	//if(sE!="NINGUNO"){
		$("#Seg_Enf").attr("disabled",false);
		//}
	$('#Seg_Enf').val(sE);	
	//-----------------------------------------------
	$('#Sec_Col').val(secd);

	$('#Int_EU').val(int_est);	
	//-----------------------------------------------
	//-----------------------------------------------
	sE=int_mot;
	if(sE!="NINGUNO"){
		$("#mot_int_est").attr("disabled",false);
		}
	$('#mot_int_est').val(sE);
	//-----------------------------------------------

	if(s_elect=="1"){
	//$('[name="vSS1"]').attr('checked',true);
		document.getElementById("vS_1").checked=true;
	}
	if(s_telf=="1"){
	//$('[name="vSS2"]').attr('checked',true);
		document.getElementById("vS_2").checked=true;
	}
	if(s_net=="1"){
	//$('[name="vSS3"]').attr('checked',true);
		document.getElementById("vS_3").checked=true;
	}
	if(s_cable=="1"){
	//$('[name="vSS4"]').attr('checked',true);	
		document.getElementById("vS_4").checked=true;
	}
	//................fin
	//.........Actividades Económicas
}

//funcion para cargar los datos del colegio como departamento provincia distrito 
function cargar_datosColegio(col_id,col_est){

	//------------------si existe el codigo del col_id--------------
		$.ajax({
			data:"codId="+col_id,
			type:"GET",
			url:"fseco-usu-ListColegio_Id",
			dataType:"json",
			success:function(data)
			{ 	
				if(data[0][0]!="No hay datos")
				{
					//departamentos
					$.get("fseco-usu-ListDep",{},function(resultado){
						if(resultado==false)
						{
							alert('Error al cargar los departamentos');
						}
						else
						{
							$('#cboDepColegio').append(resultado);
							$("#cboDepColegio option[value="+data[0][2]+"]").attr("selected",true);
							///--------------------------------------------------------------------------------
							//provincia
							$.get('fseco-usu-ListProv',{code:data[0][2]},function(resultado){
								if(resultado==false)
								{
									document.getElementById("cboProColegio").options.length=1;    
			                      	document.getElementById("cboDisColegio").options.length=1;
			                      	document.getElementById("Sec_Col").options.length=1;
			                      	document.getElementById("cboColegioProce").options.length=1;

			                      	$("#cboProColegio").attr("disabled",true);
			                      	$("#cboDisColegio").attr("disabled",true);
			                      	$("#Sec_Col").attr("disabled",true);
			                      	$("#cboColegioProce").attr("disabled",true);
								}
								else
								{
									$("#cboProColegio").attr("disabled",false);
			                        document.getElementById("cboProColegio").options.length=1;    
			                        $('#cboProColegio').append(resultado);
			                        $("#cboProColegio option[value="+data[0][3]+"]").attr("selected",true);

									document.getElementById("cboDisColegio").options.length=1;
									document.getElementById("Sec_Col").options.length=1;
									document.getElementById("cboColegioProce").options.length=1;

									$("#cboDisColegio").attr("disabled",true);
									$("#Sec_Col").attr("disabled",true);
									$("#cboColegioProce").attr("disabled",true);
									//-------------------------------
									//distrito
									$.get("fseco-usu-ListDistr",{dep:data[0][2],pro:data[0][3]},function(resultado){
										if(resultado==false)
										{
											document.getElementById("cboDisColegio").options.length=1;
											document.getElementById("Sec_Col").options.length=1;
											document.getElementById("cboColegioProce").options.length=1;

											$("#cboDisColegio").attr("disabled",true);
											$("#Sec_Col").attr("disabled",true);
											$("#cboColegioProce").attr("disabled",true);
										}
										else
										{
											document.getElementById("Sec_Col").options.length=1;
											document.getElementById("cboColegioProce").options.length=1;
											$("#Sec_Col").attr("disabled",true);
											$("#cboColegioProce").attr("disabled",true);

											$("#cboDisColegio").attr("disabled",false);
											document.getElementById("cboDisColegio").options.length=1;
											$('#cboDisColegio').append(resultado);
											$("#cboDisColegio option[value="+data[0][4]+"]").attr("selected",true);
											//---------------------------------------------------------------
											//tipo colegio
											//desativa el boton colegio procedencia
											document.getElementById("cboColegioProce").options.length=1;
											$("#cboColegioProce").attr("disabled",true);

											$("#Sec_Col").attr("disabled",false);
											document.getElementById("Sec_Col").options.length=1;
											$("#Sec_Col").append('<option value="ESTATAL">Estatal</option>');
											$("#Sec_Col").append('<option value="PARTICULAR">Particular</option>');

											$("#Sec_Col option[value="+col_est+"]").attr("selected",true);
											//-----------------------------------------------------------
											//colegio de procedencia

											 var cod_tip_cole="02";//estatal
	            							if(col_est=='PARTICULAR')cod_tip_cole="01";

											$.get('fseco-usu-ListColegio',{dep:data[0][2],pro:data[0][3],dis:data[0][4],col:cod_tip_cole},function(resultado){
												if(resultado==false){
							                      document.getElementById("cboColegioProce").options.length=1;   
							                      $("#cboColegioProce").attr("disabled",true);
												}
												else
												{
													$("#cboColegioProce").attr("disabled",false);
													document.getElementById("cboColegioProce").options.length=1;
													$('#cboColegioProce').append(resultado);
													$("#cboColegioProce option[value="+col_id+"]").attr("selected",true);
													dLugCol();
													ocultarCargando();
												}
												//validar_pestanias();
											
											});										
										}

									});
									//fin distrito
								}
							});
							//fin provincia
						}
					});
					//fin departamentos
				}
			},
			error:function()
			{
				alert('error');
				
			}
		});
	//-------------- fin si existen datos del coelgio
}
function cargar_datosAEco(per,ocu){
/*
	switch(per){

	case "PADRE":
	switch(ocu){
		case "DOCENTE":$('[name="P1"]').attr('checked',true);break;
		case "MIEMBRO PNP":$('[name="P2"]').attr('checked',true);break;
		case "PENSIONISTA":$('[name="P3"]').attr('checked',true);break;
		case "EMPLEADO - ESTABLE":$('[name="P4"]').attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":$('[name="P5"]').attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":$('[name="P6"]').attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":$('[name="P7"]').attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":$('[name="P8"]').attr('checked',true);break;
		}
		break;
	 case "MADRE":
		switch(ocu){
		case "DOCENTE":$('[name="M1"]').attr('checked',true);break;
		case "MIEMBRO PNP":$('[name="M2"]').attr('checked',true);break;
		case "PENSIONISTA":$('[name="M3"]').attr('checked',true);break;
		case "EMPLEADO - ESTABLE":$('[name="M4"]').attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":$('[name="M5"]').attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":$('[name="M6"]').attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":$('[name="M7"]').attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":$('[name="M8"]').attr('checked',true);break;
		}
		break;
	case "OTRO RESPONSABLE":
		switch(ocu){
		case "DOCENTE":$('[name="OR1"]').attr('checked',true);break;
		case "MIEMBRO PNP":$('[name="OR2"]').attr('checked',true);break;
		case "PENSIONISTA":$('[name="OR3"]').attr('checked',true);break;
		case "EMPLEADO - ESTABLE":$('[name="OR4"]').attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":$('[name="OR5"]').attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":$('[name="OR6"]').attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":$('[name="OR7"]').attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":$('[name="OR8"]').attr('checked',true);break;
		}
		break;
	case "ESTUDIANTE":
		switch(ocu){
		case "DOCENTE":$('[name="EST1"]').attr('checked',true);break;
		case "MIEMBRO PNP":$('[name="EST2"]').attr('checked',true);break;
		case "PENSIONISTA":$('[name="EST3"]').attr('checked',true);break;
		case "EMPLEADO - ESTABLE":$('[name="EST4"]').attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":$('[name="EST5"]').attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":$('[name="EST6"]').attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":$('[name="EST7"]').attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":$('[name="EST8"]').attr('checked',true);break;
		}
		break;


	}


	 //................fin
	 */
	 switch(per){
	case "PADRE":
	switch(ocu){
		case "DOCENTE":document.getElementById("P1").checked=true;break;//$("#P1").attr('checked',true);break;
		case "MIEMBRO PNP":document.getElementById("P2").checked=true;break;//$('#P2').attr('checked',true);break;
		case "PENSIONISTA":document.getElementById("P3").checked=true;break;//$("#P3").attr('checked',true);break;
		case "EMPLEADO - ESTABLE":document.getElementById("P4").checked=true;break;//$("#P4").attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":document.getElementById("P5").checked=true;break;//$("#P5").attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":document.getElementById("P6").checked=true;break;//$("#P6").attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":document.getElementById("P7").checked=true;break;//$("#P7").attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":document.getElementById("P8").checked=true;break;//$("#P8").attr('checked',true);break;
		}
		break;
	 case "MADRE":
		switch(ocu){
		case "DOCENTE":document.getElementById("M1").checked=true;break;//$("#M1").attr('checked',true);break;
		case "MIEMBRO PNP":document.getElementById("M2").checked=true;break;//$("#M2").attr('checked',true);break;
		case "PENSIONISTA":document.getElementById("M3").checked=true;break;//$("#M3").attr('checked',true);break;
		case "EMPLEADO - ESTABLE":document.getElementById("M4").checked=true;break;//$("#M4").attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":document.getElementById("M5").checked=true;break;//$("#M5").attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":document.getElementById("M6").checked=true;break;//$("#M6").attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":document.getElementById("M7").checked=true;break;//$("#M7").attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":document.getElementById("M8").checked=true;break;//$("#M8").attr('checked',true);break;
		}
		break;
	case "OTRO RESPONSABLE":
		switch(ocu){
		case "DOCENTE":document.getElementById("OR1").checked=true;break;//$("#OR1").attr('checked',true);break;
		case "MIEMBRO PNP":document.getElementById("OR2").checked=true;break;//$("#OR2").attr('checked',true);break;
		case "PENSIONISTA":document.getElementById("OR3").checked=true;break;//$("#OR3").attr('checked',true);break;
		case "EMPLEADO - ESTABLE":document.getElementById("OR4").checked=true;break;//$("#OR4").attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":document.getElementById("OR5").checked=true;break;//$("#OR5").attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":document.getElementById("OR6").checked=true;break;//$("#OR6").attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":document.getElementById("OR7").checked=true;break;//$("#OR7").attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":document.getElementById("OR8").checked=true;break;//$("#OR8").attr('checked',true);break;
		}
		break;
	case "ESTUDIANTE":
		switch(ocu){
		case "DOCENTE":document.getElementById("EST1").checked=true;break;//$("#EST1").attr('checked',true);break;
		case "MIEMBRO PNP":document.getElementById("EST2").checked=true;break;//$("#EST2").attr('checked',true);break;
		case "PENSIONISTA":document.getElementById("EST3").checked=true;break;//$("#EST3").attr('checked',true);break;
		case "EMPLEADO - ESTABLE":document.getElementById("EST4").checked=true;break;//$("#EST4").attr('checked',true);break;
		case "EMPLEADO - CONTRATADO":document.getElementById("EST5").checked=true;break;//$("#EST5").attr('checked',true);break;
		case "PROFESIONAL INDEPENDIENTE":document.getElementById("EST6").checked=true;break;//$("#EST6").attr('checked',true);break;
		case "DIVERSOS OFICIOS INDEP. Y TECNICOS":document.getElementById("EST7").checked=true;break;//$("#EST7").attr('checked',true);break;
		case "COMERCIANTE, EMPRESARIO U OTROS":document.getElementById("EST8").checked=true;break;//$("#EST8").attr('checked',true);break;
		}
		break;


	}
	 
	 //........Ingresos
}
function cargar_datosIng(per,cant){
	switch(per){
	case "PADRE":
	switch(cant){
		case "100 A 500":$('input:radio[name=iP]')[0].checked = true;break;
		case "501 A 1000":$('input:radio[name=iP]')[1].checked = true;break;
		case "1001 A 1500":$('input:radio[name=iP]')[2].checked = true;break;
		case "1501 A 2000":$('input:radio[name=iP]')[3].checked = true;break;
		case "2001 A MAS":$('input:radio[name=iP]')[4].checked = true;break;
		case "NO PERCIBE INGRESOS":$('input:radio[name=iP]')[5].checked = true;break;
		}
		break;
	case "MADRE":
		switch(cant){
		case "100 A 500":$('input:radio[name=iM]')[0].checked = true;break;
		case "501 A 1000":$('input:radio[name=iM]')[1].checked = true;break;
		case "1001 A 1500":$('input:radio[name=iM]')[2].checked = true;break;
		case "1501 A 2000":$('input:radio[name=iM]')[3].checked = true;break;
		case "2001 A MAS":$('input:radio[name=iM]')[4].checked = true;break;
		case "NO PERCIBE INGRESOS":$('input:radio[name=iM]')[5].checked = true;break;
		}
		break;
	case "OTRO RESPONSABLE":
		switch(cant){
		case "100 A 500":$('input:radio[name=iOR]')[0].checked = true;break;
		case "501 A 1000":$('input:radio[name=iOR]')[1].checked = true;break;
		case "1001 A 1500":$('input:radio[name=iOR]')[2].checked = true;break;
		case "1501 A 2000":$('input:radio[name=iOR]')[3].checked = true;break;
		case "2001 A MAS":$('input:radio[name=iOR]')[4].checked = true;break;
		case "NO PERCIBE INGRESOS":$('input:radio[name=iOR]')[5].checked = true;break;
		}
		break;
	case "ESTUDIANTE":
		switch(cant){
		case "100 A 300":$('input:radio[name=iE]')[0].checked = true;break;
		case "301 A 500":$('input:radio[name=iE]')[1].checked = true;break;
		case "501 A 1000":$('input:radio[name=iE]')[2].checked = true;break;
		case "1001 A MAS":$('input:radio[name=iE]')[3].checked = true;break;
		case "NO PERCIBE INGRESOS":$('input:radio[name=iE]')[4].checked = true;break;
		}
		break;
	}
}
function cargar_datosEg(nesc,cant){
	switch(nesc){
	case "ALIMENTACION":
	switch(cant){
		case "100 A 250":$('input:radio[name=eAL]')[0].checked = true;break;
		case "251 A 450":$('input:radio[name=eAL]')[1].checked = true;break;
		case "451 A MAS":$('input:radio[name=eAL]')[2].checked = true;break;
		}
		break;
	case "EDUCACION":
		switch(cant){
		case "100 A 200":$('input:radio[name=eED]')[0].checked = true;break;
		case "201 A 400":$('input:radio[name=eED]')[1].checked = true;break;
		case "401 A 600":$('input:radio[name=eED]')[2].checked = true;break;
		case "601 A MAS":$('input:radio[name=eED]')[3].checked = true;break;
		}
		break;
	case "SERVICIOS BASICOS PUBLICOS, PRIVADOS Y VIVIENDA":
		switch(cant){
		case "100 A 250":$('input:radio[name=eVS]')[0].checked = true;break;
		case "251 A 450":$('input:radio[name=eVS]')[1].checked = true;break;
		case "451 A MAS":$('input:radio[name=eVS]')[2].checked = true;break;
		}
		break;
	case "OTROS":
		switch(cant){
		case "100 A 250":$('input:radio[name=eO]')[0].checked = true;break;
		case "251 A 450":$('input:radio[name=eO]')[1].checked = true;break;
		case "451 A MAS":$('input:radio[name=eO]')[2].checked = true;break;;
		}
		break;
	}
	//$('#per').click();
}
function validar_cuadros(){
	adv=false;
	err=false;
	validar_pestanias();

	var llave=true;

		//agregados para la fichas otros datos
		var zb=trim($("input#txtContEmerg").val());
		var zc=trim($("input#txtTelEmerg").val());

		var lzd=$('#cboTransporte').val();
		var lze=$('#cboIngrFamiliar').val();
		var lzf=$('#cboInternet').val();
		//fin agregados para la ficha otros

	//datos no editables por ende no validables---
		var a=trim($("input#nombres").val());
		var b=trim($("input#apellidos_paterno").val());
		var c=trim($("input#apellidos_materno").val());
		//var d=trim($("input#edad").val());
		var e=trim($("input#dni").val());
		var f=trim($("input#aIng").val());
		//--------------------------------------------
		var g=trim($("input#fech_nac").val());
		var h=trim($("input#tel-F").val());
		var i=trim($("input#tel-Cel").val());
		var j=trim($("input#e-mail").val());
		var k=trim($("input#domicilio").val());
		var l=trim($("#estado_civ").val());
		//----------------------------------------------------
		var l_1=$('#provincia_l').val();
		var l_2=$('#distrito_l').val();
		var l_3=$('#ciudad_de_proced').val();
		var l_4=$('#departamento_l').val();

		//----------------------------------------------------
		//datos del combos para el colegio dep pro distrito
		var l_31=$('#cboDepColegio').val();
		var l_32=$('#cboProColegio').val();
		var l_33=$('#cboDisColegio').val();
		var l_34=$('#Sec_Col').val();
		var l_35=$('#cboColegioProce').val();
		
		//----------------------------------------------------
		var ac_1=$("input#txtFac").val();
		var ac_2=$("input#txtCarPro").val();
		var ac_3=$("input#txtModEst").val();
		
		var acx_1=$('input:radio[name=rED]')[0].checked;
		var acx_2=$('input:radio[name=rED]')[1].checked;
		var acx_3=$('input:radio[name=rED]')[2].checked;
		var acx_4=$('input:radio[name=rED]')[3].checked;
		var acx_5=$('input:radio[name=rED]')[4].checked;
		var acx_6=$('input:radio[name=rED]')[5].checked; 
		
		var acy_1=$('input:radio[name=BU]')[0].checked;
		var acy_2=$('input:radio[name=BU]')[1].checked;
		var acy_3=$('input:radio[name=BU]')[2].checked;
		var acy_4=$('input:radio[name=BU]')[3].checked;
		//-----------------------------------------------------
		var g_1=$('input:radio[name=GC]')[0].checked;
		var g_2=$('input:radio[name=GC]')[1].checked;
		var g_3=$('input:radio[name=GC]')[2].checked;           
		var g_4=$('input:radio[name=GC]')[3].checked;
		var g_5=$('input:radio[name=GC]')[4].checked;
		var g_6=$('input:radio[name=GC]')[5].checked;
		var g_7=$('input:radio[name=GC]')[6].checked;
		//-----------------------------------------------------
		var i_a1=$('input:radio[name=iP]')[0].checked;
		var i_a2=$('input:radio[name=iP]')[1].checked;
		var i_a3=$('input:radio[name=iP]')[2].checked;
		var i_a4=$('input:radio[name=iP]')[3].checked;
		var i_a5=$('input:radio[name=iP]')[4].checked;
		var i_a6=$('input:radio[name=iP]')[5].checked;

		var i_b1=$('input:radio[name=iM]')[0].checked;
		var i_b2=$('input:radio[name=iM]')[1].checked;
		var i_b3=$('input:radio[name=iM]')[2].checked;
		var i_b4=$('input:radio[name=iM]')[3].checked;
		var i_b5=$('input:radio[name=iM]')[4].checked;
		var i_b6=$('input:radio[name=iM]')[5].checked;

		var i_c1=$('input:radio[name=iOR]')[0].checked;
		var i_c2=$('input:radio[name=iOR]')[1].checked;
		var i_c3=$('input:radio[name=iOR]')[2].checked;
		var i_c4=$('input:radio[name=iOR]')[3].checked;
		var i_c5=$('input:radio[name=iOR]')[4].checked;
		var i_c6=$('input:radio[name=iOR]')[5].checked;

		var i_d1=$('input:radio[name=iE]')[0].checked;
		var i_d2=$('input:radio[name=iE]')[1].checked;
		var i_d3=$('input:radio[name=iE]')[2].checked;
		var i_d4=$('input:radio[name=iE]')[3].checked;
		var i_d5=$('input:radio[name=iE]')[4].checked;
		//-----------------------------------------------------
		var e_a1=$('input:radio[name=eAL]')[0].checked;
		var e_a2=$('input:radio[name=eAL]')[1].checked;
		var e_a3=$('input:radio[name=eAL]')[2].checked;

		var e_b1=$('input:radio[name=eED]')[0].checked;
		var e_b2=$('input:radio[name=eED]')[1].checked;
		var e_b3=$('input:radio[name=eED]')[2].checked;
		var e_b4=$('input:radio[name=eED]')[3].checked;

		var e_c1=$('input:radio[name=eVS]')[0].checked;
		var e_c2=$('input:radio[name=eVS]')[1].checked;
		var e_c3=$('input:radio[name=eVS]')[2].checked;

		var e_d1=$('input:radio[name=eO]')[0].checked;
		var e_d2=$('input:radio[name=eO]')[1].checked;
		var e_d3=$('input:radio[name=eO]')[2].checked;
		//------------------------------------------------------
		var v_a1=$('input:radio[name=vT]')[0].checked;
		var v_a2=$('input:radio[name=vT]')[1].checked;
		var v_a3=$('input:radio[name=vT]')[2].checked;
		var v_a4=$('input:radio[name=vT]')[3].checked;
		var v_a5=$('input:radio[name=vT]')[4].checked;

		var v_b1=$('input:radio[name=vM]')[0].checked;
		var v_b2=$('input:radio[name=vM]')[1].checked;
		var v_b3=$('input:radio[name=vM]')[2].checked;
		var v_b4=$('input:radio[name=vM]')[3].checked;

		var v_c1=$('input:radio[name=vTI]')[0].checked;
		var v_c2=$('input:radio[name=vTI]')[1].checked;
		var v_c3=$('input:radio[name=vTI]')[2].checked;

		var v_d1=$('input:radio[name=vU]')[0].checked;
		var v_d2=$('input:radio[name=vU]')[1].checked;
		var v_d3=$('input:radio[name=vU]')[2].checked;
		var v_d4=$('input:radio[name=vU]')[3].checked;

		var v_e1=$('input:radio[name=vHO]')[0].checked;
		var v_e2=$('input:radio[name=vHO]')[1].checked;
		var v_e3=$('input:radio[name=vHO]')[2].checked;
		var v_e4=$('input:radio[name=vHO]')[3].checked;
		var v_e5=$('input:radio[name=vHO]')[4].checked;
		//-------------------------------------------------------
		var ec_a1=$('[name="P1"]')[0].checked;
		var ec_a2=$('[name="P2"]')[0].checked;
		var ec_a3=$('[name="P3"]')[0].checked;
		var ec_a4=$('[name="P4"]')[0].checked;
		var ec_a5=$('[name="P5"]')[0].checked;
		var ec_a6=$('[name="P6"]')[0].checked;
		var ec_a7=$('[name="P7"]')[0].checked;
		var ec_a8=$('[name="P8"]')[0].checked;

		var ec_b1=$('[name="M1"]')[0].checked;
		var ec_b2=$('[name="M2"]')[0].checked;
		var ec_b3=$('[name="M3"]')[0].checked;
		var ec_b4=$('[name="M4"]')[0].checked;
		var ec_b5=$('[name="M5"]')[0].checked;
		var ec_b6=$('[name="M6"]')[0].checked;
		var ec_b7=$('[name="M7"]')[0].checked;
		var ec_b8=$('[name="M8"]')[0].checked;

		var ec_c1=$('[name="OR1"]')[0].checked;
		var ec_c2=$('[name="OR2"]')[0].checked;
		var ec_c3=$('[name="OR3"]')[0].checked;
		var ec_c4=$('[name="OR4"]')[0].checked;
		var ec_c5=$('[name="OR5"]')[0].checked;
		var ec_c6=$('[name="OR6"]')[0].checked;
		var ec_c7=$('[name="OR7"]')[0].checked;
		var ec_c8=$('[name="OR8"]')[0].checked;

		var ec_d1=$('[name="EST1"]')[0].checked;
		var ec_d2=$('[name="EST2"]')[0].checked;
		var ec_d3=$('[name="EST3"]')[0].checked;
		var ec_d4=$('[name="EST4"]')[0].checked;
		var ec_d5=$('[name="EST5"]')[0].checked;
		var ec_d6=$('[name="EST6"]')[0].checked;
		var ec_d7=$('[name="EST7"]')[0].checked;
		var ec_d8=$('[name="EST8"]')[0].checked;
	//-------------------------------------------	
	
	///agregado para la ficha otros datos
//// datos del colegio 
	if(!ValidaSinDato(l_31))
	{
		Valida_Error("cboDepColegio","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboDepColegio","input");}

	if(!ValidaSinDato(l_32))
	{
		Valida_Error("cboProColegio","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboProColegio","input");}
	if(!ValidaSinDato(l_33))
	{
		Valida_Error("cboDisColegio","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboDisColegio","input");}
	if(!ValidaSinDato(l_34))
	{
		Valida_Error("Sec_Col","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("Sec_Col","input");}
	if(!ValidaSinDato(l_35))
	{
		Valida_Error("cboColegioProce","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboColegioProce","input");}
///


	if(!ValidaSinDato(zb)){
		Valida_Error("txtContEmerg","input");
		err=true;
	    llave=false;	
	}
	else{ Valida_Bien("txtContEmerg","input");
	}

	if(!ValidaSinDato(zc)){
		Valida_Error("txtTelEmerg","input");
		err=true;
	    llave=false;	
	}
	else{ Valida_Bien("txtTelEmerg","input");
	}

	if(!ValidaSinDato(lzd))
	{
		Valida_Error("cboTransporte","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboTransporte","input");}
	
	if(!ValidaSinDato(lze))
	{
		Valida_Error("cboIngrFamiliar","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboIngrFamiliar","input");}
	
	if(!ValidaSinDato(lzf))
	{
		Valida_Error("cboInternet","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("cboInternet","input");}
	
	///fin ficha otros datos

	if(!ValidaSinDato(a)){
		Valida_Advertencia("nombres","input");
		adv=true;
	    llave=false;	
	}
	else{ Valida_Bien("nombres","input");
	}

	if(!ValidaSinDato(b)){
	    Valida_Advertencia("apellidos_paterno","input");
	    adv=true;
		llave=false;	
	}else{ Valida_Bien("apellidos_paterno","input");}
	if(!ValidaSinDato(c)){
        Valida_Advertencia("apellidos_materno","input");
        adv=true;
		llave=false;	
	}else{ Valida_Bien("apellidos_materno","input");}
	if(!ValidaDni(e)){
        Valida_Error("dni","input");
        err=true;
        llave=false;	
	}else{ Valida_Bien("dni","input");}
	if(!ValidaSinDato(f)){
	    Valida_Advertencia("aIng","input");
	    adv=true;
		llave=false;	
	}else{ Valida_Bien("aIng","input");}
	if(!ValidaSinDato(g))
	{
		Valida_Error("fech_nac","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("fech_nac","input");}
	if(!ValidaSinDato(k))
	{
		Valida_Error("domicilio","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("domicilio","input");}
	if(!ValidaSinDato(l))
	{
		Valida_Error("estado_civ","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("estado_civ","input");}
	/*if(!ValidaNumero_Fijo(h))
	{
		Valida_Error("tel-F","input");	
		err=true;
		llave=false;
	}else{ Valida_Bien("tel-F","input");}*/
	if(!ValidaNumero_Cel(i)) 
	{
		Valida_Error("tel-Cel","input");
		err=true;	
		llave=false;
	}else{ Valida_Bien("tel-Cel","input");}
	if(!ValidaMail(j))
	{
		Valida_Error("e-mail","input");	
		err=true;
		llave=false;
	}else{ Valida_Bien("e-mail","input");}

	//-------
	if(!ValidaSinDato(l_1))
	{
		Valida_Error("provincia_l","input");	
		err=true;
		llave=false;	
	}else{ Valida_Bien("provincia_l","input");}
	if(!ValidaSinDato(l_2))
	{
		Valida_Error("distrito_l","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("distrito_l","input");}
	if(!ValidaSinDato(l_3))
	{
		Valida_Error("ciudad_de_proced","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("ciudad_de_proced","input");}
	if(!ValidaSinDato(l_4))
	{
		Valida_Error("departamento_l","input");
		err=true;
		llave=false;	
	}else{ Valida_Bien("departamento_l","input");}

	if(!ValidaSinDato(ac_1))
	{
		Valida_Advertencia("txtFac","input");
		adv=true;
		llave=false;	
	}else{ Valida_Bien("txtFac","input");}

	if(!ValidaSinDato(ac_2))
	{
		Valida_Advertencia("txtCarPro","input");
		adv=false;	
	}else{ Valida_Bien("txtCarPro","input");}

	if(!ValidaSinDato(ac_3))
	{
		Valida_Advertencia("txtModEst","input");
		adv=true;
		llave=false;	
	}else{ Valida_Bien("txtModEst","input");}

	if(!(acx_1||acx_2||acx_3||acx_4||acx_5||acx_6))
	{
		Valida_Error("l_1","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_1","label");}

	if(!(acy_1||acy_2||acy_3||acy_4))
	{
		Valida_Error("l_2","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_2","label");}

	if(!(g_1||g_2||g_3||g_4||g_5||g_6||g_7))
	{
		Valida_Error("l_3","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_3","label");}

	if(!(i_a1||i_a2||i_a3||i_a4||i_a5||i_a6))
	{
		Valida_Error("l_4","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_4","label");}

	if(!(i_b1||i_b2||i_b3||i_b4||i_b5||i_b6))
	{
		Valida_Error("l_5","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_5","label");}

	if(!(i_c1||i_c2||i_c3||i_c4||i_c5||i_c6))
	{
		Valida_Error("l_6","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_6","label");}

	if(!(i_d1||i_d2||i_d3||i_d4||i_d5))
	{
		Valida_Error("l_7","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_7","label");}

	if(!(e_a1||e_a2||e_a3))
	{
		Valida_Error("l_8","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_8","label");}

	if(!(e_b1||e_b2||e_b3||e_b4))
	{
		Valida_Error("l_9","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_9","label");}

	if(!(e_c1||e_c2||e_c3))
	{
		Valida_Error("l_10","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_10","label");}

	if(!(e_d1||e_d2||e_d3))
	{
		Valida_Error("l_11","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_11","label");}

	if(!(v_a1||v_a2||v_a3||v_a4||v_a5))
	{
		Valida_Error("l_12","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_12","label");}

	if(!(v_b1||v_b2||v_b3||v_b4))
	{
		Valida_Error("l_13","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_13","label");}

	if(!(v_c1||v_c2||v_c3))
	{
		Valida_Error("l_14","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_14","label");}


	if(!(v_d1||v_d2||v_d3||v_d4))
	{
		Valida_Error("l_15","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_15","label");}

	if(!(v_e1||v_e2||v_e3||v_e4||v_e5))
	{
		Valida_Error("l_16","label");
		err=true;
		llave=false;	
	}else{ Valida_Bien("l_16","label");}

	if(!((ec_a1||ec_a2||ec_a3||ec_a4||ec_a5||ec_a6||ec_a7||ec_a8)||(ec_b1||ec_b2||ec_b3||ec_b4||ec_b5||ec_b6||ec_b7||ec_b8)||(ec_c1||ec_c2||ec_c3||ec_c4||ec_c5||ec_c6||ec_c7||ec_c8)||(ec_d1||ec_d2||ec_d3||ec_d4||ec_d5||ec_d6||ec_d7||ec_d8)))
	{
		Valida_Error("titu_1","label");
		err=true;
		llave=false;
	}else{ Valida_Bien("titu_1","label");}
	

	return llave;
	
}
//--- funcion que valida si las pestañas han sido rellenadas correctamente -----------
function validar_pestanias(){

	var v1=dPers();
    var v2=dLug();

    var v3=dAca();
    var v11=dLugCol();

    var v4=dGrup();
    var v5=aEco();
    var v6=dIng();
    var v7=dEg();
    var v8=viv();
    var v9=aSal();
    var v10=dOtros();
    

    if(v1&&v2&&v3&&v4&&v5&&v6&&v7&&v8&&v9&&v10&&v11){
    	return true;
    }
    return false;
}
//------------------------------------------------------------------------------------
//-- funciones que verifican si son los datos necesarios en cada pestaña -------------

function dOtros()
{
	var llave=true;

	var zb=trim($("input#txtContEmerg").val());
	var zc=trim($("input#txtTelEmerg").val());
	var lzd=$('#cboTransporte').val();
	var lze=$('#cboIngrFamiliar').val();
	var lzf=$('#cboInternet').val();

	if(!ValidaSinDato(zc)) 
	{
		llave=false;
	}

	if(!ValidaSinDato(zb))
	{
		llave=false;	
	}

	if(!ValidaSinDato(lzd))
	{
		llave=false;	
	}

	if(!ValidaSinDato(lze))
	{
		llave=false;	
	}

	if(!ValidaSinDato(lzf))
	{
		llave=false;	
	}

	if(llave){
	$('<span class="checked"></span>').insertBefore($("#otro"));
	return true;  	
	}
	
	$('<span class="error"></span>').insertBefore($("#otro")); 
	return false;

}

function dPers()
{

	var llave=true;


	//datos no editables por ende no validables---
	var a=trim($("input#nombres").val());
	var b=trim($("input#apellidos_paterno").val());
	var c=trim($("input#apellidos_materno").val());
	//var d=trim($("input#edad").val());
	var e=trim($("input#dni").val());
	var f=trim($("input#aIng").val());
	//--------------------------------------------
	var g=trim($("input#fech_nac").val());
	var h=trim($("input#tel-F").val());
	var i=trim($("input#tel-Cel").val());
	var j=trim($("input#e-mail").val());
	var k=trim($("input#domicilio").val());
	var l=trim($("#estado_civ").val());
	//--------------------de lugar

	var al=$('#provincia_l').val();
	var bl=$('#distrito_l').val();
	var cl=$('#ciudad_de_proced').val();
	var dl=$('#departamento_l').val();

	if(!ValidaSinDato(a)){
	    llave=false;	
	}
	if(!ValidaSinDato(b)){
	    llave=false;	
	}
	if(!ValidaSinDato(c)){
     	llave=false;	
	}
	/*if(!ValidaSinDato(d)){
        
    	llave=false;	
	}*/
	if(!ValidaDni(e)){
        llave=false;	
	}
	if(!ValidaSinDato(f)){
		llave=false;	
	}
	if(!ValidaSinDato(g))
	{
		llave=false;	
	}
	if(!ValidaSinDato(k))
	{
		llave=false;	
	}
	if(!ValidaSinDato(l))
	{
		llave=false;	
	}
	/*if(!ValidaNumero_Fijo(h))
	{
		llave=false;
	}*/
	if(!ValidaNumero_Cel(i)) 
	{
		llave=false;
	}
	if(!ValidaMail(j))
	{
		llave=false;
	}
	//-----------------------------

	if(!ValidaSinDato(al))
	{
		llave=false;	
	}
	if(!ValidaSinDato(bl))
	{
		llave=false;	
	}
	if(!ValidaSinDato(cl))
	{
		llave=false;	
	}
	if(!ValidaSinDato(dl))
	{
		llave=false;	
	}
	if(llave){
	$('<span class="checked"></span>').insertBefore($("#per"));
	return true;  	
	}
	
	$('<span class="error"></span>').insertBefore($("#per")); 
	return false;
}

function dLug()
{
	var llave=true;
///datos de la provincia
	var al=$('#provincia_l').val();
	var bl=$('#distrito_l').val();
	var cl=$('#ciudad_de_proced').val();
	var dl=$('#departamento_l').val();

	if(!ValidaSinDato(al))
	{
		llave=false;	
	}
	if(!ValidaSinDato(bl))
	{
		llave=false;	
	}
	if(!ValidaSinDato(cl))
	{
		llave=false;	
	}
	if(!ValidaSinDato(dl))
	{
		llave=false;	
	}
//fin datos de la provincia

//vuelvo a llamar a dtos personales para verificar si esta completo
var tmp=dPers();
//
	if(llave&&tmp)
	{
	$('<span class="checked"></span>').insertBefore($("#per")); 
	return true;
	}

	$('<span class="error"></span>').insertBefore($("#per")); 
	return false;

}
function dLugCol()
{
	var llave=true;
	//agregado apara los campos de los colegios
	var dl1=$('#cboDepColegio').val();
	var dl2=$('#cboProColegio').val();
	var dl3=$('#cboDisColegio').val();
	var dl4=$('#Sec_Col').val();
	var dl5=$('#cboColegioProce').val();

	if(!ValidaSinDato(dl1)){
	    llave=false;	
	}
	if(!ValidaSinDato(dl2)){
	    llave=false;	
	}
	if(!ValidaSinDato(dl3)){
	    llave=false;	
	}
	if(!ValidaSinDato(dl4)){
	    llave=false;	
	}
	if(!ValidaSinDato(dl5)){
	    llave=false;	
	}
//////fin agregado por la ficha otros datos
//llamo nuevamente a dAcad() para verificar si esta ok
var tmp1=dAca();
// fin llamo nuevamente a dAcad() para verificar si esta ok
	if(llave&&tmp1)
	{
	$('<span class="checked"></span>').insertBefore($("#aca")); 
	return true;
	}

	$('<span class="error"></span>').insertBefore($("#aca")); 
	return false;
}

function dAca()
{
	var llave=true;

	var a=$("input#txtFac").val();
	var b=$("input#txtCarPro").val();
	var c=$("input#txtModEst").val();
	//var d=$("input[name='rED']:checked").val();
	var d1=$('input:radio[name=rED]')[0].checked;
	var d2=$('input:radio[name=rED]')[1].checked;
	var d3=$('input:radio[name=rED]')[2].checked;
	var d4=$('input:radio[name=rED]')[3].checked;
	var d5=$('input:radio[name=rED]')[4].checked;
	var d6=$('input:radio[name=rED]')[5].checked; 
	//var e=$("input[name='BU']:checked").val();  
	var e1=$('input:radio[name=BU]')[0].checked;
	var e2=$('input:radio[name=BU]')[1].checked;
	var e3=$('input:radio[name=BU]')[2].checked;
	var e4=$('input:radio[name=BU]')[3].checked;

///////

	if(!ValidaSinDato(a)){
	    llave=false;	
	}

	if(!ValidaSinDato(a))
	{
		llave=false;	
	}

	if(!ValidaSinDato(b))
	{
		llave=false;	
	}

	if(!ValidaSinDato(c))
	{
		llave=false;	
	}

	if(!(d1||d2||d3||d4||d5||d6))
	{
		llave=false;	
	}

	if(!(e1||e2||e3||e4))
	{
		llave=false;	
	}	

	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#aca")); 
	return true;
	}
	$('<span class="error"></span>').insertBefore($("#aca")); 
	return false;
	
}

function dGrup()
{
	var llave=true;

	var a=$('input:radio[name=GC]')[0].checked;
	var b=$('input:radio[name=GC]')[1].checked;
	var c=$('input:radio[name=GC]')[2].checked;           
	var d=$('input:radio[name=GC]')[3].checked;
	var e=$('input:radio[name=GC]')[4].checked;
	var f=$('input:radio[name=GC]')[5].checked;
	var g=$('input:radio[name=GC]')[6].checked;

	if(!(a||b||c||d||e||f||g))
	{
		llave=false;	
	}

	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#conv"));  
	return true;
	}
	$('<span class="error"></span>').insertBefore($("#conv"));  
	return false;
	
}

function aEco()
{
	var llave=true;

	var a1=$('[name="P1"]')[0].checked;
	var a2=$('[name="P2"]')[0].checked;
	var a3=$('[name="P3"]')[0].checked;
	var a4=$('[name="P4"]')[0].checked;
	var a5=$('[name="P5"]')[0].checked;
	var a6=$('[name="P6"]')[0].checked;
	var a7=$('[name="P7"]')[0].checked;
	var a8=$('[name="P8"]')[0].checked;

	var b1=$('[name="M1"]')[0].checked;
	var b2=$('[name="M2"]')[0].checked;
	var b3=$('[name="M3"]')[0].checked;
	var b4=$('[name="M4"]')[0].checked;
	var b5=$('[name="M5"]')[0].checked;
	var b6=$('[name="M6"]')[0].checked;
	var b7=$('[name="M7"]')[0].checked;
	var b8=$('[name="M8"]')[0].checked;

	var c1=$('[name="OR1"]')[0].checked;
	var c2=$('[name="OR2"]')[0].checked;
	var c3=$('[name="OR3"]')[0].checked;
	var c4=$('[name="OR4"]')[0].checked;
	var c5=$('[name="OR5"]')[0].checked;
	var c6=$('[name="OR6"]')[0].checked;
	var c7=$('[name="OR7"]')[0].checked;
	var c8=$('[name="OR8"]')[0].checked;

	var d1=$('[name="EST1"]')[0].checked;
	var d2=$('[name="EST2"]')[0].checked;
	var d3=$('[name="EST3"]')[0].checked;
	var d4=$('[name="EST4"]')[0].checked;
	var d5=$('[name="EST5"]')[0].checked;
	var d6=$('[name="EST6"]')[0].checked;
	var d7=$('[name="EST7"]')[0].checked;
	var d8=$('[name="EST8"]')[0].checked;

	if(!((a1||a2||a3||a4||a5||a6||a7||a8)||(b1||b2||b3||b4||b5||b6||b7||b8)||(c1||c2||c3||c4||c5||c6||c7||c8)||(d1||d2||d3||d4||d5||d6||d7||d8)))
	{
		llave=false;
	}
	
	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#aEco"));  
	return true;
	}
	
	$('<span class="error"></span>').insertBefore($("#aEco"));  
	return false;
	
}
  
function dIng()
{
	var llave=true;

	var a1=$('input:radio[name=iP]')[0].checked;
	var a2=$('input:radio[name=iP]')[1].checked;
	var a3=$('input:radio[name=iP]')[2].checked;
	var a4=$('input:radio[name=iP]')[3].checked;
	var a5=$('input:radio[name=iP]')[4].checked;
	var a6=$('input:radio[name=iP]')[5].checked;

	var b1=$('input:radio[name=iM]')[0].checked;
	var b2=$('input:radio[name=iM]')[1].checked;
	var b3=$('input:radio[name=iM]')[2].checked;
	var b4=$('input:radio[name=iM]')[3].checked;
	var b5=$('input:radio[name=iM]')[4].checked;
	var b6=$('input:radio[name=iM]')[5].checked;

	var c1=$('input:radio[name=iOR]')[0].checked;
	var c2=$('input:radio[name=iOR]')[1].checked;
	var c3=$('input:radio[name=iOR]')[2].checked;
	var c4=$('input:radio[name=iOR]')[3].checked;
	var c5=$('input:radio[name=iOR]')[4].checked;
	var c6=$('input:radio[name=iOR]')[5].checked;

	var d1=$('input:radio[name=iE]')[0].checked;
	var d2=$('input:radio[name=iE]')[1].checked;
	var d3=$('input:radio[name=iE]')[2].checked;
	var d4=$('input:radio[name=iE]')[3].checked;
	var d5=$('input:radio[name=iE]')[4].checked;

	if(!(a1||a2||a3||a4||a5||a6))
	{
		llave=false;	
	}

	if(!(b1||b2||b3||b4||b5||b6))
	{
		llave=false;	
	}

	if(!(c1||c2||c3||c4||c5||c6))
	{
		llave=false;	
	}

	if(!(d1||d2||d3||d4||d5))
	{
		llave=false;	
	}

	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#ing")); 
	return true;
	}

	$('<span class="error"></span>').insertBefore($("#ing")); 
	return false;
	
}
  
function dEg(){

	var llave=true;

	var a1=$('input:radio[name=eAL]')[0].checked;
	var a2=$('input:radio[name=eAL]')[1].checked;
	var a3=$('input:radio[name=eAL]')[2].checked;

	var b1=$('input:radio[name=eED]')[0].checked;
	var b2=$('input:radio[name=eED]')[1].checked;
	var b3=$('input:radio[name=eED]')[2].checked;
	var b4=$('input:radio[name=eED]')[3].checked;

	var c1=$('input:radio[name=eVS]')[0].checked;
	var c2=$('input:radio[name=eVS]')[1].checked;
	var c3=$('input:radio[name=eVS]')[2].checked;

	var d1=$('input:radio[name=eO]')[0].checked;
	var d2=$('input:radio[name=eO]')[1].checked;
	var d3=$('input:radio[name=eO]')[2].checked;


	if(!(a1||a2||a3))
	{
		llave=false;	
	}

	if(!(b1||b2||b3||b4))
	{
		llave=false;	
	}

	if(!(c1||c2||c3))
	{
		llave=false;	
	}

	if(!(d1||d2||d3))
	{
		llave=false;	
	}

	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#eg"));  
	return true;
	}
	
	$('<span class="error"></span>').insertBefore($("#eg"));
	return false;
	
}
  
function viv(){

	var llave=true;

	var a1=$('input:radio[name=vT]')[0].checked;
	var a2=$('input:radio[name=vT]')[1].checked;
	var a3=$('input:radio[name=vT]')[2].checked;
	var a4=$('input:radio[name=vT]')[3].checked;
	var a5=$('input:radio[name=vT]')[4].checked;

	var b1=$('input:radio[name=vM]')[0].checked;
	var b2=$('input:radio[name=vM]')[1].checked;
	var b3=$('input:radio[name=vM]')[2].checked;
	var b4=$('input:radio[name=vM]')[3].checked;

	var c1=$('input:radio[name=vTI]')[0].checked;
	var c2=$('input:radio[name=vTI]')[1].checked;
	var c3=$('input:radio[name=vTI]')[2].checked;

	var d1=$('input:radio[name=vU]')[0].checked;
	var d2=$('input:radio[name=vU]')[1].checked;
	var d3=$('input:radio[name=vU]')[2].checked;
	var d4=$('input:radio[name=vU]')[3].checked;

	var e1=$('input:radio[name=vHO]')[0].checked;
	var e2=$('input:radio[name=vHO]')[1].checked;
	var e3=$('input:radio[name=vHO]')[2].checked;
	var e4=$('input:radio[name=vHO]')[3].checked;
	var e5=$('input:radio[name=vHO]')[4].checked;

	if(!(a1||a2||a3||a4||a5))
	{
		llave=false;	
	}

	if(!(b1||b2||b3||b4))
	{
		llave=false;	
	}

	if(!(c1||c2||c3))
	{
		llave=false;	
	}


	if(!(d1||d2||d3||d4))
	{
		llave=false;	
	}

	if(!(e1||e2||e3||e4||e5))
	{
		llave=false;	
	}

	if(llave)
	{
	$('<span class="checked"></span>').insertBefore($("#viv")); 
	return true;
	}
	$('<span class="error"></span>').insertBefore($("#viv")); 
	return false;
	
}
  
function aSal(){
	$('<span class="checked"></span>').insertBefore($("#sal")); 
	return true;
}

function calendario(id,btn){
Calendar.setup({ 
inputField     :    "fech_nac",     // id del campo de texto 
ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto 
button     :    "lanzador"     // el id del botón que lanzará el calendario 
}); 	
}

/*$("#cerrar").click(function () 
{
	$("#mensaje").dialog('destroy').close();//destruir y no volver a ver popup
});*/


//------------------------------------------------------------------------------------------------------
//DOCUMENTACIÓN ADICIONAL
/*

DesarrolloWeb.com > Manuales > Manual de jQueryUI	
Opciones del plugin Dialog de jQuery UI. Caja modal.
19 de mayo de 2010
Compartir en redes sociales
Valoración del artículo:
0 votos
Enviar un comentario
Cómo configurar las cajas de diálogo a través de un objeto de opciones que enviamos al método dialog(), de jQuery UI. Vemos también cómo hacer una caja modal.
Por Miguel Angel Alvarez
En el artículo anterior comenzamos a explicar lo que son las cajas de diálogo y cómo jQuery UI ofrece un fantástico plugin para implementarlas. Además vimos un par de ejemplos iniciales que convendría tener presentes antes de continuar con el presente ejemplo.

Como vimos, existe un método llamado dialog() que tenemos que invocar para convertir un elemento DIV en una caja de diálogo. Lo que no habíamos visto todavía es que a este método podemos pasarle parámetros para configurar dicha caja, a partir de una serie de opciones. Todas las opciones tienen valores por defecto, con lo que en los anteriores ejemplos, simplemente estábamos abriendo una caja de diálogo configurada por defecto.

Las opciones de configuración las tenemos que enviar en notación de objeto, indicando una serie de atributos u opciones con sus diferentes valores. Podríamos ver un ejemplo de caja de diálogo configurada con diferentes valores que los estándar:

$("#dialogo").dialog({
   modal: true,
   title: "Caja con opciones",
   width: 550,
   minWidth: 400,
   maxWidth: 650,
   show: "fold",
   hide: "scale"
});

Como se está viendo en el código anterior, se está creando una caja de diálogo a partir de un elemento de la página que tiene el identificador id=dialogo. Además, al método dialog() le estoy pasando un objeto formado por distintas propiedades.

Podemos ver cómo sería la caja del anterior ejemplo en una página aparte.
Caja modal (modal box)
Una de los ejemplos más recurridos y de las preguntas que seguro solicitarán más personas es cómo hacer las cajas modales, lo que en inglés se llama "Modal box". Es una caja que al aparecer hace que toda la página se oscurezca, menos la propia caja de diálogo, para llamar la atención del usuario y no permitir que haga otras cosas, sino prestar atención al texto de la caja o a las acciones que solicite.

Esto se consigue con el primero de los atributos del objeto de opciones del código anterior.

modal: true
Otras options del cuadro de diálogo
Aparte de la propiedad para hacer cajas modales, hemos aplicado otra serie de atributos que comentamos a continuación:

title: "Caja con opciones"
La propiedad title sirve para cambiar el título de la caja de diálogo y se tiene en cuenta antes del contenido que pueda tener el atributo title del DIV con el que se ha hecho la caja.

width: 550
La propiedad width indica el ancho de la caja modal, en píxeles.

minWidth: 400
Es la anchura mínima permitida. Recordemos que el usuario puede redimensionar la caja, de modo que la anchura real de la misma podría variar. Si definimos el atributo minWidth nos aseguraremos que su anchura nunca baje de este valor en píxeles.

maxWidth: 650
De manera similar a minWidth, pero para definir una anchura máxima permitida.

show: "fold"
Con el atributo show podemos definir un efecto para que la caja de diálogo no se muestre de golpe sino con una transición suavizada. El valor de show que podemos seleccionar es una cadena de caracteres con alguno de los efectos posibles. Leer la nota sobre este tema.

hide: "scale"
Igual que el atributo show, pero sirve para definir la transición o efecto utilizado al cerrar la ventana de diálogo.

Nota: Como se vio en anteriores ejemplos, las cajas de diálogo aparecen de golpe, pero nosotros podemos querer que aparezcan de manera suavizada con una transición o efecto dadas. En jQuery UI ya están creados una buena variedad de efectos, que se pueden encontrar entre los componentes de descarga de las librerías.

Algunos efectos que podremos asignar a la animación de mostrar u ocultar el cuadro de diálogo son "explode", "fold", "scale", "clip", "slide", etc. Es conveniente comentar que estos efectos no están creados exclusivamente para animar las cajas, sino para animar muchos otros componentes de jQueryUI.

Para poder activar cualquiera de estos efectos tenemos que haber descargado un paquete de jQuery UI que los contenga, es decir, haber seleccionado alguno de esos componentes de efectos cuando descargamos las librerías para interfaces de usuario. 

*/