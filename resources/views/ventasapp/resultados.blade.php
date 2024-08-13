<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <style>
        .result-table {
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
            background-color: #d9534f;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Resultados de la Búsqueda</h2>
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
            <td>{{ $restaurante->Descripcion}}</td>
            @if($resultado->Fecha)
                <td>{{ $resultado->Fecha }}</td>
            @else
                <td></td>
            @endif
            <td>{{ $resultado->IdTransaccion }}</td>
            <td>{{ $resultado->Valor }}</td>
            <td>
                {{-- <a href="{{ route('ventasapp.confirmarEliminacion', $resultado->id) }}" class="btn-delete">Eliminar</a> --}}
                <button class="btn-delete" id="buttonDelete">Eliminar</button>
            </td>
            <input type="text" id='idTransaccion' value="{{$resultado->IdTransaccion}}" hidden>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $('#buttonDelete').click(function () {
        Swal.fire({
            title: "¿Estas seguro de eliminar el elemento?",
            text: "El elemento sera eliminado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar"
        }).then((result) => {
            let idTransaccion = $('#idTransaccion').val();
            let url = "{{ route('ventasapp.eliminar', ['id' => ':id']) }}".replace(':id', idTransaccion);
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data)
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Eliminado",
                            text: "El elemento fue eliminado",
                            icon: "success"
                        });
                    }
                }
            });
        });
    })
</script>
</html>
