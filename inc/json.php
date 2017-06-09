<?php
/**
 * Home Page Builder 1.0.0 json .
 */
if(is_admin())
{
  function hpb_add_widget()
  {
      header('Access-Control-Allow-Origin: *');
      $widgets = stripslashes($_POST['data']);
      $post_id = (int)$_POST['post_id'];
      $page_template = esc_html__($_POST['page_template']);
      $sidebar = esc_html__($_POST['sidebar']);
      update_post_meta( $post_id, 'tech-labs-home', $widgets );
      update_post_meta( $post_id, '_wp_page_template', $page_template );
      update_post_meta( $post_id, 'tech-labs-sidebar', $sidebar );
      wp_die();
  }
  add_action( 'wp_ajax_hpb_add_widget', 'hpb_add_widget' );
  add_action( 'wp_ajax_nopriv_hpb_add_widget', 'hpb_add_widget' );
}
