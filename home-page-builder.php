<?php
/*
Plugin Name: Home Page Builder
Description: Builed Home Page
Author: Ibrahim Mohamed Abotaleb
Version: 1.0.0
Author URI: https://mrkindy.com/
Text Domain: tech-labs-hpb
Domain Path: /languages
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'HPB_VERSION', '1.0.0' );
define( 'HPB_DIR',  plugin_dir_path( __FILE__ ) );
define( 'HPB_URL',   plugins_url('',__FILE__ ) );
define( 'WIDGET_DIR',   HPB_DIR . 'widgets/');
$widgets =['hpbaw','hpbtext'];
/**
 * initiate plugins
 */
require 'inc/init.php';
