<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
    
    //public $response = array();

    function __construct()
    {
		parent::__construct();
        
        $this->load->file('application/classes/Response.php'); 
        
        $response = new Response();
        
        if(!$this->auth_service->valid_request)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>401,
                    'msg' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
	}
    
    /*
     * URL GET : /api/event/get_all
    */
    
    public function get_events()
	{ 
        $response = new Response();
        
        $this->load->model('Event_model', 'event');
        
        $event_list = $this->event->get_all('event');
            
            if(!is_array($event_list) && strpos($event_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $event_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('event_list'=>$event_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
   
    
     /*
     * URL GET : /api/meeting/get_all
    */
    
    public function get_meetings()
	{ 
        $response = new Response();
        
        $this->load->model('Event_model', 'event');
        
        $meeting_list = $this->event->get_all('meeting');
            
            if(!is_array($meeting_list) && strpos($meeting_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $meeting_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('event_list'=>$meeting_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
   
    
    /*
     * URL POST : /api/event/create
     * URL POST : /api/meeting/create
    */
    
    public function create_event()
	{ 
        $response = new Response();
        
        $type = $this->input->post('event_type');
        $name = str_replace('+', ' ',($this->input->post('event_name')));
        $venue = str_replace('+', ' ',($this->input->post('event_venue')));
        $date = $this->input->post('event_date');
        $time = $this->input->post('event_time');
        $invites = $this->input->post('invites');
        $is_spause = isset($_POST['is_spouse']) ? $_POST['is_spouse'] : null;
        $is_children = isset($_POST['is_children']) ? $_POST['is_children'] : null;
        $member_id = $this->input->post('member_id');
        //var_dump($_POST);exit;
        if($type == 'event')
        {
            // check for event photo 
            if(empty($_FILES) || !isset($_FILES['event_image']))
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' => 'Event Image Not specified.'
                    ));
                $response->respond();
                exit;
            }
         //var_dump($_FILES);exit;   
        }
        
        if($type != 'event' && $type != 'meeting')
        {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' => 'Invalid Event Type.'
                    ));
                $response->respond();
                exit;
        }
        
        // check for Invetes saperately -- || !$invites
        if(!$name || !$venue || !$date || !$time || !$member_id || !$invites || $is_spause === null || $is_children === null)
        {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' => 'Failed due to incomplete Data.'
                    ));
                $response->respond();
                exit;
        }
        
        $this->load->model('Event_model', 'event');
        
        $event_id = $this->event->add_event($type, $name, $venue, $date, $time, $invites, $is_spause,$is_children, $member_id);
            
            if(!is_int($event_id) && strpos($event_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $event_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('msg'=>'Event Created Successfully'));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
}
