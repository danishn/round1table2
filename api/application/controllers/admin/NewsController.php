<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {
    
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
     * URL GET : /__admin/news     //display all events
    */
    
    public function news()
	{ 
        $news = $this->em->getRepository('Entities\News')->findBy(array('status' => 'pending'));
        if(!$news)
        {
            $temp['news'] =  'No data available';
        }
        
        var_dump($news);exit;

	}
  
    /*
     * URL GET : /__admin/news/approve     //approve news
    */
    
    public function approve()
	{ 
        if(isset($_GET['news_id']))
        {
            $news = $this->em->getRepository('Entities\News')->findOneBy(array('status' => 'pending', 'newsId'=>$_GET['news_id']));
            
            if(!$news)
            {
                redirect('__admin/news?error=news not found');
            }

            $news->setPublishDate(new \DateTime("now"));
            $news->setStatus('approved');
            $news->setBroadcast('broadcasted');
            
            $this->em->flush();
            
            //TODO : send Push Notification
            
            redirect('__admin/news?approve=success');    
        }else
        {
            redirect('__admin/news?error=approval failed');
        }
        
	}
    
    
    /*
     * URL GET : /__admin/news/delete     //delete news
    */
    
    public function delete()
	{ 
        if(isset($_GET['news_id']))
        {
            $news = $this->em->getRepository('Entities\News')->findOneBy(array('status' => 'pending', 'newsId'=>$_GET['news_id']));
            
            if(!$news)
            {
                redirect('__admin/news?error=news not found');
            }

            $this->em->remove($news);
            $this->em->flush();
            
            redirect('__admin/news?delete=success');
            
        }else
        {
            redirect('__admin/news?error=delete failed');
        }
        
	}
}
