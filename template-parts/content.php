<?php

$images = get_posts( array("numberposts"=>-1,"post_type"=>"attachment","post_mime_type"=>"image","orderby" => "menu_order", "order" => "ASC","post_parent"=>$post->ID) );
$has_img = 'post-no-img';
if ( has_post_thumbnail() ) {
    $has_img = '';
} ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $has_img . ' blog-post-side-layout' ); ?>>

    <?php
    if ( get_theme_mod( 'selling-product-blog-list-image-type' ) == 'blog-use-images-loop' ) : ?>
        <div class="post-loop-images">

            <div class="post-loop-images-carousel-wrapper post-loop-images-carousel-wrapper-remove">
                <div class="post-loop-images-prev"><i class="fa fa-angle-left"></i></div>
                <div class="post-loop-images-next"><i class="fa fa-angle-right"></i></div>

                <div class="post-loop-images-carousel post-loop-images-carousel-remove">

                    <?php
                    foreach ( $images as $image ) {
                        $title = $image->post_title;
                        $thumbimage = wp_get_attachment_image_src( $image->ID, 'topshop_blog_img_side' ); ?>
                        <div><img src="<?php echo $thumbimage[0]; ?>" alt="<?php echo esc_html( $title ) ?>" /></div>
                    <?php
                    } ?>

                </div>
            </div>

        </div>
    <?php else : ?>
        <div class="post-loop-images">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'selling_product_blog_img_side' ); ?>
        </div>
    <?php endif; ?>

    <div class="post-loop-content">

    	<header class="entry-header">
    		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    		<?php if ( 'post' == get_post_type() ) : ?>
    		<!--<div class="entry-meta">-->
              <?php /*selling_product_posted_on(); */?>
                <!--</div><!-- .entry-meta -->
    		<?php endif; ?>
    	</header><!-- .entry-header -->

    	<div class="entry-content">
    		<?php
            if ( has_excerpt() ) :
                the_excerpt();
            else :
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'selling-product' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            endif; ?>

    		<?php
    			wp_link_pages( array(
    				'before' => '<div class="page-links">' . __( 'Pages:', 'selling-product' ),
    				'after'  => '</div>',
    			) );
    		?>
    	</div><!-- .entry-content -->

    	<footer class="entry-footer">
            <div class="entry-meta">

                <span class="post-date">
                    <i class="fa fa-clock-o fa-fw"></i>
                    <span class="updated">
                        <?php the_date(); ?>
                    </span>
                </span> <!-- .post-date -->

                <span class="post-author">
                    <i class="fa fa-user fa-fw"></i>
                    <span class="vcard">
                        <a class="fn url" href="<?php the_author_link(); ?>">
                            <?php the_author(); ?>
                        </a>
                    </span>
                </span> <!-- .post-author -->

                <span class="post-categories">
                    <i class="fa fa-folder fa-fw"></i>
                    <?php the_category(' ');?>
                </span> <!-- .post-categories -->

                <span class="post-tags">
                    <i class="fa fa-tags fa-fw"></i>
                    <?php the_tags('', ' ', ''); ?>
                </span> <!-- .post-tags -->

            </div> <!-- .entry-meta -->
    	</footer><!-- .entry-footer -->

    </div>

    <div class="clearboth"></div>
</article><!-- #post-## -->