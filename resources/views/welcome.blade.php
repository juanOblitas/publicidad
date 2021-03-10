<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
    </head>
    <body>

        <header>
            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand">CoolAdvertising</a>
              <form class="form-inline">
                @if (Route::has('login'))
                    <nav class="navbar navbar-expand-lg">
                        @auth
                            <a href="{{ url('/home') }}" class="navbar-brand">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="navbar-brand">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="navbar-brand">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
              </form>
            </nav>
        </header>
        <main>
            <!-- Carrusel -->
            <section class="container pl-0 pr-0 mt-2">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($images as $image)

                    <div class="carousel-item @if($image['id']==1) active @endif">
                      <img src="{{ $image['image'] }}" class="d-block w-100" alt="...">
                    </div>
                    
                    @endforeach
                  </div>
                </div>
            </section>
        </main>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
