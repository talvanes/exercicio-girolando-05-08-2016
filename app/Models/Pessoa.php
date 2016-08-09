<?php

namespace MiniShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pessoa extends Authenticatable
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
