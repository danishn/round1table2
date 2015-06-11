<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public $response = array();

    public function index()
	{
        echo "Welcome to Round Table Application APIs";
	}
    
    
    public function member_login()
	{
        if(!$this->auth_service->validate_request())
        {
            $this->response['status'] = 'error';
            $this->response['message']['title'] = 'Access denied';
            $this->response['message']['err_code'] = 401;
            echo json_encode($this->response);
            exit;
        }
        
        
       $member_email = $this->input->post('email');
        $member_otp = $this->input->post('otp');
        
		$this->load->model('Member_model', 'member');
        
        $result = $this->member->login($member_email, $member_otp);
        echo json_encode($result);
	}
    
    public function request_otp()
	{
        $member_email = $this->input->post('email');
        
		$this->load->model('Member_model', 'member');
        
        $otp = $this->member->get_otp($member_email);
        echo json_encode($otp);
	}
    
}
