<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SurviManualTec</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet">

    <style>
        .imagendefondo {
            background-image: url('https://lh3.googleusercontent.com/pw/AJFCJaUcPXmE1MqDs9KEBSS3PV29mYU1KSJevP6Gb3LIghdCkZijdfvo48sZKbpZ0IKgOEtutDrkp-35S2_nR75JAIenIrP_PFiY7acX1pPeOlONnnzhG49gf52bekq1-j1e4Cxh0JAcXxP-tv_pUCQ2v1y5=w1760-h990-s-no?authuser=0');
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
        .titulocards{
            font-family: 'Covered By Your Grace', cursive;
        }
        .subtitulos{
            font-family: 'Sniglet', cursive;
        }
    </style>
</head>

<body class="imagendefondo">
    <div class="container">
        <!-- Page Content goes here -->
        <br><br><br><br><br><br><br>
        <div class="row py-2 animate__bounceIn">
            <div class="py-4 px-4 align-items: center ">
                <div class="col s12 ">
                    <div class="row">
                        <div class="col s5"></div>
                        <div class="col s2">
                            <div class="border-4 border-black op py-2 px-2 rounded-[30px] shadow-lg">
                                <img src="https://lh3.googleusercontent.com/pw/AJFCJaXzC7eqWIf4Z9Do4yxPcxnToTHOuKMvTPvLAb_2JAN4yYqd1OKXfwMTtFH4MtVUMGfJUb9RsSaert2lnD3COMQULrAsOTdSJBMaBFzHcmGViUhGTcLw1nsDCpYyxEfD9fELGV7LagqMtcArH2P76XZn=w500-h500-s-no?authuser=0" alt="">
                            </div>
                        </div>
                        <div class="col s5"></div>
                    </div>

                </div>
                <div class="col s12 ">
                    <div class="row">
                        <div class="col s3"></div>
                        <div class="col s6 ">
                            <div class="border-4 border-black py-2 px-2 rounded-[30px] shadow-lg">
                                <div class="rounded-[30px] overflow-hidden shadow-lg py-4 bg-white opacity-100 border-4 border-black">
                                    <div class="px-6 py-4">
                                        <div class="text-6xl mb-2 text-[#FC2947] titulocards hover:underline"><a href="{{ url('/login') }}">INICIA TU SESIÓN</a></div>
                                        <p class="text-lg py-4">
                                            <button class="bg-[#3E1466] hover:bg-blue-700 text-[#fde047] font-bold py-2 px-4 rounded subtitulos">
                                                <a href="{{ url('/register') }}">REGISTRATE</a>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>