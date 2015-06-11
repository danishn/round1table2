<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


    public function login()
	{
        $member_email = $this->input->post('email');
        $member_otp = $this->input->post('otp');
        
		$this->load->model('Member_model', 'member');
        
        $result = $this->member->login($member_email, $member_otp);
        echo json_encode($result);
	}
}
