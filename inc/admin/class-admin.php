<?php

class Admin{

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'init_admin_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'add_assets'));
    }

    public function init_admin_menu() {
        $dashboard_page = new AdminDashboard();
        add_menu_page( 
                    'Subscribe Plugin', 
                    'Subscribe', 
                    'manage_options', 
                    'subscribers', 
                    array( $dashboard_page, 'index' )
        );
    }

    public function add_assets() {
        wp_register_style( 'subscribe_main_style', SUBSCRIBE_CSS . 'main.css');

        wp_enqueue_style( 'subscribe_main_style' );
    }

}

new Admin();