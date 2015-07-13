<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
    
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
     * URL GET : /__admin/event     //display all events
    */
    
    public function event()
	{ 
        $events = $this->em->getRepository('Entities\Events')->findBy(array('status' => 'pending', 'type'=>'event'));
        if(!$events)
        {
            $temp['events'] =  'No data available';
        }
        
        var_dump($events);exit;

	}
   
    
     /*
     * URL GET : /__admin/meeting     //display all meetings
    */
    
    public function meeting()
	{

        $meetings = $this->em->getRepository('Entities\Events')->findBy(array('status' => 'pending', 'type'=>'meeting'));
        if(!$meetings)
        {
            $temp['meetings'] =  'No data available';
        }
        
        var_dump($meetings);exit;

	}
   
    /*
     * URL GET : /__admin/event/approve     //approve event/meeting
    */
    
    public function approve()
	{ 
        if(isset($_GET['event_id']))
        {
            $event = $this->em->getRepository('Entities\Events')->findOneBy(array('status' => 'pending', 'eventId'=>$_GET['event_id']));
            
            if(!$event)
            {
                redirect('__admin/event?error=event/meeting not found');
            }

            $event->setStatus('approved');
            
            $this->em->flush();
            
            //TODO send Push Notification
            
            redirect('__admin/event?approve=success');
                 
        }else
        {
            redirect('__admin/event?error=approval failed');
        }
        
	}
    
    
    /*
     * URL GET : /__admin/event/delete     //delete event/meeting
    */
    
    public function delete()
	{ 
        if(isset($_GET['event_id']))
        {
            $event = $this->em->getRepository('Entities\Events')->findOneBy(array('status' => 'pending', 'eventId'=>$_GET['event_id']));
            
            if(!$event)
            {
                redirect('__admin/event?error=event/meeting not found');
            }

            $this->em->remove($event);
            $this->em->flush();
            
            redirect('__admin/event?delete=success');
            
        }else
        {
            redirect('__admin/event?error=delete failed');
        }
        
	}
   
}
