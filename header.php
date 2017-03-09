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


        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>