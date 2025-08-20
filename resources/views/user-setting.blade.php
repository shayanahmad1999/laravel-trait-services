<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Update Profile</h2>

        <!-- Profile Update Form -->
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save
                Profile</button>
        </form>

        <hr class="my-8">

        <!-- Avatar Upload Form -->
        <h2 class="text-2xl font-bold mb-4">Update Avatar</h2>
        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="avatar" class="block text-sm font-medium">Choose Avatar</label>
                <input type="file" name="avatar" id="avatar" accept="image/*"
                    class="mt-1 w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Upload
                Avatar</button>
        </form>

        @if (auth()->user()->avatar)
            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
                class="w-24 h-24 rounded-full object-cover border shadow">
        @else
            <img src="{{ asset('https://www.gravatar.com/avatar') }}" alt="Default Avatar"
                class="w-24 h-24 rounded-full object-cover border shadow">
        @endif



        <hr class="my-8">

        <!-- Theme Toggle Form -->
        <h2 class="text-2xl font-bold mb-4">Toggle Theme</h2>
        <form action="{{ route('profile.theme') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="theme" value="light" class="form-radio text-blue-600" checked>
                    <span class="ml-2">Light</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="theme" value="dark" class="form-radio text-blue-600">
                    <span class="ml-2">Dark</span>
                </label>
            </div>
            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Apply
                Theme</button>
        </form>
    </div>
</body>

</html>
