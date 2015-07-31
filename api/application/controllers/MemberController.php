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
        
        // New fields
        $company = $this->input->post('company');
        $address = $this->input->post('address');
        
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
        
        $members_data = $this->member->update_profile($member_id, $table_id, $email, $fname, $lname, $gender, $mobile, $blood_group, $spouse_name, $dob, $spouse_dob, $anniversary_date, $res_phone, $office_phone, $designation, $res_city, $office_city, $state, $company, $address);
            
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
   

    /*
     * URL POST : /api/member/create
    */
   /* 
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
    */
 /* Author: Rohit */

	/* member panel get my profile info url: /api/members_panel/get_my_profile*/
	
	 public function members_panel_get_my_profile()
	{ 
		$response = new Response();
		$this->load->library('session');
	   if($this->session->userdata('is_logged_in'))
		{
			$member_id=$this->session->userdata('member_id');
			$this->load->model('Member_model','member');
			$member=$this->member->get_members_profile($member_id, $member_id);			
 	  
			if(!is_array($member) && strpos($members_data, 'error') !== false)
			{
				$response->setSuccess('false');
				$response->setdata(null);
				$response->setError(array(
					   'code'=>402,
					   'msg' =>str_replace('error ', '', $members_data)
						));
				$response->respond();
				exit;
			}
			else
			{
				$response->setSuccess('true');
				$response->setdata($member);
				$response->setError(null);              
				$response->respond();
				exit;
			}
		}
		else
		{
			$response->setSuccess('false');
			$response->setdata(null);
			$response->setError(array(
				   'code'=>420,
				   'msg' =>"Not Logged In"
					));
			$response->respond();
			exit;
		}		
	}
    
        
/*
    Author : danish
*/
    	/* member panel get my profile info url: /api/members_panel/get_password*/
	
public function members_panel_get_password()
	{ 
        $email = $this->input->post('email');
    
        $user = $this->doctrine->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email));
        //var_dump($user);exit;
        if($user)
        {
             /*Generate random passrod*/
            $password = mb_strimwidth(md5(time()), 0, 5);
            $user->setPassword($password);
            //var_dump($user);exit;
            try
            {
                $this->doctrine->em->persist($user);
                $this->doctrine->em->flush();

                /*
                 * Send mail here...
                */

                $to = $email;
                $subject = "Your Password for Round Table Nepal Member's Panel.";
                $from = 'welcome@roundtablenepal.org';
                $password = $password;

                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Create email headers
                $headers .= 'From: RTN Admin <'.$from.">\r\n".
                    'Reply-To: '."no-reply@roundtablenepal.org"."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // Compose a simple HTML email message
                $message = file_get_contents('templates/send_password.tpl');
                $message = str_replace("{{password}}", $password, $message);

                // Sending email
                if(mail($to, $subject, $message, $headers)){
                   //return true;
                    echo 'Your New Password has been sent to you on e-mail.';
                } else{
                    //return false;
                    echo 'Unable to send email. Please try again.';
                }

             return true;   

            }catch(Exception $e)
            {
                echo 'error : '. $e->getMessage();
            }
        }else{
            echo 'error Invalid Email Address.';
        }	
	}


}
