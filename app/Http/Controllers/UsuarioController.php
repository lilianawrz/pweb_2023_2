<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class UsuarioController extends Controller
{
    function index()
    {


        //  $nome = ["Liliana", "Gabriel", "Riboli"];

        //  $idade = [
        //      14, 16, 19,74, 10];

        $pessoa = new stdClass();
        $pessoa->nome = "Lili";
        $pessoa->idade = 19;

        $pessoas = [$pessoa];

        return view('index', ["pessoas" => $pessoas]);

    }
}