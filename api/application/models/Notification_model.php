<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }

        /*
         * get All Users
        */
// Pass $data['type'] = event/news/all & $data['event_id'/'news_id'] = event_id/news_id
        public function get_tokens($data)
        {  
            $reg_ids = [];
            $gcm_ids = []; $apn_ids = [];

            if(!$data['type'])
            {
                 return 'error No data found.';
            }
            
            switch($data['type'])
            {
// Select Event/meeting invites
                case 'event':
                    if(!isset($data['event_id']) || !$data['event_id'])      // Return if no event_id/meeting_id specified
                    {
                        return 'error Event id not specified';
                        exit;
                    }
                    // if event_id found -> search invites i.e event_tables
                    
                    $tables = $this->em->getRepository('Entities\EventTables')->findBy(array('eventId' => $data['event_id']));
                    if($tables)
                    {
                        foreach($tables as $table)
                        {
                            $members = $this->em->getRepository('Entities\Members')->findBy(array('tableId' => $table->getTableId()));
                            foreach($members as $member)
                            {
                               $member_ids[] = $member->getMemberId();
                            }
                        }
                        
                        if($member_ids)
                        {
                            foreach($member_ids as $member_id)
                            {
                                $tokens = $this->em->getRepository('Entities\NotificationIds')->findBy(array('memberId' => $member_id));
                                foreach($tokens as $token)
                                {
                                     if('gcm' == $token->getOs())
                                        $gcm_ids[] = $token->getToken();
                                     elseif('apn' == $token->getOs())
                                        $apn_ids[] = $token->getToken();
                                }
                            }
                        }
                    }
                    
                    $reg_ids['gcm_ids'] = $gcm_ids;
                    $reg_ids['apn_ids'] = $apn_ids;
                
                break;
    // Select News Recievers
                case 'news':
                    if(!isset($data['news_id']) || !$data['news_id'])
                    {
                        return 'error News id not specified';
                        exit;
                    }
                     
                    // if event_id found -> search invites i.e event_tables
                    $tables = $this->em->getRepository('Entities\NewsTables')->findBy(array('newsId' => $data['news_id']));
                    
                    if($tables)
                    {
                        foreach($tables as $table)
                        {
                            $members = $this->em->getRepository('Entities\Members')->findBy(array('tableId' => $table->getTableId()));
                            foreach($members as $member)
                            {
                               $member_ids[] = $member->getMemberId();
                            }
                        }
                        if($member_ids)
                        {
                            foreach($member_ids as $member_id)
                            {
                                $tokens = $this->em->getRepository('Entities\NotificationIds')->findBy(array('memberId' => $member_id));
                                foreach($tokens as $token){
                                     if('gcm' == $token->getOs())
                                        $gcm_ids[] = $token->getToken();
                                     elseif('apn' == $token->getOs())
                                        $apn_ids[] = $token->getToken();
                                }
                            }
                        }
                        $reg_ids['gcm_ids'] = $gcm_ids;
                        $reg_ids['apn_ids'] = $apn_ids;
                    }  
                break;
    // Select all members of RTN for broadcast message
                default:
                    $users = $this->em->getRepository('Entities\NotificationIds')->findAll();
                    foreach($users as $user){
                         if('gcm' == $user->getOs())
                            $gcm_ids[] = $user->getToken();
                         elseif('apn' == $user->getOs())
                            $apn_ids[] = $user->getToken();
                    }
                    $reg_ids['gcm_ids'] = $gcm_ids;
                    $reg_ids['apn_ids'] = $apn_ids;
                break;
            }
            
            return $reg_ids;
            
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