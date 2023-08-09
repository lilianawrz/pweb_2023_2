<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de aluno</title>
</head>

<body>
    <h3>Cadastro de aluno</h3>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('aluno.store') }}" method="POST">
        @csrf <!-- cria um hash de segurança-->
        <label for="">Nome</label>
        <input type="text" name="nome"><br><br>
        <label for="">Data de nascimento</label>
        <input type="date" name="data_nascimento"><br><br>
        <label for="">Cpf</label>
        <input type="text" name="cpf"><br><br>
        <label for="">E-mail</label>
        <input type="text" name="email"><br><br>
        <label for="">Telefone</label>
        <input type="text" name="telefone"><br><br>
        <button type="submit">Salvar</button>
        <a href="{{ route('aluno.index') }}">Voltar</a>
    </form>
</body>

</html>
