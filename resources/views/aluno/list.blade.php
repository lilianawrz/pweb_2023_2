<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Listagem de alunos</h3>
    <a href="{{ route('aluno.create') }}">Cadastrar</a>
    <table class="table">
        <tr>
            <th scope="">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
        </tr>
        @foreach ($alunos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->data_nascimento }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->cpf }}</td>
                <td>{{ $item->telefone }}</td>
            </tr>
        @endforeach
</body>

</html>
