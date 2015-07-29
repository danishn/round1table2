<?php
//comment1


defined('BASEPATH') OR exit('No direct script access allowed');

use \Library\ImageResize;       // Use Namespace for Image resize

class TestController extends CI_Controller {
    public $em;
    
    function __construct(){
		parent::__construct();
		$this->load->file('application/classes/Response.php');
		$this->load->file('application/classes/ImageResize.php');     // Load file for Image resize
        
        $this->em = $this->doctrine->em;
        
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
    
    

    public function index()
    {
        echo "<h1>Welcome to Round Table Nepal Application APIs</h1>";
    }
    
    
    /*
     * URL : /api/test/param1
    */
    public function api($param = 'danish')
    {
        echo "Called to Test API with data $param";
    }
    
    
    /*
     * URL : /api/test/gcm
    */
    
    public function gcm()
    {   
        /*
        // Select brodcast receivers depending upon type of broadcast notification
            $data = array(
                'type' => 'event',
                'event_id' => 72
            );
            $this->load->model('Notification_model', 'notification');
            $reg_ids = $this->notification->get_tokens($data);
            var_dump($reg_ids);exit;
        */
        // -----------------------------------------------------------------------------------------
        
        
        //  Fetch from db
        $this->em = $this->doctrine->em;        // Doctrine initialization
        $gcm_users = $this->em->getRepository('Entities\NotificationIds')->findAll();
        
        //var_dump($gcm_users);exit;
        
        $registration_ids = [];
        
        if($gcm_users)
        {
             foreach($gcm_users as $gcm_user){
                 $registration_ids[] = $gcm_user->getToken();    
             }
        }
        
        //$registration_ids[] = $this->input->post('registration_id');
        
        if($registration_ids[0] == null){
            echo 'error No Registration Ids found';
            exit;
        }
        

        $message = array(
            "title" => "New notification data for test",
            "body" => 'Recieved New Notification..'
         );
        
        $data = array(
            "type" => 'event',
            "msg" => 'New Notification',
            "description" => "Type can be anything from event/meeting/news/favorites/tables indicating whats this notification is for. Depending on type, app should reload/refresh respective view.",
         );
        
        
        // GCM Call
        $this->load->file('application/classes/GCM.php');
        $gcm = new GCM();
        $gcm_res = $gcm->send_notification($registration_ids, $message, $data);
        
        // APN Call
        $this->load->file('application/classes/APN.php');
        $apn = new APN();
        $apn_res = $apn->send_notification($registration_ids, $message, $data);
        
        $response =new Response();
        $response->setSuccess('true');
        $response->setdata(array('gcm_response'=>$gcm_res, 'apn_response'=>$apn_res));
        $response->setError(null);
                
        $response->respond();
        exit;
         
    }
    
        
     // API /api/test/sendMail
    
    public function sendMail()
    { 
        
        $to = 'danishnadaf@gmail.com';
        //$to = 'nadafafif@gmail.com';
        $subject = 'Your Authentication code for Round Table Nepal app.';
        $from = 'welcome@roundtablenepal.org';
        $password = 'otp12';
 
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = file_get_contents('templates/welcome.tpl');
        $message = str_replace("{{password}}", $password, $message);
        
        // Sending email
        if(mail($to, $subject, $message, $headers)){
            echo 'Your mail has been sent successfully.';
        } else{
            echo 'Unable to send email. Please try again.';
        }
        
    }
    
    // API /api/test/bulk_upload
    
    public function bulk_upload()
    {  
        $this->load->file('application/classes/PHPExcel.php');                  // PHP Excel File Upload
        
        if("POST" == $_SERVER['REQUEST_METHOD']) {
			try {
				//Upload file
				$config['upload_path'] = 'public/files/members';
				$config['allowed_types'] = 'xls|xlsx';
				$config['max_size']	= '10000';
                $config['overwrite'] = true;

				$this->load->library('upload', $config);
				$data = "";
				if ( ! $this->upload->do_upload('file')) {
					throw new Exception($this->upload->display_errors());
				} else {
					$data = $this->upload->data();
				}

				$filePath = "public/files/members/" . $data['file_name'];

				$inputFileType = "Excel5";

				if(".xls" == $data['file_ext']) {
					$inputFileType = "Excel5";
				} elseif(".xlsx" == $data['file_ext']) {
					$inputFileType = "Excel2007";
				} else {
					throw new Exception("Invalid File");
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
                    {   $count++;
                     
                        //var_dump($member_entry);    
                        
                        $member = new Entities\Members;    
                        $memberInfo = new Entities\MembersInfo;

                        if(!$member || !$memberInfo)
                        {
                            redirect('__admin/member?error=add member failed');
                            exit;
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
                            continue;
                        }   
                        
                        $otp = $password = mb_strimwidth(md5(time()), 0, 5);

                     //   $UNIX_DATE = ($member_entry['D'] - 25569) * 86400; // convert Excel date to php date
                     
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
                        $member->setClientId($client_id);       // Need to create this
                        $member->setOtp($otp);
                        $member->setDesignation('-');
                        
                        //var_dump($member);exit;
                     
                        $memberInfo->setFname($member_entry['A']);
                        $memberInfo->setLname($member_entry['B']);
                        $memberInfo->setBigUrl('public/images/big/members/rtn.jpg');
                        $memberInfo->setThumbUrl('public/images/thumb/members/rtn.jpg');
                        $memberInfo->setGender($member_entry['C']);
                        $memberInfo->setDob($dob);
                        $memberInfo->setMobile($member_entry['F']);
                        $memberInfo->setEmail($member_entry['G']);
                        $memberInfo->setRegDate(new \DateTime("now"));
                        $memberInfo->setAnniversaryDate($anniversary);
                        $memberInfo->setSpouseName($member_entry['J']);
                        $memberInfo->setSpouseDob($spouse_dob);
                        $memberInfo->setSpouseMobile($spouse_mobile);
                        $memberInfo->setResAddr($res_addr);
                        $memberInfo->setResPhone($member_entry['N']);
                        $memberInfo->setResCity($member_entry['L']);
                        $memberInfo->setOfficeAddr($office_addr);
                        $memberInfo->setOfficePhone($member_entry['P']);
                        $memberInfo->setOfficeCity($member_entry['O']);
                        $memberInfo->setDesignation('-');
                        $memberInfo->setFax($fax);
                        $memberInfo->setWebsiteUrl($website_url);
                        $memberInfo->setOtherDetails($other_details);
                        $memberInfo->setState($member_entry['Q'] == null ? '-' : $member_entry['Q']);
                        $memberInfo->setCountry($country);
                        $memberInfo->setZip($zip);
                        $memberInfo->setBloodGroup($member_entry['E']);
                        $memberInfo->setBusinessAreas($business_areas);
                        
                       // var_dump($member);
                        //var_dump($memberInfo);exit;
                        
                        
                         try
                        {
                            $this->em->persist($member);
                            $this->em->flush();
                            $memberInfo->setMemberId($member->getMemberId());
                            $this->em->persist($memberInfo);
                            $this->em->flush();
                            
                            // Increase member count in Tables table 
                             
                            //$temp = $this->get_members_details($member, $memberInfo);
                            //return $temp;
                            //echo $member->getMemberId(); 

                        }catch(Exception $e)
                        {
                            echo 'error '. $e->getMessage();
                            //return 'error '. $e->getMessage();
                        }
                     
                    }

                }
                echo $count." Members uploaded successfully";      
                //redirect('home');
                    } catch (Exception $e) {
                        $e->getMessage();
                    }
                } else {

                }

    }
    
    // API /api/test/conveners_upload
    
    public function conveners_upload()
    {   
        $this->load->file('application/classes/PHPExcel.php');                  // PHP Excel File Upload
        //echo "hello";exit;
        if("POST" == $_SERVER['REQUEST_METHOD']) 
        {
			try {
                    //Upload file
                    $config['upload_path'] = 'public/files/members';
                    $config['allowed_types'] = 'xls|xlsx';
                    $config['max_size']	= '10000';
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);
                    $data = "";
                    if ( ! $this->upload->do_upload('conveners')) {
                        throw new Exception($this->upload->display_errors());
                    } else {
                        $data = $this->upload->data();
                    }

                    $filePath = "public/files/members/" . $data['file_name'];

                    $inputFileType = "Excel5";

                    if(".xls" == $data['file_ext']) {
                        $inputFileType = "Excel5";
                    } elseif(".xlsx" == $data['file_ext']) {
                        $inputFileType = "Excel2007";
                    } else {
                        throw new Exception("Invalid File");
                    }

                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objReader->setReadDataOnly(true);
                    $objPHPExcel = $objReader->load($filePath);

                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

                    //var_dump($sheetData);exit;

                    array_shift($sheetData);

                    $count = 1;
                    $this->load->model('Conveners_model', 'conveners');

                    foreach($sheetData as $convener)
                    {
                        $designation = $convener['A'];

                        if($designation != null)
                        {   

                            $member_id = $count;
                            $name = $convener['B'] == null ? '-' : $convener['B'];
                            $table_code = '-';
                            $email = $convener['D'] == null ? '-' : $convener['D'];
                            $mobile = $convener['C'] == null ? '-' : $convener['C'];
                            $details = 'Convener 2015-16';

                            $conveners_id = $this->conveners->add_conveners($member_id, $name, $table_code, $designation, $email, $mobile, $details);              
                            if(is_int($conveners_id) && strpos($conveners_id, 'error') === false)
                            {
                                $count++;
                            }
                        }

                    }
                    echo --$count." Conveners uploaded successfully";      
                    //redirect('home');
                } catch (Exception $e) {
                    $e->getMessage();
                }
        }else {
            echo "Method not allowed";
        }

    }
    
    
    
