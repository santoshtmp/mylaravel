<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body>
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex  space-x-6 text-lg">
            <li>
                <a href="/news">News</a>
            </li>
            <li>
                <a href="/stories">Stories</a>
            </li>
        </ul>

        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <a href="{{ url('/profile') }}" class="hover:text-laravel">Profile</a>
                </li>
                <li>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>Log-out
                        </button>
                    </form>
                </li>
            @else
                @if (Route::has('login'))
                    <li>
                        <a href="{{ route('register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                            Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-laravel"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                @endif
            @endauth
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer
        class="bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
    </footer>

    <x-flash_message />
</body>

</html>
