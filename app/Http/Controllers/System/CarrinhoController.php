<?php

namespace MiniShop\Http\Controllers\System;

use Illuminate\Http\Request;

use MiniShop\Http\Requests;
use MiniShop\Http\Controllers\Controller;

class CarrinhoController extends Controller
{
	/**
	 * Exibe uma lista de produtos contidos no carrinho.
	 * 
	 * @return [type] [description]
	 */
    public function index(){

    }

    /**
     * Grava uma fatura para o usuário, que é calculda por um processo chamado FaturaJob.php.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request){

    }

    /**
     * Atualiza o carrinho de compras.
     * 
     * @param  Request $request [description]
     * @param  integer  $id      Código do produto
     * @return [type]           [description]
     */
    public function update(Request $request, $id){

    }
}
