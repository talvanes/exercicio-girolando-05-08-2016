<?php

namespace MiniShop\Http\Controllers\System;

use Illuminate\Http\Request;

use MiniShop\Http\Requests;
use MiniShop\Http\Controllers\Controller;

class HomeController extends Controller
{
	/** 
	 * Exibe os produtos em destaque. Acessível a visitantes (usuários não logados).
	 * 
	 * @return [type] [description]
	 */
    public function index() {
        return view('content.home.index.index');
    }

    /** 
     * Autentica usuário para acesso à área restrita (/dashboard).
     * 
     * @return [type] [description]
     */
    public function store(){

    }
}
