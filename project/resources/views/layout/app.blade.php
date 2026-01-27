<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
<header class="bg-blue-600 text-white shadow">
    <div class="container mx-auto flex justify-between items-center p-4">
        <h1 class="text-xl font-bold">MyApp</h1>
        <nav class="flex items-center space-x-4">
            <a href="/home" class="hover:underline">Home</a>
            <a href="/keuzedeel" class="hover:underline">Keuzedeel kiezen</a>
            <a href="/profiel" class="hover:underline">Profiel</a>

            <!-- Logout -->
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit"
                        class="hover:underline text-white bg-red-600 px-3 py-1 rounded-md hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</header>
<main class="flex-1 container mx-auto p-4">
    @yield('content')
</main>
<footer class="bg-gray-800 text-white p-4 mt-4">
    <div class="container mx-auto text-center text-sm">
        &copy; 2026 MyApp. All rights reserved.
    </div>
</footer>
</body>
</html>
