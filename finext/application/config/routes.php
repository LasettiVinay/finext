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
|	https://codeigniter.com/user_guide/general/routing.html
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
/* Members */
$route['aboutUs'] = 'Home/aboutus';
$route['contact'] = 'Home/contact';
$route['forgot']='Home/forgot';

// $route['direct_referals'] = 'member/member/direct_referals';
// $route['member_dashboard'] = 'member/member/dasboard';

// $route['profile'] = 'member/member/profile';
// $route['change_password'] = 'member/member/change_password';
// $route['bank_detail'] = 'member/member/bank_detail';
// $route['kyc_upload'] = 'member/member/kyc_upload';
// $route['tree_view'] = 'member/member/tree_view';
// $route['level_summary'] = 'member/member/level_summary';
// $route['give_help'] = 'member/member/give_help';
// $route['get_help'] = 'member/member/get_help';
// $route['total_get_donation'] = 'member/member/total_get_donation';
// $route['promotion'] = 'admin/admin/promotion';
// $route['compose'] = 'member/member/compose';
// $route['inbox'] = 'member/member/inbox';
// $route['sentbox'] = 'member/member/sentbox';
// $route['down_link'] = 'member/member/down_link';

/* admin */

 $route['dashboard'] = 'admin/admin/dashboard';
  $route['admin_kyc_upload']='admin/admin/kyc_upload';
$route['admin_bank_detail']='admin/admin/bank_detail';
 $route['admin_change_password']='admin/admin/change_password';
 $route['admin_edit_profile']='admin/admin/admin_edit_profile';
 $route['edit_profile']='admin/admin/profile_edit';
 $route['down_lines']='admin/admin/all_members';
 $route['not-completed']='admin/admin/not_completed_members';
 $route['child/(:any)']='admin/admin/child/$1';
 $route['admin_get_helps']='admin/admin/get_help';
 $route['admin_referals']='admin/admin/direct_referals';
 $route['admin_level_summary']='admin/admin/level_summary';
 $route['admin_total_get_donation']='admin/admin/total_get_donation';
 $route['autopull_total_get_donation']='admin/admin/autopull_total_get_donation';
 $route['admin_tree_view']='admin/admin/treeView';
$route['admin_compose'] = 'admin/admin/compose';
$route['admin_inbox'] = 'admin/admin/inbox';
$route['admin_sentbox'] = 'admin/admin/sentbox';
$route['profile'] = 'admin/admin/admin_profile/';
$route['profile_update'] = 'admin/admin/profile_update/';
$route['message_update'] = 'admin/admin/message_update/';
$route['change_password'] = 'admin/admin/change_password';
$route['admin_bank_detail'] = 'admin/admin/bank_detail';
$route['admin_kyc_upload'] = 'admin/admin/kyc_upload';
$route['autopool_tree']='admin/admin/autopool_tree';
$route['official_user']='admin/admin/official_user';
$route['give_helps'] = 'admin/admin/give_help';
$route['term_and_condition'] = 'admin/admin/term_and_condition';
$route['logout']='admin/admin/logout'; 
$route['admin_inbox_mail']='admin/admin/inbox_mail';
$route['sentbox_mail']='admin/admin/sentbox_mail';
$route['official_profile']='admin/admin/official_profile';
$route['edit_official_profile']='admin/admin/edit_official_profile';
$route['update_user_status']='admin/admin/update_user_status';
$route['autopull_get_help']='admin/admin/autopull_get_help';
$route['autopull_give_help']='admin/admin/autopull_give_help';
$route['admin_child']='admin/admin/child';
$route['autopull_user']='admin/admin/autopull_user';
$route['block_user']='admin/admin/block_users';
$route['activate_User']='admin/admin/activate_User';
$route['delete_user']='admin/admin/delete_user';
$route['autopull_users']='admin/admin/autopull_users';
$route['autopull_pay_users']='admin/admin/autopull_pay_users';
$route['autopull_unpay_users']='admin/admin/autopull_unpay_users';
$route['inactive_user']='admin/admin/inactive_user';
$route['set_password']='admin/admin/set_password';
$route['default_controller'] = 'Home';
$route['admin_contat'] = 'admin/admin/contact';
$route['db_backup'] = 'admin/admin/db_backup';
$route['go_autopool'] = 'admin/admin/go_autopool';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
