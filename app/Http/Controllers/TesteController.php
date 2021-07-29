<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste($p1, $p2) {
        // echo "A soma de $p1 + $p2 é: ".($p1 + $p2);

        // Passagem de parâmetros da Controller para a View
        /**
         * Existem 3 maneiras possíveis de fazer:
         *  - Array Associativo -> Exemplo ['p1' => $p1, 'p2' => $p2]
         *  - compact() -> Exemplo compact('p1', 'p2') 
         *      obs: método compact() passamos strings com o nome das variáveis recebidas na action
         *  - with() -> with(['p1' => $p1, 'p2' => $p2])
         *      obs: with() é um método da classe View onde podemos passar tanto um array associativo ou 
         *           passar with('p1',$p1)->with('p2',$p2)...
         */
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2]));

        // return view('site.teste', compact('p1', 'p2'));
    
        return view('site.teste', )->with(['p1' => $p1, 'p2' => $p2]);
    }
}
