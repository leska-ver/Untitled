## Макет на текущий проект:  
  👉 [Untitled (МиграПро)](https://www.figma.com/design/Iz83np8esGtKdObCq3iYLS/Untitled--Copy-?node-id=0-1&t=RwynetmprBDW7GcE-1) — Задание из hh.ru.
  
---

## 🔗 Ссылка на текущий проект
* **Основная (для портфолио и клиентов):**  
  - https://cc50985-wordpress-mpooh.tw1.ru/  

* **Резервная (вечная, бесплатная):**  
  - https://leska-ver.github.io/Untitled/
---

## 🚀 Технологии

- HTML5, CSS3, JavaScript
- WordPress (кастомная тема)
- PHP (ACF, кастомный Walker)

---

## 📸 Скриншот

![Сайт МиграПро](https://github.com/leska-ver/Untitled/blob/main/desktop-1800.png)

## 🧩 Что сделано в WordPress

1. **Создана кастомная тема `migrapro-theme`** — с нуля, без готовых шаблонов.
2. **Подключены стили и скрипты** через `functions.php`:
   - `style.css` (главный файл стилей)
   - `normalize.css` (дополнительно через папку `css/`)
   - `scripts.js` (JS-скрипты для бургера, дропдауна, якорей)
3. **Настроено меню**:
   - Зарегистрировано через `register_nav_menus()`
   - Выводится через `wp_nav_menu()` в `header.php`
   - Добавлен **кастомный Walker** для вывода описания под пунктами подменю (`header__dropdown-desc`)
4. **Заменены стандартные классы WordPress** на свои (через фильтры `nav_menu_css_class`, `nav_menu_submenu_css_class`, `nav_menu_link_attributes`), чтобы стили работали как в обычной вёрстке.
5. **Подменю "Услуги"**:
   - Превращено из ссылки в кнопку (через JS)
   - Открывается по клику с анимацией (scale + opacity)
   - Закрывается при клике вне меню
6. **Бургер-меню**:
   - Появляется на мобильных устройствах
   - Открывает/закрывает меню по клику
   - Анимированное превращение в крестик
7. **Плавный скролл** по якорным ссылкам (`#knowledge-base`, `#reviews`, `#contacts`)
8. **ACF не использовался** — для простоты контент статичный, но структура темы готова к его подключению.

## В wordpress почему style.css не в папке css
Когда WordPress загружает тему, он в первую очередь смотрит в корень папки темы и ищет файл style.css. Именно этот файл содержит шапку темы — название, автора, описание, версию. Без этой шапки WordPress не видит тему в админке, и ты не сможешь её активировать.

Если ты положишь style.css в папку css/, WordPress просто не найдёт его, и тема не появится в списке.

# 🗂️ Структура файлов темы `migrapro-theme`

| Файл/папка          | Где лежит        | Почему                                                                 |
|---------------------|------------------|------------------------------------------------------------------------|
| `style.css`         | В корне темы     | **Обязательно!** WordPress ищет шапку темы (название, автор) именно здесь |
| `normalize.css`     | В папке `css/`   | Не обязателен для WP, подключается через `functions.php`               |
| `scripts.js`        | В папке `js/`    | Подключается через `functions.php`                                     |
| `header.php`        | В корне темы     | Шаблон шапки — WP должен видеть его в корне                            |
| `footer.php`        | В корне темы     | Шаблон подвала — тоже должен быть в корне                              |
| `page-home.php`     | В корне темы     | Шаблон главной страницы                                                |
| `functions.php`     | В корне темы     | Файл настроек темы — обязателен в корне                                |
| `index.php`         | В корне темы     | Запасной шаблон, если нет других                                       |
| `img/`              | В корне темы     | Папка с картинками                                                     |
| `fonts/`            | В корне темы     | Папка со шрифтами                                                      |

---

### 📌 Важно:

- `style.css` **всегда** должен лежать в **корне папки темы**, иначе WordPress не увидит тему.
- Все остальные CSS-файлы (`normalize.css`, `доп.стили`) можно класть в папку `css/` и подключать через `functions.php`.

## В wordpress заменил класс .header__dropdown на свой sub-menu
```css
/* -- В wordpress заменил классы на свои -- */
.sub-menu {/*.header__dropdown*/
    position: absolute;
    top: 78px;
    left: -12px;
    padding: 16px 0 20px;
    border-radius: 20px;
    width: 343px;
    background-color: var(--color-white);
    transform: scale(0.9) translateY(-10px);
    opacity: 0;
    transform-origin: top right;
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
    z-index: 20;
    pointer-events: none;
}
.sub-menu.active-list--item {
    display: block;
    transform: scale(1) translateY(0);
    opacity: 1;
    pointer-events: auto;
}
/* Иконка-стрелка для "Все услуги и цены" *//* Иконка-стрелка для "Все услуги и цены" (седьмой пункт) */
.sub-menu .header__dropdown-item:nth-child(7) .header__dropdown-link::after {
    content: "";
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-left: 8px;
    background: center / contain no-repeat;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10.8995 9.40078L10.8995 0.999993L2.37751 1.00011M10.8995 0.999993L1.00001 10.8995' stroke='%231A4FB0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    transition: all .3s ease;
}

/* При фокусе (в wordpress лучше использовать его - focus-visible) — красный (цвет из переменной --color-monza) */
.sub-menu .header__dropdown-item:nth-child(7) .header__dropdown-link:focus-visible::after {
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10.8995 9.40078L10.8995 0.999993L2.37751 1.00011M10.8995 0.999993L1.00001 10.8995' stroke='%23cc0a0a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
}

/* При наведении (hover) — серый */
.sub-menu .header__dropdown-item:nth-child(7) .header__dropdown-link:hover::after {
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10.8995 9.40078L10.8995 0.999993L2.37751 1.00011M10.8995 0.999993L1.00001 10.8995' stroke='gray' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
}
/* -- // В wordpress заменил классы на свои -- */
```

### Классы подменю (functions.php)

```php
// ====== ДОБАВЛЯЕМ СВОЙ КЛАСС К ПОДМЕНЮ ======
add_filter( 'nav_menu_submenu_css_class', 'migrapro_submenu_classes', 10, 3 );
function migrapro_submenu_classes( $classes, $args, $depth ) {
    $classes[] = 'header__dropdown_js';
    return $classes;
}
```