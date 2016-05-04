$(document).on("ready",inicio);
function inicio(){
    $('#msgNewPacienteError').hide();
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    //deshabilitar campos del formulario de findPaciente
    //var URLactual = window.location;
    //id = document.getElementById("identificacion").value;
    //if(URLactual=='http://localhost:8080/appClinicaDental/paciente/buscarPaciente' || URLactual == 'http://localhost:8080/appClinicaDental/paciente/edit/'+id || 'http://localhost:8080/appClinicaDental/paciente/buscarPaciente#historias'){
        paciente = document.getElementById("txtApellido1FindP").value;
        if(paciente!=''){
        
            var inputs = document.getElementsByTagName("input");
            for (var i = 1; i < 84; i++) {            
                inputs[i].disabled = true;            
            }
            document.getElementById("txtMotivoConsulta").disabled = true;
            document.getElementById("txtObservacionAnamnesis").disabled = true;
            document.getElementById("txtDescripProtesis").disabled = true;
            document.getElementById("txtObservacionesPaciente").disabled = true;
            document.getElementById("btnModificarP").disabled = true;        
        }        
    //}        
    
    //habilitar campos del formulario findPaciente
    $("#btnEditarP").click(function(event){        
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < 84; i++) {
            inputs[i].disabled = false;
        }
        document.getElementById("txtMotivoConsulta").disabled = false;
        document.getElementById("txtObservacionAnamnesis").disabled = false;
        document.getElementById("txtDescripProtesis").disabled = false;
        document.getElementById("txtObservacionesPaciente").disabled = false;
        document.getElementById("btnModificarP").disabled = false;
        
    });  
    
    //enviar datos al modal de nueva historia clinica
    $('#frmEditHistoria').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var fecha = button.data('fecha') // Extract info from data-* attributes
        var proc = button.data('proc')
        var fp = button.data('fp')
        var fo = button.data('fo')
        //var modal = $(this)
        
        document.getElementById("id_historia_clinica").value = id;
        document.getElementById("txtFechaHc").value = fecha;
        document.getElementById("txtProcedimientoHc").value = proc;
        document.getElementById("txtFirmaP").value = fp;
        document.getElementById("txtFirmaO").value = fo;
        
        //modal.find('.modal-body input-date').val(fecha)
        
    });
}

function verificarIdentificacion(id){
    if(id!="") mostrarDatos(id);    
}

function mostrarDatos(id){        
    $.ajax({
        url: 'http://localhost:8080/appClinicaDental/paciente/verificarExiste/'+id,
        type: 'POST',
        data: {buscar:id},
        success: function( result ) {                
            var res = eval(result);                

            if(res==null){                    
                document.getElementById("btnGuardar").disabled = false;
                $('#msgNewPacienteError').hide();                
            }
            else{ 
                //alert(respuesta);                
                $('#msgNewPacienteError').show();
                $(".list-errors").html('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>'+'&nbsp;&nbsp;'+"Ya existe un Paciente con esta indentificación");
                
                window.scrollTo(500, 0);
                document.getElementById("btnGuardar").disabled = true;
            }                
        }
    });        
}