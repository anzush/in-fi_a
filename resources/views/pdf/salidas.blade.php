<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /*Tabla*/
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            background: #495057;
        }

        tr td .a {
            vertical-align: top;
            color: white;
        }

        a {
            color: white;
        }

        .tabla {
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            margin-top: 1em;
        }

        .form {
            display: flex;
            min-width: 20%;
            margin: 0%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        table {
            margin: auto;
            background-color: #03030360;
            text-align: center;
            border-collapse: collapse;
            min-width: 80%;
            max-width: 870px;
            margin-top: 3vh;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 20px;
            color: white;
        }

        thead {
            background: #3d7575;
            border-bottom: solid 5px #278787;
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.308);
        }

        tr:hover {
            background-color: #3d75756e;
        }

        td:hover {
            background: #2a50506c;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70px;
        }

        .space {
            background: #278787;
            padding: 20px;
            color: #ced4da;
            display: flex;
            width: 100%;
            text-align: end;
        }
    </style>
    <title>Salidas</title>
</head>

<body>
    <div class="space">
        <img src="img/Logo letra blanca.png" height="70vw" alt="">
        <h2>Salidas Registradas</h2>
    </div>

    <div class="logo">

    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código registro</th>
                <th>Tipo registro</th>
                <th>Código artículo</th>
                <th>Descripción artículo</th>
                <th>Casual de entrada</th>
                <th>Número de factura</th>
                <th>Cantidad</th>
                <th>Fecha Ingreso</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($salidas as $salida)
            <tr>
                <td data-label="codigoE">{{$salida->cod_registro}}</td>
                <td data-label="tipo">{{$salida->tipo}}</td>
                <td data-label="codigoA">{{$salida->cod_articulo}}</td>
                <td data-label="descripcionA">{{$salida->descripcion_articulo}}</td>
                <td data-label="causal">{{$salida->causal}}</td>
                <td data-label="numeroF">{{$salida->num_factura}}</td>
                <td data-label="cantidad">{{$salida->cantidad}}</td>
                <td data-label="fecha">{{$salida->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
