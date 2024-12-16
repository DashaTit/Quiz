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
    <nav>
        <div class="container">
            <div class="logo">
                <a href="/">quiz</a>
            </div>
            <div class="container register">
                <h1>Регистрация</h1>
            </div>
        </div>
    </nav>

    <main>
        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <form class="requires-validation" action="{{ route('register') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('POST')
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="name" placeholder="ФИО" required
                                        value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12">
                                    <input class="form-control" type="number" name="age" placeholder="Возраст" required
                                        value="{{ old('age') }}">
                                </div>
                                @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12">
                                    <select name="status" class="form-select mt-3" required>
                                        <option selected disabled value="">Статус</option>
                                        <option value="student">Школьник/студент</option>
                                        <option value="teacher">Учитель</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="email" placeholder="Почта" required
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password" placeholder="Пароль"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" type="password" name="password_confirmation"
                                        placeholder="Повторите пароль" required>
                                    {{-- <div class="valid-feedback">Пароль field is valid!</div>
                                    <div class="invalid-feedback">Пароль field cannot be blank!</div> --}}
                                </div>

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                                <label for="file-upload" class="custom-file-upload col-md-12">
                                    Загрузить автар
                                </label>
                                <input id="file-upload" type="file" class="input__img" name="image"
                                    accept="image/png, image/jpeg" />
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-primary">Регистрация</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        const realInput = document.getElementById('file-upload');
        realInput.addEventListener('change', function() {
            const fileName = realInput.value.split('\\').pop();
            document.querySelector('.custom-file-upload').textContent = fileName || 'Выбрать аватар';
        });
    </script>
</body>

</html>