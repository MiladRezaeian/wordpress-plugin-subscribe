<?php

/** Plugin Name: Subscribe ... */

defined('ABSPATH') || exit();

final class Subscribe {
	protected static $_instance;

	public static function getInstance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new static;
		}
	}

	private function __construct() {
		$this->define_constants();
		$this->do_includes();
		$this->init();
	}

	private function define_constants() {
		define( 'SUBSCRIBE_DIR', plugin_dir_path( __FILE__ ) );
		define( 'SUBSCRIBE_URL', plugin_dir_url( __FILE__ ) );
		define( 'SUBSCRIBE_CSS', SUBSCRIBE_URL . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR );
		define( 'SUBSCRIBE_JS', SUBSCRIBE_URL . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR );
		define( 'SUBSCRIBE_INC', SUBSCRIBE_DIR . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR );
		define( 'SUBSCRIBE_VIEWS', SUBSCRIBE_DIR . 'views' . DIRECTORY_SEPARATOR );
	}

	private function do_includes() {
		if ( $this->is_request( 'admin' )){
			include SUBSCRIBE_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'class-admin.php';
			include SUBSCRIBE_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'class-admin-abstract.php';
			include SUBSCRIBE_DIR . 'inc' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'class-admin-dashboard.php';
		}
	}

	public function is_request( $type ) {
		switch ( $type ){
			case 'admin':
				return is_admin();
				break;
			case 'ajax':
				return defined( 'DOING_AJAX' );
				break;
			case 'frontend':
				return ! is_admin();
				break;
			
		}
	}

	private function init(){
		register_activation_hook( __FILE__, array( $this, 'subscribe_activation') );
		register_deactivation_hook( __FILE__, array( $this, 'subscribe_deactivation') );
	}

	public function subscribe_activation() {
		
	}

	public function subscribe_deactivation() {
		
	}

	public static function check_direct_access() {
		defined('ABSPATH') || exit();
	}

}

Subscribe::getInstance();