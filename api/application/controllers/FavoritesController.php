 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FavoritesController extends CI_Controller {
    
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
     * URL GET : /api/favorites/get_all
    */
    
    public function get_favorites()
	{ 
      $response = new Response();
        
        $this->load->model('Favorites_model', 'favorites');
        
        $favorites_list = $this->favorites->get_all();
            
            if(!is_array($favorites_list) && strpos($favorites_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $favorites_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('favorites_list'=>$favorites_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
	
	/*
     * URL GET : /api/favorites/create
    */
    
	
	 public function create_favorites()
	{ 
        $response = new Response();
				
        $brand_name = $this->input->post('brand_name');
        //$image_url = $this->input->post('image_url');
        $website_url = $this->input->post('website_url');

        if(!$brand_name || !$website_url || !isset($_FILES['favorites_image']))
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
         
        $this->load->model('Favorites_model', 'favorites'); 
        $favorites_id = $this->favorites->add_favorites($brand_name, $website_url);
            
            if(!is_int($favorites_id) && strpos($favorites_id, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $favorites_id)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('msg'=>'Favorite Created Successfully'));
                $response->setError(null);
                
                $response->respond();
            }

	}
   
    /*
     * URL POST : /api/favorites/search
    */
 /*   
    public function search_favorites()
	{ 
      $response = new Response();
        
        $search_by = $this->input->post('searchBy');
        $search_key = $this->input->post('searchKey');
        
        //echo $search_by."=>".$search_key;exit;
        
        if(!$search_by || !$search_key)
        { 
            $response->setSuccess('false');
            $response->setdata(null);
            $response->setError(array(
                    'code'=>402,
                    'msg' =>'Invalid Get Parameters'
                ));
            $response->respond();
            exit;
        }
        
        $this->load->model('Favorites_model', 'favorites');
        
        $favorites_list = $this->favorites->find_favorites($search_by, $search_key);
            
            if(!is_array($favorites_list) && strpos($favorites_list, 'error') !== false)
            {
                $response->setSuccess('false');
                $response->setdata(null);
                $response->setError(array(
                        'code'=>402,
                        'msg' =>str_replace('error ', '', $favorites_list)
                    ));
                $response->respond();
                exit;
            }else
            {
                $response->setSuccess('true');
                $response->setdata(array('favorites_list'=>$favorites_list));
                $response->setError(null);
                
                $response->respond();
            }

	}
*/
    
}
