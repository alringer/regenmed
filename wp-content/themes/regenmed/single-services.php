<?php
    add_filter( "the_excerpt", "add_class_to_excerpt" );

    function add_class_to_excerpt( $excerpt ) {
        return str_replace('<p', '<p class="rgn-services__subtitle"', $excerpt);
    }


    get_header();    
?>
    <section id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="rgn-services">
                <div class="rgn-services__header rgn-background-image" <?php if (has_post_thumbnail() ): ?>style="background-image:url('<?php echo the_post_thumbnail_url() ?>')"<?php endif; ?> >
                    <h1 class="rgn-services__title"><?php the_title() ?></h1>
                    <?php the_excerpt() ?>
                </div>
                <div class="rgn-services__categories-section">
                    <h2 class="rgn-services__categories-title"><?php echo get_post_meta( get_the_ID(), '_service_title_value_key', true ); ?></h2>
                    <p class="rgn-services__categories-description"><?php echo get_post_meta( get_the_ID(), '_service_description_value_key', true ); ?> </p>
                    <div class="rgn-services__categories-container">
                        <?php 
                        $posts = get_posts([
                            'post_type' => 'service-categories',
                            'post_status' => 'publish',
                            'numberposts' => 4,
                            'order'    => 'ASC'
                        ]);
                        foreach ($posts as $post):
                            setup_postdata( $post );
                            $id = get_the_ID();
                            $image = get_post_meta( get_the_ID(), '_service_category_alt_image_value_key', true );
                            ?>
                            <div class="rgn-services__category">
                                <?php if($image && $image["src"]){ ?> <img src="<?php echo $image["src"]; ?>" class="rgn-services__category-icon"> <?php } ?>
                                <h3 class="rgn-services__category-title"><?php the_title(); ?></h3>
                                <p class="rgn-services__category-description"><?php echo get_the_excerpt() ?></p>
                                <a class="rgn-services__category-read-more rgn-read-more-link rgn-read-more-link--white" href="<?php the_permalink(); ?>">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                            </div>
                        <?php endforeach; 
                        wp_reset_postdata();?>
                    </div>
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
    </main>
    </section>

<?php
    get_footer();