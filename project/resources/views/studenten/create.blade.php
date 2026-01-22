@extends('layouts.app')

@section('content')
    <h1>Nieuwe Student Toevoegen</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('studenten.store') }}" method="POST">
        @csrf
        <label>Voornaam:</label><br>
        <input type="text" name="voornaam" value="{{ old('voornaam') }}"><br>

        <label>Achternaam:</label><br>
        <input type="text" name="achternaam" value="{{ old('achternaam') }}"><br>

        <label>Leerlingnummer:</label><br>
        <input type="text" name="leerlingnummer" value="{{ old('leerlingnummer') }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>Rol:</label><br>
        <select name="role">
            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select><br><br>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('studenten.index') }}">Terug naar lijst</a>
@endsection
