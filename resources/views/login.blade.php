<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="flex bg-white shadow-xl rounded-lg overflow-hidden w-[450px]">
        <!-- Left Form Section -->
        <div class="w-full p-10">
            <h2 class="text-3xl font-bold mb-2">Point Of Sales</h2>
            <p class="text-gray-600 mb-6">Online point of sales system for F&B</p>

            <h3 class="text-xl font-semibold mb-4">Login</h3>

            <form action="{{ route('login_user') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-gray-600">Email</label>
                    <div class="flex items-center border-2 border-gray-400 rounded-md px-3 py-2">
                        <input type="email" name="email" placeholder="Email Address"
                               class="ml-2 w-full border-none focus:outline-none">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-gray-600">Password</label>
                    <div class="flex items-center border-2 border-gray-400 rounded-md px-3 py-2">
                        <input type="password" name="password" placeholder="Password"
                               class="ml-2 w-full border-none focus:outline-none">
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full mt-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-md font-semibold hover:from-blue-600 hover:to-blue-700 transition">
                    Log in
                </button>
            </form>
        </div>
    </div>

</body>
</html>