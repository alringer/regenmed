<?php
    /**
    * Template Name: Service Template
    */
    add_filter( "the_excerpt", "add_class_to_excerpt" );

    function add_class_to_excerpt( $excerpt ) {
        return str_replace('<p', '<p class="rgn-services__subtitle"', $excerpt);
    }

    $current_page = get_queried_object();
    $title      = apply_filters( 'the_title', $current_page->post_title );
    $excerpt      = apply_filters( 'the_excerpt', $current_page->post_excerpt );
    $slug      = apply_filters( 'the_name', $current_page->post_name );
    $main_image = get_theme_mod($slug.'_image', get_template_directory_uri() . '/img/services/'.$slug.'/'.$slug.'-background.png');
    $column1 = get_theme_mod($slug.'_image', get_template_directory_uri() . '/img/services/'.$slug.'/column1.svg');
    $column2 = get_theme_mod($slug.'_image', get_template_directory_uri() . '/img/services/'.$slug.'/column2.svg');
    $column3 = get_theme_mod($slug.'_image', get_template_directory_uri() . '/img/services/'.$slug.'/column3.svg');
    $column4 = get_theme_mod($slug.'_image', get_template_directory_uri() . '/img/services/'.$slug.'/column4.svg');
    get_header();

    $menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
    $menuID = $menuLocations[$slug.'-menu']; // Get the *primary* menu ID
    $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
?>
    <section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="rgn-services">
            <div class="rgn-services__header rgn-background-image" style="background-image:url('<?php echo $main_image ?>')" >
                <h1 class="rgn-services__title"><?php echo $title ?></h1>
                <?php echo $excerpt ?>
            </div>
            <div class="rgn-services__categories-section">
                <h2 class="rgn-services__categories-title">Our Investments</h2>
                <p class="rgn-services__categories-description">We design, develop and execute upon communication strategies that help our centers grow. Our communications teams pairs expertise from outside industries to the rigors, sensitivities and regulatory requirements of Regenerative Medicine. </p>
                <div class="rgn-services__categories-container">
                    <div class="rgn-services__category">
                        <img src="<?php echo $column1 ?>" class="rgn-services__category-icon">
                        <h3 class="rgn-services__category-title">Website Design & Development</h3>
                        <p class="rgn-services__category-description">We build custom web experiences that turn good impressions into quantifiable results.</p>
                        <a class="rgn-services__category-read-more rgn-read-more-link rgn-read-more-link--white" href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                    </div>
                    <div class="rgn-services__category">
                        <img src="<?php echo $column2 ?>" class="rgn-services__category-icon">
                        <h3 class="rgn-services__category-title">Curated Content Production</h3>
                        <p class="rgn-services__category-description">Our team researches then crafts multimedia content for multiple audiences and languages.</p>
                        <a class="rgn-services__category-read-more rgn-read-more-link rgn-read-more-link--white" href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                    </div>
                    <div class="rgn-services__category">
                        <img src="<?php echo $column3 ?>" class="rgn-services__category-icon">
                        <h3 class="rgn-services__category-title">Patient Referrals</h3>
                        <p class="rgn-services__category-description">We don’t create medical tourism, we establish transparent and productive relationships between referring and referree clinicians.</p>
                        <a class="rgn-services__category-read-more rgn-read-more-link rgn-read-more-link--white" href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                    </div>
                    <div class="rgn-services__category">
                        <img src="<?php echo $column4 ?>" class="rgn-services__category-icon">
                        <h3 class="rgn-services__category-title">Event Organization and Management</h3>
                        <p class="rgn-services__category-description">From small seminars to international congresses, we organize events which bring people together in productive formats.</p>
                        <a class="rgn-services__category-read-more rgn-read-more-link rgn-read-more-link--white" href="#">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="rgn-our-people">
                <div class="rgn-our-people__card"></div>
            </div>
        </div>
    </main>
    </section>
<?php
    get_footer();
