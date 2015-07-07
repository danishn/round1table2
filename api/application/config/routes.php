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
$route['default_controller'] = "TestController";
$route['404_override'] = 'AuthController/error404';

$route['test/(:any)'] = "TestController/$1";
$route['test/(:any)/(:any)'] = "TestController/$1/$2";

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
$route['member/create'] = 'MemberController/create_member';
$route['member/edit_profile'] = 'MemberController/edit_profile';
$route['member/search'] = 'MemberController/search_members';

/* event APIs */
$route['event/get_all'] = 'EventController/get_events';
$route['meeting/get_all'] = 'EventController/get_meetings';
$route['event/create'] = 'EventController/create_event';
$route['meeting/create'] = 'EventController/create_event';

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

 
$route['translate_uri_dashes'] = FALSE;