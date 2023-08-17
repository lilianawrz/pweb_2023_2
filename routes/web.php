<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;

//chamar uma função do controlador
Route::get('/usuario', [UsuarioController::class, 'index']);

//rota aluno
Route::get(
    '/aluno',
    [AlunoController::class, 'index']
)->name('aluno.index');

Route::get(
    '/aluno/create',
    [AlunoController::class, 'create']
)->name('aluno.create');

Route::post(
    '/aluno',
    [AlunoController::class, 'store']
)->name('aluno.store');

Route::get(
    '/aluno/edit/{id}',
    [AlunoController::class, 'edit']
)->name('aluno.edit');

Route::put(
    '/aluno/update/{id}',
    [AlunoController::class, 'update']
)->name('aluno.update');

Route::get(
    '/aluno/destroy/{id}',
    [AlunoController::class, 'destroy']
)->name('aluno.destroy');


Route::post(
    '/aluno/search',
    [AlunoController::class, 'search']
)->name('aluno.search');