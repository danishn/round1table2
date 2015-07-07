<?php

class Conveners_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('upload');
                $this->em = $this->doctrine->em;
        }
        
        /*
         * get All conveners
        */
        public function get_all()
        {  
            $ConvenersInfo = $this->doctrine->em->getRepository('Entities\Conveners')->findAll();
        
            $temp = null;

           foreach($ConvenersInfo as $key => $ConvenersInfo)
            {      

                $temp[$key]['convener_id'] = $ConvenersInfo->getConvenerId();
               
 				if($ConvenersInfo->getMemberId())
				{
					$temp[$key]['member_id'] = $ConvenersInfo->getMemberId();	

				} 
				else
				{
					$temp[$key]['member_id'] =null;

				}
               
				$temp[$key]['designation'] = $ConvenersInfo->getDesignation();
				$temp[$key]['name'] = $ConvenersInfo->getName();
				$temp[$key]['table_code'] = $ConvenersInfo->getTableCode();
				$temp[$key]['mobile'] = $ConvenersInfo->getMobile();
				$temp[$key]['email'] = $ConvenersInfo->getEmail();
				//$temp[$key]['details'] = $ConvenersInfo->getDetails();

            }
            if(!is_array($temp))
            {
                return 'error No Conveners found';
            }
            return $temp;  
        }
  
        public function add_conveners($member_id, $name, $table_code, $designation, $email, $mobile, $details = '-')
        {  
            //$member=$this->em->find("Entities\Members",$member_id);
			//var_dump($member);
            $thumb_url = '/api/public/images/big/conveners/rtn.jpg';
                
			$conveners = new Entities\Conveners;
            //var_dump($conveners);exit;
            $conveners->setMemberId($member_id);
            $conveners->setName($name);
            $conveners->setTableCode($table_code);
            $conveners->setDesignation($designation);
            $conveners->setEmail($email);
			$conveners->setMobile($mobile);
            $conveners->setDetails($details);
            
            $conveners->setImageUrl($thumb_url);

            try
            {
               $this->em->persist($conveners);
               $this->em->flush();
				return $conveners->getConvenerId();
            }
			catch(Exception $e)
			{
                return 'error '. $e->getMessage();
            }
        }
    
    
    
        /*
         * find Conveners by name/designation/email/mobile
        */
    /*
        public function find_conveners($searchBy, $searchKey)
        {  
            $convenersInfo = null;
            
            switch($searchBy)
            {
                case "name":
                    $convenersInfo = $this->em
                                    ->getRepository('Entities\Conveners')
                                    ->createQueryBuilder('c')
                                    ->where('c.name LIKE :name')
                                    ->setParameter(':name', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "designation":
                    $convenersInfo = $this->em
                                    ->getRepository('Entities\Conveners')
                                    ->createQueryBuilder('c')
                                    ->where('c.designation LIKE :designation')
                                    ->setParameter(':designation', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "email":
                    $convenersInfo = $this->em
                                    ->getRepository('Entities\Conveners')
                                    ->createQueryBuilder('c')
                                    ->where('c.email LIKE :email')
                                    ->setParameter(':email', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
                case "mobile":
                    $convenersInfo = $this->em
                                    ->getRepository('Entities\Conveners')
                                    ->createQueryBuilder('c')
                                    ->where('c.mobile LIKE :mobile')
                                    ->setParameter(':mobile', '%'.$searchKey.'%')
                                    ->getQuery()
                                    ->getResult();
                    break;
               
                default:
                    return 'error Search Not Supported for this field type';
            }

            $temp = null;
            

            foreach($ConvenersInfo as $key => $ConvenersInfo)
            {      

                $temp[$key]['convener_id'] = $ConvenersInfo->getConvenerId();
			 	if($ConvenersInfo->getMember())
				{
					$temp[$key]['member_id'] = $ConvenersInfo->getMember()->getMemberId();	
				}
				else 
				{
					$temp[$key]['member_id'] =null;
				}
				$temp[$key]['name'] = $ConvenersInfo->getName();
				$temp[$key]['designation'] = $ConvenersInfo->getDesignation();
				$temp[$key]['email'] = $ConvenersInfo->getEmail();
				$temp[$key]['mobile'] = $ConvenersInfo->getMobile();
				$temp[$key]['details'] = $ConvenersInfo->getDetails();

            }
            if(!is_array($temp))
            {
                return 'error No Conveners found';
            }
            return $temp;  

        }
    */


}

