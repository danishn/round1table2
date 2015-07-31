<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {
    
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
     * URL GET : /__admin/news     //display all events
    */
    
    public function news()
	{ 
        $pending_news = $this->em->getRepository('Entities\News')->findBy(array('status' => 'pending'));
		$archive_news = $this->em->getRepository('Entities\News')->findBy(array('status' => 'approved'));
        $data=null;
		if($pending_news)
        {
            $i=0;
            foreach($pending_news as $row)
            {
                $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$row->getMemberId()));
                $member_name=null;
                if($member)
                {
                    $member_name=$member->getFname()." ".$member->getLname();
                }else
                    continue;
                $data['pending_news'][$i]['id'] =$row->getNewsId();  
                $data['pending_news'][$i]['created_by'] =$member_name;  
                $data['pending_news'][$i]['creation_on'] =$row->getCreationDate()->format('d/m/y');
                $data['pending_news'][$i]['table_count'] =$row->getTableCount();
                $data['pending_news'][$i]['headline'] =$row->getHeadline();  
                $data['pending_news'][$i]['thumb_url'] =$row->getThumbUrl();$i++;
            }
        }
		if($archive_news)
        {
            $i=0;
            foreach($archive_news as $row)
            {
                $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$row->getMemberId()));
                $member_name=null;
                if($member)
                {
                    $member_name=$member->getFname()." ".$member->getLname();
                }else
                    continue;
                $data['archive_news'][$i]['id'] =$row->getNewsId();  
                $data['archive_news'][$i]['created_by'] =$member_name;  
                $data['archive_news'][$i]['creation_on'] =$row->getCreationDate()->format('d/m/y');
                $data['archive_news'][$i]['table_count'] =$row->getTableCount();
                $data['archive_news'][$i]['headline'] =$row->getHeadline();  
                $data['archive_news'][$i]['thumb_url'] =$row->getThumbUrl();$i++;
            }
            
        }
        
        //var_dump($news);exit;
		$this->load->view('news_view',$data);
	}
    public function info()
	{
        $response=new Response;
       if(isset($_GET['news_id']))
        {
            $news = $this->em->find("Entities\News",$_GET['news_id']);
            
            if(!$news)
            {
				$response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                    'Status_code'=>543,
                    'Error_Message' =>'News Not found'
                ));
            $response->respond();
            exit;
            }
           else
           {
               $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$news->getMemberId()));
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
                $tables=$this->em->getRepository("Entities\NewsTables")->findBy(array('newsId'=>$news->getNewsId()));
               
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
                    $data['news']['table'][$i]=$res->getTableCode();
                        $i++;
                }
                $member_name=$member->getFname()." ".$member->getLname();
                $data['news']['id'] =$news->getNewsId();  
                $data['news']['created_by'] =$member_name;  
                $data['news']['creation_on'] =$news->getCreationDate()->format('d/m/y');
                $data['news']['table_count'] =$news->getTableCount();
                $data['news']['headline'] =$news->getHeadline();  
                $data['news']['thumb_url'] =$news->getThumbUrl();
                $data['news']['big_url'] =$news->getBigUrl(); 
                $data['news']['description'] =$news->getDescription(); 
                $response->setSuccess('true');
                $response->setdata($data);
                $response->setError(null);
                $response->respond();
                exit;
           }
       }
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
				$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>News not found.</div>");
                redirect('__admin/news');
            }

            $news->setPublishDate(new \DateTime("now"));
            $news->setStatus('approved');
            $news->setBroadcast('broadcasted');
            
            $this->em->flush();
            
            //TODO : send Push Notification
            $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>News Approved Successfully.</div>");
            redirect('__admin/news');    
        }else
        {
			$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Approval failed.</div>");
            redirect('__admin/news');
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
				$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>News not found.</div>");
                redirect('__admin/news');
            }

            $this->em->remove($news);
            $this->em->flush();
			
            $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>News Deleted Successfully.</div>");
            redirect('__admin/news');
            
        }else
        {
			$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Delete failed.</div>");
            redirect('__admin/news');
        }
        
	}
     /*
     * URL GET : /__admin/news/reject     //reject news
    */
    
    public function reject()
	{ 
        if(isset($_GET['news_id']))
        {
            $news = $this->em->getRepository('Entities\News')->findOneBy(array('status' => 'pending', 'newsId'=>$_GET['news_id']));
            
            if(!$news)
            {
				$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>News not found.</div>");
                redirect('__admin/news');
            }
            $news->setStatus("rejected");
            $this->em->persist($news);
            $this->em->flush();
			
            $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>News Deleted Successfully.</div>");
            redirect('__admin/news');
            
        }else
        {
			$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Delete failed.</div>");
            redirect('__admin/news');
        }
        
	}
}
