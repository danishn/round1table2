<?php

class Event_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }
    
    /*
     * Retrive all events
    */
    
    public function get_all()
    {  
        $events = $this->em->getRepository('Entities\events')->findBy(array('status' => 'pending'));
        if(!$events)
        {
            return 'error No data available';
        }
        
        //var_dump($events);exit;
        
        foreach($events as $key => $event){
            $temp[$key]['event_id'] = $event->getEventId();
            $temp[$key]['event_name'] = $event->getEventName();

            $temp[$key]['event_date'] = $event->getEventDate() instanceof \DateTime ? $event->getEventDate()->format('M d,Y') : $event->getEventDate();    
            $temp[$key]['event_time'] = $event->getEventTime() instanceof \DateTime ? $event->getEventTime()->format('H:i:s') : $event->getEventTime();    

            $temp[$key]['event_venue'] = $event->getEventVenue();
            $temp[$key]['is_spouse'] = $event->getIsSpause();
            $temp[$key]['is_children'] = $event->getIsChildren();
            $temp[$key]['tables_count'] = $event->getTableCount();
            $temp[$key]['event_big_url'] = $event->getBigUrl();
            $temp[$key]['event_thumb_url'] = $event->getThumbUrl();
            //$temp[$key]['created_on'] = $event->getCreatedOn();
            $temp[$key]['member_created'] = $event->getMemberId();
            
            
            $temp[$key]['created_on'] = $event->getCreatedOn() instanceof \DateTime ? $event->getCreatedOn()->format('M d,Y') : $event->getCreatedOn();    

            
        }
        
        return $temp;
    }

    
    /*
     * Add new event
    */

        public function add_event($type, $name, $venue, $date, $time, $invites, $is_spause, $is_children, $member_id)
        {  
            $short_desc = '';
            $long_desc = '';
            $table_count = is_array($table_list = explode(',', $invites)) ? count($table_list): 0;
            $big_url = '';
            $thumb_url = '';
            $status = 'pending';
            
            $event = new Entities\Events;
            
            if($type == 'event')
            {
                // upload event photo to server & set image URLs
                
                $big_url = $big_url == '' ? '/api/public/images/big/rtn.jpg' : $big_url; 
                $thumb_url = $thumb_url == '' ? '/api/public/images/thumb/rtn.jpg' : $thumb_url; 
            }
            //var_dump($event );exit;
            
            $event->setEventName($name);
            $event->setType($type);
            $event->setEventVenue($venue);
            
            // Write Date Validations            
            
            $event->setEventDate(new \DateTime($date));
            $event->setEventTime(new \DateTime($time));
            
            $event->setIsSpause($is_spause);
            $event->setIsChildren($is_children);
            $event->setTableCount($table_count);
            $event->setCreatedOn(new \DateTime("now"));
            $event->setMemberId($member_id);
            
            $event->setShortDesc($short_desc);
            $event->setLongDesc($long_desc);
            $event->setBigUrl($big_url);
            $event->setThumbUrl($thumb_url);
            $event->setStatus($status);
            
            //var_dump($event);exit;
            
            try
            {
               $this->em->persist($event);
                $this->em->flush();
                return $event->geteventId();
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }

}