<?php

/*
 *  Reference :: http://codesamplez.com/development/using-doctrine-with-codeigniter
*/

class Auth_service {
 
  /**
   * @var EntityManager $em 
   */
    public $valid_request = null;
 
  /**
   * constructor
   */
  public function __construct()
  {
    $this->valid_request = $this->validate_request();
     
  } 

    
    /**
   * Authenticate API request
   * @return true/false
   */
 public function validate_request()
 {
    $headers = apache_request_headers();
    
     if(isset($headers['api_key']) && $headers['api_key'] == '1234')
     {
        return true;
     }else{
        return false;
     }
    
 }

}