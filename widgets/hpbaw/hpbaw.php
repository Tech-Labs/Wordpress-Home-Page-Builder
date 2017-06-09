<?php
/*
Advanced Post Widget
Description: Builds post widget based on options you choose from a form in a widget .
Author: Ibrahim Mohamed Abotaleb
Version: 1.0
*/
class hpbaw extends HPB_Widget{
    function __construct()
    {
        $widgetOptions = ['name' => __('Advanced Post Widget', 'tech-labs-hpb')];
        parent::__construct('hpbaw',$widgetOptions);
    }

    public function form($instance)
    {
        extract($instance);
        ?>
            <label for="title?>" class="col-3"><?php _e('Title :', 'tech-labs-hpb')?> </label>
            <input
                class="widefat col-9"
                type="text"
                id="title"
                name="title"
                value="<?php if( isset($title) ) echo esc_attr($title)?>" />
                <br><br>
            <label for="category_id" class="col-3"><?_e('Cartegory :', 'tech-labs-hpb')?> </label>
            <select
                class="widefat col-9"
                id="category_id"
                name="category_id">
                <?php echo $this->categories_list($category_id)?>
            </select>
                <br><br>
            <label for="rows" class="col-3"><?php _e('Number Of Posts :', 'tech-labs-hpb')?> </label>
            <input
                class="widefat col-9"
                type="text"
                id="rows"
                name="rows"
                value="<?php if( isset($rows) ) echo esc_attr($rows)?>" />
                <br><br>

            <label for="offest" class="col-3"><?php _e('Offest (the number of posts to skip) :', 'tech-labs-hpb')?> </label>
            <input
                class="widefat col-9"
                type="text"
                id="offest"
                name="offest"
                value="<?php if( isset($offest) ) echo esc_attr($offest)?>" />
                <br><br>
            <label for="order" class="col-3"><?php _e('Order by :', 'tech-labs-hpb')?> </label>
            <select
                class="widefat col-9"
                id="order"
                name="order">
                <?php echo $this->order_list($order)?>
            </select>
                <br><br>
            <label for="template" class="col-3"><?php _e('Template :', 'tech-labs-hpb')?> </label>
            <select
                class="widefat col-9"
                id="template"
                name="template">
                <?php echo $this->template_list($template)?>
            </select>
        <?php

    }

    function categories_list($cat_id=0)
    {
        $out = '<option value="-1">'.__('All', 'tech-labs-hpb').'</option>';
        foreach(get_categories() as $cat)
        {
            //print_r($cat);
            if($cat->cat_ID == $cat_id)
            {
                $out .= '<option selected="selected" value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
            }else{
                $out .= '<option value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
            }
        }
        return $out;
    }

    public function order_list($order="asc")
    {
        $orders = array('ID','post_views','rand','comment_count');
        $out = '';
        foreach($orders as $item)
        {
            if($item == $order)
            {
                $out .= '<option selected="selected">'.$item.'</option>';
            }else{
                $out .= '<option>'.$item.'</option>';
            }
        }
        return $out;
    }

    public function template_list($selected="")
    {
        $orders = array('widget_1'=>__('Text Only', 'tech-labs-hpb'),
        'widget_2'=>__('Big Image', 'tech-labs-hpb'),
        'widget_3'=>__('Right Image', 'tech-labs-hpb'),
        'widget_4'=>__('Left Image', 'tech-labs-hpb'),
        //'widget_5'=>__('tabs', 'tech-labs-hpb'),
        'widget_6'=>__('Image Only', 'tech-labs-hpb'),
        );
        $out = '';
        foreach($orders as $item=>$val)
        {
            if($item == $selected)
            {
                $out .= '<option selected="selected" value="'.$item.'">'.$val.'</option>';
            }else{
                $out .= '<option value="'.$item.'">'.$val.'</option>';
            }
        }
        return $out;
    }
    public function widget($instance)
    {

      if(is_array($instance['category_id']))
      {
          $cat = implode(',',$instance['category_id']);
      }else{
          $cat = $instance['category_id'];
      }
      $args = array (
      	'posts_per_page'=> $instance['rows'],
          'cat'=>$cat,
          'offset'=>$instance['offest'],
          'order'=>'DESC'
      );
      if($instance['order']=='rand')
      {
          $args['orderby']=$instance['order'];
      }
      if($instance['order']=='post_views')
      {
      	$args['meta_key']= 'post_views';
      	$args['orderby']='meta_value_num';
      }
      if($instance['order']=='comment_count')
      {
      	$args['meta_key']= 'comment_count';
      	$args['orderby']='meta_value_num';
      }
      if($instance['order']=='ID')
      {
      	$args['orderby']='ID';
      }
      include('template/'.$instance['template'].".php");
    }
}

function hpb_style() {
	wp_enqueue_style( 'pro-widget-style', HPB_URL . '/widgets/hpbaw/css/style.css');
}

add_action( 'wp_enqueue_scripts', 'hpb_style' );
