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
        return $this->loginService->login();
    }

    /** 
     * Autentica usuário para acesso à área restrita (/dashboard).
     * 
     * @return [type] [description]
     */
    public function store(LoginRequest $request){
        $credentials = $request->only(['emailPessoa', 'senhaPessoa']);
        return $this->loginService->authenticate($credentials);
    }

    /**
     * Desloga o usuário da sessão.
     * 
     * @return [type]     [description]
     */
    public function destroy() {
        return $this->loginService->logout();
    }

}
