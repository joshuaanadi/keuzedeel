@extends('layout.account')

@section('title', 'Gebruiker Bewerken')

@section('content')
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Gebruiker Bewerken</h2>
        <form action="/gebruikers/{{ $gebruiker->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <input type="text" name="name" placeholder="Naam" value="{{ old('name', $gebruiker->name) }}" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email', $gebruiker->email) }}" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <input type="number" name="studentnummer" placeholder="Studentnummer" value="{{ old('studentnummer', $gebruiker->studentnummer) }}" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <select name="klas" required
                        class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled {{ old('klas', $gebruiker->klas) ? '' : 'selected' }}>Kies je klas</option>
                    <option value="PALVSOD2A" {{ old('klas', $gebruiker->klas) == 'PALVSOD2A' ? 'selected' : '' }}>PALVSOD2A</option>
                    <option value="PALVSOD2B" {{ old('klas', $gebruiker->klas) == 'PALVSOD2B' ? 'selected' : '' }}>PALVSOD2B</option>
                    <option value="PALVSOD2C" {{ old('klas', $gebruiker->klas) == 'PALVSOD2C' ? 'selected' : '' }}>PALVSOD2C</option>
                </select>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Opslaan
            </button>

            @if ($errors->any())
                <ul class="mt-4 text-red-600 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            <a href="/dashboard" class="text-blue-600 hover:underline">Terug naar dashboard</a>
        </p>
    </div>
@endsection


