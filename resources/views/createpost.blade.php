<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Post</h2>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @if (session('success'))
        @endif
        <h2 class="text-green-600 text-2xl font-bold">{{ session('success') }}</h2>
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" />
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <input type="text" id="description" name="description" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" />
      </div>

      <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" id="image" name="image"
               class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md file:bg-green-600 file:text-white file:px-4 file:py-2 file:border-none file:rounded-md hover:file:bg-green-700" />
      </div>

      <div>
        <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
          Submit
        </button>
      </div>
    </form>
  </div>

</body>
</html>
