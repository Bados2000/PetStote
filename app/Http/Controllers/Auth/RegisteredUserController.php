<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:255',
        ]);
        $id = round(microtime(true) * 1000) . rand(100, 999);
        $id = substr($id, 0, 18); // Ogranicz długość do 64-bitów

        $response = Http::post('https://petstore.swagger.io/v2/user', [
            'id' => $id,
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'userStatus' => 0,
        ]);

        if ($response->successful()) {
            return redirect('/');
        } else {
            return back()->withErrors(['msg' => 'Problem z rejestracją w serwisie zewnętrznym.']);
        }
    }

}
