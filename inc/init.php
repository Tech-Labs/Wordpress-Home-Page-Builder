<?php
/**
 * Home Page Builder 1.0.0 initiate .
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Load plugin textdomain.
 */
function tech_labs_hpbload_textdomain() {
    load_plugin_textdomain( 'tech-labs-hpb', false, HPB_DIR . '/languages/' );
}
add_action( 'plugins_loaded', 'tech_labs_hpbload_textdomain' );
/**
 * enqueue plugin scripts and styles to admin.
 */
 function hpb_enqueue() {
    wp_register_script( 'hpb-js', HPB_URL . '/assets/main.js',  array('jquery','jquery-ui-draggable','jquery-ui-droppable','jquery-ui-sortable'), '', true );
    wp_enqueue_script( 'hpb-js' );
    wp_register_style( 'hpb-style', HPB_URL . '/assets/main.css' );
    wp_enqueue_style( 'hpb-style' );
 }
 add_action( 'admin_enqueue_scripts', 'hpb_enqueue' );
 /**
  * add page builder to editor.
  */
function hpb_toggle_editor()
{
  $screen = get_current_screen();
  if($screen->post_type=="page")
  {
    echo '<button type="button" id="hpb-button" class="button" data-editor="content"><span class="wp-media-buttons-icon dashicons dashicons-schedule"></span> ' . esc_html__( 'Page Builder', 'tech-labs-hpb' ) . '</button>';
  }
}
add_action( 'media_buttons', 'hpb_toggle_editor'  );
/**
 * craete builder.
 */
function hpb_the_editor( $content ) {
    include( HPB_DIR . 'views/hpb-the-editor.php' );
}
add_action('edit_form_after_editor', 'hpb_the_editor');
/*
* Load admin setting page
*/
//require 'admin-option.php';
/**
 * Load json api
 */
require 'json.php';
/**
 * Load widget base class
 */
require 'class-hpb-widget.php';
/**
 * Load loader class
 */
require 'hpb-loader.php';
/**
 * Load page tempalte class
 */
require 'class-page-template.php';
/**
 * Load widgets class
 */
foreach ($widgets as $widget) {
  include_once(WIDGET_DIR . $widget .'/' . $widget . '.php');
}

function hpb_the_content_filter($content) {
  if ( is_singular('page') ) {
    $loader = HPB_Loader::getInstance();
    $loader->load();
  }
  return $content;
}

add_filter( 'the_content', 'hpb_the_content_filter' );
