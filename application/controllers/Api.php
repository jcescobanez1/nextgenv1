<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//require_once APPPATH . 'models/Api_Model.php';

class Api extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('api_model');
	}
    public function index()
    {
        echo "nextgen_api";
       
    }
 
	public function login()
    {
        

        $user_id = $_POST['user_id'];
		$password = $_POST['password'];
 
		$data = $this->api_model->login_model($user_id, $password);
 
		if($data){
            $return['status'] = "SUCCESS";
            $return['message'] = "User Logged In Successfully.";
            unset($data['password']);

            $return['result'] = $data;

			echo json_encode($return, true);
		}
		else{
			$return['status'] = "FAILED";
            $return['message'] = "Incorrect Username or Password.";
                     

        
            echo json_encode($return);
		} 
		
	}

    public function register()
    {
        $user = [];
        $user = [
            'user_id' => $_POST['user_id'],
            'password' => $_POST['password'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'contact' => $_POST['contact'],
            'imei' => $_POST['imei'],
        ];
        $data = $this->api_model->register_model($user);

        if($data = true){
            $return['status'] = "SUCCESS";
            $return['message'] = "User Registered Successfully.";
            unset($data['password']);

            $return['result'] = $data;

			echo json_encode($return, true);
		}
		else{
			$return['status'] = "FAILED";
            $return['message'] = "Failed";
                     

        
            echo json_encode($return);
		} 
 
    }
 
	
}

