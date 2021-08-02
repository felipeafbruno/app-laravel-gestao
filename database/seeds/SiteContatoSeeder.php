<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(11) 99999-8888';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Sejá bem-vindo ao sistema Super Gestão';
        // $contato->save();

        // o método factory recebe o nome da classe e a quantidade de registro que deve ser criado um novo registro
        factory(SiteContato::class, 100)->create();

    }
}
