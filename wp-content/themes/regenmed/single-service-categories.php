<?php
    add_filter( "the_excerpt", "add_class_to_excerpt" );

    function add_class_to_excerpt( $excerpt ) {
        return str_replace('<p', '<p class="rgn-service-categories__subtitle"', $excerpt);
    }


    get_header();
?>
    <section id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="rgn-service-categories">
                    <div class="rgn-service-categories__header rgn-background-image" <?php if (has_post_thumbnail() ): ?>style="background-image:url('<?php echo the_post_thumbnail_url('full') ?>')"<?php endif; ?> >
                    <h1 class="rgn-service-categories__title"><?php the_title() ?></h1>
                    <?php the_excerpt() ?>
                </div>
                <div class="rgn-service-categories__categories-section">
                    <div class="rgn-service-categories__categories-description"><?php the_content(); ?> </div>
                </div>
                <div class="rgn-our-people">
                    <div class="rgn-our-people__card"></div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php else: ?>

            <!-- article -->
            <article>

                <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

            </article>
            <!-- /article -->

        <?php endif; ?>
        <?php                    
            include("includes/sections/our-work.php");

            include("includes/sections/microservices.php");
        ?>
    </main>
    </section>

<?php
    get_footer();