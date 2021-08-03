<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // método statement() da classe DB permite executar uma instrução na base de dados
        /*
            A instrução realiza um update na tabela site_contatos atribuindo os valores da
            coluna motivo_contato para a nova coluna motivo_contatos_id
        */ 
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato'); 
    
        // Criação da foreign key e remover a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Criação a coluna motivo_contato e removendo a foreign key
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        /*
            A instrução realiza um update na tabela site_contatos atribuindo os valores da
            coluna coluna motivo_contatos_id para motivo_contato  
        */ 
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id'); 
    
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
