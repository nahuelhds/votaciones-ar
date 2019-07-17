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
                font-size: 64px;
            }

            .subtitle {
                font-size: 32px;
            }

            .call-to-action > p {
                font-size: 1.1rem;
            }

            .call-to-action > a {
                border: 2px solid transparent;
                display: inline-block;
                padding: 0.75rem 1.5rem;
                font-size: 1.5rem;
                line-height: 1.5;
                border-radius: 0.75rem;
                text-decoration: none;
                width: 300px;
            }

            .call-to-action > a.primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }

            .call-to-action > a.default {
                color: #333;
                border-color: #666;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px 2rem;
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
                        Próximamente vas a ver cómo actúan nuestros
                        representantes
                    </p>
                </div>
                <div class="call-to-action m-b-md">
                    <p>
                        ¿Sos un/a geek con inquietudes? 👨‍💻👩‍💻 <br />
                        El API ya está listo para consultar 🤓
                    </p>
                    <a class="primary" href="./docs/#general">
                        <i class="fas fa-book"></i> Referencia del API</a
                    >
                </div>
                <div class="call-to-action m-b-md">
                    <p>
                        ¡Accesible para la humanidad! 🧑👨 <br />Formatos
                        amigables CSV y JSON 👇
                    </p>
                    <a
                        class="default"
                        href="https://github.com/nahuelhds/votaciones-ar-datasets"
                        ><i class="fas fa-file-excel"></i> Datasets
                    </a>
                </div>
                <div class="links">
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
