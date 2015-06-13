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


        public function authenticate($email = '', $otp = '')
        {
              $user = $this->doctrine->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email));  
            if($user)
            {
                if($otp == $user->getOtp())
                {
                    return $user->getMemberId();   
                }else
                {
                    return 'error: OTP invalid';
                }
                //var_dump($user);exit;
            }else
            {
                return 'error: Email not registered';
            }
        }
    
    public function register($member_id = '', $os = '', $token = '')
        {  
            
        }

    
    
    public function get_otp($member_email = '')
        {  
            return array("result"=>array('otp'=>'123'));
        }

}