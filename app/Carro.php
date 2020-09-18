<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    #Laravel identifica sozinho a tabela de acordo com o nome da classe
    #por isso n é necessario identifica-la novamente
    #protected $table =  'carros';

    public $timestamps = false;

    protected $fillable = ['nome'];
}
