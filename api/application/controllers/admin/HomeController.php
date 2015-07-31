<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
    
    //public $response = array();

    function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->file('application/classes/Response.php');
	}
    
    /*
     * URL : /__admin/home
    */
    public function index()
	{
		$resonse=new Response;
       try {
			if (!$this->session->userdata('adminUser')){
			     redirect ( '__admin?msg=session_expired' );
            }
		} catch ( Exception $e ) {
			redirect ( '__admin/error?msg=' . $e->getMessage() );
		}
		if($this->input->get('ajax')=="yes"){
			$this->load->view('home_ajax_view');
		}
		else
		{
			$this->load->view('header');
			$this->load->view('home_view');
			$this->load->view('footer');
		}
	}
    
}
