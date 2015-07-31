<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
		$this->load->library('session');
	}
    
    /*
     * URL : /__admin
    */
    public function index()
	{
        try 
        {
            if($this->session->userdata('adminUser')) {
               // redirect('__admin/home');
            }
            $this->load->view('login_view');
        } catch(Exception $e){
            $response->setSuccess(false);
            $response->setError(array('msg' => $e->getMessage()));
            print_r($e);
            redirect('__admin/error');
        }
	}
    
    /*
     * URL : /__admin/authenticate
    */
    public function authenticate()
	{  
        //session_start();
        $response = new Response();
        $userName = $this->input->post('userName');
        $password = $this->input->post('password');
        if(!$userName || !$password)
        {
            //redirect('__admin?wrong=incomplete_data');
			 $response->setSuccess('false');
             $response->setdata(null);
             $response->setError(array(
                        'code'=>402,
                        'msg' =>"Invalid Username or Password"
                    ));
             $response->respond();
        }
        
        $this->load->model('Admin_model', 'admin');
        $admin = $this->admin->authenticate($userName, $password);
        
        if(strpos($admin, "wrong") !== false)
        {
            //redirect($admin);
			$response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                        'code'=>402,
                        'msg' =>"Invalid Username or Password"
                    ));
            $response->respond();
        }else{
			//$_SESSION['adminUser'] = $admin;
			$this->session->set_userdata('adminUser',true);
			$response->setSuccess('true');
            $response->setError(null);
            $response->setdata(array(
                        'code'=>111,
                        'url' =>base_url('__admin/home')
                    ));
            $response->respond();
		}
        //redirect('__admin/home');
	}
    
    
    /*
     * URL : /__admin/logout
    */
    public function logout()
	{
	  $this->session->sess_destroy();
        redirect('__admin');
    }

    /*
     * URL : /error
    */
    public function error()
	{
        echo "<h1>Something went wrong!</h1>";
    }
    
    
}
