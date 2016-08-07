<?php

namespace MiniShop\Models;

use Illuminate\Database\Eloquent\Model;
use MiniShop\Models\Categoria;

class Categoria extends Model
{
    protected $table = 'Categorias';
    protected $fillable = [ 'idCategoriaPai', 'nomeCategoria' ];

    public static $snakeAttributes = false;
    public $timestamps = false;

	/** [Pai description] */
    public function Pai() {
    	return $this->belongsTo(Categoria::class, 'idCategoriaPai');
    }
}
