<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav >
        <div class="container">
            <div class="logo">
                <a href="/">quiz</a>
            </div>
            <div class="container register">
                <h1>Войти</h1>
            </div>
        </div>
    </nav>
    
    <main>
        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <form class="requires-validation" action="{{ route('login') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('POST')
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="email" placeholder="Почта" value="{{old('email')}}" required>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Пароль"
                                        required>
                                </div>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                {{-- <div class="col-md-12">
                                    <input class="form-control" type="password" name="check_password"
                                        placeholder="аватар">
                                </div> --}}

                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-primary">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>