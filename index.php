<?php

if ( is_home() ){
    get_header('home');
}
elseif ( is_404() ) {
    get_header('404');
}
else {
    get_header();
}

?>

<?php if ( have_posts() ) : ?>
    <?php /* начинается цикл */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
        //Предназначена для поиска и подключения разных частей темы. Похожа на PHP функцию include(),
        // только тут не нужно указывать путь до темы.
        get_template_part( 'template-parts/content', get_post_format() );
        ?>
    <?php endwhile; ?>
    <?php 
the_posts_pagination( array(
    'mid_size' => 2,
) ); 
?>
<?php else : ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>

<?php get_sidebar(); ?>

<?php

if ( is_home() ) :
    get_footer('home');
elseif ( is_404() ) :
    get_footer('404');
else :
    get_footer();
endif;
?>
