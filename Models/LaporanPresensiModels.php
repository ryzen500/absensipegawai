<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanPresensiModels extends Model {
	protected $DBGroup = 'default';
	protected $table = 'log_presensi';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDelete = false;
	protected $protectFields = true;
	protected $allowedFields = ['id','users_id','check_in','check_out','picture','created_at','created_by','updated_at','category_id','latitude','longitude'];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Validation
	protected $validationRules = [];
	protected $validationMessages = [];
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
