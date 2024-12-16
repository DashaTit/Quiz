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

    <main>
        <div class="user__page container">
            <div class="user__page_content">
                <div class="user__page_icon">
                    <img src="{{ auth()->user()->image}}" alt="">
                    <div class="">
                        <form class="requires-validation file_upload" enctype="multipart/form-data"
                            action="{{ route('change') }}" method="POST">
                            @csrf
                            @method('POST')
                            <label for="file-upload" class="custom-file-upload col-md-12 label_upload">
                                Выбрать аватар
                            </label>
                            <input id="file-upload" type="file" class="input__img" name="image"
                                accept="image/png, image/jpeg" />
                            <input class='logout' type="submit" value="Загрузить" />
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </form>

                    </div>
                </div>
                <div class="user__page_info">
                    <div class="info__line">
                        @php
                        $name = auth()->user()->name;
                        
                        if ($name == 'Admin') {
                            $name = 'Admin';
                        } else {
                            $name = explode(" ", $name);
                            $name = "$name[0] $name[1]";
                        }
                        $name = auth()->user()->status;
                        $status = '';
                        if ($name == "student") {
                        $status = 'Школьник / студент';
                        } else {
                        $status = 'Учитель';
                        }
                        if ($name == 'Admin') {
                            $status = 'Admin';
                        }
                        @endphp
                        <p class="info__line_name">{{  $name }}</p>
                    </div>

                    @if($status!='Admin')

                    <div class="info__line">
                        <p class="info__line_title">Возраст:</p>
                        <p class="info__line_input">{{auth()->user()->age}}</p>
                    </div>
                    @endif
                    

                    <div class="info__line">
                        <p class="info__line_title">Статус:</p>
                        <p class="info__line_input">{{ $status }}</p>
                    </div>
                </div>
            </div>

        </div>
    </main>


    <script>
        const realInput = document.getElementById('file-upload');
        realInput.addEventListener('change', function() {
            const fileName = realInput.value.split('\\').pop();
            document.querySelector('.label_upload').textContent = fileName || 'Выбрать аватар';
        });
    </script>
</body>

</html>