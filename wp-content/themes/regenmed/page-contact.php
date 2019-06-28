<?php
$current_page = get_queried_object();
$title      = apply_filters( 'the_title', $current_page->post_title );
$content      = apply_filters( 'the_content', $current_page->post_content );

$contact_image = get_theme_mod('contact_page_image', get_template_directory_uri() . '/img/contact/contact.png');

get_header("white");
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="rgn-contact">
            <div class="rgn-contact__image-container">
                <div class="rgn-contact__image" style="background-image:url('<?php echo $contact_image ?>')">
                </div>
            </div>
            <div class="rgn-contact__form-container">
                <h1 class="rgn-contact__header"><?php echo $title ?></h1>
                <?php echo $content;?>
            </div>
        </div>
    </main>
</section>


<?php
get_footer();
