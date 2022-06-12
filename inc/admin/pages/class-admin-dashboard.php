<?php

Subscribe::check_direct_access();

class AdminDashboard extends AdminPageContract{
    
    public function __construct() {
        parent::__construct();
        $this->page_title = 'Subscribe';
    }

    public function index():void {
        $this->load_view( 'admin.pages.dashboard.index', array(
            'page_title' => $this->page_title
        ));
    }

}