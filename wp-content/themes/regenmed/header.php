<!doctype html>
<?php $mainUrl = get_template_directory_uri() ?>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo $mainUrl  ?>/img/favicon.png" rel="shortcut icon" type="image/png">
        <link href="<?php echo $mainUrl  ?>/img/favicon@2x.png" rel="apple-touch-icon-precomposed" type="image/png">
        

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC|Nunito+Sans&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <?php wp_head(); ?>
        <?php show_admin_bar( true ); ?>
		
		
    </head>

	<body <?php body_class(); ?>>

		<!-- main-contaniner -->
		<div class="main-contaniner">

			<!-- header -->
			<header id="header" class="header" role="banner">
				<div class="header__container">
					<div class="header__left">
						<!-- logo -->
						<!-- <div class=""> -->
                            <a class="header__main-logo" href="<?php echo home_url(); ?>">
                                <img src="<?php echo $mainUrl; ?>/img/logos/main-logo-light.svg" alt="Logo" class="logo-img logo-img--main">
                                <img src="<?php echo $mainUrl; ?>/img/logos/main-logo.svg" alt="Logo" class="logo-img logo-img--alt">
							</a>
							<span class="">
								<span></span>
							</span>
						<!-- </div> -->
						<!-- /logo -->						
					</div>
					

                    
                    <div class="header__right">
                        <!-- nav -->
                        <button id="mainMenuButton" class="icon-button menu-button">
                            <!-- <i class="icon menu"></i> -->
                            <?php include 'icons/menu.php' ?>
                        </button>
                        <nav id="mainNavigation" class="main-nav" role="navigation">
                            <?php theme_nav(); ?>
                        </nav>
                        <!-- /nav -->
                    </div>
				</div>

            </header>
			<!-- /header -->
