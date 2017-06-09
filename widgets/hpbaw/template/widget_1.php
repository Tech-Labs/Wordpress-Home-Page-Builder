
<div class="widget_1">
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
            <span class="more-reads-num"><?=$c?></span>
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>" class="news-item-link"><?=get_the_title()?></a>
            <div class="clearfix"></div>
        </div>
    <?
endwhile;

wp_reset_postdata();
?>

</div>
