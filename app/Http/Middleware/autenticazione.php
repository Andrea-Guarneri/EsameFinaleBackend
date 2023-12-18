<?php

namespace App\Http\Middleware;

use App\Http\Controllers\api\v1\AccediController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Contatto;

class Autenticazione
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('authorization')) {

            $header = $request->header('authorization');

            $token = trim(str_replace('Bearer', '', $header));

            $payload = AccediController::verificaToken($token);

            if ($payload != null) {
                $contatto = Contatto::where("idContatto", $payload->data->idContatto)->firstOrFail();
                if ($contatto->idStato == 1) {
                    Auth::login($contatto);

                    $request["contattiRuoli"] = $contatto->gruppi->pluck('nome')->toArray();

                    return $next($request);
                } else {
                    abort(403, 'TK_0002');
                }
            } else {
                abort(403, 'TK_0001');
            }
        } else {
            abort(403, 'TK_019');
        }
    }
}
