<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AndersonTest extends TestCase
{
    use DatabaseTransactions;

    protected $fieldLogin = 'emailPessoa';
    protected $fieldSenha = 'senhaPessoa';
    protected $botaoEntrar = 'Entrar';


    /**
     * Testa se o usuário logado está sendo impedido de ver a index e já é direcionado para a /dashboard
     *
     * @return void
     */
    public function testAcessandoIndexLogado()
    {
        $this->flushSession();
        $pessoa = factory(\MiniShop\Models\Pessoa::class)->create();
        $response = $this->actingAs($pessoa)->visit('/')->seePageIs('/dashboard');
        #echo print_r($response->response->getContent());
    }

    /**
     * Testa se o formulário de login está funcionando corretamente tanto pro usuário ativo quanto pro inativo.
     */
    public function testLogando()
    {
        $this->flushSession();
        $pessoaAtiva = factory(\MiniShop\Models\Pessoa::class)->create(['senhaPessoa' => 'cachorro', 'statusPessoa' => 1]);
        $pessoaInativa = factory(\MiniShop\Models\Pessoa::class)->create(['senhaPessoa' => 'cachorro', 'statusPessoa' => 0]);

        $this->visit('/')
            ->type($pessoaAtiva->loginPessoa, $this->fieldLogin)
            ->type('cachorro', $this->fieldSenha)
            ->press($this->botaoEntrar)
            ->seePageIs('/dashboard');

        $this->visit('/')
            ->type($pessoaInativa->loginPessoa, $this->fieldLogin)
            ->type('cachorro', $this->fieldSenha)
            ->press($this->botaoEntrar)
            ->seePageIs('/');
    }

    /**
     * Testa se a dashboard do usuário realmente está protegida
     */
    public function testDashboardProtegida()
    {
        $this->flushSession();
        $this->visit('/dashboard')->seePageIs('/');
    }


    /**
     * Testa se a página inicial está de acordo com o que foi solicitado no enunciado (apenas produtos em destaque dos mais novos pros mais antigos)
     */
    public function testPaginaPrincipal()
    {
        $this->flushSession();
        $produtos = factory(\MiniShop\Models\Produto::class, 9)->create(['destaqueProduto' => 1]);
        $outrosProdutos = factory(\MiniShop\Models\Produto::class, 10)->create(['destaqueProduto' => 0]);
        $this->visit('/');
        foreach($produtos as $produto){
            $this->see($produto->nomeProduto);
        }
        foreach($outrosProdutos as $oproduto){
            $this->dontSee($oproduto->nomeProduto);
        }
    }


    public function testAdicionandoCarrinho()
    {
        $this->flushSession();
        $produto = factory(\MiniShop\Models\Produto::class)->create();
        $this->put('/carrinho/'.$produto->id);
        $this->seePageIs('/');
        $this->assertSessionHas('carrinho');
    }

    public function testJobDisparadoCarrinho()
    {
        $this->flushSession();
        $produto = factory(\MiniShop\Models\Produto::class)->create(['precoProduto' => 60]);
        $this->put('/carrinho/'.$produto->id);

        $this->expectsJobs(\MiniShop\Jobs\FaturaJob::class);
        $this->post('/carrinho');
    }

    public function testCarrinhoMaiorQue100()
    {
        $this->flushSession();
        $produto = factory(\MiniShop\Models\Produto::class)->create(['precoProduto' => 60]);
        $this->put('/carrinho/'.$produto->id);
        $this->put('/carrinho/'.$produto->id);

        $this->setExpectedException(\MiniShop\Exceptions\CarrinhoException::class);
        $this->post('/carrinho');
    }

}
