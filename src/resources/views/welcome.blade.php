<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome | TaskForge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-xl text-center border border-blue-200">
        <div class="mb-6">
            <div class="flex justify-center mb-4">
                <a href="/" wire:navigate>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <h1 class="text-4xl font-extrabold text-gray-800 leading-tight">
                Welcome to <span class="text-blue-600">Task App</span>
            </h1>
            <p class="mt-3 text-gray-600 text-lg">
                Plan smart. Get more done. Your personal task manager to boost productivity.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <a href="{{ route('login') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="bg-white border border-blue-600 text-blue-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-50 transition">
                Register
            </a>
        </div>

        <p class="mt-6 text-sm text-gray-400">
            No account yet? Start organizing your life in minutes.
        </p>
    </div>

</body>

</html>