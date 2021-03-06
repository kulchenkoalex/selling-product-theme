<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package topshop
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'selling-product' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'selling-product' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>
        
            <p><?php echo wp_kses_post( get_theme_mod( 'selling-product-website-nosearch-msg', 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ) ) ?></p>

		<?php else : ?>

			<p><?php echo wp_kses_post( get_theme_mod( 'selling-product-website-nosearch-msg', 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ) ) ?></p>

		<?php endif; ?>
        
	</div><!-- .page-content -->
    <div class="clearboth"></div>
    
    <div class="button no-results-btn search-btn"><?php _e( 'Search Again', 'selling-product' ); ?></div>
    
</section><!-- .no-results -->
