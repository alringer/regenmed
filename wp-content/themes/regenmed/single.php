<?php

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="rgn-blog">
            <div class="rgn-blog__banner"></div>
            <div class="rgn-blog__container">
                <header class="rgn-blog__header">
                    <h1 class="rgn-blog__title"><?php the_title() ?><h1>
                    <p class="rgn-blog__author"><?php echo 'Published by '; the_author(); echo ' - '; the_date();?></p>
                </header>
                <div class="rgn-blog__body">                    
                    <div class="rgn-blog__summary">
                        <h3 class="rgn-blog__summary__title">Summary</h3>
                        <?php the_excerpt();?>
                    </div>
                    <div class="rgn-blog__content"><?php the_content();?></div>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
        <?php else: ?>
            <!-- article -->
            <article>
                <h1><?php _e( 'Sorry, nothing to displayHEHE.', 'html5blank' ); ?></h1>
            </article>
            <!-- /article -->

        <?php endif; ?>
    </main>
</section>


<?php
get_footer();
