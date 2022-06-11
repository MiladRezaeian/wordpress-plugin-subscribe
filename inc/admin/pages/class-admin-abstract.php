<?php

abstract class AdminPageContract {

    public function __construct() {
        
    }

    abstract public function index():void;

    public function load_view( $view_name, array $params) {
        
    }

}