<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\logLemburmodels;

class logLemburcontroller extends BaseController {
	private $model;

	function __construct() {
		$this->model = new logLemburmodels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		 
		return view('logLembur/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$file=$this->request->getfile('attachment'); 
			$file->move('img');
			$namagambar=$file->getName();
		if ($this->request->getMethod() === 'post') {
			$this->model->save([
				'user_id' => $this->request->getPost('user_id'),
                'dates' => $this->request->getPost('dates'),
                'attachment' => $namagambar,
                'dates_from' => $this->request->getPost('dates_from'),
                'dates_to' => $this->request->getPost('dates_to'),
				'notes' => $this->request->getPost('notes'),
                'duration' => $this->request->getPost('duration'),
				'approval' => $this->request->getPost('approval'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}
	}
		return view('logLembur/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$model=new logLemburmodels();
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
				'user_id' => $this->request->getPost('user_id'),
                'dates' => $this->request->getPost('dates'),
                'attachment' => $namagambar,
                'dates_from' => $this->request->getPost('dates_from'),
                'dates_to' => $this->request->getPost('dates_to'),
				'notes' => $this->request->getPost('notes'),
                'duration' => $this->request->getPost('duration'),
				'approval' => $this->request->getPost('approval'),
				'status' => $this->request->getPost('status'),
				
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('logLembur/edit', $result);
	}

	public function hapus($id) {
		$attachment=$this->model->find($id);
		unlink('img/'.$attachment['attachment']);
		$this->model->hapusData($id);
	}
  
}