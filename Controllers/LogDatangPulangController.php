<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogDatangPulangModels;

class LogDatangPulangController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new LogDatangPulangModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('log-datang-pulang/index', $result);
	}

	public function create() {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {
			// ambil gambar
			$file = $this->request->getFile('attachment');
            // proses upload
            $file->move('gambar');
            

			// memberikan nama gambar agar sesuai dengan database
			$nameimg=$file->getName();
			$this->model->save([
				'category_id' => $this->request->getPost('category_id'),
                'dates' => $this->request->getPost('dates'),
                'attachment' => $nameimg,
                'dates_from' => $this->request->getPost('dates_from'),
                'dates_to' => $this->request->getPost('dates_to'),
                'notes' => $this->request->getPost('notes'),
                'duration' => $this->request->getPost('duration'),
                'approval1' => $this->request->getPost('approval1'),
                'approval2' => $this->request->getPost('approval2'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}

		return view('log-datang-pulang/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

		$model=new LogDatangPulangModels();
		$data=$model->find($id);
		$imgOld=$data['attachment'];
		$file = $this->request->getFile('attachment');

		// membuat kondisi apabila mengganti menggunakan gambar
		if($file->isValid()&& !$file->hasMoved()){
        // jika foto yang lama ada maka foto dihapus kemudian diubah
        if(file_exists("gambar/".$imgOld)){
           unlink("gambar/".$imgOld);
		}
		$namaGambar=$file->getName();
		$file->move("gambar/",$namaGambar);
		}
		else{
			$namaGambar=$imgOld;
		}

			$this->model->update(['id' => $id], [
				'category_id' => $this->request->getPost('category_id'),
                'dates' => $this->request->getPost('dates'),
                'attachment' => $namaGambar,
                'dates_from' => $this->request->getPost('dates_from'),
                'dates_to' => $this->request->getPost('dates_to'),
                'notes' => $this->request->getPost('notes'),
                'duration' => $this->request->getPost('duration'),
                'approval1' => $this->request->getPost('approval1'),
                'approval2' => $this->request->getPost('approval2'),
				'status' => $this->request->getPost('status'),
			]);

			$result['success'] = true;
		}
		$result['data'] = $this->model->getById($id);

		return view('log-datang-pulang/edit', $result);
	}

	public function hapus($id) {
        $model= new LogDatangPulangModels();
		$hapus=$model->find($id);
		Unlink('gambar/'.$hapus['attachment']);
        $this->model->hapusData($id);
	}
}
