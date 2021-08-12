<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe() {
        // definido que Produto tem um Detalhe
        /**
         * O Eloquent ORM deve procurar um registro relacionado
         * 1 produto_detalhes com base na FK produto_id e a referência é a PK id de produto
         */
        // Nesse momento hasOne() com nome da model não padronizado 
        // é necessário passar a FK e a PK das respectivos relacionamentos
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
}
