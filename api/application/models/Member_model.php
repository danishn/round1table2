<?php

/*require_once(APPPATH."models/Entities/Users.php");
use \Users;
*/
class Member_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }


        public function login($email = '', $otp = '', $gcm_id = '' )
        {
            $users = $this->doctrine->em->getRepository('Entities\Members')->findAll();;    
            return array("result"=>array('email'=>$email, 'otp'=>$otp));
        }
    
    public function get_otp($member_email = '')
        {  
            return array("result"=>array('otp'=>'123'));
        }

}