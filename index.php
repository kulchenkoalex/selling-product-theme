<?php

get_header();
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
<?php else : ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>