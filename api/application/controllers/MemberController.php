<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {
    
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
                    'Status_code'=>401,
                    'Error_Message' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
	}

    /*
     * URL GET : /api/member/get_all
    */
    
    public function get_members()
	{ 
      $response = new Response();
        
        $this->load->model('Member_model', 'member');
        
        $members_list = $this->member->get_all();
            
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
     * URL POST : /api/member/search
    */
    
    public function search_members()
	{ 
      $response = new Response();
        
        $search_by = $this->input->post('searchBy');
        $search_key = $this->input->post('searchKey');
        
        //echo $search_by."=>".$search_key;exit;
        
        if(!$search_by || !$search_key)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>402,
                    'msg' =>'Invalid Get Parameters'
                ));
            $response->respond();
            exit;
        }
        
        $this->load->model('Member_model', 'member');
        
        $members_list = $this->member->find_members($search_by, $search_key);
            
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
     * URL POST : /api/member/create
    */
    
    public function create_member()
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
