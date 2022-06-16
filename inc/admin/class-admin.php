<?php

class Admin {

	public function __construct() {
		$this->do_includes();
		add_action( 'admin_menu', array( $this, 'init_admin_menu' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'add_assets'));
	}

	public function init_admin_menu() {
		$dashboard_page      = new AdminDashboard();
		$lists_page          = new AdminLists();
		$dashboard_page_hook = add_menu_page(
			'Subscribe Plugin',
			'Subscribe',
			'manage_options',
			'subscribers',
			array( $dashboard_page, 'index' )
		);
		add_submenu_page(
			'subscribers',
			'Dashboard',
			'Dashboard',
			'manage_options',
			'subscribers'
		);
		add_submenu_page(
			'subscribers',
			'Subscribes Management',
			'Subscribers list',
			'manage_options',
			'subscribers_list',
			array( $lists_page, 'index' )
		);

		add_action( "load-{$dashboard_page_hook}", function () {
			$this->add_assets();
		} );
	}

	public function add_assets() {
		wp_register_style( 'subscribe_main_style', SUBSCRIBE_CSS . 'subscribe-main.css' );
		wp_register_script( 'subscribe_main_script', SUBSCRIBE_JS . 'subscribe-main.js', array( 'jquery' ) );
		wp_register_style( 'uikit_style', SUBSCRIBE_COMPONENTS . 'uikit/css/uikit.min.css' );
		wp_register_script( 'uikit_js', SUBSCRIBE_COMPONENTS . 'uikit/js/uikit.min.js', array( 'jquery' ) );

		wp_enqueue_style( 'subscribe_main_style' );
		wp_enqueue_script( 'subscribe_main_script' );
		wp_enqueue_style( 'uikit_style' );
		wp_enqueue_script( 'uikit_js' );
	}

	private function do_includes() {
		include SUBSCRIBE_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'class-admin-abstract.php';
		include SUBSCRIBE_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'subscribe-admin-pages-autoloader.php';
	}

}

new Admin();