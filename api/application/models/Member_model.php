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
              $user = $this->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email));  
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
            /*Client Id will be generated while member registration*/
            //$client_id = mb_strimwidth(md5(time()), 0, 20);
            //$client_id = 'a1b2c3';
            //echo $client_id;
        
            $notification = new Entities\NotificationIds;
            $member = $this->em->find('Entities\Members', $member_id);
            if(!is_null($member))
            {
                $notification->setOs($os);
                $notification->setToken($token);
                $notification->setMember($member);
                
                try
                {
                    $this->em->persist($notification);
                    $this->em->flush();
                }catch(Exception $e)
                {
                    return 'error:Invalid token provided';
                }

                return $member->getClientId();
            }else
            {
                return 'error: member does not exists';
            }
        
            
        }

    
    
    public function get_otp($member_email = '')
        {  
            return array("result"=>array('otp'=>'123'));
        }

}