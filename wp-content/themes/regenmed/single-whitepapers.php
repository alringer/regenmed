<?php

get_header("light");
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            $post_att = get_post_meta( $post->ID, '_white_paper_attatchment_value_key', true );
        ?>
        <article class="rgn-white-paper">
            <div class="rgn-white-paper__banner"></div>
            <div class="rgn-white-paper__container">
                <header class="rgn-white-paper__header">
                    <h1 class="rgn-white-paper__title"><?php the_title() ?><h1>
                    <div class="rgn-white-paper__subtitle">
                        <p class="rgn-white-paper__author"><?php echo 'Published by '; the_author();?></p>
                        <p class="rgn-white-paper__author"><?php the_date();?></p>
                    </div>
                </header>
                <div class="rgn-white-paper__body">                    
                    <div class="rgn-white-paper__abstract">
                        <h3 class="rgn-white-paper__abstract__title">Abstract</h3>
                        <?php the_content();?>
                        <a class="rgn-white-paper__download rgn-button" href="<?php echo $post_att[0]["src"]; ?>"  target="_blank">DOWNLOAD WHITE PAPER</a>
                    </div>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
        <?php else: ?>
            <!-- article -->
            <article>
                <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
            </article>
            <!-- /article -->

        <?php endif; ?>
    </main>
</section>


<?php
get_footer();
