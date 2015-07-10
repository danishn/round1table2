<?php
//comment1


defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class TestController extends CI_Controller {
    public $em;
    
    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
		$this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
        
         $response = new Response();
        if(!$this->auth_service->valid_request)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'Status_code'=>401,
                    'Error_Message' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
	}
    
    

    public function index()
    {
        echo "<h1>Welcome to Round Table Nepal Application APIs</h1>";
    }
    
    
    /*
     * URL : /api/test/param1
    */
    public function api($param = 'danish')
    {
        echo "Called to Test API with data $param";
    }
    
    
    /*
     * URL : /api/test/gcm
    */
    
    public function gcm()
    {   
        /*
        // Select brodcast receivers depending upon type of broadcast notification
            $data = array(
                'type' => 'event',
                'event_id' => 72
            );
            $this->load->model('Notification_model', 'notification');
            $reg_ids = $this->notification->get_tokens($data);
            var_dump($reg_ids);exit;
        */
        // -----------------------------------------------------------------------------------------
        
        
        //  Fetch from db
        $this->em = $this->doctrine->em;        // Doctrine initialization
        $gcm_users = $this->em->getRepository('Entities\NotificationIds')->findAll();
        
        //var_dump($gcm_users);exit;
        
        $registration_ids = [];
        
        if($gcm_users)
        {
             foreach($gcm_users as $gcm_user){
                 $registration_ids[] = $gcm_user->getToken();    
             }
        }
        
        //$registration_ids[] = $this->input->post('registration_id');
        
        if($registration_ids[0] == null){
            echo 'error No Registration Ids found';
            exit;
        }
        

        $message = array(
            "title" => "New notification data for test",
            "body" => 'Recieved New Notification..'
         );
        
        $data = array(
            "type" => 'event',
            "msg" => 'New Notification',
            "description" => "Type can be anything from event/meeting/news/favorites/tables indicating whats this notification is for. Depending on type, app should reload/refresh respective view.",
         );
        
        
        // GCM Call
        $this->load->file('application/classes/GCM.php');
        $gcm = new GCM();
        $gcm_res = $gcm->send_notification($registration_ids, $message, $data);
        
        // APN Call
        $this->load->file('application/classes/APN.php');
        $apn = new APN();
        $apn_res = $apn->send_notification($registration_ids, $message, $data);
        
        $response =new Response();
        $response->setSuccess('true');
        $response->setdata(array('gcm_response'=>$gcm_res, 'apn_response'=>$apn_res));
        $response->setError(null);
                
        $response->respond();
        exit;
        
    }
    
    
    
    // API /api/test/imageProcessing
    
    public function imageProcessing()
    {   
        $image = new ImageResize('public/images/big/kmrt4.png');
        $image->scale(20);
        $image->save('public/images/thumb/kmrt001.png');

        var_dump($image);

    }
    
    public function addUser()
    {
        echo "Adding Data from DB";
        $this->load->model('Test_model');
        $data = $this->Test_model->add();
        var_dump($data);
    }
    
    
    
    public function createMore($param1 = 'danish', $param2 = '25')
    {
        echo "Creating data for $param1 with Qty :: $param2";
        $this->load->view('test');
        $this->load->view('test/test', array('name'=>$param1,'qty'=>$param2));
    }
   
    public function getAll()
    {
        $response =new Response();
        //echo "Getting Data from DB";
        $this->load->model('Test_model');
       // $this->auth_service->validate_request();
        $data = $this->Test_model->getAll();
        //var_dump($data);exit;
        
        $response->setSuccess('true');
        $response->setData($data);
        $response->setError(null);
        
        $response->respond();
        
        //echo json_encode($data);
    }
        
    
}



/*
* GCM request test in Rest Client

URL : https://android.googleapis.com/gcm/send
header : Authorization: key=AIzaSyAdcp_ExRygjsNZCJatSuRa5lq-zVKbaLQ

content-type : application/json

body : 

{"registration_ids":["dn7P6zkJIrw:APA91bFW9q_O1mQXAtW9Rj1z3L9f7kYG5N36fbu5OKtnXD13dJ8d1_2YrSvrdRffm-0hZyntSWeUoHzkXBZSd9zfxpK9Y4I_M-t7ehoWR41BGJYxfaPAsuEe8rfqMhwIEHvEVk9bbwvf","euxDUjZHZ7I:APA91bGNOBjjW_CWt1J2FWFnlSWK80BXUjuySMkslWTHcVxVAbJhRk-KjjQ_J02p9FmQazEi-hSoEFjgpnx2_9HCX63cqprwor7973gg8b_ebzT9Zk-aA6yCxAOxyzdm_MrR2NWsJH0f"],"notification": {"type":"event","message":"New Event Created","description":"You are invited for an event on Aug 10th, 2015 at kathmandu. Please respond to RSVP"}}

*/