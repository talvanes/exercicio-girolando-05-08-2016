<?php namespace MiniShop\Services\System;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \MiniShop\Repositories\System\LoginRepository;
use \Illuminate\Contracts\Auth\Guard;

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


}