<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PresensiDataModels;

class PresensiDataController extends BaseController {
	private $model;
	function __construct() {
		$this->model = new PresensiDataModels();
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('presensi-data/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			//untuk picture
			$filePicture = $this->request->getFile('picture');
			$filePicture->move('assets');
			$namePicture = $filePicture->getName();

			$this->model->save([
				'users_id' => $this->request->getPost('users_id'),
				'check_in' => $this->request->getPost('check_in'),
				'check_out' => $this->request->getPost('check_out'),
				'picture' => $namePicture
			]);

			$result['success'] = true;
		}

		return view('presensi-data/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$model = new PresensiDataModels();
			$data=$model->find($id);
			$dataLama = $data['picture'];
			$file = $this->request->getFile('picture');

			if($file->isValid() && !$file->hasMoved()){
				if(file_exists("assets/".$dataLama)){
					unlink("assets/".$dataLama);
				}
				$fileName=$file->getName();
				$file->move('assets',$fileName);
			}
			else{
				$fileName=$dataLama;
			}

			$this->model->update(['id' => $id], [
				'users_id' => $this->request->getPost('users_id'),
				'check_in' => $this->request->getPost('check_in'),
				'check_out' => $this->request->getPost('check_out'),
				'picture' => $fileName
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('presensi-data/edit', $result);
	}

	public function hapus($id) {
		$picture=$this->model->find($id);
		
		unlink('assets/'.$picture['picture']);

		$this->model->hapusData($id);
	}
}
