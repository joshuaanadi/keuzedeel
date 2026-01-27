@extends('layout.account')

@section('title', 'Registreren')

@section('content')
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registreren</h2>
        <form action="/register" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Naam" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <input type="number" name="studentnummer" placeholder="Studentnummer" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <select name="klas" required
                        class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Kies je klas</option>
                    <option value="PALVSOD2C">PALVSOD2C</option>
                    <option value="PALVSOD2B">PALVSOD2B</option>
                    <option value="PALVSOD2A">PALVSOD2A</option>
                </select>
            </div>
            <div>
                <input type="password" name="password" placeholder="Wachtwoord" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Bevestig wachtwoord" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Registreren
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
            Al een account?
            <a href="/login" class="text-blue-600 hover:underline">Log in</a>
        </p>
    </div>
@endsection
