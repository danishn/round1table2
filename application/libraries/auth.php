

<?php

/*
 *  Reference :: http://codesamplez.com/development/using-doctrine-with-codeigniter
*/

class Auth {
 
  /**
   * @var EntityManager $em 
   */
    //public $em = null;
 
  /**
   * constructor
   */
  public function __construct()
  {
     $this->validateRequest();
  } 

    
    /**
   * Authenticate API request
   * @return true/false
   */
 public function validateRequest(){
    return true;
}

}