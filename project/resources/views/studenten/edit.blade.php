@extends('layouts.app')

@section('content')
    <h1>Student Bewerken</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('studenten.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Voornaam:</label><br>
        <input type="text" name="voornaam" value="{{ $student->voornaam }}"><br>

        <label>Achternaam:</label><br>
        <input type="text" name="achternaam" value="{{ $student->achternaam }}"><br>

        <label>Leerlingnummer:</label><br>
        <input type="text" name="leerlingnummer" value="{{ $student->leerlingnummer }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $student->email }}"><br>

        <label>Rol:</label><br>
        <select name="role">
            <option value="student" {{ $student->role == 'student' ? 'selected' : '' }}>Student</option>
            <option value="admin" {{ $student->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select><br><br>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('studenten.index') }}">Terug naar lijst</a>
@endsection
