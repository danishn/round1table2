<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
	}
    
    /*
     * URL : /__admin
    */
    public function index()
	{
        session_start();
        try 
        {
            if(isset($_SESSION['adminUser'])) {
                redirect('__admin/home');
            }
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
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
        session_start();
        
        $userName = $this->input->post('userName');
        $password = $this->input->post('password');
        if(!$userName || !$password)
        {
            redirect('__admin?wrong=incomplete_data');    
        }
        
        $this->load->model('Admin_model', 'admin');
        $admin = $this->admin->authenticate($userName, $password);
        
        if(strpos($admin, "wrong") !== false)
        {
            redirect($admin);
        }
        $_SESSION['adminUser'] = $admin;
        redirect('__admin/home');
	}
    
    
    /*
     * URL : /__admin/logout
    */
    public function logout()
	{
        session_start();
        session_unset('adminUser');
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
