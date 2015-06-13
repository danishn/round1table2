<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
        
	}
    
    public function index()
	{
        echo "Welcome to Round Table Application APIs";
	}
    
    
    public function login()
	{ 
      $response = new Response();
        
        if(!$this->auth_service->valid_request)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
        
        
        $email = $this->input->post('email');
        $otp = $this->input->post('otp');
        
        if(!$email || !$otp)
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>'Email/OTP not speceified'
                ));
            $response->respond();
            exit;
        }
        
        
        $this->load->model('Member_model', 'member');
        
       
        if($this->input->post('user_agent') == 'gcm' && $this->input->post('gcm_id'))
        {
            $gcm_id = $this->input->post('gcm_id');
            $result = $this->member->login($email, $otp, $gcm_id);
        }elseif($this->input->post('user_agent') == 'apn' && $this->input->post('apn_id'))
        {
            $apn_id = $this->input->post('apn_id');
            $result = $this->member->login($email, $otp, $apn_id);
        }else
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>402,
                    'msg' =>'user_agent/id not correctly specified'
                ));
            $response->respond();
            exit;
        }
            
            echo json_encode($result);
        
		
	}
    
    public function request_otp()
	{
        $member_email = $this->input->post('email');
        
		$this->load->model('Member_model', 'member');
        
        $otp = $this->member->get_otp($member_email);
        echo json_encode($otp);
	}
    
    public function access_request()
	{
        $request_email = $this->input->post('email');
        $request_table = $this->input->post('table_name');
        $request_name = $this->input->post('name');
        
        
		//$this->load->model('Member_model', 'member');
        
        //$otp = $this->member->get_otp($member_email);
        echo 'Request Sent for approval';
	}
    
}
