<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class Member_model extends CI_Model {

        public $em;
    
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('upload');
                $this->em = $this->doctrine->em;
                $this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
        }
    
        /*
         * Authenticate User for Email & OTP data
        */
        public function authenticate($email = '', $otp = '')
        {
    
            $user = $this->em->getRepository('Entities\Members')->findOneBy(array('email' => $email));  
            //$user = $this->em->getRepository('Entities\Members')->findAll();  
            //var_dump($email);exit;
            
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
                //echo $client_id = mb_strimwidth(md5(time()), 0, 30); exit;
                //$client_id = 'a1b2c3';
                //echo $client_id;

                $notification = new Entities\NotificationIds;
                $member = $this->em->find('Entities\Members', $member_id);
            
                //var_dump($member);exit;
                if(!is_null($member))
                {
                    $notification->setOs($os);
                    $notification->setToken($token);
                    $notification->setMemberId($member_id);
                    
                    try
                    {
                        $this->em->persist($notification);
                        $this->em->flush();
                    }catch(Exception $e)
                    {
                        return 'error can not set GCM Id';//.$e->getMessage();
                    }
                    //var_dump($notification);exit;    
                    $memberInfo = $this->em->find('Entities\MembersInfo', $member_id);
                    $temp = null;
                    
                    $temp['client_id'] = $member->getClientId();
                    $temp['details'] = $this->get_members_details($member, $memberInfo);
                    //var_dump($temp);exit;  
                    
                    if(!is_array($temp))
                    {
                        return 'error member profile not found';
                    }
                    
                    return $temp;
                }else
                {
                    return 'error member does not exists';
                }


            }

        /*
         * Send OTP if valid Email ID provided
        */
        public function send_otp($email)
        {  
            $user = $this->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email));
            //var_dump($email);exit;
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
                /*
                    $this->load->library('email'); // Note: no $config param needed
                    $this->email->from('danishnadaf@gmail.com');
                    $this->email->to('danishnadaf@gmail.com');
                    $this->email->subject('Test email from CI and Gmail');
                    $this->email->message('This is a test.');
              
                    if($this->email->send())
                    {
                        return true;
                    }else
                    {
                        return false;
                    }
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
                    $temp[$key] = $this->get_members_details($member, $memberInfo);
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
                    $temp[$key] = $this->get_members_details($member, $memberInfo);
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
            

            foreach($memberInfo as $key => $memberInfo)
            {      
                $member = $this->em->find('Entities\Members', $memberInfo->getMemberId());
                //var_dump($member);exit; 
                if(isset($member))
                {
                    $temp[$key] = $this->get_members_details($member, $memberInfo);
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
         * get members details build
        */
        public function get_members_details($member, $memberInfo)
        {  
            //var_dump($member);exit;
        
            $temp = null;

                    $temp['member_id'] = $member->getMemberId();
                    $temp['table_id'] = $member->getTableId();

                    $temp['fname'] = $memberInfo->getFname();
                    $temp['lname'] = $memberInfo->getLname();
                    $temp['gender'] = $memberInfo->getGender();
                    $temp['mobile'] = $memberInfo->getMobile();
                    $temp['email'] = $memberInfo->getEmail();
                    $temp['blood_group'] = $memberInfo->getBloodGroup();
                    $temp['spouse_name'] = $memberInfo->getSpouseName();

                    $temp['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    

                    $temp['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    

                    $temp['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    


                    $temp['image_thumb_url'] = $memberInfo->getThumbUrl();
                    $temp['image_big_url'] = $memberInfo->getBigUrl();

                    $temp['res_phone'] = $memberInfo->getResPhone();
                    $temp['office_phone'] = $memberInfo->getOfficePhone();
                    $temp['designation'] = $memberInfo->getDesignation();
                    $temp['res_city'] = $memberInfo->getResCity();
                    $temp['office_city'] = $memberInfo->getOfficeCity();
                    $temp['state'] = $memberInfo->getState();

            return $temp;  
        }
    
      /*
         * Update member profile
        */
        public function update_profile($member_id, $table_id, $email, $fname, $lname = '', $gender, $mobile, $blood_group, $spouse_name, $dob, $spouse_dob, $anniversary_date, $res_phone = '-', $office_phone = '-', $designation = '-', $res_city = '-', $office_city = '-', $state = '-')
        {   
            $member = $this->em->find('Entities\Members', $member_id);
            
            $memberInfo = $this->em->find('Entities\MembersInfo', $member_id);
            if(!$member || !$memberInfo)
            {
                return 'error Invalid Member Id';
                exit;
            }
            
            
            $member->setEmail($email);
            $member->setDesignation($designation);
            
            $memberInfo->setEmail($email);
            $memberInfo->setFname($fname);
            $memberInfo->setLname($lname);
            $memberInfo->setGender($gender);
            $memberInfo->setMobile($mobile);
            $memberInfo->setBloodGroup($blood_group);
            $memberInfo->setSpouseName($spouse_name);
            $memberInfo->setDob(new \DateTime($dob));
            $memberInfo->setSpouseDob(new \DateTime($spouse_dob));
            $memberInfo->setAnniversaryDate(new \DateTime($anniversary_date));
            $memberInfo->setResPhone($res_phone);
            $memberInfo->setOfficePhone($office_phone);
            $memberInfo->setDesignation($designation);
            $memberInfo->setResCity($res_city);
            $memberInfo->setOfficeCity($office_city);
            $memberInfo->setState($state);
            
            
            //var_dump($memberInfo);exit;
            
            if(isset($_FILES['profile_image']))
            {   
                $pic = explode('.', $_FILES['profile_image']['name']);
               // $_FILES['profile_image']['name'] = 'member_'.$member_id.'_profile.'.$pic[count($pic)-1];
                
                // upload event photo to server & set image URLs
                $config['upload_path'] = 'public/images/big/members';
				$config['allowed_types'] = 'gif|jpeg|jpg|png';
				$config['max_size']	= '10000';
				$config['overwrite'] = true;
				$config['file_name'] = 'member_'.$member_id.'_profile.'.$pic[count($pic)-1];

				//$config['file_name']	= 'member_'.$member_id.'.'.$pic[count($pic)-1];
                //echo 'member_'.$member_id.'_pic.'.$pic[count($pic)-1];exit;
                
				$this->load->library('upload', $config);
                $this->upload->initialize($config);

				if ( ! $this->upload->do_upload('profile_image')) {
					return 'error '.$this->upload->display_errors();
                    exit;
				} else {
					$data = $this->upload->data();
					$thumb_url  = $big_url = '/api/public/images/big/members/' . $data['file_name'];
                    
                    
                    $image = new ImageResize('public/images/big/members/'.$data['file_name']);
                    $image->scale(20);
                    $image->save('public/images/thumb/members/'.$data['file_name']);
                    $thumb_url = '/api/public/images/thumb/members/' . $data['file_name'];
                    
                    $memberInfo->setBigUrl($big_url);
                    $memberInfo->setThumbUrl($thumb_url);
				}
                
            }
            
            try
            {
                $this->em->flush();
                $member_id = $member->getMemberId();
                return $member_id;
                
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }
    

}

