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
$route['default_controller'] = 'DashboardController';
$route['/'] = 'DashboardController/index';

$route['login'] = "AuthController/index";
$route['logout'] = "AuthController/logout";
$route['register'] = "AuthController/register";
$route['user/user_add'] = "AuthController/user_add";
$route['user/login'] = "AuthController/login_action";
$route['user/register'] = 'AuthController/register';


$route['callback'] = "AuthController/callback";
$route['user'] = "UserController/usermanage";
$route['user/delete'] = "UserController/user_delete";
$route['user/user_getid'] = "UserController/user_getid";
$route['user/permision'] = "UserController/userpermision";
$route['user/user_search'] = 'UserController/usersearch';

$route['user/warehouse_check'] = "UserController/user_warehousecheck";
$route['user/authority_check'] = "UserController/user_authoritycheck";

$route['regphonenumber'] = "WarehouseController/regphonenumber";
$route['regphonenumber/delete'] = "WarehouseController/warehouse_delete";
$route['regphonenumber/delete_all'] = "WarehouseController/delete_all";
$route['regphonenumber/edit'] = "WarehouseController/warehouse_edit";
$route['regphonenumber/get_warehouse_id'] = "WarehouseController/warehouse_getid";
$route['regphonenumber/phonenumber_add'] = "WarehouseController/warehouse_add";
$route['regphonenumber/multiinsert'] = "WarehouseController/multiinsert";
$route['sendpost'] = "WarehouseController/sendpost";



$route['messagelist'] = 'MessageController/index';
$route['messagelist/add'] = 'admin_products/add';
$route['messagelist/update'] = 'admin_products/update';
$route['messagelist/update/(:any)'] = 'admin_products/update/$1';
$route['messagelist/delete/(:any)'] = 'admin_products/delete/$1';
$route['messagelist/(:any)'] = 'admin_products/index/$1'; //$1 = page number

$route['inactivelist']  = "InactivelistController/index";
$route['inactivelist/del'] = "InactivelistController/delete";
$route['inactivelist/update'] = "InactivelistController/update";



$route['product'] = 'ProductController';
$route['products/edit'] = 'ProductController/edit_product';
$route['products/add'] = 'ProductController/add_product';
$route['products/search'] = 'ProductController/product_search';
$route['products/delete'] = 'ProductController/del_product';

$route['vendor'] = "VendorController";
$route['vendor/send'] = "VendorController/send_message";
$route['vendor/add'] = "VendorController/add_vendor";
$route['vendor/del'] = "VendorController/del_vendor";
$route['vendor/edit'] = "VendorController/edit_vendor";
$route['vendor/search'] = "VendorController/vendor_search";
$route['vendor/sendtestnumber'] = "VendorController/testmsg_send";

$route['provider'] = "ProviderController";
$route['provider/add'] = "ProviderController/add_provider";
$route['provider/del'] = "ProviderController/del_provider";
$route['provider/edit'] = "ProviderController/edit_provider";
$route['provider/search'] = "ProviderController/provider_search";

$route['customer'] = "CustomerController";
$route['customer/add'] = "CustomerController/add_customer";
$route['customer/del'] = "CustomerController/del_customer";
$route['customer/edit'] = "CustomerController/edit_customer";
$route['customer/search'] = "CustomerController/customer_search";

$route['buy'] = "BuyController";
$route['buy/product'] = "BuyController/buyproduct";
$route['buy/productlist'] = 'BuyController/productlist';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;