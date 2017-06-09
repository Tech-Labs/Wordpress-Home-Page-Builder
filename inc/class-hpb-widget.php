<?php
/**
 * Home Page Builder 1.0.0 widget class.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class HPB_Widget {
	private static $instances = array();
  public static function getInstance()
  {
      $class = get_called_class();
      if (!isset(self::$instances[$class])) {
          self::$instances[$class] = new static;
      }
      return self::$instances[$class];
  }
	public function __construct( $id_base, $widgetOptions) {
		$this->id_base = $id_base;
		$this->name =  $widgetOptions['name'];
	}
	public function form( $instance ) {
		echo '<p class="no-options-widget">' . __('There are no options for this widget.') . '</p>';
		return 'noform';
	}
	public function getWidgetName() {
		return $this->name;
	}
}
