<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Главная</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <nav class="">
            <div class="container navigation">
                <div class="logo">
                    <a href="/">quiz</a>
                </div>
    
                @if(Auth::user()) 
                    <div class="user_auth"> 
                        <form class="requires-validation" action="{{ route('logout') }}"  method="POST">
                            @csrf
                            @method('POST')
                            <input class='logout' type="submit" value="Выйти" />
                        </form>
                        <a class="user" href="/user">
                            <img src="{{ auth()->user()->image }}" alt="">
                            <p>{{ auth()->user()->name }}</p>
                        </a>
                </div>
                
                @else
                    <div class="user_auth"> 
                        <a href="/login">Войти</a>
                        <a href="/registration">Зарегистрироваться</a>
                    </div>
                
                @endif
                
            </div>
        </nav>
    </body>
</html>
