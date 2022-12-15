<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['logout'] = 'Pages/logout';
$route['login'] = 'Pages/login';
// collectors/show_json_collector
$route['collectors/show_json_collector'] = 'Collectors/show_json_collector';

$route['collectors/del_collector'] = 'Collectors/del_collector';

$route['patients/show_json_ptnt'] = 'Patients/show_json_ptnt';
$route['tests/search_test_cost'] = 'Tests/search_test_cost';
$route['bill/add_bill'] = 'Bill/add_bill';
$route['final_bill/(:any)'] = 'Pages/view/final_bill/$1';
$route['edit_bill/(:any)'] = 'Pages/view/edit_bill/$1';

$route['userDetails/(:any)'] = 'Pages/view/userDetails/$1';

$route['userDetails/user/add_envelope'] = 'User/add_envelope';
$route['userDetails/user/del_envelope'] = 'User/del_envelope';

$route['edit_bill/bill/del_bill_test'] = 'Bill/del_bill_test';
$route['edit_bill/bill/show_json_sample'] = 'Bill/show_json_sample';
$route['edit_bill/agent/show_json_agent'] = 'Agent/show_json_agent';
$route['edit_bill/lab/show_json_lab'] = 'Lab/show_json_lab';
$route['edit_bill/collectors/show_json_collector'] = 'Collectors/show_json_collector';
$route['edit_bill/patients/show_json_ptnt'] = 'Patients/show_json_ptnt';
$route['edit_bill/doctor/show_json_doc'] = 'Doctor/show_json_doc';
$route['edit_bill/tests/addTestHome'] = 'Tests/addTestHome';
$route['edit_bill/bill/update_bill'] = 'Bill/update_bill';
$route['(:any)'] = 'Pages/view/$1';
$route['default_controller'] = 'Pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;