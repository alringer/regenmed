<?php 
    global $wp;
    if($wp->request===""){
        $post_slug = "homepage";
    }else{
        $post_slug = $post->post_name;
    }

    $posts = get_posts([
        'post_type'     => 'case-studies',
        'post_status'   => 'publish',
        'numberposts'   => 3,
        'order'         => 'ASC',
        'orderby'       => 'menu_order',
        'tax_query' => array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'slug',
                'terms'    => $post_slug,
            ),
        ),
    ]);
?>

<section class="rgn-our-work">
    <h1 class="rgn-section-title">
        <?php 
            echo get_theme_mod('our_work_title','Our Work');
        ?>
    </h1>
    
    <div class="rgn-our-work__body">
        <div class="rgn-our-work__body__image-container rgn-appear-animation">
            <?php foreach ($posts as $key=>$post):
                setup_postdata( $post );
                $id = get_the_ID();
                $img = get_post_meta( $id, '_case_study_alt_image_value_key', true );
            ?>
            
            <?php if($img && $img[0] && $img[0]['src']){?> 
                <img src="<?php echo $img[0]['src'] ?>" class="rgn-our-work__body__image rgn-our-work__body__image--<?php echo $key+1; if($key==0){?> rgn-our-work__body__image--active<?php } ?>">
            <?php } ?>
            <?php endforeach; ?> 
        </div>
        <div class="rgn-our-work__body__info rgn-appear-animation">
            <div id="ourWorkSlides" class="rgn-our-work__body__info__slides">
                <?php foreach ($posts as $key=>$post):
                    setup_postdata( $post );
                    $id = get_the_ID();
                    $headline = get_post_meta( $id, '_case_study_headline_value_key', true );
                ?>
                <div class="rgn-our-work__body__info__slide rgn-our-work__body__info__slide--active">
                    <h2 class="rgn-our-work__body__info__title">
                        <?php 
                            the_title();
                        ?>
                    </h2>
                    <h3 class="rgn-our-work__body__info__subtitle">
                        <?php 
                            echo get_theme_mod('our_work_slide1_subtitle','Overview');
                        ?>
                    </h3>
                    <p class="rgn-our-work__body__info__description">
                        <?php 
                            echo $headline;
                        ?>
                    </p>
                    <a href="<?php the_permalink() ?>" class="rgn-our-work__body__info__action rgn-button--blue">
                        READ CASE STUDY
                    </a>
                </div>
                <?php endforeach; ?> 
            </div>
            <div class="rgn-our-work__body__info__pagination">
                <?php
                    if (count($posts)>1):
                        foreach ($posts as $key=>$post):
                            setup_postdata( $post );
                            $id = get_the_ID();
                            $headline = get_post_meta( $id, '_case_study_headline_value_key', true );
                ?>
                <button class="rgn-our-work__body__info__pagination__page <?php if($key==0){echo 'rgn-our-work__body__info__pagination__page--active';} ?>" data-page="<?php echo $key + 1;  ?>"></button>                
                <?php 
                        endforeach;
                    endif;?> 
            </div>
        </div>
    </div>
</section>
<?php wp_reset_postdata();
