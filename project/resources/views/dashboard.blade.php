@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klas</th> <!-- toegevoegd -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($gebruikers as $gebruiker)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $gebruiker->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $gebruiker->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $gebruiker->klas }}</td> <!-- toegevoegd -->
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                            <a href="/gebruikers/{{ $gebruiker->id }}/edit"
                               class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Bewerken</a>

                            <form action="/gebruikers/{{ $gebruiker->id }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
