<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Response {
	
	private $success;
	private $error;
	private $data;
	
	function __construct() {
		$this->success = false;
		$this->error = null;
		$this->data = null;
	}
	
	function getSuccess(){
		return $this->success;
	}
	
	function setSuccess($success){
		$this->success = $success;
		return $this;
	}
	
	function getError(){
		return $this->error;
	}
	
	function setError($error){
		$this->error = $error;
		return $this;
	}
	
	function getData(){
		return $this->data;
	}
	
	function setData($data){
		$this->data = $data;
		return $this;
	}
	
	function respond(){
		$response = array(
			'success' => $this->success,
			'error' => $this->error,
			'data' => $this->data
		);
		
		header("Content-Type: application/json");
		echo json_encode($response);
	}
}