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
        
        $event_list = $this->event->get_all();
            
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
     * URL POST : /api/event/create
    */
    
    public function create_event()
	{ 
      $response = new Response();
        
        $type = $this->input->post('event_type');
        $name = $this->input->post('event_name');
        $venue = $this->input->post('event_venue');
        $date = $this->input->post('event_date');
        $time = $this->input->post('event_time');
        $invites = $this->input->post('invites');
        $is_spause = $this->input->post('is_spause');
        $is_children = $this->input->post('is_children');
        $member_id = $this->input->post('member_id');
        
        if($type == 'event')
        {
            // check for event photo 
        }
        
        // check for Invetes saperately -- || !$invites
        if(!$type || !$name || !$venue || !$date || !$time || !$member_id)
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
