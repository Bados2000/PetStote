@extends('layouts.app')

@section('test')
    <section class="container">
        <form action="{{ url('/clear-session') }}" method="POST">
            @csrf
            <button type="submit">Wyczyść Sesję</button>
        </form>
        <form method="POST" action="{{ route('check-user') }}">
            @csrf
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" style="border: solid black 2px " name="username" id="username">
            <button type="submit"  style="background-color: blue; color:white; border-radius: 2px" >Sprawdź</button>
        </form>
        @csrf

    </section>
@endsection

