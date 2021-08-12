<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item() {
        // Nesse momento belongTo() com nome da model não padronizado 
        // é necessário passar a PK e a FK das respectivos relacionamentos 
        return $this->belongsTo('App\Item', 'produto_id','id');
    }
}
