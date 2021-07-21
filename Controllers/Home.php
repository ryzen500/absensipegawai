<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\dashboardModels;
class Home extends BaseController {

	private $dashboardModels;
	function __construct($foo = null) {
		$this->dashboardModels= new dashboardModels();
	}

	public function index() {

	
		$data['total']=$this->dashboardModels->get_all_categories();
// var_dump($data);
		$data['masuk']=$this->dashboardModels->get_data_from_log_cuti();
		$data['sakit']=$this->dashboardModels->get_data_log_cuti_sakit();
		$data['hamil']=$this->dashboardModels->get_data_log_cuti_hamil();
		$data['urgent']=$this->dashboardModels->get_data_log_cuti_penting();
		// $data['April']=$this->dashboardModels->data_bulan_april();
		// $data['penting']=$this->dashboardModels->get_data_Detail_penting();
		// $data['detail_sakit']=$this->dashboardModels-> get_data_Detail_sakit();

		$data['grafik']=$this->dashboardModels->getData();

		// $data['April']=$this->dashboardModels->data_bulan_juni();


		return view('post',$data);

		// return view('post');
	}
}
