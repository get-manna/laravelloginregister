<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex flex-col md:flex-row">

        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-white h-screen shadow-md">
            <div class="p-6 text-xl font-bold border-b">Dashboard</div>
            <nav class="p-4 space-y-2">
                <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">Home</a>
                <a href="createpost" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">Create Post</a>
                <a href="allpost" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">All Post</a>
                <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">Settings</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="space-x-4">
                    <a href="{{ url('logout') }}" class="bg-blue-500 text-white px-4 py-2 rounded bg-green-600">
                        logout
                    </a>
                    <!-- <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User" /> -->
                </div>
            </header>

            <!-- Content -->
            <main class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Users</h2>
                        <p class="text-2xl font-bold mt-2">{{ $totalUsers }}
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Sales</h2>
                        <p class="text-2xl font-bold mt-2">$5,678</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-lg font-semibold">Orders</h2>
                        <p class="text-2xl font-bold mt-2">432</p>
                    </div>
                </div>

                <!-- Chart or Table Section -->
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 border-b border-gray-300 text-center">
                                <th class="p-3 text-center">Date</th>
                                <th class="p-3 text-center">Time</th>
                                <th class="p-3 text-center">Name</th>
                                <th class="p-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b border-gray-300 text-center">
                                <td class="p-3">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="p-3">{{ $user->created_at->format('H:i:s') }}</td>
                                <td class="p-3">{{ $user->name }}</td>
                                <td class="p-3 text-green-600 font-semibold">Registered</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>

        </main>
    </div>

    </div>

</body>

</html>