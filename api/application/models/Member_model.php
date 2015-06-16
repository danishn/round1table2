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
    
    /*
     * Authenticate User for Email & OTP data
    */

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
                    return 'error OTP invalid';
                }
                //var_dump($user);exit;
            }else
            {
                return 'error Email not registered';
            }
        }
    
    /*
     * register User with its GCM/APN Id in DAtabase
    */
    
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
                    return 'error Invalid token provided';
                }

                return $member->getClientId();
            }else
            {
                return 'error member does not exists';
            }
        
            
        }

    /*
     * Send OTP if valid Email ID provided
    */
    
    public function send_otp($email = '')
    {  
         $user = $this->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email));
        
        if($user)
        {
             /*Generate random OTP*/
            $otp = mb_strimwidth(md5(time()), 0, 5);
            $user->setOtp($otp);
            try
            {
                $this->em->persist($user);
                $this->em->flush();
                
                /*
                 * Send mail here...
                */
                return true;
            }catch(Exception $e)
            {
                return 'error : '. $e->getMessage();
            }
        }else{
            return 'error Invalid Email Address.';
        }
    }

    /*
     * Register new Access Request
    */
    
    public function register_request($name = '', $email = '', $table_name = '')
    {  
       
        
        if($this->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email)))
        {
            return 'error User already Exists, Request your OTP to login';
        }elseif($this->em->getRepository('Entities\AccessRequests')->findOneBy(array('email'=>$email)))
        {
               return 'error Request already Exists, You will be notified by E-mail on Approval of Request ';
        }else
        {
            $request = new Entities\AccessRequests;
     
            $request->setName($name);
            $request->setEmail($email);
            $request->setTableName($table_name);
            $request->setRequestDate( new \DateTime("now"));
            $request->setStatus(0);
            $request->setInfo('');
            
           try
            {
               $this->em->persist($request);
                $this->em->flush();
                return true;
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }
    }

}