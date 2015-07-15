<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {
   
    //public $response = array();
    public $em;

    function __construct()
    {
		parent::__construct(); 
        $this->em = $this->doctrine->em;
        try {
			session_start ();
			if (!isset ( $_SESSION ['adminUser'] )){
			     redirect ( '__admin?msg=session_expired' );
            }
		} catch ( Exception $e ) {
			redirect ( '__admin/error?msg=' . $e->getMessage() );
		}
	}
    
    /*
     * URL GET : /__admin/member     //display all member
    */
    
    public function index()
	{ 
         $members = $this->doctrine->em->getRepository('Entities\Members')->findAll();
        
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
                $temp[$key]['status'] = $member->getStatus();
                $temp[$key]['registration_date'] = $member->getRegistrationDate() instanceof \DateTime ? $member->getRegistrationDate()->format('M d,Y') : $member->getRegistrationDate();

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

        }

        if(!is_array($temp))
        {
            return 'error No Members found';
        }
        
        var_dump($temp);exit;
	}
  
    /*
     * URL GET : /__admin/member/delete     //delete member
    */
    
    public function delete()
	{ 
        if(isset($_GET['member_id']))
        {
            $member = $this->em->getRepository('Entities\Members')->findOneBy(array('memberId' => $_GET['member_id']));
            
            $memberInfo = $this->em->getRepository('Entities\MembersInfo')->findOneBy(array('memberId' => $_GET['member_id']));
            
            
            if(!$member || !$memberInfo)
            {
                redirect('__admin/member?error=member not found');
            }

            $this->em->remove($member);
            $this->em->remove($memberInfo);
            $this->em->flush();
            
            redirect('__admin/member?delete=success');
            
        }else
        {
            redirect('__admin/member?error=delete failed');
        }
        
	}
    
    /*
     * URL GET : /__admin/member/add     //add member
    */
    
    public function add()
	{ 
        if(isset($_POST) && !empty($_POST))
        {
            
            if(!isset($_POST['table_id']) || !isset($_POST['email']) || !isset($_POST['designation']) || !isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['gender']) || !isset($_POST['mobile']) || !isset($_POST['blood_group']) || !isset($_POST['spouse_name']) || !isset($_POST['dob']) || !isset($_POST['spouse_dob']) || !isset($_POST['anniversary_date']) || !isset($_POST['res_phone']) || !isset($_POST['office_phone']) || !isset($_POST['designation']) || !isset($_POST['res_city']) || !isset($_POST['office_city']) || !isset($_POST['state']) || !isset($_POST['status']))
            {
                redirect('__admin/member?error=incomplete_data');
            }
            
            $member = new Entities\Members;    
            $memberInfo = Entities\MembersInfo;
            
            if(!$member || !$memberInfo)
            {
                redirect('__admin/member?error=add member failed');
                exit;
            }
            
            $password = '';
            $client_id = '';
            $spouse_dob = isset($_POST['spouse_dob']) ? new \DateTime($_POST['spouse_dob']) : null;
            $spouse_mobile = isset($_POST['spouse_mobile']) ? $_POST['spouse_mobile'] : '-';
            $res_addr = isset($_POST['res_addr']) ? $_POST['res_addr'] : '-';
            $office_addr = isset($_POST['office_addr']) ? $_POST['office_addr'] : '-';
            $fax = isset($_POST['fax']) ? $_POST['fax'] : '-';
            $website_url = isset($_POST['website_url']) ? $_POST['website_url'] : '-';
            
            
            $member->setTableId($_POST['table_id']);
            $member->setPassword($password);
            $member->setRegistrationDate(new \DateTime("now"));
            $member->setLastVisitDate(new \DateTime("now"));
            $member->setMemberType(0);
            $member->setStatus($_POST['status']);
            $member->setEmail($_POST['email']);
            $member->setClientId($client_id);       // Need to create this
            //$member->setOtp($otp);       // Create this on API call
            $member->setDesignation($_POST['designation']);

            $memberInfo->setFname($_POST['fname']);
            $memberInfo->setLname($_POST['lname']);
            $memberInfo->setBigUrl('public/images/big/members/rtn.jpg');
            $memberInfo->setThumbUrl('public/images/thumb/members/rtn.jpg');
            $memberInfo->setGender($_POST['gender']);
            $memberInfo->setDob(new \DateTime($_POST['dob']));
            $memberInfo->setMobile($_POST['mobile']);
            $memberInfo->setEmail($_POST['email']);
            $memberInfo->setRegDate(new \DateTime("now"));
            $memberInfo->setAnniversaryDate(new \DateTime($_POST['anniversary_date']));
            $memberInfo->setSpouseName($_POST['spouse_name']);
            $memberInfo->setSpouseDob(new \DateTime($_POST['spouse_dob']));
            $memberInfo->setSpouseMobile($spouse_mobile);
            $memberInfo->setResAddr($res_addr);
            $memberInfo->setResPhone($_POST['res_phone']);
            $memberInfo->setResCity($_POST['res_city']);
            $memberInfo->setOfficeAddr($office_addr);
            $memberInfo->setOfficePhone($_POST['office_phone']);
            $memberInfo->setOfficeCity($_POST['office_city']);
            $memberInfo->setDesignation($_POST['designation']);
            $memberInfo->setFax($fax);
            $memberInfo->setWebsiteUrl($website_url);
            $memberInfo->setOtherDetails($other_details);
            $memberInfo->setState($_POST['state']);
            $memberInfo->setState($country);
            $memberInfo->setState($zip);
            $memberInfo->setBloodGroup($_POST['blood_group']);
            $memberInfo->setBusinessAreas($business_areas);
            
            

            var_dump($member);echo"<br><br><br>";
            var_dump($memberInfo);exit;
            
             try
            {
                $this->em->persist();
                $this->em->flush();
                //$temp = $this->get_members_details($member, $memberInfo);
                //return $temp;

            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }

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

           
        }else
        {
            return 'error method not allowed';
        }
        
	}
    
    /*
     * URL GET : /__admin/member/upload     //upload bulk members
    */
    /*
    public function upload()
	{ 
         
	}
    */
    

}
