<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
    
    //public $response = array();
    public $em;

    function __construct()
    {
		parent::__construct(); 
        $this->load->file('application/classes/Response.php');
        $this->em = $this->doctrine->em;
		$this->load->library('session');
        try {
			if (!$this->session->userdata('adminUser')){
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
        $events = $this->em->getRepository('Entities\Events')->findBy(array('status' => 'pending','type'=>'event'));
        $approved_events = $this->em->getRepository('Entities\Events')->findBy(array('status' => 'approved','type'=>'event'));
         
         $data=null;
		if($events)
        {
            $i=0;
            foreach($events as $row)
            {
                $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$row->getMemberId()));
                $member_name=null;
                if($member)
                {
                    $member_name=$member->getFname()." ".$member->getLname();
                }else
                    continue;
                $data['events'][$i]['id'] =$row->getEventId();  
                $data['events'][$i]['event_name'] =$row->getEventName(); 
                $data['events'][$i]['event_venue'] =$row->getEventVenue(); 
                $data['events'][$i]['created_by'] =$member_name;  
                $data['events'][$i]['event_date'] =$row->getEventDate()->format('d/m/y');
                $data['events'][$i]['event_time'] =$row->getEventTime()->format('h:m');
                $data['events'][$i]['table_count'] =$row->getTableCount(); 
                $data['events'][$i]['thumb_url'] =$row->getThumbUrl();$i++;
            }
            
        }
        if($approved_events)
        {
            $i=0;
            foreach($approved_events as $row)
            {
                $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$row->getMemberId()));
                $member_name=null;
                if($member)
                {
                    $member_name=$member->getFname()." ".$member->getLname();
                }else
                    continue;
                $data['approved_events'][$i]['id'] =$row->getEventId();  
                $data['approved_events'][$i]['event_name'] =$row->getEventName(); 
                $data['approved_events'][$i]['event_venue'] =$row->getEventVenue(); 
                $data['approved_events'][$i]['created_by'] =$member_name;  
                $data['approved_events'][$i]['event_date'] =$row->getEventDate()->format('d/m/y');
                $data['approved_events'][$i]['event_time'] =$row->getEventTime()->format('h:m');
                $data['approved_events'][$i]['table_count'] =$row->getTableCount(); 
                $data['approved_events'][$i]['thumb_url'] =$row->getThumbUrl();$i++;
            }
            
        }
        
        $this->load->view('event_view',$data);

	}
    
    public function info()
	{
        $response=new Response;
       if(isset($_GET['event_id']))
        {
            $event = $this->em->find("Entities\Events",$_GET['event_id']);
            
            if(!$event)
            {
				$response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                    'Status_code'=>543,
                    'Error_Message' =>'Event Not found'
                ));
            $response->respond();
            exit;
            }
           else
           {
               $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$event->getMemberId()));
                $member_name=null;
                if(!$member)
                {
                    $response->setSuccess('false');
                    $response->setdata(null);
                    $response->setError(array(
                        'Status_code'=>534,
                        'Error_Message' =>'Invalid Member'
                        ));
                    $response->respond();
                    exit;
                }
                $tables=$this->em->getRepository("Entities\EventTables")->findBy(array('eventId'=>$event->getEventId()));
               
               if(!$tables){
                    $response->setSuccess('false');
                    $response->setdata(null);
                    $response->setError(array(
                        'Status_code'=>534,
                        'Error_Message' =>'at least one table should have been selected'
                        ));
                    $response->respond();
                    exit;
               }$i=0;
                foreach($tables as $row){
                    $res=$this->em->find("Entities\Tables",$row->getTableId());
                    $data['events']['table'][$i]=$res->getTableCode();
                        $i++;
                }
                $member_name=$member->getFname()." ".$member->getLname();
                $data['events']['id'] =$event->getEventId();  
                $data['events']['event_name'] =$event->getEventName(); 
                $data['events']['event_venue'] =$event->getEventVenue(); 
                $data['events']['created_by'] =$member_name;  
                $data['events']['event_date'] =$event->getEventDate()->format('d/m/y');
                $data['events']['event_time'] =$event->getEventTime()->format('h:m');
                $data['events']['table_count'] =$event->getTableCount(); 
                $data['events']['thumb_url'] =$event->getThumbUrl();
                $data['events']['description'] =$event->getShortDesc();
                $data['events']['is_spause'] =$event->getIsSpause(); 
                $data['events']['is_children'] =$event->getIsChildren();  
                $response->setSuccess('true');
                $response->setdata($data);
                $response->setError(null);
                $response->respond();
                exit;
           }
       }
	}
   
   
    /*
     * URL GET : /__admin/event/approve     //approve event
    */
    
    public function approve()
	{ 
        if(isset($_GET['event_id']))
        {
            $event = $this->em->getRepository('Entities\Events')->findOneBy(array('status' => 'pending', 'eventId'=>$_GET['event_id']));
            
            if(!$event)
            {
                $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Event not found.</div>");
                redirect('__admin/event');
            }

            $event->setStatus('approved');
            
            $this->em->flush();
            
            //TODO send Push Notification
           $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong> Approved Successfully.</div>");
            redirect('__admin/event');
                 
        }else
        {
           $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Approval failed.</div>");
            redirect('__admin/event');
        }
        
	}
     /*
     * URL GET : /__admin/event/reject     //approve event
    */
    
    public function reject()
	{ 
        if(isset($_GET['event_id']))
        {
            $event = $this->em->getRepository('Entities\Events')->findOneBy(array('status' => 'pending', 'eventId'=>$_GET['event_id']));
            
            if(!$event)
            {
                $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Event not found.</div>");
                redirect('__admin/event');
            }

            $event->setStatus('rejected');
            
            $this->em->flush();
            
            //TODO send Push Notification
           $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong> Rejected Successfully.</div>");
            redirect('__admin/event');
                 
        }else
        {
           $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong> failed to Reject.</div>");
            redirect('__admin/event');
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
                $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>Event not found.</div>");
                redirect('__admin/event');
            }

            $this->em->remove($event);
            $this->em->flush();
            
            $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>Event Deleted Successfully.</div>");
            redirect('__admin/event');
            
        }else
        {
           $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>Delete failed.</div>");
            redirect('__admin/event');
        }
        
	}
   
}
