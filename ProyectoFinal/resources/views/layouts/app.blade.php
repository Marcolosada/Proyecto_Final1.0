<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Consejos ISC</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">

    <style>
        .imagendefondo {
            background-image: url('https://lh3.googleusercontent.com/pw/AJFCJaXKrj-3SbJ3n1yhACU1Q1FbkdhuuicmJBUQEYituNM_VJfO-KjfZY5pKv_NekPmcMD9gXI2jo5ha1M7q3MevHGknHKdetSnVwocPN21SUnt0Uep0Z6RzyoAg_XJCiQw09Hl4oDU56r611wYjiqKtH6E=w1760-h990-s-no?authuser=0');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        @import url('https://fonts.googleapis.com/css2?family=Carter+One&family=Tangerine&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Carter+One&family=Tangerine&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Sniglet&display=swap');

        .letra {
            font-family: 'Carter One', cursive;
        }

        .textindfo {
            font-family: 'Tangerine', cursive;
        }

        .imagen2 {
            transform: scale(var(--escala, 1));
            transition: transform 0.25s;
        }

        .imagen2:hover {
            --escala: 1.1;
            cursor: pointer;
            border-style: solid;
            border-color: #71717a;
            opacity: 1;
            background-color: #d1d5db;
        }
        .titulocards{
            font-family: 'Covered By Your Grace', cursive;
        }
        .subtitulos{
            font-family: 'Sniglet', cursive;
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased imagendefondo ">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="shadow bg-[#121212]">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 text-center ">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var index = 0;
    var listaimg = ["https://lh3.googleusercontent.com/pw/AJFCJaUcPXmE1MqDs9KEBSS3PV29mYU1KSJevP6Gb3LIghdCkZijdfvo48sZKbpZ0IKgOEtutDrkp-35S2_nR75JAIenIrP_PFiY7acX1pPeOlONnnzhG49gf52bekq1-j1e4Cxh0JAcXxP-tv_pUCQ2v1y5=w1790-h1007-s-no?authuser=0", "https://lh3.googleusercontent.com/pw/AJFCJaULdJ391GWZWlBT__oFae2OCQYW8qKgQCIwSRDtoZT3GnYfp-h1-HRr9ATaWN5XLdPRsaoE_fdCc9oeRw43_dJTGs2x68uH-QFf-rcPZEdc8m8aVl-UBh6nC5mG0LyyJQ7dwXKP0GC1meQc5JEjY1CC=w1790-h1007-s-no?authuser=0", "https://lh3.googleusercontent.com/pw/AJFCJaUkPYvFl0P9EqDWo9ZItVOEUF37-cr4Hk5pzcb8N9ZlsL9R_5L2FqDw5GAd7Z9GDTwLOn0hl2uTjugBFA-Ei3M-JAm94YJxiJ8uWCf9hIekf0Bzq02lkKGIOX2_uRKLRZCN-AS2eMuHH5MDl-sQtsSf=w1790-h1007-s-no?authuser=0"];
    $(function() {

        setInterval(changeImage, 10000);
    });

    function changeImage() {
        $('body').css("background-image", 'url(' + listaimg[index] + ')');
        index++;
        if (index == 3)
            index = 0;
    }

    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>

</html>