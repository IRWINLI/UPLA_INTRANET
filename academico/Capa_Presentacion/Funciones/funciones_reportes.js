function rpt_salones() {

    var div = $('<div />').appendTo('body');
    div.attr('id', 'reporte');
    var car ='is';
    var esp = 'SX';
    
    mostrarCargando();
    $('#reporte').load("RptSalones?"+$.param(
        { 
            car:car,
            esp:esp,
        }                                       
    ));
    
    $('#reporte').dialog({
        title: "Constancia de Matrícula",
        modal: true,
        width: 900,
        height: 500,
        draggable:true,
        position: ["center",50],
        closeOnEscape : "true"
    });
   

}