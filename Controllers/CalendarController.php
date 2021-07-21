<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CalendarModels;

class CalendarController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new CalendarModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('Calendar/index', $result);
	}
}
