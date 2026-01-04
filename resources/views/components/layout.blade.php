<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Art Gallery</title>
    <!-- Add the Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100">

<!-- Navbar -->
<nav class="bg-gray-800 p-4">
    <ul class="flex justify-start space-x-4 items-center">
        <div><a href="/"
                class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Home</a></div>
        <div><a href="{{route('arts.index')}}"
                class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Art overview</a></div>
        <div><a href="{{route('about')}}"
                class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">About</a></div>

        @guest
            <div><a href="{{ route('login') }}"
                    class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Login</a></div>
            <div><a href="{{ route('register') }}"
                    class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Register</a>
            </div>
        @endguest

        @auth
            <div>
                <a href="{{ route('user.profile') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                    Mijn Profiel
                </a>
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-white text-black px-4 py-2 rounded hover:bg-gray-200 transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

        <div><a href="/admin"
                class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Admin overview</a>
        </div>
    </ul>
</nav>

<main class="p-4">
    {{$slot}}
</main>

</body>
</html>
