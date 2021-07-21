<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanLogPekerjaanModels extends Model {
	protected $DBGroup = 'default';
	protected $table = 'log_pekerjaan';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDelete = false;
	protected $protectFields = true;
	protected $allowedFields = ['log_aktivitas','notes','approval','status'];

	// Dates
	protected $useTimestamps = false;
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