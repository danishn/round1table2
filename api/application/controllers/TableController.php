<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TableController extends CI_Controller {
    
    //public $response = array();

    function __construct()
    {
		parent::__construct();
		$this->load->file('application/classes/Response.php'); 
        
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
	}
    
    /*
     * URL GET : /api/table/get_all
    */
    
    public function get_tables()
	{ 
      
        
        $this->load->model('Table_model', 'table');
        
        $table_list = $this->table->get_all();
            
            if(!is_array($table_list) && strpos($table_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $table_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('table_list'=>$table_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
    
     /*
     * URL GET : /api/table/($table_id)/get_members
    */
    
    public function get_members($table_id)
	{ 
        $response = new Response();
        //echo "welcome $table_id";exit;
        
        $this->load->model('Member_model', 'member');
        
        $members_list = $this->member->get_members($table_id);
            
            if(!is_array($members_list) && strpos($members_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $members_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('members_list'=>$members_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
    
    /*
     * URL POST : /api/table/create
    */
    
    public function create_table()
	{ 
      $response = new Response();
        
        $this->load->model('Table_model', 'table');
        
        $name = $this->input->post('table_name');
        $code = $this->input->post('table_code');
        $desc = $this->input->post('table_desc');
        $bigUrl = $this->input->post('table_big_url');
        $thumbUrl = $this->input->post('table_thumb_url');
        $members = $this->input->post('table_members_count');
        
        $table_id = $this->table->add_table($name, $code, $desc, $bigUrl, $thumbUrl, $members);
            
            if(!is_int($table_id) && strpos($table_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $table_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('table_id'=>$table_id));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
}
