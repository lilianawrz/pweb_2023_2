@extends('base.app')
@section('titulo', 'Listagem de alunos')
@section('content')
    <h3>Listagem de alunos</h3>
    <form action="{{ route('aluno.search') }}" method="POST">
        @csrf
        <select name="tipo" id="">
            <option value="nome">Nome</option>
            <option value="data_nascimento">Data de Nascimento</option>
            <option value="email">E-mail</option>
            <option value="cpf">CPF</option>
            <option value="telefone">Telefone</option>

        </select><br>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
        <a href="{{ route('aluno.create') }}">Cadastrar</a>
    </form>
    <table class="table table-hover">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
        </tr>
        @foreach ($alunos as $item)
            @php
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
            @endphp
            <tr>
                <td><img src="/storage/{{ $nome_imagem }}" width="100px" alt="imagem"></td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->data_nascimento }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->cpf }}</td>
                <td>{{ $item->telefone }}</td>
                <td>{{ $item->categoria->nome ?? '' }}</td>
                <td><a href="{{ route('aluno.edit', $item->id) }}">Editar</a></td>
                <td><a href="{{ route('aluno.destroy', $item->id) }}"
                        onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
        @endforeach
    @endsection
