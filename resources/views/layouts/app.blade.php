<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo di sebelah kiri -->
            <a href="{{ url('/') }}" class="text-2xl font-semibold text-gray-800">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            </a>

            <!-- Links di sebelah kanan -->
            <div class="flex space-x-4">
                @guest
                    <!-- Login dan Register jika belum login -->
                    <a href="{{ route('member.login') }}" class="text-gray-800 hover:text-blue-500">Login</a>
                    <a href="{{ route('member.register') }}" class="text-gray-800 hover:text-blue-500">Register</a>
                @else
                    <!-- Profile jika sudah login -->
                    <a href="{{ route('member.dashboard') }}" class="text-gray-800 hover:text-blue-500">Dashboard</a>
                    <form action="{{ route('member.logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="text-gray-800 hover:text-blue-500">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main>
        @yield('content')
    </main>

</body>
</html>
