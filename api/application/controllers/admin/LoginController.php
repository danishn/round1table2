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
        $_SESSION['adminUser'] ='aa';
        session_unset('adminUser');
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
     * URL : /__admin/home
    */
    public function home()
	{
        try {
			session_start ();
			if (!isset ( $_SESSION ['adminUser'] )){
			     redirect ( '__admin' );
            }
		} catch ( Exception $e ) {
			redirect ( '__admin/error?msg=' . $e->getMessage() );
		}
    
        $this->load->view('home');
    }
    
    
    /*
     * URL : /__admin/error
    */
    public function error()
	{
        echo "<h1>Something went wrong></h1>";
    }
    
}
