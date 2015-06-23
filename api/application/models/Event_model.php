<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class Event_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
                $this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
            
        }
    
    /*
     * Retrive all events/meetings
    */
    
    public function get_all($type)
    {  
        $events = $this->em->getRepository('Entities\events')->findBy(array('status' => 'pending', 'type'=>$type));
        if(!$events)
        {
            return 'error No data available';
        }
        
        //var_dump($events);exit;
        
        foreach($events as $key => $event){
            $temp[$key]['event_id'] = $event->getEventId();
            $temp[$key]['event_type'] = $event->getType();
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
     * Add new event/meeting
    */

        public function add_event($type, $name, $venue, $date, $time, $invites, $is_spause, $is_children, $member_id)
        {  
            $short_desc = '';
            $long_desc = '';
            $table_count = is_array($table_list = explode(',', trim($invites, ','))) ? count($table_list): 0;
            $big_url = '';
            $thumb_url = '';
            $status = 'pending';
            
            $event = new Entities\Events;
            
            if(!$table_count)
            {
                return 'error Invites Table list not mentioned correctly.';
                exit;
            }
            
            if($type == 'event')
            {
                $big_url = $big_url == '' ? '/api/public/images/big/rtn.jpg' : $big_url; 
                $thumb_url = $thumb_url == '' ? '/api/public/images/thumb/rtn.jpg' : $thumb_url; 
                
                // upload event photo to server & set image URLs
                $config['upload_path'] = 'public/images/big/events';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '10000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('event_image')) {
					return 'error '.$this->upload->display_errors();
                    exit;
				} else {
					$data = $this->upload->data();
					$thumb_url  = $big_url = '/api/public/images/big/events/' . $data['file_name'];
                    
                    $image = new ImageResize('public/images/big/events/'.$data['file_name']);
                    $image->scale(20);
                    $image->save('public/images/thumb/events/'.$data['file_name']);
                    $thumb_url = '/api/public/images/thumb/events/' . $data['file_name'];
				}
                
            }
            
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
                
                $event_id = $event->geteventId();
                
                // update invites i.e event_table table data

                foreach($table_list as $invited_table)
                {
                    $invite = new Entities\EventTables;
                    
                    $invite->setEventId($event_id);
                    $invite->setTableId($invited_table);
                    
                    try
                    {
                        $this->em->persist($invite);
                        $this->em->flush();
                    }catch(Exception $e)
                    {
                        return 'error '. $e->getMessage();
                    }
                }
                
                //var_dump($invites_arr);exit;
                
                return $event_id;
                
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }

}