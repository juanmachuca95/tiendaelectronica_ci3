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


// Admin
$route['admin'] = 'admin';

//Categorias
$route['categorias'] = 'categorias';
$route['categorias/(:num)'] = 'categorias/$1';
$route['categorias/crear'] = 'categorias/create';
$route['categorias/edit/(:num)'] = 'categorias/edit/$1';
$route['categorias/update/(:num)']['PUT'] = 'categorias/update/$1';
$route['categorias/destroy/(:num)'] = 'categorias/destroy/$1';
$route['categorias/search/(:any)']['GET'] = 'categorias/seach';

//Comercializacion
$route['comercializacion'] = 'comercializacion';

//Consultas 
$route['consultas'] = 'consultas';
$route['consultas/(:num)'] = 'consultas/$1';
$route['consultas/crear'] = 'consultas/create';

//Contacto
$route['contactos'] = 'contactos';

// Login
$route['login']['POST'] = 'login/login';
$route['inicio'] = 'login';

// Nosotros
$route['nosotros'] = 'nosotros';

// Productos
$route['productos'] = 'productos';
$route['productos/(:num)'] = 'productos/$1';
$route['productos/crear'] = 'productos/create';
$route['productos/store']['POST'] = 'productos/store';
$route['productos/edit/(:num)'] = 'productos/edit/$1';
$route['productos/update/(:num)']['PUT'] = 'productos/update/$1';
$route['productos/destroy/(:num)'] = 'productos/destroy/$1';
$route['productos/active/(:num)'] = 'productos/active/$1';
  
$route['catalogo'] = 'productos/catalogo';
$route['catalogo/(:num)'] = 'productos/catalogo/$1';
$route['detalle/(:num)'] = 'productos/detalle/$1';
$route['productos/search']['POST'] = 'productos/search';

//Terminos
$route['terminos'] = 'terminos';

// Users
$route['users/store']['POST'] = 'users/store';
$route['users/crear'] = 'users/create';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
