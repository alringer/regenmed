<?php
function get_post_type_text($type){
    return ($type == 'whitepapers' ? 'WHITE PAPERS' : 'BLOG');
}

$max_chars = 100;
$max_chars_card = 60;

$args = array(
    'post_type' => 'post',
    'orderby' => 'date',
);
$query = new WP_Query( $args );
get_header();
?>
<main id="main" class="site-main rgn-literature-page">
    <section class="rgn-literature-page__banner">
        <?php 
        if( $query->have_posts() ) : $query->the_post();
        $post_id = get_the_ID();
        $post_type = get_post_type();
        $post_excerpt = get_the_excerpt();
        ?>
        <article class="rgn-literature-page__featured-post rgn-background-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($post_id)?>')">
            <div class="rgn-literature-page__featured-post__scrim"></div>
            <div class="rgn-literature-page__featured-post__info">
                <!-- <div class="rgn-literature-page__featured-post__type"> -->
                    <?php //echo get_post_type_text($post_type); ?>
                <!-- </div> -->
                <div class="rgn-literature-page__featured-post__title">
                    <a href="<?php echo get_post_permalink($post_id); ?>"><?php the_title() ?></a>
                </div>
                <div class="rgn-literature-page__featured-post__description">
                    <?php
                    if ( strlen($post_excerpt) >= $max_chars )
                        echo substr($post_excerpt , 0, $max_chars). "...";
                    else
                        echo $post_excerpt;
                    ?>
                </div>
                <a class="rgn-literature-page__read-more rgn-read-more-link rgn-read-more-link--white" href="<?php echo get_post_permalink($post_id); ?>">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
            </div>
        </article>
        <?php endif;?>
    </section>
    <nav class="rgn-literature-page__nav">
        <ul class="rgn-literature-page__nav__list">
            <li class="rgn-literature-page__nav__list__item">
                <a href="<?php echo get_site_url() ?>/literature">All</a>
            </li>
            <li class="rgn-literature-page__nav__list__item active">
                <a href="<?php echo get_site_url() ?>/blog">Blog</a>
            </li>
            <li class="rgn-literature-page__nav__list__item">
                <a href="<?php echo get_site_url() ?>/whitepapers">White Papers</a>
            </li>
        </ul>
        <div id="rgnListIndicator" class="rgn-literature-page__nav__list__indicator"></div>
    </nav>
    <section class="rgn-literature-page__cards">
        <div  class="rgn-literature-page__cards__inner" id="cardsContainer">
        <?php
        if( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
        $post_id = get_the_ID();
        $post_type = get_post_type();
        $post_excerpt = get_the_excerpt();
        ?>
            <article class="rgn-literature-page__card">
                <div class="rgn-literature-page__card__image rgn-background-image" style="background-image:url('<?php echo get_the_post_thumbnail_url($post_id)?>')"></div>
                <div class="rgn-literature-page__card__info">
                    <div class="rgn-literature-page__card__type">
                        <?php echo get_post_type_text($post_type); ?>
                    </div>
                    <div class="rgn-literature-page__card__title">
                        <p><?php the_title() ?></p>
                    </div>
                    <div class="rgn-literature-page__card__description">
                        <?php
                        if ( strlen($post_excerpt) >= $max_chars_card )
                            echo substr($post_excerpt , 0, $max_chars_card). "...";
                        else
                            echo $post_excerpt;
                        ?>
                    </div>
                    <a class="rgn-literature-page__card__read-more rgn-read-more-link" href="<?php echo get_post_permalink($post_id); ?>">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                </div>
            </article>
        <?php
        endwhile;
        endif;
        wp_reset_query();  // Restore global post data stomped by the_post().
        ?>
        </div>
    </section>
    <div class="rgn-literature-page__bottom">
        <?php $count = $query->found_posts; ?>
        <?php if ($count): ?> 
            <button id="rgnLiteratureViewMore" class="rgn-literature-page__view-more" data-posttype="post" <?php if( $count < $query->max_num_pages) echo 'disabled'?>> VIEW MORE</button>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); 