<canvas id="canvas" width="300" height="200"></canvas>
<div class="gui">
    <input type="color" id="color" value="#000000" hidden>
    <button id="bt-clear">Volver a firmar</button>
    <button id="bt-save">Aceptar</button>
</div> 

<script>
    var tiemposcambian = tiemposcambian || {};

    tiemposcambian.GuardandoPNGs = (function () {
        var mousePressed = false;
        var lastX, lastY;
        var ctx;

        function init() {
            // init canvas
            var canvas = document.getElementById('canvas');
            ctx = canvas.getContext('2d');
            resetCanvas();

            // button events
            document.getElementById('bt-save').onmouseup = sendToServer;
            document.getElementById('bt-clear').onmouseup = resetCanvas;

            // canvas events
            canvas.onmousedown = function (e) {
                draw(e.layerX, e.layerY);
                mousePressed = true;
            };

            canvas.onmousemove = function (e) {
                if (mousePressed) {
                    draw(e.layerX, e.layerY);
                }
            };

            canvas.onmouseup = function (e) {
                mousePressed = false;
            };

            canvas.onmouseleave = function (e) {
                mousePressed = false;
            };
        }

        function draw(x, y) {
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

        function sendToServer() {
            //var data = canvas.toDataURL('image/png');
            //var xhr = new XMLHttpRequest();
            //xhr.onreadystatechange = function() {
            // //request complete
            //if (xhr.readyState == 4) {
            //  window.open('http://localhost/firmar/snapshots/'+xhr.responseText,'_blank');
            // }
            //}
            //xhr.open('POST','http://localhost/firmar/snapshot.php',true);
            //xhr.setRequestHeader('Content-Type', 'application/upload');
            //xhr.send(data);
            document.getElementById('x').value = canvas.toDataURL().split('base64,')[1];
            document.getElementById('f1').submit();
        }

        function resetCanvas() {
            // just repaint canvas white
            ctx.fillStyle = '#EEEEEE';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        }

        return {
            'init': init
        };
    });


    window.onload = function () {
        new tiemposcambian.GuardandoPNGs().init();
    };

</script>