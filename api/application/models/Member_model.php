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
            $members = $this->doctrine->em->getRepository('Entities\Members')->findBy(array('status'=>true));
        
            //var_dump($members);exit;
        
            $temp = null;

            foreach($members as $key => $member)
            {  
                
                $memberInfo = $this->em->find('Entities\MembersInfo', $member->getMemberId());
                //var_dump($memberInfo);exit;
                
                if(isset($memberInfo))
                {

                    $temp[$key]['member_id'] = $member->getMemberId();
                    $temp[$key]['table_id'] = $member->getTableId();

                    $temp[$key]['fname'] = $memberInfo->getFname();
                    $temp[$key]['lname'] = $memberInfo->getLname();
                    $temp[$key]['gender'] = $memberInfo->getGender();
                    $temp[$key]['mobile'] = $memberInfo->getMobile();
                    $temp[$key]['email'] = $memberInfo->getEmail();
                    $temp[$key]['blood_group'] = $memberInfo->getBloodGroup();
                    $temp[$key]['spouse_name'] = $memberInfo->getSpouseName();

                    $temp[$key]['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    

                    $temp[$key]['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    

                    $temp[$key]['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    


                    $temp[$key]['image_thumb_url'] = $memberInfo->getThumbUrl();
                    $temp[$key]['image_big_url'] = $memberInfo->getBigUrl();

                    $temp[$key]['res_phone'] = $memberInfo->getResPhone();
                    $temp[$key]['office_phone'] = $memberInfo->getOfficePhone();
                    $temp[$key]['designation'] = $memberInfo->getDesignation();
                    $temp[$key]['state'] = $memberInfo->getState();

                }

            }

            //var_dump($temp);exit;
            if(!is_array($temp))
            {
                return 'error No Members found';
            }

            return $temp;  
        }
    
    
        /*
         * get members by table
        */
        public function get_members($table_id)
        {  
            $members = $this->doctrine->em->getRepository('Entities\Members')->findBy(array('tableId'=>$table_id));
        
            //var_dump($members);exit;
        
            $temp = null;

            foreach($members as $key => $member)
            {  
                
                $memberInfo = $this->em->find('Entities\MembersInfo', $member->getMemberId());
                //var_dump($memberInfo);exit;
                
                if(isset($memberInfo))
                {

                    $temp[$key]['member_id'] = $member->getMemberId();
                    $temp[$key]['table_id'] = $member->getTableId();

                    $temp[$key]['fname'] = $memberInfo->getFname();
                    $temp[$key]['lname'] = $memberInfo->getLname();
                    $temp[$key]['gender'] = $memberInfo->getGender();
                    $temp[$key]['mobile'] = $memberInfo->getMobile();
                    $temp[$key]['email'] = $memberInfo->getEmail();
                    $temp[$key]['blood_group'] = $memberInfo->getBloodGroup();
                    $temp[$key]['spouse_name'] = $memberInfo->getSpouseName();

                    $temp[$key]['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    

                    $temp[$key]['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    

                    $temp[$key]['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    


                    $temp[$key]['image_thumb_url'] = $memberInfo->getThumbUrl();
                    $temp[$key]['image_big_url'] = $memberInfo->getBigUrl();

                    $temp[$key]['res_phone'] = $memberInfo->getResPhone();
                    $temp[$key]['office_phone'] = $memberInfo->getOfficePhone();
                    $temp[$key]['designation'] = $memberInfo->getDesignation();
                    $temp[$key]['state'] = $memberInfo->getState();

                }

            }

            //var_dump($temp);exit;
            if(!is_array($temp))
            {
                return 'error No Members found';
            }

            return $temp;  
        }

        /*
         * find members by name/email/city/mobile/dob/blood_group
        */
        public function find_members($searchBy, $searchKey)
        {  
            $memberInfo = null;
            
            switch($searchBy)
            {
                case "name":
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.fname LIKE :name')
                                    ->orWhere('m.lname LIKE :name')
                                    ->orWhere('m.mname LIKE :name')
                                    ->setParameter(':name', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "email":
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.email LIKE :email')
                                    ->setParameter(':email', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "city":
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.resCity LIKE :city')
                                    ->orWhere('m.officeCity LIKE :city')
                                    ->setParameter(':city', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "mobile":
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.mobile LIKE :mobile')
                                    ->setParameter(':mobile', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "date":
                    //SELECT * FROM `members_info` WHERE DATE(dob) = '2015-06-18'
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.dob LIKE :date')
                                    ->orWhere('m.anniversaryDate LIKE :date')
                                    ->setParameter(':date', "%".$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "blood_group":
                    $memberInfo = $this->em
                                    ->getRepository('Entities\MembersInfo')
                                    ->createQueryBuilder('m')
                                    ->where('m.bloodGroup LIKE :bloodGroup')
                                    ->setParameter(':bloodGroup', $searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                default:
                    return 'error Search Not Supported for this field type';
            }
            
            //var_dump($memberInfo);exit;
        
            $temp = null;
            
// Need tocheck $memberInfo is array or not.. otherwise foreach will logic break
            foreach($memberInfo as $key => $memberInfo)
            {  
                
                $member = $this->em->find('Entities\Members', $memberInfo->getMemberId());
                //var_dump($member);exit;
                
                if(isset($member))
                {

                    $temp[$key]['member_id'] = $member->getMemberId();
                    $temp[$key]['table_id'] = $member->getTableId();
                }
                
                $temp[$key]['fname'] = $memberInfo->getFname();
                $temp[$key]['lname'] = $memberInfo->getLname();
                $temp[$key]['gender'] = $memberInfo->getGender();
                $temp[$key]['mobile'] = $memberInfo->getMobile();
                $temp[$key]['email'] = $memberInfo->getEmail();
                $temp[$key]['blood_group'] = $memberInfo->getBloodGroup();
                $temp[$key]['spouse_name'] = $memberInfo->getSpouseName();

                $temp[$key]['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    

                $temp[$key]['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    

                $temp[$key]['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    


                $temp[$key]['image_thumb_url'] = $memberInfo->getThumbUrl();
                $temp[$key]['image_big_url'] = $memberInfo->getBigUrl();

                $temp[$key]['res_phone'] = $memberInfo->getResPhone();
                $temp[$key]['office_phone'] = $memberInfo->getOfficePhone();
                $temp[$key]['designation'] = $memberInfo->getDesignation();
                $temp[$key]['res_city'] = $memberInfo->getResCity();
                $temp[$key]['office_city'] = $memberInfo->getOfficeCity();
                $temp[$key]['state'] = $memberInfo->getState();

            }

            //var_dump($temp);exit;
            
            if(!is_array($temp))
            {
                return 'error No Members found';
            }

            return $temp;  

        }

}

