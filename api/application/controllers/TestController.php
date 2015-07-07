<?php
//comment1


defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class TestController extends CI_Controller {
 
    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
		$this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
        
	}
    
    public function index()
    {
        echo "<h1>Welcome to Round Table Nepal Application APIs</h1>";
    }
    
    public function api($param = 'danish')
    {
        echo "Called to Test API with data $param";
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
        
    public function addUser()
    {
        echo "Adding Data from DB";
        $this->load->model('Test_model');
        $data = $this->Test_model->add();
        var_dump($data);
    }
    
    
    // API /api/test/imageProcessing
    
    public function imageProcessing()
    {   
        $image = new ImageResize('public/images/big/kmrt4.png');
        $image->scale(20);
        $image->save('public/images/thumb/kmrt001.png');

        var_dump($image);

    }
    
    
}
