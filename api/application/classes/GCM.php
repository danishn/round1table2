<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//Reference : http://www.androidhive.info/2012/10/android-push-notifications-using-google-cloud-messaging-gcm-php-and-mysql/

class GCM {
    
    function __construct() {

    }
 
    /**
     * Sending Push Notification
    */
    public function send_notification($registatoin_ids, $message, $data) {
        
         $url = 'https://android.googleapis.com/gcm/send'; 
        
        // Afif Acc API key for android
        // 'Authorization: key=AIzaSyAdcp_ExRygjsNZCJatSuRa5lq-zVKbaLQ',
        
        $headers = array(
            'Authorization: key=AIzaSyDA76icBLYgTTwMgmkMQgadlhbyGproojg',
            'Content-Type: application/json'
        );
        
        $message["icon"] = "@drawable/app_logo";
        
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'notification' => $message,
            'data' => $data,
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
 