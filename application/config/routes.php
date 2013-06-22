<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Home */
$route['default_controller'] = "home";

/* News */
$route['novosti/(:num)/(:any)'] = "novosti";
$route['novosti/post'] = "novosti/singlePost";
$route['novosti/search'] = "novosti/search";
$route['novosti/sidebar'] = "novosti/sidebar";
$route['novosti/pagenumber'] = "novosti/pagenum";

/* Subjects */

/* Forum */
$route['forum/(:num)/(:any)'] = "forum/category";
$route['forum/addnew'] = "forum/addnew";
$route['forum/(:num)/(:any)/(:num)/(:any)'] = "forum/post";

/* Calendar */

/* Contact */

/* User */
$route['prijava'] = "korisnik/login";
$route['odjava'] = "korisnik/logout";


$route['404_override'] = '';
