<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        // Classe Request guarda todo os dados de uma requisição
        // É pelo objeto $request onde iremos recuperar os valores enviados pelo usuário no ClientSide
        
        // $contato = new SiteContato();

        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes());
        
        // $contato->save();

        // $contato = new SiteContato();
        // // Pode ser utilizado também os método fill() ou create() para criar o registro
        // $contato->fill($request->all());
        // print_r($contato->getAttributes());

        // $contato->save();

        $motivos_contato = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivos_contato' => $motivos_contato]);
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // min -> 3 caractéres e max -> 40 caractéres, unique: site_contatos(tabela)
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|min:100|max:2000'
        ];

        $feedback = [
            // mensagens customizadas de acordo com a validação
            'nome.min' => 'O campo nome precisa deve ter no mínimo 3 caractéres',
            'nome.max' => 'O campo nome precisa deve ter no máximo 40 caractéres',
            'nome.unique' => 'O nome informado já está em uso',
            'required' => 'O campo :attribute deve ser preenchido', // :attribute recupera o nome do campo
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caractéres'

        ];
        
        // realizar validação dos dados do formulário recuperados da requisição
        /* 
            método validate() recebe um array associativo chave/valor 
            chave -> Dado que passará por validação  
            valor -> Tipos de validação 
        */
        // Quando uma validação não é atendida o próprio Laravel faz um redirect para a rota acessada anteriormente
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
