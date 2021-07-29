<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'name' => 'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '00.000.000/000-00',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1 => [
                'name' => 'Fornecedor 2', 
                'status' => 'S', 
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '1111-1111'
            ],
            2 => [
                'name' => 'Fornecedor 3', 
                'status' => 'S', 
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '2222-2222'
            ]
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
