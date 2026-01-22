@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>Voornaam:</strong> {{ $student->voornaam }}</p>
    <p><strong>Achternaam:</strong> {{ $student->achternaam }}</p>
    <p><strong>Leerlingnummer:</strong> {{ $student->leerlingnummer }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Rol:</strong> {{ $student->role }}</p>

    <a href="{{ route('studenten.index') }}">Terug naar lijst</a>
@endsection
