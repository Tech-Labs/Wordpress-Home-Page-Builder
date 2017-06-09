<?php
/*
Text And HTML
Description: Builds post widget based on options you choose from a form in a widget .
Author: Ibrahim Mohamed Abotaleb
Version: 1.0
*/
class hpbtext extends HPB_Widget{
    function __construct()
    {
        $widgetOptions = ['name' => __('Text & HTML', 'tech-labs-hpb')];
        parent::__construct('hpbtext',$widgetOptions);
    }

    public function form($instance)
    {
        extract($instance);
        ?>
            <label for="title?>" class="col-3"><?_e('Title :', 'tech-labs-hpb')?> </label>
            <input
                class="widefat col-9"
                type="text"
                id="title"
                name="title"
                value="<?php if( isset($title) ) echo esc_attr($title)?>" />
            <br><br>
            <label for="rows" class="col-3"><?_e('Text :', 'tech-labs-hpb')?> </label>
            <textarea
                class="widefat col-9"
                type="text"
                id="text"
                name="text"
                value="<?php if( isset($text) ) echo esc_attr($text)?>">
            </textarea>
        <?php

    }
    public function widget($instance)
    {
        echo $instance['title'];
    }
}
