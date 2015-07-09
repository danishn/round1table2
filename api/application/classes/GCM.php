<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//Reference : http://www.androidhive.info/2012/10/android-push-notifications-using-google-cloud-messaging-gcm-php-and-mysql/

class GCM {
 
    public $url;
    public $headers;
    public $fields;

    
    function __construct() {
        
        // Set meta-data for request
        $this->url = 'https://android.googleapis.com/gcm/send'; 
        
        $this->headers = array(
            'Authorization: key=AIzaSyAdcp_ExRygjsNZCJatSuRa5lq-zVKbaLQ',
            'Content-Type: application/json'
        );
        
        $this->fields = array(
            'registration_ids' => null,
            'notification' => null,
            'collapse_key' => null
        );
    }
 
    /**
     * Sending Push Notification
     */
    public function send_notification($registatoin_ids, $message) {
        
        $this->fields['registration_ids'] = $registatoin_ids;
        $this->fields['notification'] = $message;
        $this->fields['collapse_key'] = $message['type'];
 
        //echo json_encode($this->fields);exit;
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $this->url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->fields));
 
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
 