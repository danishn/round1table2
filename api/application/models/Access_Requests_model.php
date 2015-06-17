<?php

/*require_once(APPPATH."models/Entities/Users.php");
use \Users;
*/
class Access_Requests_model extends CI_Model {

        public $em;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }
    /*
     * Register new Access Request
    */
    
    public function register_request($name = '', $email = '', $table_name = '')
    {  
       
        
        if($this->em->getRepository('Entities\Members')->findOneBy(array('email'=>$email)))
        {
            return 'error User already Exists, Request your OTP to login';
        }elseif($this->em->getRepository('Entities\AccessRequests')->findOneBy(array('email'=>$email)))
        {
               return 'error Request already Exists, You will be notified by E-mail on Approval of Request ';
        }else
        {
            $request = new Entities\AccessRequests;
     
            $request->setName($name);
            $request->setEmail($email);
            $request->setTableName($table_name);
            $request->setRequestDate( new \DateTime("now"));
            $request->setStatus(0);
            $request->setInfo('');
            
           try
            {
               $this->em->persist($request);
                $this->em->flush();
                return true;
            }catch(Exception $e)
            {
                return 'error '. $e->getMessage();
            }
        }
    }

}