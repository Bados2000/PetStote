<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    public function showCheckUserForm()
    {
        return view('checkUser');
    }
    public function checkUser(Request $request)
    {
        $username = $request->input('username');

        $response = Http::get('https://petstore.swagger.io/v2/user/' . $username);

        if ($response->successful()) {
            // Pobranie odpowiedzi w formie tablicy JSON
            $userData = $response->json();

            // Tutaj możesz przetwarzać dane użytkownika z $userData
            return "Użytkownik o nazwie $username istnieje. Dane: " . json_encode($userData);
        } else {
            return "Użytkownik o nazwie $username nie istnieje.";
        }
    }
}
