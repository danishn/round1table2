<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('upload');
                $this->em = $this->doctrine->em;
        }

        /*
         * get All Gallery updates
        */
        public function get_updates()
        {  
            $updates = $this->em->getRepository('Entities\Gallery')->findAll();
			
            if(!$updates)
			{
				return 'error No data available';
			}
			
			foreach($updates as $key => $update)
            {
				$temp[$key]['update_id'] = $update->getImageId();
				$temp[$key]['member_id'] = $update->getMemberId();
				$temp[$key]['image_name'] = $update->getImageName();
				$temp[$key]['image_desc'] = $update->getImageDesc();
				$temp[$key]['submit_date'] = $update->getSubmitDate();
				$temp[$key]['submit_date'] = $update->getSubmitDate() instanceof \DateTime ? $update->getSubmitDate()->format('M d,Y') : $update->getSubmitDate();    
			}
            
            return $temp;  
        }
    

        /*
         * Add new gallery update
        */

        public function set_update($member_id, $image_name, $image_desc = '-')
        {  

			$gallery = new Entities\Gallery;
            
            //var_dump($news);exit;
            
            $gallery->setMemberId($member_id);
            $gallery->setImageName($image_name);
            $gallery->setImageDesc($image_desc);
            $gallery->setSubmitDate(new \DateTime("now"));
            
            try
            {
                $this->em->persist($gallery);
                $this->em->flush();
                return $gallery->getImageId();
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
            
        }

}