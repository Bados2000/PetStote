<?php

namespace App\Http\Controllers\PetStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class PetController extends Controller
{
    public function createPet(Request $request): RedirectResponse
    {
        // Pobierz dane z żądania
        $requestData = $request->all();
        $data = [
            'id' => $requestData['id'],
            'category' => [
                'id' => $requestData['category']['id'],
                'name' => $requestData['category']['name'],
            ],
            'name' => $requestData['name'],
            'photoUrls' => [$requestData['photoUrls']],
            'tags' => [
                [
                    'id' => $requestData['tags']['id'],
                    'name' => $requestData['tags']['name'],
                ],
            ],
            'status' => $requestData['status'],
        ];
        $response = Http::post('https://petstore.swagger.io/v2/pet', $data);

        switch ($response->status()) {
            case 200:
                $errorMessage = 'Zwierzak został dodany.';
                break;
            case 405:
                $errorMessage = 'Nieprawidłowe dane.';
                break;

            default:
                $errorMessage = 'Nieznany błąd: ' . $response->status();
                break;
        }

            // Odpowiedź nieudana, obsłuż błąd
        return redirect('/')->with('success', $errorMessage);

    }
    public function showPet(Request $request): RedirectResponse
    {
        $petId = $request->input('petId');

        // Wykonaj zapytanie do API, aby pobrać dane o zwierzaku na podstawie $petId
        $response = Http::get("https://petstore.swagger.io/v2/pet/{$petId}");
        switch ($response->status()) {
            case 200:
                $errorMessage = 'Zwierzak został znaleziony.';
                break;
            case 400:
                $errorMessage = 'Nieprawidłowe ID podane.';
                break;
            case 404:
                $errorMessage = 'Zwierzak nie został znaleziony.';
                break;

            default:
                $errorMessage = 'Nieznany błąd: ' . $response->status();
                break;
        }

        if (!$response->successful()) {
            return redirect('/')->with('success2', $errorMessage);
        } else {
            session()->flash('petData', $response->json());
            // Obsłuż błąd - np. zwierzak o danym "petId" nie istnieje
            return redirect('/')->with('success2', $errorMessage);
        }
    }
    public function updatePet(Request $request): RedirectResponse
    {
        // Pobierz dane z żądania
        $requestData = $request->all();

        // Przygotuj dane do wysłania
        $data = [
            'id' => $requestData['id'],
            'category' => [
                'id' => $requestData['category']['id'],
                'name' => $requestData['category']['name'],
            ],
            'name' => $requestData['name'],
            'photoUrls' => [$requestData['photoUrls']],
            'tags' => [
                [
                    'id' => $requestData['tags']['id'],
                    'name' => $requestData['tags']['name']
                ],
            ],
            'status' => $requestData['status'],
        ];



        // Wyślij dane do API za pomocą metody PUT
        $response = Http::put('https://petstore.swagger.io/v2/pet', $data, [
            'Content-Type' => 'application/json'
        ]);
        switch ($response->status()) {
            case 200:
                $errorMessage = 'Zwierzak został zaktualizowany.';
                break;
            case 400:
                $errorMessage = 'Nieprawidłowe ID podane.';
                break;
            case 404:
                $errorMessage = 'Zwierzak nie został znaleziony.';
                break;
            case 405:
                $errorMessage = 'Błąd walidacji.';
                break;
            default:
                $errorMessage = 'Nieznany błąd: ' . $response->status();
                break;
        }


        return back()->with('success2', $errorMessage);


    }

    public function deletePet(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $petId = $request->input('petId');

        // Wykonaj zapytanie do API, aby pobrać dane o zwierzaku na podstawie $petId
        $response = Http::delete("https://petstore.swagger.io/v2/pet/{$petId}");
        switch ($response->status()) {
            case 200:
                $errorMessage = 'Zwierzak został usunięty.';
                break;
            case 400:
                $errorMessage = 'Nieprawidłowe ID podane.';
                break;
            case 404:
                $errorMessage = 'Zwierzak nie został znaleziony.';
                break;
            case 405:
                $errorMessage = 'Błąd walidacji.';
                break;
            default:
                $errorMessage = 'Nieznany błąd: ' . $response->status();
                break;
        }
        // Sprawdź, czy odpowiedź jest udana

        return redirect('/')->with('success4', $errorMessage);

    }
}

