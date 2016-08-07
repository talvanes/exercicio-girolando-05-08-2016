<?php

namespace MiniShop\Models;

use Illuminate\Database\Eloquent\Model;
use MiniShop\Models\Pessoa;

class Fatura extends Model
{
    protected $table = 'Faturas';
    protected $fillable = [
    	'idPessoa', 
    	'ipCLienteFatura', 
    	'valorFatura', 
    	'obsFatura',
    ];

    public static $snakeAttributes = false;

    /** [Cliente description] */
    public function Cliente() {
    	return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
}
