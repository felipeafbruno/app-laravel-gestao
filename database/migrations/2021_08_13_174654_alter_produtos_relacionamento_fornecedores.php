<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a coluna em produto que vai receber a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            // inserindo um registro na tabela fornecedor para estabelecer o relacionamento
            // o registro sendo criado serve para não causar um erro nas tabelas 
            // pegando o id do registro e passando como padrão para a coluna fornecedor registro da tabela produtos
            // tudo isso pelo motivo de que já existem registros na tabela produtos
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadraosg.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
