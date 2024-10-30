<?php
  /**
   * @package Livewire_Widget
   * @version 1.6
   */
  /*
  Plugin Name: Livewire Messenger
  Plugin URI: http://wordpress.org/plugins/livewire-widget/
  Description: Live Video Help Desk
  Author: Livewire
  Version: 0.1
  Author URI: https://livewire.live
  */
?><?php
  /**
  * Add Settings link to plugins
  */

  add_filter('plugin_action_links', 'lw_wp_add_settings_link', 10, 2 );


  function lw_wp_add_settings_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
   
    if ($file == $this_plugin){
      $settings_link = '<a href="tools.php?page=livewire-widget%2Flivewire-wpwidget.php">'.__("Settings", "livewire-widget").'</a>';
      array_unshift($links, $settings_link);

      $settings_link = '<a href="https://livewire.live/pricing">'.__("Upgrade Account", "upgrade-account").'</a>';
      array_unshift($links, $settings_link);
    }

    return $links;
  }




  add_action('admin_menu', 'lw_wp_addSettingsPage');


  function lw_wp_addSettingsPage () {
    // add a new setting page under tools menu
    add_management_page('Livewire Messenger', 'Livewire Messenger', 'manage_options', __FILE__, 'lw_wp_userConfig');
  }





  function lw_wp_userConfig () {
  	include_once('lw_wp_userConfig.php');
  }
?><?php
  function lw_wp_addWidget(){

    wp_register_style('lw_wp_widget_css', 'https://livewire.live/static/widgets/widget.css');

    wp_enqueue_style('lw_wp_widget_css');


    wp_register_script('lw_wp_widget_js', 'https://livewire.live/static/widgets/widget.js');

    wp_enqueue_script('lw_wp_widget_js');

    $num = esc_js(get_option('livewire_number'));
    $link = esc_js(get_option('livewire_livelink'));

    if($num == false && $link == false){
      return;
    }

    $a = "var iframe_desktop = document.getElementById('livewire_desktop_widget'); ";
    $b = " var iframe_mobile = document.getElementById('livewire_mobile_widget'); ";
    $c = " window.onload = function() {
        iframe_desktop.contentWindow.postMessage({'livewire_number':'";
    $d = "', 'livewire_name':'";
    $e =  "', 'wordpress':'true'},'*');";
    $f = "iframe_mobile.contentWindow.postMessage({'livewire_number': '";
    $g = "', 'livewire_name':'";
    $h = "', 'wordpress':'true' },'*'); };";


    $script = $a . $b . $c . $num . $d . $link . $e . $f . $num . $g . $link . $h;

    wp_enqueue_script( 'lw_wp_admin', plugins_url( '/assets/js/lw_wp_script.js', __FILE__ ), null, null, true);

    wp_add_inline_script( 'lw_wp_admin', $script);

  }


  add_action ('wp_enqueue_scripts', 'lw_wp_addWidget');




  function wp_lw_loadAdminCSS(){
    wp_enqueue_style( 'lw_wp_admin', plugins_url( 'assets/css/lw_wp_admin.css', __FILE__ ) );
  }


  add_action( 'admin_print_styles', 'wp_lw_loadAdminCSS' );
?><?php
  function lw_wp_check_post(){
    if(isset($_POST['update_settings']) && isset( $_POST['lw_wp_update_nonce'] ) 
    && wp_verify_nonce( $_POST['lw_wp_update_nonce'], 'lw_wp_update_settings' ) ){
      lw_wp_setLivewireDetails();
    }
  }
  
  add_action( 'init', 'lw_wp_check_post' );

  
  //function to set the livewire details for the widget
  function lw_wp_setLivewireDetails(){
    $livewire_number = trim(sanitize_text_field($_POST['livewire_number']));
    $livewire_livelink = trim(sanitize_text_field($_POST['livewire_livelink']));
    global $number_set;
    global $livelink_set;

    $livewire_number  = ltrim($livewire_number, '+');

    if( (get_option('livewire_number') != trim($livewire_number)) || (get_option('livewire_livelink') != trim($livewire_livelink))){
      
      //if $livewire_number is only numbers
      if (ctype_digit($livewire_number)) {
        $number_set = update_option( 'livewire_number', trim($livewire_number));
      }
          
      $livelink_set = update_option('livewire_livelink', trim($livewire_livelink));
    }
  }
?>
