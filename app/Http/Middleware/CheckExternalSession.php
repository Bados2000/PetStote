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
            // Tutaj możesz dodać własną logikę wylogowywania lub inny sposób obsługi wygaśnięcia sesji.
            // Na przykład, możesz usunąć dane sesji i przekierować użytkownika na stronę logowania.
            $request->session()->forget('user_session_token');
            $request->session()->forget('session_expires_at');
            $request->session()->forget('user_name');

            // Opcjonalnie dodaj komunikat flash
            session()->flash('message', 'Twoja sesja wygasła, zaloguj się ponownie.');
            return redirect('/login');
        }

        return $next($request);
    }
}
