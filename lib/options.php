<?php

add_action('after_setup_theme','frack_init', 15);

function frack_init () {
  add_action( "after_setup_theme",  "frack_create_custom_post_types" );
  add_action( "widgets_init",       "frack_register_sidebars" );
  add_action( "after_setup_theme",  "frack_register_menus" );
  add_action( "after_setup_theme",  "frack_set_theme_support" );
  add_action( "wp_enqueue_scripts", "frack_enqueue_scripts_and_styles" );
}

////////////////////////////////////
///////// THEME SUPPORT ////////////
////////////////////////////////////

function frack_set_theme_support() {
  add_theme_support( 'post-thumbnails', array( 'post', 'page', 'custom-type' ) );
}

function frack_create_custom_post_types () {
  register_post_type( 'slider-image',
    array(
      'labels' => array(
        'name' => __( 'Slider Images' ),
        'singular_name' => __( 'Slider Image' )
      ),
      'public' => true,
      'supports' => array('title', 'excerpt', 'thumbnail'),
    )
  );
}
////////////////////////////////////
///////// SCRIPTS & STYLES /////////
////////////////////////////////////

function frack_enqueue_scripts_and_styles () {
  frack_enqueue_stylesheets();
  frack_enqueue_scripts();
}

function frack_enqueue_stylesheets () {
  wp_register_style( "frack_stylesheet", get_frack_css_dir_uri() . "/application.css" );
  wp_enqueue_style( "frack_stylesheet" );
}

function frack_enqueue_scripts () {
  wp_register_script( "frack_polyfills", get_frack_js_dir_uri() . '/vendor/modernizr.js', false, false, false );
  wp_enqueue_script( "frack_polyfills" );

  wp_register_script( "frack_script", get_frack_js_dir_uri() . '/application.min.js', false, false, true );
  wp_enqueue_script( "frack_script" );
}

////////////////////////////////////
//////////// HELPERS ///////////////
////////////////////////////////////

function get_frack_library_uri () {
  return get_stylesheet_directory_uri() . "/lib";
}

function get_frack_css_dir_uri () {
  return get_frack_library_uri() . '/css';
}

function get_frack_js_dir_uri () {
  return get_frack_library_uri() . '/js';
}

function get_frack_img_dir_uri () {
  return get_frack_library_uri() . '/img';
}

?>
