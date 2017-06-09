<?php
/**
 * Home Page Builder 1.0.0 loader class.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class HPB_Loader {
	protected static $instance = null;
  public static function getInstance()
  {
      if (!isset(static::$instance)) {
          static::$instance = new static;
      }
      return static::$instance;
  }
	public function form( $class , $instance ,$draggable=false ) {
    $widget = $class::getInstance();
    if($instance['title'])
    {
      $widgetTitle = $instance['title']." [ ".$widget->getWidgetName()." ]";
    }else{
      $widgetTitle = $widget->getWidgetName();
    }
    if($draggable)
    {
      $drag = 'draggable';
    }else{
      $drag = '';
    }
    ?>
    <li class="widget <?php echo $drag?>">
        <div class="widget-top">
        	<div class="widget-title-action">
        		<a class="widget-action hide-if-no-js" href="#available-widgets"></a>
        	</div>
        	<div class="widget-title ui-sortable-handle"><h3><?php echo  $widgetTitle ?><span class="in-widget-title"></span></h3></div>
    	</div>

        <div class="widget-inside">
            <div class="widget-content widget-form">
                <?php $widget->form($instance);?>
              <input type="hidden" value="<?php echo $class?>" name="widget" />
            </div>
          <div class="alignleft">
            <a class="hpb-control-remove" href="#"><?php esc_html_e( 'Delete' ) ?></a> |
            <a class="hpb-control-close" href="#"><?php esc_html_e( 'Close' ) ?></a>
          </div>
          <br class="clear">
        </div>
    </li>
<?php }


	public function load()
	{
			global $widgets,$post;
			$builder = json_decode(get_post_meta( $post->ID, 'tech-labs-home')[0]);
			if($builder){
	      foreach ($builder as $item) {
	        $this->widget($item->widget,(array)$item);
	      }
	    }
	}
	public function widget($class,$instance) {
		$widget = $class::getInstance();
		echo $widget->widget($instance);
	}
}
