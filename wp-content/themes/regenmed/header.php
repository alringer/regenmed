<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <!-- <link href="<?php //echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php //echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed"> -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:300,400,500,700" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php wp_head(); ?>
        <?php show_admin_bar( true ); ?>
		
		
    </head>
    
	<body <?php body_class(); ?>>

		<!-- main-contaniner -->
		<div class="main-contaniner">

			<!-- header -->
			<header class="" role="banner">
				<div class="">
					<div class="">
						<!-- logo -->
						<div class="">
							<a href="<?php echo home_url(); ?>">
								<!-- <img src="<?php //echo get_template_directory_uri(); ?>/img/logos/lmri-logo.svg" alt="Logo" class="logo-img"> -->
							</a>
							<span class="">
								<span></span>
							</span>
						</div>
						<!-- /logo -->						
					</div>
					

					<!-- nav -->
					<nav class="navbar navbar-light" role="navigation">
						<?php theme_nav(); ?>

					</nav>
					<!-- /nav -->
				</div>

			</header>
			<!-- /header -->
