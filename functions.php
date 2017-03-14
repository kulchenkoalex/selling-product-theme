<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 07.03.2017
 * Time: 9:18
 */
//define( 'SELLING_PRODUCT_THEME_VERSION' , '1.0' );


    /*
     * get_template_directory_uri()
     * Получает URL текущей темы. Учитывает SSL. Не учитывает наличие дочерней темы. Не содержит закрывающий слэш.
     * https://wp-kama.ru/function/get_template_directory_uri
     */

if (! is_admin()){
function loadScriptSite()
{
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


}
add_action( 'after_setup_theme', 'loadScriptSite' );
}

function registerNavMenu() {
    register_nav_menu( 'primary', __('Primary Menu', SELLING_PRODUCT_THEME_TEXTDOMAIN) );
}
add_action( 'after_setup_theme', 'registerNavMenu',100 );

define("SELLING_PRODUCT_THEME_TEXTDOMAIN", 'selling-product-theme');


function themeLocalization(){
    load_theme_textdomain(SELLING_PRODUCT_THEME_TEXTDOMAIN, get_template_directory() . '/languages/');
}
add_action('after_setup_theme', 'themeLocalization');

add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header', array(
    'video' => true,
) );
add_theme_support( 'automatic-feed-links' );
add_theme_support('custom-logo');


add_action('admin_menu', 'addAdminMenu');
function addAdminMenu(){
    $mainMenuPage = add_menu_page(
        _x(
            'Selling Product theme',
            'admin menu page' ,
            SELLING_PRODUCT_THEME_TEXTDOMAIN
        ),
        _x(
            'Selling Product theme',
            'admin menu page' ,
            SELLING_PRODUCT_THEME_TEXTDOMAIN
        ),
        'manage_options',
        SELLING_PRODUCT_THEME_TEXTDOMAIN,
        'renderMainMenu',
        get_template_directory_uri() .'/images/main-menu.png',
        3
    );

     $subMenuPage = add_submenu_page(
            SELLING_PRODUCT_THEME_TEXTDOMAIN,
        _x(
            'Sub Selling Product theme',
            'admin menu page' ,
            SELLING_PRODUCT_THEME_TEXTDOMAIN
        ),
        _x(
            'Sub Selling Product theme',
            'admin menu page' ,
            SELLING_PRODUCT_THEME_TEXTDOMAIN
        ),
        'manage_options',
        'selling_product_theme_control_sub_menu',
        'renderSubMenu'
        );

      $themeMenuPage = add_theme_page(
        __('Sub theme Selling Product', SELLING_PRODUCT_THEME_TEXTDOMAIN),
        __('Sub theme Selling Product', SELLING_PRODUCT_THEME_TEXTDOMAIN),
        'read',
        'selling_product_theme_control_sub_theme_menu',
        'renderThemeMenu'
    );
}

function renderMainMenu(){
    _e('Selling Product theme page', SELLING_PRODUCT_THEME_TEXTDOMAIN);
}

function renderSubMenu(){
    _e('Sub Selling Product theme page', SELLING_PRODUCT_THEME_TEXTDOMAIN);
}

function renderThemeMenu(){
    _e('Sub theme Selling Product', SELLING_PRODUCT_THEME_TEXTDOMAIN);
}

function register_my_widgets(){
    register_sidebar( array(
        'name' => "Правая боковая панель сайта",
        'id' => 'right-sidebar',
        'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => "</li>\n",
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ) );
}
add_action( 'widgets_init', 'register_my_widgets' );

function true_remove_default_widget() {
    unregister_widget('WP_Widget_Archives'); // Архивы
    //unregister_widget('WP_Widget_Calendar'); // Календарь
    //unregister_widget('WP_Widget_Categories'); // Рубрики
    unregister_widget('WP_Widget_Meta'); // Мета
    //unregister_widget('WP_Widget_Pages'); // Страницы
    //unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
    //unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
    //unregister_widget('WP_Widget_RSS'); // RSS
    //unregister_widget('WP_Widget_Search'); // Поиск
    unregister_widget('WP_Widget_Tag_Cloud'); // Облако меток
    //unregister_widget('WP_Widget_Text'); // Текст
    //unregister_widget('WP_Nav_Menu_Widget'); // Произвольное меню
}
 
add_action( 'widgets_init', 'true_remove_default_widget', 20 );

require get_template_directory().'/widgets/SellingProductWidget.php';
add_action('widgets_init', create_function('', 'return register_widget("widgets\SellingProductWidget");'));

add_action('customize_register','my_customize_register');
function my_customize_register( $wp_customize ) {
 /* $wp_customize->add_panel();
  $wp_customize->get_panel();
  $wp_customize->remove_panel();
 
  $wp_customize->add_section();
  $wp_customize->get_section();
  $wp_customize->remove_section();
 
  $wp_customize->add_setting();
  $wp_customize->get_setting();
  $wp_customize->remove_setting();
 
  $wp_customize->add_control();
  $wp_customize->get_control();
  $wp_customize->remove_control();*/


   // Section
    $wp_customize->add_section('selling_product_my_section', array(
        'title' => __('My section sellingproduct', SELLING_PRODUCT_THEME_TEXTDOMAIN),
        'priority' => 10,
        'description' => __('My section description', SELLING_PRODUCT_THEME_TEXTDOMAIN),
    ));
    // Setting
    $wp_customize->add_setting("selling_product_my_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "selling_product_my_settings",
        array(
            "label" => __("Title", SELLING_PRODUCT_THEME_TEXTDOMAIN),
            "section" => "selling_product_my_section",
            "settings" => "selling_product_my_settings",
            "type" => "input",
        )
    ));
    // Setting
    $wp_customize->add_setting("selling_product_my_test_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control( 'selling_product_my_test_settings', array(
        'label'       => __("Description", SELLING_PRODUCT_THEME_TEXTDOMAIN),
        'section'     => 'selling_product_my_section',
        'type'        => 'textarea',
    ) );
    // Setting
    $wp_customize->add_setting("selling_product_my_img_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'selling_product_my_img_settings',
            array(
                'label'      => __( 'Upload a logo', SELLING_PRODUCT_THEME_TEXTDOMAIN),
                'section'    => 'selling_product_my_section',
                'settings'   => 'selling_product_my_img_settings',
            )
        )
    );
    // Setting
    $wp_customize->add_setting("selling_product_my_upload_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'selling_product_my_upload_settings',
            array(
                'label'      => __( 'Upload', SELLING_PRODUCT_THEME_TEXTDOMAIN),
                'section'    => 'selling_product_my_section',
                'settings'   => 'selling_product_my_upload_settings'
            )
        )
    );
}