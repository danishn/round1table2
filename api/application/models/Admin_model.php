<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

        public $em;
    
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->em = $this->doctrine->em;
        }
    
        /*
         * Authenticate User for Email & OTP data
        */
        public function authenticate($userName, $password)
        {
    
            $user = $this->em->getRepository('Entities\Admin')->findOneBy(array('name' => $userName));
            if($user)
            {
                if($password == $user->getPassword())
                {
                    return $user->getName();   
                }else
                {
                    return '__admin?wrong=Incorrect_Credentials';
                }
            }else
            {
                return '__admin?wrong=Invalid_User';
            }
        }
}

