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
            <nav class="space-x-4">
                <a href="/login" class="hover:underline">Login</a>
                <a href="/register" class="hover:underline">Register</a>
            </nav>
        </div>
    </header>
    <main class="flex-1 flex items-center justify-center">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white p-4 mt-4">
        <div class="container mx-auto text-center text-sm">
            &copy; 2026 MyApp. All rights reserved.
        </div>
    </footer>
</body>
</html>
