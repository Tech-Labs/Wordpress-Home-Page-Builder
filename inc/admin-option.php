<?php
/**
 * Home Page Builder 1.0.0 admin panel.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * add Home Page Builder Plugin Settings to admin menu.
 */
function tech_labs_hpbcreate_menu() {
	//create new top-level menu
	add_menu_page(__( 'Home Page Builder Plugin Settings', 'tech-labs-hpb' ), __( 'Home Page Builder Settings', 'tech-labs-hpb' ), 'administrator', __FILE__, 'tech_labs_hpbsettings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_tech_labs_hpbsettings' );
}
add_action('admin_menu', 'tech_labs_hpbcreate_menu');
/**
 * register our settings.
 */
function register_tech_labs_hpbsettings() {
	//register our settings
	register_setting( 'tech-labs-hpb-settings-group', 'tech_labs_hpb_status' );
	register_setting( 'tech-labs-hpb-settings-group', 'tech_labs_hpb_widgets' );
}
/**
 * settings page.
 */
function tech_labs_hpbsettings_page() {
?>
<div class="wrap">
<h2><?php _e( 'Home Page Builder', 'tech-labs-hpb' )?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'tech-labs-hpb-settings-group' ); ?>
    <?php do_settings_sections( 'tech-labs-hpb-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php _e( 'Home Page Builder Status', 'tech-labs-hpb' )?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( 'Home Page Builder Status', 'tech-labs-hpb' )?></span></legend>
                <label title="<?php _e( 'Enable', 'tech-labs-hpb' )?>"><input type="radio" name="tech_labs_hpbstatus" value="1" <?php if(esc_attr( get_option('tech_labs_hpbstatus') ) == 1 ){ ?> checked="checked"<?php }?>> <?php _e( 'Enable', 'tech-labs-hpb' )?></label><br>
                <label title="<?php _e( 'Disable', 'tech-labs-hpb' )?>"><input type="radio" name="tech_labs_hpbstatus" value="0" <?php if(esc_attr( get_option('tech_labs_hpbstatus') ) == 0 ){ ?> checked="checked"<?php }?>> <?php _e( 'Disable', 'tech-labs-hpb' )?></label><br>
                </fieldset>
            </td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php }
