<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
	}
    
    /*
     * URL : /__admin/home
    */
    public function index()
	{
       try {
			session_start ();
			if (!isset ( $_SESSION ['adminUser'] )){
			     redirect ( '__admin?msg=session_expired' );
            }
		} catch ( Exception $e ) {
			redirect ( '__admin/error?msg=' . $e->getMessage() );
		}
    
        $this->load->view('home',array('user'=>$_SESSION['adminUser']));
	}
    
}
