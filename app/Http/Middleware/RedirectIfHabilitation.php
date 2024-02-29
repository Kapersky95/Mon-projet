<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfHabilitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        $fonction = auth()->user()->fonctions->first();

        if ($fonction->pivot->date_debut < now() && $fonction->pivot->date_fin > now()) {
            return $next($request);
        }

        return redirect()->route('auth.login')->with('toast_warning', "Habilitation expiré. Veuillez contactez l\'administrateur");
    }
}
