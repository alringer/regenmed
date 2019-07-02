<?php
// $current_page = get_queried_object();
// $title      = apply_filters( 'the_title', $current_page->post_title );
// $content      = apply_filters( 'the_content', $current_page->post_content );

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="rgn-bio">
            <div class="rgn-bio__banner"></div>
            <div class="rgn-bio__body">
                <div class="rgn-bio__left">
                    <div class="rgn-bio__image rgn-background-image" <?php if (has_post_thumbnail() ): ?>style="background-image:url('<?php echo the_post_thumbnail_url() ?>')"<?php endif; ?>></div>
                    <h1 class="rgn-bio__name"><?php the_title() ?></h1>
                    <div class="rgn-bio__job">
                        <p class="rgn-bio__position"><?php echo get_post_meta( get_the_ID(), '_bio_position_value_key', true ); ?></p>
                        <p class="rgn-bio__company"><?php echo get_post_meta( get_the_ID(), '_bio_company_value_key', true ); ?></p>
                    </div>
                    <h2 class="rgn-bio__field-name">Education</h2>
                    <div class="rgn-bio__field-value rgn-bio__education">
                        <?php
                            $education = get_post_meta(get_the_ID(), '_bio_education_value_key' , true );
                            $education = htmlspecialchars_decode($education);
                            $education = wpautop( $education );
                            echo $education;
                            // echo $education;
                        ?>
                    </div>
                    <h2 class="rgn-bio__field-name">Publications</h2>
                    <div class="rgn-bio__field-value rgn-bio__links">
                        <?php
                            $links = get_post_meta(get_the_ID(), '_bio_links_value_key' , true );
                            $links = htmlspecialchars_decode($links);
                            $links = wpautop( $links );
                            echo $links;
                        ?>
                    </div>
                </div>
                <div class="rgn-bio__right rgn-bio__field-value">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
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
