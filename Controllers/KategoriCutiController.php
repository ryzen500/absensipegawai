<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriCutiModels;

class KategoriCutiController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new KategoriCutiModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('kategori-cuti/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

			$fileAttachment = $this->request->getFile('attachment');
			if($fileAttachment ->getError()==4){
				$nameAttachment = 'default.jpg';
			} else{
			//untuk picture
			
			$fileAttachment->move('picture-cuti');
			$nameAttachment = $fileAttachment->getName();

			}

			$this->model->save([
				'users_id' => $this->request->getPost('users_id'),
				'category_id' => $this->request->getPost('category_id'),
				'dates' => $this->request->getPost('dates'),
				'attachment' => $nameAttachment,
				'dates_from' => $this->request->getPost('dates_from'),
				'dates_to' => $this->request->getPost('dates_to'),
				'duration' => $this->request->getPost('duration'),
				'approval1' => $this->request->getPost('approval1'),
				'approval2' => $this->request->getPost('approval2'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}

		return view('kategori-cuti/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			$model = new KategoriCutiModels();
			$data=$model->find($id);
			$dataLama = $data['attachment'];
			$file = $this->request->getFile('attachment');

			if($file->isValid() && !$file->hasMoved()){
				if(file_exists("picture-cuti/".$dataLama)){
					unlink("picture-cuti/".$dataLama);
				}
				$fileName=$file->getName();
				$file->move('picture-cuti',$fileName);
			}
			else{
				$fileName=$dataLama;
			}

			$this->model->update(['id' => $id], [
					'users_id' => $this->request->getPost('users_id'),
					'category_id' => $this->request->getPost('category_id'),
					'dates' => $this->request->getPost('dates'),
					'attachment' => $fileName,
					'dates_from' => $this->request->getPost('dates_from'),
					'dates_to' => $this->request->getPost('dates_to'),
					'duration' => $this->request->getPost('duration'),
					'approval1' => $this->request->getPost('approval1'),
					'approval2' => $this->request->getPost('approval2'),
					'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('kategori-cuti/edit', $result);
	}

	public function hapus($id) {
		$picture=$this->model->find($id);
		
		unlink('picture-cuti/'.$picture['attachment']);

		$this->model->hapusData($id);
	}
}
