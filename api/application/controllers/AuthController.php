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
        echo "<h1>Welcome to Round Table Nepal Application APIs</h1>";
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
        
       
        if(($this->input->post('os') == 'gcm' || $this->input->post('os') == 'apn') && $this->input->post('token'))
        {   
            $os = $this->input->post('os');
            $token = $this->input->post('token');
            $member_id = $this->member->authenticate($email, $otp);
            if(strpos($member_id, "error") !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>$member_id
                    ));
                $response->respond();
                exit;
            }
            //echo $member_id;
            $client_id = $this->member->register($member_id, $os, $token);
            
            if(strpos($client_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>$client_id
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('client_id'=>$client_id));
                $response->setError(null);
                
                $response->respond();
            }
            
        }else
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>402,
                    'msg' =>'os/token not correctly specified'
                ));
            $response->respond();
            exit;
        }
            
            //echo json_encode($result);
        
		
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
