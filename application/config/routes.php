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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about']                  = 'pages/about';
$route['services']               = 'pages/services';
$route['pricing']                = 'pages/pricing';
$route['case-studies']           = 'pages/case_studies';
$route['privacy-policy']         = 'pages/privacy_policy';
$route['terms']                  = 'pages/terms';
$route['analytics']              = 'pages/analytics';
$route['live-exams']             = 'pages/live_exams';
$route['question-bank']          = 'pages/question_bank';
$route['ai-proctoring']          = 'pages/ai_proctoring';
$route['psychometric']           = 'pages/psychometric';
$route['certificates']           = 'pages/certificates';
$route['help']                   = 'pages/help';
$route['docs']                   = 'pages/docs';
$route['api-docs']               = 'pages/api_docs';
$route['status']                 = 'pages/status';
$route['use-cases/(:any)']       = 'pages/use_case/$1';
$route['contact']                = 'pages/contact';
$route['contact/send']           = 'contact/send';

// ---- REST API ----
// Auth
$route['api/auth/logout']  = 'api/auth_logout';
$route['api/auth/me']      = 'api/auth_me';

// Public read
$route['api/blog']                = 'api/blog_index';
$route['api/blog/(:any)']         = 'api/blog_show/$1';
$route['api/testimonials']        = 'api/testimonials_index';
$route['api/faqs']                = 'api/faqs_index';
$route['api/settings']            = 'api/settings_index';

// Admin — enquiries
$route['api/admin/enquiries']     = 'api/admin_enquiries_list';

// Blog (public)
$route['blog']       = 'blog/index';
$route['blog/(:any)'] = 'blog/post/$1';

// Admin
$route['admin']                          = 'admin/dashboard';
$route['admin/login']                    = 'admin/login';
$route['admin/logout']                   = 'admin/logout';
$route['admin/dashboard']                = 'admin/dashboard';
