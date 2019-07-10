<?php
$max_chars = 75;

get_header();
?>

<main id="main" role="main" class="site-main rgn-case-study">
    <?php 
    if ( have_posts() ) : while ( have_posts() ) : the_post();  
        $excerpt =  get_the_excerpt();
        $headline = get_post_meta( $post->ID, '_case_study_headline_value_key', true );
        $background = get_post_meta( $post->ID, '_case_study_background_value_key', true );
        $conclusion = get_post_meta( $post->ID, '_case_study_conclusion_value_key', true );
        $references = get_post_meta( $post->ID, '_case_study_references_value_key', true );
    ?>
        <div class="rgn-case-study__banner rgn-background-image" <?php if (has_post_thumbnail() ): ?>style="background-image:url('<?php echo the_post_thumbnail_url('full') ?>')"<?php endif; ?> >
            <div class="rgn-case-study__scrim"></div>
        </div>
        <article class="rgn-case-study__body">
            <header class="rgn-case-study__header">
                <h1><?php the_title(); ?></h1>
                <p class="rgn-case-study__headline">
                    <?php 
                    if (strlen($excerpt) >= $max_chars)
                        echo substr($excerpt , 0, $max_chars). "...";
                    else
                        echo $excerpt;
                    ?>
                </p>
            </header>
            <section class="rgn-case-study__summary">
                <?php echo $headline; ?>
            </section>
            <section class="rgn-case-study__background">
                <h3 class="rgn-case-study__heading">Background</h3>
                <p class="rgn-case-study__background-text"><?php echo $background ?></p>
            </section>

            <section class="rgn-case-study__content">
                <?php the_content(); ?>
            </section>

            <section class="rgn-case-study__references">
                <div class="rgn-case-study__references-inner">
                    <h3 class="rgn-case-study__heading">References</h3>
                    <p class="rgn-case-study__references-text"><?php echo $references ?></p>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
    <?php else: ?>
        <article>
            <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
        </article>
    <?php endif; ?>
</main>

<?php
get_footer();