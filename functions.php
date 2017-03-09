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

function registerNavMenu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'registerNavMenu' );
