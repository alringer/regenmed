<?php
$current_page = get_queried_object();
$title      = apply_filters( 'the_title', $current_page->post_title );
$content      = apply_filters( 'the_content', $current_page->post_content );

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="rgn-about">
            <h1 class="rgn-about__header"><?php echo $title ?></h1>
            <div class="rgn-about__body">
                <?php echo $content;?>
            </div>
        </div>
    </main>
</section>


<?php
get_footer();
