<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\logPekerjaanmodels;

class logPekerjaancontroller extends BaseController {
	private $model;

	function __construct() {
		$this->model = new logPekerjaanmodels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('log-pekerjaan/index', $result);
	}

	public function create() {
		$result['success'] = false;


		if ($this->request->getMethod() === 'post') {
			$file=$this->request->getfile('attachment'); 
			$file->move('img');
			$namagambar=$file->getName();
		if ($this->request->getMethod() === 'post') {
			$this->model->save([
				'users_id' => $this->request->getPost('users_id'),
                'log_aktivitas' => $this->request->getPost('log_aktivitas'),
				'notes' => $this->request->getPost('notes'),
				'attachment' => $namagambar,
				'approval' => $this->request->getPost('approval'),
				'status' => $this->request->getPost('status'),

			]);

			$result['success'] = true;
		}
	}
	return view('log-pekerjaan/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$model=new logPekerjaanmodels();
			$data=$this->model->find($id);
			$imgLama=$data['attachment'];
			$file=$this->request->getfile('attachment');
			

			//gantigambar
			if($file->isValid()&& !$file->hasMoved()){
			//ubahgambar
			if(file_exists("img/".$imgLama)){
				unlink("img/".$imgLama);
			}
			$namagambar=$file->getName();
			$file->move("img",$namagambar);
			}
			else{
				$namagambar=$imgLama;
			}

			$this->model->update(['id' => $id], [
				'users_id' => $this->request->getPost('users_id'),
                'log_aktivitas' => $this->request->getPost('log_aktivitas'),
				'notes' => $this->request->getPost('notes'),
				'attachment' =>$namagambar,
				'approval' => $this->request->getPost('approval'),
				'status' => $this->request->getPost('status'),

			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('log-pekerjaan/edit', $result);
	}


	public function hapus($id) {
		$picture=$this->model->find($id);
		
		unlink('img/'.$picture['attachment']);

		$this->model->hapusData($id);
	}
}
