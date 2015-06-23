<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class News_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
                $this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
            
        }
    
    /*
     * Retrive all news
    */
    
    public function get_all()
    {  
        
        // Get News for last seven days only
        
        $news_list = $this->em->getRepository('Entities\News')->findBy(array('status' => 'pending'));
        if(!$news_list)
        {
            return 'error No data available';
        }
        
        //var_dump($events);exit;
        
        foreach($news_list as $key => $news){
            $temp[$key]['news_id'] = $news->getNewsId();
            $temp[$key]['news_headline'] = $news->getheadline();
            $temp[$key]['news_description'] = $news->getDescription();
            $temp[$key]['big_url'] = $news->getBigUrl();
            $temp[$key]['thumb_url'] = $news->getThumbUrl();
            $temp[$key]['member_id'] = $news->getMemberId();

            $temp[$key]['news_date'] = $news->getNewsDate() instanceof \DateTime ? $news->getNewsDate()->format('M d,Y') : $news->getNewsDate();    
            
        }
        
        return $temp;
    }

    
    /*
     * Add new news
    */

        public function add_news($news_headline, $news_description, $member_id, $concern_tables)
        {  
            $big_url = '/api/public/images/big/rtn.jpg';
            $thumb_url = '/api/public/images/thumb/rtn.jpg';
            $tagline = '';
            $status = 'pending';
            $creation_date = new \DateTime("now");
            $news_date = new \DateTime("now");
            $image_date = new \DateTime("now");
            $publish_date = null;
            $broadcast = 'pending';
            $table_count = is_array($table_list = explode(',', $concern_tables)) ? count($table_list): 0;
            
            //var_dump($table_list);exit;
            
            if(!$table_list)
            {
                return 'error Concern Tables list not mentioned correctly.';
                exit;
            }
            
            $news = new Entities\News;
            
            if(isset($_FILES['news_image']))
            {
                // upload event photo to server & set image URLs
                $config['upload_path'] = 'public/images/big/news';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '10000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('news_image')) {
					return 'error '.$this->upload->display_errors();
                    exit;
				} else {
					$data = $this->upload->data();
					$thumb_url  = $big_url = '/api/public/images/big/news/' . $data['file_name'];
                    
                    $image = new ImageResize('public/images/big/news/'.$data['file_name']);
                    $image->scale(20);
                    $image->save('public/images/thumb/news/'.$data['file_name']);
                    $thumb_url = '/api/public/images/thumb/news/' . $data['file_name'];
				}
                
            }
            //var_dump($news);exit;
            
            $news->setMemberId($member_id);
            $news->setHeadline($news_headline);
            $news->setBigUrl($big_url);
            $news->setThumbUrl($thumb_url);
            $news->setDescription($news_description);
            $news->setTagline($tagline);
            $news->setTableCount($table_count);
            $news->setStatus($status);
            $news->setCreationDate($creation_date);
            $news->setNewsDate($news_date);
            $news->setPublishDate($publish_date);
            $news->setBroadcast($broadcast);
            $news->setImageDate($image_date);
            
            //var_dump($news);exit;
            
            try
            {
                $this->em->persist($news);
                $this->em->flush();
                
                $news_id = $news->getNewsId();
                
                // update invites i.e event_table table data

                foreach($table_list as $concern_table)
                {
                    $news_table = new Entities\NewsTables;
                    
                    $news_table->setNewsId($news_id);
                    $news_table->setTableId($concern_table);
                    
                    try
                    {
                        $this->em->persist($news_table);
                        $this->em->flush();
                    }catch(Exception $e)
                    {
                        return 'error '. $e->getMessage();
                    }
                }
                
                //var_dump($invites_arr);exit;
                
                return $news_id;
                
                
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }

}