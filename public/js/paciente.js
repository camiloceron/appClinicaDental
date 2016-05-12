$(document).on("ready", inicio);
function inicio() {       
    $('#msgNewPacienteError').hide();
    //scroll navegacion:
    $(document).ready(function () {
        //estilo del tooltip:
        $('[data-toggle="tooltip"]').tooltip();
        
        //tablas jquery:
        $('#example').DataTable();
        
        // Show or hide the sticky footer button:
        $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                        $('.go-top').fadeIn(200);
                } else {
                        $('.go-top').fadeOut(200);
                }
        });

        // Animate the scroll to top
        $('.go-top').click(function(event) {
                event.preventDefault();

                $('html, body').animate({scrollTop: 0}, 300);
        })
    });      
    
    //Deshabilitar y habilitar campos depaciente:
    var paciente = '';
    try {
        paciente = document.getElementById("txtApellido1FindP").value;            
    } catch (e) {
        
    }   
                             
    if (paciente != '') {

        var inputs = document.getElementsByTagName("input");
        for (var i = 1; i < 85; i++) {
            inputs[i].disabled = true;
        }
        
        document.getElementById("txtMotivoConsulta").disabled = true;
        document.getElementById("txtObservacionAnamnesis").disabled = true;
        document.getElementById("txtDescripProtesis").disabled = true;
        document.getElementById("txtObservacionesPaciente").disabled = true;
        document.getElementById("btnModificarP").disabled = true;
    } 

    //habilitar campos del formulario findPaciente
    $("#btnEditarP").click(function (event) {
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < 85; i++) {
            inputs[i].disabled = false;
        }
        document.getElementById("txtMotivoConsulta").disabled = false;
        document.getElementById("txtObservacionAnamnesis").disabled = false;
        document.getElementById("txtDescripProtesis").disabled = false;
        document.getElementById("txtObservacionesPaciente").disabled = false;
        document.getElementById("btnModificarP").disabled = false;
    });
    //----------------------------------------- 
    //deshabilitar campos del formulario findPaciente
    $("#btnCancelarPedit").click(function (event) {
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < 85; i++) {
            inputs[i].disabled = true;
        }
        document.getElementById("txtMotivoConsulta").disabled = true;
        document.getElementById("txtObservacionAnamnesis").disabled = true;
        document.getElementById("txtDescripProtesis").disabled = true;
        document.getElementById("txtObservacionesPaciente").disabled = true;
        document.getElementById("btnModificarP").disabled = true;
    });
    //-----------------------------------------
}

//enviar datos al modal de nueva historia clinica
$('#frmEditHistoria').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var fecha = button.data('fecha') // Extract info from data-* attributes
    var proc = button.data('proc')
    var fp = button.data('fp')
    var fo = button.data('fo')        

    document.getElementById("id_historia_clinica").value = id;
    document.getElementById("txtFechaHc").value = fecha;
    document.getElementById("txtProcedimientoHc").value = proc;
    document.getElementById("txtFirmaP").value = fp;
    document.getElementById("txtFirmaO").value = fo;        
}); 

function verificarIdentificacion(id) {
    if (id != "")
        mostrarDatos(id);
}

function mostrarDatos(id) {
    $.ajax({
        //url: 'http://elai.com.co/appClinicaDental/paciente/verificarExiste/' + id,
        url: 'http://localhost:8080/appClinicaDental/paciente/verificarExiste/' + id,
        type: 'POST',
        data: {buscar: id},
        success: function (result) {
            var res = eval(result);

            if (res == null) {
                document.getElementById("btnGuardar").disabled = false;
                $('#msgNewPacienteError').hide();
            }
            else {
                //alert(respuesta);                
                $('#msgNewPacienteError').show();
                $(".list-errors").html('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>' + '&nbsp;&nbsp;' + "Ya existe un Paciente con esta indentificación");

                window.scrollTo(500, 0);
                document.getElementById("btnGuardar").disabled = true;
            }
        }
    });
}

//validar archivos para ser subidos al servidor:
function probarformato(val) {
    var filehide = null;
    if (val == '1')
        filehide = document.getElementById("imgFirmaP");
    else if (val == '2')
        filehide = document.getElementById("imgFirmaO");
    else if (val == '3')
        filehide = document.getElementById("imgFirmaPedit");
    else if (val == '4')
        filehide = document.getElementById("imgFirmaOedit");


    if (filehide.value.length > 0) {
        var extencion = '';
        var aux;
        var ruta = filehide.value;
        var lim = filehide.value.length - 6;
        for (var i = filehide.value.length - 1; i > lim; i--) {
            aux = ruta.charAt(i);
            if (aux == '.') {
                i = 3;
            }
            else {
                if (i > lim) {
                    extencion = aux + extencion;
                }
            }
        }

        if (extencion == 'png' || extencion == 'PNG' || extencion == 'jpeg' || extencion == 'JPEG' || extencion == 'jpg' || extencion == 'JPG') {            
            var size = filehide.files[0].size;
            if (size > 1000000) {
                alert('El archivo excede el tamaña mínimo permitido, el cual es 1Mb');
                filehide.value = null;
            }
        }
        else {
            alert('Formato de archivo Invalido, solo se admite imagenes .jpg y .png');
            filehide.value = null;
        }
    }
}

$('#myModal').on('show.bs.modal', function (event) {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');

    var mousePressed = false;
    var lastX, lastY;
    document.getElementById('bt-save').onmouseup = sendToServer;
    document.getElementById('bt-clear').onmouseup = resetCanvas;
    
    resetCanvas();
    
    function resetCanvas() {
        // just repaint canvas white
        ctx.fillStyle = '#EEEEEE';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    
    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }   

    function draw(canvas, x, y) {
        ctx = canvas.getContext('2d');
        if (mousePressed) {
            ctx.beginPath();
            ctx.strokeStyle = document.getElementById('color').value;
            ctx.lineWidth = 1;
            ctx.lineJoin = 'round';
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(x, y);
            ctx.closePath();
            ctx.stroke();
        }
        lastX = x;
        lastY = y;
    }

    // canvas events
    canvas.onmousedown = function (e) {
        mousePressed = true;
    };

    canvas.onmousemove = function (e) {
        if (mousePressed == false) {
            lastX = x;
            lastY = y;
        }
    };

    canvas.onmouseup = function (e) {
        mousePressed = false;
    };

    canvas.onmouseleave = function (e) {
        mousePressed = false;
    };

    canvas.addEventListener('mousemove', function (evt) {
        var mousePos = getMousePos(canvas, evt);
        if (mousePressed == true) {
            draw(canvas, mousePos.x, mousePos.y)
        }
        else {
            lastX = mousePos.x;
            lastY = mousePos.y;
        }       

    }, false);
    
    function sendToServer() {    
        document.getElementById('x').value=canvas.toDataURL().split('base64,')[1];                
        document.getElementById('f1').submit();
    }

});



        