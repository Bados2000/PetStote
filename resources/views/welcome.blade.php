@extends('layouts.app')

@section('test')

    <section class="container" style="display: flex; justify-content: start; align-items: flex-start;">
        @if(session('user_name'))
    {{--        <form action="{{ url('/clear-session') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <button type="submit">Wyczyść Sesję</button>--}}
{{--        </form>--}}
{{--        <form method="POST" action="{{ route('check-user') }}">--}}
{{--            @csrf--}}
{{--            <label for="username">Nazwa użytkownika:</label>--}}
{{--            <input type="text" style="border: solid black 2px " name="username" id="username">--}}
{{--            <button type="submit"  style="background-color: blue; color:white; border-radius: 2px" >Sprawdź</button>--}}
{{--        </form>--}}
        <div style="flex: 1; padding: 20px 20px; border: solid black 1px;">
            <x-guest-layout>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Session Status -->
                <form action="{{ url('/petstore/create') }}" method="POST">
                    @csrf
                    <h1 style="padding-top: 20px; padding-bottom: 20px; font-size: 22px">Dodawanie zwierzaka</h1>

                    <div>
                        <x-input-label for="id" :value="__('Id zwierzaka')" />
                        <x-text-input id="id" class="block mt-1 w-full" type="number"  name="id" :value="old('id')" required autofocus autocomplete="id" />
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Nazwa Zwierzaka')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="category[id]" :value="__('Id kategorii')" />
                        <x-text-input id="category[id]" class="block mt-1 w-full" type="number"  name="category[id]" :value="old('category[id]')" required autofocus autocomplete="category[id]" />
                        <x-input-error :messages="$errors->get('category[id]')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="category[name]" :value="__('Nazwa kategorii')" />
                        <x-text-input id="category[name]" class="block mt-1 w-full" type="text" name="category[name]" :value="old('category[name]')" required autofocus autocomplete="category[name]" />
                        <x-input-error :messages="$errors->get('category[name]')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="photoUrls" :value="__('Url zdjęcia')" />
                        <x-text-input id="photoUrls" class="block mt-1 w-full" type="text" name="photoUrls" :value="old('photoUrls')" required autofocus autocomplete="photoUrls" />
                        <x-input-error :messages="$errors->get('photoUrls')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tags[id]" :value="__('Id tagu')" />
                        <x-text-input id="tags[id]" class="block mt-1 w-full" type="number" name="tags[id]" :value="old('tags[id]')" required autofocus autocomplete="tags[id]" />
                        <x-input-error :messages="$errors->get('tags[id]')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="tags[name]" :value="__('Nazwa tagu')" />
                        <x-text-input id="tags[name]" class="block mt-1 w-full" type="text" name="tags[name]" :value="old('tags[name]')" required autofocus autocomplete="tags[id]" />
                        <x-input-error :messages="$errors->get('tags[name]')" class="mt-2" />
                    </div>
                    <div>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" class="block mt-1 w-full"  required autofocus>
                                <option value="available">available</option>
                                <option value="pending">pending</option>
                                <option value="sold">sold</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                            Utwórz zwierzaka
                        </button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
        <div class="min-he" style="flex: 1; padding: 20px 20px; border: solid black 1px;">
            <x-guest-layout class="custom-guest-layout">
                <!-- Session Status -->

                <form action="{{ route('petstore.showPet') }}" method="GET">
                    @csrf
                    <h1 style="padding-top: 20px; padding-bottom: 20px; font-size: 22px">Pobieranie i edycja 1</h1>
                @if (session('success2'))
                        <div class="alert alert-success">
                            {{ session('success2') }}
                        </div>
                    @endif
                    <div>
                        <x-input-label for="petId" :value="__('Id zwierzaka')" />
                        <x-text-input id="id" class="block mt-1 w-full" type="number"  name="petId" :value="old('petId')" required autofocus autocomplete="petId" />
                        <x-input-error :messages="$errors->get('petId')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                            Sprawdź zwierzaka
                        </button>
                    </div>
                </form>
            </x-guest-layout>


            @if(session('petData'))
                    <x-guest-layout>
                        <form action="{{ route('petstore.updatePet') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="id" :value="__('Id zwierzaka')" />
                                <x-text-input id="id" class="block mt-1 w-full" type="number" name="id" :value="session('petData')['id']" required autofocus autocomplete="id" />
                                <x-input-error :messages="$errors->get('id')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id" :value="__('Nazwa zwierzaka')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="session('petData')['name']" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="id" :value="__('Id kategorii')" />
                                <x-text-input id="category[id]" class="block mt-1 w-full" type="number"  name="category[id]" :value="session('petData')['category']['id']" required autofocus autocomplete="category[id]" />
                                <x-input-error :messages="$errors->get('category[id]')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id" :value="__('Nazwa kategorii')" />
                                <x-text-input id="category[name]" class="block mt-1 w-full" type="text" name="category[name]" :value="session('petData')['category']['name']" required autofocus autocomplete="category[name]" />
                                <x-input-error :messages="$errors->get('category[name]')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id" :value="__('Url zdjęcia')" />
                                <x-text-input id="photoUrls" class="block mt-1 w-full" type="text" name="photoUrls" :value="session('petData')['photoUrls'][0]" required autofocus autocomplete="photoUrls" />
                                <x-input-error :messages="$errors->get('photoUrls')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id" :value="__('Id tagu')" />
                                <x-text-input id="tags[id]" class="block mt-1 w-full" type="number" name="tags[id]" :value="session('petData')['tags'][0]['id']" required autofocus autocomplete="tags[id]" />
                                <x-input-error :messages="$errors->get('tags[id]')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="id" :value="__('Nazwa tagu')" />
                                <x-text-input id="tags[name]" class="block mt-1 w-full" type="text" name="tags[name]" :value="session('petData')['tags'][0]['name']" required autofocus autocomplete="tags[name]" />
                                <x-input-error :messages="$errors->get('tags[name]')" class="mt-2" />
                            </div>
                            <div>
                                <div>
                                    <x-input-label for="status" :value="__('Status')" />
                                    <select name="status" id="status" class="block mt-1 w-full" required autofocus>
                                        <option value="available" @if(session('petData')['status'] == 'available') selected @endif>available</option>
                                        <option value="pending" @if(session('petData')['status'] == 'pending') selected @endif>pending</option>
                                        <option value="sold" @if(session('petData')['status'] == 'sold') selected @endif>sold</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                                    Edytuj zwierzaka
                                </button>
                            </div>

                        </form>
                    </x-guest-layout>
            @else

            @endif

        </div>
            <div class="min-he" style="flex: 1; padding: 20px 20px; border: solid black 1px;">
                <x-guest-layout class="custom-guest-layout">
                    <!-- Session Status -->

                    <form action="{{ route('petstore.updatePet2') }}" method="POST">
                        @csrf
                        <h1 style="padding-top: 20px; padding-bottom: 20px; font-size: 22px">Pobieranie i edycja 2</h1>
                        @if (session('success5'))
                            <div class="alert alert-success">
                                {{ session('success5') }}
                            </div>
                        @endif
                        <div>
                            <x-input-label for="petId" :value="__('Id zwierzaka')" />
                            <x-text-input id="id" class="block mt-1 w-full" type="number"  name="petId" required autofocus autocomplete="petId" />
                            <x-input-error :messages="$errors->get('petId')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="id" :value="__('Nazwa zwierzaka')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div>
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full" required autofocus>
                                    <option value="available">available</option>
                                    <option value="pending">pending</option>
                                    <option value="sold">sold</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                                Sprawdź zwierzaka
                            </button>
                        </div>
                    </form>
                </x-guest-layout>

            </div>
            <div style="flex: 1; padding: 20px 20px; border: solid black 1px;">
                <x-guest-layout>
                    <!-- Session Status -->
                    <form action="{{ route('petstore.deletePet') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @if (session('success4'))
                            <div class="alert alert-success">
                                {{ session('success4') }}
                            </div>
                        @endif
                        <div>
                            <x-input-label for="petId" :value="__('Id zwierzaka')" />
                            <x-text-input id="id" class="block mt-1 w-full" type="number"  name="petId" :value="old('petId')" required autofocus autocomplete="petId" />
                            <x-input-error :messages="$errors->get('petId')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                                Usuń zwierzaka
                            </button>
                        </div>
                    </form>
                </x-guest-layout>
            </div>
        @endif
    </section>
@endsection

