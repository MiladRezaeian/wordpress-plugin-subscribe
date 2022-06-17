<?php

/** Plugin Name: Subscribe ... */

Subscribe::check_direct_access();

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

	/**
	 * Define All Constants
	 *
	 * @return void
	 */
	private function define_constants() {
		defined( 'DS' ) || define( 'DS', DIRECTORY_SEPARATOR );
		define( 'SUBSCRIBE_DIR', plugin_dir_path( __FILE__ ) );
		define( 'SUBSCRIBE_URL', plugin_dir_url( __FILE__ ) );
		define( 'SUBSCRIBE_CSS', SUBSCRIBE_URL . 'assets/css/' );
		define( 'SUBSCRIBE_JS', SUBSCRIBE_URL . 'assets/js/' );
		define( 'SUBSCRIBE_COMPONENTS', SUBSCRIBE_URL . 'assets/components/' );
		define( 'SUBSCRIBE_INC', SUBSCRIBE_DIR . 'inc' . DS );
		define( 'SUBSCRIBE_VIEWS', SUBSCRIBE_DIR . 'views' . DS );
	}

	/**
	 * Check request and then include files
	 *
	 * @return void
	 */
	private function do_includes() {
		if ( $this->is_request( 'admin' ) ) {
			include SUBSCRIBE_DIR . 'inc' . DS . 'admin' . DS . 'class-admin.php';
		}
	}

	/**
	 * Check request type
	 *
	 * @param $type
	 *
	 * @return bool|void
	 */
	public function is_request( $type ) {
		switch ( $type ) {
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

	private function init() {
		register_activation_hook( __FILE__, array( $this, 'subscribe_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'subscribe_deactivation' ) );
	}

	/**
	 * Run once when plugin active
	 *
	 * @return void
	 */
	public function subscribe_activation() {

	}

	/**
	 * Run once when plugin deactivate
	 *
	 * @return void
	 */
	public function subscribe_deactivation() {

	}

	/**
	 * Check direct access in all files
	 *
	 * @return void
	 */
	public static function check_direct_access() {
		defined( 'ABSPATH' ) || exit('NO ACCESS!!!');
	}

}

Subscribe::getInstance();