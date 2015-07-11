<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//Author: Danish Nadaf

class APN {
    
    function __construct() {

    }
 
    /**
     * Sending Push Notification
    */
    public function send_notification($registatoin_ids, $message, $data) {
        
         $url = 'https://android.googleapis.com/gcm/send'; 
        
        $headers = array(
            'Authorization: key=AIzaSyCzF05kIClIihQRt5FpWNOIKcSNp4bNnqU',
            'Content-Type: application/json'
        );
        
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'notification' => $message,
            'data' => $data,
            'content_available' => true,
            'collapse_key' => $data['type']
        );
        
       //echo json_encode($fields);exit;
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('error Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);        
        return $result;
    }
 
}
 