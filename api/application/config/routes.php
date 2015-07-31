<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "Welcome";
$route['404_override'] = 'AuthController/error404';


/* Admin Auth Routes */
$route['error'] = 'admin/LoginController/error';
$route['__admin'] = 'admin/LoginController';
$route['__admin/authenticate'] = 'admin/LoginController/authenticate';
$route['__admin/logout'] = 'admin/LoginController/logout';
$route['__admin/error'] = 'admin/LoginController/error';
$route['__admin/home'] = 'admin/HomeController';

/* Admin Member Routes */
$route['__admin/member'] =  'admin/MemberController';
$route['__admin/member/details'] =  'admin/MemberController/get_details';
$route['__admin/member/delete'] =  'admin/MemberController/delete';
$route['__admin/member/add'] =  'admin/MemberController/add';
$route['__admin/member/add_form'] =  'admin/MemberController/add_form';  //load member_add form 
$route['__admin/member/upload'] =  'admin/MemberController/upload';
$route['__admin/member/bulk_form'] =  'admin/MemberController/bulk_upload_form'; //load bulk upload form form 
$route['__admin/member/bulk_upload'] =  'admin/MemberController/bulk_upload';

/* Admin Event/Meeting Routes */
$route['__admin/event'] =   'admin/EventController/event';
$route['__admin/event/approve'] = 'admin/EventController/approve';
$route['__admin/event/reject'] = 'admin/EventController/reject';
$route['__admin/event/delete'] = 'admin/EventController/delete';
$route['__admin/event/info'] = 'admin/EventController/info';

$route['__admin/meeting'] = 'admin/MeetingController/meeting';
$route['__admin/meeting/approve'] = 'admin/MeetingController/approve';
$route['__admin/meeting/reject'] = 'admin/MeetingController/reject';
$route['__admin/meeting/delete'] = 'admin/MeetingController/delete';
$route['__admin/meeting/info'] = 'admin/MeetingController/info';

/* Admin News Routes */
$route['__admin/news'] =            'admin/NewsController/news';
$route['__admin/news/approve'] =    'admin/NewsController/approve';
$route['__admin/news/delete'] =     'admin/NewsController/delete';
$route['__admin/news/reject'] =     'admin/NewsController/reject';
$route['__admin/news/info'] =     'admin/NewsController/info';

/* Admin Gallery Routes */
$route['__admin/gallery'] = 'admin/GalleryController';
$route['__admin/gallery/delete'] = 'admin/GalleryController/delete';



/* Test API APIs */
$route['test/map_images'] = "TestController/map_images";
$route['test/sendMail'] = "TestController/sendMail";
$route['test/send_otp'] = "TestController/send_otp";
$route['test/bulk_upload'] = "TestController/bulk_upload";
$route['test/conveners_upload'] = "TestController/conveners_upload";
$route['test/gcm'] = "TestController/gcm";
$route['test/(:any)'] = "TestController/$1";
$route['test/(:any)/(:any)'] = "TestController/$1/$2";
$route['test/search/(:any)/(:any)'] = "TestController/search/$1/$2";

/* Auth APIs */
$route['login'] = 'AuthController/login';
$route['request_otp'] = 'AuthController/request_otp';
$route['access_request'] = 'AuthController/access_request';

/* Table APIs */
$route['table/get_all'] = 'TableController/get_tables';
$route['table/(:num)/get_members'] = 'TableController/get_members/$1';
$route['table/create'] = 'TableController/create_table';

/* member APIs */
$route['member/get_all'] = 'MemberController/get_members';
//$route['member/create'] = 'MemberController/create_member';
$route['member/search'] = 'MemberController/search_members';
$route['member/edit_profile'] = 'MemberController/edit_profile';

/* event APIs */
$route['event/get_all'] = 'EventController/get_events';
$route['meeting/get_all'] = 'EventController/get_meetings';
$route['event/create'] = 'EventController/create_event';
$route['meeting/create'] = 'EventController/create_event';
$route['event/rsvp'] = 'EventController/rsvp_update';

/* News APIs */
$route['news/get_all'] = 'NewsController/get_news';
$route['news/create'] = 'NewsController/create_news';

/* Favorites APIs */
$route['favorites/get_all'] = 'FavoritesController/get_favorites';
$route['favorites/create'] = 'FavoritesController/create_favorites';
//$route['favorites/search'] = 'FavoritesController/search_favorites';

/* Conveners APIs */
$route['conveners/get_all'] = 'ConvenersController/get_conveners';
$route['conveners/create'] = 'ConvenersController/create_conveners';
//$route['conveners/search'] = 'ConvenersController/search_conveners';

/* Conveners APIs */
$route['gallery/post_update'] = 'GalleryController/set_update';
$route['gallery/get_updates'] = 'GalleryController/get_updates';

/* Author: Rohit */
/* Members Panel APIs */
$route['members_panel/login']='AuthController/members_panel_login';
$route['members_panel/check_session']='AuthController/members_panel_check_session';
$route['members_panel/logout']='AuthController/members_panel_logout';
$route['members_panel/get_password']='MemberController/members_panel_get_password';
$route['members_panel/get_my_profile']='MemberController/members_panel_get_my_profile';

 
$route['translate_uri_dashes'] = FALSE;