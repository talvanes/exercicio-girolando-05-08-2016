<?php

namespace MiniShop\Http\Middleware;

use \Illuminate\Http\Request;
use Closure;

class RedirectHomeOnlyGuests
{
    /**
     * Apenas usuários autenticados podem acessar a área restrita.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->user()) return redirect()->route('dashboard.index');

        return redirect()->route('home.index');
    }
}
