<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModels extends Model {
	protected $DBGroup = 'default';
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDelete = false;
	protected $protectFields = true;
	protected $allowedFields = ['name','person_id','password','picture','email'];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Validation
	// protected $validationRules = [
	// 	'name'=>'required|min_length[3]|max_length[20]',
	// 	'person_id'=>'required',
	// 	'password'=>'required|min_length[3]|max_length[200]',
	// 	'confpassword'  => 'required|matches[password]',
	// 	'email'=> 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]'
	// ];
	protected $validationMessages = [
// 		'name'=>[
// 		'required'=>'Bagian Nama Harus Diisi',
// 		'min_length'=>'Minimal masukkan Nama panggilan'
// 	],
// 	'person_id'=> [
// 		'required'=> 'Masukkan ID pegawai'
// 	],
// 	'email'=>[
// 		'required'=>'Masukkan Email Anda'
// 	],
// 	'password'=>[
// 		'required'=>'Masukkan Password'
// 	],
// 	'confpassword'=>[
// 		'required'=>'Password Tidak Sama'
// 	]
 ];
	protected $skipValidation = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];

	public function getList() {
		return $this->findAll();
	}

	public function hapusData($id = '') {
		return $this->delete(['id' => $id]);
	}

	public function getById($id = '') {
		# code...
		return $this->where('id', $id)
			->get()
			->getRowArray();
	}



}
