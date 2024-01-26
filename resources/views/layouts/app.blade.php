<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Prosty Pasek Nawigacyjny</title>
    <!-- Bootstrap CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #4a76a8 !important;border-bottom: 3px solid #333333">
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <a class="navbar-brand" href="/">Moja Strona</a>
        </div>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if(session('user_name'))
                <div>
                    <span>{{ session('user_name') }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="link-style-button">Wyloguj</button>
                    </form>
                </div>

            @else
                <a class="btn btn-primary btn-primary-login" href="{{ route('login') }}">Zaloguj się</a>
                <a class="btn btn-primary btn-primary-sign" href="{{ route('register') }}">Utwórz konto</a>
            @endif
        </div>
    </div>
</nav>

<main role="main" class="container">
    @yield('test')
</main>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
