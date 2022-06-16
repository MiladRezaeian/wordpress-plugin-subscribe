<?php

abstract class AdminPageContract {

    protected $page_title;

    public function __construct() {
        
    }

    abstract public function index():void;

    public function load_view( $view_name, array $params = null, $layout = 'default' ) {
        $file_path = SUBSCRIBE_VIEWS;
        $file_name = str_replace( '.', DS, $view_name);
        $file_path = $file_path . DS . $file_name . '.php';
        if( is_file($file_path) && is_readable($file_path) ){
            if( ! is_null($params) && is_array($params) && count($params) > 0 ){
                extract($params);
            }
            include SUBSCRIBE_VIEWS . DS . 'layouts' . DS . $layout . '.php';
        }
    }

}