<?php

namespace App\Http\Controllers;

class SobreNosController extends Controller
{
    // Adicionando um middleware direramente ao construtor do Controller
    public function __construct() {
        $this->middleware('log.acesso');
    }

    public function sobrenos() {
        return view('site.sobre-nos');
    }
}
