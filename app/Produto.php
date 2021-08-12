<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe() {
        // definido que Produto tem um Detalhe
        /**
         * O Eloquent ORM deve procurar um registro relacionado
         * 1 produto_detalhes com base na FK produto_id e a referência é a PK id de produto
         */
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
