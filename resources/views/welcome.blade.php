<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Cómo votó</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet"
        />
        <script src="https://kit.fontawesome.com/8696727dc8.js"></script>

        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: "Nunito", sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle {
                font-size: 32px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif @endauth
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Cómo votó 🇦🇷
                </div>
                <div class="subtitle m-b-md">
                    <p>
                        Próximamente vas a poder ver cómo votan nuestros
                        representantes
                    </p>
                </div>
                <div class="links">
                    <a
                        href="https://github.com/nahuelhds/votaciones-ar-datasets"
                        ><i class="fas fa-file-excel fa-2x"></i> Datasets</a
                    >
                    <a href="https://github.com/nahuelhds/votaciones-ar">
                        <i class="fab fa-github fa-2x"></i> GitHub</a
                    >
                    <a href="https://twitter.com/nahuelhds"
                        ><i class="fab fa-twitter fa-2x"></i> Twitter</a
                    >
                </div>
            </div>
        </div>
    </body>
</html>
