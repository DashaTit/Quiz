<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Пользователь</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav>
        <div class="container">
            <div class="navigation">
                <div class="logo">
                    <a href="/">quiz</a>
                </div>
                <div class="user_auth">
                    <form class="requires-validation" action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input class='logout' type="submit" value="Выйти" />
                    </form>
                </div>
            </div>
    </nav>

    <main class="container">
        <h1 class="subject_title">{{$subjectName}}</h1>
    </main>



    </script>
</body>

</html>