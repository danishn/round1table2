<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {
    
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
     * URL GET : /api/news/get_all
    */
    
    public function get_news()
	{ 
        $response = new Response();
        
        $this->load->model('News_model', 'news');
        
        $news_list = $this->news->get_all();
            
            if(!is_array($news_list) && strpos($news_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $news_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('news_list'=>$news_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
   
    
    /*
     * URL POST : /api/news/create
    */
    
    public function create_news()
	{ 
        $response = new Response();
        
        $news_headline = str_replace('+', ' ',($this->input->post('news_headline')));
        $news_description = str_replace('+', ' ',($this->input->post('news_description')));
        $member_id = $this->input->post('member_id');
        $concern_tables = $this->input->post('concern_tables');
        
        
        //$news_date = $this->input->post('news_date');
        //$invites = $this->input->post('invites');
        
        //var_dump($_POST);exit;

        //var_dump($_FILES);exit;   
        
        if(!$news_headline || !$news_description || !$member_id || !$concern_tables ||!isset($_FILES['news_image']))
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
        
        $this->load->model('News_model', 'news');
        
        $news_id = $this->news->add_news($news_headline, $news_description, $member_id, $concern_tables);
            
            if(!is_int($news_id) && strpos($news_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $news_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('msg'=>'News Created Successfully'));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
}
