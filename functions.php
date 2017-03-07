<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 07.03.2017
 * Time: 9:18
 */
define( 'SELLING_PRODUCT_THEME_VERSION' , '1.0' );


    /*
     * get_template_directory_uri()
     * Получает URL текущей темы. Учитывает SSL. Не учитывает наличие дочерней темы. Не содержит закрывающий слэш.
     * https://wp-kama.ru/function/get_template_directory_uri
     */

    $version = null;

    wp_register_style(
        'SellingProduct-core', //$handle
        get_template_directory_uri() . '/css/core.css', // $src
        array(), //$deps,
        $version // $ver
    );
    wp_register_style(
        'SellingProduct-skins', //$handle
        get_template_directory_uri() . '/css/skins/red.css', // $src
        array(), //$deps,
        $version // $ver
    );

    wp_enqueue_style('SellingProduct-core');
    wp_enqueue_style('SellingProduct-skins');



if ( ! function_exists( 'selling_product_theme_setup' ) ) :

    function selling_product_theme_setup() {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 640; /* pixels */
        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on selling_product, use a find and replace
         * to change 'selling_product' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'selling_product', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'selling_product_blog_img_side', 352, 230, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'selling_product' ),
            'top-bar' => __( 'Top Bar Menu', 'selling_product' )
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        // The custom header is used for the logo
        add_theme_support( 'custom-header', array(
            'default-image' => '',
            'width'         => 280,
            'height'        => 91,
            'flex-width'    => true,
            'flex-height'   => true,
            'header-text'   => false,
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'selling_product_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_theme_support( 'title-tag' );

    }
endif; // selling_product_theme_setup
add_action( 'after_setup_theme', 'selling_product_theme_setup' );