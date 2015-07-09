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
        $this->em = $this->doctrine->em;        // Doctrine initialization
        $gcm_users = $this->em->getRepository('Entities\NotificationIds')->findAll();
        
        //var_dump($gcm_users);exit;
        
         foreach($gcm_users as $gcm_user){
             $registration_ids[] = $gcm_user->getToken();    
         }
        
        if(empty($registration_ids)){
            return 'error No Registration Ids found';
            exit;
        }
        
         $message = array(
            "type" =>"event",
            "message" => "New Event Created",
            "description" => "You are invited for an event on Sept 10th, 2015 at kathmandu. Please respond to RSVP" 
         );
        
        // Actual GCM Call
        $this->load->file('application/classes/GCM.php');
        $gcm = new GCM();
        
        $res = $gcm->send_notification($registration_ids, $message);
        echo($res);
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