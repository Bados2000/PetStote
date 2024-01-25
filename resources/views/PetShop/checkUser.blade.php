<!DOCTYPE html>
<html>
<head>
    <title>Sprawdź użytkownika</title>
</head>
<body>
<h1>Sprawdź użytkownika</h1>
<form method="POST" action="{{ route('check-user') }}">
    @csrf
    <label for="username">Nazwa użytkownika:</label>
    <input type="text" name="username" id="username">
    <button type="submit">Sprawdź</button>
</form>
</body>
</html>
