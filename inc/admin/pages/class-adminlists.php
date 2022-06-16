<?php

class AdminLists extends AdminPageContract{

	public function __construct() {
		parent::__construct();
		$this->page_title = 'lists';
	}

	public function index():void {
        $this->load_view('admin.pages.lists.index', array(
			'page_title' => $this->page_title
        ),'lists');
    }

}