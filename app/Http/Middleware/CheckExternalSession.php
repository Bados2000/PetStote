<?php

// app/Http/Middleware/CheckSessionExpiration.php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;

class CheckExternalSession
{
    public function handle($request, Closure $next)
    {
        $expiresAt = $request->session()->get('session_expires_at');

        if ($expiresAt instanceof Carbon && now()->greaterThan($expiresAt)) {
            auth()->logout();
            // Opcjonalnie dodaj komunikat flash
            session()->flash('message', 'Twoja sesja wygasła, zaloguj się ponownie.');
            return redirect('/login');
        }

        return $next($request);
    }
}
