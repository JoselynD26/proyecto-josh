<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integrado De Restaurantes - Eliminación de Cobros App</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            flex-direction: column;
        }
        .container {
            width: 900px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .left {
            display: flex;
            align-items: center;
        }
        .header .right {
            display: flex;
            align-items: center;
        }
        .header img {
            height: 60px;
        }
        .separator {
            border-top: 20px solid #c22424;
            position: relative;
            margin-bottom: -10px;
        }
        .form-container {
            display: flex;
            align-items: stretch;
            gap: 20px;
        }
        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 210px;
            flex-shrink: 0;
            margin-top: -10px;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
        .form-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .title-box {
            margin-bottom: 20px;
            text-align: center;
        }
        .title-box h2 {
            color: #000000;
            margin: 0;
        }
        .form-group {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-group label {
            flex: 0 0 150px;
            margin-right: 10px;
            color: #000;
        }
        .form-group input,
        .form-group select {
            flex: 1;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group.inline {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-group.inline label {
            flex: none;
            margin-right: 0;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .buttons button {
            padding: 7px 20px;
            margin: 0;
            border: 3px solid #d12727;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: rgb(249, 249, 249);
            color: rgb(69, 62, 62);
            transition: background-color 0.3s, border-color 0.3s;
        }
        .buscar {
            background-color: rgb(222, 39, 39);
            border-color: #d32f2f;
            color: black;
        }
        .eliminar {
            background-color: red;
            border-color: red;
            color: white;
        }
        .info {
            margin: 20px 0;
            padding: 10px;
            border: 2px solid orange;
            text-align: center;
            background-color: #fff3e0;
            border-radius: 5px;
        }
        .footer-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            margin-top: 10px;
            position: absolute;
            bottom: -25px;
            left: 0;
        }
        .footer-text {
            color: #7d7d7d;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="left">
                <img src="img/sir.png" alt="KFC Logo">
            </div>
            <div class="right">
                <img src="img/grupokfc.png" alt="SIR Logo">
            </div>
        </div>
        <div class="separator"></div>
        <div class="form-container">
            <div class="image-container">
                <img src="img/kfc.png" alt="Logo">
            </div>
            <div class="form-content">
                <div class="title-box">
                    <h2>ELIMINACIÓN DE COBROS APP</h2>
                </div>
                <form id="transactionForm" action="{{ route('ventasapp.buscar') }}" method="POST">
                    @csrf
                    <div class="form-group inline">
                        <label for="cadena">Cadena</label>
                        <select id="cadena" name="cadena" required>
                            <option value="">Seleccione una cadena</option>
                            @foreach($cadenas as $cadena)
                                <option value="{{ $cadena->Cod_Cadena }}">{{ $cadena->Descripcion }}</option>
                            @endforeach
                        </select>
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" >
                    </div>
                    <div class="form-group">
                        <label for="restaurante">Tienda</label>
                        <select id="restaurante" name="restaurante" required>
                            <option value="">Seleccione una tienda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codigoApp">Código App</label>
                        <input type="text" id="codigoApp" name="codigoApp" placeholder="Ejemplo: ABCDE123456789012345" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" >
                    </div>
                    <div class="info">
                        Información de la transacción
                        @if(session('info'))
                            {{ session('info') }}
                        @endif
                    </div>
                    <div class="buttons">
                        <button type="submit" class="buscar">Buscar</button>
                        <button type="button" class="eliminar" onclick="confirmarEliminacion()">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-container">
        <div class="footer-text">Desarrollado desde el 2009 - 2024 - Ecuador</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cadena').change(function() {
                var Cod_Cadena = $(this).val();
                if (Cod_Cadena) {
                    $.ajax({
                        url: "{{ route('restaurantes.cadena') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: { Cod_Cadena : Cod_Cadena },
                        success: function(data) {
                            console.log(data);
                            $('#restaurante').empty();
                            $('#restaurante').append('<option value="">Seleccione una tienda</option>');
                            $.each(data, function(key, value) {
                                $('#restaurante').append('<option value="' + value.Cod_Restaurante + '">' + value.Cod_Tienda + '</option>');
                            });
                        }
                    });
                } else {
                    $('#restaurante').empty();
                    $('#restaurante').append('<option value="">Seleccione una cadena primero</option>');
                }
            });
        });

        function confirmarEliminacion() {
            if (confirm('¿Estás seguro de que quieres eliminar esta transacción?')) {
                // Implementar la lógica para eliminar la transacción
                // Puedes redirigir a la ruta de eliminación si ya está implementada
            }
        }
    </script>
</body>
</html>
