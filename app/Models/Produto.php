<?php

namespace MiniShop\Models;

use Illuminate\Database\Eloquent\Model;
use MiniShop\Models\Categoria;

class Produto extends Model
{
    protected $table = 'Produtos';
    protected $fillable = [
    	'idCategoria', 
    	'fotoProduto', 
    	'nomeProduto', 
    	'precoProduto', 
    	'estoqueProduto', 
    	'destaqueProduto',
    ];

    public $snakeAttributes = false;

    /** [Categoria description] */
    public function Categoria() {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
