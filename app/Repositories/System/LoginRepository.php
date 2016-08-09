<?php namespace MiniShop\Repositories\System;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \MiniShop\Models\Pessoa;

/**
 * Data repository to work with entity MiniShopModelsPessoa.
 *
 * Class LoginRepository
 * @package MiniShop\Repositories\System
 */
class LoginRepository extends RepositoryAbstract{


    public function entity()
    {
        return \MiniShop\Models\Pessoa::class;
    }

}