<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'fornecedor_id', 'peso', 'unidade_id'];

    public function produtoDetalhe() {
        // definido que Produto tem um Detalhe
        /**
         * O Eloquent ORM deve procurar um registro relacionado
         * 1 produto_detalhes com base na FK produto_id e a referência é a PK id de produto
         */
        return $this->hasOne('App\ProdutoDetalhe');
    }
    
    public function fornecedor() {
        // A tabela que recebe a fk (foreign key) implementa o método belongsTo
        // Nesse caso Produto "pertence ao" Fornecedor 
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos');
    }
}
