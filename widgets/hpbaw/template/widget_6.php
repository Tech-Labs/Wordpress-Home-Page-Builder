
<div class="widget_6">
<?
// The Query
$the_query = new WP_Query($args);
// The Loop
$c = 0;
while($the_query->have_posts()):
    $c++;
    $the_query->the_post();
    ?>
        <div class="article-item">
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>"><img class="widget_6_img" src="<?php the_post_thumbnail_url() ?>" /></a>
            <div class="clearfix"></div>
        </div>
    <?
endwhile;

wp_reset_postdata();
?>

</div>
