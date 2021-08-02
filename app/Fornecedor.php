<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    // Trait
    use SoftDeletes;

    // O atributo table determina o nome da tabela destino e vai sobrepor a nomeação automática do Eloquent
    protected $table = 'fornecedores';

    // Atributos fillable permite definer para o Eloquent qual é o nome das propriedades do objeto.
    // Eloquent é protegido contra Mass Assigment ou Atribuição em Massa(pt-br) por padrão
    // A tentiva de criar uma novo registro utilizando o métodos como create por exemplo pode causar esse "problema"
    // Para isso fillable determina quais atributos da model desejam ser feitos o Mass Assigment
    protected $fillable = ['nome', 'site', 'uf', 'email'];


}
