<?php
/**
 * Created by PhpStorm.
 * User: Сервис
 * Date: 07.03.2017
 * Time: 14:27
 */
?>
<?php

get_header();
?>
    <main id="content" role="main">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="three-quarters-block">

                        <h2 class="entry-title" itemprop="headline">Знакомство с WP_Query</h2>
                        <br/>
                        <?php
                        $query = new WP_Query( array( 'category_name' => 'news' ) );
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            the_title(); // выведем заголовок поста
                        }
                        wp_reset_postdata()
                        ?>
                        <br/>

                        <?php
                        $my_posts = new WP_Query;
                        $myposts = $my_posts->query( array(
                            'post_type' => 'page'
                        ) );
                        foreach( $myposts as $pst ){
                            echo $pst->post_title.'<br/>';
                        }
                        wp_reset_postdata()
                        ?>

                        <hr/>
                    </div>

                    <?php

                    get_sidebar();
                    ?>

                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .section -->


    </main> <!-- #content -->


<?php

get_footer();
?>