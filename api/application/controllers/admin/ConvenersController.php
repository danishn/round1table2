<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConvenersController extends CI_Controller {
    
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
     * URL GET : /api/conveners/get_all
    */
    
    public function get_conveners()
	{ 
      $response = new Response();
        
        $this->load->model('Conveners_model', 'conveners');
        
        $conveners_list = $this->conveners->get_all();
            
            if(!is_array($conveners_list) && strpos($conveners_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $conveners_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('conveners_list'=>$conveners_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
   
    /*
     * URL POST : /api/conveners/search
    */
    
    public function search_conveners()
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
        
        $this->load->model('Conveners_model', 'conveners');
        
        $conveners_list = $this->conveners->find_conveners($search_by, $search_key);
            
            if(!is_array($conveners_list) && strpos($conveners_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $conveners_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('conveners_list'=>$conveners_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
    /*
     * URL POST : /api/conveners/create
    */
    
    public function create_conveners()
	{ 
        $response = new Response();
        
        $member_id = $this->input->post('member_id');
        $name = $this->input->post('name');
        $table_code = $this->input->post('table_code');
        $designation = $this->input->post('designation');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $details = $this->input->post('details');
        
        
        if(!$table_code || !$designation || !$member_id || !$email || !$mobile || !$name)
        {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' => 'Failed due to incomplete Data.'
                    ));
                $response->respond();
                exit;
        }
        
        
        $this->load->model('Conveners_model', 'conveners');
        $conveners_id = $this->conveners->add_conveners($member_id, $name, $table_code, $designation, $email, $mobile, $details);
            
            if(!is_int($conveners_id) && strpos($conveners_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $conveners_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('msg'=>'Convener Created Successfully'));
                $response->setError(null);
                
                $response->respond();
            }
	}
    
}
