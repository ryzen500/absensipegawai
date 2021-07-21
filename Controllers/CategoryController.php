<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\categoryModels;

class CategoryController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new categoryModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('category/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$this->model->save([
				'name' => $this->request->getPost('name'),
				'ref_days' => $this->request->getPost('ref_days'),
				'type' => $this->request->getPost('type'),
				'users_id' => $this->request->getPost('users_id'),
			]);

			$result['success'] = true;
		}

		return view('category/create', $result);
	}


	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

			$this->model->update(['id' => $id], [
				'name' => $this->request->getPost('name'),
				'ref_days' => $this->request->getPost('ref_days'),
				'type' => $this->request->getPost('type'),
				'users_id' => $this->request->getPost('users_id'),
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('category/edit', $result);
	}

	public function hapus($id) {

		$this->model->hapusData($id);
	}
}
