<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

    <div class="w-[430px] bg-white shadow-2xl rounded-2xl p-10 border border-blue-100">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-700">Point Of Sales</h1>
            <p class="text-gray-500">Online point of sales system for F&B</p>
        </div>

        <h3 class="text-xl font-semibold text-blue-600 mb-6">Login</h3>

        <form action="{{ route('login_user') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-gray-700 mb-1 font-medium">Email</label>
                <div class="flex items-center border border-blue-300 rounded-lg px-3 py-2 bg-blue-50/30 focus-within:border-blue-500 transition">
                    <input type="email" name="email" placeholder="Email Address"
                           class="ml-1 w-full bg-transparent focus:outline-none">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 mb-1 font-medium">Password</label>
                <div class="flex items-center border border-blue-300 rounded-lg px-3 py-2 bg-blue-50/30 focus-within:border-blue-500 transition">
                    <input type="password" name="password" placeholder="Password"
                           class="ml-1 w-full bg-transparent focus:outline-none">
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg 
                       hover:bg-blue-700 transition shadow-md">
                Log In
            </button>

        </form>
    </div>

</body>
</html>
