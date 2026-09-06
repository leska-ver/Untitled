document.addEventListener('DOMContentLoaded', function() {
    // ======== БУРГЕР ========
    const burger = document.querySelector('#burger');
    const menu = document.querySelector('#menu');
    if (burger && menu) {
        burger.addEventListener('click', function() {
            this.classList.toggle('open');
            menu.classList.toggle('is-active');
        });
    }

    // ======== ДРОПДАУН "УСЛУГИ" ========
    // Превращаем ссылку "Услуги" в кнопку вордпресса
    document.querySelectorAll('.menu-item > a, .header__item > a').forEach(function(link) {
        if (link.textContent.trim() === 'Услуги') {
            let parent = link.parentElement;
            let subMenu = parent.querySelector('.header__dropdown_js, .sub-menu');
            if (subMenu) {
                let button = document.createElement('button');
                button.className = 'header__btn header__btn_after header__btn_js';
                // Оборачиваем текст в span, чтобы CSS-стили текста не слетали!
                button.innerHTML = '<span class="header__item-heading">Услуги</span>';
                link.replaceWith(button);
            }
        }
    });

    // Обработка клика
    document.addEventListener('click', function(e) {
        let btn = e.target.closest('.header__btn_js');
        
        if (btn) {
            e.preventDefault();
            e.stopPropagation();

            let parentLi = btn.closest('.header__item') || btn.closest('.menu-item');
            if (!parentLi) return;

            let dropdown = parentLi.querySelector('.header__dropdown_js, .sub-menu');
            if (!dropdown) return;

            // Закрываем другие дропдауны
            document.querySelectorAll('.header__dropdown_js, .sub-menu').forEach(function(el) {
                if (el !== dropdown) {
                    el.classList.remove('active-list--item');
                }
            });
            document.querySelectorAll('.header__btn_js').forEach(function(el) {
                if (el !== btn) {
                    el.classList.remove('active--btn');
                }
            });

            // Переключаем активные классы
            dropdown.classList.toggle('active-list--item');
            btn.classList.toggle('active--btn');
        } else {
            // Закрыть при клике в любое другое место страницы
            if (!e.target.closest('.header__list_js') && !e.target.closest('[class*="-container"]')) {
                document.querySelectorAll('.header__dropdown_js, .sub-menu').forEach(function(el) {
                    el.classList.remove('active-list--item');
                });
                document.querySelectorAll('.header__btn_js').forEach(function(el) {
                    el.classList.remove('active--btn');
                });
            }
        }
    });

    // ======== ПЛАВНЫЙ СКРОЛЛ ========
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            let href = this.getAttribute('href');
            if (href && href.startsWith('#') && href !== '#') {
                e.preventDefault();
                let target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
});
