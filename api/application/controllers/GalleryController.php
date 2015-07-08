 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {
    
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
                    'Status_code'=>401,
                    'Error_Message' =>'Access Denied'
                ));
            $response->respond();
            exit;
        }
	}

    /*
     * URL GET : /api/gallery/get_updates
    */  
    public function get_updates()
	{ 
        $response = new Response();
        
        $this->load->model('Gallery_model', 'gallery');
        
        $gallery_id = $this->gallery->get_updates();
            
            if(!is_array($gallery_id) && strpos($gallery_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $gallery_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('gallery_updates'=>$gallery_id));
                $response->setError(null);
                
                $response->respond();
            }

	}
	
    /*
     * URL GET : /api/gallery/set_update
    */
    public function set_update()
	{ 
        $response = new Response();
				
        $member_id = $this->input->post('member_id');
        $image_name = $this->input->post('image_name');
        $image_desc = $this->input->post('image_desc');

        if(!$member_id || !$image_name)
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
         
        $this->load->model('Gallery_model', 'gallery'); 
        $gallery_id = $this->gallery->set_update($member_id, $image_name, $image_desc);
            
            if(!is_int($gallery_id) && strpos($gallery_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $gallery_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('msg'=>'Gallery Update Successful'));
                $response->setError(null);
                
                $response->respond();
            }

	}
    
}
