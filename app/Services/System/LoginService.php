<?php namespace MiniShop\Services\System;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \MiniShop\Repositories\System\LoginRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Service layer that will applies all application rules to work with MiniShopModelsPessoa class.
 *
 * Class LoginService
 * @package MiniShop\Services\System
 */
class LoginService extends ServiceAbstract{

    /** @var Guard [description] */
    protected $guard;

    /**
     * This constructor will receive by dependency injection a instance of LoginRepository and DatabaseManager.
     *
     * @param LoginRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(LoginRepository $repository, DatabaseManager $db, Guard $guard)
    {
        parent::__construct($repository, $db);
        $this->guard = $guard;
    }

    /**
     * Este método confere se o usuário está logado de modo que este possa acessar automaticamente a área restrita (/dashboard), do contrário, verá apenas a página inicial.
     * @return [type] [description]
     */
    public function login() {
        // o usuário está logado (não é visitante)?
        if (\Auth::guest())
            return redirect()->route('dashboard.index');
        // convidado somente pode ver a tela inicial
        return view('content.home.index.index');
    }

    /**
     * Este método verifica as credenciais de usuário antes de autenticá-lo para a área restrita (/dashboard).
     * @param  array  $data Credenciais de usuário (apenas email e senha)
     * @return [type]       [description]
     */
    public function authenticate(array $data) {
        // TODO: verifique se o usuário está inativo
        
        // credenciando-o
        if (\Auth::attempt($data)) {
            return redirect()->route('dashboard.index');
        }
        // em caso de erro
        return redirect()->back()->withErrors(['error' => 'E-mail e senha não conferem!']);
    }

    /**
     * Este método retira o usuário da sessão, redirecionando-o de volta à página inicial.
     * @return [type] [description]
     */
    public function logout () {
        \Auth::logout();
        return redirect()->route('home.index')->with(['success' => 'Usuário saiu da sessão com sucesso!']);
    }


}