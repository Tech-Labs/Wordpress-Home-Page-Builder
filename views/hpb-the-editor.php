<div id="page-builder">
<ul class="avaliable-home-widgets">

<?php
global $widgets;
$loader = HPB_Loader::getInstance();
foreach ($widgets as $widget) {
  $loader->form($widget,[],true);
}?>
</ul>

<div class="postbox ">
  <h2 class="hndle ui-sortable-handle"><span><?php esc_html_e( 'Page Builder', 'tech-labs-hpb' ) ?></span></h2>
  <div class="inside">


    <ul id="sortable">
    <?php
    global $post;
    $builder = json_decode(get_post_meta( $post->ID, 'tech-labs-home')[0]);
    if($builder){
      foreach ($builder as $item) {
        $loader->form($item->widget,(array)$item);
      }
    }?>
    </ul>

  </div>
</div>
<br>

  <div class="postbox ">
    <h2 class="hndle ui-sortable-handle"><span><?php esc_html_e( 'Page Properties', 'tech-labs-hpb' ) ?></span></h2>
    <div class="inside">
      <?php global $wp_registered_sidebars;?>
        <label for="sidebar" class="col-3"><?_e('Page Template :', 'tech-labs-hpb')?> </label>
        <select
            class="widefat col-9"
            id="hpb_page_template"
            name="page_template">
            <option value="default"><?php esc_html_e( 'Default', 'tech-labs-hpb' ) ?></option>
            <?
            foreach(get_page_templates() as $item=>$val){
              if($val==get_post_meta( $post->ID, '_wp_page_template')[0])
              {
                echo '<option selected="selected" value="'.$val.'">'.$item.'</option>';
              }else{
                echo '<option value="'.$val.'">'.$item.'</option>';
              }
            }?>
        </select>
          <br><br>
          <label for="sidebar" class="col-3"><?_e('Sidebar :', 'tech-labs-hpb')?> </label>
          <select
              class="widefat col-9"
              id="hpb_sidebar"
              name="sidebar">
              <option value="0"><?php esc_html_e( 'No sidebar', 'tech-labs-hpb' ) ?></option>
              <?php foreach($wp_registered_sidebars as $item=>$val){

                if($val['id']==get_post_meta( $post->ID, 'tech-labs-sidebar')[0])
                {
                  echo '<option selected="selected" value="'.$val['id'].'">'.$val['name'].'</option>';
                }else{
                  echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
                }
              }?>
          </select>
    </div>
  </div>

  <div class="text-center">
    <div class="spinner-contianer">
      <span class="spinner"></span>
    </div>
    <button type="button" id="add-new-hpb-widget" class="button button-primary button-large add-new-hpb-widget"><span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'Publish', 'tech-labs-hpb' ) ?></button>
  </div>
</div>
