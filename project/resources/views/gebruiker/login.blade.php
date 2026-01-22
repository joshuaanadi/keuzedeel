@extends('layout.app')

@section('title', 'Login')

@section('content')
    <h2>Inloggen</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <button class="login" type="submit">Inloggen</button>
    </form>
    <a href="/register">Nog geen account? Registreer</a>
@endsection
