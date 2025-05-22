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
                <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">Analytics</a>
                <a href="#" class="block text-gray-700 hover:bg-gray-100 p-2 rounded">Settings</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">New</button>
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User" />
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
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="p-2">Date</th>
                                    <th class="p-2">User</th>
                                    <th class="p-2">Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-2">2025-05-21</td>
                                    <td class="p-2">John Doe</td>
                                    <td class="p-2">Logged in</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2">2025-05-20</td>
                                    <td class="p-2">Jane Smith</td>
                                    <td class="p-2">Made a purchase</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>

    </div>

</body>

</html>