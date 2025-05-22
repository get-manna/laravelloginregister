<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Login</h2>


        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-2 text-sm text-center">
            {{ session('success') }}
        </div>
        @endif


        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-2 text-sm">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="space-y-4" method="POST" action="{{ route('Login-user') }}">
            @csrf


            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">
            New User
            <a href="Register" class="text-blue-600 hover:underline">Register Here</a>
        </p>
    </div>

</body>

</html>