<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 02.03.2017
 * Time: 13:05
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
} ?>

<div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->