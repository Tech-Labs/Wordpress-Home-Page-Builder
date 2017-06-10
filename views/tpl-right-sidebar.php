<?php
/*
 * Template Name: No Side Bar
 * Description: A Page Template with a darker design.
 */

 get_header(); ?>
<div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php dynamic_sidebar( get_post_meta( get_the_ID(), 'tech-labs-sidebar')[0] ); ?>
      </div>
      <div class="col-md-9">
        <?php the_content()?>
      </div>
    </div>
</div>
 <?php
 get_footer();