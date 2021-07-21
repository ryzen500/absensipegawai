<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanPresensiModels;

class LaporanPresensiController extends BaseController {
	private $model;
	function __construct() {
		$this->model = new LaporanPresensiModels();
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('laporan-presensi/index', $result);
	}

}
