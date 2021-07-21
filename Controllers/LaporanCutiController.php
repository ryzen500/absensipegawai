<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanCutiModels;

class LaporanCutiController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new LaporanCutiModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('laporan-cuti/index', $result);
	}

}
