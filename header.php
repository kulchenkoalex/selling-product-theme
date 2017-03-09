<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--
    wp_head() WP Запускает хук-событие wp_head. Вызывается в шапке сайта в файле: header.php
     https://wp-kama.ru/function/wp_head
     -->
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div id="page">
    <header id="masthead" class="site-header border-bottom topshop-header-layout-standard" role="banner">

        <?php get_template_part( '/templates/header/header-layout-standard' ); ?>

    </header><!-- #masthead -->

    <?php if ( is_front_page() ) : ?>

        <?php get_template_part( '/templates/slider/homepage-slider' ); ?>

    <?php endif; ?>

    <div id="content" class="site-content site-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?>">


<?php
$args = array(
    'theme_location' => 'primary',        // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
    'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
    // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
    'container'       => 'nav',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
    'container_class' => '',              // (string) class контейнера (div тега)
    'container_id'    => 'main-menu',              // (string) id контейнера (div тега)
    'menu_class'      => 'horizontal-navigation',          // (string) class самого меню (ul тега)
    'menu_id'         => '',              // (string) id самого меню (ul тега)
    'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
    'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
    //'before'          => '',              // (string) Текст перед <a> каждой ссылки
    //'after'           => '',              // (string) Текст после </a> каждой ссылки
    //'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
    //'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
    //'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
    //'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu

);
wp_nav_menu($args);
?>