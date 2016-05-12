//deshabilitar y habilitar campos de tratamiento:
var tratamiento = '';
try {
    tratamiento = document.getElementById("txtDescripcionTedit").value;    
} catch (e) {
    
}

if (tratamiento != '') {    
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < 9; i++) {
        inputs[i].disabled = true;
    }
    document.getElementById("txtDescripcionTedit").disabled = true;
    document.getElementById("txtFormaPagoTedit").disabled = true;
    document.getElementById("btnModificarT").disabled = true;
}

//habilitar campos del formulario datosTratamiento
$("#btnEditarT").click(function (event) {
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < 9; i++) {
        inputs[i].disabled = false;
    }
    document.getElementById("txtDescripcionTedit").disabled = false;
    document.getElementById("txtFormaPagoTedit").disabled = false; 
    document.getElementById("btnModificarT").disabled = false;
});
//----------------------------------------- 

//deshabilitar campos del formulario datosTratamiento
$("#btnCancelarTedit").click(function (event) {
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < 9; i++) {
        inputs[i].disabled = true;
    }
    document.getElementById("txtDescripcionTedit").disabled = true;
    document.getElementById("txtFormaPagoTedit").disabled = true; 
    document.getElementById("btnModificarT").disabled = true;
});
//-----------------------------------------

//calcular total tratamiento:
function calcularTotal(){    
    
    ope = end = per = cx = rh = ort = otr = 0;
    if(document.getElementById("txtOperatoria").value!='') ope = parseInt(document.getElementById("txtOperatoria").value);
    if(document.getElementById("txtEndodoncia").value!='') end = parseInt(document.getElementById("txtEndodoncia").value);
    if(document.getElementById("txtPeriodoncia").value!='') per = parseInt(document.getElementById("txtPeriodoncia").value);
    if(document.getElementById("txtCx_implantologia").value!='') cx = parseInt(document.getElementById("txtCx_implantologia").value);
    if(document.getElementById("txtRehabilitacion").value!='') rh = parseInt(document.getElementById("txtRehabilitacion").value);
    if(document.getElementById("txtOrtodoncia").value!='') ort = parseInt(document.getElementById("txtOrtodoncia").value);    
    if(document.getElementById("txtOtros").value!='') otr = parseInt(document.getElementById("txtOtros").value);                    
            
    var total = ope+end+per+cx+rh+ort+otr;
    document.getElementById("txtTotal").value = total;    
}

//enviar datos al modal de editar movimiento
$('#frmEditMovimiento').on('show.bs.modal', function (event) {
    var button  = $(event.relatedTarget)
    var id      = button.data('id')
    var fecha   = button.data('fecha')
    var recibo  = button.data('recibo')
    var abono   = button.data('abono')    
    var id_trat = button.data('id_trat')
    
    document.getElementById("id_movimiento").value = id;
    document.getElementById("txtFechaEdit").value = fecha;
    document.getElementById("txtReciboEdit").value = recibo;
    document.getElementById("txtAbonoEdit").value = abono;    
    document.getElementById("id_tratamientoEdit").value = id_trat;
    
});

