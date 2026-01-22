@extends('layouts.app')

@section('content')
    <h1>Studenten</h1>
    <a href="{{ route('studenten.create') }}">Nieuwe Student Toevoegen</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Leerlingnummer</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acties</th>
        </tr>
        @foreach($studenten as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->voornaam }}</td>
                <td>{{ $student->achternaam }}</td>
                <td>{{ $student->leerlingnummer }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->role }}</td>
                <td>
                    <a href="{{ route('studenten.show', $student->id) }}">Bekijk</a> |
                    <a href="{{ route('studenten.edit', $student->id) }}">Bewerk</a> |
                    <form action="{{ route('studenten.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je het zeker?')">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
