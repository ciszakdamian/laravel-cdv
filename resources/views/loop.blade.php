<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CDV</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

        table, tr, th, td{
            border: 1px solid red;
            border-collapse: collapse;
            text-align: center;
            padding: 1px;
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
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            CDV - Samochody
            <table class="table-dark">
                <tr>
                    <th>Marka</th>
                    <th>Model</th>
                    <th>Color</th>
                </tr>
                 @for($i=0; $i<count($car) ;$i++)
                        <tr>
                            <td>
                                {{$car[$i]['brand']}}
                            </td>
                            <td>
                                {{$car[$i]['model']}}
                            </td>
                            <td>
                                {{$car[$i]['color']}}
                            </td>
                        </tr>
                 @endfor
                @foreach($car as $item)
                    <div>

                        @if ($loop->first)
                            <span>Pierwszy element tablicy</span>
                        @endif
                        @if ($loop->last)
                                <span>Ostatni element tablicy</span>
                         @endif

                        {{ $loop->index }}:
                        Marka: {{ $item['brand'] }}, model {{$item['model']}}, kolor {{$item['color']}}
                    </div>
                @endforeach

            </table>
        </div>
    </div>
</div>
</body>
</html>
