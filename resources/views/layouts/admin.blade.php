<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar and Content Wrapper -->
    <div class="flex">

        <!-- Sidebar -->
        <div class="w-64 bg-black text-white h-screen">
            <div class="px-6 py-4 text-2xl font-semibold">Admin Panel</div>
            <ul class="space-y-4">
                <li><a href="{{ route('admin.dashboard') }}" class="block px-6 py-2 text-lg hover:bg-gray-700">Dashboard</a></li>
                <li><a href="#" class="block px-6 py-2 text-lg hover:bg-gray-700">Events</a></li>
                <li><a href="#" class="block px-6 py-2 text-lg hover:bg-gray-700">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>

    </div>

</body>
</html>
