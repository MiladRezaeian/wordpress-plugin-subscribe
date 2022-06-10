<?php

class Admin{

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'init_admin_menu' ) );
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

}

new Admin();