<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <style>
        .result-table {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .result-table th, .result-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .result-table th {
            background-color: #f2f2f2;
        }
        .btn-delete {
            background-color: #ca312b;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-back {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #24c22cc2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
        }
        .title {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            margin-top: 60px;
        }
    </style>
</head>
<body>

<a href="{{ route('ventasapp.index') }}" class="btn-back">Regresar</a>


<h2 class="title">Resultados de la Búsqueda</h2>

@if($resultados->isNotEmpty())
    <table class="result-table">
        <thead>
        <tr>
            <th>Cadena</th>
            <th>Restaurante</th>
            <th>Fecha Transaccion</th>
            <th>Codigo Transaccion</th>
            <th>Valor</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resultados as $resultado)
            <tr>
                <td>{{ $cadena->Descripcion }}</td>
                <td>{{ $restaurante->Cod_Tienda}}</td>
                @if($resultado->Fecha)
                    <td>{{ $resultado->Fecha }}</td>
                @else
                    <td></td>
                @endif
                <td>{{ $resultado->IdTransaccion }}</td>
                <td>{{ $resultado->Valor }}</td>
                <td>
                    <button class="btn-delete" id="buttonDelete">Eliminar</button>
                </td>
                <input type="text" id='idTransaccion' value="{{$resultado->IdTransaccion}}" hidden>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        @if($resultados->isEmpty())
            Swal.fire({
                title: "No se encontraron datos",
                text: "No hay resultados para la búsqueda.",
                icon: "info",
                confirmButtonText: "Aceptar"
            }).then(() => {
                window.location.href = "{{ route('ventasapp.index') }}";
            });
        @endif
    });

    $(document).on('click', '#buttonDelete', function () {
        Swal.fire({
            title: "¿Estás seguro de eliminar el elemento?",
            text: "El elemento será eliminado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            if (result.isConfirmed) {
                let idTransaccion = $('#idTransaccion').val();
                let url = "{{ route('ventasapp.eliminar', ['id' => ':id']) }}".replace(':id', idTransaccion);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            title: "Eliminado",
                            text: "El elemento fue eliminado",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('ventasapp.index') }}";
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un problema al eliminar el elemento",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>
</body>
</html>
