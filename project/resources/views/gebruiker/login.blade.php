@extends('layout.account')

@section('title', 'Login')

@section('content')
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Inloggen</h2>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <input type="password" name="password" placeholder="Wachtwoord" required
                       class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Inloggen
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
            Nog geen account?
            <a href="/register" class="text-blue-600 hover:underline">Registreer</a>
        </p>
    </div>
@endsection

