<!DOCTYPE html>
<html lang="pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <!-- Styles BootStrap -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}

    <!-- Scripts Jquery e Bootstrap -->
    {{-- <script src="{{ asset('js/jquery.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.js') }}" defer></script> --}}
</head>

<style>
    .title {
        background-color: grey;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        color: white;
        padding: 4px;
        border-radius: 5px;
        margin-bottom: 4px;
    }

    table {
        width: 90%;
        margin: 0 auto;
    }

    table th {
        text-align: left;
    }

</style>

<body>
    <div class="title">Lista de Tarefas</div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Data Limite Conclusão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->tarefa }}</td>
                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>

</html>
