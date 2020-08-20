<?php

add_action('wp_dashboard_setup', 'jhdc_dashboard_widget');

function jhdc_dashboard_widget()
{
    global $wp_meta_boxes;

    wp_add_dashboard_widget('jhdc_dashboard_widget', 'JHDC Support', 'jhdc_dashboard_widget_callback');
}

function jhdc_dashboard_widget_callback()
{
    require plugin_dir_path(__FILE__) . "../widgets/dashboard.widget.php";
}
