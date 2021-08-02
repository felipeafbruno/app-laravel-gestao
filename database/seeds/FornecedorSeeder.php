<?php

use \App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // instanciando o Objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // utilizando método create(para utilizar o método precisa esta definida na classe a propriedade 'fillable')
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // insert 
        DB::table('fornecedores')->insert([
            'nome' =>'Fornecedor 300', 
            'email'=> 'fornecedor300.com.br', 
            'uf' => 'SP', 'email' => 
            'contato@fornecedor300.com.br'
        ]);
    }
}
