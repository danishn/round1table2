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
    
    
    /*
     * URL POST : /api/member/edit_profile
    */
    
    public function edit_profile()
	{ 
        $response = new Response();
        
        $member_id = $this->input->post('member_id');
        $table_id = $this->input->post('table_id');
        $email = $this->input->post('email');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $gender = $this->input->post('gender');
        $mobile = $this->input->post('mobile');
        $blood_group = $this->input->post('blood_group');
        $spouse_name = $this->input->post('spouse_name');
        $dob = $this->input->post('dob');
        $spouse_dob = $this->input->post('spouse_dob');
        $anniversary_date = $this->input->post('anniversary_date');
        
        $res_phone = $this->input->post('res_phone');
        $office_phone = $this->input->post('office_phone');
        $designation = $this->input->post('designation');
        $res_city = $this->input->post('res_city');
        $office_city = $this->input->post('office_city');
        $state = $this->input->post('state');
        
        if(!$member_id || !$table_id || !$email || !$fname || !$gender || !$mobile || !$blood_group || !$spouse_name || !$dob ||!$spouse_dob || !$anniversary_date)
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
        
        $this->load->model('Member_model', 'member');
        
        $members_data = $this->member->update_profile($member_id, $table_id, $email, $fname, $lname, $gender, $mobile, $blood_group, $spouse_name, $dob, $spouse_dob, $anniversary_date, $res_phone, $office_phone, $designation, $res_city, $office_city, $state);
            
            if(!is_array($members_data) && strpos($members_data, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $members_data)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('updated_info' => $members_data));
                $response->setError(null);
                
                $response->respond();
            }
	}
   


}
