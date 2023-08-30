@extends('base.app')
@section('titulo', 'Formulário de alunos')
@section('content')
    <h3>Cadastro de aluno</h3>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @php
        //  dd($aluno); //var_dump()
        if (!empty($aluno->id)) {
            $route = route('aluno.update', $aluno->id);
        } else {
            $route = route('aluno.store');
        }
    @endphp
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Perfil</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Essas informações serão exibidas publicamente, portanto, tome
                    cuidado com o que você compartilha.</p>
                @csrf <!-- cria um hash de segurança-->
                @if (!empty($aluno->id))
                    @method('PUT')
                @endif
                <input type="hidden"name="id"
                    value="@if (!empty($aluno->id)) {{ $aluno->id }}@elseif(!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">
                <label for="">Nome</label>
                <input type="text"
                    name="nome"value="@if (!empty($aluno->nome)) {{ $aluno->nome }}@elseif(!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br><br>
                <label for="">Data de nascimento</label>
                <input type="date" name="data_nascimento"
                    value="
        @if (!empty($aluno->data_nascimento)) {{ $aluno->data_nascimento }}@elseif(!empty(old('data_nascimento'))){{ old('data_nascimento') }}@else{{ '' }} @endif"><br><br>
                <label for="">Cpf</label>
                <input type="text" name="cpf"
                    value="@if (!empty($aluno->cpf)) {{ $aluno->cpf }}@elseif(!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br><br>
                <label for="">E-mail</label>
                <input type="text"
                    name="email"value="@if (!empty($aluno->email)) {{ $aluno->email }}@elseif(!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif"><br><br>
                <label for="">Telefone</label>
                <input type="text" name="telefone"
                    value="@if (!empty($aluno->telefone)) {{ $aluno->telefone }}@elseif(!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br><br>
                <label for="">Categoria</label>
                <select name="categoria_aluno_id" id="">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select><br>
                @php
                    $nome_imagem = !empty($aluno->imagem) ? $aluno->imagem : 'sem_imagem.jpg';
                @endphp
                <div>
                    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem">
                    <br>
                    <br>
                    <input type="file" name="imagem"><br>
                </div>
                <button type="submit">Salvar</button>
                <a href="{{ route('aluno.index') }}">Voltar</a>
    </form>
@endsection
