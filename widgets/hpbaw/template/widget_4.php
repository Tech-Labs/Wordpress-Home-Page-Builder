
<div class="widget_4">
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
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>"><img class="widget_4_img" src="<?php the_post_thumbnail_url() ?>" /></a>
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>" class="news-item-link"><?=get_the_title()?></a>
            <?if($instance['writer']){?>
            <br />
            <a href="<?=get_permalink()?>" title="<?the_title_attribute()?>" class="article-writer-link"><?=get_post_meta(get_the_ID(), 'writer_name', true);?></a>
            <?}?>
            <div class="clearfix"></div>
        </div>
    <?
endwhile;

wp_reset_postdata();
?>

</div>
