<?php
//comment1

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    

    
    public function index()
    {
        echo "Successfully created Idex Function..";
    }
    
    public function create($param = 'danish')
    {
        echo "Creating data for $param";
    }
    
    public function createMore($param1 = 'danish', $param2 = '25')
    {
        
        echo "Creating data for $param1 with Qty :: $param2";
        $this->load->view('test');
        $this->load->view('test/test', array('name'=>$param1,'qty'=>$param2));
    }
    
    
    public function getAll()
    {
        //echo "Getting Data from DB";
        
        
        
        $this->load->model('Test_model');
        //$this->load->database();
        $data = $this->Test_model->getAll();
        //$data1 = $serializer->serialize($data, 'json');
        //var_dump($data);
        echo json_encode($data);
    }
        
    public function addUser()
    {
        echo "Adding Data from DB";
        
        
        
        $this->load->model('Test_model');
        //$this->load->database();
        $data = $this->Test_model->add();
        
        var_dump($data);
    }
    
    
}
