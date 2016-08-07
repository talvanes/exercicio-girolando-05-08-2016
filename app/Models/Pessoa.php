<?php

namespace MiniShop\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Auth\User
{
    protected $table = 'Pessoas';
    protected $fillable = [
    	'nomePessoa', 
    	'emailPessoa', 
    	'senhaPessoa', 
    	'statusPessoa',
    ];

    public static $snakeAttributes = false;
}
