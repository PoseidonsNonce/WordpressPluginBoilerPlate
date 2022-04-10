<?php
/**
 * Plugin Name:       Plugin Boiler Plater
 * Plugin URI:       
 * Description:       
 * Version:           1.0.0
 * Author:            Christopher Waddington
 */

namespace DamnGood;


register_activation_hook( __FILE__, function() {
    require_once plugin_dir_path( __FILE__ ) . 'src/Activation.php';
    Activation::activate();
} );


register_deactivation_hook( __FILE__, function() {
    require_once plugin_dir_path( __FILE__ ) . 'src/Deactivation.php';
    Deactivation::deactivate();
} );


function dg_widgets_page() {
    ?>
    <div class="dg_widgets_header">
    
    </div>
    <div class="wrap">
        <h2>  Widgets </h2> 
        <h3> Author:  </h3> 
        <table class="wp-list-table widefat fixed striped table-view-list toplevel_page_gf_edit_forms">
            <tr>
                <th>Shortcode</th>
                <th>Descriptions</th>
            </tr>            
        </table>
        <h2>Custom Functionality </h2> 
        <table class="wp-list-table widefat fixed striped table-view-list toplevel_page_gf_edit_forms">
            <tr>
                <th>Function</th>
                <th>Descriptions</th>
            </tr>
        </table>
    </div>
<style>
.dg_widgets_header {
    background-image: url("/wp-content/plugins/DGWidgetsPlugin/resources/imgs/dgwidgetshead.png");
    width: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
	background-color: black;
	height: 200px;

}
</style>

<?php
    
}


function dg_create_menu() {
    add_menu_page( 
        'Damn Good Widgets', 
        'Damn Good Widgets', 
        'manage_options', 
        'dg-widget-menu', 
        'DamnGood\\dg_widgets_page',
        plugin_dir_url( __FILE__ ) . 'resources/imgs/dglogo.png',
         3
        );
}


add_action('admin_menu', 'DamnGood\\dg_create_menu');

function Register_Scripts() {

}

function Enqueue_Scripts() {

  
}

function Enqueue_Styles() { 
    wp_enqueue_style('plugin_css', plugin_dir_url( __FILE__ ) . "resources/css/styles.css");

}


/* 
function Create_Shortcodes() {
}

*/




/* Registers */ 
add_action('init', 'DamnGood\\Register_Scripts');
/* Custom Form Registration */


/* Enqueues */
add_action( 'wp_enqueue_scripts', 'DamnGood\\Enqueue_Scripts');
add_action('wp_enqueue_scripts', "DamnGood\\Enqueue_Styles");


/*ShortCodes 
add_action('init', 'DamnGood\\Create_Shortcodes');

*/


