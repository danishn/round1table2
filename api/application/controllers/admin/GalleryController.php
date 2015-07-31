 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalleryController extends CI_Controller {
    
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
     * URL GET : /__admin/gallery     //display all updates
    */
    
    public function index()
	{ 
        $updates = $this->em->getRepository('Entities\Gallery')->findAll();
		$data=null;
        if($updates)
        {
            $data['updates'] =null;
            $i=0;
            foreach($updates as $row)
            {
                $member=$this->em->getRepository("Entities\MembersInfo")->findOneBy(array('memberId'=>$row->getMemberId()));
                $member_name=null;
                if($member)
                {
                    $member_name=$member->getFname()." ".$member->getLname();
                }else
                    continue;
                $data['updates'][$i]['id'] =$row->getImageId();  
                $data['updates'][$i]['image_name'] =$row->getImageName(); 
                $data['updates'][$i]['image_description'] =$row->getImageDesc();
                $data['updates'][$i]['created_by'] =$member_name;  
                $data['updates'][$i]['submit_date'] =$row->getSubmitDate()->format('d/m/y');

                $i++;
            }
            
        }
    
        
        $this->load->view('gallery_view',$data);

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
                $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Image not found.</div>");
                redirect('__admin/gallery');
            }

            $this->em->remove($updates);
            $this->em->flush();
			
            $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>Image Deleted Successfully.</div>");
            redirect('__admin/gallery');
            
        }else
        {
           $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Delete failed.</div>");
            redirect('__admin/gallery');
        }
        
	}
}
