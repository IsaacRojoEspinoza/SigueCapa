<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;/* Color de fondo que desees */
        }
        .full-height {
            height: 100%;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100%;
        }
        #moonshine-login {
            width: 100%;
            height: 100%;
            display: none;
            overflow: hidden; 
            background-color: #4A255C;/* Para evitar barras de desplazamiento */
        }
        /* Estilos adicionales que desees aplicar */
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cargar contenido del Moonshine Admin Panel al div #moonshine-login
            $('#moonshine-login').load('{{ route('moonshine.login') }}', function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Error al cargar el contenido: ";
                    $("#moonshine-login").html(msg + xhr.status + " " + xhr.statusText);
                } else {
                    $(this).fadeIn(); // Mostrar el contenido una vez cargado
                }
            });
        });
    </script>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div id="moonshine-login"></div>
    </div>
</body>
</html>
