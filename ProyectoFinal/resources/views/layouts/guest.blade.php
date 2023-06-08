<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    <style>
        .imagendefondo {
            background-image: url('https://lh3.googleusercontent.com/pw/AJFCJaULdJ391GWZWlBT__oFae2OCQYW8qKgQCIwSRDtoZT3GnYfp-h1-HRr9ATaWN5XLdPRsaoE_fdCc9oeRw43_dJTGs2x68uH-QFf-rcPZEdc8m8aVl-UBh6nC5mG0LyyJQ7dwXKP0GC1meQc5JEjY1CC=w1760-h990-s-no?authuser=0');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        @import url('https://fonts.googleapis.com/css2?family=Carter+One&family=Tangerine&display=swap');*/
        @import url('https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap');

        .letra {
            font-family: 'Carter One', cursive;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 imagendefondo ">
        <div>
            <a href="/">
                <p class="w-20 h-20  text-gray-500  border-4 border-[#57534e] text-center rounded-[10px]"><br>Logo</p>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-[#f9fafb] shadow-md overflow-hidden border-4 border-black py-2 px-2 rounded-[50px]">

            {{ $slot }}
        </div>
    </div>
</body>

</html>