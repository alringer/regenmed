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

/*------------------------------------*\
	Includes
\*------------------------------------*/
include( get_template_directory() . '/includes/theme-customizer.php'); 
include( get_template_directory() . '/includes/white-papers.php' );


function theme_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        // wp_register_script('html5blankscripts',
        //     get_template_directory_uri() . '/js/scripts.js',
        //     array('jquery'), '1.0.0'); // Custom scripts
        // wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}


function theme_footer_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('footerScripts', get_template_directory_uri() . '/js/main.js', '', '1.0', true);
        wp_enqueue_script('footerScripts'); // Enqueue it!
    }
}

function theme_homepage_scripts()
{
    if(is_front_page()){
        wp_register_script('frontPageScripts', get_template_directory_uri() . '/js/front-page.js', '', '1.0', true);
        wp_enqueue_script('frontPageScripts'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function theme_styles()
{
    wp_register_style('themeStyles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('themeStyles'); // Enqueue it!

    wp_register_style('site', get_template_directory_uri() . '/css/site.css', array(), '1.0', 'all');
    wp_enqueue_style('site'); // Enqueue it!   

    wp_register_style('sitesass', get_template_directory_uri() . '/css/site.scss', array(), '1.0', 'all');
    wp_enqueue_style('sitesass'); // Enqueue it!   
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
            'items_wrap'      => '<ul class="menu__list">%3$s</ul>',
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

function custom_menu() { 
    add_menu_page( 
        'Page Title', 
        'Menu Title', 
        'edit_posts', 
        'menu_slug', 
        'page_callback_function', 
        'dashicons-media-spreadsheet' 
       );
  }


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('admin_menu', 'custom_menu');

 add_action('init', 'register_theme_menu'); // Adds Menu
 add_action( 'init', 'create_posttype' );
//  add_action('init', 'theme_header_scripts'); // Add Custom Scripts to wp_head
 add_action('wp_enqueue_scripts', 'theme_footer_scripts'); // Add Custom Scripts to wp_footer
add_action('wp_enqueue_scripts', 'theme_styles'); // Add Theme Stylesheet
add_action('wp_enqueue_scripts','theme_homepage_scripts'); // Add custom scripts to frontpage
add_action('customize_register','theme_customize_register');

?>