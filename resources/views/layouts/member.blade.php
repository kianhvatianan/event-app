<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Area</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <a href="{{ route('member.dashboard') }}" class="text-2xl font-bold text-blue-600">Member Dashboard</a>
        <div>
            <a href="{{ route('member.dashboard') }}" class="text-gray-700 mr-4">Dashboard</a>
            <a href="{{ route('member.logout') }}" 
                class="text-red-500"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('member.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <main class="flex-1 container mx-auto p-6">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md p-4 text-center">
        <p class="text-sm text-gray-600">© {{ date('Y') }} Member Area</p>
    </footer>
</body>
</html>
