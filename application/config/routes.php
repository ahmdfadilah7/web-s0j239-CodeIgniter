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
$route['default_controller'] = 'homecontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'homecontroller';
$route['login'] = 'authcontroller/login';
$route['logout'] = 'authcontroller/logout';
$route['register'] = 'authcontroller/register';
$route['about'] = 'aboutcontroller';
$route['contact'] = 'contactcontroller';

$route['profile'] = 'profilecontroller';
$route['profile/edit'] = 'profilecontroller/edit';
$route['profile/update'] = 'profilecontroller/update';

$route['cart'] = 'cartcontroller';
$route['cart/store'] = 'cartcontroller/store';
$route['cart/pembayaran'] = 'cartcontroller/pembayaran';
$route['getorder/(:num)'] = 'cartcontroller/get_order/$1';
$route['getinvoice/(:num)'] = 'cartcontroller/get_invoice/$1';

$route['mua'] = 'muacontroller';
$route['mua/detail/(:any)/(:any)'] = 'muacontroller/detail/$1/$2';
$route['mua/paket/detail/(:any)/(:any)'] = 'muacontroller/detail_paket/$1/$2';

$route['sistem'] = 'sistem/authcontroller/login';
$route['sistem/login'] = 'sistem/authcontroller/login';
$route['sistem/dashboard'] = 'sistem/dashboardcontroller';
$route['sistem/setting'] = 'sistem/settingcontroller';
$route['sistem/setting/edit/(:num)'] = 'sistem/settingcontroller/edit/$1';
$route['sistem/setting/update/(:num)'] = 'sistem/settingcontroller/update/$1';

$route['sistem/about'] = 'sistem/aboutcontroller';
$route['sistem/about/add'] = 'sistem/aboutcontroller/add';
$route['sistem/about/store'] = 'sistem/aboutcontroller/store';
$route['sistem/about/edit/(:num)'] = 'sistem/aboutcontroller/edit/$1';
$route['sistem/about/update/(:num)'] = 'sistem/aboutcontroller/update/$1';

$route['sistem/order'] = 'sistem/ordercontroller';
$route['sistem/order/konfirmasi/(:any)'] = 'sistem/ordercontroller/konfirmasi/$1';

$route['sistem/slider'] = 'sistem/slidercontroller';
$route['sistem/slider/add'] = 'sistem/slidercontroller/add';
$route['sistem/slider/store'] = 'sistem/slidercontroller/store';
$route['sistem/slider/edit/(:num)'] = 'sistem/slidercontroller/edit/$1';
$route['sistem/slider/update/(:num)'] = 'sistem/slidercontroller/update/$1';
$route['sistem/slider/delete/(:num)'] = 'sistem/slidercontroller/delete/$1';

$route['sistem/rekening'] = 'sistem/rekeningcontroller';
$route['sistem/rekening/add'] = 'sistem/rekeningcontroller/add';
$route['sistem/rekening/store'] = 'sistem/rekeningcontroller/store';
$route['sistem/rekening/edit/(:num)'] = 'sistem/rekeningcontroller/edit/$1';
$route['sistem/rekening/update/(:num)'] = 'sistem/rekeningcontroller/update/$1';
$route['sistem/rekening/delete/(:num)'] = 'sistem/rekeningcontroller/delete/$1';

$route['sistem/admin'] = 'sistem/admincontroller';
$route['sistem/admin/add'] = 'sistem/admincontroller/add';
$route['sistem/admin/store'] = 'sistem/admincontroller/store';
$route['sistem/admin/edit/(:num)'] = 'sistem/admincontroller/edit/$1';
$route['sistem/admin/update/(:num)'] = 'sistem/admincontroller/update/$1';
$route['sistem/admin/delete/(:num)'] = 'sistem/admincontroller/delete/$1';

$route['sistem/user'] = 'sistem/usercontroller';
$route['sistem/user/delete/(:num)'] = 'sistem/usercontroller/delete/$1';

$route['sistem/mua'] = 'sistem/muacontroller';
$route['sistem/mua/add'] = 'sistem/muacontroller/add';
$route['sistem/mua/store'] = 'sistem/muacontroller/store';
$route['sistem/mua/delete/(:num)'] = 'sistem/muacontroller/delete/$1';

$route['mua/login'] = 'mua/authcontroller/login';
$route['mua/proses_login'] = 'mua/authcontroller/proses_login';
$route['mua/register'] = 'mua/authcontroller/register';
$route['mua/proses_register'] = 'mua/authcontroller/proses_register';
$route['mua/logout'] = 'mua/authcontroller/logout';
$route['mua/dashboard'] = 'mua/dashboardcontroller';

$route['mua/toko'] = 'mua/tokocontroller';
$route['mua/toko/add'] = 'mua/tokocontroller/add';
$route['mua/toko/store'] = 'mua/tokocontroller/store';
$route['mua/toko/edit/(:num)'] = 'mua/tokocontroller/edit/$1';
$route['mua/toko/update/(:num)'] = 'mua/tokocontroller/update/$1';
$route['mua/toko/delete/(:num)'] = 'mua/tokocontroller/delete/$1';

$route['mua/profile'] = 'mua/profilecontroller';
$route['mua/profile/edit/(:num)'] = 'mua/profilecontroller/edit/$1';
$route['mua/profile/update/(:num)'] = 'mua/profilecontroller/update/$1';
$route['mua/profile/delete/(:num)'] = 'mua/profilecontroller/delete/$1';

$route['mua/paket'] = 'mua/paketcontroller';
$route['mua/paket/add'] = 'mua/paketcontroller/add';
$route['mua/paket/store'] = 'mua/paketcontroller/store';
$route['mua/paket/edit/(:num)'] = 'mua/paketcontroller/edit/$1';
$route['mua/paket/update/(:num)'] = 'mua/paketcontroller/update/$1';
$route['mua/paket/delete/(:num)'] = 'mua/paketcontroller/delete/$1';

$route['mua/order'] = 'mua/ordercontroller';
$route['mua/order/tgl_acara/(:any)'] = 'mua/ordercontroller/tgl_acara/$1';
$route['mua/order/selesai/(:any)'] = 'mua/ordercontroller/selesai/$1';
