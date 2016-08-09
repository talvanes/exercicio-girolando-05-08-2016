<?php namespace MiniShop\Services\System;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \MiniShop\Repositories\System\LoginRepository;
use Guard;

/**
 * Service layer that will applies all application rules to work with MiniShopModelsPessoa class.
 *
 * Class LoginService
 * @package MiniShop\Services\System
 */
class LoginService extends ServiceAbstract{

    /**
     * This constructor will receive by dependency injection a instance of LoginRepository and DatabaseManager.
     *
     * @param LoginRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(LoginRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }

    /**
     * Serviço que faz autenticação de usuário
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    public function authenticate(array $data){
        $usuario = $this->findBy([
                'emailPessoa' => $data['emailPessoa']
            ])->first();
        // o usuário está inativo? não deixe autenticar!
        if ($usuario->statusPessoa){
            return redirect()->back()->with('error', 'Usuário inativo não pode autenticar!');
        }

        // tente autenticar o usuário
        if (\Auth::attempt([ 'emailPessoa' => $data['emailPessoa'], 'senhaPessoa' => $data['senhaPessoa'] ])){
            // deu certo? entre na dashboard (parte privada)
            return redirect()->route('dashboard.index');
        }
    }


}