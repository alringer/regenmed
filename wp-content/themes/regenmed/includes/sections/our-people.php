<section class="rgn-our-people">
    <h1 class="rgn-section-title">
        <?php 
            echo get_theme_mod('our_people_title','Our People');
        ?>
    </h1>
    <div class="rgn-our-people__body">
        <?php 
        $posts = get_posts([
            'post_type' => 'bios',
            'post_status' => 'publish',
            'numberposts' => 6,
            'order'    => 'ASC'
        ]);
        foreach ($posts as $post):
            setup_postdata( $post );
            $id = get_the_ID();
            $position = get_post_meta( $id, '_bio_position_value_key', true );
            $company = get_post_meta( $id, '_bio_company_value_key', true );
            ?>
            <article class="rgn-our-people__card">
                <div class="rgn-our-people__card__image rgn-background-image" <?php if (has_post_thumbnail() ): ?>style="background-image:url('<?php echo the_post_thumbnail_url() ?>')"<?php endif; ?>></div>
                <div class="rgn-our-people__card__info">
                    <h4 class="rgn-our-people__card__name"><?php the_title(); ?></h3></h4>
                    <p class="rgn-our-people__card__position"><?php echo $position ?></p>
                    <p class="rgn-our-people__card__company"><?php echo $company ?></p>
                    <p class="rgn-our-people__card__description"><?php echo get_the_excerpt() ?></p>
                    <a class="rgn-our-people__card__read-more rgn-read-more-link" href="<?php the_permalink(); ?>">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                </div>
            </article>
        <?php endforeach; ?> 
    </div>
</section>
