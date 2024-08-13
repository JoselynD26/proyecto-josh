<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <style>
        .confirmation-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 50px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px #ddd;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            text-align: center;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #d9534f;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
</head>
<body>
    <div class="confirmation-box">
        <h2>Confirmar Eliminación</h2>
        <p>¿Está seguro que desea eliminar la transacción con ID {{ $transaccion->id }}?</p>
        <form action="{{ route('ventasapp.eliminar', $transaccion->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('ventasapp.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>