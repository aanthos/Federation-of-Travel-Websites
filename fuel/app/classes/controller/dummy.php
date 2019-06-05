<?php

use Model\Demo;

class Controller_dummy extends Controller {

	public function action_getTable() {
		$table = View::forge('dummy/index');
		
		$demos = Demo::getAll();
		
		$table->set_safe('rows',$demos);
		
		return $table;
		
	}
}
