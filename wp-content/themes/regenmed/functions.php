<?php
/*
 *  Author: Frank Garcia
 *  URL: www.seamgen.com 
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Functions
\*------------------------------------*/
add_theme_support( 'post-thumbnails' ); //adds featured image field

function theme_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function theme_styles()
{
    wp_register_style('themeStyles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('themeStyles'); // Enqueue it!

    wp_register_style('site', get_template_directory_uri() . '/css/site.css', array(), '1.0', 'all');
    wp_enqueue_style('site'); // Enqueue it!   
}

// HTML5 Blank navigation
function theme_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="menu-nav">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Register HTML5 Blank Navigation
function register_theme_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions

 add_action('init', 'register_theme_menu'); // Adds Menu
//  add_action('init', 'theme_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet


?>