<?php
 $single_hero_img_id = get_the_ID();
 $single_hero_img_url = home_url();
//  $single_hero_img = get_post_meta($post->ID, 'alternate-hero-img', $single = true); 

?>

<?php get_header(); ?>

	<main role="main">
		<!--  Hero section -->
		<!-- <section>
			<?php //$single_hero_img_bg  =  strlen($single_hero_img) > 0 ? $single_hero_img :  '/wp-content/themes/lowy/img/default/nature-pines.jpg'; ?>
			<div class="hero hero--templates" style="background-image: url(<?php //echo $single_hero_img_url; ?><?php //echo $single_hero_img_bg; ?>)">
			</div>
		</section> -->
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" class="single-page-template__article-content">
			<section class="single-page-template--content">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							<?php endif; ?>
							<!-- /post thumbnail -->

							<!-- post title -->
							<h1>
								<?php the_title(); ?>
							</h1>
							<!-- /post title -->

							<!-- post details -->
							<!-- <h4 class="date"><?php //the_time('F j, Y'); ?> <?php //the_time('g:i a'); ?></h4> -->
							<span class="author"><?php // _e( 'Published by', 'html5blank' ); ?> <?php // the_author_posts_link(); ?></span>
							<!-- /post details -->

							<?php the_content(); // Dynamic Content ?>

							<!-- back button  -->
							<?php //get_template_part('partials/back-link', 'page'); ?>

							<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
							

						</div>
					</div>
				</div>
			</section>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); 