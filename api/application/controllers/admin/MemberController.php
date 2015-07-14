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
