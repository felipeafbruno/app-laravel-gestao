<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou Senha não existe';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário fazer login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedsback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário(email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        // recuperamos os dados do login
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';

        // iniciar o model User
        $user = new User();

        $usuario = $user
                    ->where('email', '=', $email)
                    ->where('password', '=', $password)
                    ->get()
                    ->first();
        // echo '<pre>';
        // print_r($existe);
        // echo '</pre>';

        if(isset($usuario->name)) {
            // echo 'Usuário existe!!!';
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($_SESSION);

            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
