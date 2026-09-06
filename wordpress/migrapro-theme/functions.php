<?php
// ====== ПОДКЛЮЧАЕМ СТИЛИ И СКРИПТЫ ======
add_action('wp_enqueue_scripts', 'migrapro_assets');
function migrapro_assets() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('migrapro-style', get_stylesheet_uri());
    wp_enqueue_script('migrapro-script', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true);
}

// ====== РЕГИСТРИРУЕМ МЕНЮ ======
register_nav_menus( array(
    'primary' => 'Главное меню',
) );

// ====== ДОБАВЛЯЕМ СВОЙ КЛАСС К ПОДМЕНЮ ======
add_filter( 'nav_menu_submenu_css_class', 'migrapro_submenu_classes', 10, 3 );
function migrapro_submenu_classes( $classes, $args, $depth ) {
    $classes[] = 'header__dropdown_js';
    return $classes;
}

// ====== КАСТОМНЫЙ WALKER ======
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';

        if (!empty($item->description)) {
            $item_output .= '<p class="header__dropdown-desc desc">' . $item->description . '</p>';
        }

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

// ====== ДОБАВЛЯЕМ СВОЙ КЛАСС ПУНКТАМ МЕНЮ ======
add_filter('nav_menu_css_class', 'migrapro_menu_classes', 10, 2);
function migrapro_menu_classes($classes, $item) {
    $new_classes = array('header__item');
    if (in_array('menu-item-has-children', $item->classes)) {
        $new_classes[] = 'header__item_js';
    }
    return $new_classes;
}

// ====== ДОБАВЛЯЕМ КЛАСС К подменю Услуги К ССЫЛКАМ <a> ======
add_filter('nav_menu_link_attributes', 'migrapro_menu_link_classes', 10, 3);
function migrapro_menu_link_classes($atts, $item, $args) {
    if ($item->menu_item_parent != 0) { // если это пункт подменю
        $atts['class'] = 'header__dropdown-link';
    }
    return $atts;
}

// ====== ДОБАВЛЯЕМ КЛАСС К ПУНКТАМ ПОДМЕНЮ <li> ======
add_filter('nav_menu_css_class', 'migrapro_submenu_item_classes', 10, 2);
function migrapro_submenu_item_classes($classes, $item) {
    if ($item->menu_item_parent != 0) {
        $classes = array('header__dropdown-item');
    }
    return $classes;
}

?>