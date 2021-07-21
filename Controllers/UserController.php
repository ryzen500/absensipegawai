<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModels;

class UserController extends BaseController {
	private $model;

	function __construct() {
		$this->model = new UserModels();
		
	}
	public function index() {

		$result['data'] = $this->model->getList();
		return view('user/index', $result);
	}

	public function create() {
		$result['success'] = false;


		//Validasi
		if ($this->request->getMethod() === 'post') {
	
			$rules=[
				'person_id'=>'required|min_length[1]|max_length[20]',
				'name'=>'required|min_length[3]|max_length[20]',
				'password'=>'required|min_length[3]|max_length[200]',
				// 'picture' => 'uploaded[picture]|max_size[picture,1024]',
				'email'=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]'

			];
				//ambil gambar
				$fileGambar=$this->request->getFile('picture');
				//Memberikan move_upload_file
				$fileGambar->move('assets');
		
				//ambil NamaFoto sampul 
				$namaGambar=$fileGambar->getName();
			if($this->validate($rules)){
				$data=[
					'name'=>$this->request->getPost('name'),
					'person_id'=>$this->request->getPost('person_id'),
					'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'picture'=>$namaGambar,
					'email'=>$this->request->getPost('email')
				];
				$this->model->save($data);
				$result['success'] = true;
			}else{
				$data['validation'] = $this->validator;
				echo view('user/create', $data);
			}
	
		// $namaGambar=$fileGambar->getName();
		}

		return view('user/create', $result);
	}

	public function edit($id = '') {
		$result['success'] = false;

		if ($this->request->getMethod() === 'post') {

			$rules=[
				'person_id'=>'required|min_length[0]|max_length[20]',
				'name'=>'required|min_length[3]|max_length[20]',
				'confpassword'  => 'matches[password]',
			];
			$model =new UserModels();

			$dataImg=$model->find($id);
			$GambarLama =$dataImg['picture'];
			$file =$this->request->getFile('picture');
			// dd($this->request);
			if($file->isValid() && !$file->hasMoved())
			{
				if(file_exists("assets/".$GambarLama)){
					unlink("assets/".$GambarLama);
				}

				$namaGambar=$file->getName();
				$file->move('assets/',$namaGambar);
			}
			else{
				$namaGambar=$GambarLama;
			}

		

			if($this->validate($rules)){
				$data=[
					'name'=>$this->request->getPost('name'),
					'person_id'=>$this->request->getPost('person_id'),
					'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'picture'=>$namaGambar,
					'email'=>$this->request->getPost('email')
				];
				$this->model->update(['id' => $id], $data);

				$result['success'] = true;
			}else{
				$result['validation']=$this->validator;
			}
		
		}
		$result['data'] = $this->model->getById($id);

		return view('user/edit', $result);
	}

	public function hapus($id) {

		$model= new UserModels;

		$data=$model->find($id);
		$imagefile=$data['picture'];

		if(file_exists("assets/".$imagefile))
		{
			unlink("assets/".$imagefile);
		}
		$this->model->hapusData($id);
	}
}
