
<legend>Grupo de Convivencia</legend>
<p><label id="l_3" name="l_3">¿Con quienes vives?</label></p>
<p>
<label class="ancho4" for="GC1">
<input id="GC_1" name="GC" type="radio" value="PADRES Y HERMANOS"/>
Padres y Hermanos
</label>
<label class="ancho4" for="GC2">
<input id="GC_2" name="GC" type="radio" value="MADRE Y HERMANOS"/>
Madre y Hermanos
</label>
<label class="ancho4" for="GC3">
<input id="GC_3" name="GC" type="radio" value="PADRE Y HERMANOS"/>
Padre y Hermanos
</label>
<label class="ancho4" for="GC4">
<input id="GC_4" name="GC" type="radio" value="SOLO CON MADRE"/>
Sólo con Madre
</label>
<label class="ancho4" for="GC5">
<input id="GC_5" name="GC" type="radio" value="CON HERMANOS"/>
Con Hermanos
</label>
<label class="ancho4" for="GC6">
<input id="GC_6" name="GC" type="radio" value="OTROS FAMILIARES"/>
Otros Familiares
</label>
<label class="ancho4" for="GC7">
<input id="GC_7" name="GC" type="radio" value="SOLO" />
Sólo
</label>
</p>
<p>
<label class="ancho4">N° de Hermanos(sin incluirse)</label>
<select name="N_Herm" id="N_Herm" >
<option value="Ninguno">Ninguno</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6 A MAS">6 a más</option>
</select>
</p>    
<script>
$("#N_Herm").change(function(){
var num=$("#N_Herm").val();

if(num!="Ninguno"){
document.getElementById("N_Herm_NE").selectedIndex=0;//cantidad de opciones
$("#N_Herm_NE").attr("disabled",false);
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
$('#N_Herm_Est_IEP').attr("disabled",false);
document.getElementById("N_Herm_Est_IEE").selectedIndex=0;
$("#N_Herm_Est_IEE").attr("disabled",false);
}else{
document.getElementById("N_Herm_NE").selectedIndex=0;//cantidad de opciones
$("#N_Herm_NE").attr("disabled",true);
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
$('#N_Herm_Est_IEP').attr("disabled",true);
document.getElementById("N_Herm_Est_IEE").selectedIndex=0;
$("#N_Herm_Est_IEE").attr("disabled",true);

}

});
</script>
<p>
<label class="ancho4">Hermanos en etapa no Escolar</label>
<select name="N_Herm_NE" id="N_Herm_NE" disabled="disabled">
<option value="Ninguno">Ninguno</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6 A MAS">6 a más</option>
</select>
</p>
<script>
$("#N_Herm_NE").change(function(){
var num=$("#N_Herm_NE").val();
var total=$("#N_Herm").val();
var num2=$("#N_Herm_Est_IEE").val();
var num3=$("#N_Herm_Est_IEP").val();
if(num!="Ninguno"){

if(total!="6 A MAS"){
$totalT=0;
if(parseInt(num2)>0){
$totalT+=parseInt(num2);
}
if(parseInt(num3)>0){
$totalT+=parseInt(num3);
}
if(parseInt(num)>0){
$totalT+=parseInt(num);
}
if((parseInt(total)<$totalT)){
alert("Numero de hermanos en etapa no escolar es mayor a la cantidad de hermanos");
document.getElementById("N_Herm_NE").selectedIndex=0;
document.getElementById("N_Herm_Est_IEE").selectedIndex=0;
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;

}else if(parseInt(total)==$totalT){
document.getElementById("N_Herm_Est_IEE").selectedIndex=0;
$("#N_Herm_Est_IEE").attr("disabled",true);
$("#N_Herm_Est_IEP").attr("disabled",true);
}else{
$("#N_Herm_Est_IEE").attr("disabled",false);
$("#N_Herm_Est_IEP").attr("disabled",false);
}           

}     else{

}           
}

});
</script>
<p>
<label class="ancho4">Hnos. Estudiantes en Instituciones Educativas Estatales</label>
<select name="N_Herm_Est_IEE" id="N_Herm_Est_IEE" disabled="disabled">
<option value="Ninguno">Ninguno</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6 A MAS">6 a más</option>
</select>
</p>
<script>
$("#N_Herm_Est_IEE").change(function(){
var num=$("#N_Herm_NE").val();
var total=$("#N_Herm").val();
var num2=$("#N_Herm_Est_IEE").val();
if(num2!="Ninguno"){

if(total!="6 A MAS"){
$totalT=0;
if(parseInt(num2)>0){
$totalT+=parseInt(num2);
}
if(parseInt(num)>0){
$totalT+=parseInt(num);
}
if((parseInt(total)<$totalT)){

alert("Numero de hermanos en etapa no escolar y en estudiantes de Estatal es mayor a la cantidad de hermanos");
document.getElementById("N_Herm_Est_IEE").selectedIndex=0;
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
//$("#N_Herm_Est_IEP").attr("disabled",true);
}else if((parseInt(total)==$totalT)){

document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
$("#N_Herm_Est_IEP").attr("disabled",true);
}                       
else{             
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
$('#N_Herm_Est_IEP').attr("disabled",false);}
}else{
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
$('#N_Herm_Est_IEP').attr("disabled",false);
}

}else{

}


});                                               
</script>
<p>
<label class="ancho4">Hnos. Estudiantes en Instuciones Educativas Particulares(sin incluirse)</label>
<select name="N_Herm_Est_IEP" id="N_Herm_Est_IEP" disabled="disabled">
<option value="Ninguno">Ninguno</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6 A MAS">6 a más</option>
</select>
</p>
<script>
$("#N_Herm_Est_IEP").change(function(){
var total=$("#N_Herm").val();
var num=$("#N_Herm_Est_IEP").val();
if(num!="Ninguno"){
if(total!="6 A MAS"){
var num1=$("#N_Herm_Est_IEE").val();
var num2=$("#N_Herm_NE").val();

//falta
$totalT=0;
if(parseInt(num2)>0){
$totalT+=parseInt(num2);
}
if(parseInt(num1)>0){
$totalT+=parseInt(num1);
}
if(parseInt(num)>0){
$totalT+=parseInt(num);
}
if((parseInt(total)!=$totalT)){
alert("N° Her. no Escolar: "+num2+"\nN° Her. en Estatal: "+num1+"\nN° Her. en Particular: "+num+"\nTOTAL DE HERMANOS: "+total+"\nNO CONINCIDE LA CANTIDAD DE HERMANOS!!! ");
document.getElementById("N_Herm_Est_IEP").selectedIndex=0;
}

}
}
});
</script>