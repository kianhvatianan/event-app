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
        <div class="w-64 bg-black text-white h-screen flex flex-col">
            <div class="px-6 py-4 text-2xl font-semibold">Admin Panel</div>
            <ul class="space-y-4 flex-grow">
                <li><a href="{{ route('admin.dashboard') }}" class="block px-6 py-2 text-lg hover:bg-gray-700">Dashboard</a></li>
                <li><a href="#" class="block px-6 py-2 text-lg hover:bg-gray-700">Events</a></li>
                <li><a href="#" class="block px-6 py-2 text-lg hover:bg-gray-700">Members</a></li>
            </ul>

            <!-- Logout Button (positioned at the bottom) -->
            <form action="{{ route('admin.logout') }}" method="POST" class="px-6 py-4">
                @csrf
                <button type="submit" class="w-full py-2 bg-white text-black font-semibold rounded-md">
                    Logout
                </button>
            </form>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>

    </div>

</body>
</html>
