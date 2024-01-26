<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $response = Http::get('https://petstore.swagger.io/v2/user/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $userData = Http::get('https://petstore.swagger.io/v2/user/' . $request->username);

            if ($userData->successful()) {
                // Jeśli uzyskano poprawne dane użytkownika
                $expiresAfter = $response->header('x-expires-after');
                $sessionId = $userData->json('id');

                if ($sessionId) {
                    $request->session()->put('user_session_token', $sessionId);
                    $request->session()->put('session_expires_at', new Carbon($expiresAfter));
                    $request->session()->put('user_name', $request->username);

                    Log::info('Session data CAP:', $request->session()->all());
                    $request->session()->regenerate();
                    return redirect('/');
                }
            }
        }

        return redirect('/login')->with('success', "Niepoprawne dane użytkownika");

    }


    public function destroy(Request $request): RedirectResponse
    {
        $sessionToken = $request->session()->get('user_session_token');
        Log::info('Session data BYK:', $request->session()->all());

        // Wysłanie żądania do API aby wylogować użytkownika
        Http::post('https://petstore.swagger.io/v2/user/logout', [
            'session_token' => $sessionToken,
        ]);

        // Usunięcie danych sesji

        $request->session()->forget('user_session_token');
        $request->session()->forget('session_expires_at');
        $request->session()->forget('user_name');
        Log::info('Session data FYK:', $request->session()->all());

        return redirect('/');
    }
    public function clearSession(Request $request): RedirectResponse
    {
        // Usunięcie danych sesji
        $request->session()->flush();
        Log::info('Session data BYK:', $request->session()->all());
        return redirect('/')->with('status', 'Sesja została wyczyszczona.');
    }

}
