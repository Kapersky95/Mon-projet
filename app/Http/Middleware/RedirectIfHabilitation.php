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

       // Vérifie si l'utilisateur est connecté et s'il a une fonction attribuée
       if (auth()->check() && auth()->user()->fonctions->isNotEmpty()) {
        $fonction = auth()->user()->fonctions->first();

            // Vérifie si l'habilitation est valide
            if ($fonction->pivot->date_debut < now() && $fonction->pivot->date_fin > now()) {
                return $next($request);
            } else {
                // Si l'habilitation de l'utilisateur a expiré
                auth()->logout();
                return redirect()->route('login')->with('toast_warning', "Votre habilitation a expiré. Veuillez vous reconnecter après avoir contacté l'administrateur pour renouveler votre habilitation.");
            }
        }

        // Si l'utilisateur n'a pas d'habilitation
        auth()->logout();
        return redirect()->route('login')->with('toast_warning', "Vous n'avez pas d'habilitation. Veuillez contacter l'administrateur pour obtenir une habilitation avant de vous connecter.");
    }
}