    // API /api/test/send_otp   + Password
    
    public function send_otp()
    {   
        $members = $this->em->getRepository('Entities\Members')->findAll();
        
        //var_dump($members);exit;
        $count = 0;
        foreach($members as $member)
        {
            $to = $member->getEmail();
            $otp = $member->getOtp();
            $password = $member->getPassword();
            
            try
            {
                $to = 'danishnadaf@gmail.com';      // Comment this while sending mail to all members
                $subject = 'Your Authentication code for Round Table Nepal.';
                $from = 'rtnadmin@roundtablenepal.org';

                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Create email headers
                $headers .= 'From: RTN Admin <'.$from.">\r\n".
                            'Reply-To: '."no-reply@roundtablenepal.org"."\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                // Compose a simple HTML email message
                $message = file_get_contents('templates/otp_password.tpl');
                $message = str_replace("{{otp}}", $otp, $message);
                $message = str_replace("{{password}}", $password, $message);

                // Sending email
                if(mail($to, $subject, $message, $headers)){
                    // echo 'Your mail has been sent successfully.';
                    $count++;
                    $member->setStatus(1);
                    $this->em->persist($member);
                    $this->em->flush(); 
                    var_dump($member);exit;     // Comment this to send mail to all
                    
                }
                    
            }catch (Exception $e) {
                $e->getMessage();
            }
            
        }
        echo "Sent mail to $count memebers.";
        
    }
    
