<?php

/*
 *  Reference :: http://codesamplez.com/development/using-doctrine-with-codeigniter
*/

class Auth_service {
 
  /**
   * @var EntityManager $em 
   */
    public $valid_request = null;
    public $admin_status = null;
 
  /**
   * constructor
   */
  public function __construct()
  {
    $this->valid_request = $this->validate_request();
    $this->admin_status = $this->check_admin();
    
  } 

    
    /**
   * Authenticate API request
   * @return true/false
   */
 public function validate_request()
 {
    $headers = apache_request_headers();
    //var_dump($headers);exit;
     if(isset($headers['Api-Key']) && $headers['Api-Key'] == '1234')
     {
         return true;
     }else{
        return false;
     }
    
 }

    
    /**
   * Check Admin
   * @return true/false
   */
 public function validate_request()
 {
    // TODO
     $this->load->library('session');
     
     if($this->session->userdata('admin'))
     {
        return true;
     }
     return false;
 }

}