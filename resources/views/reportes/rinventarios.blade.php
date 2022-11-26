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
            margin-bottom: 20px;
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
            height: 40px;
        }

        header {
        width: 100%;
        background: #278787;
        padding: 1rem;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        }

        li {
        list-style-type: none;
        color: #fff;
        }

        button {
        hyphens: auto;
        background-color: transparent;
        color: inherit;
        display: block;
        margin: 0;
        padding: 0;
        border: 0;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        vertical-align: baseline;
        }

        p {
            color: #278787;
        }
        footer {
            background: #278787;
        }

    </style>
    <title>Inventarios</title>
</head>

<body>
    <header>
        <button class="logo">
            <a><img height="70vw" src="img/Logo letra blanca.png" alt="logo"></a>
        </button>
        <h1 style="color:#ffffffff">Reporte Inventarios</h1>
        <nav class="nav">
            <ul class="lista">
                <p class="numero">{{$date = date_default_timezone_set("America/Bogota") }}</p>
                <li>Fecha: {{$date = date("Y-m-d") }}</li>
                <li>Hora: {{$date = date("H:i:s") }} </li
                
            </ul>
        </nav>
    </header>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N°</th>
                <th>Codigo articulo</th>
                <th>Categoria articulo</th>
                <th>Descripcion articulo</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($inventarios as $inventario)
            <tr>
                <td data-label="N°">

                </td>
                <td data-label="codA">
                    {{$inventario->cod_articulo}}
                </td>
                <td data-label="tipo">
                    {{$inventario->tipo_articulo}}
                </td>
                <td data-label="descripcionA">
                    {{$inventario->descripcion_articulo}}
                </td>
                <td data-label="existencias">
                    {{$inventario->existencias}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Total artículos según selección</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <tr>
                <td data-label="totalUsuarios">20</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Total unidades de artículos según selección</th>
            </tr>
        </thead>
        <tbody id="myTable">
            <tr>
                <td data-label="totalUsuarios">20</td>
            </tr>
        </tbody>
    </table>
    
</body>

</html>