    // API /api/test/map_images
    
    public function map_images()
    {   
        $list = scandir("public/member_photos");
        
        array_shift($list);
        array_shift($list);
        array_pop($list);
        //var_dump($list);exit;
        
        
        
        $members = $this->em->getRepository('Entities\Members')->findAll();
        $count = 0;
        $matched= array();
        foreach($members as $member)
        { 
            $tid = $member->getTableId();
            
            if($tid >= 9)
            {
                $tid++;
            }
            
            $member_info = $this->em->getRepository('Entities\MembersInfo')->findOneBy(array('memberId' => $member->getMemberId()));
            
            //var_dump($member_info);exit;
            $fname = $member_info->getFname();
            $lname = $member_info->getLname();
            
            $file_name = $tid.'-'.str_replace(' ', '', $fname).str_replace(' ', '', $lname);
            $file_name_jpg = $file_name.'.jpg';
            $file_name_jpeg = $file_name.'.jpeg';
            //echo $file_name."<br>";
            
            $new_name = 'member_'.$member->getMemberId().'_profile';
            
            for($i=0; $i<count($list); $i++)
            {
                if(strcasecmp($list[$i], $file_name_jpeg) == 0)
                {
                    $count++;
                    $new_name .= '.jpeg';
                    $matched[] = $list[$i];
                    if(rename("public/member_photos/".$list[$i], "public/images/big/members/".$new_name))
                    {
                        $member_info->setBigUrl("/api/public/images/big/members/".$new_name);   
                        $member_info->setThumbUrl("/api/public/images/thumb/members/".$new_name);   
                    }
                    $this->em->flush();
                    //var_dump($member_info);exit;
                    
                }elseif( strcasecmp($list[$i], $file_name_jpg) == 0)
                {
                    $count++;
                    $new_name .= '.jpg';
                    $matched[] = $list[$i];
                    if(rename("public/member_photos/".$list[$i], "public/images/big/members/".$new_name))
                    {
                        $member_info->setBigUrl("/api/public/images/big/members/".$new_name);   
                        $member_info->setThumbUrl("/api/public/images/thumb/members/".$new_name);   
                    }
                    $this->em->flush();
                    //var_dump($member_info);exit;
                }else{
                    //$matched[$i] = $list[$i];
                }
                
                
            }

        }
        echo $count." Files mapped.";
    }
    
