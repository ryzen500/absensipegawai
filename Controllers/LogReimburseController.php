<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogReimburseModels;

class LogReimburseController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new LogReimburseModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('log-reimburse/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$this->model->save([
				'reimburse_cat' => $this->request->getPost('reimburse_cat'),
                'notes' => $this->request->getPost('notes'),
                'event' => $this->request->getPost('event'),
                'payment' => $this->request->getPost('payment'),
                'payment_to' => $this->request->getPost('payment_to'),
                'payment_date' => $this->request->getPost('payment_date'),
			]);

			$result['success'] = true;
		}

		return view('log-reimburse/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

			$this->model->update(['id' => $id], [
				'reimburse_cat' => $this->request->getPost('reimburse_cat'),
                'notes' => $this->request->getPost('notes'),
                'event' => $this->request->getPost('event'),
                'payment' => $this->request->getPost('payment'),
                'payment_to' => $this->request->getPost('payment_to'),
                'payment_date' => $this->request->getPost('payment_date'),
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('log-reimburse/edit', $result);
	}

	public function hapus($id) {

		$this->model->hapusData($id);
	}
}
