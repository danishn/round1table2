<?php

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
                        return 'error '.$e->getMessage();
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
         * get All members
        */
        public function get_all()
        {  
            $members = $this->em->getRepository('Entities\MembersInfo')->findAll();
            
            //var_dump($members);exit;
            
            if(!$members)
            {
                return 'error No data available';
            }

            $temp = null;

            foreach($members as $key => $member){
                if($member->getMember()->getStatus())
                {
                    $temp[$key]['member_id'] = $member->getMember()->getMemberId();
                    $temp[$key]['table_id'] = $member->getMember()->getTableId();
                    $temp[$key]['fname'] = $member->getFname();
                    $temp[$key]['lname'] = $member->getLname();
                    $temp[$key]['gender'] = $member->getGender();
                    $temp[$key]['mobile'] = $member->getMobile();
                    $temp[$key]['email'] = $member->getEmail();
                    $temp[$key]['blood_group'] = $member->getBloodGroup();
                    $temp[$key]['spouse_name'] = $member->getSpouseName();
                    
                    $temp[$key]['dob'] = $member->getDob() instanceof \DateTime ? $member->getDob()->format('M d,Y') : $member->getDob();    
                    
                    $temp[$key]['spouse_dob'] = $member->getSpouseDob() instanceof \DateTime ? $member->getSpouseDob()->format('M d,Y') : $member->getSpouseDob();    
                    
                    $temp[$key]['anniversary_date'] = $member->getAnniversaryDate() instanceof \DateTime ? $member->getAnniversaryDate()->format('M d,Y') : $member->getAnniversaryDate();    
                    
                    
                    $temp[$key]['image_thumb_url'] = $member->getThumbUrl();
                    $temp[$key]['image_big_url'] = $member->getBigUrl();
                    
                    $temp[$key]['res_phone'] = $member->getResPhone();
                    $temp[$key]['office_phone'] = $member->getOfficePhone();
                    $temp[$key]['designation'] = $member->getDesignation();
                    $temp[$key]['state'] = $member->getState();
                }
                
            }

            if(!is_array($temp))
            {
                return 'error No data found';
            }
            
            return $temp;
        }

}