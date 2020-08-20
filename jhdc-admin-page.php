<?php

/*
Plugin Name: JHDC Admin Page
Plugin URI: https://jimmyhowe.com
Description: JHDC
Version: 0.1.0
Author: JimmyHowe.com Ltd
Author URI: https://jimmyhowe.com
License: JimmyHowe.com Ltd 2020
Text Domain: jimmyhowedotcom
*/

/**
 * JHDC Admin Page
 */
function jhdc_admin_page_plugin_setup_admin_bar()
{
    add_menu_page(__('JHDC Plugin', 'jimmyhowedotcom'), __('JHDC', 'jimmyhowedotcom'), 'manage_options', 'jhdc-plugin',
        'jhdc_admin_page', plugin_dir_url(__FILE__) . 'assets/images/JHDC_Logo_16x16.png', 2);
}

add_action('admin_menu', 'jhdc_admin_page_plugin_setup_admin_bar');

/**
 * Include the admin page
 */
function jhdc_admin_page()
{
    include_once 'includes/admin-page.php';
}

/**
 * Updates the REST API url to api/wp/v2 instead of wp-json.
 *
 * @param $slug
 *
 * @return string
 */
function update_rest_url_prefix(string $slug)
{
    return 'api';
}

add_filter('rest_url_prefix', 'update_rest_url_prefix');

include_once 'includes/jhdc-dashboard-widget.php';


function wpb_custom_logo()
{
    echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . plugin_dir_url(__FILE__) . '/assets/images/JHDC_Logo_16x16.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

function remove_footer_admin () {

    echo '<a href="https://jimmyhowe.com" target="_blank">JimmyHowe.com</a>';

}

add_filter('admin_footer_text', 'remove_footer_admin');
