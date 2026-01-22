@extends('layout.app')

@section('title', 'Gebruiker Bewerken')

@section('content')
    <h2>Gebruiker Bewerken</h2>
    <form action="/gebruikers/{{ $gebruiker->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $gebruiker->name }}" required>
        <input type="email" name="email" value="{{ $gebruiker->email }}" required>
        <input type="password" name="password" placeholder="Nieuw wachtwoord (optioneel)">
        <button class="edit" type="submit">Opslaan</button>
    </form>
@endsection
