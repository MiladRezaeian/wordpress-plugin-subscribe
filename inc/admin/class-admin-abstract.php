<?php

Subscribe::check_direct_access();

abstract class AdminPageContract {

	protected $page_title;

	public function __construct() {
	}

	abstract public function index(): void;

	/**
	 * Load view
	 * Layout is to avoid repeatation in header.
	 *
	 * @param $view_name
	 * @param array|null $params
	 * @param string $layout
	 *
	 * @return void
	 */
	public function load_view( $view_name, array $params = null, string $layout = 'default' ) {
		$file_path = SUBSCRIBE_VIEWS;
		$file_name = str_replace( '.', DS, $view_name );
		$file_path = $file_path . DS . $file_name . '.php';
		if ( is_file( $file_path ) && is_readable( $file_path ) ) {
			if ( ! is_null( $params ) && is_array( $params ) && count( $params ) > 0 ) {
				extract( $params );
			}
			include SUBSCRIBE_VIEWS . DS . 'layouts' . DS . $layout . '.php';
		}
	}

}