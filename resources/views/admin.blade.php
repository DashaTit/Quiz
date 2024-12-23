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
        <div class="container">
            <div class="admin__panel">
                <aside class="admin__panel_sidebar">
                    <a class="admin__panel_link" href="#">Создать тест</a>
                    <button class="create__subject open-popup">Создать предмет</button>
                </aside>
                <div class="admin__panel_main">
                    <h1>Все предметы:</h1>

                    <div class="subjects__list">
                        @foreach ($subjects as $subject)
                        <a href="subjects/show/{{$subject->id}}" class="subject__name">{{ $subject->subject_name }}</a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="popup__bg">
        <form class="popup" action="{{ route('add_subject') }}" enctype="multipart/form-data" method="POST">
            <img src="storage/image/close.png" class="close-popup">

            @csrf
            @method('POST')
            <div class="col-md-12">
                <input class="subject__form" type="text" name="subject" placeholder="Название предмета" required>
            </div>
            <div class="form-button mt-3">
                <button id="submit" type="submit" class="btn btn-primary">Добавить предмет</button>
            </div>
        </form>
    </div>

    <script>
        let popupBg = document.querySelector('.popup__bg'); 
let popup = document.querySelector('.popup'); 
let openPopupButtons = document.querySelectorAll('.open-popup'); 
let closePopupButton = document.querySelector('.close-popup'); 

openPopupButtons.forEach((button) => { 
    button.addEventListener('click', (e) => { 
        e.preventDefault(); 
        popupBg.classList.add('active'); 
        popup.classList.add('active'); 
    })
});

closePopupButton.addEventListener('click',() => { 
    popupBg.classList.remove('active'); 
    popup.classList.remove('active'); 
});

document.addEventListener('click', (e) => { 
    if(e.target === popupBg) { 
        popupBg.classList.remove('active'); 
        popup.classList.remove('active'); 
    }
});
    </script>
</body>

</html>