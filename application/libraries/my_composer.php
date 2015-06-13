<?php
/**
 * Description of MY_Composer
 *
 * @author Rana
 */
class MY_Composer
{
    function __construct() 
    {
       require_once("/vendor/autoload.php");
       //require_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");
    }
}