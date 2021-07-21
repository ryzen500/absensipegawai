<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModels;

class LoginController extends BaseController {
	private $model;
      
      function __construct(){
	$this->model = new LoginModels();
	}

	public function index(){
	$result['data']=$this->model->getList();
	return view('/login-v2', $result);
}

	public function auth(){
	$session=session();
	$model=new LoginModels();
	$email =$this->request->getPost('email');
	$password=$this->request->getPost('password');
	
	$data =$model->where('email',$email)->first();
	if($data){
	$pass=$data['password'];
	$very_pass=password_verify($password, $pass);
	if($very_pass){
	$ses_data=[
	'id'=>$data['id'],
	'name'=>$data['name'],
	'email'=>$data['email'],
	'picture'=>$data['picture'],
	'logged_in'=>TRUE];
	$session->set($ses_data);
	return redirect()->to('/Home');
	}else{
	$session->setFlashdata('msg','Wrong Password');
	return view('/login-v2');
	}
	}else{
		$session->setFlashdata('msg','Email Is Not Found');
		return view('/login-v2');
	}
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login-v2');
    }
}
?>