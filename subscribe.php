<?php


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
	}

	private function define_constants() {
		define( 'subscribe_dir', plugin_dir_path( __FILE__ ) );
		define( 'subscribe_url', plugin_dir_url( __FILE__ ) );
	}

	private function do_includes() {
	}
}

Subscribe::getInstance();