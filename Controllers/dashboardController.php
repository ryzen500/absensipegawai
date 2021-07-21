<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\dashboardModels;

class dashboardController extends BaseController{
private $dashboardModels;

function __construct(){
$this->dashboardModels= new dashboardModels();
}

public function index(){
$data['total']=$this->dashboardModels->get_all_categories();
// var_dump($data);
$data['masuk']=$this->dashboardModels->get_data_from_log_cuti();
$data['sakit']=$this->dashboardModels->get_data_log_cuti_sakit();
$data['hamil']=$this->dashboardModels->get_data_log_cuti_hamil();
$data['urgent']=$this->dashboardModels->get_data_log_cuti_penting();
return view('post',$data);
}


// //This Data Just Only For One But This data is so very usefull
// public function kategori()
// {
    
// }
}

?>