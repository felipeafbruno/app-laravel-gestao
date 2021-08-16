<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        // withPivot() indica quais colunas da tabela relacionamento é desejado recuperar 
        return $this->belongsToMany('App\Produto', 'pedidos_produtos')->withPivot('id', 'created_at', 'updated_at');
    }
}
