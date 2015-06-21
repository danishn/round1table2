<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
        
        $response = new Response();
        
        if(!$this->auth_service->valid_request)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'Status_code'=>401,
                    'Error_Message' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
	}
    
    /*
     * URL : /api
    */
    
    public function index()
	{
        echo "<h1>Welcome to Round Table Nepal Application APIs</h1>";
	}
    
    
     /*
     * Page Not Found Error
    */
    
    public function error404()
	{
        $response = new Response();

        $response->setSuccess('false');
        $response->setdata(null);
        $response->setError(array(
                'code'=>404,
                'msg' =>'Page Not Found- Check Request URL'
            ));
        $response->respond();
        exit;
	}
    
    
    
    /*
     * URL POST : /api/login
    */
    
    public function login()
	{ 
      $response = new Response();
        
        $email = $this->input->post('email');
        $otp = $this->input->post('otp');
        //var_dump($otp);exit;
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
                        'msg' =>str_replace('error ', '', $member_id)
                    ));
                $response->respond();
                exit;
            }
            //echo $member_id;
            $member_info = $this->member->register($member_id, $os, $token);
            //var_dump($member_info);exit;    
            if(!is_array($member_info) && strpos($member_info, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $member_info)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('member_info'=>$member_info));
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
    
    
    /*
     * URL POST : /api/request_otp
    */
    
    public function request_otp()
	{
        $response = new Response();
        
        $email = $this->input->post('email');
        //echo $this->auth_service->valid_request; exit;
        if(!$email)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>'E-mail Not specified'
                ));
            $response->respond();
            exit;
        }
        
        $this->load->model('Member_model', 'member');
        $status = $this->member->send_otp($email);
        
        if(strpos($status, 'error') !== false)
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>str_replace('error ', '', $status)
                ));
            $response->respond();
            exit;
        }else
        {
            $response->setSuccess('true');
            $response->setdata(array('msg'=>'OTP Sent Successfully'));
            $response->setError(null);

            $response->respond();
        }
        
	}
    
    
    
    /*
     * URL POST : /api/access_request
    */
    
    public function access_request()
	{
        $response = new Response();
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $table_name = $this->input->post('table_name');
        
        if(!$name || !$email || !$table_name)
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>'Invalid Data name/email/table_name'
                ));
            $response->respond();
            exit;
        }
        
		$this->load->model('Access_requests_model', 'access_request');
        $status = $this->access_request->register_request($name, $email, $table_name);
        
        if(strpos($status, 'error') !== false)
        {
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>str_replace('error ', '', $status)
                ));
            $response->respond();
            exit;
        }else
        {
            $response->setSuccess('true');
            $response->setdata(array('msg'=>'Request Submitted Successfully.'));
            $response->setError(null);

            $response->respond();
        }
        
        
	}
    
}
