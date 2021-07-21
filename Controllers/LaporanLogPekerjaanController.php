<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanLogPekerjaanModels;

class LaporanLogPekerjaanController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new LaporanLogPekerjaanModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('laporan-log-pekerjaan/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$this->model->save([
				'log_aktivitas' => $this->request->getPost('log_aktivitas'),
				'notes' => $this->request->getPost('notes'),
				'aprroval' => $this->request->getPost('aprroval'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}

		return view('laporan-log-pekerjaan/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

			$this->model->update(['id' => $id], [
				'log_aktivitas' => $this->request->getPost('log_aktivitas'),
				'notes' => $this->request->getPost('notes'),
				'aprroval' => $this->request->getPost('aprroval'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('laporan-log-pekerjaan/edit', $result);
	}

	public function hapus($id) {

		$this->model->hapusData($id);
	}
}
