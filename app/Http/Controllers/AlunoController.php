<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaAluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $alunos = Aluno::all();

        return view('aluno.list')->with(['alunos' => $alunos]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $categorias = CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form')->with(['categorias' => $categorias]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'required|max:14'
        ], [
            ' nome.required' => "O :attribute é obrigatório",
            ' nome.max' => "Só é permitido 100 caracteres no :attribute! ",
            ' cpf.required' => "O :attribute é obrigatório",
            ' cpf.max' => "Só é permitido 11 caracteres no :attribute! ",
        ]);

        $dados = [
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'categoria_aluno_id' => $request->categoria_aluno_id,

        ];

        $imagem = $request->file('imagem');
        //verifica se existe imagem no formulário
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/aluno/";
            //salva a imagem em uma pasta do sistema.
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Aluno::create($dados);

        return redirect('aluno')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form')->with(['aluno' => $aluno, 'categorias' => $categorias]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, Aluno $aluno)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'required|max:14'
        ], [
            ' nome.required' => "O :attribute é obrigatório",
            ' nome.max' => "Só é permitido 100 caracteres no :attribute! ",
            ' cpf.required' => "O :attribute é obrigatório",
            ' cpf.max' => "Só é permitido 11 caracteres no :attribute! ",
        ]);
        $dados = [
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'categoria_aluno_id' => $request->categoria_aluno_id,
            'imagem' => $request->imagem,
        ];

        $imagem = $request->file('imagem');
        //verifica se existe imagem no formulário
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/aluno/";
            //salva a imagem em uma pasta do sistema.
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

        Aluno::updateOrCreate(['id' => $request->id], $dados);

        return redirect('aluno')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();
        return redirect('aluno')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->valor)) {

            $alunos = Aluno::where($request->tipo, 'like', "%" . $request->valor . "%")->get();
        } else {
            $alunos = Aluno::all();
        }
        return view('aluno.list')->with(['alunos' => $alunos]);

    }
}
