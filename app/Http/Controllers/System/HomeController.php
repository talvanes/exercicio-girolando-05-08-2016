<?php

namespace MiniShop\Http\Controllers\System;

use Illuminate\Http\Request;

use MiniShop\Http\Requests;
use MiniShop\Http\Controllers\Controller;
use MiniShop\Http\Requests\System\LoginRequest;
use MiniShop\Services\System\LoginService;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * [$loginService description]
     * @var LoginService
     */
    protected $loginService;

    public function __construct(LoginService $ls){
        $this->loginService = $ls;
    }

	/** 
     * Exibe os produtos em destaque. Acessível a visitantes (usuários não logados).
     * 
     * @return [type] [description]
     */
    public function index() {

    }

    /** 
     * Autentica usuário para acesso à área restrita (/dashboard).
     * 
     * @return [type] [description]
     */
    public function store(LoginRequest $request){
        
    }

    /**
     * Desloga o usuário da sessão.
     * 
     * @param  integer $id Código do usuário
     * @return [type]     [description]
     */
    public function destroy($id) {

    }
    
}
