 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {
    
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
     * URL GET : /__admin/gallery     //display all updates
    */
    
    public function index()
	{ 
        $updates = $this->em->getRepository('Entities\Gallery')->findAll();
        if(!$updates)
        {
            $temp['updates'] =  'No data available';
        }
        
        var_dump($updates);exit;

	}

    /*
     * URL GET : /__admin/updates/delete     //delete update
    */
    
    public function delete()
	{ 
        if(isset($_GET['image_id']))
        {
            $updates = $this->em->getRepository('Entities\Gallery')->findOneBy(array('imageId'=>$_GET['image_id']));
            
            if(!$updates)
            {
                redirect('__admin/gallery?error=update not found');
            }

            $this->em->remove($updates);
            $this->em->flush();
            
            redirect('__admin/gallery?delete=success');
            
        }else
        {
            redirect('__admin/gallery?error=delete failed');
        }
        
	}
}
