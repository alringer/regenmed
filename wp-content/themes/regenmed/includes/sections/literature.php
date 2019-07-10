<?php
$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
// This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

$menuID = $menuLocations['extra-menu']; // Get the *primary* menu ID
$max_chars = 180;
$primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.

function get_post_type_text($type){
    return ($type == 'whitepapers' ? 'WHITE PAPERS' : 'BLOG');
}
?>
<section class="rgn-literature">
    <h1 class="rgn-literature-title rgn-section-title">
        <?php 
            echo get_theme_mod('literature_title','Literature');
        ?>
    </h1>
    <?php if($primaryNav){?>    
    <div class="rgn-literature__left">
        <?php if($primaryNav[0]){ 
            $post0 = get_post($primaryNav[0]->object_id)
        ?>
            <article class="rgn-literature__article rgn-literature__article--main rgn-appear-animation">
                <div class="rgn-literature__article__image" style="background-image:url('<?php echo get_the_post_thumbnail_url($post0->ID)?>')"></div>
                <div class="rgn-literature__article__info">
                    <div class="rgn-literature__article__type">
                        <?php echo get_post_type_text($post0->post_type); ?>
                    </div>
                    <div class="rgn-literature__article__title"><a href="<?php echo get_post_permalink($post0->ID); ?>"><?php echo $post0->post_title ?></a></div>
                    <div class="rgn-literature__article__description">
                    <?php 
                    if (strlen($post0->post_excerpt) >= $max_chars)
                        echo substr($post0->post_excerpt , 0, $max_chars). "...";
                    else
                        echo $post0->post_excerpt;
                    ?>
                </div>
                </div>
            </article>
        <?php } ?>
        <?php if($primaryNav[1]){ 
            $post1 = get_post($primaryNav[1]->object_id)
        ?>
        <article class="rgn-literature__article rgn-literature__article--white-image rgn-literature__article--white-image--reverse rgn-appear-animation">
            <div class="rgn-literature__article__image" style="background-image:url('<?php echo get_the_post_thumbnail_url($post1->ID)?>')"></div>
            <div class="rgn-literature__article__info">
                <div class="rgn-literature__article__type"><?php echo get_post_type_text($post1->post_type); ?></div>
                <div class="rgn-literature__article__title"><a href="<?php echo get_post_permalink($post1->ID); ?>"><?php echo $post1->post_title ?></a></div>
                <div class="rgn-literature__article__description">
                    <?php 
                    if (strlen($post1->post_excerpt) >= $max_chars)
                        echo substr($post1->post_excerpt , 0, $max_chars). "...";
                    else
                        echo $post1->post_excerpt;
                    ?>
                </div>
            </div>
        </article>
        <?php } ?>
        
    </div>
    <div class="rgn-literature__right">
        <?php if($primaryNav[2]){ 
            $post2 = get_post($primaryNav[2]->object_id)
        ?>
            <article class="rgn-literature__article rgn-literature__article--white-image rgn-appear-animation">
                <div class="rgn-literature__article__image rgn-tablet-start" style="background-image:url('<?php echo get_the_post_thumbnail_url($post2->ID)?>')"></div>
                <div class="rgn-literature__article__info">
                    <div class="rgn-literature__article__type"><?php echo get_post_type_text($post2->post_type); ?></div>
                    <div class="rgn-literature__article__title"><a href="<?php echo get_post_permalink($post2->ID);?>"><?php echo $post2->post_title ?></a></div>
                    <div class="rgn-literature__article__description">
                    <?php 
                    if (strlen($post2->post_excerpt) >= $max_chars)
                        echo substr($post2->post_excerpt , 0, $max_chars). "...";
                    else
                        echo $post2->post_excerpt;
                    ?>
                </div>
                </div>
            </article>
        <?php } ?>
        <?php if($primaryNav[3]){ 
            $post3 = get_post($primaryNav[3]->object_id)
        ?>
            <article class="rgn-literature__article rgn-literature__article--black rgn-appear-animation">
                <div class="rgn-literature__article__info">
                    <div class="rgn-literature__article__type"><?php echo get_post_type_text($post3->post_type); ?></div>
                    <div class="rgn-literature__article__title"><a href="<?php echo get_post_permalink($post3->ID); ?>"><?php echo $post3->post_title ?></a></div>
                    <div class="rgn-literature__article__description">
                    <?php 
                        if (strlen($post3->post_excerpt) >= $max_chars)
                            echo substr($post3->post_excerpt , 0, $max_chars). "...";
                        else
                            echo $post3->post_excerpt;
                        ?>
                    </div>
                </div>
            </article>
        <?php } ?>
        <?php if($primaryNav[4]){ 
            $post4 = get_post($primaryNav[4]->object_id)
        ?>
        <article class="rgn-literature__article rgn-literature__article--white-image rgn-literature__article--white-image--reverse rgn-appear-animation">
            <div class="rgn-literature__article__image rgn-tablet-start" style="background-image:url('<?php echo get_the_post_thumbnail_url($post4->ID)?>')"></div>
            <div class="rgn-literature__article__info">
                <div class="rgn-literature__article__type"><?php echo get_post_type_text($post4->post_type);?></div>
                <div class="rgn-literature__article__title"><a href="<?php echo get_post_permalink($post4->ID); ?>"><?php echo $post4->post_title ?></a></div>
                <div class="rgn-literature__article__description">
                    <?php 
                    if (strlen($post4->post_excerpt) >= $max_chars)
                        echo substr($post4->post_excerpt , 0, $max_chars). "...";
                    else
                        echo $post4->post_excerpt;
                    ?>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
    <?php }?>
    <a class="rgn-literature__read-more rgn-read-more-link" href="<?php echo get_home_url() ?>/literature">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
</section>