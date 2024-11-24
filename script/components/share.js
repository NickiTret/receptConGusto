function actionToggle() {
    var action = document.querySelector('.share');
    action.classList.toggle('active');
}


const share = document.querySelector('.share');

if (share) {
    share.addEventListener('click', actionToggle);
}


//$Recycle.Bin

document.getElementById('accept-cookie').addEventListener('click', function() {
    // Отправляем AJAX-запрос для установки cookie
    fetch("{{ route('cookie.accept') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(response => {
        if (response.ok) {
            document.getElementById('cookie-policy').style.display = 'none';
        }
    });
});


function cookies() {
    // Функция для получения значения куки по имени
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    // Проверяем, установлены ли куки acceptCookie
    if (getCookie('acceptCookie')) {
        return; // Если куки установлены, ничего не делаем
    }

    let block = document.querySelector('.cookies-block');
    let close = document.getElementById('accept-cookie');
    let height = block.offsetHeight;

    // Изначально скрываем блок за пределами экрана
    block.style.bottom = `-${height}px`;
    block.classList.add('show');

    // Анимация появления блока
    let showBlock = function() {
        let start = Date.now();
        let duration = 1000; // 1 секунда анимации
        let initialBottom = -height;
        let targetBottom = 0;

        function animate() {
            let elapsed = Date.now() - start;
            let progress = Math.min(elapsed / duration, 1);
            let newBottom = initialBottom + (targetBottom - initialBottom) * progress;
            block.style.bottom = `${newBottom}px`;

            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }
        animate();
    };
    showBlock();

    // Обработчик клика по кнопке "Принять"
    close.addEventListener('click', function(e) {
        e.preventDefault();

        // Отправка GET-запроса для установки куки
        fetch('/ajax/accept-cookie').then(function() {
            // Устанавливаем куки на клиентской стороне
            document.cookie = "acceptCookie=1; path=/; max-age=" + (60 * 60 * 24 * 365); // Куки на 1 год

            let start = Date.now();
            let duration = 1000; // 1 секунда анимации
            let initialBottom = 0;
            let targetBottom = -height;

            function animateHide() {
                let elapsed = Date.now() - start;
                let progress = Math.min(elapsed / duration, 1);
                let newBottom = initialBottom + (targetBottom - initialBottom) * progress;
                block.style.bottom = `${newBottom}px`;

                if (progress < 1) {
                    requestAnimationFrame(animateHide);
                } else {
                    block.classList.remove('show');
                }
            }
            animateHide();
        });
    });
}

cookies();
