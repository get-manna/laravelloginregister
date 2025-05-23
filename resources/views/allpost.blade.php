<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>All Posts</title>
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">



        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">All Post </h1>
            <div class="space-x-4">
                <a href="{{ url('Dashboard') }}" class="bg-green-600 text-white px-4 py-2 rounded ">
                    Back to Dashboard
                </a>

            </div>
        </header>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-green-500">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-3 border border-green-500">ID</th>
                        <th class="px-4 py-3 border border-green-500">Title</th>
                        <th class="px-4 py-3 border border-green-500">Description</th>
                        <th class="px-4 py-3 border border-green-500">Category</th>
                        <th class="px-4 py-3 border border-green-500">Date</th>
                        <th class="px-4 py-3 border border-green-500">Time</th>
                        <th class="px-4 py-3 border border-green-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-green-50 text-green-900">
                    @foreach ($posts as $post)

                    <tr class="hover:bg-green-100 border-t border-green-200">
                        <td class="px-4 py-3 border border-green-300">{{ $post->id }}</td>
                        <td class="px-4 py-3 border border-green-300">{{ $post->name }}</td>
                        <td class="px-4 py-3 border border-green-300">{{ $post->description }}</td>
                        <td class="px-4 py-3 border border-green-300">{{ $post->category }}</td>
                        <td class="px-4 py-3 border border-green-300">{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="p-3">{{ $post->created_at->format('H:i:s') }}</td>
                        <td class="px-4 py-3 border border-green-300 space-x-2">
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($posts->isEmpty())
            <p class="text-red-600 mt-4">No posts found.</p>
            @endif
        </div>
    </div>

</body>

</html>