    // API /api/test/imageProcessing
    
    public function imageProcessing()
    {   /*
        $image = new ImageResize('public/images/big/kmrt4.png');
        $image->scale(20);
        $image->save('public/images/thumb/kmrt001.png');

        var_dump($image);
        */
        
        // Copy-resize-move images from bib to thumb
        
        $list = scandir("public/images/big/members");
        
        array_shift($list);
        array_shift($list);
        array_pop($list);
        $count = 0;
        foreach($list as $img)
        {
            $image = new ImageResize('public/images/big/members/'.$img);
            $image->scale(20);
            $image->save('public/images/thumb/members/'.$img);
            $count++;
        }
        echo "$count images moved";
        //var_dump($list);exit;
    }
    
    public function addUser()
    {
        echo "Adding Data from DB";
        $this->load->model('Test_model');
        $data = $this->Test_model->add();
        var_dump($data);
    }
    
    
    
    public function createMore($param1 = 'danish', $param2 = '25')
    {
        echo "Creating data for $param1 with Qty :: $param2";
        $this->load->view('test');
        $this->load->view('test/test', array('name'=>$param1,'qty'=>$param2));
    }
   
    public function getAll()
    {
        $response =new Response();
        //echo "Getting Data from DB";
        $this->load->model('Test_model');
       // $this->auth_service->validate_request();
        $data = $this->Test_model->getAll();
        //var_dump($data);exit;
        
        $response->setSuccess('true');
        $response->setData($data);
        $response->setError(null);
        
        $response->respond();
        
        //echo json_encode($data);
    }
        
    
}



/*
* GCM request test in Rest Client

URL : https://android.googleapis.com/gcm/send
header : Authorization: key=AIzaSyAdcp_ExRygjsNZCJatSuRa5lq-zVKbaLQ

content-type : application/json

body : 

{"registration_ids":["dn7P6zkJIrw:APA91bFW9q_O1mQXAtW9Rj1z3L9f7kYG5N36fbu5OKtnXD13dJ8d1_2YrSvrdRffm-0hZyntSWeUoHzkXBZSd9zfxpK9Y4I_M-t7ehoWR41BGJYxfaPAsuEe8rfqMhwIEHvEVk9bbwvf","euxDUjZHZ7I:APA91bGNOBjjW_CWt1J2FWFnlSWK80BXUjuySMkslWTHcVxVAbJhRk-KjjQ_J02p9FmQazEi-hSoEFjgpnx2_9HCX63cqprwor7973gg8b_ebzT9Zk-aA6yCxAOxyzdm_MrR2NWsJH0f"],"notification": {"type":"event","message":"New Event Created","description":"You are invited for an event on Aug 10th, 2015 at kathmandu. Please respond to RSVP"}}

*/