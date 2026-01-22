@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <table>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Acties</th>
        </tr>
        @foreach($gebruikers as $gebruiker)
            <tr>
                <td>{{ $gebruiker->name }}</td>
                <td>{{ $gebruiker->email }}</td>
                <td>
                    <a class="button-link" href="/gebruikers/{{ $gebruiker->id }}/edit">Bewerken</a>
                    <form action="/gebruikers/{{ $gebruiker->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
