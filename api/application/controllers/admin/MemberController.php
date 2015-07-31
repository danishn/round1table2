<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class MemberController extends CI_Controller {

   

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

     * URL GET : /__admin/member     //display all member

    */

    

    public function index()

	{ 

        $members = $this->doctrine->em->getRepository('Entities\Members')->findAll();

		

        //var_dump($members);exit;

        $temp = null;

        foreach($members as $key => $member)

        {  



            $memberInfo = $this->em->find('Entities\MembersInfo', $member->getMemberId());

            //var_dump($memberInfo);exit;

            

            if(isset($memberInfo))

            {   

                $temp[$key]['member_id'] = $member->getMemberId();

                $temp[$key]['table_id'] = $member->getTableId();

                $temp[$key]['status'] = $member->getStatus();

                $temp[$key]['registration_date'] = $member->getRegistrationDate() instanceof \DateTime ? $member->getRegistrationDate()->format('M d,Y') : $member->getRegistrationDate();



                $temp[$key]['fname'] = $memberInfo->getFname();

                $temp[$key]['lname'] = $memberInfo->getLname();

                $temp[$key]['gender'] = $memberInfo->getGender();

                $temp[$key]['mobile'] = $memberInfo->getMobile();

                $temp[$key]['email'] = $memberInfo->getEmail();

                $temp[$key]['blood_group'] = $memberInfo->getBloodGroup();

                $temp[$key]['spouse_name'] = $memberInfo->getSpouseName();



                $temp[$key]['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    



                $temp[$key]['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    



                $temp[$key]['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    





                $temp[$key]['image_thumb_url'] = $memberInfo->getThumbUrl();

                $temp[$key]['image_big_url'] = $memberInfo->getBigUrl();



                $temp[$key]['res_phone'] = $memberInfo->getResPhone();

                $temp[$key]['office_phone'] = $memberInfo->getOfficePhone();

                $temp[$key]['designation'] = $memberInfo->getDesignation();

                $temp[$key]['res_city'] = $memberInfo->getResCity();

                $temp[$key]['office_city'] = $memberInfo->getOfficeCity();

                $temp[$key]['state'] = $memberInfo->getState();

            }



        }



        if(!is_array($temp))

        {

            return 'error No Members found';

        }

		else

		{

			$data['members']=$temp;

			//pagination($temp,$rows_per,$page);

			$this->load->view('member_view',$data);

		}



	}

		public function add_form(){

		

		$data['table']=$this->doctrine->em->getRepository("Entities\Tables")->findAll();

		$this->load->view('member_add_view',$data);

		

	}
    public function bulk_upload_form(){
		
        
		//$data['table']=$this->doctrine->em->getRepository("Entities\Tables")->findAll();
		$this->load->view('member_bulk_upload_view');
		
	}

	public function get_details()

	{

		$member_id=$this->input->get('member_id');

        $member = $this->doctrine->em->find('Entities\Members',$member_id);

		$response=new Response;

        $temp = null;

            $memberInfo = $this->em->find('Entities\MembersInfo', $member->getMemberId());

			$key="member";

            if(isset($memberInfo))

            {   

                $temp[$key]['member_id'] = $member->getMemberId();

                $temp[$key]['table_id'] = $member->getTableId();

                $temp[$key]['status'] = $member->getStatus();

                $temp[$key]['registration_date'] = $member->getRegistrationDate() instanceof \DateTime ? $member->getRegistrationDate()->format('M d,Y') : $member->getRegistrationDate();



                $temp[$key]['fname'] = $memberInfo->getFname();

                $temp[$key]['lname'] = $memberInfo->getLname();

                $temp[$key]['gender'] = $memberInfo->getGender();

                $temp[$key]['mobile'] = $memberInfo->getMobile();

                $temp[$key]['email'] = $memberInfo->getEmail();

                $temp[$key]['blood_group'] = $memberInfo->getBloodGroup();

                $temp[$key]['spouse_name'] = $memberInfo->getSpouseName();



                $temp[$key]['dob'] = $memberInfo->getDob() instanceof \DateTime ? $memberInfo->getDob()->format('M d,Y') : $memberInfo->getDob();    



                $temp[$key]['spouse_dob'] = $memberInfo->getSpouseDob() instanceof \DateTime ? $memberInfo->getSpouseDob()->format('M d,Y') : $memberInfo->getSpouseDob();    



                $temp[$key]['anniversary_date'] = $memberInfo->getAnniversaryDate() instanceof \DateTime ? $memberInfo->getAnniversaryDate()->format('M d,Y') : $memberInfo->getAnniversaryDate();    





                $temp[$key]['image_thumb_url'] = $memberInfo->getThumbUrl();

                $temp[$key]['image_big_url'] = $memberInfo->getBigUrl();



                $temp[$key]['res_phone'] = $memberInfo->getResPhone();

                $temp[$key]['office_phone'] = $memberInfo->getOfficePhone();

                $temp[$key]['designation'] = $memberInfo->getDesignation();

                $temp[$key]['res_city'] = $memberInfo->getResCity();

                $temp[$key]['office_city'] = $memberInfo->getOfficeCity();

                $temp[$key]['state'] = $memberInfo->getState();

            }

        if(!is_array($temp))

        {
			$response->setSuccess('false');

            $response->setdata(null);

            $response->setError(array(

                    'Status_code'=>523,

                    'Error_Message' =>'Member Not found'

                ));

            $response->respond();

            exit;

        }

		else

		{

			$data['member']=$temp;

			$response->setSuccess('true');

            $response->setdata($temp);

            $response->setError(null);

            $response->respond();

            exit;

		}



	}

  

    /*

     * URL GET : /__admin/member/delete     //delete member

    */

    public function delete()

	{ 

		

        if(isset($_GET['member_id']))

        {

            $member = $this->em->getRepository('Entities\Members')->findOneBy(array('memberId' => $_GET['member_id']));

            

            $memberInfo = $this->em->getRepository('Entities\MembersInfo')->findOneBy(array('memberId' => $_GET['member_id']));

            

            

            if(!$member || !$memberInfo)

            {

				$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Failed!</strong>Member not Found.</div>");

                redirect('__admin/member');				

            }



            $this->em->remove($member);

            $this->em->remove($memberInfo);

            $this->em->flush();

            

            

			 $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>Member Deleted Successfully.</div>");

			 redirect('__admin/member');

            

        }else

        {

			$this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Failed!</strong>Not able to Delete Member.</div>");

            redirect('__admin/member');

        }

        

	}

    

    /*

     * URL GET : /__admin/member/add     //add member

    */

    

    /* public function add()

	{ 

		$response=new Response;

        if(isset($_POST) && !empty($_POST))

        {

            

            if(!isset($_POST['table_id']) || !isset($_POST['email']) || !isset($_POST['designation']) || !isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['gender']) || !isset($_POST['mobile']) || !isset($_POST['blood_group']) || !isset($_POST['spouse_name']) || !isset($_POST['dob']) || !isset($_POST['spouse_dob']) || !isset($_POST['anniversary_date']) || !isset($_POST['res_phone']) || !isset($_POST['office_phone']) || !isset($_POST['designation']) || !isset($_POST['res_city']) || !isset($_POST['office_city']) || !isset($_POST['state']))

            {

                //redirect('__admin/member?error=incomplete_data');

				$response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'Incomplete Data'

					));

				$response->respond();

				exit;

            }

            

            $member = new Entities\Members;    

            $memberInfo = new Entities\MembersInfo;

            

            if(!$member || !$memberInfo)

            {

                $response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'Add Member failed'

					));

				$response->respond();

				exit;

            }

            $otp='0tp12';       //temp otp

            $password = '-';

            $client_id = '-';

            $spouse_dob = isset($_POST['spouse_dob']) ? new \DateTime($_POST['spouse_dob']) : null;

            $spouse_mobile = isset($_POST['spouse_mobile']) ? $_POST['spouse_mobile'] : '-';

            $res_addr = isset($_POST['res_addr']) ? $_POST['res_addr'] : '-';

            $office_addr = isset($_POST['office_addr']) ? $_POST['office_addr'] : '-';

            $fax = isset($_POST['fax']) ? $_POST['fax'] : '-';

            $website_url = isset($_POST['website_url']) ? $_POST['website_url'] : '-';

            $other_details = isset($_POST['other_details']) ? $_POST['other_details'] : '-';

            $country = isset($_POST['country']) ? $_POST['country'] : '-';

            $zip = isset($_POST['zip']) ? $_POST['zip'] : '-';

            $business_areas = isset($_POST['business_areas']) ? $_POST['business_areas'] : '-';

            

            

            $member->setTableId($_POST['table_id']);

            $member->setPassword($password);

            $member->setRegistrationDate(new \DateTime("now"));

            $member->setLastVisitDate(new \DateTime("now"));

            $member->setMemberType(0);

            $member->setStatus(1);

            $member->setEmail($_POST['email']);

            $member->setClientId($client_id);       // Need to create this

            $member->setOtp($otp);       // Create this on API call

            $member->setDesignation($_POST['designation']);



            $memberInfo->setFname($_POST['fname']);

            $memberInfo->setLname($_POST['lname']);

            $memberInfo->setBigUrl('public/images/big/members/rtn.jpg');

            $memberInfo->setThumbUrl('public/images/thumb/members/rtn.jpg');

            $memberInfo->setGender($_POST['gender']);

            $memberInfo->setDob(new \DateTime($_POST['dob']));

            $memberInfo->setMobile($_POST['mobile']);

            $memberInfo->setEmail($_POST['email']);

            $memberInfo->setRegDate(new \DateTime("now"));

            $memberInfo->setAnniversaryDate(new \DateTime($_POST['anniversary_date']));

            $memberInfo->setSpouseName($_POST['spouse_name']);

            $memberInfo->setSpouseDob(new \DateTime($_POST['spouse_dob']));

            $memberInfo->setSpouseMobile($spouse_mobile);

            $memberInfo->setResAddr($res_addr);

            $memberInfo->setResPhone($_POST['res_phone']);

            $memberInfo->setResCity($_POST['res_city']);

            $memberInfo->setOfficeAddr($office_addr);

            $memberInfo->setOfficePhone($_POST['office_phone']);

            $memberInfo->setOfficeCity($_POST['office_city']);

            $memberInfo->setDesignation($_POST['designation']);

            $memberInfo->setFax($fax);

            $memberInfo->setWebsiteUrl($website_url);

            $memberInfo->setOtherDetails($other_details);

            $memberInfo->setState($_POST['state']);

            $memberInfo->setCountry($country);

            $memberInfo->setZip($zip);

            $memberInfo->setBloodGroup($_POST['blood_group']);

            $memberInfo->setBusinessAreas($business_areas);

            

            



           // var_dump($member);echo"<br><br><br>";

           // var_dump($memberInfo);exit;

            

             try

            {

                $this->doctrine->em->persist($member);

                $this->doctrine->em->flush();

                //$temp = $this->get_members_details($member, $memberInfo);

                //return $temp;



            }catch(Exception $e)

            {

				$response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'error '. $e->getMessage()

					));

				$response->respond();

				exit;

                //return 'error '. $e->getMessage();

            }



            if(isset($_FILES['profile_image']))

            {  

                $pic = explode('.', $_FILES['profile_image']['name']);

               // $_FILES['profile_image']['name'] = 'member_'.$member_id.'_profile.'.$pic[count($pic)-1];



                // upload event photo to server & set image URLs

                $config['upload_path'] = 'public/images/big/members';

                $config['allowed_types'] = 'gif|jpeg|jpg|png';

                $config['max_size']	= '10000';

                $config['overwrite'] = true;

                $config['file_name'] = 'member_'.$member->getMemberId().'_profile.'.$pic[count($pic)-1];



                //$config['file_name']	= 'member_'.$member->getMemberId().'.'.$pic[count($pic)-1];

                //echo 'member_'.$member->getMemberId().'_pic.'.$pic[count($pic)-1];exit;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ( ! $this->upload->do_upload('profile_image')) {

					$response->setSuccess('false');

					$response->setdata(null);

					$response->setError(array(

							'Status_code'=>523,

							'Error_Message' =>'error '.$this->upload->display_errors()

						));

					$response->respond();

					exit;

                  //  return 'error '.$this->upload->display_errors();

                  //  exit;

                } else

                {

                    $data = $this->upload->data();

                    $thumb_url  = $big_url = '/api/public/images/big/members/' . $data['file_name'];



					

				//		commented for a while 
//
			//			error:class not found

			//		$this->load->file('application/classes/ImageResize.php');

            //        $image = new ImageResize('public/images/big/members/'.$data['file_name']);

                    $image->scale(20);
//
             //       $image->save('public/images/thumb/members/'.$data['file_name']); 
					

                    $thumb_url = '/api/public/images/thumb/members/' . $data['file_name'];



                    $memberInfo->setBigUrl($big_url);

                    $memberInfo->setThumbUrl($thumb_url);

                }



            }
			 
			$memberInfo->setMemberId($member->getMemberId());

			$this->doctrine->em->persist($memberInfo);

            $this->doctrine->em->flush();



           

        }else

        {

			$response->setSuccess('false');

					$response->setdata(null);

					$response->setError(array(

							'Status_code'=>523,

							'Error_Message' =>'error method not allowed'

						));

					$response->respond();

					exit;

        }
 */
        

	

    

    /*

     * URL GET : /__admin/member/upload     //upload bulk members

    */

    /*

    public function upload()

	{ 

         

	}

    */

    public function add()

	{ 

		$response=new Response;

        if(isset($_POST) && !empty($_POST))

        {

            

            if(!isset($_POST['table_id']) || !isset($_POST['email']) || !isset($_POST['designation']) || !isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['gender']) || !isset($_POST['mobile']) || !isset($_POST['blood_group']) || !isset($_POST['spouse_name']) || !isset($_POST['dob']) || !isset($_POST['spouse_dob']) || !isset($_POST['anniversary_date']) || !isset($_POST['res_phone']) || !isset($_POST['office_phone']) || !isset($_POST['designation']) || !isset($_POST['res_city']) || !isset($_POST['office_city']) || !isset($_POST['state']))

            {

                //redirect('__admin/member?error=incomplete_data');

				$response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'Incomplete Data'

					));

				$response->respond();

				exit;

            }


            $otp='0tp12';       //temp otp

            $password = '-';

            $client_id = '-';

            $spouse_dob = isset($_POST['spouse_dob']) ? new \DateTime($_POST['spouse_dob']) : null;

            $spouse_mobile = isset($_POST['spouse_mobile']) ? $_POST['spouse_mobile'] : '-';

            $res_addr = isset($_POST['res_addr']) ? $_POST['res_addr'] : '-';

            $office_addr = isset($_POST['office_addr']) ? $_POST['office_addr'] : '-';

            $fax = isset($_POST['fax']) ? $_POST['fax'] : '-';

            $website_url = isset($_POST['website_url']) ? $_POST['website_url'] : '-';

            $other_details = isset($_POST['other_details']) ? $_POST['other_details'] : '-';

            $country = isset($_POST['country']) ? $_POST['country'] : '-';

            $zip = isset($_POST['zip']) ? $_POST['zip'] : '-';

            $business_areas = isset($_POST['business_areas']) ? $_POST['business_areas'] : '-';

			$thumb_url  = '/api/public/images/big/members/default.jpg';
			$big_url ='/api/public/images/big/members/default.jpg';
			$id=1;
            $otp = $password = mb_strimwidth(md5(time()*rand(1,999)), 0, 5);
			$this->load->database();
			$data=array(
				'table_id'=>$_POST['table_id'],
				'registration_date'=> date('Y-m-d'),
				'last_visit_date'=> date('Y-m-d H:i:s'),
				'member_type'=>0,
				'status'=>1,
				'password'=>$password,
				'email'=>$_POST['email'],
				'otp'=>$otp,
				'client_id'=>'-',
				'designation'=>'-',
				);
            
             try

            {

				$this->db->insert('members', $data); 
				$id=$this->db->insert_id();
                 
                $table = $this->em->getRepository('Entities\Tables')->findOneBy(array('tableId'=>$_POST['table_id']));
                if($table)
                {
                    // Increase member count in Tables table
                    $c = $table->getMembersCount();
                    $c++;
                    $table->setMembersCount($c);
                    $this->em->persist($table);
                    $this->em->flush();
                }

            }catch(Exception $e)

            {

				$response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'error '. $e->getMessage()

					));

				$response->respond();

				exit;

            }


            if(isset($_FILES['profile_image']))

            {  

                $pic = explode('.', $_FILES['profile_image']['name']);

               // $_FILES['profile_image']['name'] = 'member_'.$member_id.'_profile.'.$pic[count($pic)-1];



                // upload event photo to server & set image URLs

                $config['upload_path'] = 'public/images/big/members';

                $config['allowed_types'] = 'gif|jpeg|jpg|png';

                $config['max_size']	= '10000';

                $config['overwrite'] = true;

                $config['file_name'] = 'member_'.$id.'_profile.'.$pic[count($pic)-1];



                //$config['file_name']	= 'member_'.$member->getMemberId().'.'.$pic[count($pic)-1];

                //echo 'member_'.$member->getMemberId().'_pic.'.$pic[count($pic)-1];exit;



                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ( ! $this->upload->do_upload('profile_image')) {

					/*$response->setSuccess('false');

					$response->setdata(null);

					$response->setError(array(

							'Status_code'=>523,

							'Error_Message' =>'error '.$this->upload->display_errors()

						));

					$response->respond();

					exit;
*/
                  //  return 'error '.$this->upload->display_errors();

                  //  exit;

                } else

                {

                    $data = $this->upload->data();

                    $thumb_url  = $big_url = '/api/public/images/big/members/' . $data['file_name'];



					/* 

						commented for a while 

						error:class not found

					$this->load->file('application/classes/ImageResize.php');

                    $image = new ImageResize('public/images/big/members/'.$data['file_name']);

                    $image->scale(20);

                    $image->save('public/images/thumb/members/'.$data['file_name']); */

                    //$thumb_url = '/api/public/images/thumb/members/' . $data['file_name'];



                   // $memberInfo->setBigUrl($big_url);

                   // $memberInfo->setThumbUrl($thumb_url);

                }



            }

            	$data = array(	
				'member_id'=>$id,
				'fname'=>$_POST['fname'],
				'lname'=>$_POST['lname'],
				'big_url'=>$big_url,
				'thumb_url'=>$thumb_url,
				'gender'=>$_POST['gender'],
				'dob'=>date('Y-m-d',strtotime($_POST['dob'])),
				'mobile'=>$_POST['mobile'],
				'email'=>$_POST['email'],
				'reg_date'=>date('Y-m-d'),
				'anniversary_date'=>date('Y-m-d',strtotime($_POST['anniversary_date'])),
				'spouse_name'=>$_POST['spouse_name'],
				'spouse_dob'=>date('Y-m-d',strtotime($_POST['spouse_dob'])),
				'spouse_mobile'=>0,
				'res_phone'=>$_POST['res_phone'],
				'res_city'=>$_POST['res_city'],
				'office_addr'=>'-',
				'office_phone'=>$_POST['office_phone'],
				'office_city'=>$_POST['office_city'],
				'designation'=>'-',
				'fax'=>'-',
				'website_url'=>'-',
				'other_details'=>'-',
				'state'=>$_POST['state'],
				'country'=>'-',
				'zip'=>'-',
				'blood_group'=>$_POST['blood_group'],
				'business_areas'=>'-',
				);				
			
			   
			 try

            {

				$this->db->insert('members_info', $data);

            }catch(Exception $e)

            {

				$response->setSuccess('false');

				$response->setdata(null);

				$response->setError(array(

						'Status_code'=>523,

						'Error_Message' =>'error '. $e->getMessage()

					));

				$response->respond();

				exit;

            }
			
			$response->setSuccess('true');

					$response->setdata(null);

					$response->setError(null);

					$response->respond();

					exit;

        }else

        {

			$response->setSuccess('false');

					$response->setdata(null);

					$response->setError(array(

							'Status_code'=>523,

							'Error_Message' =>'error method not allowed'

						));

					$response->respond();

					exit;

        }




}
public function bulk_upload()
    {
    
        $this->load->file('application/classes/PHPExcel.php'); // PHP Excel File Upload
        if("POST" == $_SERVER['REQUEST_METHOD']) 
        {
            try 
            {
                //Upload file
                $config['upload_path'] = 'public/files/members';
                $config['allowed_types'] = 'xls|xlsx';
                $config['max_size'] = '10000';
                $config['overwrite'] = true;
                $this->load->library('upload', $config);
                $data = "";
                if ( !$this->upload->do_upload('file')) 
                {
                    //throw new Exception($this->upload->display_errors());
                     $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>". $this->upload->display_errors()."</div>");
                redirect('__admin/member/bulk_form');
                } 
                else 
                {
                    $data = $this->upload->data();
                }
            $filePath = "public/files/members/" . $data['file_name'];
            $inputFileType = "Excel5";
            if(".xls" == $data['file_ext']) 
            {
                $inputFileType = "Excel5";
            } 
            elseif(".xlsx" == $data['file_ext']) 
            {
                $inputFileType = "Excel2007";
            }
            else
            {
                //throw new Exception("Invalid File");
                $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Invalid File</div>");
                redirect('__admin/member/bulk_form');
                
            }
                
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($filePath);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            //var_dump($sheetData);exit;
                
            array_shift($sheetData);
            $count = 0;
            foreach($sheetData as $member_entry)
            {   
                
                if($member_entry['A'] && $member_entry['B'] && $member_entry['G'] && $member_entry['H'])
                { 
                    //var_dump($member_entry);
                    $member = new Entities\Members;
                    $memberInfo = new Entities\MembersInfo;
                    if(!$member || !$memberInfo)
                    {
                        
                        $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>Failed to add Members.</div>");
                redirect('__admin/member/bulk_form');
                    }
                /* Below params Are optional/not required*/
                $client_id = '-';
                $spouse_mobile = '-';
                $res_addr = '-';
                $office_addr = '-';
                $fax = '-';
                $website_url = '-';
                $other_details = '-';
                $country = '-';
                $zip = '-';
                $business_areas = '-';
                $table = $this->em->getRepository('Entities\Tables')->findOneBy(array('tableCode'=>$member_entry['H']));
                if(!$table)
                {
                    echo "{$member_entry['H']} +++ {$member_entry['G']}<br>";
                    continue;
                }
                $otp = $password = mb_strimwidth(md5(time()*rand(1,999)), 0, 5);
            // $UNIX_DATE = ($member_entry['D'] - 25569) * 86400; // convert Excel date to php date
            $dob = $member_entry['D'] == null ? new \DateTime("now") : new \DateTime(gmdate('Y-m-d',($member_entry['D'] - 25569) * 86400 ));
            $anniversary = $member_entry['I'] == null ? new \DateTime("now") : new \DateTime(gmdate('Y-m-d',($member_entry['I'] - 25569) * 86400 ));
            $spouse_dob = $member_entry['K'] == null ? new \DateTime("now") : new \DateTime(gmdate('Y-m-d',($member_entry['K'] - 25569) * 86400 ));
            //var_dump($dob);exit;

            $member->setTableId($table->getTableId());
            $member->setPassword($password);
            $member->setRegistrationDate(new \DateTime("now"));
            $member->setLastVisitDate(new \DateTime("now"));
            $member->setMemberType(0);
            $member->setStatus(0);
            $member->setEmail($member_entry['G']);
            $member->setClientId($client_id); // Need to create this
            $member->setOtp($otp);
            $member->setDesignation('-');
            //var_dump($member);exit;
            $memberInfo->setFname($member_entry['A']);
            $memberInfo->setLname($member_entry['B']);
            $memberInfo->setBigUrl('/api/public/images/big/members/rtn.jpg');
            $memberInfo->setThumbUrl('/api/public/images/thumb/members/rtn.jpg');
            $memberInfo->setGender($member_entry['C'] == null ? 'male' : $member_entry['C']);
            $memberInfo->setDob($dob);
            $memberInfo->setMobile($member_entry['F'] == null ? '-' : $member_entry['F']);
            $memberInfo->setEmail($member_entry['G']);
            $memberInfo->setRegDate(new \DateTime("now"));
            $memberInfo->setAnniversaryDate($anniversary);
            $memberInfo->setSpouseName($member_entry['J'] == null ? '-' : $member_entry['J']);
            $memberInfo->setSpouseDob($spouse_dob);
            $memberInfo->setSpouseMobile($spouse_mobile);
            $memberInfo->setResAddr($res_addr);
            $memberInfo->setResPhone($member_entry['N'] == null ? '-' : $member_entry['N']);
            $memberInfo->setResCity($member_entry['L'] == null ? '-' : $member_entry['L']);
            $memberInfo->setOfficeAddr($office_addr);
            $memberInfo->setOfficePhone($member_entry['P'] == null ? '-' : $member_entry['P']);
            $memberInfo->setCompany("-");
            $memberInfo->setOfficeCity($member_entry['O'] == null ? '-' : $member_entry['O']);
            $memberInfo->setDesignation('-');
            $memberInfo->setFax($fax);
            $memberInfo->setWebsiteUrl($website_url);
            $memberInfo->setOtherDetails($other_details);
            $memberInfo->setState($member_entry['Q'] == null ? '-' : $member_entry['Q']);
            $memberInfo->setCountry($country);
            $memberInfo->setZip($zip);
            $memberInfo->setBloodGroup($member_entry['E'] == null ? '-' : $member_entry['E']);
            $memberInfo->setBusinessAreas($business_areas);
            //var_dump($member);
            //var_dump($memberInfo);

            try
            {
            $this->em->persist($member);
            $this->em->flush();
            $memberInfo->setMemberId($member->getMemberId());
            $this->em->persist($memberInfo);
            $this->em->flush();
            $count++;
            // Increase member count in Tables table
                $c = $table->getMembersCount();
                $c++;
                $table->setMembersCount($c);
		$this->em->persist($table);
		 $this->em->flush();
                
            }catch(Exception $e)
            {
             $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>". $e->getMessage()."</div>");
                redirect('__admin/member/bulk_form');

            }
            }
        }
        $this->session->set_flashdata("message","<div class='alert alert-success fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success! </strong> ". $count." Members uploaded successfully </div>");
        echo $count." Members uploaded successfully";
         redirect('__admin/member/bulk_form');
        } catch (Exception $e) {
         $this->session->set_flashdata("message","<div class='alert alert-warning fade in' style='text-align:center'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error!</strong>". $e->getMessage()."</div>");
                redirect('__admin/member/bulk_form');
        }
        } else {
        }
    }

}