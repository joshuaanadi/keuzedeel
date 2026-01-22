@extends('layout.app')

@section('title', 'Registreren')

@section('content')
    <h2>Registreren</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Naam" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="studentnummer" placeholder="Studentnummer" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <input type="password" name="password_confirmation" placeholder="Bevestig wachtwoord" required>
        <button class="register" type="submit">Registreren</button>
    </form>
    <a href="/login">Al een account? Log in</a>
@endsection
