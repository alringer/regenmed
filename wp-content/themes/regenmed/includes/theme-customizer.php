<?php

function init_hero_section( $wp_customize ){
    $wp_customize->add_section( 'regenmed_hero_section' , array(
        'title'      => __( 'Hero Slides', 'regenmed' ),
        'priority'   => 30,
    ) );

    //SETTINGS
    $wp_customize->add_setting( 'hero_title' , array(
        'default'   => 'We co-invest in establishing, operating and expanding',
        'transport' => 'refresh',
    ) );
    
    $wp_customize->add_setting( 'hero_subtitle' , array(
        'default'   => 'Regenerative Medicine Centers of Excellence',
        'transport' => 'refresh',
    ) );

    //CONTROLS
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_title', array(
        'label'     => __( 'Hero title', 'regenmed' ),
        'section'   => 'regenmed_hero_section',
        'settings'  => 'hero_title',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_subtitle', array(
        'label'     => __( 'Hero subtitle', 'regenmed' ),
        'section'   => 'regenmed_hero_section',
        'settings'  => 'hero_subtitle',
        'type'      => 'text'
    ) ) );
}

function init_our_work_section( $wp_customize ){
    $wp_customize->add_section( 'regenmed_our_work_section' , array(
        'title'      => __( 'Our Work', 'regenmed' ),
        'priority'   => 40,
    ) );

    //SETTINGS
    $wp_customize->add_setting( 'our_work_title' , array(
        'default'   => 'Our Work',
        'transport' => 'refresh',
    ) );
    //slide1
    $wp_customize->add_setting( 'our_work_slide1_title' , array(
        'default'   => 'RE.GA.IN',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide1_subtitle' , array(
        'default'   => 'Overview',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide1_description' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide1_image' , array(
        'default'   => get_template_directory_uri().'/img/frontpage/our-work/screencapture-regain-galeazzi-2019-04-18-10-34-24',
        'transport' => 'refresh',
    ) );
    //slide2
    $wp_customize->add_setting( 'our_work_slide2_title' , array(
        'default'   => 'RE.GA.IN',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide2_subtitle' , array(
        'default'   => 'Overview',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide2_description' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide2_image' , array(
        'default'   => get_template_directory_uri().'/img/frontpage/our-work/screencapture-regain-galeazzi-2019-04-18-10-34-24',
        'transport' => 'refresh',
    ) );
    //slide3
    $wp_customize->add_setting( 'our_work_slide3_title' , array(
        'default'   => 'RE.GA.IN',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide3_subtitle' , array(
        'default'   => 'Overview',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide3_description' , array(
        'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Maecenas varius tortor nibh, sit amet tempor nibh finibus et. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'our_work_slide3_image' , array(
        'default'   => get_template_directory_uri().'/img/frontpage/our-work/screencapture-regain-galeazzi-2019-04-18-10-34-24',
        'transport' => 'refresh',
    ) );

    //CONTROLS
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_title', array(
        'label'     => __( 'Main title', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_title',
        'type'      => 'text'
    ) ) );
    //slide1
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_work_slide1_image', array(
        'label'     => __( 'First slide image', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide1_image',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide1_title', array(
        'label'     => __( 'First slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide1_title',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide1_subtitle', array(
        'label'     => __( 'First slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide1_subtitle',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide1_description', array(
        'label'     => __( 'First slide description', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide1_description',
        'type'      => 'text'
    ) ) );
    //slide2
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_work_slide2_image', array(
        'label'     => __( 'Second slide image', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide2_image',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide2_title', array(
        'label'     => __( 'Second slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide2_title',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide2_subtitle', array(
        'label'     => __( 'Second slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide2_subtitle',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide2_description', array(
        'label'     => __( 'Second slide description', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide2_description',
        'type'      => 'text'
    ) ) );
    //slide3
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_work_slide3_image', array(
        'label'     => __( 'Third slide image', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide3_image',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide3_title', array(
        'label'     => __( 'Third slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide1_title',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '', array(
        'label'     => __( 'Third slide subtitle', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide3_subtitle',
        'type'      => 'text'
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'our_work_slide3_description', array(
        'label'     => __( 'Third slide description', 'regenmed' ),
        'section'   => 'regenmed_our_work_section',
        'settings'  => 'our_work_slide3_description',
        'type'      => 'text'
    ) ) );
}

function init_literature_section( $wp_customize ){
    $wp_customize->add_section( 'regenmed_literature_section' , array(
        'title'      => __( 'Literature', 'regenmed' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'literature_title' , array(
        'default'   => 'Literature',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'literature_title', array(
        'label'     => __( 'Main title', 'regenmed' ),
        'section'   => 'regenmed_literature_section',
        'settings'  => 'literature_title',
        'type'      => 'text'
    ) ) );
}

function theme_customize_register( $wp_customize ) {
    init_hero_section( $wp_customize );
    init_our_work_section(  $wp_customize );
    init_literature_section(  $wp_customize );
}